<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
<body>
<div class="container">

    <h1 style="text-align: center">
        PRODUTOS POR CATEGORIA
    </h1>
    <h3 style="text-align: center">
        @foreach($catego as $cat)
            Categoria: {{$cat->categoria}}
            @break
        @endforeach
    </h3>

    <hr style="width: 100%">
    <div style="text-align: right">
        <a style="text-align: right" title="IMPRIMIR" onClick="window.print()">
            <button style="text-align: right" type="button" name="impr" id="impr" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-print"></span> Imprimir
            </button>
        </a>
    </div>
    <table class="table table-striped table-hover" style="width: 100%">
        <thead class="head-dark">
        <tr style="height: 50px">
            <th width="15%" style="text-align: center">Imagem</th>
            <th width="25%" style="text-align: center">Produto</th>
            <th width="25%" style="text-align: center">Preço de venda</th>
            <th width="25%" style="text-align: center">Descrição</th>
        </tr>
        </thead>

        @forelse($catego as $cat)
            <tbody>
            <tr>
                <td style="text-align: center"><img src="{{$cat->id}}/image" width="60" height="60"/></td>
                <td style="text-align: center">{{$cat->nome}}</td>
                <td style="text-align: center">{{$cat->precoVenda}}</td>
                <td style="text-align: center">{{$cat->descricao}}</td>
            </tr>
            </tbody>
        @empty
            <tr>
                <td colspan="6" style="text-align: center"><h2>SEM REGISTROS</h2></td>
            </tr>
        @endforelse


        <tfoot>
        <tr>
            <th colspan="7" style="text-align: right; font-style: italic; height: 30px">
            </th>
        </tr>
        </tfoot>
    </table>
</div>
</body>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script>
    window.setTimeout(function(){
        document.getElementById("impr").click();
    });
</script>