<?php
include("../funciones.php");
$path_img="http://www.architeq.cl/tui/load_marca";
$data_server= explode("?",$_SERVER['HTTP_REFERER']);
$estado_sesion=estado_sesion();
if(1==1)
{
	if($_REQUEST['tipo']==1)
	{
			//inicio sesion
			
			$usuario=getUsuario(" and mail ilike '".trim($_REQUEST['mail'])."' and clave= '".$_REQUEST['clave']."'");
			if(count($usuario)>0)
			{
				
				$cliente=getCliente(" and id_cliente=".$usuario[0][5]." and estado=0");
				if(count($cliente)>0)
				{
					//usuario valido
					inicioSesion($_REQUEST['mail'],$usuario[0][0],$cliente[0][0]);
				?>
						<script>
							window.location="index.php";
						</script>
						<?php 
				}else
				{
					echo "Error al iniciar sesion, Cliente no esta activado.";
				}
			}else
			{
				echo "Error al iniciar sesion, por favor revise los datos";
			}
		
	}elseif($_REQUEST['tipo']==2)
	{
		cerrar_sesion();
			?>
		<script>
			window.location="login.php";
		</script>
		<?php
	}elseif($_REQUEST['tipo']==3 and $estado_sesion==0) //listado marcaciones
	{
		$cliente=$_SESSION["id_cliente_app"];
		
		$nombre=$_REQUEST['nombre'];
		
		if(trim($cliente)!="")
		{
			$query .=" and cliente=".$cliente.""	;
		}
		
		if(trim($nombre)!="")
		{
			$query .=" and nombre_completo ilike '%".$nombre."%'"	;
		}	
		if(trim($_REQUEST['desde'])!="")
		{
			$query .=" and fecha >= '".$_REQUEST['desde']." 00:00:00'"	;
		}	
		if(trim($_REQUEST['hasta'])!="")
		{
			$query .=" and fecha <= '".$_REQUEST['hasta']." 23:59:59'"	;
		}	
		$query .=" order by fecha desc";
		
		$marcaciones=getMarcas($query);
		//print_r($marcaciones);
		?>
		<table border=1 id="table_resul" class="bordered">
			<!--	<tr class="titulo">-->
				<tr>
					<th style="width:5%;">ID</th>				
					<th style="width:40%;">NOMBRE</th>				
					<th style="width:15%;">DNI</th>				
					<th style="width:15%;">FECHA</th>
					
					<th style="width:10%;">TIPO</th>
					<th style="width:10%;">PANEL</th>
					
				</tr>
			<?php
			foreach($marcaciones as $i=> $us)
			{
			$tipo="Entrada";
			if($us[4]==2)
			{
				$tipo="Salida";
			}
				?>
				<tr>
					<td style="width:5%;"><?=$us[0]?></td>				
					<td style="width:40%;"><?=$us[9]?></td>				
					<td><?=$us[1]?></td>
					<td><?=$us[3]?></td>					
					<td><?=$tipo?></td>
					<?php
					//echo "".$path_img."/".$us[5]."";
					if(is_array(getimagesize(''.$path_img.'/'.$us[5].'')))
					{
						?>
						<td><a href="javascript:ver('<?=$us[5]?>');"><img src="img/find.png"></a></td>
						<?php
					}
					?>
				</tr>
				<?php
			}
			?>
			</table>
		<?php
	}elseif($_REQUEST['tipo']==4 and $estado_sesion==0)
	{
		?>
		<img width=300px height=400px src="<?=$path_img?>/<?=$_REQUEST['img']?>">
		<?php
	}

	
	
}

?>