<?php

namespace App\Http\Controllers;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
        //$this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {          
      
        $url = auth()->user()->uImage;       
      
        if(auth()->user()->isActive== 1  && auth()->user()->isAdmin==0){        
                //  $user = User::find($user_id);
           $request->session()->put(['user_id'=>auth()->user()->id,'is_admin'=> auth()->user()->isAdmin,'is_active'=>auth()->user()->isActive,'name'=>auth()->user()->name,'pic'=>$url]);
           return view('home');
        }
       else if(auth()->user()->isAdmin==1 && auth()->user()->isActive==1){
            $request->session()->put(['user_id'=>auth()->user()->id,'is_admin'=> auth()->user()->isAdmin,'is_active'=>auth()->user()->isActive,'name'=>auth()->user()->name,'pic'=>$url]);
            return view('adminhome');
        }
        else if (auth()->user()->id > 0 && auth()->user()->isActive == 0){        
       /* if(Auth::check()){
            echo Auth::check();
           // exit;
        }*/
           $request->session()->forget(['user_id','is_admin','is_active','name']);
           $request->session()->flush();
           $insertedId = auth()->user()->id;         
           $users =   User::find($insertedId);  
           $activationcode =md5(auth()->user()->email.time());         
           $users->activation_code = $activationcode;        
           $users->save();     
           $mail = new PHPMailer(true);                              	
		
		  try {
            //Server settings
            $subject="Email Verification for registration";
            $message = "THis is Verification mail";
           
		    $mail->SMTPDebug = 0;                                 
		    $mail->isSMTP();                                      
		    $mail->SMTPAuth = true;                               
		    $mail->Username = 'farooquiowais70@gmail.com';                 
		    $mail->Password = 'Owais2020';                           
		    $mail->Port = 587;                                    
		    //Recipients
		    $mail->setFrom('farooquiowais70@gmail.com',$subject);
		    $mail->addAddress(auth()->user()->email,auth()->user()->name);
		    $mail->isHTML(true);                                  
		    $mail->Subject = 'Message : '.$subject;
            $mail->Body    = "<div style='padding-top:10px;'>Please Verify Your Email By click On Activate now
                              </div><div> <a href='http://54.174.202.127:8080/verifymail/activate/$activationcode/activateEmail' class='btn btn-primary'>Activate now</a></div>";
		    
		    
			$mail->SMTPSecure = 'tls'; 
			$mail->Host = 'smtp.gmail.com';
            $mail->send();
            $msg= "Email is not verified.Please verify your email";
		     return view('auth.login')->with('msg',$msg);
		   } catch (Exception $e) {
                $msg =  $mail->ErrorInfo;
                
                 return view('auth.register')->with('msg',$msg);
           }
       
       }
       else
       {

            $msg = "Something went wrong";
           return view('auth.register')->with('msg',$msg);
       }
 
    }

}
