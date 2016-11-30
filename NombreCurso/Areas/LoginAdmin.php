<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Login</title>
<style type="text/css">
<!--
.Estilo1 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>
</head>
<body>

   
	        
       <form action="" method="post">
          <p>&nbsp;</p>
          <p align="center" class="Estilo1"> Usuario </p>
          <table width="767" border="0" align="center">
            <tr>
              <td width="583"><span class="Estilo15">Ingresar Usuario :</span>
                <input name="correo" type="text" id="correo" />
                y contrase&ntilde;a
<label>
<input name="contra" type="password" id="contra" />
</label>
<td width="61"><input type="submit" name="buscar" value="Ingresar" /></td>
              <td width="109">&nbsp;</td>
            </tr>
         </table>
			  <?php
	if(isset($_POST['buscar']))
	{
	
				
				include('cnx.php');	
				$email=$_POST['correo'];
				$pass=$_POST['contra'];
				
				$query = "Select ID,Correo,Password,Estatus from usuarios where Correo='$email' && Password='$pass' && Estatus='Activo'";
				$result = mysql_query($query);
		  if($row = mysql_fetch_array($result))
	  
	  {
	
	
	?>
	
			  
	     <h2 align="center">
			  <label></label>
			  Bienvenido</h2>
	     <p align="center"><table width="767" border="0" align="center" bgcolor="#6699CC">
            <tr>
	      
		      <td width="109"><input type="button" name="Dependencias" id="Dependencias" value="Dependencias" onclick="window.location='index.php'" />
	          <td width="83"><input type="button" name="Areas" id="Areas" value="Areas" onclick="window.location='indexAr.php'" />
	          <td width="83"><input type="button" name="NombreCurso" id="NombreCurso" value="NombreCurso" onclick="window.location='inCli.html'" />
	          <td width="83"><input type="button" name="Trabajadores" id="Trabajadores" value="Trabajadores" onclick="window.location='inCli.html'" />
	          <td width="83"><input type="button" name="Capacitadores" id="Capacitadores" value="Capacitadores" onclick="window.location='inCli.html'" />
	          <td width="83"><input type="button" name="Usuarios" id="Usuarios" value="Usuarios" onclick="window.location='inCli.html'" /></td>
            </tr>
         </table>
	     </p>
	     <h2>&nbsp;</h2>
</form>
	 <?php
 }
 else{
 ?>
 <script language="javascript">
alert("Error!! Verifique su usuario y contrasena");
window.location='LoginAdmin.php';

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
