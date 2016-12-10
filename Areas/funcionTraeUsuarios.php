<?php
	
	include ("conex.php");

	$consulta = "SELECT areas.Id,IdDependencia,Nomb,Nombre FROM areas LEFT JOIN dependencias
ON areas.IdDependencia=dependencias.Id where areas.Estatus='Activo'";
	$registro = mysql_query($consulta,$dbx);
	
	$tabla = "";
	
	while($row = mysql_fetch_array($registro)){		

		$editar = '<a href=\"actualizar.php?Id='.$row['Id'].'\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a>';
		$eliminar = '<a href=\"eliminar.php?Id='.$row['Id'].'\" onclick=\"return confirm(\'¿Seguro que desea eliminiar este usuario?\')\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Eliminar\" class=\"btn btn-danger\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>';
		
		$tabla.='{
				  "dep":"'.$row['Nombre'].'",
				  "name":"'.$row['Nomb'].'",
				  "acciones":"'.$editar.$eliminar.'"
				},';		
	}	

	//eliminamos la coma que sobra
	$tabla = substr($tabla,0, strlen($tabla) - 1);

	echo '{"data":['.$tabla.']}';	

?>