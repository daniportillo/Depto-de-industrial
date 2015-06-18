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
	//y que el tamano del archivo no exceda los 7000kb
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 7000;

	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		$ruta = "imagenes/" . $_FILES['imagen']['name'];
		//comprobamos si este archivo existe para no volverlo a copiar.
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

				echo'<script type="text/javascript">
                alert("Se ha agregado la noticia exitosamente.");
                windows.Location.href=agregarnoticias.php;
                </script>';
				//header("Location:agregarnoticias.php");

			} else {
				echo'<script type="text/javascript">
                alert("Ocurrio un error al mover la imagen.");
                </script>';
				//echo "Ocurrio un error al mover el archivo.";
				header("Location:agregarnoticias.php");
			}
		} else {
			echo'<script type="text/javascript">
                alert("Esta imagen ya existe.");
                </script>';
			//echo $_FILES['imagen']['name'] . ", este archivo existe";
                header("Location:agregarnoticias.php");
		}
	} else {
			echo'<script type="text/javascript">
                alert("Archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes.");
                windows.Location.href=agregarnoticias.php;
                </script>';
                
		//echo "Archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
	}
}

?>