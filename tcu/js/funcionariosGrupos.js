$(document).ready(function() {
    cargarFormulariosPost("cargarGrupos.php", 'loadGroups', { 'Nombre': '', 'Tipo': 0 });
});

$("#textBuscar").on('input', function(e) {
    var text = $('#textBuscar').val();
    cargarFormulariosPost("cargarGrupos.php", 'loadGroups', { 'Nombre': text, 'Tipo': 0 });
});