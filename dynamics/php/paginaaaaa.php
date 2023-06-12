<!DOCTYPE html>
<html>
<head>
        <title>Pagina principal</title>
    	<link rel="stylesheet" href="../../Statics/Styles/paginaaa.css" type="text/css">
</head>
<body>

    <h1>BIENVENIDX , USUARIO </h1>
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