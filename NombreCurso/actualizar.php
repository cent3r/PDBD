<?php
//require('functions.php');
if(isset($_POST['submit'])){
	require('clases/cliente.class.php');
	$objCliente=new Cliente;
	
	$nc_id = htmlspecialchars(trim($_POST['nc_id']));
	$Nombre = htmlspecialchars(trim($_POST['Nombre']));
	
	if ( $objCliente->actualizar(array($Nombre),$nc_id) == true){
		echo 'Datos actualizados';
	}else{
		echo 'Se produjo un error. Intente nuevamente';
	} 
}else{
	if(isset($_GET['Id'])){
		
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->mostrar_cliente($_GET['Id']);
		$nombrecurso = mysql_fetch_array($consulta);
	?>
	<form id="frmClienteActualizar" name="frmClienteActualizar" method="post" action="actualizar.php" onsubmit="ActualizarDatos(); return false">
    	<input type="hidden" name="nc_id" id="nc_id" value="<?php echo $nombrecurso['Id']?>" />
    	Modificar
    	<p>
	  <label>Nombre<br />
	  <input class="text" type="text" name="Nombre" id="Nombre" value="<?php echo $nombrecurso['Nombre']?>" />
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