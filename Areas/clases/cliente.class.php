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
			
			return mysql_query("INSERT INTO areas (IdDependencia,Nomb) VALUES ('".$campos[0]."', '".$campos[1]."')");
		}
	}
	
	function actualizar($campos,$Id){
		if($this->con->conectar()==true){
			//print_r($campos);
			return mysql_query("UPDATE areas SET IdDependencia = '".$campos[0]."',Nomb = '".$campos[1]."' WHERE Id = ".$Id);
		}
	}
	
	function mostrar_cliente($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM areas WHERE Id=".$id);
		}
	}

	function mostrar_clientes(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM areas where Estatus='Activo' ORDER BY Id DESC");
		}
	}

	function eliminar($id){
		if($this->con->conectar()==true){
			return mysql_query("UPDATE areas SET Estatus = 'Baja' where Id=".$id);
		}
	}
}
?>