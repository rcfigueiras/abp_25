<?php
session_start(); 
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">


<head>
	<title>PinchoGés</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="/../dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media 
	queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page 
	via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/
	html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/
	respond.min.js"></script>
	<![endif]-->
  </head>

<body>
 	
	<!-- Cabecera -->
	<div class="form-group">
		<?PHP include("../../views/IU_cabecera.php"); ?>
	</div>
	
	<form action="/controllers/login_controlador.php" method="get" role="form">

	</form>
	
	
	<div class="alert alert-info">Resultados de la búsqueda</div>	
	
	
	<form action="/controllers/buscar_controlador.php" method="get">
	<?PHP
	
		foreach ($_SESSION['buscar'] as $valor){
		?>
		<div class="form-group">
			<img src="<?PHP echo $valor['foto']?>" alt="no hay imagen disponible" class="img-thumbnail" width='100'>
			<label for="name" class="badge"> Nombre del pincho</label>
			<label for="name"> <?PHP echo $valor['nombre_pincho']?> </label>

		
			<label for="name" class="badge"> Tipo de pincho</label>
			<label for="name"> <?PHP echo $valor['tipo']?> </label>
		
			<label for="name" class="badge"> Establecimiento que lo ofrece</label>
			<label for="name"> <?PHP echo $valor['nombre_estab']?> </label>
			
			<button TYPE="submit" NAME="masInfoPincho" VALUE="<?PHP echo $valor['nombre_pincho']?>" class="btn btn-default"><?PHP echo 'Mas info'?></button>
	
		</div>
		
		<?PHP				
		}		
		
		?>						
		<div class="btn-group">
			<button TYPE="submit" name="accion" VALUE="volver" class="btn btn-default">Volver</button>
			
		</div>					
	<form/>   
   
   
</body>

</html>



