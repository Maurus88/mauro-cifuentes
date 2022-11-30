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
$email = trim($_POST['email']);
$nombre = trim($_POST['name']);
$comentario = trim($_POST['message']);

$consulta = "E-mail: " . $email . " Nombre: " . $name . "Comentario: " . $message;

mail("mauro.cifuentes88@gmail.com", "Contacto desde Formulario", $consulta);
} else {
echo "Captcha invalido";
}
}
?>