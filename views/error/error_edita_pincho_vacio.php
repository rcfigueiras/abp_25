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
	<div class="alert alert-danger">No ha introducido ningún valor en los campos marcados con *</div>

    <form action="/controllers/establecimiento_controlador.php" method="post"> 
		<div class="form-group">
			<label for="name">Nombre del pincho: </label>
			<input type="text" class="form-control" name="nombrePin" placeholder="<?PHP echo $_SESSION['nombre_pincho']?>" readonly>
		</div>
		<div class="form-group">
			<label for="name">Tipo: </label>
			<input type="text" class="form-control" name="tipoPin" placeholder="<?PHP echo $_SESSION['tipo']?>" readonly>
		</div>
		<div class="form-group">
			<label for="name">Descripción: </label>
			<input type="text" class="form-control" name="descPin" placeholder="<?PHP echo $_SESSION['descripcion']?>" readonly>
		</div>
		<div class="form-group">
			<label for="name">Precio: </label>
			<input type="text" class="form-control" name="precioPin" placeholder="<?PHP echo $_SESSION['precio']?>" readonly>
		</div>			
		<div class="form-group">
			<label for="name">*Foto: </label>
			<input type="text" class="form-control" name="fotoPin" placeholder="<?PHP echo $_SESSION['foto']?>" readonly>
		</div>
		<div class="form-group">
			<label for="name">*Horario: </label>
			<input type="text" class="form-control" name="horarioPin" placeholder="<?PHP echo $_SESSION['horario']?>" readonly>
		</div>
		<div class="form-group">
			<label for="name">Nueva Foto: </label>
			<input type="text" class="form-control" name="newfoto" placeholder="nueva foto" >
		</div>
		<div class="form-group">
			<label for="name">Nueva Horario: </label>
			<input type="text" class="form-control" name="newhorario" placeholder="nueva horario de degustación" >
		</div>
			
		
		<div class="btn-group">
			<button TYPE="submit" name="accion" VALUE="EditarYa" class="btn btn-default">Editar</button>
			<button TYPE="submit" name="accion" VALUE="Cancelar" class="btn btn-default">Cancelar</button>
		</div>   
				
	<form/>
</body>

</html>



