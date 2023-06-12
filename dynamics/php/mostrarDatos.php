<?php
function mostrarDatos()
{
require_once "./config.php";
connect();

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
?>

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
