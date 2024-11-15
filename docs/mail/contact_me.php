<?php
// Check for empty fields
if (
    empty($_POST['name']) ||
    empty($_POST['email']) ||
    empty($_POST['message']) ||
    !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
) {
    echo "No arguments Provided!";
    return false;
}

// Sanitize input (optional)
$name = htmlspecialchars($_POST['name']);
$email_address = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$message = htmlspecialchars($_POST['message']);

// Create the email and send the message
$to = 'vulegani7@gmail.com';
$email_subject = "Website Contact Form: $name";
$email_body = "You have received a new message from your website contact form.\n\n"
    . "Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: vulegani@gmail.com\n"; // Replace with a valid email address
$headers .= "Reply-To: $email_address";

// Send the email
$mailSuccess = mail($to, $email_subject, $email_body, $headers);

// Check if the email was sent successfully
if ($mailSuccess) {
    echo "success";
} else {
    echo "error";
}
?>
