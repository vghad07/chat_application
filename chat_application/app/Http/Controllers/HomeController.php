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
        $this->middleware('auth');
        //$this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

     
       if(auth()->user()->isActive==1){
        $url = auth()->user()->uImage;
        $request->session()->put(['user_id'=>auth()->user()->id,'is_admin'=> auth()->user()->isAdmin,'is_active'=>auth()->user()->isActive,'name'=>auth()->user()->name,'pic'=>$url]);
      
        if($request->session()->get('is_active')== 1  && $request->session()->get('is_admin')==0){        
                //  $user = User::find($user_id);
                  return view('home');
              }
            if($request->session()->get('is_admin')==1 && $request->session()->get('is_active')==1){
                return view('adminhome');
            }
        }
        else{       
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
           
		    $mail->SMTPDebug = 1;                                 
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
                              </div><div> <a href='http://localhost/chat_application/public/pages/activate/$activationcode/activateEmail' class='btn btn-primary'>Activete now</a></div>";
		    
		    
			$mail->SMTPSecure = 'tls'; 
			$mail->Host = 'smtp.gmail.com';
            $mail->send();
           $msg= "Email is not verified.Please verify your email";
		     return view('auth.login')->with('msg',$msg);
		  } catch (Exception $e) {
                $msg =  $mail->ErrorInfo;
                
                 return view('auth.register');
          }
       
       }



        
               
            //$user = User::find($user_id);
            
                  
          /*  else{
                $request->session()->forget(['user_id','is_admin','is_active','name']);
                $request->session()->flush();
                return redirect('/');
            }*/
           
      
         
 
    }

    /*public function ulist()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('user_list');
    }*/
   
}
