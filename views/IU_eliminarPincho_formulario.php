<?php
session_start(); 
$login=$_SESSION['login'];

require_once("/../models/db_model.php");
$db_model=new db_model();

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
	<![endif]-->  </head>
</head>

<body>
	<!-- Cabecera -->
	<div class="form-group">
		<?PHP include("/../views/IU_cabecera.php"); ?>
	</div>	        
    
	<form action="/controllers/administrador_controlador.php" method="get"> 
	<?PHP
	foreach  ($_SESSION['pinchos'] as $valor){
		if($valor['nombre_pincho'] == $_SESSION['nombrePin']){?>
			<div class="form-group">
				<label for="name"> Nombre del pincho: </label>
				<input TYPE="text" NAME="nombrePin" VALUE="<?PHP echo $valor['nombre_pincho']?>" class="btn btn-default" readonly>
			</div>
			<div class="form-group">
				<label for="name">Foto: </label>
				<div class="form-group">
					<img src="<?PHP echo $valor['foto']?>" alt="no hay imagen disponible" class="img-thumbnail" width='250'>
				</div>		
			</div>
			<div class="form-group">
				<label for="name">Tipo </label>
				<input TYPE="text" NAME="tipoPin" VALUE="<?PHP echo $valor['tipo']?>" class="btn btn-default" readonly>
			</div>
			<div class="form-group">
				<label for="name"> Precio: </label>
				<input TYPE="text" NAME="precioPin" VALUE="<?PHP echo $valor['precio']?>" class="btn btn-default" readonly>
			</div>
				
			<div class="form-group">
				<label for="name"> Nombre del pincho: </label>
				<input TYPE="text" NAME="horaPin" VALUE="<?PHP echo $valor['horario']?>" class="btn btn-default" readonly>
			</div>						
			<?PHP
		}							
	}
	?>					
	<div class="btn-group">
		<button TYPE="submit" name="accion" VALUE="eliminaPincho" class="btn btn-default">Elimina Pincho</button>
		<button TYPE="submit" name="accion" VALUE="VolverListaEliminar" class="btn btn-default">Volver</button>
		<button TYPE="submit" name="accion" VALUE="Logout" class="btn btn-default">Logout</button>
	</div>  
	<form/>
</body>

</html>



