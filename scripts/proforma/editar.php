<?php
	$proforma_id = $_POST['id'];

	// Datos de los proyectos (detalle)
	$proyectos = $_POST['proyectos'];

	$con = mysqli_connect("localhost", "root", "", "gasa");

	// Eliminar detalles previos
	$consulta = "DELETE FROM Proforma_Proyectos WHERE proforma_id = $proforma_id";	
	mysqli_query($con, $consulta);

	// Registro de los detalles
	foreach($proyectos as $proyecto_id) {
		$consulta = "INSERT INTO Proforma_Proyectos (proforma_id, proyecto_id) VALUES ($proforma_id, $proyecto_id)";	
		mysqli_query($con, $consulta);
	}

	echo "1";
?>
