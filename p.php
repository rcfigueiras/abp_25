<?php
$mi_usuario='userpg';
$mi_password='userpg';
$dir_destino = '/';
$imagen_subida = $dir_destino . basename($_FILES['foto']['name']);
//Variables del metodo POST
$codigo=$_POST['codigo'];
$descripcion=$_POST['descripcion'];
if(!is_writable($dir_destino)){
	echo "no tiene permisos";
}else{
	if(is_uploaded_file($_FILES['foto']['tmp_name'])){
		echo "Archivo ". $_FILES['foto']['name'] ." subido con éxtio.\n";
		echo "Mostrar contenido\n";
		echo $imagen_subida;
		if (move_uploaded_file($_FILES['foto']['tmp_name'], $imagen_subida)) {
			$link = mysql_connect('localhost', $mi_usuario, $mi_password)
				or die('Uyy!!!: ' . mysql_error());
			mysql_select_db('pinchoges') or die('No pudo selecionar la BD');
			//Creamos nuestra consulta sql
			$query="INSERT INTO PINCHO (ID_pincho
									,ID_administrador
									,ID_estab
									,nombre_pincho
									,tipo,descripcion
									,precio
									,foto
									,horario
									,pincho_validado) 
							VALUES (''
									,'1'
									,'7'
									,'ave'
									,'$frio'
									,'bueno noito'
									,'22'
									,'".$imagen_subida."'
									,''
									,'0')";			//Ejecutamos la consutla
			mysql_query($query) or die('Error al procesar consulta: ' . mysql_error());
			echo "El archivo es fue cargado exitosamente.\n";
			echo "<p>$codigo</p>";
			echo "<p>$descripcion</p>";
			echo "<img src=".  $dir_destino . basename($imagen_subida) ."' />";
		} else {
			echo "Posible ataque de carga de archivos!\n";
		}
	}else{
		echo "Posible ataque del archivo subido: ";
		echo "nombre del archivo '". $_FILES['archivo_usuario']['tmp_name'] . "'.";
	}
}
?>