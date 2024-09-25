<?php
header('Content-Type: application/json');

$conexion = new mysqli("localhost", "root", "", "nombre_bd");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$id = $_POST['id'];
$nuevo_usuario = $_POST['nuevo_usuario'];
$nueva_contrasena = $_POST['nueva_contrasena'];

$sql = "UPDATE usuarios SET usuario='$nuevo_usuario', contrasena='$nueva_contrasena' WHERE id='$id'";

if ($conexion->query($sql) === TRUE) {
    echo json_encode(["mensaje" => "Usuario actualizado correctamente"]);
} else {
    echo json_encode(["mensaje" => "Error al actualizar usuario: " . $conexion->error]);
}

$conexion->close();
?>
