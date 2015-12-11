<?php
	$nombre = $_POST['nombre'];
	$telefono = $_POST['telefono'];
	$email = $_POST['email'];
	$mensaje = $_POST['mensaje'];
	$para = 'mitacquispejuliocesar@gmail.com';
	$titulo = 'ASUNTO DEL MENSAJE';
	$header = 'From: ' . $email;
	$msjCorreo = "Nombre: $nombre\n Telefono: $telefono\n E-Mail: $email\n Mensaje:\n $mensaje";

if ($_POST['submit'])
{
	if (mail($para, $titulo, $msjCorreo, $header)) {
	echo "<script language='javascript'>
	alert('Mensaje enviado, muchas gracias.');
	window.location.href = 'http://imecoservice.com/william/';
	</script>";
	} else {
	echo 'Falló el envio';
	}
}
?>