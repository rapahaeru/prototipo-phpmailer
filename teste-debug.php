<?
ini_set('display_errors', 1);
date_default_timezone_set('Etc/UTC');

require 'PHPMailerAutoload.php';

//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

try {
	$mail->Host = "tripmail.trip.com.br";
	$mail->SMTPDebug = 2; // enables SMTP debug information (for testing)
	//$mail->Debugoutput = 'error';
	$mail->SMTPAuth = true; // enable SMTP authentication
	//$mail->SMTPSecure = "tls"; // sets the prefix to the servier
	///$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
	$mail->Port = 587; // set the SMTP port for the GMAIL server
	$mail->Username = "cadastro@trip.com.br";
	$mail->Password = "c4n7m9";
	$mail->addReplyTo('cadastro@trip.com.br', 'Cadastro');
	$mail->addAddress('cael@trip.com.br', 'Desenvolvedor');
	$mail->addAddress('rapahaeru@gmail.com', 'Desenvolvedor');
	$mail->setFrom('cadastro@trip.com.br', 'Revista Trip');
	$mail->Subject = 'Ativando cadastro';
	$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
	$mail->msgHTML('teste ');
	//$mail->AddAttachment('images/phpmailer.gif'); // attachment
	//$mail->addAttachment('examples/images/phpmailer_mini.png');
	$mail->Send();
	echo "Message Sent OK<p></p>\n";
} catch (phpmailerException $e) {
	echo "phpmailerException <br />";
	echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
	echo "Exception <br />";
	echo $e->getMessage(); //Boring error messages from anything else!
}