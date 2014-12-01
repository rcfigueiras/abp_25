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
	<div class="alert alert-success">Informacion del sistema insertada correctamente</div>

 	<h2>hola <?PHP echo $_SESSION['login'];?></h2>
	<div class="form-group">
		<label for="name">Buscar</label>
		<input type="text" class="form-control" placeholder="Introsduzca su búsqueda">
	</div>
	<div class="btn-group">
		<button TYPE="submit" name="accion"  VALUE="Buscar" class="btn btn-default">Buscar</button>
	</div>  
              
                
    <form action="/controllers/administrador_controlador.php" method="get"> 
		
		
		
		
			<button TYPE="submit" name="accion" VALUE="ModificarInfoSistema" class="btn btn-default">Mofificar info sistema</button>
			
		
			<button TYPE="submit" name="accion" VALUE="EliminarPinchos" class="btn btn-default">Eliminar Pinchos</button>

		<button TYPE="submit" name="accion" VALUE="ValidarPinchos" class="btn btn-default">Validar Pinchos</button>
		<button TYPE="submit" name="accion" VALUE="Logout" class="btn btn-default">Logout</button>
		
		</div>   		
	<form/>
<body>

</html>

