<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'autenticacion');

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Comprobar si se está enviando una solicitud POST (es decir, si se está intentando registrar un usuario)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Encriptar la contraseña

    // Insertar el nuevo usuario en la base de datos
    $sql = "INSERT INTO usuarios (usuario, contrasena) VALUES ('$usuario', '$contrasena')";
    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
