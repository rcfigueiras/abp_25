<?php
session_start(); 
/***Conectamos con la base de datos****/
require_once("/../db/db.php");
$db;
$db= new Conectar();
$db->conexion();
	


/*****RECOJEMOS VARIABLES DEL FORMULARIO*****************/
if (isset($_REQUEST['accion'])) {
	$accion=$_REQUEST['accion'];
} else {
	//$accion='';
}

/*Comprobamos si el estableciento ha rellenado
el formulario de algún pincho*/
$login=$_SESSION['login'];
$sql="	SELECT * 
		FROM ESTABLECIMIENTO E,PINCHO P
		WHERE E.ID_estab=P.ID_estab 
		AND E.nombre_estab = '".$login."'";
$resultado=mysql_query($sql);
if(mysql_fetch_row($resultado) > 0)
{
	$_SESSION['tiene_pincho']=1;
}else{
	$_SESSION['tiene_pincho']=0;
}

//Llamada al modelo
require_once("/../models/db_model.php");
$db_model=new db_model();

/*--------------------------------------------------------*/
/*LOGOUT***************************************************/
if($accion == "Logout"){
	session_destroy();
	header ('Location:/../index.php');
}
/*-------------------------------------------------------*/
/*-------------------------------------------------------*/
/*MODIFICAR PINCHO****************************************/
if($accion == "ModificarPincho")
{
	$db_model->editarPincho();
	
	if ($_SESSION['errorSQL']){
		header ('Location:/../views/error/error_valida_pincho_sql.php');
	}else{
		header ('Location:/../views/IU_modificarPincho.php');
	}
}
/*-------------------------------------------------------*/
/*-------------------------------------------------------*/
/*EDITAR PINCHO*******************************************/
if ($accion == "EditarYa")
{

	if (($_FILES['newfoto']['name'] == '') 
		&& ($_REQUEST['newhorario'] == '')){
		
		header ('Location:/../views/error/error_edita_pincho_vacio.php');
	
	}else{			
		$db_model->editarFormulario();
		echo "ruta: ".$_SESSION['ruta']."<br>";
		if ($_SESSION['errorSQL']){
			header ('Location:/../views/error/error_edita_pincho_no_valido.php');
		}else{
			header ('Location:/../views/exito/exito_edicion.php');
		}	
	}	
} 
/*-------------------------------------------------------*/
/*-------------------------------------------------------*/
/*RELLENAR FORMULARIO DE PINCHO***************************/
if($accion == "RellenarFormulario"){

	header ('Location:/../views/IU_formularioPincho.php');

}
/*-------------------------------------------------------*/
/*-------------------------------------------------------*/
/*ENVIAR FORMULARIO DE PINCHO*****************************/
 if($accion == "EnviarFormulario"){		

	$db_model->enviarFormulario();
	
	
	//Validamos la consulta SQL
	if($_SESSION['campos_incompletos']){
		header ("Location: /../views/error/error_campos_incompletos_formPincho.php"); 
	}else if ($_SESSION['errorSQL']){
		header ('Location:/../views/error/error_inserta_formulario.php');
	}else{		
	require_once("/../views/IU_inicio_establecimiento.php");
		header ('Location:/../views/exito/exito_insercion_form.php');			
	}	
} 
/*-------------------------------------------------------*/
/*-------------------------------------------------------*/
/*CANCELAR FORMULARIO DE PINCHO***************************/
 /*if ($accion == "Cancelar"){
	
	header ('Location:/../views/IU_inicio_establecimiento.php');
	
}*/
/*-------------------------------------------------------*/
//Llamada a la vista
require_once("/../views/IU_inicio_establecimiento.php");
?>

