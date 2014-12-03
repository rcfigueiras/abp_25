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
	<![endif]--> </head>

<body>                  
	<!-- Cabecera -->
	<div class="form-group">
		<?PHP include("/../views/IU_cabecera.php"); ?>
	</div>
    <form action="/controllers/jurPro_controlador.php" method="get"> 
		
		<?PHP
		foreach  ($_SESSION['pinchos'] as $valor){
		?>		
		<div class="form-group">
			<label for="name"> Nombre del pincho: </label>
			<button TYPE="submit" NAME="valorarEste" VALUE="<?PHP echo $valor['nombre_pincho']?>" class="btn btn-default"><?PHP echo $valor['nombre_pincho']?></button>
		</div>
		<?PHP
		}
		?>
		<div class="btn-group">
			<button TYPE="submit" name="accion" VALUE="Volver" class="btn btn-default">Volver</button>
		</div>  				
	<form/>  
</body>

</html>



