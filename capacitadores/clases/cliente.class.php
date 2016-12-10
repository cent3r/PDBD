<?php 
include_once("conexion.class.php");

class Cliente{
 //constructor	
 	var $con;
 	function Cliente(){
 		$this->con=new DBManager;
 	}

	
	function actualizar($campos,$Id){
		if($this->con->conectar()==true){
			//print_r($campos);
			return mysql_query("UPDATE capacitadores SET Curriculum = '".$campos[0]."', Empresa = '".$campos[1]."' WHERE Id = ".$Id);
		}
	}
	
	function mostrar_cliente($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT capacitadores.Id,Nombre,CURP,FechaNac,RFC,Sexo,Curriculum,Empresa FROM capacitadores LEFT JOIN personas ON capacitadores.IDPersona=personas.Id WHERE Id=".$id);
		}
	}

	function mostrar_clientes(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT capacitadores.Id,Nombre,CURP,FechaNac,RFC,Sexo,Curriculum,Empresa FROM capacitadores LEFT JOIN personas ON capacitadores.IDPersona=personas.Id where capacitadores.Estatus='Activo' ORDER BY capacitadores.Id DESC");
		}
	}

	function eliminar($id){
		if($this->con->conectar()==true){
			return mysql_query("UPDATE capacitadores SET Estatus = 'Baja' where Id=".$id);
		}
	}
}
?>