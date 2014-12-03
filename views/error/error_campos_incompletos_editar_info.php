<?php
session_start(); 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">


<head>

</head>

<body>

	<div class="alert alert-danger">No deje campos en blanco</div>		   

    <!-- Cabecera -->
	<div class="form-group">
		<?PHP include("/../views/IU_cabecera.php"); ?>
	</div>
	
	<?PHP include("../../views/EditarInfoSistema.php"); ?>

      
</body>

</html>