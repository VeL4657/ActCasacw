<?php
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

    //Si usan MariaDB cambien los datos de HOST, USER, PASS y DB y tambien el picoparentesis por -r
    function generarRespaldo()
    {
        $command = "mysqldump -u" . USER . " -p" . PASS . " " . DB . " > " . RUTA.nRespaldo;

        system($command, $output);

        if ($output !== 0) {
            echo 'Ocurrió un error al crear el respaldo de la base de datos.';
        }
    }