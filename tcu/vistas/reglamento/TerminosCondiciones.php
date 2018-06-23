<style>
    .pdfobject-container { 
        height: 500px;
        width: 90%;
        margin-left: 5%;
    }
    .pdfobject { border: 1px solid #666; }

    .title{
        margin-left: 5%;
        font-weight: bold;
        font-size:25px;
        font-family: Fraktur;
    }

</style>

<div class="modal-header" align="center">
  <button type="button" class="close black" data-dismiss="modal" aria-label="Close">
    <span class="glyphicon glyphicon-remove black" aria-hidden="true"></span>
  </button>
  <h2><i class="fas fa-file-signature"></i> Reglamento y Uso del Sistema</h2>
</div>

<br>

<div class="modal.body body">
        <p class="title">Reglamento</p>
        <div id="example1" class="textTC"></div> 
        <br>
        <hr>
        <br>
        <p class="title">Uso del Sistema</p>
        <video width="90%" style="margin-left:5%" controls>
            <source src="../../video/video.mp4" type="video/mp4">
            <source src="../../video/video.ogv" type="video/ogv">
            <source src="../../video/video.webm" type="video/webm">
            Your browser does not support HTML5 video.
        </video>
</div>
<br>

<div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Declaro haber leído la información aquí suministrada</button>
</div>


<script src="../../PDFObject/pdfobject.js"></script>
<script>PDFObject.embed("../../documentos/Reglamento-Trabajo-Comunal-Universitario-TCU.pdf", "#example1");</script>
<script>PDFObject.embed("../../documentos/Reglamento-Trabajo-Comunal-Universitario-TCU.pdf", "#example2");</script>