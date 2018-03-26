@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content')
    <div class="container">
        <h1>Movimentação {{\Carbon\Carbon::now('America/Sao_Paulo')->format('d/m/Y')}}</h1>

        <h1 align="right">
        <a href="{{route('caixas.create')}}" valign="left"><button type="button" class="btn" href="{{route('caixas.create')}}">+ Add</button></a>
        <a href="{{route('caixas.create')}}" valign="left"><button type="button" class="btn" href="{{route('caixas.create')}}">Imprimir Resumo</button></a>
        </h1>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Data/Hora</th>
                    <th>Entrada/Saída</th>
                    <th>Valor</th>
                    <th>Forma de pagamento</th>
                    <th>Observação</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($caixas as $cai)
                    <tr align="center">
                        <td>{{date('d-m-Y H:i:s', strtotime($cai->data))}}</td>
                        @if($cai->tipo == 'S')
                            <td>SAÍDA</td>
                        @else
                            <td>ENTRADA</td>
                        @endif
                        <td>R$ {{number_format($cai->valor, 2)}}</td>
                        @if($cai->formaPagamento == 'DI')
                            <td>DINHEIRO</td>
                        @elseif($cai->formaPagamento == 'DE')
                            <td>DÉBITO</td>
                        @elseif($cai->formaPagamento == 'CR')
                            <td>CRÉDITO</td>
                        @elseif($cai->formaPagamento == 'CH')
                            <td>CHEQUE</td>
                        @endif
                        <td>{{$cai->observacao}}</td>
                        <td width="1%" nowrap="nowrap">
                            <a href="{{route('caixas.edit', ['id'=>$cai->id])}}" class="btn-sm btn-success">Editar</a>
                            <a href="{{route('caixas.destroy', ['id'=>$cai->id])}}" class="btn-sm btn-danger">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <center>{!! $caixas->links() !!}</center>
    </div>
@endsection