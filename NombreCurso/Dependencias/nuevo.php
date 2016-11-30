<?php
//require('functions.php');
if(isset($_POST['submit'])){
	require('clases/cliente.class.php');

	$Nomb = htmlspecialchars(trim($_POST['Nomb']));
	$objCliente=new Cliente;
	if ( $objCliente->insertar(array($Nomb)) == true){
		echo 'Datos guardados';
	}else{
		echo 'Se produjo un error. Intente nuevamente';
	} 
}else{
?>
<p align="center">Agregar</p>
<form id="frmClienteNuevo" name="frmClienteNuevo" method="post" action="nuevo.php" onsubmit="GrabarDatos(); return false">
  <p><label>Nombre<br />
  <input class="text" type="text" name="Nomb" id="Nomb" />
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