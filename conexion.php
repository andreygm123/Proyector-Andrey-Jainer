
<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$bdname = "bd_usuarios";

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $bdname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error); // Muestra el error de conexión
}

?>
