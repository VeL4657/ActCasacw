<?php
session_start();

//Dejar con require_once y no con include (prevencion de errores)(funciona)
require_once "./config.php";

$conexion = connect();

$username = $_POST['username'];
$password = $_POST['password'];

//Busca los datos (Verificar si funciona)
$sql = "SELECT ContraHashh FROM Usuarios INNER JOIN ContraPass ON Usuarios.ContraID = ContraPass.ContraID WHERE Usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $storedPassword = $row['ContraHashh'];

    if ($password === $storedPassword) {
        // Guarda el username en la sesión y genera una sesión que usar en página principal
        $_SESSION['username'] = $username;
        echo '1';
    } else {
        echo '0';
    }
} else {
    echo '0';
}

mysqli_close($conexion);


/*Para usar cuando configuren hash, antes no porque da error
(funciona)*/

// if ($result->num_rows > 0) {
//     $row = $result->fetch_assoc();
//     $hashPassword = $row['ContraHashh'];

//     if (password_verify($password, $hashPassword)) {
//         echo '1';
//     } else {
//         echo '0';
//     }
// } else {
//     echo '0';
// }

function hashearContra(){
    $contraHasheada = hash("SHA256", $contra);
    return  $contraHasheada;
}

function verificar_contra ($password, $hashDB, $sal){
    $verificacion = false;
    
    $caracteres = str_split("ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz");
    
    for ($i=0; $i < count($caracteres); $i++) { 
        for ($j=0; $j < count($caracteres); $j++) { 
            $pimienta = $caracteres[$i].$caracteres[$j];

            $contraseña = $password.$pimienta.$sal;

            if(hashearContra ($contraseña) == $hashDB){
                $verificacion = true;
                break 3;
            }
        }
    }
    return $verificacion;
}