<?php

if(isset($_POST['submit'])){
	require('clases/cliente.class.php');
   include ('cnx.php');
	
	$Correo = htmlspecialchars(trim($_POST['Correo']));
	$Password = htmlspecialchars(trim($_POST['Password']));
	$NivelUS = htmlspecialchars(trim($_POST['NivelUS']));
	$Id__Persna = htmlspecialchars(trim($_POST['Id__Persna']));
	$TipoUS = htmlspecialchars(trim($_POST['TipoUS']));
	
	$objCliente=new Cliente;
	if ( $objCliente->insertar(array($Correo,$Password,$NivelUS,$Id__Persna,$TipoUS)) == true){
		echo 'Datos guardados';
	}else{
		echo 'Error';
	} 
}else{
?>
<style type="text/css">
<!--
.Estilo1 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>

<form id="frmClienteNuevo" name="frmClienteNuevo" method="post" action="nuevoAr.php" onclick=="GrabarDatos(); return false">
  <div align="center" class="Estilo1">Registrarse  </div>
  <p>
    <label>Correo<br />
    <input class="text" type="text" name="Correo" id="Correo" />
    </label>
  </p>
  <p>
    <label>Password<br />
    <input class="text" type="Password" name="Password" id="Password" />
    </label>
  </p>
  <p>
    <label>Nivel<br />
    </label>
    <label>
    <select name="NivelUS">
      <option value="Alto">Alto</option>
      <option value="Medio">Medio</option>
      <option value="Bajo">Bajo</option>
    </select>
    </label>
  </p>
  <p><label>Nombre<br />
    <select name="Id__Persna" id="Id__Persna">
      <?php
			include ('cnx.php');
			$sentencia = ("select * from personas where Estatus = 'Activo'");
			$query = mysql_query($sentencia);
			while($arreglo = mysql_fetch_array($query)){
			?>
      <option value="<?php echo $arreglo['Id']?>"> <?php echo $arreglo['Nombre']?> </option>
      <?php
			}
			?>
    </select>
  </label>
  </p>
  <p>
    <label>Tipo<br />
    <select name="TipoUS">
      <option value="Capacitador">Capacitador</option>
      <option value="Trabajador">Trabajador</option>
    </select>
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