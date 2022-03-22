<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email 
{
    private $mail = \stdClass::class;

    public function __construct($SMTPDebug, $Host, $User, $Pass, $SMTPSecure, $Port, $SetFromEmail, $SetFromName)
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = $SMTPDebug;
        $this->mail->isSMTP();
        $this->mail->Host = $Host;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $User;
        $this->mail->Password = $Pass;
        $this->mail->SMTPSecure = $SMTPSecure;
        $this->mail->Port = $Port;
        $this->mail->CharSet = 'utf-8';
        $this->mail->setLanguage('br');
        $this->mail->isHTML(true);        
        $this->mail->setFrom($SetFromEmail, $SetFromName);
    }

    public function sendMail($subject, $body, $replyEmail, $replyName, $addressEmail, $addressName) 
    {
        $this->mail->Subject = (string) $subject;
        $this->mail->Body = $body;
        
        $this->mail->addReplyTo($replyEmail, $replyName);
        $this->mail->addAddress($addressEmail, $addressName);
        
        try
        {
            $this->mail->send();
        } catch (Exception $ex) {
            echo "OOPS! Acho que seu e-mail não foi enviado! O erro é {$this->mail->ErrorInfo} {$ex->getMessage()}";
        }
    }

}
