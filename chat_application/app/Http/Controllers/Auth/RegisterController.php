<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
         $activationcode=md5($data['email'].time());
           User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'activation_code' => $activationcode,
            'password' => Hash::make($data['password']),
        ]);

       $mail = new PHPMailer(true);                              	
		
		try {
            //Server settings
            $subject="Email Verification for registration";
            $message = "THis is Verification mail";
            $activationcode=md5($data['email'].time());
		    $mail->SMTPDebug = 1;                                 
		    $mail->isSMTP();                                      
		    $mail->SMTPAuth = true;                               
		    $mail->Username = 'farooquiowais70@gmail.com';                 
		    $mail->Password = 'Owais2020';                           
		    $mail->Port = 587;                                    
		    //Recipients
		    $mail->setFrom('farooquiowais70@gmail.com',$subject);
		    $mail->addAddress($data['email'], $data['name']);
		    $mail->isHTML(true);                                  
		    $mail->Subject = 'Message : '.$subject;
		    $mail->Body    = "<div style='padding-top:10px;'>Please Verify Your Email By click On Activate now <a href='http://localhost/chat_application/public/pages/emailverify/$activationcode/activate' class='btn btn-primary'>Activete now</a></div>";
		    
		    
			$mail->SMTPSecure = 'tls'; 
			$mail->Host = 'smtp.gmail.com';
		    $mail->send();
		    $msg = "Register successfully";
		} catch (Exception $e) {
		    $msg =  $mail->ErrorInfo;
		}

      
        return view('auth.login')->with('msg',$msg);
    }
    
}
