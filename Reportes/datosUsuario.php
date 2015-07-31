<?php 

$con=mysqli_connect("localhost", "root", "", "csti_db");

  
$validUser = mysqli_real_escape_string($con, $_SESSION['nombre']);
$sql= "select * from usuarios_industrial where name= '".$validUser."'";
$result=mysqli_query($con, $sql);

    while ($row=mysqli_fetch_array($result)) {
            $id=$row['user_id'];
            $tipo=$row['tipo'];
            $name=$row['name'];
            $user=$row['userName'];
            $password=$row['password'];
            $mail=$row['email'];

    }     
   
 ?>