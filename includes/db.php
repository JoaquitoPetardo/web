<?php
// includes/db.php
// Conexión básica MySQLi para entorno local (Laragon)

$servername = "localhost";
$username   = "root";    // usuario por defecto en Laragon
$password   = "";        // contraseña por defecto en Laragon
$dbname     = "steamdb"; // nombre de la base de datos que creaste

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Revisar conexión
if ($conn->connect_error) {
    // Para desarrollo: muestra el error (en producción no mostrar errores así)
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Opcional: fijar conjunto de caracteres
$conn->set_charset("utf8mb4");
?>