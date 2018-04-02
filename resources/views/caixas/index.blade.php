@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content_header')
    <div class="container">


<!--  MODAL NOVA MOVIMENTAÇÃO -->

        <div class="modal fade" id="novaMov" tabindex="-1" role="dialog" aria-labelledby="novaMovModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close"
                                data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="novaMovModal">Nova Movimentação</h4>
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

                            {!! Form::open(['route' => 'caixas.store']) !!}
                            <div class="form-group">
                                {!! Form::label('data', 'DATA:') !!}
                                {!! Form::dateTime('data', $data = Carbon\Carbon::now('America/Sao_Paulo')->format('d-m-Y H:i:s'), ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('tipo', 'ENTRADA/SAÍDA DE CAIXA:') !!}<br />
                                {!! Form::select('tipo', array('E' => 'ENTRADA','S' => 'SAÍDA'), null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('valor', 'VALOR:') !!}
                                {!! Form::text('valor', '0.00', ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('observacao', 'OBSERVAÇÃO:') !!}
                                {!! Form::text('observacao', null, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
                            </div>

                        </p>
                    </div>
                    <div class="modal-footer">
                        {!! Form::open(['route' => 'caixas.store']) !!}

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

<!--  MODAL NOVA MOVIMENTAÇÃO -->



        <h1><i class="fas fa-hand-holding-usd"></i> Movimentação {{\Carbon\Carbon::now('America/Sao_Paulo')->format('d/m/Y')}}</h1>


        <table class="table table-striped table-bordered table-hover">
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

                            <a href="{{route('caixas.destroy',
                                ['id'=>$cai->id])}}"
                                class="btn-sm btn-danger"
                                title="Remover">
                                    <i class="fas fa-remove"></i>
                            </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <center>{!! $caixas->links() !!}</center>
    </div>
@endsection