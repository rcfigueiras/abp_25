<?php
session_start(); 
//Llamada al modelo
require_once("/../models/db_model.php");
$db_model=new db_model();
$_SESSION['flag']=0;


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
////***Busqueda***\\\\
if($accion == "Buscar"){		
	$_SESSION['flag']=1;
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

if(isset($_REQUEST['masInfoPincho'])){
	
	$nombrePin=$_REQUEST['masInfoPincho'];
	$_SESSION['search']=$nombrePin;
	$db_model->buscarPincho();
	
	header ('Location:/../views/exito/buscarMasInfo.php');
	
}
	
if($accion == "volver"){
	if(isset($_SESSION['tipoUsu'])){	
		if($_SESSION['tipoUsu'] == 'administrador'){
			header ('Location:/../controllers/administrador_controlador.php');

		}else if($_SESSION['tipoUsu'] == 'establecimiento'){
			header ('Location:/../controllers/establecimiento_controlador.php');

	}else if($_SESSION['tipoUsu'] == 'jurPro'){
			header ('Location:/../controllers/jurPro_controlador.php');

	}else if($_SESSION['tipoUsu'] == 'jurPop'){
			header ('Location:/../controllers/jurPop_controlador.php');

	}
	}else	{	
		header ('Location:/../controllers/login_controlador.php');
	}
	
}

if($accion == "volver2"){
	
	header ('Location:/../views/exito/buscar.php');
}


//Llamada a la vista
require_once("/../views/iu_login.php");
?>
