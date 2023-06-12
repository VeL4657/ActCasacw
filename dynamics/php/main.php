<?php
    session_start();
    $_SESSION["casa"] =(isset($_POST['btn']) && $_POST["btn"] != "")? $_POST['btn'] : false;
    if  ($_SESSION["casa"]=="ajolotes"){
        echo '<link rel="stylesheet" href="../../Statics/Styles/ajolotes.css">';
        echo '<link rel="icon" href="https://cdn-icons-png.flaticon.com/512/390/390280.png">';
    }
    else{
        if  ($_SESSION["casa"]=="halcones"){
            echo '<link rel="stylesheet" href="../../Statics/Styles/halcones.css">';
            echo '<link rel="icon" href="https://i.pinimg.com/736x/c3/87/4e/c3874e3785b92afd7071c87a9c319af4.jpg">';
        }
        else{
            if  ($_SESSION["casa"]=="teporingos")
            {
                echo '<link rel="stylesheet" href="../../Statics/Styles/tepos.css">';
                echo '<link rel="icon" href="https://akns-images.eonline.com/eol_images/Entire_Site/2015913/rs_634x1024-151013043634-634.Playboy-Bunny-JR-101315.jpg?fit=around%7C634:1024&output-quality=90&crop=634:1024;center,top">';
            }
        }
    }

    function generarSal(){
        //GENERAMOS: sal
        $sal = uniqid();
        return $sal;
    }
    function generarHash($contra,$sal){
        //GENERAMOS: pimienta
            $carac = str_split("ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz");
            $carac_p = array_rand ($carac, 2);
            $pimientaCHAR1 = $carac[$carac_p[0]];
            $pimientaCHAR2 = $carac[$carac_p[1]];
            $pimienta = $pimientaCHAR1.$pimientaCHAR2;
        // Aqui hash solamente de contraseña
            $contraHasheada = hash("SHA256", $contra);
        //hash completo
            $hash = $contraHasheada.$pimienta.$sal;
        return $hash;
    }
    $contraRe="#gato123";
    $sal = generarSal();
    $hash = generarHash($contraRe, $sal);
    echo $hash;
    echo "<br>16b1176bd9f157a4ebc917e2362aae3fc07c703707731aededd8fbe5ceeabf51in648766690f8dc";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>

</head>
<body>

    <div id="titulo"><h1>BIENVENIDX , USUARIO </h1></div>
    <p class="tuspuntos">Tienes un total de : numero puntos!</p>
    <div class= "cuadrito">
    <button class="sumar" id='aumentar' onclick="aumentar()">+</button>
    <button class="restar" id='disminuir' onclick="disminuir()">-</button>
    <input type='text' id="cantidad" value="0">
    <button class="enviar" >Enviar</button>
    </div>
    <p class= "casa">Perteneces a la casa: casa </p>
    <p class="puntaje" >Tu casa tiene un total de : numero puntos </p>
    
    <?php
			$dato =$_POST;
	?>
<script>
    var inicio = 0; 
    function aumentar(){ 
    var cantidad = document.getElementById('cantidad').value = ++inicio;
    }

    function disminuir(){ 
    var cantidad = document.getElementById('cantidad').value = --inicio; 
    }
</script>
</body>
</html>