<?php
header('Content-Type: application/json');

$conexion = new mysqli("localhost", "root", "", "nombre_bd");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$sql = "SELECT id, usuario FROM usuarios";
$resultado = $conexion->query($sql);

$usuarios = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $usuarios[] = $fila;
    }
}

echo json_encode($usuarios);

$conexion->close();
?>
