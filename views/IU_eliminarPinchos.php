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
	</div>	<div class="form-group">
		<label for="name">Buscar</label>
		<input type="text" class="form-control" placeholder="Introsduzca su búsqueda">
	</div>
	<div class="btn-group">
		<button TYPE="submit" name="accion"  VALUE="Buscar" class="btn btn-default">Buscar</button>
	</div>  
	
    <form action="/controllers/administrador_controlador.php" method="get"> 
		
		<?PHP
		foreach  ($_SESSION['pinchos'] as $valor){
		?>				
		<div class="form-group">
			<label for="name"> Nombre del pincho: </label>
			<button TYPE="submit" NAME="eliminaEste" VALUE="<?PHP echo $valor['nombre_pincho']?>" class="btn btn-default"><?PHP echo $valor['nombre_pincho']?></button>
		</div>
		<?PHP
			
		}			
		?>				
		<div class="btn-group">
			<button TYPE="submit" name="accion" VALUE="VolverInicio" class="btn btn-default">Volver</button>
			<button TYPE="submit" name="accion" VALUE="Logout" class="btn btn-default">Logout</button>
		</div>  
	<form/>
      
      
		
      
    <!-- C. PIE DE PÁGINA -->      

    <div class="footer">
      
	</div>      

</div>
  
</body>

</html>



