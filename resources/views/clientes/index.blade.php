@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content')


    <div id="myModal"class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">


                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>


                <div class="modal-body">



                    <form class="form-horizontal" role="modal">

                        <div class="form-group">
                            <label class="control-label col-sm-2"for="id">ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fid" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2"for="title">Title</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="t">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2"for="body">Body</label>
                            <div class="col-sm-10">
                                <textarea type="name" class="form-control" id="b"></textarea>
                            </div>
                        </div>
                    </form>











                    {{-- Form Delete Post --}}
                    <div class="deleteContent">
                        Are You sure want to delete <span class="title"></span>?
                        <span class="hidden id"></span>
                    </div>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                        <span id="footer_action_button" class="glyphicon"></span>
                    </button>

                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class="glyphicon glyphicon"></span>close
                    </button>

                </div>
            </div>
        </div>
    </div>




    <div class="container">
        <h1>Cliente</h1>





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
                                {!! Form::label('cpf', 'CPF:') !!}<br />
                                {!! Form::text('cpf', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('rg', 'RG:') !!}
                                {!! Form::text('rg', null, ['class'=>'form-control']) !!}
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











        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th>
                        <button
                                type="button"
                                class="btn"
                                data-toggle="modal"
                                data-target="#novoCliente">
                            <i class="fas fa-user-plus"></i> Novo Cliente
                        </button>
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
                            <a href="{{route('clientes.edit', ['id'=>$cli->id])}}" class="btn-sm btn-success" title="Editar"><i class="fas fa-edit"></i></a>
                            <a href="{{route('clientes.destroy', ['id'=>$cli->id])}}" class="delete-modal btn-danger btn-sm" title="Remover"><i class="fas fa-remove"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <center>{!! $clientes->links() !!}</center>
    </div>
@endsection