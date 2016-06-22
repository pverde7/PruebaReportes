$(document).on('ready', function () {
	
	$('#filtroProyecto').on('change', cambioOpcion);
	$('[data-editar]').on('click', mostrarEditar);
	$('[data-eliminar]').on('click', irEliminar);

});

function cambioOpcion() {
	location.href = 'registrar-etapa.php?filtro=' + $(this).val();
}

function mostrarEditar() {
	var $td = $(this).parent();

	var proyecto = $td.prev().data('proyecto');
	var costo = $td.prev().prev().text();
	var nombre = $td.prev().prev().prev().text();
	var abreviatura = $td.prev().prev().prev().prev().text();
	var codigo = $td.prev().prev().prev().prev().prev().text();

	$('#modalEditar [name="txtCodigo"]').val(codigo);
	$('#modalEditar [name="txtAbreviatura"]').val(abreviatura);
	$('#modalEditar [name="txtNombre"]').val(nombre);
	$('#modalEditar [name="txtCosto"]').val(costo);
	$('#modalEditar [name="cboProyecto"]').val(proyecto);

	$('#modalEditar').modal('show');
}

function irEliminar() {
	var $td = $(this).parent();
	var $tr = $(this).parent().parent();
	var codigo = $td.prev().prev().prev().prev().prev().text();
	alert(codigo)
	$tr.fadeOut('slow', function () {
		$(this).remove();
		location.href = 'scripts/etapa/eliminar.php?id='+codigo;
	});
}