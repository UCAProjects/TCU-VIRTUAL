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

<div class="row">
    <div class="col-md-5">
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

    <div class="col-md-2">
        <a type = "button"class ="btn btn-primary" onclick="sendSedeReport();" style="margin-top:30px"><span class="glyphicon glyphicon-search"></span> Buscar</a >
    </div>
</div>