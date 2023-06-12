<?php
session_start();

require_once "./config.php";

$conexion = connect();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT ContraHashh FROM Usuarios INNER JOIN ContraPass ON Usuarios.ContraID = ContraPass.ContraID WHERE Usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $storedPassword = $row['ContraHashh'];

    if ($password === $storedPassword) {
        $_SESSION['username'] = $username; // Guarda el username en la sesión
        echo '1';
    } else {
        echo '0';
    }
} else {
    echo '0';
}

mysqli_close($conexion);


/*if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashPassword = $row['ContraHashh'];

    if (password_verify($password, $hashPassword)) {
        echo '1';
    } else {
        echo '0';
    }
} else {
    echo '0';
}*/