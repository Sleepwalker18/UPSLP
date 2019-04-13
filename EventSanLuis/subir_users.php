<?php
require 'conexion.php';
$name=$_POST['name'];
$ape=$_POST['ape'];
$date=$_POST['date'];
$RFC=$_POST['RFC'];
$tel=$_POST['tel'];
$genero=$_POST['genero'];
$email=$_POST['email'];
$user=$_POST['user'];
$pass=$_POST['pass'];
$dir=$_POST['dir'];
$sql = "INSERT INTO Cliente
(nombre,apellidos,genero,fec_nac,RFC,telefono,email,user,password,direccion)
VALUES ('$name','$ape','$genero','$date','$RFC','$tel','$email','$user','$pass','$dir')";
if ($conn->query($sql) === TRUE) {
echo"<script type=text/javascript>
						alert('Cuenta Creada');
						window.location.assign('http://eventsanluis.0fees.us/tickets.php');
					</script>";
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
