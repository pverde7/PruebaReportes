
<?php 
	$con=@mysqli_connect("localhost","root","","gasa");
	session_start();
	$tipo = $_POST['tipo'];
	if($tipo==1){
		$SERIE = $_POST['serie'];
		$PROVEEDOR = $_POST['proveedor'];
		$FECHAINGRESO = $_POST['fechaIngreso'];
		$SALIDA = $_POST['salida'];
		$LLEGADA = $_POST['llegada'];
		$MOTIVO = $_POST['motivo'];

		$sql2 = "INSERT into COMPRAS(NRO_GUIA, idproveedor,FECHA_INGRESO, SALIDA, LLEGADA, MOTIVO , TOTAL) values ('".$SERIE."','".$PROVEEDOR."','".$FECHAINGRESO."','".$SALIDA."','".$LLEGADA."','".$MOTIVO."',0)";
		@mysqli_query($con,$sql2);
		$_SESSION['NRO_GUIA'] = $SERIE;
	} 
	if($tipo==2){
		    $CODIGO = $_POST['codigo'];
			$CANTIDAD = $_POST['cantidad'];
			$DESCRIPCION = $_POST['descripcion'];
			$UNIDAD = $_POST['unidad'];		
			$UNITARIO = $_POST['unitario'];			
			$GUIA = $_SESSION['NRO_GUIA'];
			$SUBTOTAL = $CANTIDAD * $UNITARIO;
			$sql2 = "INSERT into DETALLE_COMPRAS(NRO_GUIA, CODIGO, DESCRIPCION, UNIDAD,PRECIO_UNITARIO, CANTIDAD, SUBTOTAL) values ('".$GUIA."','".$CODIGO."','".$DESCRIPCION."','".$UNIDAD."','".$UNITARIO."',".$CANTIDAD.",".$SUBTOTAL.")";
			@mysqli_query($con,$sql2);

			$resultado = @mysqli_query($con,"SELECT ID_DETALLE, CODIGO, DESCRIPCION, UNIDAD, PRECIO_UNITARIO, CANTIDAD, SUBTOTAL FROM DETALLE_COMPRAS WHERE NRO_GUIA = '".$GUIA."'");
			while($mostrar = @mysqli_fetch_array($resultado)){
			echo '<tr>';
				echo '<td class="text-center">'.$mostrar['CODIGO'].'</td>';				
				echo '<td>'.$mostrar['DESCRIPCION'].'</td>';
				echo '<td class="text-center">'.$mostrar['UNIDAD'].'</td>';
				echo '<td class="text-center">'.$mostrar['PRECIO_UNITARIO'].'</td>';
				echo '<td class="text-center">'.$mostrar['CANTIDAD'].'</td>';
				echo '<td class="text-center">S/. '.$mostrar['SUBTOTAL'].'</td>';
				echo '<td class="center">
						<input type="button" class="btn btn-xs btn-danger col-md-offset-4" name="name" onclick="eliminar('.$mostrar['ID_DETALLE'].')" value="ELIMINAR"/>
					 </td>';
			}
			echo '</tr>';
		}
	
		if($tipo==3){
			$DETALLE = $_POST['detalle'];
			$GUIA = $_SESSION['NRO_GUIA'];

			
			$sql2 = "DELETE FROM DETALLE_COMPRAS WHERE ID_DETALLE = '".$DETALLE."' AND NRO_GUIA = '".$GUIA."'";
			@mysqli_query($con,$sql2);

			$resultado = @mysqli_query($con,"SELECT ID_DETALLE, CODIGO, DESCRIPCION, UNIDAD, PRECIO_UNITARIO, CANTIDAD, SUBTOTAL FROM DETALLE_COMPRAS WHERE NRO_GUIA = '".$GUIA."'");


			while($mostrar = @mysqli_fetch_array($resultado)){
			echo '<tr>';				
				echo '<td class="text-center">'.$mostrar['CODIGO'].'</td>';				
				echo '<td>'.$mostrar['DESCRIPCION'].'</td>';
				echo '<td class="text-center">'.$mostrar['UNIDAD'].'</td>';
				echo '<td class="text-center">'.$mostrar['PRECIO_UNITARIO'].'</td>';
				echo '<td class="text-center">'.$mostrar['CANTIDAD'].'</td>';
				echo '<td class="text-center">S/. '.$mostrar['SUBTOTAL'].'</td>';
				echo '<td class="center">
						<input type="button" class="btn btn-xs btn-danger col-md-offset-4" name="name" onclick="eliminar('.$mostrar['ID_DETALLE'].')" value="ELIMINAR"/>
					 </td>';
			}
			echo '</tr>';

		}

		if($tipo==4){
			$GUIA = $_SESSION['NRO_GUIA'];
			$sql2 = "SELECT count(*) FROM DETALLE_COMPRAS WHERE NRO_GUIA = '".$GUIA."'";
			$sql= @mysqli_query($con,$sql2);

	        while($row=@mysqli_fetch_array($sql)) {
	            $VALOR = $row[0];
	        }
	        
	        if ($VALOR == 0) {
	        	echo "<script> 
			        alert('Debe ingresar recursos al pedido!');
			        </script>";
			    while($mostrar = @mysqli_fetch_array($resultado)){
				echo '<tr>';				
					echo '<td class="text-center">'.$mostrar['CODIGO'].'</td>';				
					echo '<td>'.$mostrar['DESCRIPCION'].'</td>';
					echo '<td class="text-center">'.$mostrar['UNIDAD'].'</td>';
					echo '<td class="text-center">'.$mostrar['PRECIO_UNITARIO'].'</td>';
					echo '<td class="text-center">'.$mostrar['CANTIDAD'].'</td>';
					echo '<td class="text-center">S/. '.$mostrar['SUBTOTAL'].'</td>';
					echo '<td class="center">
							<input type="button" class="btn btn-xs btn-danger col-md-offset-3" name="name" onclick="eliminar('.$mostrar['ID_DETALLE'].')" value="ELIMINAR"/>
						 </td>';
				}
				echo '</tr>';
				
	         } else {
	         	$GUIA = $_SESSION['NRO_GUIA'];
	         	$sql = "SELECT sum( SUBTOTAL ) FROM DETALLE_COMPRAS WHERE NRO_GUIA = '".$GUIA."'";
				$sql= @mysqli_query($con,$sql);

		        while($row=@mysqli_fetch_array($sql)) {
		            $TOTAL = $row[0];
		        }

				$sql2 = "UPDATE compras SET TOTAL = ".$TOTAL." WHERE NRO_GUIA='".$GUIA."'";;
				$sql= @mysqli_query($con,$sql2);
	         	echo "<script> 
			        alert('Se registro correctamente el pedido!!');
			        window.location='../sites/compras.php'</script>";
	         }
		}


		if($tipo==5){
			$GUIA = $_POST['guia'];
			
			$sql1 = "DELETE FROM DETALLE_COMPRAS WHERE NRO_GUIA = '".$GUIA."'";
			$sql= @mysqli_query($con,$sql1);

			$sql2 = "DELETE FROM COMPRAS WHERE NRO_GUIA = '".$GUIA."'";
			$rpta= @mysqli_query($con,$sql2);

			echo "<script> 
			        alert('Guia eliminada satisfactoriamente.');
			        window.location='../sites/compras.php'</script>";	
		}

		if($tipo==6){
			$CODIGO = $_POST['codigo'];
			$DESCRIPCION = $_POST['descripcion'];
			$UNITARIO = $_POST['unitario'];
			$CANTIDAD = $_POST['cantidad'];
		}

		if($tipo==7){			
			$FECHAINICIAL = $_POST['fechaInicial'];
			$FECHAFINAL = $_POST['fechaFinal'];
			if (isset($_SESSION['FECHAINICIAL'])) {
				unset($_SESSION['FECHAINICIAL']);
			}

			if (isset($_SESSION['FECHAFINAL'])) {
				unset($_SESSION['FECHAFINAL']);
			}
			$_SESSION['FECHAINICIAL'] = $FECHAINICIAL;
			$_SESSION['FECHAFINAL'] = $FECHAFINAL;
			$ITEM = 0;

			$resultado = @mysqli_query($con,"SELECT C.NRO_GUIA, PR.nombreProve, C.FECHA_INGRESO, PR.rucProve, C.TOTAL FROM COMPRAS C INNER JOIN PROVEEDOR PR ON PR.IDPROVEEDOR = C.IDPROVEEDOR WHERE C.FECHA_INGRESO BETWEEN '".$FECHAINICIAL."' AND '".$FECHAFINAL."' ORDER BY C.FECHA_INGRESO DESC");

			while($mostrar = @mysqli_fetch_array($resultado)){
				$ITEM = $ITEM + 1;

			echo '<tr>';				
				echo '<td class="text-center">'.$ITEM.'</td>';				
				echo '<td>'.$mostrar['NRO_GUIA'].'</td>';
				echo '<td class="text-center">'.$mostrar['nombreProve'].'</td>';
				echo '<td class="text-center">'.$mostrar['FECHA_INGRESO'].'</td>';
				echo '<td class="text-center">'.$mostrar['rucProve'].'</td>';
				echo '<td class="text-center">S/. '.$mostrar['TOTAL'].'</td>';			
			}
			echo '</tr>';
		}
	
?>
