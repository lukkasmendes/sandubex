function alterar_div() {
    $.ajax({
        type: "POST",
        //dataType: "html",
        dataType: "json",
        url: "http://127.0.0.1:8000/pedidos/adicionar",
        beforeSend: function () {
            $("#conteudo").html("Carregando...");
        },
        data: {
            nome_usuario: $('#idr').attr('value')
        },

        success: function(data) {
            //$('#conteudo').html(data);
            alert("thank u");
        }

    });
}