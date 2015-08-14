<?php

  include('conexion.php');
    
    if (isset($_POST['btnProceso'])) {
   		 $ids = implode(',', $_POST['reports']);
  	     $query="UPDATE reportes_industrial SET estatus='En proceso',fecha_mod= CURRENT_TIMESTAMP WHERE reporte_id in ($ids)";    
   		 $resultado=$conn->query($query);  
   		  echo "<script language=\"javascript\">
                  window.location.href=\"index.php\";
                  </script>";
  	}

  	if (isset($_POST['btnFinalizado'])) {
   		 $ids = implode(',', $_POST['reports']);
  	     $query="UPDATE reportes_industrial SET estatus='Finalizado',fecha_mod= CURRENT_TIMESTAMP WHERE reporte_id in ($ids)";    
   		 $resultado=$conn->query($query);  
   		  echo "<script language=\"javascript\">
                  window.location.href=\"index.php\";
                  </script>";
  	}

 
?>