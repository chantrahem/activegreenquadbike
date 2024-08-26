<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["contact-us"])) {

    // Validate and sanitize input
    $name = htmlspecialchars(strip_tags($_POST["name"]));
    $subject = htmlspecialchars(strip_tags($_POST["subject"]));
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(strip_tags($_POST["message"]));

    include 'database/connection.php';
    
    // Use prepared statement
    $sql = 'SELECT email_address FROM about LIMIT 1';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $email_address = $data['email_address'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'alertemail168@gmail.com';
        $mail->Password = 'skozmvmlolzuulrf';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('alertemail168@gmail.com', 'Active Green Quad Bike Notification');
        $mail->addAddress($email_address);
        $mail->addReplyTo($email, $name);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = <<<EOT
        <div style="padding: 20px; background: #f2f2f2;">
            <div>You have a new inquiry as below:</div><br><br>
            <div><b>Name:</b> {$name}</div>
            <div><b>Email:</b> {$email}</div><br><br>
            <div><b>Message:</b> {$message}</div>
        </div>
EOT;

        $mail->send();
        echo "<script>document.location.href = 'thank-you.php';</script>";
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>