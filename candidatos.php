<?php 
include('conexion.php');
$sql = "SELECT id, nombre FROM candidato";
$result = $conn->query($sql);
$conn->close();
?>