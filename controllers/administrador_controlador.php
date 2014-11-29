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
	$accion='';
}

$db_model=new db_model();

if($accion=='ValidarPinchos'){
			$db_model->validarPinchos();
			//header ('Location:/../views/IU_validarPinchos.php');

}
if($accion=='EliminarPinchos'){
			header ('Location:/../views/IU_eliminarPinchos.php');

}
//Llamada a la vista
require_once("/../views/IU_inicio_administrador.php");

?>

