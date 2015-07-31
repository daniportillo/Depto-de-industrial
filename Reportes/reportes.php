<?php 

	include "header.php";
  if ($_SESSION['tipo']!='administrador') {
    header('Location:index.php'); 
  exit();
  }
  ini_set("display_errors", false);
 ?>
<script language="javascript" src="js/reportes.js" type="text/javascript"></script>

<!--configuracion de usuarios-->
 <h1 text align="center";>Lista de Reportes</h1>
 
<!--Tabla de Usuarios-->
<form name="frmUser" method="post" action="pdf.php">
       
  <table class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
        <th>Tipo</th>
        <th>Ubicacion</th>
        <th>Descripcion</th>
        <th>Fecha de inicio</th>
        <th>Fecha de modificacion</th>
        <th>Estatus</th>
        <th><input class="btn btn-danger" name="eliminar" type="submit" value="Eliminar">
        <input name="update" value="Editar" onClick="setUpdateAction();" type="button" class="btn btn-primary">
        <input class="btn btn-danger"  name="pdf" type="submit" value="PDF" >
      </th>
      </tr>
    </thead>
    <tbody>
      <?php

    $conn = mysql_connect("localhost","root","");
    mysql_select_db("csti_db",$conn);
 
   $result = mysql_query("SELECT * FROM reportes_industrial");

   $i=0;
  
    while($row = mysql_fetch_array($result)) {
      
      if($i%2==0)
        $classname="evenRow";
          else
        $classname="oddRow";
        ?>
        
        <tr class="<?php if(isset($classname)) echo $classname;?>"> 
         <td><?php echo $row['tipo']?></td> 
         <td><?php echo $row['ubicacion']?></td> 
         <td><?php echo $row['descrip']?></td> 
         <td><?php echo $row['fecha_inicio']?></td>
         <td><?php echo $row['fecha_mod']?></td>
         <td><?php echo $row['estatus']?></td>
         <td><input type="checkbox" name="reportes[]" value="<?php echo $row["reporte_id"]; ?>" ></td> 
         </td> 
         </tr>
         
      <?php     
    $i++;    
        }
  		include('eliminar_reportes.php');   
    
		?>
    </tbody>
  </table>
</form>
</body>




<?php 
	include "footer.php";

 ?>