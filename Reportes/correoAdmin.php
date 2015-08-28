<?php 
 include "header.php";

if($_SESSION['tipo']!='administrador') 
{
  header('Location:index.php'); 
  exit();
}


$emailAEnviar = $_GET['id'];

?>

<form role="form-horizontal">

          	<!--Asunto-->
            <div class="form-group">
              <label  class="control-label"for="txtAsunto">Asunto:</label>
              <input type="text" class="form-control col-md-6" id="txtAsunto" name="txtAsunto">
            </div>
            <!--Mensaje-->
            <div class="form-group">
              <label for="txtAreaMensaje"> Mensaje:</label>
              <textarea id="txtAreaMensaje" name="txtAreaMensaje" class="form-control" rows="5"></textarea>
            </div>
              
          </form>
<?php
 include "footer.php";

 ?>