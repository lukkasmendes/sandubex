jQuery(document).ready(function($) {
    $('#searchname').autocomplete({
        source : 'http://127.0.0.1:8000/pedidos/autocomplete',
        minlenght:2,
        autoFocus:true,
        select:function(e,ui){
            $('#id').val(ui.item.id);
        }
    });
});