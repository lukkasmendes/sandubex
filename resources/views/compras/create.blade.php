<!--  MODAL NOVA COMPRA -->
<div class="modal fade" id="novaCompra" tabindex="-1" role="dialog" aria-labelledby="novaCompraModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="novaCompraModal">Nova Compra</h4>
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

                {!! Form::open(['route' => 'compras.store']) !!}
                <div class="form-group">
                    {!! Form::label('dataEntrada', 'DATA ENTRADA:') !!}
                    {!! Form::dateTime('dataEntrada', $dataEntrada = Carbon\Carbon::now('America/Sao_Paulo')->format('d-m-Y H:i:s'), ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('quantidade', 'QUANTIDADE:') !!}
                    {!! Form::text('quantidade', null, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('precoCusto', 'PREÇO DE CUSTO:') !!}
                    {!! Form::text('precoCusto', '0.00', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('fornecedor_id', 'Fornecedor:') !!}
                    {{ Form::select('fornecedor_id',
                       \App\Fornecedor::orderBy('nome')->pluck('nome', 'id')->toArray(), null,
                       ['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {!! Form::label('produto_id', 'Produto:') !!}
                    {{ Form::select('produto_id',
                       \App\Produto::orderBy('nome')->pluck('nome', 'id')->toArray(), null,
                       ['class'=>'form-control']) }}
                </div>
                </p>
            </div>
            <div class="modal-footer">
                {!! Form::open(['route' => 'compras.store']) !!}

                <a
                        type="button"
                        class="btn btn-danger"
                        data-dismiss="modal">
                    Cancelar
                </a>

                {!! Form::submit('Registrar Compra', ['class'=>'btn btn-success']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!--  MODAL NOVA COMPRA -->