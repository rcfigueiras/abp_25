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
			$_SESSION['login']='';
			 header ("Location:/../views/error/error_campos_incompletos.php");
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
					
					$sql = "select * from ADMINISTRADOR 
						where ID_administrador = '".$res['ID_administrador']."'";
					
					$resultado = mysql_query($sql);
					
					if (mysql_num_rows($resultado) == 1){						
						
						$_SESSION['tipoUsu']='administrador';
						header ('Location:/../controllers/administrador_controlador.php'); 		
						return true;
					}
					
					else{
						return false;
					}
				}
				else{
					$_SESSION['login']='';
					header ('Location:/../views/error/error_contrasenha1.php'); 
					return false;
				}		
			}
					
			/*****************ESTABLECIMIENTO**************************/
			else if ( mysql_num_rows($resultado_estab) == 1 )
			{
				// si existe en la bd comprobamos si coincide la pass
				$res = mysql_fetch_array($resultado_estab);
								
				if ($pass==$res['contrasenha_estab'] ){
					
					$_SESSION['nombre_estab']=$login;
					$_SESSION['ID_estab']=$res['ID_estab'];
					$sql = "select * from ESTABLECIMIENTO where ID_estab = '".$res['ID_estab']."'";
					
					$resultado = mysql_query($sql);
					
					if (mysql_num_rows($resultado) == 1){
					
						$_SESSION['tipoUsu']='establecimiento';
						header ('Location:/../controllers/establecimiento_controlador.php'); 		
						return true;
					}
					else{
						return false;
					}
				}
				else{
					$_SESSION['login']='';
					header ('Location:/../views/error/error_contrasenha1.php'); 
					return false;
				}		
			}			
			/**************************************************************/
			/**************Jurado Profesional******************************/
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
						$_SESSION['tipoUsu']='jurPro';
						header ('Location:/../controllers/jurPro_controlador.php'); 		
						return true;
					}
					else{
						return false;
					}
				}
				else{
					$_SESSION['login']='';
					header ('Location:/../views/error/error_contrasenha1.php'); 
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
					$sql = "SELECT * 
							FROM JURADO_POPULAR 
							WHERE ID_juradoPopular = '".$res['ID_juradoPopular']."'";
					
					$resultado = mysql_query($sql);
					
					if (mysql_num_rows($resultado) == 1){
						$_SESSION['tipoUsu']='jurPop';
						header ('Location:/../controllers/jurPop_controlador.php'); 		
						return true;
					}
					else{
						return false;
					}
				}
				else{
					$_SESSION['login']='';
					header ('Location:/../views/error/error_contrasenha1.php'); 
					return false;
				}		
			}			
			//si no existe el login en la bd lo mandamos a loguearse
			else{
					$_SESSION['login']='';
					header ('Location:/../views/error/error_usuario.php'); 
					return false;
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
		$_SESSION['id_admin']=$id_administrador;
		$_SESSION['id_estab']=$id_estab;
		
		//Recuperamos las variables del formulario
		$nombrePin=$_REQUEST['nombrePin'];
		$tipoPin=$_REQUEST['tipoPin'];
		$descPin=$_REQUEST['descPin'];
		$precioPin=$_REQUEST['precioPin'];
		$horarioPin=$_REQUEST['horarioPin'];
				
		$ruta="/src/imagenes";		
		$fotoPin=$_FILES['fotoPin']['tmp_name'];
		$nombreFoto=$_FILES['fotoPin']['name'];
		move_uploaded_file($fotoPin,$_SERVER['DOCUMENT_ROOT'].$ruta."/".$nombreFoto);
		$ruta=$ruta."/".$nombreFoto;
		
		if($nombrePin == NULL || $tipoPin == NULL ||
			$descPin == NULL || $precioPin == NULL
			|| $fotoPin == NULL ){
			$_SESSION['campos_incompletos']=1;
		}
		else{
			$sql="INSERT INTO PINCHO (ID_pincho
									,ID_administrador
									,ID_estab
									,nombre_pincho
									,tipo,descripcion
									,precio
									,foto
									,horario
									,pincho_validado) 
							VALUES (''
									,'".$id_administrador."'
									,'".$id_estab."'
									,'".$nombrePin."'
									,'".$tipoPin."'
									,'".$descPin."'
									,'".$precioPin."'
									,'".$ruta."'
									,'".$horarioPin."'
									,'0')";
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
		$sql="UPDATE ESTABLECIMIENTO E
				SET E.comunicacion ='Pincho pendiente de validación.' 
				WHERE E.nombre_estab='".$login."'";
		
		mysql_query($sql);
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
		$_SESSION['errorSQL'] = 1;
		//Recuperamos también las variables editables por el
		//establecimiento
		$ruta="/src/imagenes";		
		
		$fotoPin=$_FILES['newfoto']['tmp_name'];
		
		$nombreFoto=$_FILES['newfoto']['name'];		
		
		move_uploaded_file($fotoPin,$_SERVER['DOCUMENT_ROOT'].$ruta."/".$nombreFoto);
		
		$ruta=$ruta."/".$nombreFoto;
		
		$newhorario =  $_REQUEST['newhorario'];	

		if ($nombreFoto == '' ){//se actualiza el horario
		
			$sql="UPDATE PINCHO P,ESTABLECIMIENTO E  
				SET P.horario ='".$newhorario."' 
				WHERE P.ID_estab=E.ID_estab 
				AND E.nombre_estab='".$login."'";
			$resultado=mysql_query($sql);
			
		}else if ($newhorario == '' ){//se actualiza la foto
		
			$sql="UPDATE PINCHO P, ESTABLECIMIENTO E  
				SET P.foto ='".$ruta."' 
				WHERE E.nombre_estab = '".$login."' 
				AND P.ID_estab = E.ID_estab";
			$resultado=mysql_query($sql);		
		}else{//se actualizan los dos				
			$sql="UPDATE PINCHO P,ESTABLECIMIENTO E  
				SET P.foto ='".$ruta."',P.horario ='".$newhorario."' 
				WHERE P.ID_estab=E.ID_estab 
				AND E.nombre_estab='".$login."'";
			$resultado=mysql_query($sql);			
		}		
		
		if ( mysql_affected_rows() > 0 )
		{
			$_SESSION['errorSQL'] = 0;
		} else { 
			$_SESSION['errorSQL']=1;
		}		
	}
/*---------------------------------------------------------*/
/*---------------------------------------------------------*/
/*****************VALIDAR PINCHOS***************************/
	public function validarPinchos(){
		
		$login=$_SESSION['login'];
		$sql="select * from pincho where pincho_validado = false";
		$pinchos=array();
		$consulta = mysql_query($sql);
		
		if (mysql_affected_rows() > 0)
		{
			$_SESSION['errorSQL'] = 0;
			
		}
		else{
			$_SESSION['errorSQL']=1;
		}
		
		while ($filas = mysql_fetch_assoc($consulta)){
			$pinchos[]=$filas;
		} 		
		$_SESSION['pinchos']=$pinchos;
	}
	/*---------------------------------------------------------*/
	/*---------------------------------------------------------*/
	/*****************ALTA PINCHO*******************************/
	public function altaPincho(){
		$nombre_pin=$_REQUEST['nombrePin'];
		
		$sql="UPDATE PINCHO SET pincho_validado='1' WHERE nombre_pincho='".$nombre_pin."'";
		$resultado=mysql_query($sql);
		
		if (mysql_affected_rows() > 0)
		{
			$_SESSION['errorSQL'] = 0;
			
		}
		else{
			$_SESSION['errorSQL']=1;
		}
		/*Se registra un mensaje para el establecimiento
		informándole de que su pincho ha sido validado
		por la organización del concurso**/
		$sql="UPDATE ESTABLECIMIENTO E,PINCHO P  
				SET E.comunicacion ='Pincho validado' 
				WHERE P.ID_estab=E.ID_estab 
				AND
				P.nombre_pincho='".$nombre_pin."'";
		mysql_query($sql);

	}
/*---------------------------------------------------------*/
/*---------------------------------------------------------*/
/*****************ELIMINAR PINCHOS***************************/
	public function eliminarPinchos(){
		
		$login=$_SESSION['login'];
		$sql="select * from pincho where pincho_validado = true";
		$pinchos=array();
		$consulta = mysql_query($sql);
		
		if (mysql_affected_rows() > 0)
		{
			$_SESSION['errorSQL'] = 0;
			
		}
		else{
			$_SESSION['errorSQL']=1;
		}
		
		
		//$lista_pinchos= mysql_num_rows($resultado);
		//echo "Encontrados: ".$registros_encontrados."<br>";
		
		while ($filas = mysql_fetch_assoc($consulta)){
			$pinchos[]=$filas;
		} 		
		$_SESSION['pinchos']=$pinchos;
	}
/*---------------------------------------------------------*/
/*---------------------------------------------------------*/
/*****************ELIMINA ESTE PINCHOS**********************/
	public function eliminaPincho(){
		
		$nombre_pin=$_REQUEST['nombrePin'];
		
		$sql="SELECT E.id_estab
			FROM establecimiento E,pincho P 
			WHERE E.id_estab = P.id_estab 
			AND
			p.nombre_pincho='".$nombre_pin."'";
		
		$resultado = mysql_query($sql);
		$row=mysql_fetch_row($resultado);
		$id_estab=$row[0];
		echo $id_estab;
		
		$sql="DELETE FROM PINCHO WHERE nombre_pincho = '".$nombre_pin."'";
		$resultado=mysql_query($sql);
		
		if (mysql_affected_rows() > 0)
		{
			$_SESSION['errorSQL'] = 0;
			
		}
		else{
			$_SESSION['errorSQL']=1;
		}
		$sql="UPDATE ESTABLECIMIENTO E
				SET E.comunicacion ='Pincho ELIMINADO' 
				WHERE E.ID_estab='".$id_estab."'";
		mysql_query($sql);
	}
/*---------------------------------------------------------*/
/*---------------------------------------------------------*/
/*****************VALORAR PINCHOS***************************/
	public function valorarPinchos(){
		
		$login=$_SESSION['login'];
		$sql = "SELECT *
				FROM ASIGNA_PINCHO A, 
					JURADO_PROFESIONAL J,
					PINCHO P					
				WHERE 
					A.ID_jurPro=J.ID_juradoProfesional
					AND
					P.ID_pincho=A.ID_pincho
					AND
					J.nombre_jurPro='".$login."'";
		$resultado=mysql_query($sql);		
		
		if(mysql_affected_rows() > 0){
			//si tiene pinchos asignados se los mostramos
			$pinchos=array();
			$_SESSION['errorSQL_no_tiene']=0;
			while ($filas = mysql_fetch_assoc($resultado)){
				
				$pinchos[]=$filas;
			} 	
			
			$_SESSION['pinchos']=$pinchos;			
		}
		else{
			//si no tiene pinchos asignados salimos y devolvemos error
			$_SESSION['errorSQL_no_tiene']=1;
		}		
	}
/*---------------------------------------------------------*/
/*---------------------------------------------------------*/
/*****************VALORA YA  ESTE PINCHOS*******************/
	public function valoraYaPincho(){		
		$nombre_pin=$_SESSION['nombrePin'];
		$login=$_SESSION['login'];
		$nota=$_SESSION['nota'];
		$comentario=$_SESSION['comentario'];
		//recuperamos el id del jurado profesional
		//y del administrador
		$sql="select id_juradoProfesional,id_administrador
				from jurado_profesional
				where nombre_jurPro='".$login."'";
		$resultado=mysql_query($sql);
		$row=mysql_fetch_row($resultado);
		$id_jurPro=$row[0];
		$id_admin=$row[1];
		$sql="select id_pincho
				from pincho
				where nombre_pincho='".$nombre_pin."'";
		$resultado=mysql_query($sql);
		$row=mysql_fetch_row($resultado);
		$id_pincho=$row[0];
		$_SESSION['idpincho']=$id_pincho;
		$_SESSION['jurpro']=$id_jurPro;
		$_SESSION['idadmin']=$id_admin;
		$_SESSION['nota']=$nota;
		$_SESSION['coment']=$comentario;

		$sql="INSERT INTO VALORACION (ID_pincho,
										ID_valoracion,
										ID_juradoPro,
										ID_administrador,
										nota,
										comentario_val)
							VALUES	('".$id_pincho."',
									NULL,
									'".$id_jurPro."',
									'".$id_admin."',
									'".$nota."',
									'".$comentario."')";
		mysql_query($sql);
		
		if (mysql_affected_rows() > 0)
		{
			$_SESSION['errorSQL'] = 0;
			
		}
		else{
			$_SESSION['errorSQL']=1;
		}
		
		
	}
/*---------------------------------------------------------*/
/*---------------------------------------------------------*/
/*****************COMPROBAR VALORACIÓN DE ESTE PINCHO*******/
	public function comprobarValoracion(){
		$nombrePin=$_SESSION['nombrePin'];
		$login=$_SESSION['login'];
	
		$sql="	SELECT nota,comentario_val
				FROM pincho p, jurado_profesional j, valoracion v
				WHERE
				p.id_pincho=v.id_pincho
				AND
				j.id_juradoProfesional=v.id_juradoPro
				AND
				p.nombre_pincho='".$nombrePin."'
				AND
				j.nombre_jurPro='".$login."'";
				
		$resultado = mysql_query($sql);
		$row=mysql_fetch_row($resultado);
		$nota=$row[0];
		$comentario=$row[1];
		if(mysql_affected_rows() > 0){
			$_SESSION['nota']=$nota;
			$_SESSION['comentario']=$comentario;
			$_SESSION['yaValorado'] = 1;
		}else{
			$_SESSION['yaValorado'] = 0;
		}
	}
/*---------------------------------------------------------*/
/*---------------------------------------------------------*/
/*****************MODIFICA LA VALORACIÓN DEL PINCHOS********/
	public function modificaValoracionPincho(){
		
		$nombre_pin=$_SESSION['nombrePin'];
		$login=$_SESSION['login'];
		$newNota=$_SESSION['newNota'];
		$newComentario=$_SESSION['newComentario'];
		
		$sql="SELECT id_valoracion
				FROM pincho p, valoracion v, jurado_profesional j
				WHERE p.id_pincho=v.id_pincho
				AND j.id_juradoProfesional=v.id_juradoPro
				AND p.nombre_pincho = '".$nombre_pin."'
				AND j.nombre_jurPro = '".$login."'";
		$resultado=mysql_query($sql);
		$row=mysql_fetch_row($resultado);
		$id_val=$row[0];
		
		$sql="UPDATE VALORACION V
				SET V.nota='".$newNota."',
				V.comentario_val='".$newComentario."'
				WHERE V.id_valoracion='".$id_val."'";
		mysql_query($sql);
		
		if (mysql_affected_rows() > 0)
		{
			$_SESSION['errorSQL'] = 0;
			
		}
		else{
			$_SESSION['errorSQL']=1;
		}
		
		
	}
	
	
	
	
	
	
	
	
	
	
	/*---------------------------------------------------------*/
	/*---------------------------------------------------------*/
	/***************ENVIAR FORMULARIO SISTEMA******************/
	public function enviarFormularioSistema(){	
		$_SESSION['campos_incompletos']=0;
		$_SESSION['errorSQL'] = 1;
		
		//Recuperamos las variables del formulario
		$nombreConc=$_REQUEST['nombreConc'];
		//$basesConc=$_REQUEST['basesConc'];
		
		$rutabases="/src/docs";		
		$basesConc=$_FILES['basesConc']['tmp_name'];
		$nombreBases=$_FILES['basesConc']['name'];
		move_uploaded_file($basesConc,$_SERVER['DOCUMENT_ROOT'].$rutabases."/".$nombreFoto);
		$rutabases=$rutabases."/".$nombreBases;
		
		$rutalogo="/src/imagenes";		
		$logoConc=$_FILES['logoConc']['tmp_name'];
		$nombreFoto=$_FILES['logoConc']['name'];
		move_uploaded_file($logoConc,$_SERVER['DOCUMENT_ROOT'].$rutalogo."/".$nombreFoto);
		$rutalogo=$rutalogo."/".$nombreFoto;
		

		if($nombreConc == NULL || $rutabases == NULL ||
			$rutalogo == NULL){
			$_SESSION['campos_incompletos']=1;
		}
		else{
			$sql="INSERT INTO PINCHOGES (ID_administrador
									,nombre_consurso
									,bases
									,logotipo
											) 
							VALUES ('1'
									,'".$nombreConc."'
									,'".$rutabases."'
									,'".$rutalogo."'
									)";
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
	/******************Edita Info Sistema*****************************/
	public function editarInfoSistema(){

	
	
		//recuperamos la información almacenada del pincho del establecimiento
		$sql="SELECT nombre_consurso,bases,logotipo 
				FROM PINCHOGES where 
				ID_administrador = '1'";
		$resultado = mysql_query($sql);
		$fila=mysql_fetch_row($resultado);
		//Pasamos resultado de la consulta al controlador 	
		
		if ($fila > 0){
			
			$_SESSION['errorSQL'] = 0;
			
			$nombre_consurso=$fila[0];
			$bases=$fila[1];
			$logotipo=$fila[2];

			
			$_SESSION['nombre_consurso'] = $nombre_consurso;
			$_SESSION['bases'] = $bases;
			$_SESSION['logotipo'] = $logotipo;


		}
		else{
			
			$_SESSION['errorSQL'] = 1;

		}
		
	}
	
	
	/*---------------------------------------------------------*/
	/*---------------------------------------------------------*/
		/******************Edita Formulario Info Sistema*****************************/

		
		public function editarFormularioSistema(){		

		$_SESSION['campos_incompletos']=0;
		
		//Recuperamos las variables del formulario
		$nombreConcNew=$_REQUEST['nombreConcNew'];
		
		$rutanewbases="/src/docs";		
		$basesConcNew=$_FILES['basesConcNew']['tmp_name'];
		$nombreBases=$_FILES['basesConcNew']['name'];
		move_uploaded_file($basesConcNew,$_SERVER['DOCUMENT_ROOT'].$rutanewbases."/".$nombreBases);
		$rutanewbases=$rutanewbases."/".$nombreBases;
		
		$rutanewlogo="/src/imagenes";		
		$logoConcNew=$_FILES['logoConcNew']['tmp_name'];
		$nombreLogo=$_FILES['logoConcNew']['name'];
		move_uploaded_file($logoConcNew,$_SERVER['DOCUMENT_ROOT'].$rutanewlogo."/".$nombreLogo);
		$rutanewlogo=$rutanewlogo."/".$nombreLogo;
		
		if($nombreConcNew == NULL 
			&& $nombreBases == NULL 
			&& $nombreLogo == NULL){
			
			$_SESSION['campos_incompletos']=1;
			
		}else if (($nombreLogo == NULL)&&($nombreBases == NULL)){
			$sql="UPDATE PINCHOGES P SET P.nombre_consurso='".$nombreConcNew."'
				WHERE P.ID_administrador='1'";							
								
			mysql_query($sql);
			
		} else if (($nombreBases == NULL)&&($nombreConcNew == NULL)){
			$sql="UPDATE PINCHOGES P SET P.logotipo ='".$rutanewlogo."' 
				WHERE P.ID_administrador='1'";							
								
			mysql_query($sql);
		
		}else if (($nombreLogo == NULL)&&($nombreConcNew == NULL)){
			$sql="UPDATE PINCHOGES P SET P.bases ='".$rutanewbases."' 
				WHERE P.ID_administrador='1'";							
								
			mysql_query($sql);
		
		}	else if ($nombreConcNew == NULL){	
			$sql="UPDATE PINCHOGES P SET 
										,P.bases ='".$rutanewbases."'
										,P.logotipo ='".$rutanewlogo."' 
				WHERE P.ID_administrador='1'";							
								
			mysql_query($sql);
		}	else if ($nombreBases == NULL){
			$sql="UPDATE PINCHOGES P SET P.nombre_consurso='".$nombreConcNew."'
										,P.logotipo ='".$rutanewlogo."' 
				WHERE P.ID_administrador='1'";							
								
			mysql_query($sql);
		
		} else if ($nombreLogo == NULL){
			$sql="UPDATE PINCHOGES P SET P.nombre_consurso='".$nombreConcNew."'
										,P.bases ='".$rutanewbases."' 
				WHERE P.ID_administrador='1'";							
								
			mysql_query($sql);
		
		}else{
			$sql="UPDATE PINCHOGES P SET P.nombre_consurso='".$nombreConcNew."'
										,P.bases ='".$rutanewbases."'
										,P.logotipo ='".$rutanewlogo."'
				WHERE P.ID_administrador='1'";							
								
			mysql_query($sql);
			
		}

		require_once("../index.php");
	}	
	
	////***Busqueda***\\\\
	public function buscarPincho(){
	
	$_SESSION['buscar']='';
	$_SESSION['errorSQL_noHay']=0;
	
	
	$search=$_SESSION['search'];
	echo $search;

	$sql="SELECT * FROM PINCHO, ESTABLECIMIENTO  
		WHERE ( nombre_pincho like '".$search."' 
		or tipo like '".$search."' 
		or nombre_estab like '".$search."' ) 
		and pincho_validado='1' 
		and pincho.ID_estab=establecimiento.ID_estab ";
	
	$resultado=mysql_query($sql);
	
	if(mysql_affected_rows() > 0){
			
		$pinchos=array();
		
		while ($filas = mysql_fetch_assoc($resultado)){
			
			$pinchos[]=$filas;
		} 	
			
		$_SESSION['buscar']=$pinchos;			
		}
		
	else{
	
		$_SESSION['errorSQL_noHay']=1;
	}	
	
	}
	
}
?>
