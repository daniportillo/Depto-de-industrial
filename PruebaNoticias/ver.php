<?php
//conexion a la base de datos

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "csti_db";



    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
//si la variable imagen no ha sido definida nos dara un advertencia.
$id = $_GET['id'];

//vamos a crear nuestra consulta SQL
$consulta = "SELECT imagen FROM imagenes WHERE imagen_id =".$_GET['id'];
//con mysql_query la ejecutamos en nuestra base de datos indicada anteriormente
//de lo contrario mostraremos el error que ocaciono la consulta y detendremos la ejecucion.
$resultado= @mysqli_query($conn, $consulta) or die(mysqli_error());

//si el resultado fue exitoso
//obtendremos el dato que ha devuelto la base de datos
$datos = mysqli_fetch_assoc($resultado);
//ruta va a obtener un valor parecido a "imagenes/nombre_imagen.jpg" por ejemplo
$ruta = "imagenes/" . $datos['imagen'];

//ahora solamente debemos mostrar la imagen
echo "<img src='$ruta' />";

?>