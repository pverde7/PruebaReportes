<?php

	$abreviatura = $_POST['txtAbreviatura'];
	$nombre = $_POST['txtNombre'];
	$costo = $_POST['txtCosto'];
	$proyecto = $_POST['cboProyecto'];

	$con = mysqli_connect("localhost", "root", "", "gasa");
	$consulta = "INSERT Etapa (abreviatura, nombre, costoEstimado, idproyecto) VALUES ('$abreviatura', '$nombre', $costo, $proyecto)";
	$resultSet = mysqli_query($con, $consulta);

	header('Location: ../../registrar-etapa.php');
?>