<?php
require('clases/cliente.class.php');

$nc_id=$_GET['Id'];
$objCliente=new Cliente;
if( $objCliente->eliminar($nc_id) == true){
	echo "Registro eliminado correctamente";
}else{
	echo "Ocurrio un error";
}
?>