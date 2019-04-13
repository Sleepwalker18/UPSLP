<?php
require 'conexion.php';
$name=$_POST['name'];
$ubicacion=$_POST['ubi'];
$cost=$_POST['precio'];
$salar=$_POST['salas'];
$tipo=$_POST['tipo'];
$date=$_POST['fecha'];
 if($tipo=="Cultural" AND $salar >1){
 echo"<script type=text/javascript>
		alert('Un evento cultural no puede tener mas de una sala');
		window.location.assign('http://eventsanluis.0fees.us/no-sidebar.php');
		</script>";
}
else if(is_numeric($salar)==false OR  is_numeric($cost)==false){
 echo"<script type=text/javascript>
		alert('Error:Datos no numericos');
		window.location.assign('http://eventsanluis.0fees.us/no-sidebar.php');
		</script>";
}
else{
$sql = "SELECT * FROM Lugares where id_sala='$ubicacion' " ;
    $result = $conn->query($sql);
	if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
        $cantidad=$row["capacidad"];
	}
$capacidad=500;
$sql = "INSERT INTO Eventos
(nombre_evento,ubicacion,precio,num_salas,tipo_lugar,fecha,boletos_disponibles)
VALUES ('$name','$ubicacion','$cost','$salar','$tipo','$date','$capacidad')";
if ($conn->query($sql) === TRUE) {
echo"<script type=text/javascript>
						alert('Evento registrado');
						window.location.assign('http://eventsanluis.0fees.us/no-sidebar.php');
					</script>";
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
?>
