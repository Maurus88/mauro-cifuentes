<?php
error_reporting(0);
$nombre = S_POST['name'];
$correo_electronico = $_POST['email'];
$mensaje = $_POST['message'];
$header = 'From:' .$email.;
$header .= "X-Mailer:PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Este mensaje fue enviado por:" .$name. "\r\n";
$mensaje .= "Correo electronico:" .$email. "\r\n";
$mensaje .= "Mensaje:" .$_POST['message]´. "\r\n";
$mensaje .= "Enviado el:" .date('d/m/Y', time());

$para = mauro.cifuentes88@gmail.com;
$asunto = "Formulario de pagina web de Mauro Cifuentes";

mail($para, $asunto, utf8_decode($mensaje), $header);

echo 'Mensaje enviado correctamente, pronto lo/a estaré contactando';

?>