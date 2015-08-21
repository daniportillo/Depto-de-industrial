<?php 
include "header.php";


?>

<form class="form-horizontal">
<fieldset>

<legend>Enviar Correo</legend>

<!-- Asunto-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtAsunto">Asunto:</label>  
  <div class="col-md-4">
  <input id="txtAsunto" name="txtAsunto" placeholder="" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Textarea Mensaje -->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtAreaMsg">Mensaje:</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="txtAreaMsg" name="txtAreaMsg" rows="7"></textarea>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="btnCancelar"></label>
  <div class="col-md-4">
    <button id="btnCancelar" name="btnCancelar" class="btn btn-danger ">Cancelar</button>
    <button id="btnEnviar" name="btnEnviar" class="btn btn-primary pull-right">Enviar</button>
  </div>
</div>

</fieldset>
</form>


<?php

include "footer.php";

 ?>