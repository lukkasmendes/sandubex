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

                {!! Form::open(['route' => 'fornecedors.store']) !!}
                <div class="form-group">
                    {!! Form::label('nome', 'NOME:') !!}
                    {!! Form::text('nome', null, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('telefone', 'TELEFONE:') !!}<br />
                    {!! Form::text('telefone', null, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'(00) 000000000', 'placeholder'=>'(00) 000000000']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'E-MAIL:') !!}
                    {!! Form::text('email', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('endereco', 'ENDEREÇO:') !!}<br />
                    {!! Form::text('endereco', null, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);', 'placeholder'=>'Informe o endereço completo do fornecedor']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cnpj', 'CNPJ:') !!}
                    {!! Form::text('cnpj', null, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'00.000.000/0000-00', 'placeholder'=>'00.000.000/0000-00']) !!}
                </div>
                </p>
            </div>
            <div class="modal-footer">
                {!! Form::open(['route' => 'fornecedors.store']) !!}

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
<!--  MODAL NOVO FORNECEDOR -->