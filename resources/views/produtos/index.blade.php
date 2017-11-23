@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Produto</h1>

        <h1 align="right">
            <a href="{{route('produtos.create')}}" valign="left"><button type="button" class="btn" href="{{route('categorias.create')}}">+ Add</button></a>
        </h1>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Cód.</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>UN</th>
                    <th>Preço de Venda</th>
                    <th>Preço de Custo</th>
                    <th>Estoque Minimo</th>
                    <th>Estoque Atual</th>
                    <th>Descrição</th>
                    <th>Imagem</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $pro)
                    <tr align="center">
                        <td width="1%" nowrap="nowrap">{{$pro->id}}</td>
                        <td>{{$pro->nome}}</td>
                        <td width="1%" nowrap="nowrap">{{$pro->categoria->descricao}}</td>
                        <td width="1%" nowrap="nowrap">{{$pro->unidade}}</td>
                        <td>R$ {{number_format($pro->precoVenda, 2)}}</td>
                        <td>R$ {{number_format($pro->precoCusto, 2)}}</td>
                        <td>{{$pro->estoqueMin}}</td>
                        <td>{{$pro->estoque}}</td>
                        <td>{{$pro->descricao}}</td>
                        <td width="1%" nowrap="nowrap"><img src="produtos/{{$pro->id}}/image" width="60" height="60"/></td>
                        <td width="1%" nowrap="nowrap">
                            <a href="{{route('produtos.edit', ['id'=>$pro->id])}}" class="btn-sm btn-success">Editar</a>
                            <a href="{{route('produtos.destroy', ['id'=>$pro->id])}}" class="btn-sm btn-danger">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <center>{!! $produtos->links() !!}</center>
    </div>
@endsection