<!DOCTYPE html>
<html>
<head>
	<title>Obtener Nodos de Factura</title>
	<h1 class="row justify-content-center">Lectura XML </h1>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" ></script>
</head>
<body>

	<div class="row justify-content-center">
		<form action="leer.php" method="post" enctype="multipart/form-data" >
			<div class="form-group" >
				<label for="file">Archivo:</label>
				<input class="btn btn-outline-danger" type="file" name="myfile" id="file"/><br>
				<br/>
				
				<div class="row justify-content-center">
				<input class="btn btn-primary" type="submit" name="submit" value="ENVIAR"/></div>
			</form>
			
		</div>
	</div>



</body>
</html>

