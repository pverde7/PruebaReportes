<?php

	$username = 'eu-cdbr-azure-west-d.cloudapp.net';
	$password = 'e694312a';
	$server = 'b4318bee120834'; 
	$database = 'tabla';

	$info = [ 'Database'=>$database, 'UID'=>$username, 'PWD'=>$password, 'CharacterSet' => 'UTF-8' ]; 
	$conexion = sqlsrv_connect($server, $info);  

	if (! $conexion)
		die( print_r(sqlsrv_errors(), true) );	

 	function resultSetToJson($name, $result_set)
    {
    	// Arreglo general, de todas las filas
		$registros = [];
		
		// Convertir cada fila en arreglo asociativo
		while( $row = sqlsrv_fetch_object($result_set) )
		{
			// Arreglo que representa a 1 fila
			$arreglo = [];

			foreach($row as $key => $value) {
		        // $key es el column name, y $value el valor de $row[$key]
		        $arreglo[utf8_encode($key)] = $value;
		    }
		    
		    // Añadimos este arreglo al conjunto de registros
			$registros[] = $arreglo;
		}

		$data['exito'] = true;
		$data[$name] = $registros;
		return json_encode($data);
    }	
