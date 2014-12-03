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
	

    <form action="/controllers/establecimiento_controlador.php" method="get" role="form"> 
		<?PHP 
			$estado='vacio';
			$sql="select comunicacion 
					from establecimiento 
					where nombre_estab='".$login."'
					and
					comunicacion IS NOT NULL";
			$resultado = mysql_query($sql);

			if($row=mysql_fetch_row($resultado)){
				$estado=$row[0];
				 ?>
				
				<div class="alert alert-info"><?PHP echo"El estado de su pincho 
				en el concurso es: <br>".$estado?></div>
				<?PHP	}	?>
		<?PHP if(!($_SESSION['tiene_pincho'])) { ?>
			<div class="btn-group">
				<button TYPE="submit" name="accion" VALUE="RellenarFormulario" class="btn btn-default">Rellenar Formulario</button>
		
		<?PHP } else {?>
				<button TYPE="submit" name="accion" VALUE="ModificarPincho" class="btn btn-default">Modificar Pincho</button>
		<?PHP } ?>
					
			</div>   		
	<form/>
 
</body>

</html>



