<?php
session_start(); 
echo 'session_id(): ' . session_id(); 
echo "<br />\n"; 
echo 'session_name(): ' . session_name(); 
echo "<br />\n"; 
print_r(session_get_cookie_params()); 

/*****RECOJEMOS VARIABLES DEL FORMULARIO*****************/

if (isset($_REQUEST['accion'])) {
	$accion=$_REQUEST['accion'];
} else {
	$accion='';
}
if (isset($_REQUEST['login'])) {
	$login=$_REQUEST['login'];
} else {
	$login='';
}

if (isset($_REQUEST['pass'])) {
	$pass=$_REQUEST['pass'];
} else {
	$pass='';
}

//Llamada al modelo
require_once("/../models/db_model.php");

//Llamada a la vista
require_once("/../views/IU_inicio_establecimiento.html");

$db_model=new db_model();
if($accion == "RellenarFormulario"){
	//require_once("/../views/IU_formularioPincho.html");
	header ('Location:/../views/IU_formularioPincho.html');
}else if($accion == "Enviar"){		
		$db_model->cubrirFormulario();
} else if ($accion == "Cancelar"){
		header ('Location:/../views/IU_inicio_establecimiento.html');
}

?>

