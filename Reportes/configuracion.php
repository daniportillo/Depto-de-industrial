<?php 

	include "header.php";
ini_set("display_errors", false);

//creamos la sesion
session_start();

//validamos si se ha hecho o no el inicio de sesion correctamente

//si no se ha hecho la sesion nos regresará a login.php
if(!isset($_SESSION['nombre'])|| $_SESSION['tipo']!='administrador') 
{
  header('Location:index.php'); 
  exit();
}
$tipo = $_SESSION['nombre'];
?>
<script language="javascript" src="js/users.js" type="text/javascript"></script>

<!--configuracion de usuarios-->
 <h1 text align="center";>Lista de usuarios registrados</h1>
 
<!--Tabla de Usuarios-->
<form name="frmUser" method="post" action="">
       
  <table class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Usuario</th>
        <th>Tipo</th>
        <th>Password</th>
        <th><input class="btn btn-danger" name="eliminar" type="submit" value="Eliminar">
        <input name="update" value="Editar" onClick="setUpdateAction();" type="button" class="btn btn-primary">
      </th>
      </tr>
    </thead>
    <tbody>
      <?php

    $conn = mysql_connect("localhost","root","");
    mysql_select_db("csti_db",$conn);
    
   $result = mysql_query("SELECT * FROM usuarios_industrial WHERE NOT (name='$_SESSION[nombre]')");
   $i=0;
  
    while($row = mysql_fetch_array($result)) {
      if($i%2==0)
        $classname="evenRow";
          else
        $classname="oddRow";
        ?>
        
        <tr class="<?php if(isset($classname)) echo $classname;?>"> 
         <td><?php echo $row['name']?></td> 
         <td><?php echo $row['userName']?></td> 
         <td><?php echo $row['tipo']?></td>
         <td><?php echo $row['password']?></td>
         <td><input type="checkbox" name="users[]" value="<?php echo $row["user_id"]; ?>" ></td> 
         </td> 
         </tr>
         
      <?php     
    $i++;    
        }
  		include('eliminar.php');   
    
		?>
    </tbody>
  </table>
</form>
</body>

<?php
	include "footer.php";
 ?>