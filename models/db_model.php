<?php
session_start(); 
require_once("/../db/db.php");

class db_model {

    private $db;

    private $personas;

    public function __construct(){

		//Aquí nos conectamos a la base de datos mediante 
		//la función conexión de la clase Conectar
		//que se encuentra en db.php
        $this->db=Conectar::conexion();
        //$this->personas=array();
    }
	

    public function get_personas(){

        $consulta=$this->db->query("select * from ADMINISTRADOR;");

        while($filas=$consulta->fetch_assoc()){

            $this->personas[]=$filas;

        }
        return $this->personas;

    }
	
	/***********************************************************/
	/*****************LOGUEAR INVITADO**************************/
	public function loguear_invitado(){

		if (isset($_REQUEST['accion'])) {
			$accion=$_REQUEST['accion'];
		} else {
			$accion='';
		}
		if (isset($_REQUEST['login'])) {
			$login=$_REQUEST['login'];
		} else {
			$login='';
		}

		if (isset($_REQUEST['pass'])) {
			$pass=$_REQUEST['pass'];
		} else {
			$pass='';
		}
		
	
		if ($accion=="Loguear" )
		{	
			if ($login == NULL || $pass == NULL){
			 header ("Location:/../views/error/error_campos_incompletos.html");
			 return false;
			}
			//comprobamos si existe en la bd
			$sql_admin = "select * from ADMINISTRADOR where nombre_admin = '".$login."'";
			$sql_estab = "select * from ESTABLECIMIENTO where nombre_estab = '".$login."'";
			$sql_jurPro = "select * from JURADO_PROFESIONAL where nombre_jurPro = '".$login."'";
			$sql_jurPop = "select * from JURADO_POPULAR where nombre_jurPop = '".$login."'";

			$resultado_admin = mysql_query($sql_admin);
			$resultado_estab = mysql_query($sql_estab);
			$resultado_jurPro = mysql_query($sql_jurPro);
			$resultado_jurPop = mysql_query($sql_jurPop);
			
			if (mysql_num_rows($resultado_admin) == 1 )
			{			

				// si existe en la bd comprobamos si coincide la pass
				$res = mysql_fetch_array($resultado_admin);
								
				//Administrador
				if ($pass==$res['contrasenha_admin'] ){
					
					
					$sql = "select * from ADMINISTRADOR where ID_administrador = '".$res['ID_administrador']."'";
					
					$resultado = mysql_query($sql);
					
					if (mysql_num_rows($resultado) == 1){					
						
						
						header ('Location:/../controllers/administrador_controlador.php?login='.$login.'&pass='.$pass.''); 		
						return true;
					}
					else{
						return false;
					}
				}
				else{
					header ('Location:/../views/error/error_contrasenha1.html'); 
					return false;
				}		
			}
					
			/*****************ESTABLECIMIENTO**************************/
			else if ( mysql_num_rows($resultado_estab) == 1 )
			{
				// si existe en la bd comprobamos si coincide la pass
				$res = mysql_fetch_array($resultado_estab);
								
				if ($pass==$res['contrasenha_estab'] ){
					
					$_SESSION['tipoUsuario']='estab';									
					$_SESSION['nombre_estab']=$login;
					$_SESSION['ID_estab']=$res['ID_estab'];
					$sql = "select * from ESTABLECIMIENTO where ID_estab = '".$res['ID_estab']."'";
					
					$resultado = mysql_query($sql);
					
					if (mysql_num_rows($resultado) == 1){
						header ('Location:/../controllers/establecimiento_controlador.php'); 		
						return true;
					}
					else{
						return false;
					}
				}
				else{
					header ('Location:/../views/error/error_contrasenha1.html'); 
					return false;
				}		
			}
			/**********************************************************/
			//Jurado Profesional
			else if ( mysql_num_rows($resultado_jurPro) == 1 )
			{
				// si existe en la bd comprobamos si coincide la pass
				$res = mysql_fetch_array($resultado_jurPro);
								
				if ($pass==$res['contrasenha_jurPro'] ){
					
					$_SESSION['nombre_jurPro']=$login;
					$_SESSION['ID_juradoProfesional']=$res['ID_juradoProfesional'];
					$sql = "select * from JURADO_PROFESIONAL where ID_juradoProfesional = '".$res['ID_juradoProfesional']."'";
					
					$resultado = mysql_query($sql);
					
					if (mysql_num_rows($resultado) == 1){
						header ('Location:/../controllers/jurPro_controlador.php'); 		
						return true;
					}
					else{
						return false;
					}
				}
				else{
					header ('Location:/../views/error/error_contrasenha1.html'); 
					return false;
				}		
			}
			//Jurado Popular
			else if ( mysql_num_rows($resultado_jurPop) == 1 )
			{
				// si existe en la bd comprobamos si coincide la pass
				$res = mysql_fetch_array($resultado_jurPop);
							
				if ($pass==$res['contrasenha_jurPop'] ){
					
					$_SESSION['nombre_jurPop']=$login;
					$_SESSION['ID_juradoPopular']=$res['ID_juradoPopular'];
					$sql = "select * from JURADO_POPULAR where ID_juradoPopular = '".$res['ID_juradoPopular']."'";
					
					$resultado = mysql_query($sql);
					
					if (mysql_num_rows($resultado) == 1){
						header ('Location:/../views/IU_inicio_jurPop.html'); 		
						return true;
					}
					else{
						return false;
					}
				}
				else{
					header ('Location:/../views/error/error_contrasenha1.html'); 
					return false;
				}		
			}
			
			//si no existe el login en la bd lo mandamos a loguearse
			else{
					echo "nombre de usuario no encontrado";
					header ('Location:/index.php'); 
					return true;
			} 

		}      
		if ($accion=="Buscar" )
		{	
			header ('Location:/../controller/buscar_controlador.php'); 		

		}  
			

    }
	/***********************************************************/
	/***********************************************************/
	
	/***********************************************************/
	/***************RELLENAR FORMULARIO PINCHO******************/
	public function cubrirFormulario($login,$pass,$accion){
	
		
		
		if (isset($_REQUEST['accion'])) {
			$accion=$_REQUEST['accion'];
		} else {
			$accion='';
		}
		
		if (isset($_REQUEST['login'])) {
			echo "!!!!!!!!!!!!!!!!login: ".$_REQUEST['login']."</br>";
			$login=$_REQUEST['login'];
		} else {
			echo "!!!!!!!!!!!!!!!login vacio";
			$login='';
		}
		echo "ESTAMOS AQUI";
		//header ('Location:/../controller/buscar_controlador.php'); 		

		
	}
	/***********************************************************/
	/***********************************************************/

}
?>
