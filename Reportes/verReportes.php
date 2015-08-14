<?php 
include "header.php";

include "conexion.php";
if($_SESSION['tipo']!='administrador') 
{
  header('Location:index.php'); 
  exit();
}

$id = $_GET['id'];
 
//consulta noticia con id
	$result= mysqli_query($conn, "SELECT *, DATE_FORMAT(fecha_mod, '%d-%b-%Y') as fecha FROM reportes_industrial WHERE reporte_id =".$_GET['id']);

while ($row = mysqli_fetch_array($result)) {
	$tipoReporte=$row['tipo'];
  $estatus=$row['estatus'];
?>
   <script type="text/javascript">
        window.onload =function(){
          select();
        }
        function  select(){
          $("#tipoSelect").val("<?php echo $tipoReporte; ?>");
          $("#estatusSelect").val("<?php echo $estatus;?>");

        }
        function cancelar(){
          window.location.href="indezx.php";
        }
        function actualizar(){
          window.location.reload();
        }
  </script>
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

<!-- Estatus Select -->
<div class="form-group">
  <label class="col-md-4 control-label" for="estatusSelect">Estatus:</label>
  <div class="col-md-2">
    <select id="estatusSelect" name="estatusSelect" class="form-control">
      <option value="Iniciado">Iniciado</option>
      <option value="En proceso">En proceso</option>
      <option value="Finalizado">Finalizado</option>
    </select>
  </div>
</div>

<!-- Botones -->
<div class="form-group">
  <label class="col-md-4 control-label" for="cancelarbtn"></label>
  <div class="col-md-8">
    <button id="cancelarbtn" name="cancelarbtn" class="btn btn-danger" onclick="cancelar()">Cancelar</button>
    <button id="actualizarbtn" name="actualizarbtn" class="btn btn-success" >Actualizar</button>
  </div>
</div>

</fieldset>
</form>
<?php 
  if (isset($_POST['actualizarbtn'])) {
    
               $tipo=$_POST['tipoSelect'];
               $ubicacion_reporte=$_POST['ubicaciontxt'];
               $descrp_reporte=$_POST['descripArea'];
               $estatusS=$_POST['estatusSelect'];

            $sql="UPDATE reportes_industrial  
            SET  tipo='".$tipo."', ubicacion='".$ubicacion_reporte."', descrip='".$descrp_reporte."', estatus='".$estatusS."',fecha_mod= CURRENT_TIMESTAMP
            WHERE reporte_id='".$id."'";

            mysqli_query($conn, $sql);
     

            echo'<script type="text/javascript">
                alert("Se ha actualizado el reporte.");
                </script>';
            echo'<script type="text/javascript">
                window.location.href="verReportes.php?id=<?php echo $row["reporte_id"];?>";
                </script>';
            
            mysqli_close($conn);
  }

}
include "footer.php";

 ?>