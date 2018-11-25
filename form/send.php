<?php

require_once 'class.phpmailer.php';

$_POST = array_map('trim', $_POST);

$error = false;

if (!isset($_POST['contact_name']) || empty($_POST['contact_name'])) {
    $error = true;
}

if (!isset($_POST['contact_tel']) || empty($_POST['contact_tel'])) {
    $error = true;
}

if (!isset($_POST['contact_email']) || empty($_POST['contact_email']) || !PHPMailer::ValidateAddress($_POST['contact_email'])) {
    $error = true;
}

if (!isset($_POST['contact_body']) || empty($_POST['contact_body'])) {
    $error = true;
}

if ($error) {
    exit('nok');
}

$mail = new PHPMailer();

$mail->CharSet = 'UTF-8';

/*$mail->SetFrom($_POST['contact_email'], $_POST['contact_name']);*/
$mail->AddReplyTo($contact_email, $contact_name);
$mail->SetFrom('formularz@alc-lakiernictwo.pl');

$mail->AddAddress('mariusz.zawierucha@gmail.com');
$mail->Subject = 'Wiadomość ze strony alc-lakiernictwo';
$mail->Body = "Imię i nazwisko: ".$_POST['contact_name']."\nTelefon: ".$_POST['contact_tel']."\nAdres e-mail: ".$_POST['contact_email']."\n\nTreść wiadomości: ".$_POST['contact_body'];

$contact_name = strip_tags($_POST['contact_name']);
$contact_email = strip_tags($_POST['contact_email']);

if (!$mail->Send()) {
    exit('nok');
}

exit('ok');