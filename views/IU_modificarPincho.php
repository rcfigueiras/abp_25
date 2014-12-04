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
		<?PHP include("/../views/IU_cabecera.php"); ?>
	</div>
	<div class="row"></div>
	<div class="form-group">
	<div class="alert alert-info">Los campos marcados con * son editables</div>
	</div>
	<form action="/controllers/establecimiento_controlador.php" method="post" enctype="multipart/form-data"> 
		<div class="form-group">
			<label for="name" class="label label-default">Nombre del pincho: </label>
			<input type="text" class="form-control" name="nombrePin" placeholder="<?PHP echo $_SESSION['nombre_pincho']?>" readonly>
		</div>
		<div class="form-group">
			<label for="name" class="label label-default">*Foto: </label>
			<div class="form-group">
				<img src="<?PHP echo $_SESSION['foto']?>" alt="otraCosa" class="img-thumbnail" width='250'>
			</div>
		</div>
		<div class="form-group">
			<label for="name" class="label label-default">Tipo: </label>
			<input type="text" class="form-control" name="tipoPin" placeholder="<?PHP echo $_SESSION['tipo']?>" readonly>
		</div>
		<div class="form-group">
			<label for="name" class="label label-default">Descripción: </label>
			<input type="text" class="form-control" name="descPin" placeholder="<?PHP echo $_SESSION['descripcion']?>" readonly>
		</div>
		<div class="form-group">
			<label for="name" class="label label-default">Precio: </label>
			<input type="text" class="form-control" name="precioPin" placeholder="<?PHP echo $_SESSION['precio']?>" readonly>
		</div>			
		
		<div class="form-group">
			<label for="name" class="label label-default">*Horario: </label>
			<input type="text" class="form-control" name="horarioPin" placeholder="<?PHP echo $_SESSION['horario']?>" readonly>
		</div>
		<div class="form-group">
			<label for="name" class="label label-warning">Nueva Foto: </label>
			<input type="file" class="form-control" name="newfoto"  >
		</div>
		<div class="form-group">
			<label for="name" class="label label-warning">Nuevo Horario: </label>
			<select class="form-control" name="newhorario">
			  <option></option>
			  <option>mañana</option>
			  <option>tarde</option>
			  <option>todo el día</option>
			</select>
		</div>

		<div class="btn-group">
			<button TYPE="submit" name="accion" VALUE="EditarYa" class="btn btn-default">Editar</button>
			<button TYPE="submit" name="accion" VALUE="Cancelar" class="btn btn-default">Cancelar</button>
		</div>   
				
	</form>
</body>

</html>



