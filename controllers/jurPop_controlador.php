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
if($accion == "votarPincho"){
	$db_model->valorarPinchos();
	if($_SESSION['errorSQL_no_tiene']){
		//die("Gracias, su mensaje se envio correctamente.");

		header('Location:/../views/error/error_noHayValorar.php');
	
	}else{
		header('Location:/../views/IU_valorarPinchos.php');
	}
	
	
	
}
/*--------------------------------------------------------*/
/*MOSTRAR TODA LA INFO DEL PINCHO A VALORAR****************/
if(isset($_REQUEST['votarEste'])){
	
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
/*VALORA YA ESTE PINCHO ***********************************/
if($accion == "votarYa"){
	if(isset($_REQUEST['nota'])){
		$nota=$_REQUEST['nota'];
		$_SESSION['nota']=$nota;
	}
	
	if(isset($_REQUEST['comentario'])){
		$comentario=$_REQUEST['comentario'];
		$_SESSION['comentario']=$comentario;
	}
	$db_model->valoraYaPincho();
	echo "el id pincho es: ".$_SESSION['idpincho'];
	if($_SESSION['errorSQL']){
			header ('Location:/../views/error/error_valida_pincho_sql.php');

	}else{
		//Volvemos a mostrar el inicio de valorar pinchos
		//$db_model->valorarPinchos();	
		if($_SESSION['errorSQL']){
			echo "el pincho no se valora";
		}else{			
			header ('Location:/../views/IU_valorarPinchos.php');
		}			
	}
	
}
/*--------------------------------------------------------*/
/*VOLVER***************************************************/
if($accion == "Volver"){
	header ('Location:/../views/IU_inicio_jurPro.php');
}
/*--------------------------------------------------------*/
/*VOLVER LISTA VALORACION**********************************/
if($accion == "Volver_listaValorar"){
	header ('Location:/../views/IU_valorarPinchos.php');
}

//Llamada a la vista
require_once("/../views/IU_inicio_jurPop.php");

?>

