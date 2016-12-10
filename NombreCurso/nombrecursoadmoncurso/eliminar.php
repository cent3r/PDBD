<?php
require('clases/cliente.class.php');

$nc_id=$_GET['Id'];
$objCliente=new Cliente;
if( $objCliente->eliminar($nc_id) == true){
?>
		<script language="javaScript">
		var respuesta="Registro eliminado correctamente, Desea regresar al menu inicial"
		 window.location='usuarios.php';
		 </script>
		
		<?php

}else{
	echo "Error";
}
?>