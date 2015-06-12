<?php
//conexion a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "csti_db";

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
mysqli_set_charset($conn, 'utf8');
//comprobamos si ha ocurrido un error.
if ($_FILES["imagen"]["error"] > 0){
	echo "ha ocurrido un error";
} else {
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 100kb
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 7000;

	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$ruta = "imagenes/" . $_FILES['imagen']['name'];
		//comprobamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		if (!file_exists($ruta)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
			if ($resultado){
				$nombre = $_FILES['imagen']['name'];
				$titulo= $_POST['titulo'];
				$contenido = $_POST['contenido'];
				//@mysqli_query($conn, "INSERT INTO imagenes (imagen) VALUES ('$nombre')") ;
				@mysqli_query($conn, "INSERT INTO noticias (imagen, titulo, contenido) VALUES ('$nombre', '$titulo', '$contenido')");
				echo "el archivo ha sido movido exitosamente";

			} else {
				echo "Ocurrio un error al mover el archivo.";
			}
		} else {
			echo $_FILES['imagen']['name'] . ", este archivo existe";
		}
	} else {
		echo "Archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
	}
}

?>