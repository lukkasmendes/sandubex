@extends('adminlte::page')
@section('title', 'Sandubex')
@section('content_header')
    <div class="container" enctype="multipart/form-data">
        <h1>Nova Movimentação</h1>

            {!! Form::open(['route' => 'caixas.store']) !!}
            <div class="form-group">
                {!! Form::label('data', 'DATA:') !!}
                {!! Form::dateTime('data', $data = Carbon\Carbon::now('America/Sao_Paulo')->format('d-m-Y H:i:s'), ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('cliente_id', 'CLIENTE:') !!}

                <br/>

                <select id="clienteid" class="form-control m-bot15" name="cliente_id" style="width: 100%">
                    <option class="form-control">SELECIONE UM CLIENTE</option>
                    @foreach($data1 as $cli)
                        <option class="form-control" value="{{ $cli->id }}" selected="7">
                            {{ $cli->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                {!! Form::label('tipo', 'ENTRADA/SAÍDA DE CAIXA:') !!}<br />
                {!! Form::select('tipo', array('E' => 'ENTRADA', 'S' => 'SAÍDA'), null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group has-feedback {{ $errors->has('valor') ? 'has-error' : '' }}">
                {!! Form::label('valor', 'VALOR:') !!}
                {!! Form::text('valor', null, ['class'=>'form-control simple-field-data-mask-reverse', 'data-mask'=>'#0.00', 'data-mask-reverse'=>'true', 'data-mask-maxlength'=>'false', 'placeholder'=>'0.00']) !!}
                @if ($errors->has('valor'))
                    <span class="help-block">
                        <strong>{{ $errors->first('valor') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('observacao') ? 'has-error' : '' }}">
                {!! Form::label('observacao', 'OBSERVAÇÃO:') !!}
                {!! Form::text('observacao', null, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);', 'maxlength'=>'25']) !!}
                @if ($errors->has('observacao'))
                    <span class="help-block">
                        <strong>{{ $errors->first('observacao') }}</strong>
                    </span>
                @endif
            </div>

    </div>
    <div class="modal-footer">
        {!! Form::open(['route' => 'caixas.store']) !!}
            <a  type="button"
                class="btn btn-danger"
                data-dismiss="modal">
                Cancelar
            </a>
        {!! Form::submit('Registrar', ['class'=>'btn btn-success']) !!}

        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#clienteid").select2();
        });
    </script>

    <script type="text/javascript">
        function maiuscula(obj) {
            obj.value = obj.value.toUpperCase();
        }
    </script>
@endsection