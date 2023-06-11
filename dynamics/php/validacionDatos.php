<?php
require_once "./config.php";

$conexion = connect();

$username = $_GET['username'];
$sql = "SELECT Usuario FROM Usuarios WHERE Usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo '1';
} else {
    echo '0';
}
mysqli_close($conexion);

