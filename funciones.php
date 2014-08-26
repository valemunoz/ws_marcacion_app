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
	
	$sql="insert into app_marcador(dni,nombre,fecha,tipo,imagen,cliente,app,apm) values('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."','".$data[6]."','".$data[7]."');";
	
//	echo "<br>".$sql;
	$rsCalle = pg_query($dbPg, $sql);	
	
	pg_close($dbPg);

}
?>
