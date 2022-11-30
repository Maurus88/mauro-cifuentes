<?php

if ($_POST['g-recaptcha-response'] == '') {
echo "Captcha invalido";
} else {
$obj = new stdClass();
$obj->secret = "6LfO1kcjAAAAADO0Koptb10ccp8ogAmwcU-Ozrnh";
$obj->response = $_POST['g-recaptcha-response'];
$obj->remoteip = $_SERVER['REMOTE_ADDR'];
$url = 'https://www.google.com/recaptcha/api/siteverify';

$options = array(
'http' => array(
'header' => "Content-type: application/x-www-form-urlencoded\r\n",
'method' => 'POST',
'content' => http_build_query($obj)
)
);
$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

$validar = json_decode($result);

/*  FIN DE CAPTCHA   */

if ($validar->success) {
$nombre = $_POST['name'];
$email = $_POST['email'];
$mensaje = $_POST['message'];

$rta = mail('mauro.cifuentes88@gmail.com', "Mensaje desde la web de: $nombre", $mensaje);
var_dump($rta);

?
>
