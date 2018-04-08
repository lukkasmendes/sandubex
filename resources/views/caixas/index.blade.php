@extends('adminlte::page')

@include('caixas.create')

@section('title', 'Sandubex')

@section('content_header')
    <div class="container">


        <h3 align="center"><i class="fas fa-hand-holding-usd"></i> Movimentação {{\Carbon\Carbon::now('America/Sao_Paulo')->format('d/m/Y')}}</h3>


        <table class="table table-striped table-bordered table-hover" id="example">
            <thead>
                <tr>
                    <th>Data/Hora</th>
                    <th>Entrada/Saída</th>
                    <th>Valor</th>
                    <th>Observação</th>
                    <th width="10px">
                        <a>
                            <button type="button"
                                    class="btn"
                                    data-toggle="modal"
                                    data-target="#novaMov">
                                <i class="fas fa-hand-holding-usd"></i>
                                Nova Movimentação
                            </button>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($caixas as $cai)
                    <tr align="center">
                        <td>{{date('d-m-Y H:i:s', strtotime($cai->data))}}</td>
                        @if($cai->tipo == 'S')
                            <td>SAÍDA</td>
                        @else
                            <td>ENTRADA</td>
                        @endif
                        <td>R$ {{number_format($cai->valor, 2)}}</td>
                        <td>{{$cai->observacao}}</td>
                        <td width="1%" nowrap="nowrap">

                            <a href="{{route('caixas.edit',
                                ['id'=>$cai->id])}}"
                                class="btn-sm btn-success"
                                title="Editar">
                                    <i class="fas fa-edit"></i>
                            </a>

<!-- BOTÃO MODAL EXCLUIR -->

                            <a  href=""
                                title="Excluir"
                                class="modal-del btn-danger btn-sm"
                                data-toggle="modal"
                                data-target="#id{{$cai->id}}">

                                <i class="fas fa-remove"></i>
                            </a>

<!-- BOTÃO MODAL EXCLUIR -->



<!-- MODAL EXCLUIR -->

                            <div    class="modal modal-danger fade"
                                    id="id{{ $cai->id}}"
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
                                                EXCLUIR @if($cai->tipo == 'S')
                                                            SAÍDA
                                                        @else
                                                            ENTRADA
                                                        @endif DE: R$ {{$cai->valor}}
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            TEM CERTEZA QUE DESEJA EXCLUIR?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('caixas.destroy', [$cai->id] )}}">
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