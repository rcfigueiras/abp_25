<?php

//Llamada al modelo
require_once("/../models/db_model.php");
/*Recogemos variables de la interfaz*/
if (isset($_REQUEST['login'])) {
	echo "nombre de usuario: ".$_REQUEST['login']."</br>";
	$login=$_REQUEST['login'];
} else {
	echo "login vacio";
	$login='';
}

if (isset($_REQUEST['pass'])) {
	echo "contrasenha: ".$_REQUEST['pass']."</br>";
	$pass=$_REQUEST['pass'];
} else {
	echo "pass vacio";
	$pass='';
}

if (isset($_REQUEST['accion'])) {
	echo "accion: ".$_REQUEST['accion']."</br>";
	$accion=$_REQUEST['accion'];
} else {
	echo "accion vacio";
	$accion='';
}
$db_model=new db_model();

if($accion == "Loguear"){
	
	$db_model->loguear_invitado($login,$pass,$accion);

}
//Llamada a la vista
require_once("/../views/iu_login.html");



/*class loginControlador{
	
	private $dbmodelo;
	private $login;
	private $result;
	
	public function __construct(){
		
		parent::__construct();
			
		$this->db_model = new db_model();
		return true;
	
	}

	public function login($login,$pass,$accion){
		if($accion == "Loguear"){
			echo "logueando";
			$this->db_model->loguear_invitado($usario,$contrasenha,$accion);
			
			
		}
		else{
			$errors = array();
			$errors["general"] = "Nombre de usuario no válido";
			
		}
		return true;		
		
	}	 
	public static function main(){
        
		// starts all the processing of the site
		echo 33333333;
    	$result = $this->login->login($login,$pass,$accion);
		echo $result;

	}

}
*/

?>
