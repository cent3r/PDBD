<form id="guardarDatos">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar nombre</h4>
      </div>
      <div class="modal-body">



			<div id="datos_ajax_register"></div>



      <div class="form-group">
            <label for="nombre" class="control-label">Nombre: </label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo" >
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


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar datos</button>
      </div>
    </div>
  </div>
</div>
</form>
