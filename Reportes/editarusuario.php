<?php

include('header.php');
ini_set("display_errors", false);

$conn = mysql_connect("localhost","root","");
mysql_select_db("csti_db",$conn);


if(isset($_POST["submit"]) && $_POST["submit"]!="") {
$usersCount = count($_POST["name"]);
for($i=0;$i<$usersCount;$i++) {
mysql_query("UPDATE usuarios_industrial set name='" . $_POST["name"][$i] . "', userName='" . $_POST["userName"][$i] . "', tipo='" . $_POST["tipo"][$i] . "', password='" . $_POST["password"][$i] .  "' WHERE user_id='" . $_POST["user_id"][$i] . "'");
}
header("Location:configuracion.php");
}  
?>
<form name="frmUser" method="post" action="">


<h1>Modificacion de datos</h1>

<table class="table table-hover table-bordered table-striped"  align="center">
<tr>
<td><h4>Datos del usuario(s)</h4></td>
</tr>

<?php

$rowCount = count($_POST["users"]);

for($i=0;$i<$rowCount;$i++) {
$result = mysql_query("SELECT * FROM usuarios_industrial WHERE user_id='" . $_POST["users"][$i] . "'");
$row[$i]= mysql_fetch_array($result);
?>
<tr>
<td>
<table class="table table-striped">
<tr>
<td><label>Nombre</label></td>
<td><input type="text" name="name[]" class="txtField" value="<?php echo $row[$i]['name']; ?>"></td>
</tr>
<tr>
<td><label>Password</label></td>
<td><input type="password" name="password[]" class="txtField" value="<?php echo $row[$i]['password']; ?>"></td>
</tr>
<td><label>Tipo</label></td>
<td>
<select  name="tipo[]">
      <option selected><?php echo $row[$i]['tipo']; ?></option></option>
      <option value="usuario">usuario</option>
      <option value="administrador">administrador</option>
    </select>

</td>
<tr>
<td><label>Nombre de Usuario</label></td>
<td><input type="text" name="userName[]" class="txtField" value="<?php echo $row[$i]['userName']; ?>"><input type="hidden" name="user_id[]" class="txtField" value="<?php echo $row[$i]['user_id']; ?>"></td>
<tr><td></td></tr>
</table>
</td>
</tr>

<?php
}
?>
<td colspan="2"><input type="submit" name="submit" value="Actualizar" class="btn btn-primary"></td>

</table>
</div>
</form>


</div>

</body>
</html>