<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">

<body>
    <div class="container">

        <h1 style="text-align: center">
            PRODUTOS MAIS VENDIDOS
        </h1>
        <h3 style="text-align: center">
            NO PERÍODO DE {{$dtin}} A {{$dtfl}}
        </h3>

        <hr style="width: 100%">
        <div style="text-align: right">
            <a style="text-align: right" title="IMPRIMIR" onClick="window.print()">
                <button style="text-align: right" type="button" name="impr" id="impr" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-print"></span> Imprimir
                </button>
            </a>
        </div>

        <table class="table tablesorter table-striped table-hover" style="width: 100%" id="myTable">
            <thead class="head-dark">
                <tr style="height: 50px">
                    <th width="25%" style="text-align: center">Produto</th>
                    <th width="25%" style="text-align: center">Quantidade</th>
                </tr>
            </thead>

            @forelse ($promais as $pro)
                <tbody>
                    <tr>
                        <td style="text-align: center">{{ $pro->pro }}</td>
                        <td style="text-align: center">{{ $pro->produto_id }}</td>
                    </tr>
                </tbody>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center"><h2>SEM REGISTROS</h2></td>
                </tr>
            @endforelse
        </table>
    </div>
</body>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script>
    window.setTimeout(function(){
        document.getElementById("impr").click();
    });
</script>