<?php
	$id = $_GET['id'];

	$con = mysqli_connect("localhost", "root", "", "gasa");
	$consulta = "DELETE FROM Contrato WHERE id = $id";
	$resultSet = mysqli_query($con, $consulta);

	header('Location: ../../registrar-contrato.php');
?>