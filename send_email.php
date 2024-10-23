<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500); // Renvoie une erreur si des champs sont manquants
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "s.adadi@edu.umi.ac.ma"; 
$subject = "$m_subject:  $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
$header = "From: $email\r\n";
$header .= "Reply-To: $email\r\n";

// Envoi de l'email
if(!mail($to, $subject, $body, $header)) {
  http_response_code(500); // Si l'envoi échoue, renvoie une erreur
} else {
  http_response_code(200); // Si tout se passe bien, renvoie un succès HTTP
}
?>
