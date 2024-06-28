<?php
$to = "Alexander157@yandex.ru";
$subject = "New User Registered";
$message = "<html><body><h1>New User Registration</h1><p>A new user has registered.</p></body></html>";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: zlatatitov944@gmail.com' . "\r\n";

mail($to, $subject, $message, $headers);
?>
