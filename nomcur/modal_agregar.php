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
            <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre completo" >
	      </div>
		  <div class="form-group"> </div>
		  <div class="form-group">
            <label for="fecha" class="control-label"></label>
		  </div>

      
		  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar datos</button>
      </div>
    </div>
  </div>
</div>
</form>