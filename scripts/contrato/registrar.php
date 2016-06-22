<?php

	$codigo = $_POST['cboCliente']; //
	$idproyecto = $_POST['cboProyecto']; //
	$departamento = $_POST['txtDepartamento']; //
	$cochera1 = $_POST['txtCochera1'];
	$cochera2 = $_POST['txtCochera2'];
	$moneda = $_POST['cboMoneda'];
	$anios = $_POST['txtAnios']; //
	$cuotas = $_POST['txtCuotas']; //
	$total = $_POST['txtTotal']; //
	$inicial = $_POST['txtInicial'];

		

	$con = mysqli_connect("localhost", "root", "", "gasa");
	$consulta = "INSERT Contrato VALUES (NULL, $codigo, $idproyecto, $departamento, $cochera1, $cochera2, '$moneda', $anios, $cuotas, $total, $inicial)";
	$resultSet = mysqli_query($con, $consulta);
	header('Location: ../../registrar-contrato.php');
?>