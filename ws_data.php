<?php
include("funciones.php");

	if($_REQUEST['tipo']==1)//registra marca
	{
		//http://93.92.170.65/ws/ws_data.php?id_prod=1&tipo=1
	  $data=array();
	  //dni,nombre,fecha,tipo,imagen,cliente
	  $data[]=$_REQUEST['dni'];
	  $data[]=$_REQUEST['nombre'];
	  $data[]=$_REQUEST['fecha'];
	  $data[]=$_REQUEST['tipo_m'];
	  $data[]=$_REQUEST['imagen'];
	  $data[]=$_REQUEST['cli'];
	  $data[]=$_REQUEST['app'];
	  $data[]=$_REQUEST['apm'];
	  addRegistro($data);
	  
	  $response=0;
		echo $response;	
	}

?>