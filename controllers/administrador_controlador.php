<?php
session_start();
//Prueba de paso de variables
/*echo $_SESSION['login'];  
echo $_SESSION['pass']; 
*/
//Llamada al modelo
require_once("/../models/db_model.php");



//Llamada a la vista
require_once("/../views/IU_inicio_administrador.html");








?>

