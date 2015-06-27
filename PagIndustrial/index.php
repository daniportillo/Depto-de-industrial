<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>Featured Content Slider</title>
	
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	
	<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
	<script type="text/javascript" src="js/jquery-easing-1.3.pack.js"></script>
	<script type="text/javascript" src="js/jquery-easing-compatibility.1.2.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:300,400">
	<script type="text/javascript" src="js/menuresponsive.js"></script>

	<script type="text/javascript" src="js/coda-slider.1.1.1.pack.js"></script>
	<script type="text/javascript" src="js/slider.js"></script>
	
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
			      	<li><a href="index.php">Inicio</a></li>
			        <li ><a href="departamento.php">Departamento</a></li>
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
                        <li><a href="industrial.php">Industrial y de Sistemas</a></li>
                        <li class="divider"></li>
                        <li><a href="sistemas.php">Sistemas de Informacion</a></li>
                        <li class="divider"></li>
                        <li><a href="mecatronica.php">Mecatronica</a></li>
			            </ul>
			        </li>
			        <li><a href="contacto.php">Contacto</a></li>
			      </ul>	     
			      </div>
			  </div>
			</nav>		
	


    <h1>Departamento de Industrial</h1>
	
	<div class="container">
	<div id="page-wrap">					
	<div class="slider-wrap">
		<div id="main-photo-slider" class="csw">
			<div class="panelContainer">

			<?php 
			include ('conexion.php');
			header("Content-Type: text/html;charset=utf-8");
			mysqli_query($conn, "SET NAMES 'utf8'");
                $result = mysqli_query($conn, "SELECT * FROM noticias ORDER BY fecha desc LIMIT 4");
                    while ($row = mysqli_fetch_array($result)) {
                     $ruta = "imagenes/" . $row['imagen'];
                      ?>								
				
				<div class="panel" title="<?php echo $row['id_noticias'];?>">
					<div class="wrapper">
						<img src="<?php echo $ruta; ?>" alt="scotch egg" class="floatLeft" style=""/>
						<h2><?php echo $row['titulo'];?></h2>
						<p><?php echo substr($row['contenido'],0,500) ;?>... </p> <a class="readmore" style="color:black;" href="noticia.php?id=<?php echo $row['id_noticias'];?>">Leer noticia completa </a>
					</div>
				</div>
				 <?php }?>
			</div>
		</div>

	<div class="movers-row">
		<?php
		$i =0;       
		$result = mysqli_query($conn, "SELECT * FROM noticias ORDER BY fecha desc LIMIT 4");
                    while ($row = mysqli_fetch_array($result)) {
                     $i =$i +1;
                      ?>			

			<div class="linea"><a href="#<?php echo $i;?>" class="cross-link" style="text-align:center;"><?php echo substr($row['titulo'],0,70); ?></a></div>
			
		<?php  } ?>		
	</div>

</div>
	
	</div>
<br><br>


	<div class="row">
  <div class="col-md-4">
    <h3>SIMPOSIO INTERNACIONAL DE INGENIERÍA, SISTEMAS Y TECNOLOGÍA</h3>
    <img class="logoaxis" src="img/logoaxis.png">
     		<p>Axis, es un magno evento organizado por estudiantes, para estudiantes, con la finalidad de brindar un espacio, en el que los 	participantes puedan ilustrarse de las nuevas tendencias en el área de tecnología e industria. Así mismo, hacer que los alumnos despierten el 	   interés de sus respectivas carreras...</p>

    <a class="pull-right" href="http://www.simposioaxis.com">Ver más</a>
   
  </div>
  <div class="col-md-4">
    <h3>CENTRO DE SERVICIOS DE TECNOLOGIA E INFORMACION</h3>
    <img  class="cstilogo" src="img/logocsti.png">
    <P>Centro de Servicio de Tecnologias de la Informacion.</P>
    
  </div>

  <div class="col-md-4">
    <h3>SISTEMA DE REPORTES</h3>
     <img src="img/logoreporte.png" class="logoreporte">
    <p> Aqui podra reportar las incidencias de las aulas</p>
  </div>
	</div>
   </div>

</body>
</html>

