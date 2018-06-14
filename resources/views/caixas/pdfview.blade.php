<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
<body>
<div class="container">
<h1>Produtos Pedido
<a target="_blank" href="{{ route('pdfview',['download'=>'pdf']) }}" title="IMPRIMIR">
    <button type="button" class="btn btn-default btn-sm">
        <span class="glyphicon glyphicon-print"></span> Imprimir
    </button>
</a>
</h1>


<table border="1">
    <tr>
        <th width="10%" style="text-align: center">N° Pedido</th>
        <th width="30%" style="text-align: center">Produto</th>
        <th width="10%" style="text-align: center">Valor</th>
        <th width="20%" style="text-align: center">Cliente</th>
        <th width="25%" style="text-align: center">Forma de Pagamento</th>
        <th width="60%" style="text-align: center">Observação</th>

    </tr>
    @php
        $tot = 0
    @endphp
    @forelse ($pedido_produto as $pp)
        <tr>
            <td>{{ $pp->pedido_id }}</td>
            <td>{{ $pp->produto_id }}</td>
            <td>{{ $pp->valor }}</td>
            <td>{{ $pp->cliente_id }}</td>

            @if($pp->formaPagamento == 'D')
                <td>DINHEIRO</td>
            @elseif($pp->formaPagamento == 'C')
                <td>CHEQUE</td>
            @elseif($pp->formaPagamento == 'CC')
                <td>CARTÃO DE CRÉDITO</td>
            @else
                <td>CARTÃO DE DÉBITO</td>
            @endif

            <td>{{ $pp->observacao }}</td>
        </tr>
        @php
            $tot += $pp->valor
        @endphp
    @empty
        Sem registros
    @endforelse
    <tr>
        <td colspan="7">
            Valor Total - R$ {{ number_format($tot, 2) }}
        </td>
    </tr>
</table>
</div>
</body>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>