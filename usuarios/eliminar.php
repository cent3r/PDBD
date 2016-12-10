<?php 

$cookie_name = "log";
if (isset($_COOKIE[$cookie_name]))
{
	$cookie_value = $_COOKIE[$cookie_name];
	echo "Bienvenido $cookie_value!";
	echo '<a href="salir.php">Logout</a>';
?>





	<?php
	include ('conex2.php');
	$results= mysql_query("select Correo,Password,NivelUS from usuarios where Correo ='".$cookie_value."'");
	
	if($row = mysql_fetch_array($results)){
	if ($row['NivelUS'] == 1 ){
	?>


<?php
require('clases/cliente.class.php');

$us_id=$_GET['ID'];
$objCliente=new Cliente;
if( $objCliente->eliminar($us_id) == true){
	?>
		<script language="javaScript">
		var respuesta="Registro eliminado correctamente, Desea regresar al menu inicial"
		 window.location='usuarios.php';
		 </script>
		
		<?php
}else{
	echo "Error";
}
?>



<?php
	 
	 }}
	 ?>




<?php
 }else {
		echo "<div align=\"center\">Iniciar sesion!</div><br>"; 
	echo "<div align=\"center\"><a href='index.html'>Login</a></div>";
	}
?>

