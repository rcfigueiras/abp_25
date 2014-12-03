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
              
                
    <form action="/controllers/administrador_controlador.php" method="get"> 
		<?PHP if(!($_SESSION['tiene_info'])) { ?>
		<div class="btn-group">
		
		<button TYPE="submit" name="accion" VALUE="RellenarInfoSistema" class="btn btn-default">Rellenar información del sistema</button>
				
		<?PHP }else{ ?>
		
			<button TYPE="submit" name="accion" VALUE="ModificarInfoSistema" class="btn btn-default">Mofificar info sistema</button>
			
		<?PHP } ?>	
			<button TYPE="submit" name="accion" VALUE="EliminarPinchos" class="btn btn-default">Eliminar Pinchos</button>

		<button TYPE="submit" name="accion" VALUE="ValidarPinchos" class="btn btn-default">Validar Pinchos</button>
		
		</div>   		
	<form/>
<body>

</html>



