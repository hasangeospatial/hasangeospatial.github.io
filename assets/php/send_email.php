<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = filter_var(trim($_POST['fullname']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    $to = "hasan.sylh3t@gmail.com"; // Replace with your email address
    $subject = "Personal Website Contact from " . $fullname;
    $body = "You have received a new message from your website contact form.\n\n".
            "Here are the details:\n".
            "Name: $fullname\n".
            "Email: $email\n".
            "Message:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully.";
    } else {
        echo "Message sending failed.";
    }
}
?>