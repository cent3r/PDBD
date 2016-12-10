<?php
	
	include ("conex.php");

	$consulta = "SELECT usuarios.ID,Correo,NivelUS,TipoUS,Nombre FROM usuarios LEFT JOIN personas
ON usuarios.Id__Persna=personas.Id where usuarios.Estatus='Activo'";
	$registro = mysql_query($consulta,$dbx);
	
	$tabla = "";
	
	while($row = mysql_fetch_array($registro)){		

		$editar = '<a href=\"actualizar.php?ID='.$row['ID'].'\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a>';
		$eliminar = '<a href=\"eliminar.php?ID='.$row['ID'].'\" onclick=\"return confirm(\'¿Seguro que desea eliminiar este usuario?\')\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Eliminar\" class=\"btn btn-danger\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>';
		
		$tabla.='{
				  "correo":"'.$row['Correo'].'",
				  "nivel":"'.$row['NivelUS'].'",
				  "name":"'.$row['Nombre'].'",
				  "tipo":"'.$row['TipoUS'].'",
				  "acciones":"'.$editar.$eliminar.'"
				},';		
	}	

	//eliminamos la coma que sobra
	$tabla = substr($tabla,0, strlen($tabla) - 1);

	echo '{"data":['.$tabla.']}';	

?>