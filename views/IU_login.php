
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
          <h1><a href="/index.php" title="Ir a la página de Inicio">PinchoGés<span style="font-weight:normal;font-size:50%;">&nbsp</span></a></h1>
          <h2></h2>
        </div>  
      
 

       
    <!-- Esta en esta tabla recogemos lo que insertar el usuario y los mandamos a la controladora para que compruebe que el usuario es correcto-->
	<table height=10></table>
                  
                
    <form action="/controllers/login_controlador.php" method="get"> 
		<table>
			<tr>
			<td  width="250" align="right">usuario:<td/> <td width="250" ><input type=text NAME="login"><td/>
			<tr/>
			
			<tr>
			<td width="250" align="right">contraseña:<td/> <td width="250" ><input type=password NAME="pass"><td/>
			<tr/>
			
			<tr>
			<td width="250" align="right">Buscar:<td/> <td width="250" ><input type=text NAME="buscar"><td/>
			<tr/>
			
			<tr><td><table height=10></table></td></tr> 
			
			<tr>
			<td colspan="6" align="center" cellspacing="200"><INPUT  TYPE="submit" name="accion" VALUE="Loguear" size=50><INPUT TYPE="submit" name="accion"  VALUE="Buscar" size=50><td/>
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



