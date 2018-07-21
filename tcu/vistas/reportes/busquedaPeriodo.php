<!--
    Codigo para determinar si la busqueda se va a realizar por una 
    fecha en especifico o por un rango de fechas . 
-->  
<style> 
          #radioBtn .notActive {
            color:#3276b1; 
            background-color:#fff; 
          } 
</style>
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

    <div class="col-md-2">
        <a type = "button"class ="btn btn-primary" onclick="sendPeriodReport();" style="margin-top:30px"><span class="glyphicon glyphicon-search"></span> Buscar</a >
    </div>
    </div>  