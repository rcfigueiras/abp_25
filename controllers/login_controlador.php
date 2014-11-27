<?php
session_start(); 
echo 'session_id(): ' . session_id(); 
echo "<br />\n"; 
echo 'session_name(): ' . session_name(); 
echo "<br />\n"; 
print_r(session_get_cookie_params()); 

//Llamada al modelo

require_once("/../models/db_model.php");

/*Recogemos variables de la interfaz*/
if (isset($_REQUEST['login'])) {
	$lg=$_REQUEST['login'];
} else {
	$login='';}

	if (isset($_REQUEST['pass'])) {
	$pass=$_REQUEST['pass'];
} else {
	$pass='';}

if (isset($_REQUEST['accion'])) {
	$accion=$_REQUEST['accion'];
} else {
	$accion='';}

$db_model=new db_model();


if($accion == "Loguear"){		

	$db_model->loguear_invitado();

}
//Llamada a la vista
require_once("/../views/iu_login.php");


?>
