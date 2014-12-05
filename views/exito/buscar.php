<?php
session_start(); 
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">


<head>

</head>

<body>
 	
	<!-- Cabecera -->
	<div class="form-group">
		<?PHP include("../../views/IU_cabecera.php"); ?>
	</div>
	<div class="row"></div>
	<form action="/controllers/login_controlador.php" method="get" role="form">

	</form>
	
		

	<div class="alert alert-info">Resultados de la búsqueda</div>	
	<?PHP
	/*
	Si venimos de mostrar más info no actualizamos el valor 
	de la lista de pinchos a mostrar, conservamos el valor
	de la búsqueda
	
	*/
	if($_SESSION['flag'])
	{

		$_SESSION['listaBusqueda']=$_SESSION['buscar'];
	
	}
	foreach ($_SESSION['listaBusqueda']	as $valor){
	?>

	<form action="/controllers/buscar_controlador.php" method="get">
		
		<div class="form-group">
			<img src="<?PHP echo $valor['foto']?>" alt="no hay imagen disponible" class="img-thumbnail" width='100'>
			<label for="name" class="label label-default"> Nombre del pincho</label>
			<label for="name"> <?PHP echo $valor['nombre_pincho']?> </label>

			<label for="name" class="label label-default"> Tipo de pincho</label>
			<label for="name"> <?PHP echo $valor['tipo']?> </label>
		
			<label for="name" class="badge"> Establecimiento que lo ofrece</label>
			<label for="name"> <?PHP echo $valor['nombre_estab']?> </label>
			<label for="name" class="badge""> Dirección </label>
			<label for="name"> <?PHP echo $valor['direccion']?> </label>
			
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



