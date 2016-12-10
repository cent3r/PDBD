
<?php
	
	include ("conex.php");

	$consulta = "SELECT capacitadores.Id,IDPersona,Curriculum,Empresa,Nombre,CURP,FechaNac,RFC,Sexo,Tipo,TipoTelefono,Numero FROM capacitadores left JOIN personas ON (capacitadores.IDPersona=personas.Id)left JOIN telefonos on (capacitadores.Id=telefonos.id_TipoPersona) where capacitadores.Estatus='Activo' AND Tipo='Capacitador'";
	$registro = mysql_query($consulta,$dbx);
	
	$tabla = "";
	
	while($row = mysql_fetch_array($registro)){		

$editar = '<a href=\"actualizar2.php?Id='.$row['Id'].'&IDPersona='.$row['IDPersona'].'&Curriculum='.$row['Curriculum'].'&Empresa='.$row['Empresa'].'&Nombre='.$row['Nombre'].'&CURP='.$row['CURP'].'&FechaNac='.$row['FechaNac'].'&RFC='.$row['RFC'].'&Sexo='.$row['Sexo'].'&TipoTelefono='.$row['TipoTelefono'].'&Numero='.$row['Numero'].'\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a>';
		$eliminar = '<a href=\"eliminar.php?Id='.$row['Id'].'\" onclick=\"return confirm(\'¿Seguro que desea eliminiar este usuario?\')\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Eliminar\" class=\"btn btn-danger\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>';
		
		$tabla.='{
				  "name":"'.$row['Nombre'].'",
				  "curp":"'.$row['CURP'].'",
				  "nac":"'.$row['FechaNac'].'",
				  "rfc":"'.$row['RFC'].'",
				  "sexo":"'.$row['Sexo'].'",
				  "cur":"'.$row['Curriculum'].'",
				  "emp":"'.$row['Empresa'].'",
				  "acciones":"'.$editar.$eliminar.'"
				},';		
	}	

	//eliminamos la coma que sobra
	$tabla = substr($tabla,0, strlen($tabla) - 1);

	echo '{"data":['.$tabla.']}';	

?>