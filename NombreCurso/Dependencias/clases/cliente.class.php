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
			
			return mysql_query("INSERT INTO dependencias (Nomb) VALUES ('".$campos[0]."')");
		}
	}
	
	function actualizar($campos,$Id){
		if($this->con->conectar()==true){
			//print_r($campos);
			return mysql_query("UPDATE dependencias SET Nomb = '".$campos[0]."' WHERE id = ".$Id);
		}
	}
	
	function mostrar_cliente($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM dependencias WHERE id=".$id);
		}
	}

	function mostrar_clientes(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM dependencias where Estatus = 'Activo' ORDER BY id DESC");
		}
	}

	function eliminar($id){
		if($this->con->conectar()==true){
			return mysql_query("UPDATE dependencias SET Estatus = 'Baja' where id=".$id);
		}
	}
}
?>