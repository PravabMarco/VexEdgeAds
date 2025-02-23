<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Your email address where you want to receive the message
    $to = "admin@vexedgead.com";  
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    $email_subject = "New message from " . $name . " - " . $subject;
    $email_body = "You have received a new message from " . $name . " (" . $email . ").\n\n" . 
                  "Message:\n" . $message;

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "There was an error sending the message. Please try again.";
    }
}
?>
