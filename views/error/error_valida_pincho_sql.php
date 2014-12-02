<?php
session_start(); 
$login=$_SESSION['login'];
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
  <!-- Main Page Container -->
  <div class="page-container">

   <!-- For alternative headers START PASTE here -->

    <!-- A. HEADER -->      
    <div class="header">
      
      <!-- A.1 HEADER TOP -->
      <div class="header-top">
        
        <!-- Sitelogo and sitename -->
        <a class="sitelogo" href="#" title="Ir a la página de Inicio"></a>
        <div class="sitename">
          <h1><a href="/index.php" title="Ir a la página de Inicio">PinchoGés <?PHP echo $login;?><span style="font-weight:normal;font-size:50%;">&nbsp</span></a></h1>
          <h2></h2>
        </div>  
      
 

       
    <!-- Esta en esta tabla recogemos lo que insertar el usuario y los mandamos a la controladora para que compruebe que el usuario es correcto-->
	<table height=10></table>
                  
    <tr>ERROR EN LA VALIDACIÓN<tr/>          
    <form action="/controllers/administrador_controlador.php" method="get"> 
		<table>			
			
			<tr>
				
				<td ><INPUT  TYPE="submit" name="accion" VALUE="EliminarPinchos" ></td>
				
				
				<td ><INPUT  TYPE="submit" name="accion" VALUE="ValidarPinchos" ></td>
				
				
				<td ><INPUT  TYPE="submit" name="accion" VALUE="Logout" ></td>
			<tr/>	
				
		</table>
	<form/>
      
      
		
      
    <!-- C. PIE DE PÁGINA -->      

    <div class="footer">
      
	</div>      

</div>
  
</body>

</html>



