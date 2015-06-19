<!DOCTYPE html>
<html>
<?php 
	include "header.php";
 ?>		

	<h3 class="text-center">¡Envíanos un mensaje!</h3>
<!--Formulario de contacto-->

<form class="form-horizontal">
<fieldset>


<div class="form-group">
  <label class="col-md-4 control-label" for="nombretxt">Nombre:</label>  
  <div class="col-md-4">
  <input id="nombretxt" name="nombretxt" placeholder="" class="form-control input-md" required="" type="text">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="correotxt">Correo:</label>  
  <div class="col-md-4">
  <input id="correotxt" name="correotxt" placeholder="" class="form-control input-md" required="" type="email">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="comentariotxt">Comentario:</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="comentariotxt" name="comentariotxt"></textarea>
  </div>
</div>


<div class="form-group">
  <div class="col-md-5 pull-right">
    <button id="btnenviar" name="btnenviar" class="btn btn-primary">Enviar</button>
  </div>
</div>

</fieldset>
</form>



<br>
	<?php 
  include "footer.php"; ?>

</div>
</body>
</html>