@extends('adminlte::page')
@section('title', 'Sandubex')
@section('content_header')
    <div class="container">

        <h3 align="center"><i class="fas fa-user"></i> Clientes</h3>

        <table class="table table-striped table-bordered table-hover" id="example">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th width="10px">
                        <a href="{{route('clientes.create')}}">
                            <button type="button" class="btn">
                                <i class="fas fa-barcode"></i> Novo Cliente
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

<!-- BOTÃO MODAL EXCLUIR -->

                            <a  href=""
                                title="Excluir"
                                class="modal-del btn-danger btn-sm"
                                data-toggle="modal"
                                data-target="#id{{$cli->id}}">

                                <i class="fas fa-remove"></i>
                            </a>

<!-- BOTÃO MODAL EXCLUIR -->



<!-- MODAL EXCLUIR -->

                            <div    class="modal modal-danger fade"
                                    id="id{{ $cli->id}}"
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
                                                EXCLUIR CLIENTE: {{$cli->nome}}
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            TEM CERTEZA QUE DESEJA EXCLUIR?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('clientes.destroy', [$cli->id] )}}">
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