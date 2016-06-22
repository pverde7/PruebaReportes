<?php
	require 'funciones.php';
	
	// Variables recibidas por POST

	$usuario   = $_POST['usuario'];
	$password  = md5($_POST['password']);	
	$nombres   = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];	
	$email     = $_POST['email'];
	
	
	$rpta = ejecutarQuery("INSERT Usuario VALUES('".$usuario."', '".$password."', '".$nombres."',
					'".$apellidos."', '".$email."')");	

?>
<script>
	alert("Usuario registrado satisfactoriamente.");
	location.href = "../index.php";
</script>