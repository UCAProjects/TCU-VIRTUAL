<?php
  $_Date = $_POST["fecha"];
 ?>

 <form>
   <div class="form-group">
     <label for="exampleInputEmail1">Fecha</label>
     <input type="text" class="form-control" id="Fecha" value="<?php echo $_Date; ?>" readonly>
   </div>

   <div class="form-group">
     <label for="inTime">Hora de Entrada</label>
     <input type="time" class="form-control" id="inTime">
   </div>

   <div class="form-group">
     <label for="outTime">Hora de Salida</label>
     <input type="time" class="form-control" id="outTime">
   </div>

   <div class="form-group">
     <label for="quantity">Cantidad de Horas</label>
     <input type="number" class="form-control" id="quantity">
   </div>

   <div class="form-group">
     <label for="actividadesR">Actividades</label>
     <textarea class="form-control" id="actividadesR" rows="3"></textarea>
   </div>

   <a  class="btn btn-primary" onclick="agregarActividad()">Confirmar</a>
 </form>
