<?php

require_once 'vendor/autoload.php';

   function SendEmail($to){
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
    ->setUsername('aliashrafwork@gmail.com')
    ->setPassword('0113036729');
    $mailer = new Swift_Mailer($transport);
    $message = (new Swift_Message('confirmation mail'))
    ->setFrom(['omessi18@gmail.com' => '5awlat.com'])
    ->setTo([$to => 'A nam'])
   ->setBody('Your Account IS has been Registerd');
    $result = $mailer->send($message);
}


function Accept_email($to){
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
    ->setUsername('aliashrafwork@gmail.com')
    ->setPassword('0113036729');
    $mailer = new Swift_Mailer($transport);
    $message = (new Swift_Message('confirmation mail'))
    ->setFrom(['omessi18@gmail.com' => '5awlat.com'])
    ->setTo([$to => 'A nam'])
   ->setBody('Your Request has been Accepted');
    $result = $mailer->send($message);
}

?>