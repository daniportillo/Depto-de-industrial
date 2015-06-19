<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Departamento de Industrial</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">	
	<link rel="stylesheet" type="text/css" href="css/custom.css">	
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:300,400">
	<script type="text/javascript" src="js/menuresponsive.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


</head>
<body>
	<div class="container">
		<center><img class="img-responsive" src="img/bannerIndustrial.jpg"></center>
			
			<nav class="navbar">
			  <div class="container-fluid">			    
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">			        
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>			   
			   </div>
			    <div class="collapse navbar-collapse" id="menu">
			      <ul class="navbar-nav">
			      	<li><a href="index.html">Inicio</a></li>
			        <li ><a href="departamento.html">Departamento</a></li>
			        <li><a href="noticias.php">Noticias</a></li>
			        <li class="dropdown">
			          <a class="dropdown-toggle" data-toggle="dropdown" >Oferta Educativa <b class="caret"></b></a>
			          <ul class="dropdown-menu">
			           <li><a href="http://mii.isi.uson.mx/">Maestria en Ingenieria Sistemas y Tecnologia</a></li>
                        <li class="divider"></li>
                        <li><a href="http://www.gds.uson.mx/ms/">Maestria en Sustentabilidad</a></li>
                        <li class="divider"></li>
                        <li><a href="http://www.gds.uson.mx/eds/">Especialidad en Desarrollo Sutentables</a></li>
                        <li class="divider"></li>
                        <li><a href="industrial.html">Industrial y de Sistemas</a></li>
                        <li class="divider"></li>
                        <li><a href="sistemas.html">Sistemas de Informacion</a></li>
                        <li class="divider"></li>
                        <li><a href="mecatronica.html">Mecatronica</a></li>
			            </ul>
			        </li>
			        <li><a href="contacto.php">Contacto</a></li>
			      </ul>	     
			      </div>
			  </div>
			</nav>		
	<?php 
include "conexion.php";
header("Content-Type: text/html;charset=utf-8");
mysqli_query($conn, "SET NAMES 'utf8'");
	$id = $_GET['id'];
//consulta noticia con id
	$result= mysqli_query($conn, "SELECT *, DATE_FORMAT(fecha, '%d-%b-%Y') as fechanoticia FROM noticias WHERE id_noticias =".$_GET['id']);
while ($row = mysqli_fetch_array($result)) {
	$ruta = "agregarnoticias/imagenes/" . $row['imagen'];//tomamos la ruta de la imagen de la noticia
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
			<p class="text-justify"><?php echo nl2br($row['contenido']);?></p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<small class="pull-right">Publicado el: <?php echo $row['fechanoticia'];?></small>
		</div>
	</div>
<?php 

}

 ?>


 
 <br>
    <footer class="text-center footer">
        <div class="row text-center">
            <div class="col-md-6 col-md-offset-3">
                <br>
                <!--<img class="logocsti" src="img/logocsti.png"> -->
                Centro de Servicios de Tecnologias de la Información
                <p>Edificio 5G-204, Universidad de Sonora</p>
            </div>  
        </div>
    </footer>
</div>
</body>
</html>