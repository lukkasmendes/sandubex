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