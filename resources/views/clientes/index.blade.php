@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content_header')

    <div class="container">
        <h1><i class="fas fa-user"></i> Clientes</h1>

<!-- MODAL NOVO CLIENTE -->
        <div class="modal fade" id="novoCliente" tabindex="-1" role="dialog" aria-labelledby="novoClienteModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close"
                                data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="novoClienteModal">Novo Cliente</h4>
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

                            {!! Form::open(['route' => 'clientes.store']) !!}
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
                                {!! Form::label('cpf', 'CPF:') !!}<br />
                                {!! Form::text('cpf', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('rg', 'RG:') !!}
                                {!! Form::text('rg', null, ['class'=>'form-control']) !!}
                            </div>
                        </p>
                    </div>
                    <div class="modal-footer">
                        {!! Form::open(['route' => 'clientes.store']) !!}

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
<!-- MODAL NOVO CLIENTE -->



        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th>
                        <a>
                            <button
                                    type="button"
                                    class="btn"
                                    data-toggle="modal"
                                    data-target="#novoCliente">
                                <i class="fas fa-user-plus"></i> Novo Cliente
                            </button>
                        </a>
                    </th>
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
                            <a href="{{route('clientes.edit', ['id'=>$cli->id])}}"
                               class="btn-sm btn-success"
                               title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{route('clientes.destroy', ['id'=>$cli->id])}}"
                               class="delete-modal btn-danger btn-sm"
                               title="Remover">
                                <i class="fas fa-remove"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <center>{!! $clientes->links() !!}</center>
    </div>
@endsection