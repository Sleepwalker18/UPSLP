<?php
require 'conexion.php';
$sql = "SELECT * FROM Eventos ";
$result = $conn->query($sql);
$i=0;
$j=0;
while($row = $result->fetch_assoc()) {
    $eventos[$j].=$row["nombre_evento"];
	$i++;
    if($i%4==0){
        $j++;
    }
    else
    {
        $eventos[$j].=" , ";
    }

}
while($j<6)
{
    $j++;
    $eventos[$j]="Mampara sin anuncios"; 
}
   $j=0;
$sql = "SELECT * FROM Mampara ";
$result = $conn->query($sql);
echo "<table>";
if ($result->num_rows > 0) {
echo "<tr> <td>Mampara</td> <td>Medidas </td> <td>Ubicacion</td><td>Zona </td><td>Eventos Anunciados <tr/> <br>";
while($row = $result->fetch_assoc()) {
	echo  "<tr> <td>" . ($row["id_mampara"]-1). " </td> <td>" . $row["medidas"]. " </td> <td>" . $row["ubicacion"]." </td>    <td>" . $row["zona"]. " </td>  <td>" . $eventos[$j]. " </td></tr> " ;
	$j++;
}
echo "</table>";	
}
 else {
    echo "0 results";
 }



$conn->close();
?>
