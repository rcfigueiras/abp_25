<?php

//Llamada al modelo
require_once("/../models/db_model.php");
/*****RECOJEMOS VARIABLES DEL FORMULARIO*****************/
if (isset($_REQUEST['accion'])) {
	$accion=$_REQUEST['accion'];
}
//Metemos el login en una variable de sesión
if (isset($_REQUEST['login'])) {
	$login=$_REQUEST['login'];
	$_SESSION['login']=$login;
}
//Llamada al modelo
require_once("/../models/db_model.php");
$db_model=new db_model();


//Llamada a la vista
require_once("/../views/IU_inicio_jurPop.php");

?>

