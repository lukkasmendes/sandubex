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
                    <th>Forma Pagamento</th>
                    <th>Cliente</th>
                    <th>Pedido</th>
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
                        <td>{{date('d/m/Y H:i:s', strtotime($cai->data))}}</td>
                        @if($cai->tipo == 'S')
                            <td>SAÍDA</td>
                        @else
                            <td>ENTRADA</td>
                        @endif
                        <td>R$ {{number_format($cai->valor, 2)}}</td>

                        @if($cai->formaPagamento == 'D')
                            <td>DINHEIRO</td>
                        @elseif($cai->formaPagamento == 'C')
                            <td>CHEQUE</td>
                        @elseif($cai->formaPagamento == 'CC')
                            <td>CARTÃO DE CRÉDITO</td>
                        @else
                            <td>CARTÃO DE DÉBITO</td>
                        @endif

                        <td>{{$cai->cliente->nome}}</td>

                        <td><a target="_blank" href="{{ route('pdfview',['id'=>$cai->pedido_id],['download'=>'pdf']) }}" title="MAIS DETALHES" value="{{$cai->pedido_id}}">Pedido nº: {{$cai->pedido_id}}</a></td>

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

        <div align="center">
            <h3>
                <span class="label label-success">Valor Total de ENTRADAS:
                    <?php
                        $conn = mysqli_connect("localhost","root","root","sandubex");

                        $sql = mysqli_query($conn, "select sum(valor) as quanti
                                                    from sandubex.caixas
                                                    where tipo='E'
                                                    and Extract(day From data) = Extract(day From Now())");

                        $row = mysqli_fetch_array($sql);
                        $quanti = $row['quanti'];

                        $conn = mysqli_close($conn);
                    ?>
                    @if($quanti == null)
                        R$ 0.00
                    @else
                        R$ {{$quanti}}
                    @endif
                </span>

                <span class="label label-danger">Valor Total de SAÍDAS:
                    <?php
                        $conn = mysqli_connect("localhost","root","root","sandubex");

                        $sql = mysqli_query($conn, "select sum(valor) as quant
                                                    from sandubex.caixas
                                                    where tipo='S'
                                                    and Extract(day From data) = Extract(day From Now())");

                        $row = mysqli_fetch_array($sql);
                        $quant = $row['quant'];

                        $conn = mysqli_close($conn);
                    ?>
                    @if($quant == null)
                        R$ 0.00
                    @else
                        R$ {{$quant}}
                    @endif
                </span>
            </h3>
        </div>
    </div>
@endsection