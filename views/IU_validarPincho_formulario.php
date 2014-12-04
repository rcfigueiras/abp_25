<?php
session_start(); 
$login=$_SESSION['login'];

require_once("/../models/db_model.php");
$db_model=new db_model();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
</head>

<body> 
	<!-- Cabecera -->
	<div class="form-group">
		<?PHP include("/../views/IU_cabecera.php"); ?>
	</div>

    <form action="/controllers/administrador_controlador.php" method="get"> 
	<?PHP
		foreach  ($_SESSION['pinchos'] as $valor){
	
			if($valor['nombre_pincho'] == $_SESSION['nombrePin']){
				?>
			<div class="form-group">
				<label for="name" class="label label-default"> Nombre del pincho: </label>
				<input TYPE="text" NAME="nombrePin" VALUE="<?PHP echo $valor['nombre_pincho']?>" class="btn btn-default" readonly>
			</div>
			<div class="form-group">
				<label for="name" class="label label-default"> Foto: </label>
				<div class="form-group">
					<img src="<?PHP echo $valor['foto']?>" alt="no hay imagen disponible" class="img-thumbnail" width='250'>
				</div>					
			</div>
			<div class="form-group">
					<label for="name" class="label label-default">Tipo </label>
					<input TYPE="text" NAME="tipoPin" VALUE="<?PHP echo $valor['tipo']?>" class="btn btn-default" readonly>
				</div>
			<div class="form-group">
					<label for="name" class="label label-default"> Precio: </label>
					<input TYPE="text" NAME="precioPin" VALUE="<?PHP echo $valor['precio']?>" class="btn btn-default" readonly>
				</div>
			
			<div class="form-group">
					<label for="name" class="label label-default"> Horario disponible: </label>
					<input TYPE="text" NAME="horaPin" VALUE="<?PHP echo $valor['horario']?>" class="btn btn-default" readonly>
				</div>						
			
				<?PHP
			}
		}						
		?>	
		
		<div class="btn-group">
			<button TYPE="submit" name="accion" VALUE="altaPincho" class="btn btn-default">Alta Pincho</button>
			<button TYPE="submit" name="accion" VALUE="VolverListaValidar" class="btn btn-default">Volver</button>
		</div>  	

	<form/>
</body>

</html>



