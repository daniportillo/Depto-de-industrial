<!DOCTYPE HTML>
<html>
<head>
	<title>Agregar noticia</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:300,400">
	<link rel="stylesheet" type="text/css" href="css/custom.css">


</head>
<body>

	<div class="container">


		<!-- Formulario -->
		<form enctype="multipart/form-data" action="subir.php" method="post" name="agregarnoticia" class="form-horizontal">
			<!--Titulo-->
			<div class="form-group">
				<label class="col-md-3 control-label">Titulo:</label>
				<div class="col-md-5">
					<input type="text" class="form-control input-md" id="txttitulo" name="titulo" placeholder="Escriba título" maxlength="200" required="">
				</div>
			<!--Imagen-->
			</div>
			<div class="form-group">
				<label for="imagen" class="col-md-3 control-label">Imagen:</label>
				<div class="col-md-5">
					<input type="file" name="imagen" id="imagen" class="input-file"  required="">
				</div>
			</div>
			<!--Contenido-->
			<div class="form-group">
				<label class="col-md-3 control-label" for="contenido">Contenido:</label>
				<div class="col-md-6">
					<textarea name="contenido" id="contenido" class="form-control" rows="20"  required="" maxlength="8000" ></textarea>
				</div>
			</div>
			<!--Boton de agregar-->
			<div class="form-group">
				<label class="col-md-3 control-label"></label>
				<div class="col-md-5">
					<button type="submit" name="subir" value="subir" class="btn btn-primary">Añadir noticia</button>
				</div> 	
			</div>

		</form>

	
	</div>

</body>
</html>