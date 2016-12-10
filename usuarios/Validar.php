<?php
 $cookie_name = "log";
$usuario = $_POST['Correo'];
$pass = $_POST['Password'];
 
if(empty($usuario) || empty($pass)){
	?>
<script language="javascript">
window.alert("Ingrese usuario");
window.location='index.html';

</script>
<?php

exit();
}

    mysql_connect("localhost","root","");
	mysql_select_db("capacitacion");
 
$result = mysql_query("SELECT * from usuarios where Correo='" . $usuario . "'");
 
if($row = mysql_fetch_array($result)){
	$cookie_value = $nnombre;
	 setcookie($cookie_name, $cookie_value, time() + (180), "/");
if($row['password'] == $pass){
session_start();
$_SESSION['usuario'] = $usuario;
header("Location: menu.php");
}else{
header("Location: index.html");
exit();
}
}else{
header("Location: index.html");
exit();
}
?>

<?php

    mysql_connect("localhost","root","");
	mysql_select_db("capacitacion");

if(isset($_POST['logout'])){

$row['Password']="";
$_SESSION['usuario']="";
session_start();
session_destroy();
header("Location: menu.php");
}
?>
