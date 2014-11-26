<?php

class Conectar{
	
    public static function conexion(){

        /*$conexion=new mysqli("localhost", "userpg", "userpg", "pinchoges");

        $conexion->query("SET NAMES 'utf8'");

        return $conexion;*/
		$link = mysql_connect('localhost', 'userpg', 'userpg')
		or die('No se pudo conectar: ' . mysql_error());
		echo 'Connected successfully';
		mysql_select_db('pinchoges') or die('No se pudo seleccionar la base de datos');
		return true;

    }

}

?>
