$(document).on('ready', function () {
	
	// Abrir modal para seleccionar proyectos
	$(document).on('click', '#btnSeleccionar', seleccionarProy);

	// Selección de un proyecto, para agregarlo al detalle
	$(document).on('click', '#modalProyectos .btn-warning', proyectoEscogido);	

	// Des-seleccionar un proyecto, para que aparezca nuevamente en el modal
	$(document).on('click', '#tbodyEscogidos .btn-danger', proyectoEliminado);	

	// Evento del botón de guardar cambios
	$(document).on('submit', '#formRegistrar', guardarCambios);	
});

function seleccionarProy() {
	$('#modalProyectos').modal('show');
}

function proyectoEscogido() {
	// this es el botón de escoger
	var $proyecto = $(this).parents('tr');

	// Ajustes necesarios
	$(this).text('Eliminar').removeClass('btn-warning').addClass('btn-danger');

	// Desplazamos del modal a la tabla de escogidos
	$('#tbodyEscogidos').append($proyecto);

	// Ocultamos el modal
	$('#modalProyectos').modal('hide');
}

function proyectoEliminado() {
	// this es el botón de eliminar
	var $proyecto = $(this).parents('tr');

	// Ajustes necesarios
	$(this).text('Seleccionar').removeClass('btn-danger').addClass('btn-warning');

	// Desplazamos de la tabla de escogidos al modal
	$('#modalProyectos tbody').append($proyecto);
}

function guardarCambios() {
	event.preventDefault();

	var proforma_id = $('#proforma_id').val();
	var proyectos = [];

	$('#tbodyEscogidos tr').each(function () {
		var codigo = $(this).find('td').first().text();
		proyectos.push(codigo);
	});

	if (proyectos.length==0) {
		alert('Debe seleccionar al menos un proyecto.');
		return;
	}

	var datosEnviados = { proyectos: proyectos, id: proforma_id };

	$.ajax({
		type: "POST",
		url: 'scripts/proforma/editar.php',
		data: datosEnviados,
		success: function( data ) {
	    	if (data==1) {
	    		$('#alerta').show();
	    		$('#formRegistrar').fadeOut();
	    	}
		}
	});
}