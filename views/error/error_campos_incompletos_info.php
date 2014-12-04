<?php
session_start(); 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">

<head>

</head>

<body>
 
	<div class="alert alert-danger">Debe rellenar todos los campos</div>	   
    
	<!-- Cabecera -->
	<div class="form-group">
		<?PHP include("/../views/IU_cabecera.php"); ?>
	</div>            
    
	<div class="form-group">
		<?PHP include("/../views/RellenarInfoSistema.php"); ?>
	</div>
</body>

</html>
