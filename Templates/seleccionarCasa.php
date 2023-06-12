<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Statics/Styles/select.css">
    <script src="../dynamics/js/casas.js"></script>
    <title>Seleccionar Casa</title>
</head>
<body>
<header id="barrat">Selecciona tu casa</header>
<main>
    <form action="../dynamics/php/obtaincasa.php" method="POST" target="_self">

        <button type="submit" value="1" class="btn" name="btn">
            <img src="../Statics/Assets/Media/botonajsf.png" alt="btn">
        </button>
        <button type="submit" value="2" class="btn" name="btn">
            <img src="../Statics/Assets/Media/btnhasf.png" alt="btnha">
        </button>
        <button type="submit" value="3" class="btn" name="btn">
            <img src="../Statics/Assets/Media/botontepsf.png" alt="btnha">
        </button>
    </form>

</main>
</body>
</html>