<?php

if(isset($_POST['submit'])){
	require('clases/cliente.class.php');
   include ('cnx.php');
	$IdDependencia = htmlspecialchars(trim($_POST['IdDependencia']));
	$Nombre = htmlspecialchars(trim($_POST['Nombre']));
	
	$objCliente=new Cliente;
	if ( $objCliente->insertar(array($IdDependencia,$Nombre)) == true){
		echo 'Datos guardados';
	}else{
		echo 'Error';
	} 
}else{
?>
<form id="frmClienteNuevo" name="frmClienteNuevo" method="post" action="nuevoAr.php" onclick=="GrabarDatos(); return false">
  <p><label>Dependencia<br />
    <select name="IdDependencia" id="IdDependencia">
      <?php
			include ('cnx.php');
			$sentencia = ("select * from dependencias where Estatus = 'Activo'");
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
  <p>
    <label>Nombre<br />
    <input class="text" type="text" name="Nombre" id="Nombre" />
    </label>
  </p>
  <p>
    <input type="submit" name="submit" id="button" value="Enviar" />
    <label></label>
    <input type="button" class="cancelar" name="cancelar" id="cancelar" value="Cancelar" onclick="Cancelar()" />
  </p>
</form>
<?php
}
?>