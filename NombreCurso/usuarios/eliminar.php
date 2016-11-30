<?php
require('clases/cliente.class.php');

$us_id=$_GET['ID'];
$objCliente=new Cliente;
if( $objCliente->eliminar($us_id) == true){
	echo "Registro eliminado correctamente";
}else{
	echo "Error";
}
?>