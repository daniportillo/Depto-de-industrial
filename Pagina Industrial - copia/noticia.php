<!DOCTYPE HTML>
<html>
<head>
	<title>Noticia</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:300,400">

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>

<div class="container">
<?php 
include "conexion.php";
	$id = $_GET['id'];
//consulta noticia con id
	$result= mysqli_query($conn, "SELECT * FROM noticias WHERE id_noticias =".$_GET['id']);
while ($row = mysqli_fetch_array($result)) {
	$ruta = "imagenes/" . $row['imagen'];//tomamos la ruta de la imagen de la noticia
?>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2 class="text-center"><?php echo $row['titulo']; ?></h2>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<img class="img-responsive" src="<?php echo $ruta; ?>">
		</div>
	</div>

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<p><?php echo $row['contenido'];?></p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<small>Publicado el: <?php echo $row['fecha'];?></small>
		</div>
	</div>
<?php 

}

 ?>

</div>




</body>
</html>