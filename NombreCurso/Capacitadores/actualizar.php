<?php
//require('functions.php');
if(isset($_POST['submit'])){
	require('clases/cliente.class.php');
	$objCliente=new Cliente;
	
	$ar_id = htmlspecialchars(trim($_POST['ar_id']));
	$IdDependencia = htmlspecialchars(trim($_POST['IDPersona']));
	$Nombre = htmlspecialchars(trim($_POST['Curriculum']));
	
	
	if ( $objCliente->actualizar(array($IdDependencia,$Nombre),$ar_id) == true){
		echo 'Datos actualizados';
	}else{
		echo 'Se produjo un error. Intente nuevamente';
	} 
}else{
	if(isset($_GET['Id'])){
		
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->mostrar_cliente($_GET['Id']);
		$areas = mysql_fetch_array($consulta);
	?>
	<form id="frmClienteActualizar" name="frmClienteActualizar" method="post" action="actualizar.php" onsubmit="ActualizarDatos(); return false">
    	<input type="hidden" name="ar_id" id="ar_id" value="<?php echo $areas['Id']?>" />
        <p>
	  <label>IDPersona<br />
	  <input class="text" type="text" name="IDPersona" id="IDPersona" value="<?php echo $areas['IDPersona']?>" />
	  </label>
      </p>
	  <p>
		<label>Curriculum<br />
		<input class="text" type="text" name="Curriculum" id="Curriculum" value="<?php echo $areas['Curriculum']?>" />
		</label>
	  </p>
	  
	  <p>
		<input type="submit" name="submit" id="button" value="Enviar" />
		<label></label>
		<input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="Cancelar()" />
	  </p>
	</form>
	<?php
	}
}
?>