<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        // Redirect or handle error as needed
        exit;
    }

    // Send email (example, you may use a library like PHPMailer for advanced usage)
    $to = "brianbicheng@gmail.com"; // Replace with your email address
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nEmail: $email\n\n$message";

    if (mail($to, $subject, $body)) {
        echo "Thank you for contacting us!";
    } else {
        echo "Oops! Something went wrong.";
        // Handle error as needed
    }
} else {
    // Redirect or handle error if form is not submitted
    echo "Form submission error";
}
?>