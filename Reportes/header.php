 <!DOCTYPE html>
<html>
<style>

</style>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="js/menu.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="jumbotron">
  <div class="logo"><img src="img/logoIndustrial.png" width="320" height="180"></div>
  <h1><link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>Sistema de Reportes</h1>
  <h3><link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>Departamento de Industrial</h3>
</div>

<header>

<div class="menu_bar">
      <a href="#" class="bt-menu"><span class="icon-list2"></span>Menu</a>
</div>
 
    <nav>
      <ul>
        <!--Menu para todo usuarios-->
        <li><a href="index.php"><img src="iconos/inicio.png" width="17" height="17" border="0"/> Inicio</a></li>
        <li><a href="nuevo_usuario.php"><img src="iconos/nuevousuario.png" width="18" height="18"   border="0"/>  Nuevo Usuario</a></li>
        <!--Menu solo para administradores-->
        <li><a href="configuracion.php"><img src="iconos/configuracion.png" width="18" height="18" border="0"/>  Configuracion</a></li>
        <li><a href="reportes.php"><img src="iconos/nuevoreporte.png" width="18" height="18" alt="Prueba"  border="0"/>  Reportes</a></li>

        <!--Menu para usuarios normales-->
        <li><a href="#"><img src="iconos/nuevoreporte.png" width="18" height="18" alt="Prueba"  border="0"/>Nuevo Reporte</a></li>
        <li><a href="#"><img src="iconos/nuevoreporte.png" width="18" height="18" alt="Prueba" title="Prueba" border="0"/>Configuración personal</a></li>
        <!--Menu para todo usuarios-->
        <li><a href="logout.php"><img src="iconos/cerrarsesion.png" width="18" height="18" border="0"/>   Cerrar Sesion</a></li>
        <li><a href=""><img src="iconos/acerca.png" width="18" height="18" alt="Prueba"  border="0"> Acerca de</a></li>
      </ul>
    </nav>
</header>
