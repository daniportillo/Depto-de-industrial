<?php 

	include "header.php";
  if ($_SESSION['tipo']!='usuario') {
    header('Location:index.php'); 
  exit();
  }
	//Creación del nuevo reporte
?>

<form class="form-horizontal" method="POST">
<fieldset>


	<legend>Nuevo reporte</legend>

<!-- Tipo servicio -->
<div class="form-group">
  <label class="col-md-4 control-label" for="tipoSelect">Tipo de servicio:</label>
  <div class="col-md-5">
    <select id="tipoSelect" name="tipoSelect" class="form-control">
      <option value="Configuración de Red">Configuración de Red</option>
      <option value="Formateo a equipo de compúto">Formateo a equipo de compúto</option>
      <option value="Instalación de software">Instalación de software</option>
      <option value="Instalación de Red">Instalación de Red</option>
      <option value="Instalación de equipo de compúto (impresoras, cañones, étc.)">Instalación de equipo de compúto (impresoras, cañones, étc.)</option>
      <option value="Mantenimiento de equipo de compúto preventivo">Mantenimiento de equipo de compúto preventivo</option>
      <option value="Mantenimiento de equipo de compúto correctivo">Mantenimiento de equipo de compúto correctivo</option>
      <option value="Mantenimiento de equipo de impresoras preventivo">Mantenimiento de equipo de impresoras preventivo</option>
      <option value="Mantenimiento de equipo de impresoras correctivo">Mantenimiento de equipo de impresoras correctivo</option>
      <option value="Mantenimiento de equipo de cañon preventivo">Mantenimiento de equipo de cañon preventivo</option>
      <option value="Mantenimiento de equipo de cañon correctivo">Mantenimiento de equipo de cañon correctivo</option>
      <option value="Reparación de cables (VGA, Corriente)">Reparación de cables (VGA, Corriente)</option>
      <option value="Otros">Otros...</option>
    </select>
  </div>
</div>

<!-- Ubicacion-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ubicaciontxt">Ubicacion:</label>  
  <div class="col-md-3">
  <input id="ubicaciontxt" name="ubicaciontxt" placeholder="Ubicacion de la solicitud de servicio" class="form-control input-md" required="" type="text">
    
  </div>
</div>


<!-- Descripcion -->
<div class="form-group">
  <label class="col-md-4 control-label" for="descripArea">Descripción:</label>
  <div class="col-md-5">                     
    <textarea class="form-control" id="descripArea" name="descripArea"></textarea>
  </div>
</div>



<!-- Botones -->
<div class="form-group">
  <label class="col-md-4 control-label" for="cancelarbtn"></label>
  <div class="col-md-8">
    <button id="cancelarbtn" name="cancelarbtn" class="btn btn-danger">Cancelar</button>
    <button id="crearReporteAdminbtn" name="crearReporteAdminbtn" class="btn btn-success">Crear reporte</button>
  </div>
</div>

</fieldset>
</form>
<!--Crea el  reporte-->
    <?php if (isset($_POST['crearReporteAdminbtn'])){
             

               $tipo=$_POST['tipoSelect'];
               $ubicacion_reporte=$_POST['ubicaciontxt'];
               $solicitante=$id;
               $descrp_reporte=$_POST['descripArea'];


            $sql="INSERT INTO `reportes_industrial` (`reporte_id`, `user_id`, `tipo`, `ubicacion`, `descrip`, `fecha_inicio`, `fecha_mod`, `estatus`) 
            VALUES (NULL, '$solicitante', '$tipo', '$ubicacion_reporte', '$descrp_reporte', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 'Iniciado');";
            mysqli_query($conn, $sql);
            echo'<script type="text/javascript">
                alert("Reporte creado exitosamente.");
                </script>';
               
            
            mysqli_close($conn);
      
  } 
  ?>





<?php
	include "footer.php";

 ?>