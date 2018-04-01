@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content_header')


    <div class="container">

        <h1>Categoria</h1>

        @include('flash::message')






    <!-- Delete Modal test 1
        @section('content')
        <form action="" method="POST" class="remove-record-model">
            <div id="delCat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delCatModal" aria-hidden="true" style="display: none;">
                <div class="modal-dialog" style="width:55%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="delCatModal">Delete Record</h4>
                        </div>
                        <div class="modal-body">
                            <h4>You Want You Sure Delete This Record?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close</button>
                            <button type="submit"  class="btn btn-danger waves-effect waves-light">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endsection

        @section('script')
            <script src="{{-- asset('custom.js') --}}"></script>
        @endsection
    -->











    <!-- Delete Modal test 2

        <div class="modal modal-danger fade" id="delCat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title text-center" id="myModalLabel">
                            Delete Confirmation
                        </h4>
                    </div>


                    <form action="{{--route('categorias.destroy', $id )}}" method="post">
                        {{method_field('delete')}}
                        {{csrf_field()--}}
                        <div class="modal-body">
                            <p class="text-center">
                                Are you sure you want to delete this?
                            </p>
                            <input type="hidden" name="category_id" id="cat_id" value="" />

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
                            <button type="submit" class="btn btn-warning">Yes, Delete</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>

-->




















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
                        <h4 class="modal-title" id="novaCategoriaModal">Novo Fornecedor</h4>
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

        <h1 align="right">
            <button
                    type="button"
                    class="btn"
                    data-toggle="modal"
                    data-target="#novaCategoria">
                <i class="fas fa-list"></i> Nova Categoria
            </button>
        </h1>


<!-- MODAL PARA ADICIONAR NOVA CATEGORIA -->






        




        @if ($message = Session::get('success'))
            <div class="custom-alerts alert alert-success fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                {!! $message !!}
            </div>
            <?php Session::forget('success');?>
        @endif








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
                            <a href="{{route('categorias.edit', ['id'=>$cat->id])}}"
                               class="btn-sm btn-success"
                               title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>


<!-- delete MODAL test 1
                            <a class="btn-sm btn-danger"
                               type="button"
                               title="Remover"
                               data-toggle="modal"

                               data-url="{--!! URL::route('categorias.destroy', $cat->id) !!--}"

                               data-id="{{--$cat->id--}}"

                               data-target="#delCat">
                                <i class="fas fa-remove"></i>
                            </a>
-->




<!-- delete MODAL test 2
                            &nbsp;
                            <a class="btn-sm btn-danger"
                               type="button"
                               title="Remover"
                               data-toggle="modal"

                               data-catid="{{$cat->id}}"

                               data-target="#delCat">
                                <i class="fas fa-remove"></i>
                            </a>
-->






                            <a href="{{route('categorias.destroy', ['id'=>$cat->id])}}"
                               class="btn-sm btn-danger"
                               title="Remover">
                                <i class="fas fa-remove"></i>
                            </a>
                            <input type="hidden" name="acao" value="Excluir">




                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <center>{!! $categorias->render() !!}</center>
    </div>
@endsection