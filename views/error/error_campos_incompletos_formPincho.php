<?php
session_start(); 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">

<head>

</head>

<body>
	<div class="alert alert-danger">No ha rellenado todos los campos marcados con *</div>

	<!-- Cabecera -->
	<div class="form-group">
		<?PHP include("/../views/IU_cabecera.php"); ?>
	</div>
	
	<div class="form-group">
		<?PHP include("/../IU_formularioPincho.php"); ?>
	</div>
	
</body>

</html>
