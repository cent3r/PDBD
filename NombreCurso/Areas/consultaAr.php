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
			url: 'nuevoAr.php',
			success: function(datos){
				$("#formulario").html(datos);
			}
		});
		return false;
	});
});

</script>
<p align="center">Areas </p>
<span id="nuevo"><a href="nuevoAr.php"class="glyphicon glyphicon-plus-sign"></a></span>
	<table>
   		<tr bordercolor="#0000CC" bgcolor="#0000FF">
   			<th>Dependencia</th>
    		<th>Nombre</th>
            <th></th>
            <th></th>
      </tr>
<?php
if($consulta) {
	while( $areas = mysql_fetch_array($consulta) ){
	?>
	
	
		  <tr id="fila-<?php echo $areas['Id'] ?>">
			  <td><?php echo $areas['id']?> <?php echo $areas['Nomb']?></td>
			  <td><?php echo $areas['Nombre'] ?></td>
			  
			  <td><a href="actualizarAr.php?Id=<?php echo $areas['Id'] ?>" class="glyphicon glyphicon-edit"></a></td>
			  <td><span class="dele"><a onClick="EliminarDato(<?php echo $areas['Id'] ?>); return false" href="eliminar.php?Id=<?php echo $areas['Id'] ?>"class="glyphicon glyphicon-trash"></a></span></td>
		  </tr>
	<?php
	}
}
?>
</table>