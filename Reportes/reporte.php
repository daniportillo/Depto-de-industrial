<?php 
include "header.php";

include "conexion.php";
$id = $_GET['id'];
//consulta noticia con id
	$result= mysqli_query($conn, "SELECT *, DATE_FORMAT(fecha_mod, '%d-%b-%Y') as fecha FROM reportes_industrial WHERE reporte_id =".$_GET['id']);
while ($row = mysqli_fetch_array($result)) {
	
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
  <input id="ubicaciontxt" name="ubicaciontxt" placeholder="Ubicacion de la solicitud de servicio" class="form-control input-md" required="" type="text" 
  	value="<?php echo $row['ubicacion']; ?>">
    
  </div>
</div>

<!-- Descripcion -->
<div class="form-group">
  <label class="col-md-4 control-label" for="descripArea">Descripción:</label>
  <div class="col-md-5">                     
    <textarea class="form-control" id="descripArea" name="descripArea"><?php echo $row['descrip']; ?></textarea>
  </div>
</div>

<!--Estatus-->
<div class="form-group">
	<label class="col-md-4 control-label" for="estatustxt">Estatus:</label>
	<div class="col-md-2">
	<input id="estatustxt" name="estatustxt" type="text" class="form-control input-md" value="<?php echo $row['estatus']; ?>" disabled>
	</div>
</div>

<!-- Botones -->
<div class="form-group">
  <label class="col-md-4 control-label" for="cancelarbtn"></label>
  <div class="col-md-8">
    <button id="cancelarbtn" name="cancelarbtn" class="btn btn-danger">Cancelar</button>
    <button id="crearReporteAdminbtn" name="crearReporteAdminbtn" class="btn btn-success">Actualizar</button>
  </div>
</div>

</fieldset>
</form>
<?php 

}
include "footer.php";

 ?>