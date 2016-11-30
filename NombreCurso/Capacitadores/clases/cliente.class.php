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
			
			return mysql_query("INSERT INTO capacitadores (IDPersona, Curriculum) VALUES ('".$campos[0]."', '".$campos[1]."')");
		}
	}
	
	function actualizar($campos,$Id){
		if($this->con->conectar()==true){
			//print_r($campos);
			return mysql_query("UPDATE capacitadores SET IDPersona = '".$campos[0]."', Curriculum= '".$campos[1]."' WHERE Id = ".$Id);
		}
	}
	
	function mostrar_cliente($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM capacitadores WHERE Id=".$id);
		}
	}

	function mostrar_clientes(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM capacitadores where Estatus='Activo' ORDER BY Id DESC");
		}
	}

	function eliminar($id){
		if($this->con->conectar()==true){
			return mysql_query("UPDATE capacitadores SET Estatus = 'Baja' where Id=".$id);
		}
	}
}
?>