<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



class GeneralMail
{
    
    public $generalMail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($generalMail)
    {
        $this->generalMail = $generalMail;
    }
    
    public function SendEmail($message,$sender,$subject){
    	
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
		    $mail->setFrom($sender,$subject);
		    $mail->addAddress('farooquiowais70@gmail.com', 'Hi');
		    $mail->isHTML(true);                                  
		    $mail->Subject = 'Message : '.$subject;
		    $mail->Body    = 'We have received a message from '.$sender.' <br>With the following details:<br>'.$message;
		    $mail->AltBody = 'We have received a message from '.$sender.' <br>With the following details:<br>'.$message;
		    
			$mail->SMTPSecure = 'tls'; 
			$mail->Host = 'smtp.gmail.com';
		    $mail->send();
		    return view('registerhome');
		} catch (Exception $e) {
		    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}	
	
	}

	
}
