<?php
require_once("/../db/db.php");
class db_model{

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
	
	public function loguear_invitado($login,$pass,$accion){
		
		session_start();
		
		//$this->db=Conectar::conexion();		

		/*echo "nombre de usuario_recibido: ".$login."</br>";
		echo "contrasenha_recibida: ".$pass."</br>";
		echo "accion_recibida: ".$accion."</br>";
		*/
		if ($accion=="Loguear" )
		{	
			if ($login == NULL || $pass == NULL){
			 header ("Location:/../views/campos_incompletos.html");
			 return false;

			}
			//comprobamos si existe en la bd
			//$sql_admin = "select * from ADMINISTRADOR where nombre_admin = '".$login."'";
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
					
					$_SESSION['nombre_admin']=$login;
					$_SESSION['ID_admin']=$res['ID_admin'];
					$sql = "select * from ADMINISTRADOR where ID_administrador = '".$res['ID_administrador']."'";
					
					$resultado = mysql_query($sql);
					
					if (mysql_num_rows($resultado) == 1){
						header ('Location:/../views/administrador.html'); 		
						return true;
					}
					else{
						return false;
					}
				}
				else{
					header ('Location:/../views/error_contrasenha1.html'); 
					return false;
				}		
			}
					
			//Establecimiento

			else if ( mysql_num_rows($resultado_estab) == 1 )
			{
				// si existe en la bd comprobamos si coincide la pass
				$res = mysql_fetch_array($resultado_estab);
				// y el tipo de usuario que recogemos de la bd
				// si la pass coincide registramos en la session el login
				// y lo enviamos a la pagina de Inicio de Usuario
				
				if ($pass==$res['contrasenha_estab'] ){
					
					$_SESSION['nombre_estab']=$login;
					$_SESSION['ID_estab']=$res['ID_estab'];
					$sql = "select * from ESTABLECIMIENTO where ID_estab = '".$res['ID_estab']."'";
					
					$resultado = mysql_query($sql);
					
					if (mysql_num_rows($resultado) == 1){
						header ('Location:/../views/establecimiento.html'); 		
						return true;
					}
					else{
						return false;
					}
				}
				else{
					header ('Location:/../views/error_contrasenha1.html'); 
					return false;
				}		
			}
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
						header ('Location:/../views/jurPro.html'); 		
						return true;
					}
					else{
						return false;
					}
				}
				else{
					header ('Location:/../views/error_contrasenha1.html'); 
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
						header ('Location:/../views/jurPop.html'); 		
						return true;
					}
					else{
						return false;
					}
				}
				else{
					header ('Location:/../views/error_contrasenha1.html'); 
					return false;
				}		
			}
			
			//si no existe el login en la bd lo mandamos a loguearse
			else{
					echo "nombre de usuario no encontrado";
					//header ('Location:/../views/IU_login.html'); 
					return true;
			} 

		}        

    }
}
?>
