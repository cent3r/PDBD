<?php 
$cookieactual = "log";

$servidor = "localhost";
$perfil = "root";
$password = "";
$database = "capacitacion";

$conex = mysqli_connect($servidor,$perfil,$password, $database);

if (!$conex) {
	die("conexion fallida: ".mysqli_connect_error());
}

if (isset($_POST['ingresar']))
{
	$user = $_POST['CorreoI'];
	$pass = $_POST['PassI'];

	$accesso = sha1(sha1($pass."salt")."salt");

	$sql = "SELECT * FROM usuarios WHERE Correo='$user' AND Password='$pass';";

	$result = mysqli_query($conex, $sql);
	$count = mysqli_num_rows($result);

	if ($count == 1)
	{
		$cookie_value = $user;
		setcookie($cookieactual, $cookie_value, time() + (120), "/");
		header("Location: index.php");
	}
	else
	{
		echo "informacion incorrecta!";
		echo '<a href="index.html">regesar al index</a>';
	}
}
else if (isset($_POST['register']))
{

}
?>