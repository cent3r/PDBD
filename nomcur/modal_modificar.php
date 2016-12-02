<form id="actualidarDatos">
<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        

        <h3 class="modal-title" id="exampleModalLabel"></h3> 
      

      </div>
      <div class="modal-body">
			<div id="datos_ajax"></div>




      <div class="form-group">
            <label for="nombre" class="control-label">Nombre: </label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" >

			      <input type="hidden" class="form-control" id="Id" name="Id">
          </div>
		  <div class="form-group"></div>
		 
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar datos</button>
      </div>
    </div>
  </div>
</div>
</form>