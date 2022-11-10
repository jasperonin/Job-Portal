<?php
	$conn = new PDO("mysql:host=localhost;dbname=jobs", 'root', '');
?>

<!-- $random_code = substr(md5(uniqid(rand(),true)),7,7);
$receiver = "snzleo@gmail.com";
$subject = "Email Test via PHP using Localhost";
$message = "Hi, there...This is a test email send from Localhost. Here's your random code: $random_code";
$sender = "From:toeozforonin07@gmail.com";

if(mail($receiver, $subject, $message, $sender)){
    echo "Email sent successfully to $receiver";
    
}else{
    echo "Sorry, failed while sending mail!";
} -->