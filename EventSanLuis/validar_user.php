<?php
require 'conexion.php';
$user=$_POST['user'];
$pass=$_POST['pass'];
session_start();
$sql = "SELECT * FROM Cliente where user='$user' AND password='$pass' " ;
    $result = $conn->query($sql);
	if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
        $nombre=$row["nombre"];
        $_SESSION['usuario']=$user;
		echo"<script type=text/javascript>
		alert('Bienvenido $nombre');
		window.location.assign('http://eventsanluis.0fees.us/tickets.php');
		</script>";
	}
	else
	{
echo"<script type=text/javascript>
		alert('Datos Incorrectos');
		window.location.assign('http://eventsanluis.0fees.us/tickets.php');
		</script>";
	}

$conn->close();
?>


