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
<?PHP echo $_SESSION['tipoUsu']; ?>
	<div class="row">
		<div class="col-xs-1">
			<img src="<?PHP echo $_SESSION['logotipo']?>" alt="No hay logotipo cargado en el sistema" class="img-thumdnail" width='200'>
		</div>
		
		<div class="col-xs-2">
			<h2><?PHP echo $_SESSION['nombre_concurso']; ?></h2>
		</div>
		
		<div class="col-xs-2">
			<a class="btn btn-default" href="<?PHP echo $_SESSION['bases']; ?>" role="button">Bases</a>
		</div>
		
		<div class="col-xs-2">
		</div>
		
	<?PHP if(isset($_SESSION['login']) && ($_SESSION['login']!='')){ 
	?>
		<div class="col-xs-1" align="right">
			<a class="btn btn-default" href="/views/IU_inicio_<?PHP echo $_SESSION['tipoUsu']; ?>.php" role="button">
			<?PHP echo "hola ".$_SESSION['login']; ?>
			</a>
		</div>
	<form action="/controllers/logout_controlador.php" method="get" role="form">
		<div class="col-xs-1" align="left">
			<button type="submit" name="accion" value="Logout" class="btn btn-lg btn-primary">Logout</button>
		</div>
		
	</form>
	
	<?PHP	} else { ?>
		
	<form action="/controllers/login_controlador.php" method="get" role="form">
		
		<div class="col-xs-2">
			<input type="text" class="form-control" name="login" placeholder="Usuario">
		</div>
		
		<div class="col-xs-2" >
			<input type="password" class="form-control" name="pass" placeholder="Password">
		</div>
		
		<div class="col-xs-1" >
			<button TYPE="submit" name="accion" VALUE="Loguear" class="btn btn btn-primary">Login</button>
		</div>   
	</form>      
		<?PHP 
		}
		?>
	</div>
</body>

</html>
