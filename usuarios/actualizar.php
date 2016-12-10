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
	if ($row['NivelUS'] == 1 || $row['NivelUS'] == 2  || $row['NivelUS'] == 3  || $row['NivelUS'] == 4 ){
	?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Modificar</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <style>
  /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, 
pre, form, fieldset, input, textarea, p, blockquote, th, td { 
  padding:0;
  margin:0;}

fieldset, img {border:0}

ol, ul, li {list-style:none}

:focus {outline:none}

body,
input,
textarea,
select {
  font-family: 'Open Sans', sans-serif;
  font-size: 16px;
  color: #4c4c4c;
}

p {
  font-size: 12px;
  width: 150px;
  display: inline-block;
  margin-left: 18px;
}
h1 {
  font-size: 32px;
  font-weight: 300;
  color: #4c4c4c;
  text-align: center;
  padding-top: 10px;
  margin-bottom: 10px;
}

html{
  background-color: #ffffff;
}

.testbox {
  margin: 20px auto;
  width: 600px; 
  height: 500px; 
  -webkit-border-radius: 8px/7px; 
  -moz-border-radius: 8px/7px; 
  border-radius: 8px/7px; 
  background-color: #ebebeb; 
  -webkit-box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
  -moz-box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
  box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
  border: solid 1px #cbc9c9;
}

input[type=radio] {
  visibility: hidden;
}

form{
  margin: 0 30px;
}

label.radio {
	cursor: pointer;
  text-indent: 35px;
  overflow: visible;
  display: inline-block;
  position: relative;
  margin-bottom: 15px;
}

label.radio:before {
  background: #3a57af;
  content:'';
  position: absolute;
  top:10px;
  left: 0;
  width: 20px;
  height: 20px;
  border-radius: 100%;
}

label.radio:after {
	opacity: 0;
	content: '';
	position: absolute;
	width: 0.5em;
	height: 0.25em;
	background: transparent;
	top: 7.5px;
	left: 4.5px;
	border: 3px solid #ffffff;
	border-top: none;
	border-right: none;

	-webkit-transform: rotate(-45deg);
	-moz-transform: rotate(-45deg);
	-o-transform: rotate(-45deg);
	-ms-transform: rotate(-45deg);
	transform: rotate(-45deg);
}

input[type=radio]:checked + label:after {
	opacity: 1;
}

hr{
  color: #a9a9a9;
  opacity: 0.3;
}

input[type=text],input[type=password]{
  width: 200px; 
  height: 39px; 
  -webkit-border-radius: 0px 4px 4px 0px/5px 5px 4px 4px; 
  -moz-border-radius: 0px 4px 4px 0px/0px 0px 4px 4px; 
  border-radius: 0px 4px 4px 0px/5px 5px 4px 4px; 
  background-color: #fff; 
  -webkit-box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  -moz-box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  border: solid 1px #cbc9c9;
  margin-left: -5px;
  margin-top: 13px; 
  padding-left: 10px;
}

input[type=password]{
  margin-bottom: 25px;
}

#icon {
  display: inline-block;
  width: 30px;
  background-color: #3a57af;
  padding: 8px 0px 8px 15px;
  margin-left: 15px;
  -webkit-border-radius: 4px 0px 0px 4px; 
  -moz-border-radius: 4px 0px 0px 4px; 
  border-radius: 4px 0px 0px 4px;
  color: white;
  -webkit-box-shadow: 1px 2px 5px rgba(0,0,0,.09);
  -moz-box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  border: solid 0px #cbc9c9;
}

.gender {
  margin-left: 30px;
  margin-bottom: 30px;
}

.accounttype{
  margin-left: 8px;
  margin-top: 20px;
}

a.button {
  font-size: 14px;
  font-weight: 600;
  color: white;
  padding: 6px 25px 0px 20px;
  margin: 10px 8px 20px 0px;
  display: inline-block;
  float: right;
  text-decoration: none;
  width: 50px; height: 27px; 
  -webkit-border-radius: 5px; 
  -moz-border-radius: 5px; 
  border-radius: 5px; 
  background-color: #3a57af; 
  -webkit-box-shadow: 0 3px rgba(58,87,175,.75); 
  -moz-box-shadow: 0 3px rgba(58,87,175,.75); 
  box-shadow: 0 3px rgba(58,87,175,.75);
  transition: all 0.1s linear 0s; 
  top: 0px;
  position: relative;
}

a.button:hover {
  top: 3px;
  background-color:#2e458b;
  -webkit-box-shadow: none; 
  -moz-box-shadow: none; 
  box-shadow: none;
  
}

    </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<?php
//require('functions.php');
if(isset($_POST['submit'])){
	require('clases/cliente.class.php');
	$objCliente=new Cliente;
	
	$us_id = htmlspecialchars(trim($_POST['us_id']));
	$Correo = htmlspecialchars(trim($_POST['Correo']));
	$Password = htmlspecialchars(trim($_POST['Password']));
	$NivelUS = htmlspecialchars(trim($_POST['NivelUS']));
	$Id__Persna = htmlspecialchars(trim($_POST['Id__Persna']));
	$TipoUS = htmlspecialchars(trim($_POST['TipoUS']));
	
	
	if ( $objCliente->actualizar(array($Correo,$Password,$NivelUS,$Id__Persna,$TipoUS),$us_id) == true){
		
		?>
		<script language="javaScript">
		var respuesta=confirm("La area fue actualizada, Desea regresar al menu inicial") 
		if (respuesta==true)
		 window.location='usuarios.php';
		else
		window.location='actualizar.php'; </script>
		
		<?php
	}else{
		echo 'Se produjo un error. Intente nuevamente';
	} 
}else{
	if(isset($_GET['ID'])){
		
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->mostrar_cliente($_GET['ID']);
		$usuarios = mysql_fetch_array($consulta);
	?>

<body>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

<div class="testbox">
<h1 align="center">Actualizar</h1>

  
<form id="frmClienteActualizar" name="frmClienteActualizar" method="post" action="actualizar.php" onSubmit="ActualizarDatos(); return false">
   	
    
  <div align="center">
    <input type="hidden" name="us_id" id="us_id" value="<?php echo $usuarios['ID']?>" />
  </div>
    <p align="center">
    <hr>
  <label id="icon" for="name"><i class="icon-envelope "></i></label></label>
  <label>Correo 
	   <input class="text" type="text" name="Correo" id="Correo" value="<?php echo $usuarios['Correo']?>" />
  </label>
  </p>
  <hr>
  <label id="icon" for="name"><i class="icon-user"></i></label>
  <label>Password 
  <input class="text" type="text" name="Password" id="Password" value="<?php echo $usuarios['Password']?>" />
  </label>
  </p>
  <hr>
  <label id="icon" for="name"><i class="icon-user"></i></label>
  <label> Nivel
  <input class="text" type="text" name="NivelUS" id="NivelUS" value="<?php echo $usuarios['NivelUS']?>" />
  </label>
  </p>
  <hr>
  <label id="icon" for="name"><i class="icon-user"></i></label><label> Nombre
   <select name="Id__Persna" id="Id__Persna">
	
			<?php
			include ('conex.php');
			$sentencia = ("select * from personas WHERE Estatus='Activo'");
			$query = mysql_query($sentencia);
			while($arreglo = mysql_fetch_array($query)){
			?>
			<option <?php if ($arreglo['Id']== $usuarios['Id__Persna']){ echo "selected"; }?> value= "<?php echo $arreglo['Id']?>"><?php echo $arreglo['Nombre']?>
			<?php
			}
			?>	
			</select>
    </label>
  </p>
  <hr>
  <label id="icon" for="name"><i class="icon-user"></i></label>
  <label>Tipo 
  <select name="TipoUS" id="TipoUS">
			<option <?php if ('Trabajador'==$usuarios['TipoUS']){ echo "selected"; }?> >Trabajador
			<option <?php if ('Capacitador'==$usuarios['TipoUS']){ echo "selected"; }?> >Capacitador
			</select>
  </label>
  </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="left">
	<input type="submit" name="submit" id="button" value="Enviar" />
	<label></label>
	<input type="button" name="cancelar" id="cancelar" value="Cancelar" onClick="window.location='usuarios.php'" />
  </p>
</form>
	<?php
	}
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

