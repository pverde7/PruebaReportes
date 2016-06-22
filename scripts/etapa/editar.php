<?php
	$idetapa = $_POST['txtCodigo'];
	$abreviatura = $_POST['txtAbreviatura'];
	$nombre = $_POST['txtNombre'];
	$costo = $_POST['txtCosto'];
	$proyecto = $_POST['cboProyecto'];

	$con = mysqli_connect("localhost", "root", "", "gasa");
	$consulta = "UPDATE Etapa 
				 SET abreviatura = '$abreviatura', nombre = '$nombre', costoEstimado = $costo, 
				     idproyecto = $proyecto 
				 WHERE idetapa = $idetapa";
	$resultSet = mysqli_query($con, $consulta);

	header('Location: ../../registrar-etapa.php');
?>