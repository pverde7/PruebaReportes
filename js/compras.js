$(function() {
	$('#agregarRecursoPedido').on('click', function(){
		var tipo = 1;
		var serie = $('#serie').val();
		var proveedor = $('#proveedor').val();		
		var fechaIngreso = $('#fechaIngreso').val();
		var salida = $('#salida').val();
		var llegada = $('#llegada').val();
		var motivo = $('#motivo').val();
		if(serie.length>0 && proveedor.length>0 && fechaIngreso.length>0 && salida.length>0 && llegada.length>0 && motivo.length>0){
		$.ajax({
				type: 'POST',
				data: 'serie='+serie+'&tipo='+tipo+'&proveedor='+proveedor+'&fechaIngreso='+fechaIngreso+'&salida='+salida+'&llegada='+llegada+'&motivo='+motivo,
				url: '../scripts/grabaPedido.php',
				success: function(data){				
					$('#codigo').removeAttr('disabled').focus();
					$('#cantidad').removeAttr('disabled').focus();
					$('#unidad').removeAttr('disabled').focus();
					$('#descripcion').removeAttr('disabled').focus();
					$('#unitario').removeAttr('disabled').focus();
					$('#btnGuardarProforma').removeAttr('disabled').focus();
					$('#btnAgregarRecurso').removeAttr('disabled').focus();
					$('#agregar').removeAttr('disabled').focus();
					$('#compra').removeAttr('disabled').focus();


					$('#serie').attr('disabled','disabled');
					$('#proveedor').attr('disabled','disabled');
					$('#fechaIngreso').attr('disabled','disabled');					
					$('#agregarRecurso').attr('disabled','disabled');
					$('#salida').attr('disabled','disabled');
					$('#motivo').attr('disabled','disabled');
					$('#llegada').attr('disabled','disabled');
					$('#regresar').attr('disabled','disabled');
					$('#agregarRecursoPedido').attr('disabled','disabled');
				}
			});
		}else{
			$('#mensaje').html('<p class="alert alert-warning">Espere!!, tiene que ingresar todos los campo.</p>').show(200).delay(1500).hide(200);
		}
	});

	$('#agregar').on('click', function(){
		var tipo = 2;
		var codigo = $('#codigo').val();
		var cantidad = $('#cantidad').val();
		var unidad = $('#unidad').val();
		var descripcion = $('#descripcion').val();
		var unitario = $('#unitario').val();

		if(codigo.length>0 &&  cantidad.length>0 && unidad.length>0 && descripcion.length>0 && unitario.length>0){
			$('#total').val(parseFloat($('#total').val()) + (parseFloat(cantidad) * parseFloat(unitario)));
		$.ajax({
				type: 'POST',
				data: 'codigo='+codigo+'&cantidad='+cantidad+'&tipo='+tipo+'&unidad='+unidad+'&descripcion='+descripcion+'&unitario='+unitario,
				url: '../scripts/grabaPedido.php',
				success: function(data){
					$('#pedido').html(data);
					$('#codigo').val('');				
					$('#cantidad').val('');
					$('#unidad').val('');
					$('#descripcion').val('');
					$('#unitario').val('');
					
					
				}
			});
		}else{
			$('#mensaje1').html('<p class="alert alert-warning">Espere!!, tiene que ingresar todos los campo.</p>').show(200).delay(1500).hide(200);
		}
	});

	$('#compra').on('click', function(){
		var tipo = 4;
		$.ajax({
				type: 'POST',
				data: 'tipo='+tipo,
				url: '../scripts/grabaPedido.php',
				success: function(data){
					$('#pedido').html(data);
					$('#codigo').val('');				
					$('#cantidad').val('');
					$('#unidad').val('');
					$('#descripcion').val('');
					$('#unitario').val('');				
				}
			});
	});

	$("#btnRecorrer").click(function () 
    {
        $("#tablaProforma tbody tr").each(function (index) 
        {
            var codigo, descripcion, unitario, cantidad;
            var tipo = 6;
            $(this).children("td").each(function (index2) 
            {
                switch (index2) 
                {
                    case 0: codigo = $(this).text();
                            break;
                    case 1: descripcion = $(this).text();
                            break;
                    case 2: unitario = $(this).text();
                            break;
                    case 3: cantidad = $(this).text();
                            break;
                }
                
            })
            //alert(codigo + ' - ' + descripcion + ' - ' + unitario + ' - ' + cantidad);
            $.ajax({
				type: 'POST',
				data: 'tipo='+tipo+'&codigo='+codigo+'&descripcion='+descripcion+'&unitario='+unitario+'&cantidad='+cantidad,
				url: '../scripts/grabaPedido.php',
				success: function(data){
					$('#mensaje').html(data);		
				}
			});
        })
    });

	$('#consultar').on('click', function(){
		var tipo = 7;
		var fechaInicial = $('#fechaInicial').val();
		var fechaFinal = $('#fechaFinal').val();
		$.ajax({
				type: 'POST',
				data: 'tipo='+tipo+'&fechaInicial='+fechaInicial+'&fechaFinal='+fechaFinal,
				url: '../scripts/grabaPedido.php',
				success: function(data){
					$('#consulta').html(data);											
				}
			});
	});

		
});