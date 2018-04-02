@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content')

    <div class="container">
        <h1>Fornecedor</h1>

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
                                {!! Form::text('nome', null, ['class'=>'form-control']) !!}
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
                                {!! Form::text('endereco', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('cnpj', 'CNPJ:') !!}
                                {!! Form::text('cnpj', null, ['class'=>'form-control']) !!}
                            </div>
                            <div>
                                {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </p>
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