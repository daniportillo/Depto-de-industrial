<?php 

  include "header.php";
  // reportes
  include "conexion.php";
  
  header("Content-Type: text/html;charset=utf-8");
   ini_set("display_errors", false);
?>
   <script type="text/javascript">
        window.onload =function(){
          select();
        }
        function  select(){
          $("#tipoSelect").val("<?php echo $tipoReporte; ?>");

        }
        function cancelar(){
          window.location.href="index.php";
        }
        function actualizar(){
          window.location.reload();
        }
  </script>
  <h3 class="text-center">Listado de reportes</h3>
  <script language="javascript" src="js/reportes.js" type="text/javascript"></script>
  <br>
  

  <form name="frmUser" method="post" action="pdf.php" >
       
  <table class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
        <th>Informacion del Reporte</th>
        <th><input class="btn btn-danger" name="eliminar" type="submit" value="Eliminar" >
           <input name="update" value="Editar" onClick="setUpdateAction();" type="button" class="btn btn-primary">
        <input class="btn btn-danger"  name="pdf" type="submit" value="PDF" onclick="this.form.action='pdf.php';this.form.target='_blank';this.form.submit();parent.window.location.reload();">
        </th>
      </tr>
    </thead>
    <tbody>
      
<?php
//onclick="window.open('timeclock/index.php', '_blank';location.reload();"
  //Muestra de reportes para usuarios administradores
if ($_SESSION['tipo']=='administrador') {
  
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
  $result = "SELECT r.reporte_id, u.name as solicitante, r.tipo, r.ubicacion, r.fecha_mod,r.fecha_inicio, r.estatus, SUBSTRING(r.descrip, 1,80) as descripcion 
  FROM reportes_industrial r, usuarios_industrial u 
  WHERE r.user_id=u.user_id
  ORDER BY r.fecha_inicio desc limit ".$inicio." , ".$registros." ";
  $cad = mysqli_query($conn,$result) or die ( 'error al listar, $pegar' .mysqli_error($conn)); 
  //calculamos las paginas a mostrar

$contar = "SELECT * FROM reportes_industrial";
$contarok = mysqli_query($conn, $contar);
$total_registros = mysqli_num_rows($contarok);
//$total_paginas = ($total_registros / $registros);
$total_paginas = ceil($total_registros / $registros); 


  while ($row = mysqli_fetch_array($cad)) {
?>
 <tr> 
   <td><b><p><a href="verReportes.php?id=<?php echo $row['reporte_id'];?>"><?php echo utf8_decode($row['solicitante']) ?></p></b> </td>
  <td><b><a href="verReportes.php?id=<?php echo $row['reporte_id'];?>"><?php echo substr(utf8_decode($row['tipo']), 0,30) ?></b></td>
  <td><b><a href="verReportes.php?id=<?php echo $row['reporte_id'];?>"><p><?php echo substr(utf8_decode($row['descripcion']), 0,20) ?>...</p></b> </td>
  <td><b><p><?php echo $row['fecha_inicio']; ?></p></b></td>
  <td><b><p><?php echo $row['fecha_mod']; ?></p></b></td>
  <td><input type="checkbox" name="reportes[]" value="<?php echo $row["reporte_id"]; ?>" ></td> 
  </tr>    
        
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

}//fin if admin

include "eliminar_reportes.php";
    ?>
  </tbody>
  </table>
</form>
</body>

  <?php 


  include "footer.php";
  ?>

