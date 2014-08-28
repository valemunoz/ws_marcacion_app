<?PHP

include ('connec.php');

function elimina_acentos($cadena)
{
	
	$tofind = "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ'`";
	$replac = "AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn  ";
	return(strtr($cadena,$tofind,$replac));
}
function addRegistro($data)
{
	$dbPg=pgSql_db();		
	
	$sql="insert into app_marcador(dni,nombre,fecha,tipo,imagen,cliente,app,apm,nombre_completo) values('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."','".$data[6]."','".$data[7]."','".$data[8]."');";
	
//	echo "<br>".$sql;
	$rsCalle = pg_query($dbPg, $sql);	
	
	pg_close($dbPg);

}

function getMarcas($qr)
{

	$dbPg=pgSql_db();
	
  $sql2 = "select id_marca,dni,nombre,fecha,tipo,imagen,cliente,app,apm,nombre_completo from app_marcador where 1=1";		
  if($qr!="")
  {
  	$sql2 .=$qr;
  }
  //echo $sql2;
  $rs2 = pg_query($dbPg, $sql2);

	while ($row2 = pg_fetch_row($rs2))
		{
			$data=array();
			$data[]=$row2[0];
			$data[]=$row2[1];
			$data[]=$row2[2];
			$data[]=$row2[3];
			$data[]=$row2[4];
			$data[]=$row2[5];
			$data[]=$row2[6];
			$data[]=$row2[7];
			$data[]=$row2[8];
			$data[]=$row2[9];
			
			$datos[]=$data;
		}
		pg_close($dbPg);
		
		return $datos;

}
function getCliente($qr)
{

	$dbPg=pgSql_db();
	
  $sql2 = "select id_cliente,nombre,estado from app_cliente_marcacion where 1=1";		
  if($qr!="")
  {
  	$sql2 .=$qr;
  }
  //echo $sql2;
  $rs2 = pg_query($dbPg, $sql2);

	while ($row2 = pg_fetch_row($rs2))
		{
			$data=array();
			$data[]=$row2[0];
			$data[]=$row2[1];
			$data[]=$row2[2];		
			
			$datos[]=$data;
		}
		pg_close($dbPg);
		
		return $datos;

}
function getUsuario($qr)
{

	$dbPg=pgSql_db();
	
  $sql2 = "select id_usuario,nombre,estado,mail,clave,cliente from app_usuario_marcacion where 1=1";		
  if($qr!="")
  {
  	$sql2 .=$qr;
  }
  //echo $sql2;
  $rs2 = pg_query($dbPg, $sql2);

	while ($row2 = pg_fetch_row($rs2))
		{
			$data=array();
			$data[]=$row2[0];
			$data[]=$row2[1];
			$data[]=$row2[2];		
			$data[]=$row2[3];		
			$data[]=$row2[4];		
			$data[]=$row2[5];		
			
			$datos[]=$data;
		}
		pg_close($dbPg);
		
		return $datos;

}
function getFechaLibre($horas)
{
	$fecha=date("Y-m-d H:i:s");
	$fecha_actual2 = strtotime ( '-'.$horas.' hours ' , strtotime ( $fecha ) ) ;
	$fec = date ( 'Y-m-d H:i:s' , $fecha_actual2 );
	return $fec;
}

function inicioSesion($mail,$user,$cliente)
{
	session_start();	
	//session_register('usuario');	
	$_SESSION["mail_app"] = $mail;
	$_SESSION["id_cliente_app"] = $cliente;
	$_SESSION["id_usuario_app"] = $user;
	$_SESSION['fecha']= getFechaLibre(3);
	
}
function cerrar_sesion()
{
	session_start();	
	unset($_SESSION["id_usuario_app"]); 
	unset($_SESSION['fecha']);	
	unset($_SESSION['id_cliente_app']);	
	unset($_SESSION["mail_app"]);
	
	//session_destroy();
}
function estado_sesion()
{
	session_start();
	
	$estado=1;
	$hoy=getFechaLibre(3);
	
	$tiempo= segundos($_SESSION['fecha'],$hoy);
	
	if(isset($_SESSION['id_usuario_app']) and $tiempo <= 7200)	//7200
  {
  	$estado=0;
  }
  
  return $estado;
}
function segundos($hora_inicio,$hora_fin){
$hora_i=substr($hora_inicio,11,2);
$minutos_i=substr($hora_inicio,14,2);
$año_i=substr($hora_inicio,0,4);
$mes_i=substr($hora_inicio,5,2);
$dia_i=substr($hora_inicio,8,2);
$hora_f=substr($hora_fin,11,2);
$minutos_f=substr($hora_fin,14,2);
$año_f=substr($hora_fin,0,4);
$mes_f=substr($hora_fin,5,2);
$dia_f=substr($hora_fin,8,2);
$diferencia_seg=mktime($hora_f,$minutos_f,0,$mes_f,$dia_f,$año_f) - mktime($hora_i,$minutos_i,0,$mes_i,$dia_i,$año_i);
return $diferencia_seg;
}
?>
