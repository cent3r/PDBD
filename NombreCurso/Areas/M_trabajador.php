<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Control de Servicios a empresas</title>

</head>
<body>

   
	        
       <form action="" method="post">
          <p>&nbsp;</p>
          <table width="572" border="0" align="center">
            <tr>
              <td width="478"><span class="Estilo15">Buscar capacitador a Modificar:</span>
                <select name="id" id="id">
                  <?php
		  include ('cnx.php');
$result = mysql_query("SELECT * from capacitadores left join personas on (capacitadores.IDPersona=personas.Id)"); 
while($fila=mysql_fetch_array($result)){
    echo "<option value='".$fila['Id']."'>".$fila['CURP']."</option>";
}

?>
                </select>
              
              <td width="58"><input type="button" name="Volver" id="Volver" value="Volver" onclick="window.location='inCli.html'" />              </td>
              <td width="84"><input type="submit" name="buscar" value="Buscar" /></td>
            </tr>
          </table>
			  <?php
	if(isset($_POST['buscar']))
	{
	
				
				include('cnx.php');	
				$id=$_POST['id'];
				
				$query = "SELECT * from areas where Id=".$id;
				$result = mysql_query($query);
		  if($row = mysql_fetch_array($result))
	  
	  {
	
	
	?>
	
			  
			  <h2 align="center">
			  <label></label></h2>
			  <table width="545" border="0" align="center" bordercolor="#0B2161" bgcolor="#FFFFFF">
				<tr>
				  <td><span class="Estilo12">CURP:</span></td>
				  <td><input name="nombre" type="text" id="nombre" value="<?php echo utf8_encode($row['Nombre']);?>" size="50" style="background-color:#CCCCCC" /></td>
				</tr>
				<tr>
				  <td width="213">Dependencia</td>
				  <td width="316"><select name="dep" id="dep">
                    <?php
		  				include ('cnx.php');
						$result = mysql_query("SELECT * from dependencias"); 
						while($fila=mysql_fetch_array($result)){
  					 	echo "<option value='".$fila['Id']."'>".$fila['Nombre']."</option>";
						}

					?>
                  </select></td>
				</tr>
			</table>
		
			  <p align="left">
				<label></label>
			  </p>
			  <table width="301" border="1" id="tabla1">
                <tbody>
                  <tr>
                    <td width="91"><p>CURP</p></td>
                    <td width="144"><select name="idP" id="idP">
                        <?php
		  include ('cnx.php');
$result = mysql_query("SELECT * from personas where tipo='Trabajador'"); 
while($fila=mysql_fetch_array($result)){
    echo "<option value='".$fila['Id']."'>".$fila['CURP']."</option>";
}

?>
                    </select></td>
                  </tr>
                  <tr>
                    <td>Area:</td>
                    <td><select name="area" id="area">
                        <?php
		  include ('cnx.php');
$result = mysql_query("SELECT * from areas"); 
while($fila=mysql_fetch_array($result)){
    echo "<option value='".$fila['Id']."'>".$fila['Nombre']."</option>";
}

?>
                    </select></td>
                  </tr>
                  <tr>
                    <td height="43">Puesto:</td>
                    <td><select name="puesto" id="puesto">
                        <?php
		  include ('cnx.php');
$result = mysql_query("SELECT * from puestos"); 
while($fila=mysql_fetch_array($result)){
    echo "<option value='".$fila['Id']."'>".$fila['Puesto']."</option>";
}

?>
                    </select></td>
                  </tr>
                  <tr>
                    <td height="34">Fecha de ingreso </td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="32">Horario</td>
                    <td><input type="text" name="horario" id="horario" /></td>
                  </tr>
                  <tr>
                    <td height="29">Nivel</td>
                    <td><select name="nivel" id="nivel">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select></td>
                  </tr>
                </tbody>
              </table>
			  <p align="center">
				<input type="submit" name="modificar" value="Modificar" style="background:#5DBEDE" border="10"/>
			  </p>
			  <h2>&nbsp;</h2>
</form>
	 <?php
 }
 else{
 ?>
 <script language="javascript">
alert("!!");
window.location='M_area.php';

</script>
 <?php
 }
 }
 ?>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="fbg"></div>
  <div class="footer">
    
    <div class="clr"></div>
  </div>
</div>
</body>
</html>
<?php
if(isset($_POST['modificar']))
{

include('cnx.php');

$id=$_REQUEST['id'];
$dep=$_REQUEST['dep'];
$nombre=$_REQUEST['nombre'];



mysql_query("update areas set Nombre='$nombre',IdDependencia=$dep where Id=$id") or die ("Problemas".mysql_error());
?>

<script language="javascript">
var respuesta=confirm("El registro fue actualizado!! Deseas modificar otro??");
if (respuesta==true)
window.location='M_area.php';
else
window.location='M_area.php';
</script>
<?php
}
?>