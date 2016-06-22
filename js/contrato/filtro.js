$(document).on('ready', function () {
	
	$('#btnFiltro').on('click', cambioOpcion);
	$('[data-editar]').on('click', mostrarEditar);
	$('[data-eliminar]').on('click', irEliminar);

});

function cambioOpcion() {
	location.href = 'registrar-contrato.php?filtro=' + $(this).prev().val();
}

function mostrarEditar() {
	var $td = $(this).parent();

	var inicial = $td.prev().text();
	var total = $td.prev().prev().text();
	var cuotas = $td.prev().prev().prev().text();
	var anios = $td.prev().prev().prev().prev().text();
	var moneda = $td.prev().prev().prev().prev().prev().text();
	var cochera1 = $td.prev().prev().prev().prev().prev().prev().text();
	var cochera2 = $td.prev().prev().prev().prev().prev().prev().prev().text();
	var departamento = $td.prev().prev().prev().prev().prev().prev().prev().prev().text();
	var proyecto = $td.prev().prev().prev().prev().prev().prev().prev().prev().prev().data('proyecto');
	var cliente = $td.prev().prev().prev().prev().prev().prev().prev().prev().prev().prev().data('cliente');
	var id = $td.prev().prev().prev().prev().prev().prev().prev().prev().prev().prev().prev().text();

	$('#modalEditar [name="txtCodigo"]').val(id);
	$('#modalEditar [name="cboCliente"]').val(cliente);
	$('#modalEditar [name="cboProyecto"]').val(proyecto);
	$('#modalEditar [name="txtDepartamento"]').val(departamento);
	$('#modalEditar [name="txtCochera2"]').val(cochera2);
	$('#modalEditar [name="txtCochera1"]').val(cochera1);
	$('#modalEditar [name="cboMoneda"]').val(moneda);
	$('#modalEditar [name="txtAnios"]').val(anios);
	$('#modalEditar [name="txtCuotas"]').val(cuotas);
	$('#modalEditar [name="txtTotal"]').val(total);
	$('#modalEditar [name="txtInicial"]').val(inicial);

	$('#modalEditar').modal('show');
}

function irEliminar() {
	var $td = $(this).parent();
	var $tr = $(this).parent().parent();
	var codigo = $td.prev().prev().prev().prev().prev().prev().prev().prev().prev().prev().prev().text();
	$tr.fadeOut('slow', function () {
		$(this).remove();
		location.href = 'scripts/contrato/eliminar.php?id='+codigo;
	});
}