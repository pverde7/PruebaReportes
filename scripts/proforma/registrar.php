<?php

	// Datos de la proforma (cabecera)
	$cliente_id = $_POST['cliente_id'];
	$fecha = $_POST['fecha'];

	// Datos de los proyectos (detalle)
	$proyectos = $_POST['proyectos'];

	$con = mysqli_connect("localhost", "root", "", "gasa");

	// Registro de la cabecera
	$consulta = "INSERT INTO Proformas (cliente_id, fecha) VALUES ($cliente_id, '$fecha')";
	mysqli_query($con, $consulta);
	
	$proforma_id = mysqli_insert_id($con);

	// Registro de los detalles
	foreach($proyectos as $proyecto_id) {
		$consulta = "INSERT INTO Proforma_Proyectos (proforma_id, proyecto_id) VALUES ($proforma_id, $proyecto_id)";	
		mysqli_query($con, $consulta);
	}

	echo "1";
?>
