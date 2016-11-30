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
<span id="nuevo"><a href="nuev.php" class="glyphicon glyphicon-plus-sign"></a></span>
	<table width="221">
   		<tr>
   			<th>IDPersona</th>
    		<th>Curriculum</th>
            <th></th>
            <th></th>
        </tr>
<?php
if($consulta) {
	while( $areas = mysql_fetch_array($consulta) ){
	?>
	
		  <tr id="fila-<?php echo $areas['Id'] ?>">
			  <td><?php echo $areas['IDPersona'] ?></td>
			  <td><?php echo $areas['Curriculum'] ?></td>
			  
			  <td><a href="actualizar.php?Id=<?php echo $areas['Id'] ?>" class="glyphicon glyphicon-pencil"></a></td>
			  <td><span class="dele"><a onClick="EliminarDato(<?php echo $areas['Id'] ?>); return false" href="eliminar.php?Id=<?php echo $areas['Id'] ?>"class="glyphicon glyphicon-minus"></a></span></td>
		  </tr>
	<?php
	}
}
?>
    </table>