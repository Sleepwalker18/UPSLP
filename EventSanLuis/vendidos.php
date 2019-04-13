<?php
require 'conexion.php';
// sql to delete a record
$sql = "SELECT * FROM Eventos ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
     echo 
          "Nombre:".$row["nombre_evento"]."<br>"
          ."Boletos vendidos:". (500-$row["boletos_disponibles"])." de 500<br>"
          ."Monto Recabado: $". $row["monto_recabado"]."<br><br>";
}

}
$conn->close();
?>