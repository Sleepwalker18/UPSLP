<!DOCTYPE html>
<html lang="es"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
<title> Enviado </title>
  </head>

<?php
$destino ="150357@upslp.edu/mx";
$asunto = "Ayuda";
$cabeceras = "Content-type: text/html";
$cuerpo ="Hola, alguien te ha contactado por el formulario Web de tu sitio<br>
Los datos enviados son los siguientes:<br>
<b>Nombre:</b>$nombre<br>
<b>email:</b>$email<br>
Y envio el siguiente comentario: <hr>
<pre>
$comentario
</pre>";
mail($destino,$asunto,$cuerpo,$cabeceras);

?>
<script type=text/javascript>
alert('Se ha enviado el mensaje correctamente');
		window.location.assign('http://eventsanluis.0fees.us/ayuda.php');
		</script>