<?php
    session_start();
    $_SESSION["casa"] =(isset($_POST['btn']) && $_POST["btn"] != "")? $_POST['btn'] : false;
    echo  $_SESSION["casa"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obtain casa</title>
    <script src="../casas.js"></script>
</head>
<body>

</body>
</html>