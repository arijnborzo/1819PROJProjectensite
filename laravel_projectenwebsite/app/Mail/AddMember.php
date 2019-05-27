<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use PHPMailerAutoload;
//include_once('PHPMailer/src/SMTP.php');

class AddMember extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('lukas.petit@student.odisee.be')
            ->view('/')
            ->text('emails.orders.shipped_plain');
    }
    public function ship(Request $request, $orderId)
    {
        Mail::to("lukas.petit@gmail.com")
            ->send("HALLLLOOOOOOOOOOOOOphp artisan cache:clear");

    }
    public static function mail($id)
    {
        $data = ["moo", "boo"]; // Empty array
//
//        Mail::send('home', $data, function($message)
//        {
//            $message->to('lukas.petit@gmail.com', 'Jon Doe')->subject('Welcome!');
//        });
        Mail::raw('ARNO IS NE FLIKKER'.$id, function ($message)
//        Mail::send('home',$data,function($message)
        {
            $message->from('projectenwebsite@outlook.com')->to('andreas.lauwers1@gmail.com', 'Lukas Petit')->subject('Mail van Laravel BAAS');
        });


//        require("PHPMailerAutoload.php");

//        $mail = new PHPMailer();
//        $mail->IsSMTP();
//        $mail->Mailer = "smtp";
//        $mail->CharSet = 'UTF-8';
//        $mail->Host = 'tls://smtp-mail.outlook.com';
//        $mail->Port = "587"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
//        $mail->SMTPAuth = true;
//        $mail->SMTPSecure = 'tls';
//        $mail->Username = "projectenwebsite@outlook.com";
//        $mail->Password = "Azerty123!";
//        $mail->From = trim_input("receivingEmailAdress@outlook.com");
//        $mail->FromName = trim_input("mijn naam");
//        $mail->AddAddress("lukas.petit@gmail.com", "my name");
////        $mail->AddReplyTo(trim_input($_POST['Email']), trim_input($_POST['Name']));
//        $mail->SMTPDebug = 1;
//        $mail->Subject = trim_input($_POST['Subject']);
//        $mail->Body = trim_input($_POST['message']);
//        $mail->WordWrap = 50;
//
//        if (!$mail->Send()) {
//            echo 'Message was not sent.';
//            echo 'Mailer error: ' . $mail->ErrorInfo;
//            exit;
//        } else {
//            echo 'Message has been sent.';
//        }
        // Path or name to the blade template to be rendered

        $template_path = 'email_template';
//        Mail::to("lukas.petit@gmail.com")
//            ->send("HALLLLOOOOOOOOOOOOOphp artisan cache:clear");
//        Mail::send(['text'=> $template_path ], $data, function($message) {
//            // Set the receiver and subject of the mail.
//            $message->to('lukas.petit@gmail.com', 'Receiver Name')->subject('Laravel First Mail');
//            // Set the sender
//            $message->from('projectenwebsite@outlook.com','Our Code World');
//        });
    }
}
