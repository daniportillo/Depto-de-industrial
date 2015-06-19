<?php 

//creamos la sesion
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location:index.php'); 
  exit();
  
}
 ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Ver noticias</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:300,400">
	<link rel="stylesheet" type="text/css" href="css/custom.css">


</head>
<body>

	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="menu">
      <ul class="nav navbar-nav"> 
        <li><a href="agregarnoticias.php">Agregar Noticia</a></li>
        <li><a href="vernoticias.php">Ver noticias</a></li>
        <li><a href="cerrarsesion.php">Cerrar Sesión</a></li>
      </ul>
    </div>
  </div>
</nav>
	<div class="container">
		<form method="post">
    <table class="table table-hover table-bordered table-striped">
       <thead>
      <tr>
        <th>Titulo</th>
        <th>Imagen</th>
        <th>Contenido</th>
        <th>Fecha</th>
        <th>
         <button id="submit" name="submit" class="btn btn-danger">Eliminar</button>
        <input name="update" value="Editar" onClick="setUpdateAction();" type="button" class="btn btn-primary">
      </th>
      </tr>
    </thead>
    <tbody>
          <?php

            include "conexion.php";
            header("Content-Type: text/html;charset=utf-8");
            mysqli_query($conn, "SET NAMES 'utf8'");
    
            $result = mysqli_query($conn, "SELECT id_noticias, imagen, titulo, DATE_FORMAT(fecha, '%d-%b-%Y') as fechanoticia, SUBSTRING(contenido, 1,100) as contenidoc FROM noticias ORDER BY fecha desc");

   $i=0;
  
    while($row = mysqli_fetch_array($result)) {
      $ruta = "imagenes/" . $row['imagen'];
      if($i%2==0)
        $classname="evenRow";
          else
        $classname="oddRow";
        ?>
        
        <tr class="<?php if(isset($classname)) echo $classname;?>"> 
         <td><?php echo $row['titulo']?></td> 
         <td><img  style="width:50px" src="<?php echo $ruta; ?>"></td> 
         <td><?php echo $row['contenidoc']?>...</td>
         <td><?php echo $row['fechanoticia']?></td>
         <td><input type="checkbox" name="noticias[]" value="<?php echo $row["id_noticias"]; ?>" ></td> 
         </td> 
         </tr>
         
      <?php 
    
    $i++;  
        }
        mysqli_close($conn);
     ?>
         <?php
    include "conexion.php";

    if (isset($_POST['submit'])) {
      //$user_id = $_POST['eliminar'];
    $ids = implode(',', $_POST['noticias']);
    $query="DELETE FROM noticias WHERE id_noticias in ($ids)";
    //$query="DELETE FROM usuarios WHERE user_id= '.$user_id'";
    //$query="DELETE FROM usuarios WHERE user_id in (".implode(",", $user_id.");";
    $resultado=$conn->query($query);
     echo "<script language=\"javascript\">
                  window.location.href=\"vernoticias.php\";
                  </script>";
  }
?>

    </table>
</form> 
	</div>

</body>
</html>