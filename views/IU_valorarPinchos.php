<?php
session_start(); 
$login=$_SESSION['login'];

require_once("/../models/db_model.php");
$db_model=new db_model();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">


<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>PinchoGes</title>  
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
                  
                
    <form action="/controllers/jurPro_controlador.php" method="get"> 
		<table>			
			
			<tr>
				<tr>
					<td>
						<?PHP
						foreach  ($_SESSION['pinchos'] as $valor){
							echo "Nombre del pincho: " 
						?>				
						<INPUT TYPE="SUBMIT" NAME="valorarEste" VALUE="<?PHP echo $valor['nombre_pincho']?>"readonly>		
					<td/>
				<tr/>
					<?PHP
					echo "<br>"; 
							
					}		
						?>				
				<td >
					<INPUT  TYPE="submit" NAME="accion" VALUE="Logout" >
				</td>
			<tr/>	
				
		</table>
	<form/>
      
      
		
      
    <!-- C. PIE DE PÁGINA -->      

    <div class="footer">
      
	</div>      

</div>
  
</body>

</html>


