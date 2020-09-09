<!-- Prueba para Vacante Skull Mexico
	Programa CRUD (create, Read , Update , Delete) -->
<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" ></script>
</head>
<body>
	<?php require_once 'process.php'; ?>
	<?php if (isset($_SESSION['message'])):?>
	<div class="alert-info alert-danger-<?=$_SESSION['msg_type']?>" >

			<?php 
				echo $_SESSION['message']; //session es un array para guardar informacion
				unset($_SESSION['message']); //destruye el evento
			?>
	</div>
	<?php endif ?> <!-- cierre de sentencia -->

	<div class="container" >

	<?php 
		$mysqli = new mysqli('localhost', 'root' , '' , 'crud' ) or die(mysqli_error($mysqli));//conexion BD
		$result = $mysqli->query("SELECT * FROM datos") or die($mysqli->error);
		/*pre_r($result);
		pre_r($result->fetch_assoc());
		pre_r($result->fetch_assoc());confirmar campos*/


		?>
		<div class="row justify-content-center" >
				<table class="table" >
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Ubicacion</th>
							<th colspan="2" >Accion</th>
						</tr>
					</thead>
			<?php
				while ($row = $result->fetch_assoc()): ?> <!-- array asociativo -->
					<tr>
						<td><?php echo $row['NAME']; ?> </td> <!-- se obtiene fila -->
						<td><?php echo $row['UBICACION']; ?> </td>
						<td>

							<a href="index.php?edit=<?php  echo $row['ID']; ?>"
								class="btn btn-info" >Editar</a>

							<a href="process.php?delete=<?php  echo $row['ID']; ?>"
								class="btn btn-danger"  >Eliminar</a>
						</td>

					</tr>
				<?php endwhile; ?>
				</table>
			</div>
		 	<?php 
				function pre_r( $array ){
					echo '</pre>';
					print_r($array);
					echo '</pre>';
			}
		 ?>

	<div class="row justify-content-center">
		<form action="process.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $ID ?>">
			<div class="form-group" >
			<label>Nombre</label>
			<input type="text" name="name" class="form-control"
					value="<?php  echo $name; ?>" placeholder="Introduce Nombre">
			</div>
			<div class="form-group">
			<label>Ubicacion</label>
			<input type="text" name="location"  class="form-control" 
					value="<?php echo $location ?>" placeholder="Introduce Ubicacion ">
			</div>

			
			<div class="form-group">
			<?php 
			if ($update == true):
			?>

			<button type="submit" class="btn btn-info"  name="update">Actualizar</button>

			<?php else: ?>

			<button type="submit" class="btn btn-primary"  name="save">Guardar</button>	

			<?php endif; ?>	
			</div>
		</form>
	</div>
	</div>

	
</body>


</html>