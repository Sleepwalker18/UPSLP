<?php
require 'conexion.php';
session_start();
$event=$_SESSION['evento'];
$sql = "SELECT * FROM Eventos WHERE nombre_evento='$event'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
$cantidad=$row["boletos_disponibles"]-$_SESSION['boletos'];
$dinero=$row["monto_recabado"]+$_SESSION['dinero'];
$sql = "UPDATE  Eventos SET boletos_disponibles='$cantidad' WHERE nombre_evento='$event' ";
if ($conn->query($sql) === TRUE) {
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE  Eventos SET monto_recabado='$dinero' WHERE nombre_evento='$event' ";
if ($conn->query($sql) === TRUE) {
    echo"<script type=text/javascript>
		alert('Reservación completada');
		window.location.assign('http://eventsanluis.0fees.us/tickets.php');
		</script>";
} else {
    echo "Error updating record: " . $conn->error;
}
}
?>