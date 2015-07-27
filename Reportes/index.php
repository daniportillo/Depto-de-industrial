<?php 

	include "header.php";

	// reportes
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
	$result = "SELECT reporte_id, user_id, tipo, SUBSTRING(descripcion, 1,500) as descrip, estatus, fecha_inicio, fecha_mod FROM noticias ORDER BY fecha desc limit ".$inicio." , ".$registros." ";
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
	<!--imprime reportes-->
	




<?php
}	
	include "footer.php";

 ?>