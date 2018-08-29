<?php
    include '../../conection.php'; //conección a la db
    /** recive the query */
    $query = $_POST["query"];

    /** execute the query */
    if($query != ""){
        $stmt = $db->prepare($query);
        $stmt -> execute();
        $result = $stmt -> fetchall(); ?>


        <table id="example" class ="display table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th> Codigo</th>
                    <th> Grupo</th>
                    <th> Sede</th>
                    <th> Carrera</th>
                    <th> Estado</th>
                    <th> Fecha Creación</th>
                    <th> Periodo</th>

                </tr >
            </thead>
            <tbody>

                <?php
                    foreach($result as $row){ ?>
                    <tr>
                        <td> <?php echo $row["codigo"]?></td>
                        <td> <?php echo $row["descripcion"]?></td>
                        <td> <?php echo $row["sede"]?></td>
                        <td> <?php echo $row["carrera"]?></td>
                        <td> <?php echo $row["estado"]?></td>
                        <td> <?php echo $row["fecha"]?></td>
                        <td> <?php echo $row["periodo"]?></td>
                    </tr>
                    <?php
                    }
                ?>
            </tbody >
            <tfoot>
                <tr>
                    <th> Grupo</th>
                    <th> Carrera</th>
                    <th> Fecha </th>
                </tr >
            </tfoot>
        </table>

    <?php
    }else{ ?>
        <center><label class="label label-danger">Consulta NO Válida.</label></center>
    <?php
    }
?>




<script>
          $(document).ready(function () {
            $('#radioBtn a').on('click', function() {
              var sel = $(this).data('title');
              var tog = $(this).data('toggle');
              $('#' + tog).prop('value', sel);
              $('a[data-toggle="' + tog + '"]').not('[data-title="' + sel + '"]').removeClass('active').addClass('notActive');
              $('a[data-toggle="' + tog + '"][data-title="' + sel + '"]').removeClass('notActive').addClass('active');

              var formTwoYear = document.getElementById("year2");
              if (sel == "N") {
                formTwoYear.style.display = "none";
              }else {
                formTwoYear.style.display = "block";
              }
            });

            $('#example') . DataTable( {
              dom:'Bfrtip',
                //Configuracíon de las etiquetas en español
              "language": {
                    "lengthMenu":"Mostrar _MENU_ ",
                    "zeroRecords":"No se encontraron resultados",
                    "info":"Mostrando la página _PAGE_ of _PAGES_",
                    "infoEmpty":"No hay información disponible",
                    "infoFiltered":"(Filtrando la información de _MAX_ total )",
                    "sSearch":"Buscar"
              },
              // Botones para exportar
              buttons:[ {
                        extend:'colvis',
                        text:'<i class="glyphicon glyphicon-th" title="Seleccionar Columnas"></i>',
                        //<IMG style="width:15%; margin" src="../Content/img/mobile-menu.png" ALT="BSP"></IMG>
                        collectionLayout:'fixed two-column'
                    },  {
                        extend:'pdf',
                        text:'<i class="fas fa-file-pdf" aria-hidden="true" title="EXPORTAR PDF"></i>',
                        title:'Reporte'
                    },  {
                        extend:'excel',
                        text:'<i class="fas fa-file-excel" aria-hidden="true" title="EXPORTAR EXCEL"></i>',
                        title:'Reporte'
                    },  {
                        extend:'print',
                        text:'<i class="glyphicon glyphicon-print" aria-hidden="true" title="IMPRIMIR"></i>',
                        title:'Reporte'
                    }]
            });
          });
        </script>