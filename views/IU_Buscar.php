<?php
session_start(); 
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">

<head>

  </head>

<body>
		
	<form action="/controllers/buscar_controlador.php" method="get" role="form">
		<div class="form-group">
			<label for="name">Buscar</label>
			<input type="text" class="form-control" name="search" placeholder="Introduzca su búsqueda">
		</div>
		<div class="btn-group">
			<button TYPE="submit" name="accion"  VALUE="Buscar" class="btn btn-default">Buscar</button>
		</div>  		
	</form>      
   
</body>

</html>



