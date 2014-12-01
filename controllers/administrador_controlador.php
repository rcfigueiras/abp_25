<?php
session_start();
//Prueba de paso de variables
/*echo $_SESSION['login'];  
echo $_SESSION['pass']; 
*/
//Llamada al modelo
require_once("/../models/db_model.php");
//Recogemos la acción 
if (isset($_REQUEST['accion'])) {
	$accion=$_REQUEST['accion'];
} else {
}

$db_model=new db_model();

/*Comprobamos si el administrador ha rellenado
el formulario de la información del sistema*/

$sql="SELECT * FROM PINCHOGES WHERE ID_administrador = '1'";

$resultado=mysql_query($sql);
if(mysql_fetch_row($resultado) > 0){
	$_SESSION['tiene_info']=1;
}else{
	$_SESSION['tiene_info']=0;
}

/*--------------------------------------------------------*/
/*VALIDAR PINCHOS******************************************/
if($accion=='ValidarPinchos'){

	$db_model->validarPinchos();	
	if($_SESSION['errorSQL']){
		echo "No hay pinchos que validar en el sistema";
	}else{
		
		header ('Location:/../views/IU_validarPinchos.php');
	}
}
/*--------------------------------------------------------*/
/*MOSTRAR FORMULARIO A VALIDAR COMPLETO *******************/
if(isset($_REQUEST['validaEste'])){
	
	$nombrePin=$_REQUEST['validaEste'];
	$_SESSION['nombrePin']=$nombrePin;
	header ('Location:/../views/IU_validarPincho_formulario.php');

}
/*--------------------------------------------------------*/
/*ALTA DE ESTE PINCHO *************************************/
if($accion == "altaPincho"){
	$db_model->altaPincho();
	if($_SESSION['errorSQL']){
			header ('Location:/../views/error/error_valida_pincho_sql.php');

	}else{
		/*
		Volvemos a mostrar el inicio de validar pinchos
		*/
		$db_model->validarPinchos();	
		if($_SESSION['errorSQL']){
			echo "no hay pinchos a validar";
		}else{
			
			header ('Location:/../views/IU_validarPinchos.php');
		}			
	}
}

/*--------------------------------------------------------*/
/*ELIMINAR PINCHOS******************************************/
if($accion=='EliminarPinchos'){

	$db_model->eliminarPinchos();
	if($_SESSION['errorSQL']){
		header ('Location:/../views/error/error_noPinchosEliminar.php');
	}else{
		
		header ('Location:/../views/IU_eliminarPinchos.php');
	}
}
/*--------------------------------------------------------*/
/*MOSTRAR FORMULARIO A ELIMINAR COMPLETO *******************/
if(isset($_REQUEST['eliminaEste'])){
	
	$nombrePin=$_REQUEST['eliminaEste'];
	$_SESSION['nombrePin']=$nombrePin;
	header ('Location:/../views/IU_eliminarPincho_formulario.php');

}

/*--------------------------------------------------------*/
/*ELIMINA ESTE PINCHO *************************************/
if($accion == "eliminaPincho"){
	$db_model->eliminaPincho();
	if($_SESSION['errorSQL']){
			header ('Location:/../views/error/error_valida_pincho_sql.php');

	}else{
		/*
		Volvemos a mostrar el inicio de validar pinchos
		*/
		$db_model->eliminarPinchos();	
		if($_SESSION['errorSQL']){
			echo "No hay pinchos que eliminar en el sistema";
		}else{
			
			header ('Location:/../views/IU_eliminarPinchos.php');
		}			
	}
}
/*--------------------------------------------------------*/
/*LOGOUT***************************************************/
if($accion == "Logout"){
	session_destroy();
	header ('Location:/../index.php');
}




/*-------------------------------------------------------*/
/*-------------------------------------------------------*/
/*MODIFICAR ALTA SISTEMA****************************************/
if($accion == "ModificarInfoSistema")
{
	$db_model->editarInfoSistema();
	
	if ($_SESSION['errorSQL']){
		echo "Aqui va a error en recuperar el pincho";
	}else{
		header ('Location:/../views/EditarInfoSistema.php');
	}
}
	

/*-------------------------------------------------------*/
/*-------------------------------------------------------*/
/*EDITAR ALTA SISTEMA*******************************************/
if ($accion == "Editar")
{

		
		$db_model->editarFormularioSistema();
		if($_SESSION['campos_incompletos']){
				header ("Location: /../views/error/error_campos_incompletos_editar_info.php");
		}else{
			header ('Location:/../views/exito/exito_edicion_info.php');
		}	
		
		
		
		
} 

/*-------------------------------------------------------*/
/*-------------------------------------------------------*/
/*RELLENAR ALTA SISTEMA***************************/
if($accion == "RellenarInfoSistema"){

	header ('Location:/../views/RellenarInfoSistema.php');

}
/*-------------------------------------------------------*/
/*-------------------------------------------------------*/
/*ENVIAR FORMULARIO ALTA SISTEMA*****************************/
 if($accion == "EnviarFormularioSistema"){		

	$db_model->enviarFormularioSistema();
	//Validamos la consulta SQL
	if($_SESSION['campos_incompletos']){
				header ("Location: /../views/error/error_campos_incompletos_info.php"); 
	}else if ($_SESSION['errorSQL']){
		header ('Location:/../views/error/error_inserta_formulario.php');
		}
		else{		
				
			header ('Location:/../views/exito/exito_insercion_info.php');
	}	
} 
/*-------------------------------------------------------*/
/*-------------------------------------------------------*/




//Llamada a la vista
require_once("/../views/IU_inicio_administrador.php");
?>

