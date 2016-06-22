<?php
/*
	Este WS nos permite registrar un movimiento
	usando SP_InsertarMovimiento.
*/
	require 'conexion.php';
	//header('Content-Type: application/json');

	$sql_SP = "{ CALL _InsertaMovimiento_G2(?, ?, ?, ?, NULL, 1) }";
/*
   200,
   'CTA1',
   600,
   'RE',
   1
*/
   	if ( !isset($_GET['movimiento']) || !isset($_GET['cuenta'])
   		|| !isset($_GET['importe']) || !isset($_GET['operacion']) ) {
   		$data['exito'] = false;
   		die( json_encode($data) );
   	}

	$movimiento = $_GET['movimiento'];
	$cuenta = $_GET['cuenta'];
	$importe = $_GET['importe'];
	$operacion = $_GET['operacion'];

	$params = [
		$movimiento,
		$cuenta,
		$importe,
		$operacion
	];

	$result_set = sqlsrv_query( $conexion, $sql_SP, $params );
	if( $result_set === false ) {
		$data['exito'] = false;
		die( json_encode($data) );
	}

	echo resultSetToJson('datos', $result_set);
