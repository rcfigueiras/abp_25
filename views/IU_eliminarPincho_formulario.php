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
                  
                
    <form action="/controllers/administrador_controlador.php" method="get"> 
		<table>						
			<tr>
			<tr>
			<td>
			<?PHP
				foreach  ($_SESSION['pinchos'] as $valor){
					if($valor['nombre_pincho'] == $_SESSION['nombrePin']){
						echo "Nombre del pincho: "?><input TYPE=text NAME="nombrePin" VALUE="<?PHP echo $valor['nombre_pincho']?>"readonly>		
						<?PHP echo "<br>"; ?>
						<?PHP echo "Tipo: "?><input TYPE=text NAME="tipoPin" VALUE="<?PHP echo $valor['tipo']?>"readonly>		
						<?PHP echo "<br>"; ?>
						<?PHP echo "Descripción: "?><input TYPE=text NAME="descPin" VALUE="<?PHP echo $valor['descripcion']?>"readonly>		
						<?PHP echo "<br>"; ?>
						<?PHP echo "Precio: "?><input TYPE=text NAME="precioPin" VALUE="<?PHP echo $valor['precio']?>"readonly>		
						<?PHP echo "<br>"; ?>
						<?PHP echo "Foto: "?><input TYPE=text NAME="fotoPin" VALUE="<?PHP echo $valor['foto']?>"readonly>		
						<?PHP echo "<br>"; ?>
						<?PHP echo "Horario"?><input TYPE=text NAME="horaPin" VALUE="<?PHP echo $valor['horario']?>"readonly>		
						
						<td/>
						<tr/>
						<?PHP
							echo "<br>"; 					
					}							
				}
				?>			
			<td >
				<INPUT  TYPE="submit" NAME="accion" VALUE="eliminaPincho" >
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



