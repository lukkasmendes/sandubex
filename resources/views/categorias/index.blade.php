@extends('adminlte::page')

@include('categorias.create')

@section('title', 'Sandubex')

@section('content_header')

    <div class="container">


        @if (Session::has('mensagem_sucesso'))
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong>Sucesso!</strong> {{ Session::get('mensagem_sucesso') }}
            </div>
        @endif
        @include('flash::message')


        <h3 align="center"><i class="fas fa-list"></i> Categorias</h3>


        <table class="table table-striped table-bordered table-hover" id="example">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th width="10px">
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
                                                EXCLUIR CATEGORIA: {{$cat->descricao}}
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            TEM CERTEZA QUE DESEJA EXCLUIR?
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
    </div>
@endsection