<?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "Error!";
}
$name = $_POST['nombre'];
$visitor_email = $_POST['email'];
$message = $_POST['mensaje'];

//Validate first
if(empty($name)||empty($visitor_email)) 
{
    echo "Es necesario ingresar un nombre para identificarse y una dirección de correo electronico.";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Dirección de correo invalida";
    exit;
}

$email_from = 'mauro.cifuentes88@gmail.com';//<== update the email address
$email_subject = "Nuevo formulario completado en pagina web";
$email_body = "Ha recibido un nuevo mensaje del visitante: $name.\n".
    "Mensaje:\n $message".
    
$to = "mauro.cifuentes88@gmail.com";//<== update the email address
$headers = "From: $visitor_email \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header('Location: gracias.html');


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 