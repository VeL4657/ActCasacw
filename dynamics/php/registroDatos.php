<?php
require_once "./config.php";
$conexion = connect();

//Funcion de sanitizar (funciona)
function sanitas($data){
    $data = trim(stripslashes(htmlspecialchars($data)));
    return $data;
}

function generarSal(){
    //Aqui va la logica de sal
    
}

function generarHash($contra, $sal){
    // Aqui hash

}
//Sanitización de datos(funciona)
$nombreRe = isset($_POST["nombreRe"]) ? sanitas($_POST["nombreRe"]) : "";
$nombreUsuarioRe = isset($_POST["nombreUsuarioRe"]) ? sanitas($_POST["nombreUsuarioRe"]) : "";
$contraRe = isset($_POST["contraRe"]) ? trim(stripslashes($_POST["contraRe"])) : "";
$confirmarContraRe = isset($_POST["confirmarContraRe"]) ? trim(stripslashes($_POST["confirmarContraRe"])) : "";
$nombreUsuarioIn = isset($_POST["nombreUsuarioIn"]) ? sanitas($_POST["nombreUsuarioIn"]) : "";
$contraIn = isset($_POST["contraIn"]) ? trim(stripslashes($_POST["contraIn"])) : "";

$nombreRe = mysqli_real_escape_string($conexion, $nombreRe);
$nombreUsuarioRe = mysqli_real_escape_string($conexion, $nombreUsuarioRe);
$contraRe = mysqli_real_escape_string($conexion, $contraRe);
$confirmarContraRe = mysqli_real_escape_string($conexion, $confirmarContraRe);

//Guardar contraseña (sólo de prueba), reemplazar con HASH(funciona)
if ($contraRe === $confirmarContraRe) {
    $sql = "INSERT INTO Usuarios (Nombre, Usuario, Contra) VALUES ('$nombreRe', '$nombreUsuarioRe', '$contraRe')";
    mysqli_query($conexion, $sql);
}

mysqli_close($conexion);

/*
 * Hasheo contraseñas, tambien tienen que agregar la verificacion de hash en validarIn.php.
 * Este trozo de código guarda la contraseña correctamente en ContraPass y recupera su ID para guardarlo en Usuarios.
 * (funciona)
 * if ($contraRe === $confirmarContraRe) {
    $sal = generarSal();
    $hash = generarHash($contraRe, $sal);

    $sql = "INSERT INTO ContraPass (ContraHashh, Sal) VALUES ('$hash', '$sal')";
    mysqli_query($conexion, $sql);

    $contraId = mysqli_insert_id($conexion);

    $sql = "INSERT INTO Usuarios (Nombre, Usuario, ContraID) VALUES ('$nombreRe', '$nombreUsuarioRe', $contraId)";
    mysqli_query($conexion, $sql);
}
 */
