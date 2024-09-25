<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'autenticacion');

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Comprobar si se está enviando una solicitud POST (es decir, si se está intentando iniciar sesión)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Buscar al usuario en la base de datos
    $sql = "SELECT contrasena FROM usuarios WHERE usuario='$usuario'";
    $result = $conn->query($sql);

    // Verificar si el usuario existe
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verificar si la contraseña es correcta
        if (password_verify($contrasena, $row['contrasena'])) {
            echo "Autenticación satisfactoria.";
        } else {
            echo "Error en la autenticación.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
