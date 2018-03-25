@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content')

    <div class="container">
        <h1>Cliente</h1>

        <h1 align="right">
        <a href="{{route('clientes.create')}}" valign="left"><button type="button" class="btn" href="{{route('clientes.create')}}">+ Add</button></a>
        </h1>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cli)
                    <tr align="center">
                        <td>{{$cli->nome}}</td>
                        <td>{{$cli->telefone}}</td>
                        <td>{{$cli->email}}</td>
                        <td>{{$cli->cpf}}</td>
                        <td>{{$cli->rg}}</td>
                        <td width="1%" nowrap="nowrap">
                            <a href="{{route('clientes.edit', ['id'=>$cli->id])}}" class="btn-sm btn-success">Editar</a>
                            <a href="{{route('clientes.destroy', ['id'=>$cli->id])}}" class="btn-sm btn-danger">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <center>{!! $clientes->links() !!}</center>
    </div>
@endsection