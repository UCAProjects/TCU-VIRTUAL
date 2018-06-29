<?php 

?>
<form action="../../accesoDatos/resumenEjecutivo/insertResumenEjecutivo.php" onsubmit="return validateNumber()" enctype="multipart/form-data" id="insertarResumenEjecutivo-form" method="post">
<center><label id="errorLabel" class="label label-primary"> </label></center>
	<label for="uploadedAprobacion">Adjuntar carta de conclusión del TCU emitida por el supervisor </label>
	<input name="uploadedAprobacion[]" id="uploadedAprobacion[]" type="file" accept="application/pdf" required/>
	<br>
	<label for="uploadBitacora">Adjuntar Bitácora </label> 
	<input name="uploadBitacora[]" id="uploadBitacora[]" type="file" accept="application/pdf" required/>
	<br>
	<label for="uploadEvidencias">Adjuntar Evidencias de la realización del TCU (10 Fotos) </label>
	<input name="uploadEvidencias[]" id="uploadEvidencias" type="file" accept="image/png, .jpeg, .jpg, image/gif"  multiple required />
	<br>
	<center><label id="errorLabel" class="label label-danger"></label></center>
	<br>
	<div class="modal-footer">
		<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
		<button type="submit" id="btn_Enviar" name="btn_Enviar" class="btn btn-segundary"> <i class="far fa-paper-plane"></i> Enviar</button>
	</div>
</div>
</form>


