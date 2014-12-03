<?php
session_start(); 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">

<head>
	<title><?PHP if(isset($_SESSION['nombre_concurso'])){echo $_SESSION['nombre_concurso']; }else {echo "Pinchogés";}?></title>
	
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="/../dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/cabecera.css" rel="stylesheet">

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
	<div id="cabecera">
		<div id="logo">
			<img src="<?PHP echo $_SESSION['logotipo']?>" alt="No hay logotipo cargado en el sistema" class="img-thumdnail" width='250'>
		</div>
		
		<div id="bases">
			<?PHP echo $_SESSION['nombre_concurso']; ?>
			<div class="basesBoton"><a class="btn btn-default" href="<?PHP echo $_SESSION['bases']; ?>" role="button">Bases</a></div>
		</div>
		
		
		<div id="login">
			<div id="formLogin">
	<?PHP if(isset($_SESSION['login']) && ($_SESSION['login']!='')){ 
	?>

				<h4><?PHP echo "hola ".$_SESSION['login']; ?></h4>
		
				<form action="/controllers/logout_controlador.php" method="get" role="form">			
						<button type="submit" name="accion" value="Logout" class="btn btn btn-primary">Logout</button>		
				</form>
			</div>
		
	<?PHP	} else { ?>
	
		
				<div id="formLogin">
					<form action="/controllers/login_controlador.php" method="get" role="form">
						

							<input type="text" name="login" class="cajetin" placeholder="Usuario">

							<input type="password" name="pass" class="cajetin" placeholder="Password">
							
							<button TYPE="submit" name="accion" class="btn btn btn-primary" VALUE="Loguear">Login</button>
				
					</form>      
						<?PHP 
						}
						?>
				</div>
		</div>
	</div>
</body>

</html>
