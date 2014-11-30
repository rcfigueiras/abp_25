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
/*--------------------------------------------------------*/
/*VALORAR PINCHOS*****************************************/
if($accion == "valorarPinchos"){
	$db_model->valorarPinchos();
	header ('Location:/../views/IU_valorarPinchos.php');
}
/*--------------------------------------------------------*/
/*MOSTRAR TODA LA INFO DEL PINCHO A VALORAR****************/
if(isset($_REQUEST['valorarEste'])){
	
	$nombrePin=$_REQUEST['valorarEste'];
	$_SESSION['nombrePin']=$nombrePin;
	$db_model->comprobarValoracion();
	if ($_SESSION['yaValorado']){
		header ('Location:/../views/IU_valorarPinchoYaValorado_formulario.php');
	}else{
		
		header ('Location:/../views/IU_valorarPincho_formulario.php');
	}
}
/*--------------------------------------------------------*/
/*VALORA YA ESTE PINCHO ESTE PINCHO ***********************/
if($accion == "valoraYa"){
	if(isset($_REQUEST['nota'])){
		$nota=$_REQUEST['nota'];
		$_SESSION['nota']=$nota;
	}
	
	if(isset($_REQUEST['comentario'])){
		$comentario=$_REQUEST['comentario'];
		$_SESSION['comentario']=$comentario;
	}
	$db_model->valoraYaPincho();
	if($_SESSION['errorSQL']){
			header ('Location:/../views/error/error_valida_pincho_sql.php');

	}else{
		//Volvemos a mostrar el inicio de valorar pinchos
		$db_model->valorarPinchos();	
		if($_SESSION['errorSQL']){
			echo "No hay pinchos que valorar en el sistema";
		}else{			
			header ('Location:/../views/IU_valorarPinchos.php');
		}			
	}
}
/*MODIFICA VALORACIÓN ***********************/
if($accion == "modificaValoracion"){
	if(isset($_REQUEST['newNota'])){
		$nota=$_REQUEST['newNota'];
		$_SESSION['newNota']=$nota;
	}
	
	if(isset($_REQUEST['newComentario'])){
		$comentario=$_REQUEST['newComentario'];
		$_SESSION['newComentario']=$comentario;
	}
	$db_model->modificaValoracionPincho();
	if($_SESSION['errorSQL']){
			header ('Location:/../views/error/error_valora_pincho_sql.php');

	}else{
		//Volvemos a mostrar el inicio de valorar pinchos
		$db_model->valorarPinchos();	
		if($_SESSION['errorSQL']){
			echo "No hay pinchos que valorar en el sistema";
		}else{			
			header ('Location:/../views/IU_valorarPinchos.php');
		}			
	}
}
/*--------------------------------------------------------*/
/*LOGOUT***************************************************/
if($accion == "Logout"){
	session_destroy();
	header ('Location:/../index.php');
}
//Llamada a la vista
require_once("/../views/IU_inicio_jurPro.php");

?>

