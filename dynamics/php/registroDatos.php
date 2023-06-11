<?php
require_once "./config.php";

connect();

function sanitas($data)
{
    $data = trim(stripslashes(htmlspecialchars($data)));
    return $data;
}

function generarSal()
{
    //Aqui va la logica de sal
}

function generarHash($contra, $sal)
{
    // Aqui hash
}

function mostrarDatos()
{
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

function registroDatos()
{
    $conexion = connect();

    if (isset($_POST["nombreRe"]) && isset($_POST["nombreUsuarioRe"]) && isset($_POST["contraRe"]) && isset($_POST["confirmarContraRe"])) {
        $nombreRe = sanitas($_POST["nombreRe"]);
        $nombreUsuarioRe = sanitas($_POST["nombreUsuarioRe"]);
        $contraRe = sanitas($_POST["contraRe"]);
        $confirmarContraRe = sanitas($_POST["confirmarContraRe"]);

        $nombreRe = mysqli_real_escape_string($conexion, $nombreRe);
        $nombreUsuarioRe = mysqli_real_escape_string($conexion, $nombreUsuarioRe);
        $contraRe = mysqli_real_escape_string($conexion, $contraRe);
        $confirmarContraRe = mysqli_real_escape_string($conexion, $confirmarContraRe);

        if ($contraRe === $confirmarContraRe) {
            $sal = generarSal();
            $hash = generarHash($contraRe, $sal);

            $sql = "INSERT INTO ContraPass (ContraHashh, Sal) VALUES ('$hash', '$sal')";
            mysqli_query($conexion, $sql);

            $contraId = mysqli_insert_id($conexion);

            $sql = "INSERT INTO Usuarios (Nombre, Usuario, ContraID) VALUES ('$nombreRe', '$nombreUsuarioRe', $contraId)";
            mysqli_query($conexion, $sql);
        }
    }
    mysqli_close($conexion);
}

