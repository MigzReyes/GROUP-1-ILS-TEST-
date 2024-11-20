<?php 

require ('../HTML/Admin Page/adminphp/functions.php');
require '../../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ramenmatsurika@gmail.com'; // Your Gmail address
    $mail->Password = 'vmfu lutm mfkw kwbj';   // Gmail App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('your-email@gmail.com', 'ramenmatsurika.com');
    $mail->addAddress('ramenmatsurika@gmail.com');

    // Content
    $mail->isHTML(false);
    $mail->Subject = "New Contact Form Submission from $firstName $lastName";
    $mail->Body = "Name: $firstName $lastName\nEmail: $email\n\nMessage:\n$message";

    $mail->send();
    redirect ('../HTML/ContactUs.php', 'Email successfully sent');
} catch (Exception $e) {
    echo "Error: Email not sent. Mailer Error: {$mail->ErrorInfo}";
}
?>