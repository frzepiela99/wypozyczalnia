<?php 
$imie = $_POST['fname'];
$name = $_POST['lname'];
$email = $_POST['email'];
$message = $_POST['message'];
$formcontent="From: $imie $name \n$message";
$recipient = "piotrekp2999@gmail.com";
$subject = "Biblioteka";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
header("location: kontakt.php");
?>