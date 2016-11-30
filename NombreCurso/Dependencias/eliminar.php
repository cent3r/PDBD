<?php
require('clases/cliente.class.php');

$dep_id=$_GET['id'];
$objCliente=new Cliente;
if( $objCliente->eliminar($dep_id) == true){
	echo "Registro eliminado correctamente";
}else{
	echo "Ocurrio un error";
}
?>