<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nomeInput"];
    $cpf = $_POST["cpfInput"];
    $telefone = $_POST["telefoneInput"];
    $email = $_POST["emailInput"];
    $assunto = $_POST["assuntoInput"];
    $opiniao = $_POST["opiniaoInput"];

    $to = "klariaandrade@gmail.com";  // Replace with your email address
    $subject = "Form Submission - Fale Conosco";
    
    // Build the message
    $message = "Nome: $nome\n";
    $message .= "CPF: $cpf\n";
    $message .= "Telefone: $telefone\n";
    $message .= "E-mail: $email\n";
    $message .= "Assunto: $assunto\n";
    $message .= "Opinião: $opiniao\n";

    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Form submitted successfully. We'll get in touch soon!";
    } else {
        echo "Error sending the form. Please try again later.";
    }
} else {
    // If the form wasn't submitted through POST, redirect to the form page
    header("Location: fale.html");
    exit;
}
?>
