<?php
require_once "./config.php";
//Funciona, es la conexión que hace Main.Js con PHP para ver si el usuario existe
//NO MOVER NADA
$conexion = connect();

$username = $_POST['username'];
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
