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
        <div class="container" width="10%">
            <p class="title">Videos Informátivos</p>
            <div id="myCarousel" width="10%" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                            <video width="90%" controls >
                                <source src="../../video/tcu2.mp4" type="video/mp4">
                                <source src="../../video/tcu2.webm" type="video/webm">
                                Lo sentimos, su explorador no es compatible con el formato de video!
                            </video>
                    </div>
                    <div class="item">
                        <video width="90%"  controls>
                            <source src="../../video/tcu1.mp4" type="video/mp4">
                            <source src="../../video/tcu1.webm" type="video/webm">
                            Lo sentimos, su explorador no es compatible con el formato de video!
                        </video>
                        <!--<div class="carousel-caption">
                        <h3>Informe Final</h3>
                        </div>-->
                    </div>
                </div>
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <!--<a style="margin-right:13%; width:10px" class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a> -->
            </div>  
        </div>
<br>
<?php
    session_start();
    include '../../conection.php'; //Conección a la DB

    //Inicialización de variables
    $id = $_SESSION["codigo"];
    if(isset($_POST["reglamentoBtn"])){ //Si se presiona el boton de confirmar
        echo "listo";
        $queryUpdateReglamento = "UPDATE tigrupou_tcu.estudiantes SET reglamento = 1 WHERE codigo like $id";
        $stmt = $db->prepare($queryUpdateReglamento);
        $stmt -> execute();
    }
?>
<div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button"  onclick="reglamento()" data-dismiss="modal" class="btn btn-success" id="reglamentoBtn" name="reglamentoBtn">Declaro haber leído la información aquí suministrada</button>
</div>

<script>
    $('.carousel').carousel({
        interval: false
    }); 

</script>
<script src="../../PDFObject/pdfobject.js"></script>
<script>PDFObject.embed("../../documentos/Reglamento-Trabajo-Comunal-Universitario-TCU.pdf", "#example1");</script>