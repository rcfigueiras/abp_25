<?php

session_start();
require_once("db/db.php");

//Llamada al modelo
require_once("models/db_model.php");
$db_model=new db_model();

/*
*	Tomamos las variables del concurso para la cabecera de la
*	página, si las hay, y las gusardamos en variables de sesión.
*/
$sql="SELECT * 
	FROM PINCHOGES";
$resultado=mysql_query($sql);
$row=mysql_fetch_row($resultado);
$nombre_concurso=$row[0];
$bases=$row[2];
$logotipo=$row[3];
/*Los almacenamos en variables de sesión*/
$_SESSION['nombre_concurso']=$nombre_concurso;;
$_SESSION['bases']=$bases;
$_SESSION['logotipo']=$logotipo;
require_once("controllers/login_controlador.php");

?>
