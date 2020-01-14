<?php
/**
 * Created by PhpStorm.
 * User: t
 * Date: 24-10-18
 * Time: 14:48
 */

namespace MVC;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{

    public function sendMail($to, $name, $html, $subject)
    {
        try{
            // Server settings
            $mail = new PHPMailer(true);
            $mail->IsSMTP();
            $mail->SMTPDebug = 1;                                 // Enable verbose debug output
                                               // Set mailer to use SMTP
           // $mail->isSendmail();
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'sdereyo@gmail.com';                 // SMTP username
            $mail->Password = 'Heelgeheim123!';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                  // TCP port to connect to


            //Recipients
            $mail->setFrom('dereyo@gmail.com', 'ADVL');
            $mail->addAddress($to, $name);
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $html;
            $mailer = $mail->send();
            if($mailer) return true;
            else return false;
        } catch (Exception $e) {
            return false;
        }
    }

}