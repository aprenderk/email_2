<?php
$nombre=$_POST["nombre"];
$email=$_POST["email"];
$consulta =$_POST["consulta"];

body= "Nombre: ".$nombre."<br>Correo: ".$email."<br>Consulta: ".$consulta.;

require 'class.phpmailer.php';

try {
	$mail = new PHPMailer(true);

	$body             = file_get_contents('contents.html');
	$body             = preg_replace('/\\\\/','', $body);

	$mail->IsSMTP();
	$mail->SMTPDebug = 2;
	$mail->SMTPAuth   = true;
	$mail->Port       = 465;
	$mail->Host       = "mail.aguascreativas.com";
	$mail->Username   = "wbaldo@aguascreativas.com";
	$mail->Password   = "$%&1$%&2$%&3$%&4$%&5$%&6";
	$mail->SMTPSecure = 'ssl';

	$mail->AddReplyTo("wbaldo@aguascreativas.com","Nombre");

	$mail->From       = "wbaldo@aguascreativas.com";
	$mail->FromName   = "Nombre";

	$to = "uniconombre14@gmail.com";

	$mail->AddAddress($to);

	$mail->Subject  = "Test de funcionamiento";

	$mail->AltBody    = "Esto es un test de funcionamiento"; // optional, comment out and test
	$mail->WordWrap   = 80;

	$mail->MsgHTML($body);

	$mail->IsHTML(true);

	$mail->Send();
	echo 'Mensaje enviado.';
} catch (phpmailerException $e) {
	echo $e->errorMessage();
}
?>