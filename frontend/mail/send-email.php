<?php

require '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com'; // Or 'smtp-mail.outlook.com'
    $mail->SMTPAuth = true;
    $mail->Username = 'aussiegarmentclub@outlook.com';
    $mail->Password = 'An1l@123456';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('aussiegarmentclub@outlook.com', 'Aussie Garment');
    $mail->addAddress('anilmaharjan87@gmail.com', 'Anil Maharjan');
    $mail->isHTML(true);
    $mail->Subject = 'Subject';
    $mail->Body = 'HTML message body';
    $mail->AltBody = 'Plain text message body';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
