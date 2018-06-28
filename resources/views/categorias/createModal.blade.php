<div class="modal fade" id="novaCategoria" tabindex="-1" role="dialog" aria-labelledby="novaCategoriaModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="novaCategoriaModal">Nova Categoria</h4>
            </div>
            <div class="modal-body">
                <p>
                    <script type="text/javascript">
                        function maiuscula(obj) {
                            obj.value = obj.value.toUpperCase();
                        }
                    </script>

                    {!! Form::open(['route' => 'categorias.store']) !!}
                    <div class="form-group has-feedback {{ $errors->has('descricao') ? 'has-error' : '' }}">
                        {!! Form::label('descricao', 'DESCRIÇÃO:') !!}
                        {!! Form::text('descricao', null, ['class'=>'form-control', 'placeholder'=>'Informe a descrição da categoria: bebidas, pães, carnes...', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
                        @if ($errors->has('descricao'))
                            <span class="help-block">
                                <strong>{{ $errors->first('descricao') }}</strong>
                            </span>
                        @endif
                    </div>
                </p>
            </div>
            <div class="modal-footer">
                {!! Form::open(['route' => 'categorias.store']) !!}

                <a
                        type="button"
                        class="btn btn-danger"
                        data-dismiss="modal">
                    Cancelar
                </a>
                {!! Form::submit('Criar Categoria', ['class'=>'btn btn-success']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>