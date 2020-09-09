<?php 
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

$ID = 0;
$update = false;
$name = '';
$location= '';

if (isset($_POST['save'])){
	$name = $_POST['name'];
	$location = $_POST['location'];
	$mysqli->query("INSERT INTO datos (name, UBICACION ) VALUES ('$name', '$location')") or
		die($mysqli->error);
	$_SESSION['message'] = "Registro Guardado";
	$_SESSION['msg_type'] = "success";
		
	header("Location:  index.php");
}

if (isset($_GET['delete'])){
	$ID = $_GET['delete'];
	$mysqli->query("DELETE FROM datos WHERE ID=$ID") or die($mysqli->error());
	$_SESSION['message'] = "Registro Eliminado";
	$_SESSION['msg_type'] = "danger";
	header("Location:  index.php");
	
}

if (isset($_GET['edit'])){
	$ID = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM datos WHERE ID=$ID") or die($mysqli->error());
	if (!is_null($result)){
		$row = $result->fetch_array();
		$name = $row['NAME'];
		$location = $row['UBICACION'];

		}

	}

	if (isset($_POST['update'])){
		$id =$_POST['id'];
		$name = $_POST['name'];
		$location = $_POST['location'];
		$mysqli->query("UPDATE datos SET NAME='$name' , UBICACION='$location' WHERE ID='$id'")or die($mysqli->error);
		$_SESSION['message'] = "Actualizado";
		$_SESSION['msg_type'] = "Warning";

		header("Location: index.php");
	}









