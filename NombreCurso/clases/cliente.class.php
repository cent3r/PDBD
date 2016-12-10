<?php 
include_once("conexion.class.php");

class Cliente{
 //constructor	
 	var $con;
 	function Cliente(){
 		$this->con=new DBManager;
 	}

	function insertar($campos){
		if($this->con->conectar()==true){
			
			return mysql_query("INSERT INTO nombrecurso (Nombre,Estatus) VALUES ('".$campos[0]."','Activo')");
		}
	}
	
	function actualizar($campos,$Id){
		if($this->con->conectar()==true){
			return mysql_query("UPDATE nombrecurso SET Nombre = '".$campos[0]."' WHERE Id = ".$Id);
		}
	}
	
	function mostrar_cliente($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM nombrecurso WHERE Id=".$id);
		}
	}

	function mostrar_clientes(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM nombrecurso where Estatus='Activo' ORDER BY Id DESC");
		}
	}

	function eliminar($id){
		if($this->con->conectar()==true){
			return mysql_query("UPDATE nombrecurso SET Estatus = 'Baja' where Id=".$id);
		}
	}
}
?>