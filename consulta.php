<?php
require('clases/cliente.class.php');
$objCliente=new Cliente;
$consulta=$objCliente->mostrar_clientes();
?>
<script type="text/javascript">
$(document).ready(function(){
	// mostrar formulario de actualizar datos
	$("table tr .modi a").click(function(){
		$('#tabla').DataTable();
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
		$("#tabla").DataTable();
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
<span id="nuevo"><a href="nuevo.php"><img src="img/add.png" alt="Agregar dato" /></a></span>
	<table>
   		<tr>
    		<th>Nombre</th>
            <th></th>
        </tr>
<?php
if($consulta) {
	while( $nc = mysql_fetch_array($consulta) ){
	?>
	
		  <tr id="fila-<?php echo $nc['Id'] ?>">
			  <td><?php echo $nc['nombre'] ?></td>
			
			  
			  <td><a href="actualizar.php?Id=<?php echo $nc['Id'] ?>" class="glyphicon glyphicon-pencil"></a></td>
			  <td><span class="dele"><a onClick="EliminarDato(<?php echo $nc['Id'] ?>); return false" href="eliminar.php?Id=<?php echo $nc['Id'] ?>"class="glyphicon glyphicon-minus"></a></span></td>
		  </tr>
	<?php
	}
}
?>
    </table>