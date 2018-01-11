<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/weblibs/PHPMailer/PHPMailerAutoload.php');



class Posti{
    private $session;

    function __construct(){


    }


    public static function sendMessageTo($subj,$message,$vastaanottaja){
        $mail = new PHPMailer();
// ---------- adjust these lines ---------------------------------------
        $mail->Username = "ossipostimies@gmail.com"; //SMTP account
        $mail->Password = "Postimies1";
        $mail->AddAddress($vastaanottaja); // recipients email
        $mail->FromName = "Ossi Postimies"; // readable name

        $mail->Subject = $subj;
        $mail->Body    = $message;
//-----------------------------------------------------------------------
        $mail->CharSet= 'utf-8';
        $mail->Host = "ssl://smtp.gmail.com"; // GMail
        $mail->Port = 465;
        $mail->IsSMTP(); // use SMTP
        $mail->SMTPAuth = true; // turn on SMTP authentication
        $mail->From = $mail->Username;

        if(!$mail->Send()) {
            return false;//$mail->ErrorInfo;
        }
        else {
            return true;
        }
    }

//***************************************************
}