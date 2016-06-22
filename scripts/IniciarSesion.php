<?php
include ('funciones.php');

// Pasados por formulario:
$usuario = $_POST['txtUsuario'];
$password = md5($_POST['txtPassword']);

// Usamos las funciones de funciones.php
if( sonDatosCorrectos($usuario, $password) )
{
	// Accedemos a panel.php si es usuario	
	header('Location: ../Principal.php');	
} else {
	// Si no, volvemos al formulario inicial
?>
	<script>
	alert('Los datos ingresados son incorrectos.')
	location.href = "../index.php";
	</script>
<?php
}
?>