<?php
require('clases/cliente.class.php');

$ar_id=$_GET['Id'];
$objCliente=new Cliente;
if( $objCliente->eliminar($ar_id) == true){
	echo "Registro eliminado correctamente";
}else{
	echo "Error";
}
?>