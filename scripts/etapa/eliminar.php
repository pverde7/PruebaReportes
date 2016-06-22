<?php

	$idetapa = $_GET['id'];


	$con = mysqli_connect("localhost", "root", "", "gasa");
	$consulta = "DELETE FROM Etapa WHERE idetapa = $idetapa";
	$resultSet = mysqli_query($con, $consulta);

	header('Location: ../../registrar-etapa.php');
?>