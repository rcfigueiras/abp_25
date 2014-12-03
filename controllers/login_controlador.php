<?php
session_start(); 
//Llamada al modelo
require_once("/../models/db_model.php");
$db_model=new db_model();

/*Recogemos variables de la interfaz*/
if (isset($_REQUEST['login'])) {
	$login=$_REQUEST['login'];
}

if (isset($_REQUEST['pass'])) {
	$pass=$_REQUEST['pass'];
} 

if (isset($_REQUEST['accion'])) {
	$accion=$_REQUEST['accion'];
} 

/**********************************/
/*Loguear**************************/
if($accion == "Loguear"){		

	$db_model->loguear_invitado();

}
	
if($accion == "volver"){

	header ('Location:/../controllers/login_controlador.php');
	
}


//Llamada a la vista
require_once("/../views/iu_login.php");
?>
