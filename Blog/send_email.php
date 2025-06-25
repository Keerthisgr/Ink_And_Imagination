<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $subject = "Thank You for Subscribing to Ink & Imagination!";
    $message = "Dear Subscriber,\n\nThank you for joining Ink & Imagination! You'll now receive weekly writing prompts, narrative techniques, and community highlights.\n\nStay inspired!\n\n- Keerthi S R\nInk & Imagination";

    // Gmail SMTP Configuration (requires PHPMailer)
    require 'PHPMailer/PHPMailerAutoload.php'; // Download PHPMailer from GitHub

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'inkandimagination97@gmail.com'; // Your Gmail
    $mail->Password = 'dfev doqw tayc nrob'; // Use App Password (not your Gmail password)

    $mail->setFrom('inkandimagination97@gmail.com', 'Ink & Imagination');
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->Body = $message;

    if ($mail->send()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => 'Failed to send email']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>