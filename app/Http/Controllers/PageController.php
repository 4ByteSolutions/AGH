<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

class PageController extends BaseController
{
    public function index(){
        return view('index');
    }

    public function glasses(){
        return view('glasses');
    }

    public function mirrors(){
        return view('mirrors');
    }

    public function contact_us(){
        return view('contact_us');
    }

    public function do_contact(Request $request){
        $name = "Kabir";//$request->input('name');
        $email = "juttkabir@gmail.com";//$request->input('email');
        $message = "abc";//$request->input('message');

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->SMTPSecure = 'ssl';
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'awais.bajwaa@gmail.com';
            $mail->Password = '-------------';
            $mail->Port = 465;
            
            $mail->setFrom('awais.bajwaa@gmail.com');
            $mail->addAddress('juttkabir@gmail.com');

            $mail->isHTML(true);

            $mail->Subject = "Business Client, Name: $name";
            $mail->Body = "Message is sended by $email.<br/>Hi, My name is <b>$name</b>. I want to talk to you about your products.<br/><br/><b>Message:</b><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$message";

            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
            }
            //return redirect('https://www.agh.com.pk/index.php/contact_us');
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}