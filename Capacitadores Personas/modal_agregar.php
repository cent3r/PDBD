
  <?php 
$cookieactual = "log";
if (isset($_COOKIE[$cookieactual]))
{
	$cookie_value = $_COOKIE[$cookieactual];
	
	
		
?>





<form id="guardarDatos">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar persona</h4>
      </div>
      <div class="modal-body">



			<div id="datos_ajax_register"></div>



      <div class="form-group">
            <label for="nombre" class="control-label">Nombre: </label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo" >
		      </div>
		  <div class="form-group">
            <label for="curp" class="control-label">CURP :</label>
            <input type="text" class="form-control" id="curp" name="curp" placeholder="Ingrese el CUPR" >
          </div>
		  <div class="form-group">
            <label for="fecha" class="control-label">Fecha de Nacimiento:</label>
            <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Ingrese Formato aa-mm-dd" >
          </div>
		  <div class="form-group">
            <label for="rfc" class="control-label">RFC :</label>
            <input type="text" class="form-control" id="rfc" name="rfc" placeholder="Ingrese RFC" >
          </div>
            <div class="form-group">
            <label for="rfc" class="control-label">Curriculum :</label>
            <input type="text" class="form-control" id="Curriculum" name="Curriculum" placeholder="Ingrese Curriculum" >
          </div>
            <div class="form-group">
            <label for="rfc" class="control-label">Empresa :</label>
            <input type="text" class="form-control" id="Empresa" name="Empresa" placeholder="Ingrese Empresa" >
          </div>
          
          

<!--		  <div class="form-group">
            <label for="sexo" class="control-label">Sexo :</label>
            <input type="text" class="form-control" id="sexo" name="sexo" placeholder="Sexo" >
          </div>

      <div class="form-group">
            <label for="tipo" class="control-label">Tipo :</label>
            <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo de Usuario" required maxlength="15">
          </div>
-->
<div class="form-group"> <!-- State Button -->
      <label for="sexo" class="control-label">Sexo</label>
      <select class="form-control" id="sexo" name ="sexo" >
          <option value=""> </option>
          <option value="Masculino">Masculino</option>
          <option value="Femenino">Femenino</option>
      </select>
    </div>



<div class="form-group"> 
  <p><!-- State Button -->
    <label for="tipo" class="control-label">Tipo :</label>
    <select class="form-control" id="tipo" name ="tipo" >
      <option value=""></option>
      <option value="Trabajador">Trabajador</option>
      <option value="Capacitador">Capacitador</option>
    </select>
    </p>
  <p><br />
  </p>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar        </button>
        <button type="submit" class="btn btn-primary">Guardar datos</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php
 }else {
	echo "<div align=\"center\">Iniciar sesion!</div><br>"; 
	echo "<div align=\"center\"><a href='index.html'>Login</a></div>";
	}
?>