<?php
session_start(); 

//Llamada al modelo
require_once("/../models/db_model.php");

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

$db_model=new db_model();

if($accion == "Loguear"){		

	$db_model->loguear_invitado();

}

if($accion == "Buscar"){		
			if (isset($_REQUEST['search'])) {
				$search=$_REQUEST['search'];
				$_SESSION['search']=$search;
			}
			
	$db_model->buscarPincho();
	
	if  ($_SESSION['errorSQL_noHay']==1){
	
	header ('Location:/../views/error/error_buscar_noHay.php');
	}else{
	
	header ('Location:/../views/exito/buscar.php');
	
	}
	
	
	
	

}

//Llamada a la vista
require_once("/../views/iu_login.php");
?>
