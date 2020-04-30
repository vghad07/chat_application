<?php

namespace App\Http\Controllers;

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Illuminate\Http\Request;

class PhpmailController extends Controller
{
    
    
    public function SendEmail($subject,$sender,$message){
    	
		$mail = new PHPMailer(true);                              	
		
		try {
		    //Server settings
		    $mail->SMTPDebug = 0;                                 
		    $mail->isSMTP();                                      
		    $mail->SMTPAuth = true;                               
		    $mail->Username = 'farooquiowais70@gmail.com';                 
		    $mail->Password = 'Owais2020';                           
		    $mail->Port = 587;                                    
		    //Recipients
		    $mail->setFrom('farooquiowais70@gmail.com',$subject);
		    $mail->addAddress('farooquiowais70@gmail.com', 'owais');
		    $mail->isHTML(true);                                  
		    $mail->Subject = 'Message : '.$subject;
		    $mail->Body    = 'We have received a message from  <br>With the following details:<br>'.$message;
		    $mail->AltBody = 'We have received a message from  <br>With the following details:<br>'.$message;
		    
			$mail->SMTPSecure = 'tls'; 
			$mail->Host = 'smtp.gmail.com';
		    $mail->send();
		    return view('registerhome');
		} catch (Exception $e) {
		    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}	
	
	}
}
