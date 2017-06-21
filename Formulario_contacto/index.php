<?php 	
/// el simbolo "!" se utiliza para decir "Si no hay algo"
/// por ejemplo if(!empty($mensaje)) dice "si no esta vacio el campo mensaje"
$errores='';
$enviado='';

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mensaje = $_POST['mensaje'];

	if(!empty($name)){
		$name = trim($name);
		$name	= filter_var($name, FILTER_SANITIZE_STRING);
	} else  {
		$errores .= 'Por favor ingresa un nombre <br/>';	
	}
	if (!empty ($email)) {
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errores .='Por favor ingresa un correo valido <br/>';
		}
	} else {
		$errores .='Por favor ingresa un correo <br/> ';
	}

	if (!empty($message)) {
		$message = htmlspecialchars($message);
		$message = trim($message);
		$message = stripcslashes($message);
	} else{
		$errores .='Por favor ingresa mensaje <br/>';
	}
	if (!$errores) {
		$enviar_a ='earp519@hotmail.com';
		$asunto = 'correo enviado desde mi formulario de pagina';
		$mensaje_preparado ="de: $name \n";
		$mensaje_preparado .= "Correo: $email \n ";
		$mensaje_preparado .= "Mensaje: ". $message;

		mail($enviar_a, $asunto, $mensaje_preparado);
		$enviado ='true';	
	}
}

require 'index.view.php';
 ?>