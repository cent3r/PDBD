<?php
//require('functions.php');
if(isset($_POST['submit'])){
	require('clases/cliente.class.php');
	$objCliente=new Cliente;
	
	$ar_id = htmlspecialchars(trim($_POST['ar_id']));
	$IdDependencia = htmlspecialchars(trim($_POST['IdDependencia']));
	$Nombre = htmlspecialchars(trim($_POST['Nombre']));
	
	
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
	<form id="frmClienteActualizar" name="frmClienteActualizar" method="post" action="actualizarAr.php" onsubmit="ActualizarDatos(); return false">
    	<input type="hidden" name="ar_id" id="ar_id" value="<?php echo $areas['Id']?>" />
        <p><label>Dependencia<br />
    <select name="IdDependencia" id="IdDependencia">
      <?php
			include ('cnx.php');
			$sentencia = ("SELECT * FROM areas LEFT JOIN dependencias on (areas.IdDependencia=dependencias.Id) where areas.Estatus='Activo'");
			$query = mysql_query($sentencia);
			while($arreglo = mysql_fetch_array($query)){
			?>
      <option value="<?php echo $arreglo['Id']?>"> <?php echo $arreglo['Nomb']?> </option>
      <?php
			}
			?>
    </select>
  </label>
  </p>
		<label>Nombre<br />
		<input class="text" type="text" name="Nombre" id="Nombre" value="<?php echo $areas['Nombre']?>" />
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