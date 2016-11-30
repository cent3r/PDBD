<?php

if(isset($_POST['submit'])){
	require('clases/cliente.class.php');
	$objCliente=new Cliente;
	
	$us_id = htmlspecialchars(trim($_POST['us_id']));
	$Correo = htmlspecialchars(trim($_POST['Correo']));
	$Password = htmlspecialchars(trim($_POST['Password']));
	$NivelUS = htmlspecialchars(trim($_POST['NivelUS']));
	$Id__Persna = htmlspecialchars(trim($_POST['Id__Persna']));
	$TipoUS = htmlspecialchars(trim($_POST['TipoUS']));
	
	
	if ( $objCliente->actualizar(array($Correo,$Password,$NivelUS,$Id__Persna,$TipoUS),$us_id) == true){
		echo 'Datos actualizados';
	}else{
		echo 'Se produjo un error. Intente nuevamente';
	} 
}else{
	if(isset($_GET['ID'])){
		
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->mostrar_cliente($_GET['ID']);
		$usuarios = mysql_fetch_array($consulta);
	?>
	<form id="frmClienteActualizar" name="frmClienteActualizar" method="post" action="actualizarAr.php" onsubmit="ActualizarDatos(); return false">
    	<input type="hidden" name="us_id" id="us_id" value="<?php echo $usuarios['ID']?>" />
        <p>
	  <label>Correo<br />
	  <input class="int" type="int" name="Correo" id="Correo" value="<?php echo $usuarios['Correo']?>" />
	  </label>
      </p>
	  <p>
		<label>Password<br />
		<input class="text" type="Password" name="Password" id="Password" value="<?php echo $usuarios['Password']?>" />
		</label>
	  </p>
	  <p>
		<label>Nivel<br />
		<input class="text" type="text" name="NivelUS" id="NivelUS" value="<?php echo $usuarios['NivelUS']?>" />
		</label>
	  </p>
	  <p>
		<label>Nombre<br />
		<input class="text" type="text" name="Id__Persna" id="Id__Persna" value="<?php echo $usuarios['Id__Persna']?>" />
		</label>
	  </p>
	  <p>
		<label>Tipo<br />
		<input class="text" type="text" name="TipoUS" id="TipoUS" value="<?php echo $usuarios['TipoUS']?>" />
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