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
			
			return mysql_query("INSERT INTO dependencias (nombre) VALUES ('".$campos[0]."')");
		}
	}
	
	function actualizar($campos,$Id){
		if($this->con->conectar()==true){
			return mysql_query("UPDATE dependencias SET nombre = '".$campos[0]."' WHERE Id = ".$Id);
		}
	}
	
	function mostrar_cliente($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM dependencias WHERE Id=".$id);
		}
	}

	function mostrar_clientes(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM dependencias where Estatus='Activo' ORDER BY Id DESC");
		}
	}

	function eliminar($id){
		if($this->con->conectar()==true){
			return mysql_query("UPDATE dependencias SET Estatus = 'Baja' where Id=".$id);
		}
	}
}
?>