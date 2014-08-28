
function filtrar_em()
{
	
	
	var nombre=$.trim(document.getElementById("nom_em").value);
	var desde=$.trim(document.getElementById("desde").value);
	var hasta=$.trim(document.getElementById("hasta").value);
	$("#result2").html("<img src='img/load.GIF'>");
	$("#result2").load("query.php", 
						{tipo:3, nombre:nombre, desde:desde, hasta:hasta} 
							,function(){
									
							}
	);
}	

function ver(img)
{
	$("#grilla_def").load("query.php", 
							{tipo:4,img:img} 
								,function(){
						OpenModalReg();
								}
		);
}
function OpenModalReg()
{
		$( "#grilla_def" ).dialog( "open" );
}
function CloseModalReg()
{
		$( "#grilla_def" ).dialog( "close" );
}

function salir()
				{
					$("#contenido").load("query.php", 
						{tipo:2} 
							,function(){	
							}
					);
				}