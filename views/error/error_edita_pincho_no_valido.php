<?php
session_start(); 
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
          <h1><a href="/../index.php" title="Ir a la página de Inicio">PinchoGés<span style="font-weight:normal;font-size:50%;">&nbsp</span></a></h1>
          <h2></h2>
        </div>  
      
 

       
    <!-- Esta en esta tabla recogemos lo que insertar el usuario y los mandamos a la controladora para que compruebe que el usuario es correcto-->
	<table height=10></table>
                  
	<tr>
	<td>Los campos marcados con * son editables<td/>
	<tr/>

    <form action="/controllers/establecimiento_controlador.php" method="post"> 
		<table>
			
			
			<tr>
			<td align="right">Nombre del pincho:<td/> 
			<td><input type=text name="nombrePin" value="<?PHP echo $_SESSION['nombre_pincho']?>" readonly><td/>
			<tr/>
			
			<tr>
			<td align="right">Tipo:<td/>
			<td><input type=text name="tipoPin" value="<?PHP echo $_SESSION['tipo']?>" readonly><td/>
			<tr/>
			
			<tr>
			<td align="right">Descripcion:<td/> 
			<td><input type=text name="descPin" value="<?PHP echo $_SESSION['descripcion']?>" readonly><td/>
			<tr/>
			
			<tr>
			<td align="right">Precio:<td/> 
			<td><input type=text name="precioPin" value="<?PHP echo $_SESSION['precio']?>" readonly><td/>
			<tr/>
			
			<tr>
			<td align="right">Foto:<td/> 
			<td><input type=text name="fotoPin" value="<?PHP echo $_SESSION['foto']?>" readonly><td/>
			<tr/>
			
			<tr>
			<td  align="right">Horario:<td/>
			<td><input type=text name="horarioPin" value="<?PHP echo $_SESSION['horario']?>" readonly><td/>
			<tr/>
			
			<tr>
			<td align="right">Nueva Foto:<td/> 
			<td><input type=text name="newfoto" ><td/>
			<td align="right">Valor no válido<td/> 

			<tr/>
			
			<tr>
			<td  align="right">Nuevo Horario:<td/>
			<td><input type=text name="newhorario"  ><td/>
			<td align="right">Valor no válido<td/> 

			<tr/>

			
			
			
			<tr><td><table height=10></table></td></tr> 
			
			<tr>
				<td >
					<INPUT  TYPE="submit" name="accion" VALUE="Editar" size=50>
					<INPUT  TYPE="submit" name="accion"  VALUE="Cancelar" size=50>
				<td/>
			<tr/>	
				
		</table>
	<form/>
      
      
	<table height=10></table> 
		
      
    <!-- C. PIE DE PÁGINA -->      

    <div class="footer">
      
	</div>      

</div>
  
</body>

</html>



