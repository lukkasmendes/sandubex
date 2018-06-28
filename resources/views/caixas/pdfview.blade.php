<link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
<body>
<div class="container">

<h1 style="text-align: center">
    PEDIDO Nº: {{$id}}
</h1>
<h3 style="text-align: center">
    @foreach($pedido_produto as $pp)
        Data do Pedido: {{date('d/m/Y', strtotime($pp->dat))}}
        <br>
        Cliente: {{ $pp->cli }}
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
            <th width="33%" style="text-align: center">Quantidade</th>
            <th width="34%" style="text-align: center">Produto</th>
            <th width="33%" style="text-align: right">Valor</th>
        </tr>
    </thead>
    @php
        $tot = 0
    @endphp
    @forelse ($pedido_produto as $pp)
        <tbody>
            <tr>
                <td style="text-align: center">{{ $pp->pedpro }}</td>
                <td style="text-align: center">{{ $pp->pro }}</td>
                <td style="text-align: right">{{ $pp->soma }}</td>
            </tr>
        </tbody>
        @php
            $tot += $pp->soma
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
        <tr>
            @foreach($pedido_produto as $pp)
                @if($pp->formaPagamento == 'D')
                    <th  colspan="7" style="height: 30px">Forma de pagamento: DINHEIRO</th>
                @elseif($pp->formaPagamento == 'C')
                    <th  colspan="7" style="height: 30px">Forma de pagamento: CHEQUE</th>
                @elseif($pp->formaPagamento == 'CC')
                    <th colspan="7" style="height: 30px">Forma de pagamento: CARTÃO DE CRÉDITO</th>
                @else
                    <th colspan="7" style="height: 30px">Forma de pagamento: CARTÃO DE DÉBITO</th>
                @endif
        </tr>
        <tr>
            <th colspan="7" style="height: 30px">Observação: {{ $pp->observacao }}</th>

                @break
            @endforeach
        </tr>

    </tfoot>
</table>
</div>
</body>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
