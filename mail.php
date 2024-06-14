<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

include ("auth_proccess.php");
include_once ("generate.php");

$mail = new PHPMailer(true);
$token = getName($n);
$_SESSION['token'] = $token;
try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'yavt5610@gmail.com'; // Ganti dengan email Anda
    $mail->Password = 'uvivvdgvloqepiig';  // Ganti dengan App Password Anda
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Menggunakan TLS
    $mail->Port = 587; // Menggunakan port 587 untuk TLS

    // Debugging settings
    $mail->SMTPDebug = 2; // Aktifkan debugging
    $mail->Debugoutput = 'html';

    //Recipients
    // $mail->setFrom('yavt5610@gmail.com');
    $mail->addAddress($_SESSION['email']); // Ganti dengan penerima email
    //$mail->addReplyTo('yavt5610@gmail.com');

    //Content
    $mail->isHTML(true);
    $mail->Subject = "2FA by Email Token";
    $mail->Body = $token;

    // Send email
    $mail->send();

    $email = $_POST["email"];

    echo "<script>alert('Message was sent successfully!'); document.location.href = 'auth_proccess.php';</script>";
} catch (Exception $e) {
    echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
}
?>