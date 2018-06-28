@extends('adminlte::page')
@section('title', 'Sandubex')
@section('content_header')
    <div class="container">

        <h3 align="center"><i class="fas fa-hand-holding-usd"></i> Movimentação {{$dat}}</h3>

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
                    {{--<th width="10px">
                        <a>
                            <button type="button"
                                    class="btn"
                                    data-toggle="modal"
                                    data-target="#novaMov">
                                <i class="fas fa-hand-holding-usd"></i>
                                Nova Movimentação
                            </button>
                        </a>
                    </th>--}}
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

                    @if($cai->pedido_id != null)
                        @if($cai->formaPagamento == 'D')
                            <td>DINHEIRO</td>
                        @elseif($cai->formaPagamento == 'C')
                            <td>CHEQUE</td>
                        @elseif($cai->formaPagamento == 'CC')
                            <td>CARTÃO DE CRÉDITO</td>
                        @else
                            <td>CARTÃO DE DÉBITO</td>
                        @endif
                    @else
                        <td>-</td>
                    @endif

                        @if($cai->cliente_id == null)
                            <td>-</td>
                        @else
                            <td>{{$cai->cliente}}</td>
                        @endif

                @if($cai->pedido_id != null)
                    {!! Form::open(['route' => 'caixas.pdfview', 'target'=>'_blank']) !!}
                        <input type="hidden" name="imprpdf" value="{{$cai->pedido_id}}">
                        <td><button>Detalhes</button></td>
                    {!! Form::close() !!}
                @else
                    <td>-</td>
                @endif

                        <td width="10%">{{$cai->observacao}}</td>




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
                                                    and data like '".$dt."%'");

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
                                                    and data like '".$dt."%'");

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