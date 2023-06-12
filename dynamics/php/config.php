<?php
    const HOST="localhost";
    const USER="root";
    const PASS="";
    const DB="baseCasas";

    const RUTA = "C:\xampp\mysql\bin\mysqldump.exe";
    const nRespaldo = "C:\xampp\htdocs\php\ActCasacw\docs\sql\BaseMACasas.sql";
    
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
        $command = "C:\xampp\mysql\bin\mysqldump.exe -u" . USER . " -p" . PASS . " " . DB . " > " .nRespaldo;

        system($command, $output);

        if ($output !== 0) {
            echo 'Ocurrió un error al crear el respaldo de la base de datos.';
        }
    }