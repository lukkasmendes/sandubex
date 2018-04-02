@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content_header')

    <div class="container">


        @if (Session::has('mensagem_sucesso'))
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong>Sucesso!</strong> {{ Session::get('mensagem_sucesso') }}
            </div>
        @endif


        <h1><i class="fas fa-users"></i> Fornecedores</h1>

        @include('flash::message')

<!--  MODAL NOVO FORNECEDOR -->
        <div class="modal fade" id="novoFornecedor" tabindex="-1" role="dialog" aria-labelledby="novoFornecedorModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close"
                                data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="novoFornecedorModal">Novo Fornecedor</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            <script type="text/javascript">

                                function maiuscula(obj) {
                                    obj.value = obj.value.toUpperCase();
                                }

                            </script>

                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            @endif

                            {!! Form::open(['route' => 'fornecedors.store']) !!}
                            <div class="form-group">
                                {!! Form::label('nome', 'Nome:') !!}
                                {!! Form::text('nome', null, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('telefone', 'Telefone:') !!}<br />
                                {!! Form::text('telefone', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', 'E-mail:') !!}
                                {!! Form::text('email', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('endereco', 'Endereço:') !!}<br />
                                {!! Form::text('endereco', null, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('cnpj', 'CNPJ:') !!}
                                {!! Form::text('cnpj', null, ['class'=>'form-control']) !!}
                            </div>
                        </p>
                    </div>
                    <div class="modal-footer">
                        {!! Form::open(['route' => 'fornecedors.store']) !!}

                        <a
                                type="button"
                                class="btn btn-danger"
                                data-dismiss="modal">
                            Cancelar
                        </a>

                        {!! Form::submit('Registrar', ['class'=>'btn btn-success']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
<!--  MODAL NOVO FORNECEDOR -->


        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Endereço</th>
                    <th>CNPJ</th>
                    <th>
                        <a>
                            <button
                                    type="button"
                                    class="btn"
                                    data-toggle="modal"
                                    data-target="#novoFornecedor">
                                <i class="fas fa-user-plus"></i> Novo Fornecedor
                            </button>
                        </a>
                    </th>
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
                            <a href="{{route('fornecedors.edit', ['id'=>$for->id])}}"
                               class="btn-sm btn-success"
                               title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>







<!-- BOTÃO MODAL EXCLUIR -->

                            <a  href=""
                                title="Excluir"
                                class="modal-del btn-danger btn-sm"
                                data-toggle="modal"
                                data-target="#id{{$for->id}}">

                                <i class="fas fa-remove"></i>
                            </a>

<!-- BOTÃO MODAL EXCLUIR -->



<!-- MODAL EXCLUIR -->

                            <div    class="modal modal-danger fade"
                                    id="id{{ $for->id}}"
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
                                                EXCLUIR FORNECEDOR: {{$for->nome}}
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            TEM CERTEZA QUE DESEJA EXCLUIR?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('fornecedors.destroy', [$for->id] )}}">
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
        <center>{!! $fornecedors->links() !!}</center>
    </div>
@endsection