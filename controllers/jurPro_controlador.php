<?php

//Llamada al modelo
require_once("/../models/db_model.php");
/*--------------------------------------------------------*/
/*LOGOUT***************************************************/
if($accion == "Logout"){
	session_destroy();
	header ('Location:/../index.php');
}
//Llamada a la vista
//Llamada a la vista
require_once("/../views/IU_inicio_jurPro.php");





?>

