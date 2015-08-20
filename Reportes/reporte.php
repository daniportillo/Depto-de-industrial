<?php 
include "header.php";

include "conexion.php";

if($_SESSION['tipo']!='usuario') 
{
  header('Location:index.php'); 
  exit();
}

$id_reporte = $_GET['id'];//Obtiene el id del reporte
 
//consulta reporte con id
	$result= mysqli_query($conn, "SELECT *, DATE_FORMAT(fecha_mod, '%d-%b-%Y') as fecha FROM reportes_industrial WHERE reporte_id =".$_GET['id']);


while ($row = mysqli_fetch_array($result)) {
  if ($row['user_id']!=$id) {//Verifica que el reporte sea del usuario logeado
      echo'<script type="text/javascript">
                window.location.href="index.php";
                </script>';
      
  }

	$tipoReporte=$row['tipoServicio'];
  $tipodeServicio=$row['tipo'];
?>
   <script type="text/javascript">
      //paso variable tiposervicio a var js
      var selectServicios="<?php echo $tipodeServicio; ?>";
        window.onload =function(){
          select();
        }

        function  select(){
          $("#tipoSelect").val("<?php echo $tipoReporte; ?>");//Selecciona valor en el tipo select segun la BD
          $('#tipoSelectInfraestructura').val("<?php echo $tipodeServicio; ?>");
          var sInfraestructura=document.getElementById('tipoSelectInfraestructura');//Verifica si hay seleccionado algo del select
          $('#tipoSelectLimpieza').val("<?php echo $tipodeServicio; ?>");
          var sLimpieza=document.getElementById('tipoSelectLimpieza');
          $('#tipoSelectComputo').val("<?php echo $tipodeServicio; ?>");
          var scomputo=document.getElementById('tipoSelectComputo');

          //Activan el select segun si se habia seleccionado algo o no
          if (sInfraestructura.selectedIndex>0) {
            $("#infraestructura").show();
            $("#limpieza").hide();
            $("#computo").hide();
          };
          if (sLimpieza.selectedIndex>0) {
            $("#infraestructura").hide();
            $("#limpieza").show();
            $("#computo").hide();
          };
          if (scomputo.selectedIndex>0) {

            $("#infraestructura").hide();
            $("#limpieza").hide();
            $("#computo").show();
          };
        }

        function cancelar(){
          window.location.href="index.php";
        }
        function actualizar(){
          //window.location.reload();
        }

        function  mostrar(id){//funcion para cambiar el select secundario dependiendo del tipo de servicio
          if (id.value=="Infraestructura") {
            $("#infraestructura").show();
            $("#limpieza").hide();
            $("#computo").hide();
          };
          if (id.value=="Limpieza") {
            $("#infraestructura").hide();
            $("#limpieza").show();
            $("#computo").hide();
          };
          if (id.value=="Equipo de cómputo") {
            $("#infraestructura").hide();
            $("#limpieza").hide();
            $("#computo").show();
          };
        }

  </script>
	<form class="form-horizontal" method="POST">
<fieldset>


	<legend>Nuevo reporte</legend>

<!-- Tipo servicio -->
<div class="form-group">
  <label class="col-md-4 control-label" for="tipoSelect">Tipo de servicio:</label>
  <div class="col-md-5">
    <select id="tipoSelect" name="tipoSelect" class="form-control" onChange="mostrar(this);">
      <option value="Infraestructura">Infraestructura</option>
      <option value="Limpieza">Limpieza</option>
      <option value="Equipo de cómputo">Equipo de cómputo</option>
    </select>
  </div>
</div>
<!--Tipo de servicio Infraestructura-->
<div class="form-group" id="infraestructura" style="display: none;">
  <label class="col-md-4 control-label" for="tipoSelect"></label>
  <div class="col-md-3">
    <select id="tipoSelectInfraestructura" name="tipoSelectInfraestructura" class="form-control">
      <option value="Iluminación">Iluminación</option>
      <option value="Electricidad">Electricidad</option>
      <option value="Fallas aire acondicionado">Fallas aire Acondicionado</option>
      <option value="Falta de mensabancos/sillas">Falta de mensabancos/sillas</option>
      <option value="Falta de mesas y/o escritorio">Falta de mesas y/o escritorio</option>
      <option value="Ventanas">Ventanas</option>
      <option value="Problemas con el contacto eléctrico">Problemas con el contacto eléctrico</option>
      <option value="Problemas con las llaves de aulas">Problema con las llaves de aulas</option>
    </select>
  </div>
</div>

<!--Tipo de servicio Limpieza-->
<div class="form-group" id="limpieza" style="display: none;">
  <label class="col-md-4 control-label" for="tipoSelect"></label>
  <div class="col-md-3">
    <select id="tipoSelectLimpieza" name="tipoSelectLimpieza" class="form-control">
      <option value="Aseo de aula(s)">Aseo de aula(s)</option>
      <option value="Aseo de cubículos">Aseo de cubículos</option>
      <option value="Aseo de pasillos">Aseo de pasillos</option>
      <option value="Aseo de laboratorios">Aseo de laboratorios</option>
      <option value="Aseo de baños">Aseo de baños</option>
    </select>
  </div>
</div>

<!--Tipo de servicio Computo-->
<div class="form-group" id="computo" style="display: none;">
  <label class="col-md-4 control-label" for="tipoSelect"></label>
  <div class="col-md-5">
    <select id="tipoSelectComputo" name="tipoSelectComputo" class="form-control">
      <option value="Configuración de Red">Configuración de Red</option>
      <option value="Instalación de Red">Instalación de Red</option>
      <option value="Falta de internet">Falta de internet</option>
      <option value="Formateo a equipo de compúto">Formateo a equipo de compúto</option>
      <option value="Instalación de software">Instalación de software</option>
      <option value="Instalación de equipo de compúto (impresoras, computadoras)">Instalación de equipo de compúto (impresoras, computadoras)</option>
      <option value="Mantenimiento de equipo de compúto preventivo">Mantenimiento de equipo de compúto preventivo</option>
      <option value="Mantenimiento de equipo de compúto correctivo">Mantenimiento de equipo de compúto correctivo</option>
      <option value="Mantenimiento de equipo de impresoras preventivo">Mantenimiento de equipo de impresoras preventivo</option>
      <option value="Mantenimiento de equipo de impresoras correctivo">Mantenimiento de equipo de impresoras correctivo</option>
      <option value="Mantenimiento de equipo de cañon correctivo">Mantenimiento de equipo de cañon correctivo</option>
      <option value="Reparación de cables (VGA, Corriente)">Reparación de cables (VGA, Corriente)</option>
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
    <textarea class="form-control" id="descripArea" name="descripArea" rows="5"><?php echo $row['descrip']; ?></textarea>
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
    <button id="cancelarbtn" name="cancelarbtn" class="btn btn-danger" onclick="cancelar()">Cancelar</button>
    <button id="actualizarbtn" name="actualizarbtn" class="btn btn-success" onclick="actualizar()">Actualizar</button>
  </div>
</div>

</fieldset>
</form>
<?php 
  if (isset($_POST['actualizarbtn'])) {
    

              $tipoServicio=$_POST['tipoSelect'];
               //Tomo el tipo de servicio especifico segun el servicio seleccionado
               if ($_POST['tipoSelect']=='Infraestructura') {
                 $tipo=$_POST['tipoSelectInfraestructura'];
               }
               if ($_POST['tipoSelect']=='Limpieza') {
                 $tipo=$_POST['tipoSelectLimpieza'];
               }
               if ($_POST['tipoSelect']=='Equipo de cómputo') {
                 $tipo=$_POST['tipoSelectComputo'];
               }
               $ubicacion_reporte=$_POST['ubicaciontxt'];
               $descrp_reporte=$_POST['descripArea'];

            $sql="UPDATE reportes_industrial  
            SET  tipoServicio='".$tipoServicio."', tipo='".$tipo."', ubicacion='".$ubicacion_reporte."', fecha_mod=CURRENT_TIMESTAMP, descrip='".$descrp_reporte."'
            WHERE reporte_id='".$id_reporte."' ";

            mysqli_query($conn, $sql);
            echo'<script type="text/javascript">
                alert("Se ha actualizado el reporte.");
                </script>';
            
            mysqli_close($conn);
  }

}
include "footer.php";

 ?>