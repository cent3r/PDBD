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
<span id="nuevo"><a href="nuevo.php"><img src="img/add.png" alt="Agregar dato" /></a></span>
	<table>
   		<tr>
   			<th>Nombre</th>
    		<th>CURP</th>
            <th>Fecha</th>
            <th>RFC</th>
            <th>Genero</th>
            <th>Curriculum</th>
            <th>Empresa</th>
			<th>Acciones</th>
        </tr>
<?php
if($consulta) {
	while( $capacitadores = mysql_fetch_array($consulta) ){
	?>
	
		  <tr id="fila-<?php echo $capacitadores['Id'] ?>">
		   <td><?php echo $capacitadores['Nombre'] ?></td>
		    <td><?php echo $capacitadores['CURP'] ?></td>
			 <td><?php echo $capacitadores['FechaNac'] ?></td>
			  <td><?php echo $capacitadores['RFC'] ?></td>
			   <td><?php echo $capacitadores['Sexo'] ?></td>
			   <td><?php echo $capacitadores['Curriculum'] ?></td>
			    <td><?php echo $capacitadores['Empresa'] ?></td>
              
			  <td><a href="actualizar.php?Id=<?php echo $capacitadores['Id'] ?>" class="glyphicon glyphicon-pencil"></a></td>
			  <td><span class="dele"><a onClick="EliminarDato(<?php echo $capacitadores['Id'] ?>); return false" href="eliminar.php?Id=<?php echo $capacitadores['Id'] ?>"class="glyphicon glyphicon-minus"></a></span></td>
		  </tr>
	<?php
	}
}
?>
    </table>