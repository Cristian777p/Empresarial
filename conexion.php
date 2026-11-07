
<?php

$servidor = "127.0.0.1";
$usuario = "root";
$contrasena = getenv("DB_PASSWORD") ?: "";
$base_datos = "empresarial_db";
$puerto = 3307;

try {
    $conexion = new mysqli(
        $servidor,
        $usuario,
        $contrasena,
        $base_datos,
        $puerto
    );

    $conexion->set_charset("utf8mb4");

} catch (mysqli_sql_exception $e) {
    die("Error al conectar con MySQL.");
}
