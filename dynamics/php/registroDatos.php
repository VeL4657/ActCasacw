<?php
require_once "./config.php";
$conexion = connect();

//Funcion de sanitizar (funciona)
function sanitas($data){
    $data = trim(stripslashes(htmlspecialchars($data)));
    return $data;
}

function generarSal(){
    //GENERAMOS: sal
    $sal = uniqid();
    return $sal;
}
function generarHash($contra,$sal){
    //GENERAMOS: pimienta
        $carac = str_split("ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz");
        $carac_p = array_rand ($carac, 2);
        $pimientaCHAR1 = $carac[$carac_p[0]];
        $pimientaCHAR2 = $carac[$carac_p[1]];
        $pimienta = $pimientaCHAR1.$pimientaCHAR2;
    // unimos todo
        $contraseña = $contra.$pimienta.$sal;     
    //hash completo
    $hash = hash("SHA256", $contraseña);
    return $hash;
}

//Sanitización de datos(funciona)
$nombreRe          = isset($_POST["nombreRe"])          ? sanitas (             $_POST["nombreRe"])           : "";
$nombreUsuarioRe   = isset($_POST["nombreUsuarioRe"])   ? sanitas (             $_POST["nombreUsuarioRe"])    : "";
$contraRe          = isset($_POST["contraRe"])          ? trim    (stripslashes($_POST["contraRe"]))          : "";
$confirmarContraRe = isset($_POST["confirmarContraRe"]) ? trim    (stripslashes($_POST["confirmarContraRe"])) : "";
$nombreUsuarioIn   = isset($_POST["nombreUsuarioIn"])   ? sanitas (             $_POST["nombreUsuarioIn"])    : "";
$contraIn          = isset($_POST["contraIn"])          ? trim    (stripslashes($_POST["contraIn"]))          : "";

$nombreRe          = mysqli_real_escape_string($conexion, $nombreRe);
$nombreUsuarioRe   = mysqli_real_escape_string($conexion, $nombreUsuarioRe);
$contraRe          = mysqli_real_escape_string($conexion, $contraRe);
$confirmarContraRe = mysqli_real_escape_string($conexion, $confirmarContraRe);


/*
 * Hasheo contraseñas, tambien tienen que agregar la verificacion de hash en validarIn.php.
 * Este trozo de código guarda la contraseña correctamente en ContraPass y recupera su ID para guardarlo en Usuarios.
 * (funciona)
 */
if ($contraRe === $confirmarContraRe) {
    
    $sal = generarSal();
    $hash = generarHash($contraRe, $sal);

    $sql = "INSERT INTO ContraPass (ContraHashh, Sal) VALUES ('$hash', '$sal')";
    mysqli_query($conexion, $sql);

    $contraId = mysqli_insert_id($conexion);

    $sql = "INSERT INTO Usuarios (Nombre, Usuario, ContraID) VALUES ('$nombreRe', '$nombreUsuarioRe', $contraId)";
    mysqli_query($conexion, $sql);

    session_start();
    $_SESSION["UsuarioID"] = mysqli_insert_id($conexion);
}

mysqli_close($conexion);

