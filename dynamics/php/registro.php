<?php
    session_start();
    $_SESSION["casa"] = $_COOKIE["casachida"];
    echo $_SESSION["casa"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
    <script src="../js/registro.js"></script>
</head>
<body>
    <h1>hola</h1>
</body>
</html>