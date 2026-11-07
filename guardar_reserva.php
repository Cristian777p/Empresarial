
<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: Rerserva.html");
    exit;
}

$nombre = trim($_POST["name"] ?? "");
$correo = trim($_POST["email"] ?? "");
$personas = (int) ($_POST["guests"] ?? 0);
$entrada = $_POST["checkin"] ?? "";
$salida = $_POST["checkout"] ?? "";
$habitacion = $_POST["room"] ?? "";
$comentarios = trim($_POST["message"] ?? "");

if (
    $nombre === "" ||
    !filter_var($correo, FILTER_VALIDATE_EMAIL) ||
    $personas < 1 ||
    $entrada === "" ||
    $salida === "" ||
    $salida <= $entrada ||
    !in_array($habitacion, ["single", "double", "suite"], true)
) {
    die("Error: Verifique los datos de la reservacion.");
}

require "conexion.php";

$sql = "INSERT INTO reservas
        (nombre, correo, personas, fecha_entrada,
         fecha_salida, tipo_habitacion, comentarios)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);

$stmt->bind_param(
    "ssissss",
    $nombre,
    $correo,
    $personas,
    $entrada,
    $salida,
    $habitacion,
    $comentarios
);

$stmt->execute();

header("Location: listar_reservas.php");
exit;
