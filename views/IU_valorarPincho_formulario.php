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
                
    <form action="/controllers/jurPro_controlador.php" method="get"> 
		
		<?PHP
			foreach  ($_SESSION['pinchos'] as $valor){
				if($valor['nombre_pincho'] == $_SESSION['nombrePin']){?>
					
				<label for="name">Nombre del pincho: </label>
				<input type="text" class="form-control" name="nombrePin" placeholder="<?PHP echo $valor['nombre_pincho']?>" readonly>
			</div>						
			
			<div class="form-group">
				<label for="name">Tipo: </label>
				<input type="text" class="form-control" name="tipoPin" placeholder="<?PHP echo $valor['tipo']?>" readonly>
			</div>						
			
			<div class="form-group">
				<label for="name">Descripción: </label>
				<input type="text" class="form-control" name="descPin" placeholder="<?PHP echo $valor['descripcion']?>" readonly>
			</div>						

			<div class="form-group">
				<label for="name">Precio: </label>
				<input type="text" class="form-control" name="precioPin" placeholder="<?PHP echo $valor['precio']?>" readonly>
			</div>								

			<div class="form-group">
				<label for="name">Foto: </label>
				<div class="form-group">
					<img src="<?PHP echo $valor['foto']?>" alt="otraCosa" class="img-thumbnail" width='250'>
				
				</div>
			</div>						
			
			<div class="form-group">
				<label for="name">Horario: </label>
				<input type="text" class="form-control" name="horarioPin" placeholder="<?PHP echo $valor['horario']?>" readonly>
			</div>						
			
			<div class="form-group">
				<label for="name">Nota : </label>
				<input type="text" class="form-control" name="nota" placeholder="Introduzca su nota" >
			</div>						
			
			<div class="form-group">
				<label for="name">Comentario : </label>
				<input type="text" class="form-control" name="comentario" placeholder="Introduzca su comentario" >
			</div>	
				<?PHP
				}							
			}
			?>			
		<div class="btn-group">
			<button TYPE="submit" name="accion" VALUE="valoraYa" class="btn btn-default">Valorar Pincho</button>
			<button TYPE="submit" name="accion" VALUE="Volver_listaValorar" class="btn btn-default">Volver</button>
		</div>  
	<form/>  
  
</body>

</html>



