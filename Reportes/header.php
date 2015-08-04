<?php 
//creamos la sesion
session_start();
include "datosUsuario.php";
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresará a login.php
if(!isset($_SESSION['nombre'])) 
{
  header('Location:login.php'); 
  exit();
}
 ?>
<!DOCTYPE html>

<html>
<style>

</style>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="js/menu.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="jumbotron">
  <div class="logo"><img class="img-responsive"src="img/logoIndustrial.png" width="320" height="180"></div>
  <h1 class="sistema">Sistema de Reportes</h1>
  <h3><link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>Departamento de Industrial</h3>
</div>

<header>
 
    <nav class="navbar navbar-default">
      <div class="container-fluid">
          <div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
             </button>
           </div>
           <div class="collapse navbar-collapse" id="menu">
             <ul class="nav navbar-nav">
                <!--Menu para todo usuarios-->
               <li><a href="index.php"><span class="fa fa-home"> </span>   Inicio</a></li>
               <li><a href="mensajes.php"><span class="glyphicon glyphicon-envelope"></span> Mensajes</a> </li>
                 <!--Menu solo para administradores-->
                   <?php if ($_SESSION['tipo']=='administrador') {
                     echo " 
                       <li><a href='nuevo_usuario.php'><span class='fa fa-user-plus'></span>  Nuevo Usuario</a></li>
                       <li><a href='reportes.php'><span class='fa fa-file-text'></span>  Reportes</a></li>
                       <li><a href='configuracion.php'><span class='fa fa-cogs'></span> Configuracion</a></li>
                       ";
                   } ?>
        
                 <!--Menu para usuarios normales-->
                   <?php if ($_SESSION['tipo']=="usuario") {
                   echo "
                   <li><a href='nuevoreporte.php''><span class='fa fa-file-text'></span> Nuevo Reporte</a></li>
                   <li><a href='configuracion_personal.php''><span class='fa fa-cogs'></span> Configuración personal</a></li>";
                    } ?>
        
                 <!--Menu para todo usuarios-->
               <!--<li><a href=""><img src="iconos/acerca.png" width="18" height="18" border="0"> Acerca de</a></li>
             -->
             </ul>
             <ul class="nav navbar-nav navbar-right">
              <li> <a href=""> <span class="glyphicon glyphicon-user"></span><?php echo '  '.$name; ?></a></li>
               <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>   Cerrar Sesion</a></li>
            </ul>
          </div>
      </div>
    </nav>
</header>
