function alterar_div() {
    $.ajax({
        type: "POST",
        url: "http://127.0.0.1:8000/pedidos/adicionar",
        beforeSend: function () {
            $("#conteudo").html("Carregando...");
        },
        data: {
            nome_usuario: $('#idr').attr(name)
        },

        success: function(data) {
            $('#conteudo').html(data);
        }

    });
}