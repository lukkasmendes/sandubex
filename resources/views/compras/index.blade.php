@extends('adminlte::page')
@section('title', 'Sandubex')
@section('content_header')
    <div class="container">
        <h3 align="center"><i class="fas fa-shopping-cart"></i> Compras</h3>

        <table class="table table-striped table-bordered table-hover" id="compras" style="width:100%">
            <thead>
            <tr>
                <th>Código</th>
                <th>Data Entrada</th>
                <th>Quantidade</th>
                <th>Preço de Custo</th>
                <th>Total Gasto</th>
                <th>Fornecedor</th>
                <th>Produto</th>
                <th>
                    <a href="{{route('compras.create')}}">
                        <button type="button" class="btn">
                            <i class="fas fa-cart-plus"></i> Nova Compra
                        </button>
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($compras as $com)
                <tr align="center">
                    <td width="1%" nowrap="nowrap">{{$com->id}}</td>
                    <td>{{date('d/m/Y H:i:s', strtotime($com->dataEntrada))}}</td>
                    <td>{{$com->quantidade}} {{$com->produto->unidade}}</td>
                    <td>R$ {{number_format($com->precoCusto, 2, ',', '')}}</td>
                    <td>R$ {{number_format($com->quantidade*$com->precoCusto, 2, ',', '')}}</td>
                    <td width="1%" nowrap="nowrap">{{$com->fornecedor->nome}}</td>
                    <td width="1%" nowrap="nowrap">{{$com->produto->nome}}</td>
                    <td width="1%" nowrap="nowrap">
                        <a href="{{route('compras.edit', ['id'=>$com->id])}}"
                           class="btn-sm btn-success"
                           title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>

<!-- BOTÃO MODAL EXCLUIR -->
                        <a  href=""
                            title="Excluir"
                            class="modal-del btn-danger btn-sm"
                            data-toggle="modal"
                            data-target="#id{{$com->id}}">

                            <i class="fas fa-remove"></i>
                        </a>
<!-- BOTÃO MODAL EXCLUIR -->

<!-- MODAL EXCLUIR -->
                        <div    class="modal modal-danger fade"
                                id="id{{ $com->id}}"
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
                                            EXCLUIR COMPRA: {{$com->produto->nome}}
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        TEM CERTEZA QUE DESEJA EXCLUIR?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('compras.destroy', [$com->id] )}}">
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

