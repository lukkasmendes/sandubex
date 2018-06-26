<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
<body>
<div class="container">

<h1 style="text-align: center">
    TOTAL DE ENTRADAS E SAÍDAS NO CAIXA
</h1>
<h3 style="text-align: center">
    NO PERÍODO DE {{$dtin2}} A {{$dtfl2}}
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
            <th width="25%" style="text-align: center">Valor Total de Entrada</th>
            <th width="25%" style="text-align: center">Valor Total de Saída</th>
        </tr>
    </thead>

    <tbody>
        @if($tote != null || $tots != null)
            <tr>
                <td style="text-align: center">R$ {{number_format($tote, 2)}}</td>
                <td style="text-align: center">R$ {{number_format($tots, 2)}}</td>
            </tr>
        @else
            <tr>
                <td colspan="6" style="text-align: center"><h2>SEM REGISTROS</h2></td>
            </tr>
        @endif
    </tbody>

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