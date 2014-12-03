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

	<div class="alert alert-info">Añada la información del sistema</div>		   
                
    <form action="/controllers/administrador_controlador.php" method="post" enctype="multipart/form-data"> 
		
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
			<input type="file" class="form-control" name="logoConc" placeholder="logo del concurso" >
		</div>
			
			

		<div class="btn-group">
			<button TYPE="submit" name="accion" VALUE="EnviarFormularioSistema" class="btn btn-default">Enviar Formulario Sistema</button>
			<button TYPE="submit" name="accion" VALUE="Cancelar" class="btn btn-default">Cancelar</button>
		</div>	

			
			 
			
			
				
		
	<form/>
      
      
	
		
      
    


  
</body>

</html>
