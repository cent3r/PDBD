<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="shortcut icon" type="image/x-icon" href="file:///C|/xampp/htdocs/WHAD'D/IMAGENES/car.ico" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Menu</title>
<style type="text/css">
<!--
.Estilo1 {
	color: #000800;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 36px;
}
.Estilo3 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: high;
}
.Estilo4 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	color: #000000;
}
body {
	background-color: #000000;

}
.Estilo5 {color: #FFFFFF}
.Estilo6 {color: #000000}
a:link {
	color: #010101;
}
a:hover {
	color: #020202;
}
body,td,th {
	color: #FFFFFF;
	font-size: 24px;
}
-->
</style>
</head>
<?php 
$cookie_name = "log";
if (isset($_COOKIE[$cookie_name]))
{
	$cookie_value = $_COOKIE[$cookie_name];
	echo "sesion iniciada -->";
	echo '<a href="salir.php">salir</a>';
	
?>





<body>



	<?php
	include ('conex.php');
	$results= mysql_query("select Correo,Password,NivelUS from usuarios where Correo ='".$cookie_value."'");
	
	if($row = mysql_fetch_array($results)){
	if ($row['NivelUS'] == 2 ){
	?>

	  <label></label>
  
<tr>
  <td bordercolor="#000000"><div align="center" class="Estilo1">
    <h1 class="Estilo5"><strong>Administrador de cursos</strong></h1>
      </div></td>
</tr>
<tr>
  <td bordercolor="#000000"><div align="center">
        <label></label>
        <label>
          <input name="work5" class="btn btn-primary" type="submit" id="work5" value="Areas"  onclick="location='Areas/usuarios.php'"/>
     
          <input name="work3" class="btn btn-primary" type="submit" id="work3" value="Cursos"  onclick="location='NombreCurso/usuarios.php'"/>
          <input name="work22" class="btn btn-primary" type="submit" id="work22" value="Dependencia"  onclick="location='usuarios.php'"/>
          <input name="capa" class="btn btn-primary" type="submit" id="capa" value="Capacitadores" onclick="location='capacitadores/index.php'"/>
		     <input name="user" class="btn btn-primary" type="submit" id="user" value="usuarios" onclick="location='usuarios/actualizar.php'"/>
			
        </label>
        </label>
        <label>
          <input name="work" class="btn btn-info" type="submit" id="work" value="trabajadores"  onclick="location='contra.php'"/>
        </label>
      <input name="logout" class="btn btn-info" type="submit" id="logout" value="logout" onclick= "location='salir.php'"/>
  </div></td>
</tr>
  </table>


	 <?php
	 
	 }}
	 
	 ?>


	<?php
	include ('conex2.php');
	$r= mysql_query("select Correo,Password,NivelUS from usuarios where Correo ='".$cookie_value."'");
	
	if($ro = mysql_fetch_array($r)){
	if ($ro['NivelUS'] == 1 ){
	?>

		  <label></label>
  
<tr>
  <td bordercolor="#000000"><div align="center" class="Estilo1">
    <h1 class="Estilo5"><strong>Administradors</strong></h1>
      </div></td>
</tr>
<tr>
  <td bordercolor="#000000"><div align="center">
        <label></label>
        <label>
          <input name="work5" class="btn btn-primary" type="submit" id="work5" value="Areas"  onclick="location='Areas/usuarios.php'"/>

          <input name="work3" class="btn btn-primary" type="submit" id="work3" value="Cursos"  onclick="location='NombreCurso/usuarios.php'"/>
          <input name="work2" class="btn btn-primary" type="submit" id="work2" value="Dependencia"  onclick="location='usuarios.php'"/>
          <input name="user" class="btn btn-primary" type="submit" id="user" value="usuarios" onclick="location='usuarios/usuarios.php'"/>
		       <input name="capa" class="btn btn-primary" type="submit" id="capa" value="capa" onclick="location='capacitadores/index.php'"/>
        </label>
        <label>
          <input name="work" class="btn btn-info" type="submit" id="work" value="trabajadores"  onclick="location='contra.php'"/>
        </label>
      <input name="logout" class="btn btn-info" type="submit" id="logout" value="logout" onclick= "location='salir.php'"/>
  </div></td>
</tr>
  </table>



	 <?php
	 
	 }}
	 
	 ?>



	<?php
	include ('conex3.php');
	$r= mysql_query("select Correo,Password,NivelUS from usuarios where Correo ='".$cookie_value."'");
	
	if($ro = mysql_fetch_array($r)){
	if ($ro['NivelUS'] == 3 ){
	?>

		  <label></label>
  
<tr>
  <td bordercolor="#000000"><div align="center" class="Estilo1">
    <h1 class="Estilo5"><strong>Trabajador</strong></h1>
      </div></td>
</tr>
<tr>
  <td bordercolor="#000000"><div align="center">
        <label></label>
        <label>

          <input name="user" class="btn btn-primary" type="submit" id="user" value="Dependencia" onclick="location='usuarios.php'"/>
  <input name="user" class="btn btn-primary" type="submit" id="user" value="usuarios" onclick="location='usuarios/actualizar.php'"/>
			
        </label>
      <input name="logout" class="btn btn-info" type="submit" id="logout" value="logout" onclick= "location='salir.php'"/>
  </div></td>
</tr>
  </table>



	 <?php
	 
	 }}
	 
	 ?>








<form id="form1" name="form1" method="post" action="">
  <?php

    mysql_connect("localhost","root","");
	mysql_select_db("capacitacion");

if(isset($_POST['logout'])){

$row['password']="";
$_SESSION['usuario']="";
session_destroy();
setcookie("nnombre2","",time()-7200);
header("Location: index.html");
}
?>
</form>
<img src="privacidad.jpg" width="1600" height="641" />
</body>
</html>
<?php

}
else
{
	echo "<div align=\"center\">No has iniciado sesion!</div><br>"; 
	echo "<div align=\"center\"><a href='index.html'>Login</a></div>";
}

 ?>
