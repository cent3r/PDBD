<?php
//require('functions.php');
if(isset($_POST['submit'])){
	require('clases/cliente.class.php');
	$objCliente=new Cliente;
	
	$dep_id = htmlspecialchars(trim($_POST['dep_id']));
	$Nomb = htmlspecialchars(trim($_POST['Nomb']));
	
	if ( $objCliente->actualizar(array($Nomb),$dep_id) == true){
		echo 'Datos actualizados';
	}else{
		echo 'Se produjo un error. Intente nuevamente';
	} 
}else{
	if(isset($_GET['id'])){
		
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->mostrar_cliente($_GET['id']);
		$dependencias = mysql_fetch_array($consulta);
	?>
	<form id="frmClienteActualizar" name="frmClienteActualizar" method="post" action="actualizar.php" onsubmit="ActualizarDatos(); return false">
    	<input type="hidden" name="dep_id" id="dep_id" value="<?php echo $dependencias['id']?>" />
    	Modificar
    	<p>
	  <label>Nombre<br />
	  <input class="text" type="text" name="Nomb" id="Nomb" value="<?php echo $dependencias['Nomb']?>" />
	  </label>
      </p>
	  
		<input type="submit" name="submit" id="button" value="Enviar" />
		<label></label>
		<input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="Cancelar()" />
	  </p>
	</form>
	<?php
	}
}
?>