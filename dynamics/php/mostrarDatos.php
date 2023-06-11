<?php
session_start();

const HOST="localhost";
const USER="danibutnotdani";
const PASS="danibutnotdani";
const DB="baseCasas";

const RUTA = "../../docs/sql/";
const nRespaldo = "baseCasas.sql";

function connect(){
    $conexion = mysqli_connect(HOST,USER,PASS,DB);

    if(!$conexion){
        echo "Error: No se pudo conectar a MySQL. <br> ";
        echo "Error: " . mysqli_connect_errno() ."<br>";
        echo "Error: " . mysqli_connect_error() . "<br>";
        exit;
    }
    return $conexion;
}

function generarRespaldo(){
    $command = "mysqldump -u" . USER . " -p" . PASS . " " . DB . " > " . RUTA.nRespaldo;
    system($command, $output);
    if ($output !== 0) {
        echo 'Ocurrió un error al crear el respaldo de la base de datos.';
    }
}
function mostrarDatos(){
    $conexion = connect();
    $sql = "SELECT Nombre, Usuario, CasaID, Puntos FROM Usuarios";
    $result = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["Nombre"] . "</td>";
            echo "<td>" . $row["Usuario"] . "</td>";
            if ($row["CasaID"] == 1){
                echo "<td>" . "Ajolotes" . "</td>";
            } elseif ($row["CasaID"] == 2){
                echo "<td>" . "Halcones" . "</td>";
            } elseif ($row["CasaID"] == 3){
                echo "<td>" . "Teporingos" . "</td>";
            }
            echo "<td>" . $row["Puntos"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "0 resultados";
    }
    mysqli_close($conexion);
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
    generarRespaldo();
    mostrarDatos();
    ?>
</table>
<button onclick="window.location.href = './paginaPrincipal'">Realizar Otra Acción</button>
</body>
</html>
