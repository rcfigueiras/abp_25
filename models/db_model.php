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
	
	/*---------------------------------------------------------*/
	/*---------------------------------------------------------*/
	/*****************LOGUEAR INVITADO**************************/
	public function loguear_invitado(){

		/*Recogemos las variables del formulario de IU_login.php*/
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

		if (isset($_REQUEST['accion'])) {
			$accion=$_REQUEST['accion'];
		} else {
			$accion='';
		}
		/*Metemos las variables en la sesión*/
		$_SESSION['login']  = $login;
		$_SESSION['pass'] = $pass;
		$_SESSION['accion'] = $accion;
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
						
						

						header ('Location:/../controllers/administrador_controlador.php'); 		
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
					header ('Location:/../views/error/error_contrasenha1
					'); 
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
					header ('Location:/index.php'); 
					return true;
			} 

		}      		

    }
	/*---------------------------------------------------------*/
	/*---------------------------------------------------------*/
	/***************ENVIAR FORMULARIO PINCHO******************/
	public function enviarFormulario(){		
	
		//Recuperamos el nombre del estblecimiento
		$login = $_SESSION['login'];  
		$_SESSION['campos_incompletos']=0;
		$_SESSION['errorSQL'] = 1;
		
		//Recuperar el id_estab e id_administrador
		$sql="SELECT ID_estab,ID_administrador from ESTABLECIMIENTO where nombre_estab = '".$login."'";
		$resultado = mysql_query($sql);
		$row=mysql_fetch_row($resultado);
		$id_estab=$row[0];
		$id_administrador=$row[1];
		
		//Recuperamos las variables del formulario
		$nombrePin=$_REQUEST['nombrePin'];
		$tipoPin=$_REQUEST['tipoPin'];
		$descPin=$_REQUEST['descPin'];
		$precioPin=$_REQUEST['precioPin'];
		$fotoPin=$_REQUEST['fotoPin'];
		$horarioPin=$_REQUEST['horarioPin'];

		if($nombrePin == NULL || $tipoPin == NULL ||
			$descPin == NULL || $precioPin == NULL ||
			$fotoPin == NULL ){
			$_SESSION['campos_incompletos']=1;
		}
		else{
			$sql="INSERT INTO PINCHO (id_pincho,id_administrador,id_estab,nombre_pincho,tipo,descripcion,precio,foto,horario,pincho_validado) VALUES ('','".$id_administrador."','".$id_estab."','".$nombrePin."', '".$tipoPin."','".$descPin."', '".$precioPin."','".$fotoPin."' , '".$horarioPin."','false')";
			mysql_query($sql);
		}
		//Validamos que la inserción se ha realizado correctamente
		if (mysql_affected_rows() > 0)
		{
			$_SESSION['errorSQL'] = 0;
		}
		else{
			$_SESSION['errorSQL'] = 1;
		}
	}	
	/*---------------------------------------------------------*/
	/*---------------------------------------------------------*/
	/******************Edita Pincho*****************************/
	public function editarPincho(){
		$login=$_SESSION['login'];
		echo $login;
		//recuperamos la información almacenada del pincho del establecimiento
		$sql="SELECT nombre_pincho,tipo,descripcion,precio,foto,horario FROM ESTABLECIMIENTO E,PINCHO P where nombre_estab = '".$login."'";
		$resultado = mysql_query($sql);
		$row=mysql_fetch_row($resultado);
		//Pasamos resultado de la consulta al controlador 
		if ($row > 0){
			
			$_SESSION['errorSQL'] = 0;
			
			$nombre_pincho=$row[0];
			$tipo=$row[1];
			$descripcion=$row[2];
			$precio=$row[3];
			$foto=$row[4];
			$horario=$row[5];
			
			$_SESSION['nombre_pincho'] = $nombre_pincho;
			$_SESSION['tipo'] = $tipo;
			$_SESSION['descripcion'] = $descripcion;
			$_SESSION['precio'] = $precio;
			$_SESSION['foto'] = $foto;
			$_SESSION['horario'] = $horario;
		}
		else{
			$_SESSION['errorSQL'] = 1;

		}
		
	}
	public function editarFormulario(){
		//Recuperamos el login del establecimiento
		$login=$_SESSION['login'];
		//Recuperamos también las variables editables por el
		//establecimiento
		$newfoto =  $_REQUEST['newfoto'];
		$newhorario =  $_REQUEST['newhorario'];
		
		if ($newfoto == '' ){//se actualiza el horario

			$sql="UPDATE PINCHO P,ESTABLECIMIENTO E  SET P.horario ='".$newhorario."' WHERE P.ID_estab=E.ID_estab AND E.nombre_estab='".$login."'";
			$resultado=mysql_query($sql);
			
		}else if ($newhorario == '' ){//se actualiza la foto
		
			$sql="UPDATE PINCHO P, ESTABLECIMIENTO E  SET P.foto ='".$newfoto."' WHERE E.nombre_estab = '".$login."' AND P.ID_estab = E.ID_estab";
			$resultado=mysql_query($sql);

		
		}else{//se actualizan los dos
				
				$sql="UPDATE PINCHO P,ESTABLECIMIENTO E  SET P.foto ='".$newfoto."',P.horario ='".$newhorario."' WHERE P.ID_estab=E.ID_estab AND E.nombre_estab='".$login."'";
				$resultado=mysql_query($sql);
			
		}
		
		if (mysql_affected_rows() > 0)
		{
			$_SESSION['errorSQL'] = 0;
		}
		else{$_SESSION['errorSQL']=1;
		}
		
	}
/*---------------------------------------------------------*/
/*---------------------------------------------------------*/
/*****************VALIDAR PINCHOS***************************/
	public function validarPinchos(){
		$login=$_SESSION['login'];
		$sql="select * from pincho where pincho_validado = false";
		$resultado=mysql_query($sql);
		$array_pinchos=array();
		while($filas=mysql_fetch_assoc($resultado)){
			$array_pinchos[]=$filas;
		}
		//echo array_pinchos['0'];
		//echo array_pinchos['1'];
		$nombre_pincho=$row[0];
		echo $nombre_pincho;
		echo $login;
	}

}
?>
