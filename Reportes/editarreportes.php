<?php

include('header.php');
ini_set("display_errors", false);

$conn = mysql_connect("localhost","root","");
mysql_select_db("csti_db",$conn);


if(isset($_POST["submit"]) && $_POST["submit"]!="") {
$usersCount = count($_POST["tipo"]);
for($i=0;$i<$usersCount;$i++) {

mysql_query("UPDATE reportes_industrial set tipo='" . $_POST["tipo"][$i] . "', ubicacion='" . $_POST["ubicacion"][$i] . "', descrip='" . $_POST["descrip"][$i] . "', estatus='" . $_POST["estatus"][$i] .  "', fecha_mod='" . $_POST["fecha_mod"][$i] .  "'  WHERE reporte_id='" . $_POST["reporte_id"][$i] . "'");

}
header("Location:reportes.php");
}  
?>
<form name="frmUser" method="post" action="">


<h1 text align="center";>Modificacion de Reportes</h1>

<table class="table table-hover table-bordered table-striped"  align="center">
<tr>
<td><h3>Datos del reporte(s)</h3></td>
</tr>

<?php


$rowCount = count($_POST["reportes"]);
for($i=0;$i<$rowCount;$i++) {
$result = mysql_query("SELECT * FROM reportes_industrial WHERE reporte_id='" . $_POST["reportes"][$i] . "'");
$row[$i]= mysql_fetch_array($result);
?>
<tr>
<td>
<table class="table table-striped">
<tr>
<td><label>Tipo de Servicio:</label></td>
<td>

<div class="form-group">
  <div class="col-md-5">
    <select  name="tipo[]" class="form-control">
      <option selected><?php echo $row[$i]['tipo']; ?></option></option>
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
</td>
</tr>

<tr>
<td><label>Ubicacion:</label> </td>
<td>
<div class="form-group"> 
  <div class="col-md-3">
  <input name="ubicacion[]" class="form-control input-md" type="text" value="<?php echo $row[$i]['ubicacion']; ?>">
 </div>
</div>	
</td>
</tr>

<tr>
<td><label>Descipción:</label></td>
<td>
<div class="form-group">
 <div class="col-md-5">                     
 <textarea class="form-control" rows="8" cols="6" name="descrip[]"><?php echo $row[$i]['descrip']; ?></textarea>
 </div>
</div>
</td>
</tr>


<tr>
<td><label>Fecha de Inicio</label></td>
<td>
<div class="form-group"> 
  <div class="col-md-3">
  <input name="fecha_inicio[]" class="form-control input-md" type="datetime" disabled=true value="<?php echo $row[$i]['fecha_inicio']; ?>">
 </div>
</div>	
</td>
</tr>


<tr>
<td><label>Fecha de Modificacion</label></td>
<td>
	<div class="form-group"> 
  <div class="col-md-3">
    <input type="datetime" class="form-control input-md" readonly="readonly" name="fecha_mod[]"  value="<?php $time = time(); echo date("Y-m-d ", $time); echo  date("H:i:s", $time) ?>"/>
   </div>
</div>	
</td>
</tr>

<tr> 
<td><label>Estatus</label></td>
<td>
<div class="form-group">
  <div class="col-md-5">
    <select  name="estatus[]" class="form-control">
      <option selected><?php echo $row[$i]['estatus']; ?></option>
      <option value="Iniciado">Iniciado</option>
      <option value="En proceso">En proceso</option>
      <option value="Finalizado">Finalizado</option>
    </select>
    <input type="hidden" name="reporte_id[]" class="txtField" value="<?php echo $row[$i]['reporte_id']; ?>">
  </div>
</div>
</td>
</tr>
</table>
</td>
</tr>

<?php
}
?>
<tr>
<td colspan="2">
<input type="submit" name="submit" value="Actualizar" class="btn btn-primary">
<input type="submit" name="submit" value="Cancelar"  class="btn btn-danger">
</td>
<tr>
</table>
</div>
</form>
<script language="javascript">
function cierra(){
window.close();

}
</script> 

</div>

</body>
</html>