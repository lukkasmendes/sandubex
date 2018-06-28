<!-- MODAL NOVO CLIENTE -->
<div class="modal fade" id="novoCliente2" tabindex="-1" role="dialog" aria-labelledby="novoClienteModal">
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

                <script type="text/javascript">
                    function maiuscula(obj) {
                        obj.value = obj.value.toUpperCase();
                    }
                </script>

                {!! Form::open(['route' => 'clientes.store2']) !!}
                <div class="form-group has-feedback {{ $errors->has('nome') ? 'has-error' : '' }}">
                    {!! Form::label('nome', 'NOME:') !!}
                    {!! Form::text('nome', null, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
                    @if ($errors->has('nome'))
                        <span class="help-block">
                    <strong>{{ $errors->first('nome') }}</strong>
                </span>
                    @endif
                </div>


                <div class="form-group has-feedback {{ $errors->has('telefone') ? 'has-error' : '' }}">
                    {!! Form::label('telefone', 'TELEFONE:') !!}<br />
                    {!! Form::text('telefone', null, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'(00) 000000000', 'placeholder'=>'(00) 000000000']) !!}
                    @if ($errors->has('telefone'))
                        <span class="help-block">
                    <strong>{{ $errors->first('telefone') }}</strong>
                </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    {!! Form::label('email', 'E-MAIL:') !!}
                    {!! Form::text('email', null, ['class'=>'form-control']) !!}
                    @if ($errors->has('email'))
                        <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('cpf') ? 'has-error' : '' }}">
                    {!! Form::label('cpf', 'CPF:') !!}<br />
                    {!! Form::text('cpf', null, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'000.000.000-00', 'placeholder'=>'000.000.000-00']) !!}
                    @if ($errors->has('cpf'))
                        <span class="help-block">
                    <strong>{{ $errors->first('cpf') }}</strong>
                </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('rg') ? 'has-error' : '' }}">
                    {!! Form::label('rg', 'RG:') !!}
                    {!! Form::text('rg', null, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'0000000000', 'placeholder'=>'0000000000']) !!}
                    @if ($errors->has('rg'))
                        <span class="help-block">
                    <strong>{{ $errors->first('rg') }}</strong>
                </span>
                    @endif
                </div>
                </p>
            </div>
            <div class="modal-footer">
                {!! Form::open(['route' => 'clientes.store2']) !!}

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
<!-- MODAL NOVO CLIENTE -->