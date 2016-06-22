$(document).on('ready', function () {
	
	// Mostrar detalles, listado de proyectos de una proforma
	$(document).on('click', '[data-detalle]', mostrarDetalles);	

});

function mostrarDetalles() {
	event.preventDefault();

	$fila = $(this).parents('tr');
	var proforma_id = $fila.find('td').first().text();

	$.ajax({
		method: 'GET',
		url: 'listar-proyectos.php?id='+proforma_id,
		success: function( data ) {
	    	$('#tbodyDetalles').html(data);
	    	$('#modalDetalles').modal('show');
		}
	});
}