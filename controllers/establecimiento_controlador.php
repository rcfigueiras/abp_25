<?php
session_start(); 
/*****RECOJEMOS VARIABLES DEL FORMULARIO*****************/

if (isset($_REQUEST['accion'])) {
	$accion=$_REQUEST['accion'];
} else {
	$accion='';
}

echo $_SESSION['login'];  
echo $_SESSION['pass']; 
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

