<?php
header('Content-Type: application/json');

$conexion = new mysqli("localhost", "root", "", "nombre_bd");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$id = $_POST['id'];

$sql = "DELETE FROM usuarios WHERE id='$id'";

if ($conexion->query($sql) === TRUE) {
    echo json_encode(["mensaje" => "Usuario eliminado correctamente"]);
} else {
    echo json_encode(["mensaje" => "Error al eliminar usuario: " . $conexion->error]);
}

$conexion->close();
?>
