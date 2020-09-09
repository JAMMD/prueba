<?php
include_once 'conexion.php';

$sql = 'SELECT * FROM datos';
$sentencia = $pdo->prepare($sql);
$sentencia -> execute();
$resultado = $sentencia->fetchAll();

//$mysqli = new mysqli('localhost', 'root' , '' , 'crud' ) or die(mysqli_error($mysqli));
//$result = $mysqli->query("SELECT * FROM datos") or die($mysqli->error);

// var _dump ($resultado);

$articulos_x_pagina = 3;
$total_articulos =$sentencia->rowCount();
$paginas = $total_articulos/3;
//echo ceil($paginas);
?>

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
	<?php //echo $articulo['titulo'] ?>
	<?php require_once 'process.php'; ?>
	<?php if (isset($_SESSION['message'])):?>
	<div class="alert-info alert-danger-<?=$_SESSION['msg_type']?>" >

			<?php 
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			?>
	</div>
	<?php endif ?>

	<div class="container" >

<!--
	<?php 

	$iniciar= ($_GET['pagina']-1)*$articulos_x_pagina;



		$mysqli = new mysqli('localhost', 'root' , '' , 'crud' ) or die(mysqli_error($mysqli));
		$result = $mysqli->query("SELECT * FROM datos LIMIT 1,3") or die($mysqli->error);
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
				while ($row = $result->fetch_assoc()): ?>
					<tr>
						<td><?php echo $row['NAME']; ?> </td>
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
		 -->

		 <?php 
		 if(!$_GET)
		 {
		 	header('Location:index.php?pagina=1');
		 }
		 if ($_GET['pagina']>$paginas || $_GET['pagina'] <= 0)
		  {
		  	header('Location:index.php?pagina=1');
		 }

		 $iniciar= ($_GET['pagina']-1)*$articulos_x_pagina; //numero de articulos que se muestren por pagina

		 $sql_articulos = 'SELECT * FROM datos LIMIT :iniciar,:narticulos'; // se le ponen limites de acuerdo al numero de articulos que quieres mostrar
		 																	//:iniciar y :narticulos son variables definidas, son parte de sentencias preparadas con bindParam
		 $sentencia_articulos = $pdo->prepare($sql_articulos);
		 $sentencia_articulos->bindParam(':iniciar', $iniciar, PDO::PARAM_INT); //funcion bindParam toma el valor de $iniciar y lo asigna a :iniciar en el query de arriba,
		 																		//PDO::PARAM_INT es un parametro que dice de que tipo es $iniciar, Los bindParam van antes de execute()
		 $sentencia_articulos->bindParam(':narticulos', $articulos_x_pagina, PDO::PARAM_INT);
		 $sentencia_articulos->execute();

		 $resultado_articulos = $sentencia_articulos->fetchAll();
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
		  <?php foreach($resultado_articulos as $articulo): ?>

		  <tr>
		  	<td><?php echo $articulo['NAME'] ?> </td>
		  	<td><?php echo $articulo['UBICACION'] ?> </td>
		  	<td>
		  		<a href="index.php?edit=<?php  echo $row['ID']; ?>"class="btn btn-info" >Editar</a>
		  		<a href="process.php?delete=<?php  echo $row['ID']; ?>" class="btn btn-danger"  >Eliminar</a>
		  	</td>
		  </tr>

		  <?php endforeach ?>
		  </table>
		</div>
		  

		 <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item
    <?php echo $_GET['pagina']<=1? 'disabled':'' ?>">
    	<a class="page-link" href="index.php?pagina=<?php echo''.$_GET['pagina']-1?>">Anterior</a>
    </li>
    <?php
    for ($i=0; $i < $paginas; $i++): ?>
    <li class="page-item 
    <?php echo $_GET['pagina']==$i+1 ? 'active' :  '' ?>"><a class="page-link" 
    	href="index.php?pagina=<?php echo $i+1;?>"><?php echo $i+1;?></a></li>
    <?php endfor ?>

    <li class="page-item
    <?php echo $_GET['pagina']>=$paginas? 'disabled':'' ?> "><a class="page-link"
     href="index.php?pagina=<?php echo''.$_GET['pagina']+1?>">Siguiente</a></li>
  </ul>
</nav>

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