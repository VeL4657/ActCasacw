<?php
function sanitas($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


$nombreRe = isset($_POST["nombreRe"]) ? sanitas($_POST["nombreRe"]) : "";
$nombreUsuarioRe = isset($_POST["nombreUsuarioRe"]) ? sanitas($_POST["nombreUsuarioRe"]) : "";
$contraRe = isset($_POST["contraRe"]) ? trim(stripslashes($_POST["contraRe"])) : "";
$confirmarContraRe = isset($_POST["confirmarContraRe"]) ? trim(stripslashes($_POST["confirmarContraRe"])) : "";
$nombreUsuarioIn = isset($_POST["nombreUsuarioIn"]) ? sanitas($_POST["nombreUsuarioIn"]) : "";
$contraIn = isset($_POST["contraIn"]) ? trim(stripslashes($_POST["contraIn"])) : "";

?>