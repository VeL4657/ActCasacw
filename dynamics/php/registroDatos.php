<?php
require_once "./config.php";

function mostrarDatos(){
    $conexion = connect();
    $sql = "SELECT Nombre, Usuario, CasaID, Puntos FROM Usuarios";
    $result = mysqli_query($conexion, $sql);
    $datos = array();

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $datos[] = $row;
        }
    } else {
        echo "0 resultados";
    }
    mysqli_close($conexion);

    return $datos;
}
function sanitas($data){
    $data = trim(stripslashes(htmlspecialchars($data)));
    return $data;
}

if (isset($_POST["nombreRe"]) && isset($_POST["nombreUsuarioRe"]) && isset($_POST["contraRe"]) && isset($_POST["confirmarContraRe"])) {
    $nombreRe = isset($_POST["nombreRe"]) ? sanitas($_POST["nombreRe"]) : "";
    $nombreUsuarioRe = isset($_POST["nombreUsuarioRe"]) ? sanitas($_POST["nombreUsuarioRe"]) : "";
    $contraRe = isset($_POST["contraRe"]) ? trim(stripslashes($_POST["contraRe"])) : "";
    $confirmarContraRe = isset($_POST["confirmarContraRe"]) ? trim(stripslashes($_POST["confirmarContraRe"])) : "";
}
elseif (isset($_POST["nombreUsuarioIn"]) && isset($_POST["contraIn"])) {
    $nombreUsuarioIn = isset($_POST["nombreUsuarioIn"]) ? sanitas($_POST["nombreUsuarioIn"]) : "";
    $contraIn = isset($_POST["contraIn"]) ? trim(stripslashes($_POST["contraIn"])) : "";
}

echo $nombreRe, $nombreUsuarioRe, $contraRe, $confirmarContraRe;



