<?php
session_start(); 
$login=$_SESSION['login'];

require_once("/../models/db_model.php");
$db_model=new db_model();

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
     	<div class="alert alert-info">Pincho ya valorado. Aún puede modificar su valoración.</div>	

    <form action="/controllers/jurPro_controlador.php" method="get"> 
		
		<?PHP
		foreach  ($_SESSION['pinchos'] as $valor){
			if($valor['nombre_pincho'] == $_SESSION['nombrePin']){ ?>
				
				<div class="form-group">
					<label for="name">Nombre del pincho: </label>
					<input type="text" class="form-control" name="nombrePin" placeholder="<?PHP echo $valor['nombre_pincho']?>" readonly>
				</div>						
				<div class="form-group">
					<label for="name">Foto: </label>
					<div class="form-group">
						<img src="<?PHP echo $valor['foto']?>" alt="otraCosa" class="img-thumbnail" width='250'>
					</div>		
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
					<label for="name">Horario: </label>
					<input type="text" class="form-control" name="horarioPin" placeholder="<?PHP echo $valor['horario']?>" readonly>
				</div>						
				
				<div class="form-group">
					<label for="name">Nota actual: </label>
					<input type="text" class="form-control" name="nota" placeholder="<?PHP echo $_SESSION['nota']?>" readonly>
				</div>						
				
				<div class="form-group">
					<label for="name">Comentario actual: </label>
					<input type="text" class="form-control" name="comentario" placeholder="<?PHP echo $_SESSION['comentario']?>" readonly>
				</div>							
				
				<div class="form-group">
					<label for="name">Nueva nota: </label>
					<input type="text" class="form-control" name="newNota" placeholder="Inserte la nueva nota">
				</div>			
				
				<div class="form-group">				
					<label for="name">Nueva comentario: </label>
					<input type="text" class="form-control" name="newComentario" placeholder="Inserte el nuevo comentario">
				</div>			

				<?PHP
			}							
		}
		?>			
		
		<div class="btn-group">
			<button TYPE="submit" name="accion" VALUE="modificaValoracion" class="btn btn-default">modificaValoracion</button>
			<button TYPE="submit" name="accion" VALUE="Volver_listaValorar" class="btn btn-default">Volver</button>
			<button TYPE="submit" name="accion" VALUE="Logout" class="btn btn-default">Logout</button>
		</div>   
	<form/>
      
  
</body>

</html>



