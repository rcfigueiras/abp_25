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
	
	<div class="alert alert-info">Edite la información del sistema</div>		   
                
    <form action="/controllers/administrador_controlador.php" method="post" enctype="multipart/form-data"> 
		
		<div class="form-group">
			<label for="name">Nuevo Nombre del concurso: </label>
			<input type="text" class="form-control" name="nombreConcNew" placeholder="nuevo nombre del concurso" value="<?PHP echo $_SESSION['nombre_consurso']?>">
		</div>
				   
                
		<div class="form-group">
			<label for="name">Nuevas Bases: </label>
			<input type="file" class="form-control" name="basesConcNew"  >
		</div>
			
		
		<div class="form-group">
			<label for="name">Antiguo Logotipo: </label>
			<div class="form-group">
				<img src="<?PHP echo $_SESSION['logotipo']?>" alt="no hay logotipo disponible" class="img-thumbnail" width='250'>
			</div>
			<label for="name">Nuevo Logotipo: </label>
			<input type="file" class="form-control" name="logoConcNew">

		</div>
			
		<div class="btn-group">
			<button TYPE="submit" name="accion" VALUE="Editar" class="btn btn-default">Editar Información del Concurso</button>
			<button TYPE="submit" name="accion" VALUE="Cancelar" class="btn btn-default">Cancelar</button>
		</div>	
			

	<form/>
      
</body>

</html>
