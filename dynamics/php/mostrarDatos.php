<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Listado de casas:</title>
    <link rel="stylesheet" type="text/css" href="../../Statics/Styles/styleDa.css">
</head>
<body>
<h1>Listado de usuarios</h1>
<table>
    <tr>
        <th>Nombre</th>
        <th>Usuario</th>
        <th>Casa</th>
        <th>Puntos</th>
    </tr>
    <?php
    require_once './registroDatos.php';
    $usuarios = mostrarDatos();
    foreach($usuarios as $usuario) {
        echo "<tr>";
        echo "<td>" . $usuario["Nombre"] . "</td>";
        echo "<td>" . $usuario["Usuario"] . "</td>";
        if ($usuario["CasaID"] == 1){
            echo "<td>" . "Ajolotes" . "</td>";
        } elseif ($usuario["CasaID"] == 2){
            echo "<td>" . "Halcones" . "</td>";
        } elseif ($usuario["CasaID"] == 3){
            echo "<td>" . "Teporingos" . "</td>";
        }
        echo "<td>" . $usuario["Puntos"] . "</td>";
        echo "</tr>";
    }
    ?>
</table>
<button onclick="window.location.href = './paginaPrincipal'">Realizar Otra Acción</button>
</body>
</html>
