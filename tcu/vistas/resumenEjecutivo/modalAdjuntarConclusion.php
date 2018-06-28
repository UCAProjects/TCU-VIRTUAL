<form action="../../accesoDatos/resumenEjecutivo/insertResumenEjecutivo.php" enctype="multipart/form-data" id="insertarResumenEjecutivo-form" method="post">
	<label for="uploadedAprobacion">Adjuntar carta de conclusión del TCU emitida por el supervisor </label>
	<input name="uploadedAprobacion[]" id="uploadedAprobacion[]" type="file" />
	<br>
	<label for="uploadedAprobacion">Adjuntar Bitácora </label>
	<input name="uploadedAprobacion[]" id="uploadedAprobacion[]" type="file" />
	<br>
	<label for="uploadedAprobacion">Adjuntar Evidencias de la realización del TCU (10 Fotos) </label>
	<input name="uploadedAprobacion[]" id="uploadedAprobacion[]" type="file" />
	<br>
	<div class="modal-footer">
		<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
		<button type="submit" id="btn_Enviar" name="btn_Enviar" class="btn btn-segundary"> <i class="far fa-paper-plane"></i> Enviar</button>
	</div>
</div>
</form>
