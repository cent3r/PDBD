<?php
require('clases/cliente.class.php');
$objCliente=new Cliente;
$consulta=$objCliente->mostrar_clientes();
?>
<script type="text/javascript">
$(document).ready(function(){
	// mostrar formulario de actualizar datos
	$("table tr .modi a").click(function(){
		$('#tabla').hide();
		$("#formulario").show();
		$.ajax({
			url: this.href,
			type: "GET",
			success: function(datos){
			$("#formulario").html(datos);
			}
		});
		return false;
	});
	
	// llamar a formulario nuevo
	$("#nuevo a").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$.ajax({
			type: "GET",
			url: 'nuevo.php',
			success: function(datos){
				$("#formulario").html(datos);
			}
		});
		return false;
	});
});

</script>
<p align="center">Dependencias </p>
<p align="center"><span><a href="nuevo.php" class="glyphicon glyphicon-plus-sign"></a></span></p>
<div align="center">
  <table>
    <tr>
      <th>Id</th>
	    <th>Nombre</th>
        <th></th>
        <th></th>
          </tr>
  <?php
if($consulta) {
	while( $dependencias = mysql_fetch_array($consulta) ){
	?>
    
    <tr id="fila-<?php echo $dependencias['id'] ?>">
      <td><?php echo $dependencias['id'] ?></td>
	    <td><?php echo $dependencias['Nomb'] ?></td>
	    <td><a href="actualizar.php?id=<?php echo $dependencias['id'] ?>" class="glyphicon glyphicon-edit"></a></td>
			  <td><span class="dele"><a onClick="EliminarDato(<?php echo $dependencias['id'] ?>); return false" href="eliminar.php?id=<?php echo $dependencias['id'] ?>"class="glyphicon glyphicon-trash"></a></span></td>
		  </tr>
    <?php
	}
}
?>
  </table>
</div>
