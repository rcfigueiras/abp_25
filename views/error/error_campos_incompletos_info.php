<?php
session_start(); 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">


<head>

</head>

<body>
 
	<div class="alert alert-danger">Debe rellenar todos los campos</div>	   
    
	<!-- Cabecera -->
	<div class="form-group">
		<?PHP include("/../views/IU_cabecera.php"); ?>
	</div>            
    
	<form action="/controllers/administrador_controlador.php" method="post"> 
		
		<div class="form-group">
			<label for="name">Nombre del concurso: </label>
			<input type="text" class="form-control" name="nombreConc" placeholder="nombre del concurso" >
		</div>
		
		
		<div class="form-group">
			<label for="name">Bases: </label>
			<input type="text" class="form-control" name="basesConc" placeholder="bases del concurso" >
		</div>
			
		
		<div class="form-group">
			<label for="name">Logotipo: </label>
			<input type="text" class="form-control" name="logoConc" placeholder="logo del concurso" >
		</div>
			
			

		<div class="btn-group">
			<button TYPE="submit" name="accion" VALUE="EnviarFormularioSistema" class="btn btn-default">Enviar Formulario Sistema</button>
			<button TYPE="submit" name="accion" VALUE="Cancelar" class="btn btn-default">Cancelar</button>
		</div>	

			
			 
			
			
				
		
	<form/>
      
      
	
		
      
    


  
</body>

</html>
