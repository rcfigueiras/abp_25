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
	
	<div class="alert alert-info">Información del pincho seleccionado</div>	

	<!-- Cabecera -->
	<div class="form-group">
		<?PHP include("/../views/IU_cabecera.php"); ?>
	</div>	
	
	<form action="/controllers/login_controlador.php" method="get">
	<?PHP
	
		foreach ($_SESSION['buscar'] as $valor){
		?>
		
		<div class="form-group">
			<label for="name">Nombre del pincho: </label>
			<input type="text" class="form-control" value="<?PHP echo $valor['nombre_pincho']?>" readonly>
		</div>
		<div class="form-group">
			<label for="name">Foto del pincho: </label>
			<div class="form-group">
				<img src="<?PHP echo $valor['foto']?>" alt="no hay imagen disponible" class="img-thumbnail" width='250'>
			</div>		
		</div>
		<div class="form-group">
			<label for="name">Tipo de pincho: </label>
			<input type="text" class="form-control" value="<?PHP echo $valor['tipo']?>" readonly>
		</div>
		
		<div class="form-group">
			<label for="name">Descripción del pincho: </label>
			<input type="text" class="form-control" value="<?PHP echo $valor['descripcion']?>" readonly>
		</div>
		
		<div class="form-group">
			<label for="name">Precio del pincho: </label>
			<input type="text" class="form-control" value="<?PHP echo $valor['precio']?>" readonly>
		</div>
		
		
		
		<div class="form-group">
			<label for="name">Horario del pincho: </label>
			<input type="text" class="form-control" value="<?PHP echo $valor['horario']?>" readonly>
		</div>
		
		<div class="form-group">
			<label for="name">Establecimiento que lo ofrece: </label>
			<input type="text" class="form-control" value="<?PHP echo $valor['nombre_estab']?>" readonly>
		</div>
		
		
		<div class="btn-group">
			<button TYPE="submit" name="accion" VALUE="volver2" class="btn btn-default">Volver</button>
			
		</div>	
		
		<?PHP				
		}		
		?>						
						
	<form/> 
	
	
	
	
	
	
      
   
</body>

</html>



