@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content_header')
    <div class="container">

        <h1>Categoria</h1>

        @include('flash::message')

        <h1 align="right">
        <a href="{{route('categorias.create')}}" valign="left"><button type="button" class="btn" href="{{route('categorias.create')}}"><i class="fas fa-list"></i> Nova Categoria</button></a>
        </h1>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $cat)
                    <tr align="center">
                        <td width="1%" nowrap="nowrap">{{$cat->id}}</td>
                        <td>{{$cat->descricao}}</td>
                        <td width="1%" nowrap="nowrap">
                            <a href="{{route('categorias.edit', ['id'=>$cat->id])}}" class="btn-sm btn-success"title="Editar"><i class="fas fa-edit"></i></a>
                            <a href="{{route('categorias.destroy', ['id'=>$cat->id])}}" class="btn-sm btn-danger"title="Remover"><i class="fas fa-remove"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <center>{!! $categorias->links() !!}</center>
    </div>
@endsection