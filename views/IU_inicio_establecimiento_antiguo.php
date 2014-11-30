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
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="3600" />
  <meta name="revisit-after" content="2 days" />
  <meta name="robots" content="index,follow" />
  <meta name="distribution" content="global" />
  <link rel="icon" href="./img/iconopeque.jpg"/>
  <link rel="icon" type="image/x-icon" href="./img/LOGO_2.ico" />
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
          <h1><a href="/index.php" title="Ir a la página de Inicio">PinchoGés<?PHP echo " - Bienvenido ".$login;?><span style="font-weight:normal;font-size:50%;">&nbsp</span></a></h1>
          <h2></h2>
        </div>  
      
 

       
    <!-- Esta en esta tabla recogemos lo que insertar el usuario y los mandamos a la controladora para que compruebe que el usuario es correcto-->
	<table height=10></table>
                  
                
    <form action="/controllers/establecimiento_controlador.php" method="get"> 
		<table>			
			
			<tr>
				<?PHP 
				$estado='vacio';
				$sql="select comunicacion 
					from establecimiento 
					where nombre_estab='".$login."'
							and
							comunicacion IS NOT NULL";
				$resultado = mysql_query($sql);

				if($row=mysql_fetch_row($resultado)){
					$estado=$row[0];
					echo "El estado de su pincho 
					en el concurso es: <br>".$estado;
				}

				?>
				<?PHP if(!($_SESSION['tiene_pincho'])) { ?>
				
				<td ><INPUT  TYPE="submit" name="accion" VALUE="RellenarFormulario" ></td>
				
				<?PHP } else {?>
				
					<td ><INPUT  TYPE="submit" name="accion" VALUE="ModificarPincho" ></td>
				
				<?PHP } ?>
				
				
				
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



