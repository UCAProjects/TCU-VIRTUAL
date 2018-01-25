<div class="modal-header" align="center">
  <button type="button" class="close black" data-dismiss="modal" aria-label="Close">
    <span class="glyphicon glyphicon-remove black" aria-hidden="true"></span>
  </button>
  <h2><i class="fa fa-search-plus" aria-hidden="true"></i>Buscar Estudiantes</h2>
  
</div>

<br>
<div class="modal.body">
  <div class="formulario">
    <div class="row">
      <div class="col-md-7 col-md-offset-1">
        <input type="text" name="nombre" id="nombre" placeholder="Buscar Nombre" required>
      </div>
      <div class="col-md-3">
        <button  onclick="cargarResultados()" name="btnBuscar" >Buscar</button>
      </div>
    </div>
  </div>
  <hr>
  <div id="resultadoBusqueda"></div>
</div>
<br>
<br>
<div class="modal-footer">
</div>