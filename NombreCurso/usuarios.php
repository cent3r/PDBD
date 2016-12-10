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
	if ($row['NivelUS'] == 1 || $row['NivelUS'] == 2){
	?>








<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nombres de cursos</title>
    <!--CSS-->    
    <link rel="stylesheet" href="media/css/bootstrap.css">
    <link rel="stylesheet" href="media/css/dataTables.bootstrap.min.css">
	
	
	
		
	 <link rel="stylesheet" href="media/font-awesome/css/font-awesome.css">
	
	
	
   
    <!--Javascript-->    
    <script src="media/js/jquery-1.10.2.js"></script>
    <script src="media/js/jquery.dataTables.min.js"></script>
    <script src="media/js/dataTables.bootstrap.min.js"></script>          
    <script src="media/js/bootstrap.js"></script>
    <script src="media/js/lenguajeusuario.js"></script>     
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
    });
    </script>   
</head>

<body>
<div class="col-md-8 col-md-offset-2">
    <h1>Nombres de cursos
	
</p></head>
	
		 <a href="nuevo.php" class="btn btn-primary pull-right menu"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Nuevo usuario</a>
        
    </h1>  
</div>
<div class="col-md-8 col-md-offset-2">    
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
        <tr>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        </tfoot>
    </table>        
</div>
</body>
</html>


	 <?php
	 
	 }}
	 ?>

<?php
 }else {
		echo "<div align=\"center\">Iniciar sesion!</div><br>"; 
	echo "<div align=\"center\"><a href='index.html'>Login</a></div>";
	}
?>