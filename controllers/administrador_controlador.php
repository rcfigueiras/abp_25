<?php
session_start();

//Recogemos variables de la interfaz
if (isset($_REQUEST['login'])) {
	echo "nombre de usuario: ".$_REQUEST['login']."";
	$login=$_REQUEST['login'];
} else {
	echo "login vacio";
	$login='';
}

if (isset($_REQUEST['pass'])) {
	echo "contrasenha: ".$_REQUEST['pass']."</br>";
	$pass=$_REQUEST['pass'];
} else {
	echo "pass vacio";
	$pass='';
}

if (isset($_REQUEST['accion'])) {
	echo "accion: ".$_REQUEST['accion']."</br>";
	$accion=$_REQUEST['accion'];
} else {
	echo "accion vacio";
	$accion='';
}


//Llamada al modelo
require_once("/../models/db_model.php");

//Llamada a la vista
require_once("/../views/IU_inicio_administrador.html");








?>

