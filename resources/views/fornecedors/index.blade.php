@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content')

    <div class="container">
        <h1>Fornecedor</h1>

        <h1 align="right">
            <a href="{{route('fornecedors.create')}}" valign="left"><button type="button" class="btn" href="{{route('fornecedors.create')}}"><i class="fas fa-user-plus"></i> Novo Fornecedor</button></a>
        </h1>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Endereço</th>
                    <th>CNPJ</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fornecedors as $for)
                    <tr align="center">
                        <td>{{$for->nome}}</td>
                        <td>{{$for->telefone}}</td>
                        <td>{{$for->email}}</td>
                        <td>{{$for->endereco}}</td>
                        <td>{{$for->cnpj}}</td>
                        <td width="1%" nowrap="nowrap">
                            <a href="{{route('fornecedors.edit', ['id'=>$for->id])}}" class="btn-sm btn-success"title="Editar"><i class="fas fa-edit"></i></a>
                            <a href="{{route('fornecedors.destroy', ['id'=>$for->id])}}" class="btn-sm btn-danger"title="Remover"><i class="fas fa-remove"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <center>{!! $fornecedors->links() !!}</center>
    </div>
@endsection