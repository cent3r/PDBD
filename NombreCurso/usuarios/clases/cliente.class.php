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
			
			return mysql_query("INSERT INTO usuarios (Correo, Password, NivelUS, Id__Persna, TipoUS) VALUES ('".$campos[0]."', '".$campos[1]."', '".$campos[2]."', '".$campos[3]."', '".$campos[4]."')");
		}
	}
	
	function actualizar($campos,$Id){
		if($this->con->conectar()==true){
			
			return mysql_query("UPDATE usuarios SET Correo = '".$campos[0]."', Password = '".$campos[1]."', NivelUS = '".$campos[2]."', Id__Persna = '".$campos[3]."', TipoUS = '".$campos[4]."' WHERE ID = ".$Id);
		}
	}
	
	function mostrar_cliente($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM usuarios WHERE ID=".$id);
		}
	}

	function mostrar_clientes(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM usuarios LEFT JOIN personas on (usuarios.Id__Persna=personas.Id) where usuarios.Estatus='Activo'");
		}
	}

	function eliminar($id){
		if($this->con->conectar()==true){
			return mysql_query("UPDATE usuarios SET Estatus = 'Baja' where ID=".$id);
		}
	}
}
?>