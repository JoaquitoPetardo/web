<?php
// test_db.php -> prueba de conexión (seguro para desarrollo)
require_once __DIR__ . '/includes/db.php';

$sql = "SELECT 1 as ok";
$res = $conn->query($sql);

if ($res && $res->fetch_assoc()['ok'] == 1) {
    echo "✅ Conexión correcta a la base de datos (steamdb).";
} else {
    echo "❌ Falló la consulta de prueba. Detalle: " . $conn->error;
}
?>