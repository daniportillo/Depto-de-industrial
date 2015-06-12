<?php
//conexion a la base de datos
   $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "csti_db";
    // crea conexion
    $conn = new mysqli($servername, $username, $password, $dbname);
    // verifica conexion
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }

//consulta 
//$consulta = "SELECT imagen FROM imagenes";
//con mysql_query la ejecutamos en nuestra base de datos indicada anteriormente
//de lo contrario mostraremos el error que ocaciono la consulta y detendremos la ejecucion.
$resultado= @mysqli_query($conn, $consulta) or die(mysqli_error());

//si el resultado fue exitoso
//obtendremos los datos que ha devuelto la base de datos
//y con un ciclo recorreremos todos los resultados
while ($datos = @mysqli_fetch_assoc($resultado) ){
	//ruta va a obtener un valor parecido a "imagenes/nombre_imagen.jpg" por ejemplo
	$ruta = "imagenes/" . $datos['imagen'];

	//ahora solamente debemos mostrar la imagen
	echo "<img src='$ruta' />";
}

?>