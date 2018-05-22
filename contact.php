<?php
/*
Credits: Bit Repository
URL: http://www.bitrepository.com/
*/

include 'contact_config.php';
session_start();
error_reporting (E_ALL ^ E_NOTICE);
if (isset($_POST['submit'])){
	echo "string";;
}

$post = (!empty($_POST)) ? true : false;

if($post)
{
include 'functions.php';

$name = stripslashes($_POST['name']);
$email = trim($_POST['email']);
$phone = stripslashes($_POST['phone']);
$subject = stripslashes($_POST['subject']);
$message = "Site visitor information:

Name: ".$_POST['name']
."

E-mail Address: ".$_POST['email']
."

Phone: ".$_POST['phone'];


$error = '';

// Check name

if(!$name)
{
$error .= 'Пожалуйста, введите ваше имя.<br />';
}
// Check email

if(!$email)
{
$error .= 'Пожалуйста, введите адрес электронной почты.<br />';
}

if($email && !ValidateEmail($email))
{
$error .= 'Пожалуйста, Введите правильный адрес электронной почты
.<br />';
}


if(!$error)
{

	$mail = mail('hamlet0905@mail.ru', $subject, $message,
     "From: ".$name." <".$email.">\r\n"
    ."Reply-To: ".$email."\r\n"
    ."X-Mailer: PHP/" . phpversion());

if($mail)
{
echo 'OK';
}

}
else
{
echo '<div class="notification_error">'.$error.'</div>';
}

}
?>
