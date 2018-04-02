@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content_header')


    <div class="container">

        <h1>Categoria</h1>

        @include('flash::message')


<!-- MODAL PARA ADICIONAR NOVA CATEGORIA -->

        <div class="modal fade" id="novaCategoria" tabindex="-1" role="dialog" aria-labelledby="novaCategoriaModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close"
                                data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="novaCategoriaModal">Nova Categoria</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            @endif

                            {!! Form::open(['route' => 'categorias.store']) !!}
                            <div class="form-group">
                                {!! Form::label('descricao', 'Descrição:') !!}
                                {!! Form::text('descricao', null, ['class'=>'form-control', 'placeholder'=>'Informe a descrição da categoria: bebidas, pães, carnes...', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
                            </div>
                            <div>
                                {!! Form::submit('Criar Categoria', ['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>

<!-- MODAL PARA ADICIONAR NOVA CATEGORIA -->


        <table class="table table-striped table-bordered table-hover table-responsive">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>
<!-- BOTÃO MODAL PARA ADICIONAR NOVA CATEGORIA -->
                        <a>
                            <button
                                    type="button"
                                    class="btn"
                                    data-toggle="modal"
                                    data-target="#novaCategoria">
                                <i class="fas fa-list"></i>
                                Nova Categoria
                            </button>
                        </a>
<!-- BOTÃO MODAL PARA ADICIONAR NOVA CATEGORIA -->
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $cat)
                    <tr align="center">
                        <td width="1%" nowrap="nowrap">{{$cat->id}}</td>
                        <td>{{$cat->descricao}}</td>
                        <td width="1%" nowrap="nowrap">

                            <a href="{{route('categorias.edit', ['id'=>$cat->id])}}"
                               class="btn-sm btn-success"
                               title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>



<!-- BOTÃO MODAL EXCLUIR -->

                            <a  href=""
                                title="Excluir"
                                class="modal-del btn-danger btn-sm"
                                data-toggle="modal"
                                data-target="#id{{$cat->id}}">

                                <i class="fas fa-remove"></i>
                            </a>

<!-- BOTÃO MODAL EXCLUIR -->



<!-- MODAL EXCLUIR -->

                            <div    class="modal modal-danger fade"
                                    id="id{{ $cat->id}}"
                                    tabindex="-1"
                                    role="dialog"
                                    aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title text-center" id="myModalLabel">
                                                Deletar Categoria: {{$cat->descricao}}
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            Tem certeza que deseja Excluir?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('categorias.destroy', [$cat->id] )}}">
                                                {{method_field('delete')}}

                                                <button
                                                        type="button"
                                                        class="btn btn-success"
                                                        data-dismiss="modal">
                                                    Não, Cancelar
                                                </button>

                                                <button
                                                        type="submit"
                                                        class="btn btn-warning">
                                                    Sim, Excluir
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

<!-- MODAL EXCLUIR -->

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <center>{!! $categorias->render() !!}</center>
    </div>
@endsection