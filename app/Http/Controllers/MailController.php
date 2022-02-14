<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailController extends Controller
{
    public function index()
    {
        try{
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'api.mailgun.net';
            $mail->SMTPAuth = true;
            $mail->Username = 'taiwo.o@septem7investment.net';
            $mail->Password = '~YWDQ^.fq8fWe%@';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;          // Port->2525
            $mail->From = 'septem@mg.septemconnect.com';
            $mail->FromName = 'Septem Connect';
            $mail->addAddress('okandeji2012@gmail.com');
            // Mail content
            $mailContent = 'Testing mailgun';
            $mail->Subject = 'Mail test';
            $mail->Body = $mailContent;
            // Debug
            $mail->SMTPDebug = 2;
                // Send mail
                $mail->send();
                dd($mail);
            } catch (\Throwable $th) {
                throw $th;
            }
    }
}
