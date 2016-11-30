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
<style type="text/css">
<!--
.Estilo2 {color: #FFFFFF}
-->
</style>

<p align="center">Usuarios </p>
<span id="nuevo"><a href="nuevoAr.php"class="glyphicon glyphicon-plus-sign"></a></span>
	<table>
   		<tr bordercolor="#000000" bgcolor="#000000">
   			<th><span class="Estilo2">Correo</span></th>
    		<th><span class="Estilo2">Password</span></th>
			<th><span class="Estilo2">Nivel</span></th>
    		<th><span class="Estilo2">Nombre</span></th>
			<th><span class="Estilo2">Tipo</span></th>
            <th></th>
            <th></th>
        </tr>
<?php
if($consulta) {
	while( $usuarios = mysql_fetch_array($consulta) ){
	?>
	
	
		  <tr id="fila-<?php echo $usuarios['ID'] ?>">
			  <td><?php echo $usuarios['Correo'] ?></td>
			  <td><?php echo $usuarios['Password'] ?></td>
			  <td><?php echo $usuarios['NivelUS'] ?></td>
			  <td><?php echo $usuarios['Id']?> <?php echo $usuarios['Nombre']?></td>
			  <td><?php echo $usuarios['TipoUS'] ?></td>
			  
			  <td><a href="actualizarAr.php?ID=<?php echo $usuarios['ID'] ?>" class="glyphicon glyphicon-edit"></a></td>
			  <td><span class="dele"><a onClick="EliminarDato(<?php echo $usuarios['ID'] ?>); return false" href="eliminar.php?ID=<?php echo $usuarios['ID'] ?>"class="glyphicon glyphicon-trash"></a></span></td>
		  </tr>
	<?php
	}
}
?>
    </table>
