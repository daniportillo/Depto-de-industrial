<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Departamento de Industrial</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">	
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
			      	<li ><a href="">Inicio</a></li>
			        <li ><a href="">Departamento</a></li>
			        <li><a href="noticias.php">Noticias</a></li>
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
header("Content-Type: text/html;charset=utf-8");
mysqli_query($conn, "SET NAMES 'utf8'");
	$registros=4;
	@$pagina = $_GET ['pagina'];

if (!isset($pagina))
{
$pagina = 1;
$inicio = 0;
}
else
{
$inicio = ($pagina-1) * $registros;
} 
	$result = "SELECT id_noticias, imagen, titulo, SUBSTRING(contenido, 1,500) as contenidoc FROM noticias ORDER BY fecha desc limit ".$inicio." , ".$registros." ";
	$cad = mysqli_query($conn,$result) or die ( 'error al listar, $pegar' .mysqli_error($conn)); 
	//calculamos las paginas a mostrar

$contar = "SELECT * FROM noticias";
$contarok = mysqli_query($conn, $contar);
$total_registros = mysqli_num_rows($contarok);
//$total_paginas = ($total_registros / $registros);
$total_paginas = ceil($total_registros / $registros); 


	while ($row = mysqli_fetch_array($cad)) {
		$ruta = "agregarnoticias/imagenes/" . $row['imagen'];
?>
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center"><a href="noticia.php?id=<?php echo $row['id_noticias'];?>"><?php echo $row['titulo'];?></a></h3>
		</div>
		<div class="col-md-10 col-md-offset-1">
			<div class="col-md-4 alpha">
				<img class="img-responsive" src="<?php echo $ruta; ?>">
			</div>
			<div class="col-md-8">
				<div class="box">
					<p class="text-justify"><?php echo $row['contenidoc']; ?>...</p>
				</div>
				<a class="pull-right" href="noticia.php?id=<?php echo $row['id_noticias'];?>">Ver noticia completa</a>
			</div>
		</div>
	</div>	
        
<?php		
	}
	
	//creando los enlaces de paginacion de resultados

echo "<center><p>";

if($total_registros>$registros){
if(($pagina - 1) > 0) {
echo "<span class='pactiva' ><a href='?pagina=".($pagina-1)."' style='color:blue'>&laquo; Anterior</a></span> ";
}
// Numero de paginas a mostrar
$num_paginas=10;
//limitando las paginas mostradas
$pagina_intervalo=ceil($num_paginas/2)-1;

// Calculamos desde que numero de pagina se mostrara
$pagina_desde=$pagina-$pagina_intervalo;
$pagina_hasta=$pagina+$pagina_intervalo;

// Verificar que pagina_desde sea negativo
if($pagina_desde<1){ // le sumamos la cantidad sobrante para mantener el numero de enlaces mostrados $pagina_hasta-=($pagina_desde-1); $pagina_desde=1; } // Verificar que pagina_hasta no sea mayor que paginas_totales if($pagina_hasta>$total_paginas){
$pagina_desde-=($pagina_hasta-$total_paginas);
$pagina_hasta=$total_paginas;
if($pagina_desde<1){
$pagina_desde=1;
}
}

for ($i=$pagina_desde; $i<=$pagina_hasta; $i++){
if ($pagina == $i){
echo "<span class='pnumero' style='color:black' >".$pagina."</span> ";
}else{
echo "<span class='active' ><a style='color:blue' href='?pagina=$i'>$i</a></span> ";
}
}

if(($pagina + 1)<=$total_paginas) {
echo " <span class='pactiva'><a style='color:blue' href='?pagina=".($pagina+1)."'>Siguiente &raquo;</a></span>";
}
}

echo "</p></center>";


?> 
 

 <br>
<footer class="text-center">CSTI</footer>
</div>
</body>
</html>