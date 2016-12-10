<?php 
$cookie_name = "log";
if (isset($_COOKIE[$cookie_name]))
{
	$cookie_value = $_COOKIE[$cookie_name];
	echo "Bienvenido $cookie_value!";
	echo '<a href="salir.php">Logout</a>';
?>

	<?php
	include ('conex.php');
	$results= mysql_query("select Correo,Password,NivelUS from usuarios where Correo ='".$cookie_value."'");
	
	if($row = mysql_fetch_array($results)){
	if ($row['NivelUS'] == 1 ){
	?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Agregar</title>
  
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
  height: 700px; 
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
  <body>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<div class="testbox">
<h1 align="center">Modificar datos personales</h1>	
	<form id="frmClienteActualizar" name="frmClienteActualizar" method="post" action="actualizar2.php" onSubmit="ActualizarDatos(); return false">
	<p align="center">
 	 <hr>
    	<input type="hidden" name="cap_id" id="cap_id" value="<?php echo $_GET['Id']?>" />
	<hr>
    	<input type="hidden" name="per_id" id="per_id" value="<?php echo $_GET['IDPersona']?>" />
	  
  <label> Nombre</label><label id="icon" for="name"><i class="icon-user"></i></label>
	  <input class="text" type="text" name="Nombre" id="Nombre" value="<?php echo $_GET['Nombre']?>" />
  <hr>
   <label> CURP</label><label id="icon" for="name"><i class="glyphicon glyphicon-info-sign"></i></label>
		<input class="text" type="text" name="CURP" id="CURP" value="<?php echo $_GET['CURP']?>" />
  </p>
  <hr>
  <label> Fecha de nacimiento</label><label id="icon" for="name"><i class="glyphicon glyphicon-calendar"></i></label>
		<input class="text" type="text" name="FechaNac" id="FechaNac" value="<?php echo $_GET['FechaNac']?>" />
  </p>
  <hr>
  <label> RFC</label><label id="icon" for="name"><i class="glyphicon glyphicon-info-sign"></i></label>
		<input class="text" type="text" name="RFC" id="RFC" value="<?php echo $_GET['RFC']?>" />
  </p>
  <hr>
  <label> Genero</label><label id="icon" for="name"><i class="icon-user"></i></label>
		<select name="Sexo" id="Sexo">
			<option <?php if ('Masculino'==$_GET['Sexo']){ echo "selected"; }?> >Masculino
			<option <?php if ('Femenino'==$_GET['Sexo']){ echo "selected"; }?> >Femenino
			</select>
  </p>
   <hr>
 <label> Tipo de telefono</label><label id="icon" for="name"><i class="icon-user"></i></label>
   <select name="TipoTelefono" id="TipoTelefono">
			<option <?php if ('Movil'==$_GET['TipoTelefono']){ echo "selected"; }?> >Movil
			<option <?php if ('Fijo'==$_GET['TipoTelefono']){ echo "selected"; }?> >Fijo
			</select>
  </p>
    <hr>
 <label> Numero</label><label id="icon" for="name"><i class="icon-user"></i></label>
  <input class="text" type="text" name="Numero" id="Numero" value="<?php echo $_GET['Numero']?>"/>
  </p>
    <label> Curriculum</label><br><label id="icon" for="name"><i class="glyphicon glyphicon-folder-open"></i></label>
		<input class="text" type="text" name="Curriculum" id="Curriculum" value="<?php echo $_GET['Curriculum']?>" />
  </p>
   <hr>
  <label> Empresa</label><br><label id="icon" for="name"><i class="glyphicon glyphicon-info-sign"></i></label>
		<input class="text" type="text" name="Empresa" id="Empresa" value="<?php echo $_GET['Empresa']?>" />
	  </p>
	   <hr>

  <p>
		<input type="submit" name="submit" id="button" value="Enviar" />
		<label></label>
		<input type="button" name="cancelar" id="cancelar" value="Cancelar" onClick="window.location='index.php'" />
	  </p>
	</form>

	 <?php
	if(isset($_POST['submit']))
	{
	 	$con=@mysqli_connect('localhost', 'root', '', 'capacitacion');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }

    $cap_id = htmlspecialchars(trim($_POST['cap_id']));
	$per_id = htmlspecialchars(trim($_POST['per_id']));
	$Nombre = htmlspecialchars(trim($_POST['Nombre']));
	$CURP = htmlspecialchars(trim($_POST['CURP']));
	$FechaNac = htmlspecialchars(trim($_POST['FechaNac']));
	$RFC = htmlspecialchars(trim($_POST['RFC']));
	$Sexo = htmlspecialchars(trim($_POST['Sexo']));
	$Curriculum = htmlspecialchars(trim($_POST['Curriculum']));
	$Empresa = htmlspecialchars(trim($_POST['Empresa']));
	$TipoTelefono = htmlspecialchars(trim($_POST['TipoTelefono']));
	$Numero = htmlspecialchars(trim($_POST['Numero']));


	$sql1="UPDATE personas SET Nombre = '".$Nombre."', CURP = '".$CURP."', FechaNac = '".$FechaNac."', RFC = '".$RFC."', Sexo = '".$Sexo."' WHERE Id=".$per_id;	
	$sql2="UPDATE capacitadores SET Curriculum = '".$Curriculum."', Empresa = '".$Empresa."' WHERE Id = ".$cap_id;
	$sql3="UPDATE telefonos SET TipoTelefono = '".$TipoTelefono."', Numero = '".$Numero."' WHERE id_TipoPersona = ".$per_id;
			

		$query_update = mysqli_query($con,$sql1);			
		$query_update = mysqli_query($con,$sql2);
		$query_update = mysqli_query($con,$sql3);			
		
	if ( $query_update){
		?>
		<script language="javaScript">
		 window.location='index.php';
		 </script>
		
		<?php
	}else{
		echo 'Error';
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