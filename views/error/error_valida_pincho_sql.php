<?php
session_start(); 
$login=$_SESSION['login'];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">


	<head>

	</head>

<body>
              
	<div class="alert alert-warning">El pincho no se ha validado correctamente</div>
    <!-- Cabecera -->
	<div class="form-group">
		<?PHP include("/../views/IU_cabecera.php"); ?>
	</div>
	
	<?PHP include("../../controllers/administrador_controlador.php"); ?>

	
</body>

</html>



