@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content_header')
    <div class="container">
        <h1>Compras</h1>

        <h1 align="right">
            <a href="{{route('compras.create')}}" valign="left">
                <button type="button" class="btn">
                    <i class="fas fa-cart-plus"></i> Nova Compra
                </button>
            </a>
        </h1>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Data Entrada</th>
                    <th>Quantidade</th>
                    <th>Preço de Custo</th>
                    <th>Fornecedor</th>
                    <th>Produto</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($compras as $com)
                    <tr align="center">
                        <td width="1%" nowrap="nowrap">{{$com->id}}</td>
                        <td>{{$com->dataEntrada}}</td>
                        <td>{{$com->quantidade}}</td>
                        <td>{{$com->precoCusto}}</td>
                        <td width="1%" nowrap="nowrap">{{$com->fornecedor->nome}}</td>
                        <td width="1%" nowrap="nowrap">{{$com->produto->nome}}</td>
                        <td width="1%" nowrap="nowrap">
                            <a href="{{route('compras.edit', ['id'=>$com->id])}}" class="btn-sm btn-success"title="Editar"><i class="fas fa-edit"></i></a>
                            <a href="{{route('compras.destroy', ['id'=>$com->id])}}" class="btn-sm btn-danger"title="Remover"><i class="fas fa-remove"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <center>{!! $compras->links() !!}</center>
    </div>
@endsection