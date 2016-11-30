<?php

if(isset($_POST['submit'])){
	require('clases/cliente.class.php');
   
	$IDPersona = htmlspecialchars(trim($_POST['IDPersona']));
	$Curriculum = htmlspecialchars(trim($_POST['Curriculum']));
	
	$objCliente=new Cliente;
	if ( $objCliente->insertar(array($IDPersona,$Curriculum)) == true){
		echo 'Datos guardados';
	}else{
		echo 'Error';
	} 
}else{
?>
<form id="frmClienteNuevo" name="frmClienteNuevo" method="post" action="nuevo.php" onclick="GrabarDatos(); return false">
<p>
  <label>IDPersona<br />
  <input class="text" type="text" name="IDPersona" id="IDPersona" />
  </label>
  </p>
  <p>
    <label>Curriculum<br />
    <input class="text" type="text" name="Curriculum" id="Curriculum" />
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