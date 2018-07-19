var _Tipo = 0;
$(document).ready(function() {
    getInputText();
});

$("#textBuscar").on('input', function(e) {
    getInputText();
});

function setTipo(pTipo) {
    _Tipo = pTipo;
    getInputText();
}

function getInputText() {
    var text = $('#textBuscar').val();
    cargarFormulariosPost("cargarGrupos.php", 'loadGroups', { 'Nombre': text, 'Tipo': _Tipo });
}