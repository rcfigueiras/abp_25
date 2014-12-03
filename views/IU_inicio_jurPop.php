<?php
session_start(); 
if (isset($_REQUEST['login'])) {
	$login=$_REQUEST['login'];
	$_SESSION['login']=$login;
}else{
	$login=$_SESSION['login'];
}

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
	
	<!-- Buscar -->
	<div class="form-group">

		<?PHP include("/../views/IU_Buscar.php"); ?>
	
	</div>	
                
    <form action="/controllers/jurPop_controlador.php" method="get"> 
			<button TYPE="submit" name="accion" VALUE="" class="btn btn-default">Votar</button>
	<form/>    
  
</body>

</html>



