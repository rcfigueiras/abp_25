<?php
session_start(); 
//Llamada al modelo
require_once("/../models/db_model.php");
$db_model=new db_model();


if (isset($_REQUEST['accion'])) {
	$accion=$_REQUEST['accion'];
} 
/*--------------------------------------------------------*/
/*LOGOUT***************************************************/
if($accion == "Logout"){
	session_destroy();
	header ('Location:/../index.php');
}
?>
