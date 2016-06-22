<?php

	$proforma_id = $_GET['id'];

	$con = mysqli_connect("localhost", "root", "", "gasa");

	$consulta = "UPDATE Proformas SET activo=0 WHERE id = $proforma_id";
	mysqli_query($con, $consulta);
	
	header('Location: ../../listar-proformas.php');
?>
