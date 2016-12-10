<?php
	
	include ("conex.php");

	$consulta = "SELECT * FROM nombrecurso where Estatus='Activo' ";
	$registro = mysql_query($consulta,$dbx);
	
	$tabla = "";
	
	while($row = mysql_fetch_array($registro)){		

		$editar = ' <a href="usuarios.php" class="btn btn-primary pull-right menu"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Nuevo o</a>
	 <?php';
		$eliminar = 'a href="usuarios.php" class="btn btn-primary pull-right menu"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Nuevo o</a>
	 <?php';
		
		$tabla.='{
				  
				  "name":"'.$row['Nombre'].'",
				  "acciones":"'.$editar.$eliminar.'"
				},';		
	}	

	//eliminamos la coma que sobra
	$tabla = substr($tabla,0, strlen($tabla) - 1);

	echo '{"data":['.$tabla.']}';	

?>