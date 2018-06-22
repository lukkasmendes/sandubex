<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
<body>
<div class="container">

<h1 style="text-align: center">PEDIDO Nº: {{$id}}
{{--<a href="{{ route('caixas.pdfview',['download'=>'pdf']) }}" title="IMPRIMIR">--}}

</h1>

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
            <th width="20%" style="text-align: center">Produto</th>
            <th width="25%" style="text-align: center">Cliente</th>
            <th width="25%" style="text-align: center">Observação</th>
            <th width="20%" style="text-align: center">Forma de Pagamento</th>
            <th width="10%" style="text-align: center">Valor</th>
        </tr>
    </thead>
    @php
        $tot = 0
    @endphp
    @forelse ($pedido_produto as $pp)
        <tbody>
            <tr>
                <td style="text-align: center">{{ $pp->produto->nome }}</td>
                <td style="text-align: center">{{ $pp->cliente->nome }}</td>
                <td style="text-align: center">{{ $pp->observacao }}</td>

                @if($pp->formaPagamento == 'D')
                    <td style="text-align: center">DINHEIRO</td>
                @elseif($pp->formaPagamento == 'C')
                    <td style="text-align: center">CHEQUE</td>
                @elseif($pp->formaPagamento == 'CC')
                    <td style="text-align: center">CARTÃO DE CRÉDITO</td>
                @else
                    <td style="text-align: center">CARTÃO DE DÉBITO</td>
                @endif

                <td style="text-align: center">{{ $pp->valor }}</td>
            </tr>
        </tbody>
        @php
            $tot += $pp->valor
        @endphp
    @empty
        <tr>
            <td colspan="6" style="text-align: center"><h2>SEM REGISTROS</h2></td>
        </tr>
    @endforelse
    <tfoot>
        <tr>
            <th colspan="7" style="text-align: right; font-style: italic; height: 30px">
                Valor Total - R$ {{ number_format($tot, 2) }}
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