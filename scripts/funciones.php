<?php 

$conexion = null;

function abrirConexion()
{
	global $conexion;
	// Conexión con el servidor de base de datos MySQL
	$conexion = mysqli_connect('localhost', 'root', '', 'gasa');
	mysqli_set_charset($conexion, 'utf8');
}

function cerrarConexion($result='')
{
	if($result!='')
		mysqli_free_result($result); 

	// Cerrar conexión a la BD
	mysqli_close($GLOBALS['conexion']);
}

function sonDatosCorrectos($usuario, $password) 
{   
    abrirConexion();
    // Sentencia SQL para consultar el nombre del usuario
    $sql = "SELECT * FROM Usuario WHERE usuario='".$usuario."' AND password='".$password."'";
    $resultado = mysqli_query($GLOBALS['conexion'], $sql);

    // Si existe, inicia sesión y guarda info del usuario
    if( $fila = mysqli_fetch_row($resultado) )
    {   
        session_start();
        // Comenzamos a usar variables de sesión        
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nombres'] = $fila[3];
        $_SESSION['apellidos'] = $fila[4];      
        $_SESSION['email'] = $fila[5];      
        cerrarConexion($resultado);

        return true; // Indicamos que sí existe
    } 
    return false;  
}

// Para verificar que ya se ha iniciado sesión previamente
function haIniciadoSesion()
{
    // Continuar una sesión iniciada
    session_start();
    // Verificamos la existencia de la variable de sesión
    if( isset($_SESSION['usuario']) ) return true;
    return false;
}

function ejecutarQuery($query)
{
	global $conexion;
	abrirConexion();
	return mysqli_query($conexion, $query);
}



 ?>