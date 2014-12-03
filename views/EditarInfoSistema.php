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
			<input type="text" class="form-control" name="basesConcNew" placeholder="nuevas bases del concurso" value="<?PHP echo $_SESSION['bases']?>" >
			<input type="file" class="form-control" name="basesConcNew" placeholder="nuevas bases del concurso" >
		</div>
			
		
		<div class="form-group">
			<label for="name">Antiguo Logotipo: </label>
			<div class="form-group">
				<img src="<?PHP echo $_SESSION['logotipo']?>" alt="no hay logotipo disponible" class="img-thumbnail" width='250'>
			</div>
			<label for="name">Nuevo Logotipo: </label>
			<input type="text" class="form-control" name="logoConc" placeholder="antiguo" value="<?PHP echo $_SESSION['logotipo']?>">
			<input type="file" class="form-control" name="logoConcNew">

		</div>
			
		<div class="btn-group">
			<button TYPE="submit" name="accion" VALUE="Editar" class="btn btn-default">Editar Formulario Sistema</button>
			<button TYPE="submit" name="accion" VALUE="Cancelar" class="btn btn-default">Cancelar</button>
		</div>	
			

	<form/>
      
</body>

</html>
