<?php
session_start();
if(!isset($_SESSION["user"]))
	{
	header("Location:login_signup.php");
	}

if(isset($_POST['btnmail']))
{
	$msg="Name:  ".$_POST['name']."        "
	."Email:  ".$_POST['email']."        "
	."Message:  ".$_POST['message'];
	//mail('sarfaraz110.naqvi@outlook.com','contact form',$msg);
	//header("Location:mail_send.php");
	//require('PHPMailerAutoload.php');
	require_once('phpmailer/PHPMailerAutoload.php');
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'echo';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 465;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'ssl';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "naqvi.dastan@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "naqvi9900";
//Set who the message is to be sent from
$mail->setFrom($_POST['email'], $_POST['name']);
//Set an alternative reply-to address
$mail->addReplyTo('abc@gmail.com', $_POST['name']);
//Set who the message is to be sent to
$mail->addAddress('naqvi.dastan@gmail.com','Dastan');
//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body' ;
$mail->Body = $msg;
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    header("Location:mail_send.php");
}
}
else
{
	header("Location:contact_us.php");
}

?>