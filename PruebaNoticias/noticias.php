<!DOCTYPE HTML>
<html>
<head>
	<title>Agregar noticia</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:300,400">
	<link rel="stylesheet" type="text/css" href="css/custom.css">


</head>
<body>

	<div class="container">


		<form name="frmUser" method="post" action="">
<div class="container">
       
  <table class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th width="100px" heigth="10px" class="img-responsive">imagen</th>
        <th>Titulo</th>
        <th>contenido</th>
    
      </tr>
    </thead>
    <tbody>
<?php
//conexion a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "csti_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
//si la variable imagen no ha sido definida nos dara un advertencia.
$id = $_GET['id'];

//vamos a crear nuestra consulta SQL
$consulta = "SELECT imagen FROM imagenes WHERE imagen_id =".$_GET['id'];
//con mysql_query la ejecutamos en nuestra base de datos indicada anteriormente
//de lo contrario mostraremos el error que ocaciono la consulta y detendremos la ejecucion.
$resultado= @mysqli_query($conn, $consulta) or die(mysqli_error());

//si el resultado fue exitoso
//obtendremos el dato que ha devuelto la base de datos
$datos = mysqli_fetch_assoc($resultado);
//ruta va a obtener un valor parecido a "imagenes/nombre_imagen.jpg" por ejemplo
$ruta = "imagenes/" . $datos['imagen'];

//ahora solamente debemos mostrar la imagen
echo "<img src='$ruta' />";

    $result = mysqli_query($conn, "SELECT * FROM noticias");
   $i=0;
  
    while($row = mysqli_fetch_array($result)) {
      if($i%2==0)
        $classname="evenRow";
          else
        $classname="oddRow";
        ?>
        
        <tr class="<?php if(isset($classname)) echo $classname;?>"> 
         <td><?php echo $row['id_noticias']?></td> 
         <div class="col-md-4">
         		<?php echo "<img class='img-responsive' src='$ruta' />";?>
         </div>
         <td><?php echo $row['titulo']?></td>
         <td><?php echo $row['contenido']?></td>
        
         </td> 
         </tr>        
      <?php    
    $i++;
    
        }
?>

    </tbody>
  </table>
</form>
	
	</div>

</body>
</html>