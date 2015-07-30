<?php

include('header.php');
ini_set("display_errors", false);

$conn = mysql_connect("localhost","root","");
mysql_select_db("csti_db",$conn);


if(isset($_POST["submit"]) && $_POST["submit"]!="") {
$usersCount = count($_POST["tipo"]);
for($i=0;$i<$usersCount;$i++) {

mysql_query("UPDATE reportes_industrial set tipo='" . $_POST["tipo"][$i] . "', ubicacion='" . $_POST["ubicacion"][$i] . "', descrip='" . $_POST["descrip"][$i] . "', estatus='" . $_POST["estatus"][$i] .  "', fecha_inicio='" . $_POST["fecha_inicio"][$i] .  "', fecha_mod='" . $_POST["fecha_mod"][$i] .  "'  WHERE reporte_id='" . $_POST["reporte_id"][$i] . "'");

}
header("Location:reportes.php");
}  
?>
<form name="frmUser" method="post" action="">


<h1 text align="center";>Modificacion de Reportes</h1>

<table class="table table-hover table-bordered table-striped"  align="center">
<tr>
<td><h4>Datos del reporte(s)</h4></td>
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
<td><label>Tipo</label></td>
<td><input type="text" style="WIDTH: 228px;" name="tipo[]" class="txtField" value="<?php echo $row[$i]['tipo']; ?>"></td>
</tr>
<tr>
<td><label>Ubicacion</label></td>
<td><input type="text" name="ubicacion[]" class="txtField" value="<?php echo $row[$i]['ubicacion']; ?>"></td>
</tr>
<td><label>Descripcion</label></td>
<td><input type="textarea" style="WIDTH: 228px; HEIGHT: 98px" name="descrip[]" value="<?php echo $row[$i]['descrip']; ?>"></td>
<tr>
<td><label>Fecha de Inicio</label></td>
<td><input type="date" name="fecha_inicio[]" class="txtField" value="<?php echo $row[$i]['fecha_inicio']; ?>"></td>
</tr>
<tr>
<td><label>Fecha de Modificacion</label></td>
<td><input type="date" name="fecha_mod[]" class="txtField" value="<?php echo $row[$i]['fecha_mod']; ?>"></td>
</tr>
<tr> 
<td><label>Estatus</label></td>
<td>
<select  name="estatus[]">
      <option selected><?php echo $row[$i]['estatus']; ?></option></option>
      <option value="Iniciado">Iniciado</option>
      <option value="En proceso">En proceso</option>
      <option value="Finalizado">Finalizado</option>
    </select>
<input type="hidden" name="reporte_id[]" class="txtField" value="<?php echo $row[$i]['reporte_id']; ?>">
</td>
</tr>
<tr><td></td></tr>
</table>
</td>
</tr>

<?php
}
?>
<tr><td colspan="2"><input type="submit" name="submit" value="Actualizar" class="btn btn-primary"></td><tr>
</table>
</div>
</form>


</div>

</body>
</html>