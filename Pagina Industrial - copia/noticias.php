<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Departamento de Industrial</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">	
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
 	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:300,400">

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/menuresponsive.js"></script>
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
			      	<li ><a href="">Inicio</a></li>
			        <li ><a href="">Departamento</a></li>
			        <li><a href="">Noticias</a></li>
			        <li class="dropdown">
			          <a href="" class="dropdown-toggle">Oferta Educativa <b class="caret"></b></a>
			          <ul class="dropdown-menu">
			           <li><a href="#">Maestria en Ingenieria Sistemas y Tecnologia</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Maestria en Sustentabilidad</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Especialidad en Desarrollo Sutentables</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Industrial y de Sistemas</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Sistemas de Informacion</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Mecatronica</a></li>
			            </ul>
			        </li>
			        <li><a href="">Contacto</a></li>
			      </ul>	     
			      </div>
			  </div>
			</nav>		
	


    <h1>Noticias</h1>

<?php 
include "conexion.php";
	$result = mysqli_query($conn, "SELECT * FROM noticias");
	while ($row = mysqli_fetch_array($result)) {
		$ruta = "imagenes/" . $row['imagen'];
?>
	<div class="row">
		<div class="col-md-12">
			<h2 class="text-center"><a href="noticia.php?id=<?php echo $row['id_noticias'];?>"><?php echo $row['titulo'];?></a></h2>
		</div>
		<div class="col-md-10 col-md-offset-1">
			<div class="col-md-4 alpha">
				<img class="img-responsive" src="<?php echo $ruta; ?>">
			</div>
			<div class="col-md-6">
				<div class="box">
					<p><?php echo $row['contenido']; ?></p>
				</div>
				<a class="pull-right" href="noticia.php?id=<?php echo $row['id_noticias'];?>">Ver noticia completa</a>
			</div>
		</div>
	</div>
        
<?php		
	}
	
 ?>

</div>
</body>
</html>