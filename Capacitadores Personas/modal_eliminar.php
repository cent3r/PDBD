
  <?php 
$cookieactual = "log";
if (isset($_COOKIE[$cookieactual]))
{
	$cookie_value = $_COOKIE[$cookieactual];
	
	
		
?>




<form id="eliminarDatos">
<div class="modal fade" id="dataDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <input type="hidden" id="id_persona" name="id_persona">
 <!--     <h2 class="text-center text-muted">Estas seguro?</h2>  -->
	  <p class="lead text-muted text-center" style="display: block;margin:10px">Esta acción eliminará de forma permanente el registro. Deseas continuar?</p>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-lg btn-primary">Aceptar</button>
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