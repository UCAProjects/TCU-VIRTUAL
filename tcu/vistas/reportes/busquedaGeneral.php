<!--
    Pantalla para realizar las búsquedas
    a partir de las sede de los TCU.
-->
<?php
    include '../../conection.php';
?>
<style>
    #radioBtn .notActive {
        color:#3276b1;
        background-color:#fff;
    }
</style>

            <!-- Busqueda Carrera -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group" >
                    <label for="selCarrera"> Carrera: </label>
                    <select class="form-control" id="selCarrera">
                        <option value="0"> &ltSin Asignar&gt</option>
                        <?php
                        $query = "SELECT * FROM tigrupou_tcu.carreras;";
                        $stmt = $db->prepare($query);
                        $stmt -> execute();
                        $result = $stmt -> fetchAll();
                        foreach ($result as $row) {
                            echo "<option value=\"$row[codigo]\"> $row[carrera] </option>";
                        }
                        ?>
                    </select>
                </div >
            </div>

            

            <div class="col-md-3">
                <div class="form-group" >
                    <label for="selSede"> Sede: </label>
                    <select class="form-control" id="selSede">
                        <option value="0"> &ltSin Asignar&gt</option>
                        <?php
                        $query = "SELECT * FROM tigrupou_tcu.sedes;";
                        $stmt = $db->prepare($query);
                        $stmt -> execute();
                        $result = $stmt -> fetchAll();
                        foreach ($result as $row) {
                            echo "<option value=\"$row[codigo]\"> $row[sede] </option>";
                        }
                        ?>
                    </select>
                </div >
            </div>


            <div class="col-md-3">
                <div class="form-group" >
                    <label for="selPeriodo"> Periodo: </label>
                    <select class="form-control" id="selPeriodo">
                        <option value="0"> &ltSin Asignar&gt</option>
                        <?php
                            $query = "SELECT P.codigo, CONCAT(P.anio, ' - ', SP.sub_periodo,' ', P.numero_periodo ) AS PERIODO FROM tigrupou_tcu.periodos P JOIN tigrupou_tcu.sub_periodo SP ON P.sub_periodo LIKE SP.codigo;";
                            $stmt = $db->prepare($query);
                            $stmt -> execute();
                            $result = $stmt -> fetchAll();
                            foreach ($result as $row) {
                                echo "<option value=\"$row[codigo]\">$row[PERIODO] </option>";
                            }
                        ?>
                    </select>
                </div >
            </div>

            <div class="col-md-2">
                <div class="form-group" >
                    <label for="selEstado"> Estado: </label>
                    <select class="form-control" id="selEstado">
                        <option value="-1"> &ltSin Asignar&gt</option>
                        <?php
                            $query = "SELECT * FROM tigrupou_tcu.estado WHERE reporte like 1;";
                            $stmt = $db->prepare($query);
                            $stmt -> execute();
                            $result = $stmt -> fetchAll();
                            foreach ($result as $row) {
                                echo "<option value=\"$row[codigo]\">TCU  $row[descripcion]s </option>";
                            }
                        ?>
                    </select>
                </div >
            </div>

            <div class="col-md-1">
                <a type = "button"  class ="btn btn-primary" onclick="sendGeneralReport();" style="margin-top:30px"><span class="glyphicon glyphicon-search"></span> Buscar</a >
            </div>


        </div>


        <!-- Busqueda Estado -->
        <div class="row">
            
        </div>


        <!-- Busqueda Periodo -->
        <!--
        <div class="well">  
            <div class = "form-group">  
                <label for = "happy" class = "col-sm-3 col-md-3 col-md-offset-3 control-label"> Buscar por rango de Años?</label>
                <div class="col-sm-5 col-md-5">  
                    <div class="input-group">
                        <div id="radioBtn" class="btn-group" >  
                            <a class="btn btn-primary btn-sm active" data-toggle="yearRange" data-title="N"> NO </a>  
                            <a class="btn btn-primary btn-sm notActive" data-toggle="yearRange" data-title="Y"> SI </a> 
                        </div>  
                        <input type="hidden" name ="yearRange" id="yearRange" >  
                    </div>
                </div>  
            </div> 
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group" > 
                    <label for="yearO"> Año Inicial </label>  
                    <input type = "number" id="yearO" placeholder = "YYYY"aria - describedby = "emailHelp"class = "form-control"min = "2018"max = "2050"/>
                    <small id = "emailHelp"class = "form-text text-muted" > Digite el año a buscar en formato YYYY .  </small > 
                </div >
            </div>
            <div class="col-md-5" id = "year2" style = "display:none">
                <div class = "form-group">  
                    <label for = "yearT" > Año Final </label >
                    <input type = "number" id = "yearT" placeholder = "YYYY"aria - describedby = "emailHelp"class = "form-control"min = "2018"max = "2050"/>  
                    <small id = "emailHelp"class = "form-text text-muted" > Digite el año a buscar en formato YYYY .  </small >  
                </div >
            </div>
        </div> -->

        <!-- Busqueda Sede -->
        <div class="row">
            
        </div>




    
</div>