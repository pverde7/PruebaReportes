<?php
	$id = $_POST['txtCodigo'];


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
	$consulta = "UPDATE Contrato 
				 SET codigo= $codigo, idproyecto = $idproyecto, departamento = '$departamento',
				     cochera1 =  '$cochera1', cochera2 = '$cochera2', moneda = '$moneda', 
				     anios = '$anios', cuotas = $cuotas, total = $total, inicial = $inicial 
				 WHERE id = $id";
	$resultSet = mysqli_query($con, $consulta);

	header('Location: ../../registrar-contrato.php');
?>