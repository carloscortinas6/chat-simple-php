<?php

include "db.php";

?>


<!DOCTYPE html>
<html>
<head>
<title>Mi primer chat</title>
<link rel="stylesheet" type="text/css" href="estilos.css">
<script type="text/javascript">
  
		function ajax(){
			var req = new XMLHttpRequest();

			req.onreadystatechange = function(){
				if (req.readyState == 4 && req.status == 200) {
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}

			req.open('GET', 'chat.php', true);
			req.send();
		}

		//linea que hace que se refreseque la pagina cada segundo
		setInterval(function(){ajax();}, 1000);
	</script>
</head>
<body onload="ajax();">
    
<div id="contenedor">
<div id="caja-chat">
<div id="chat"></div>
</div>
<form action="index.php" method="POST">
<input type="text" name="nombre" placeholder="Ingresa tu nombre">
<textarea name="mensaje" placeholder="Ingresa tu mensaje"></textarea>
<input type="submit" value="Enviar" name="enviar">
</form>

<?php
if(isset($_POST['enviar'])){
    $nombre = $_POST['nombre'];
    $mensaje = $_POST['mensaje'];

    $consulta = "INSERT INTO  chat(nombre,mensaje) VALUES ('$nombre','$mensaje')";
    $ejecutar = $conexion->query($consulta);

    if($ejecutar){
        echo "<embed loop = 'false' src='beep.mp3' hidden='true' autoplay='true'>";
    }
}

?>

</div>




</body>


</html>