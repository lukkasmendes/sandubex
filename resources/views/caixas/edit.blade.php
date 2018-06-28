@extends('adminlte::page')
@section('title', 'Sandubex')
@section('content_header')
<script type="text/javascript">
    function maiuscula(obj) {
        obj.value = obj.value.toUpperCase();
    }
</script>
    <div class="container">
        <h1>Editar Movimentação</h1>

        {!! Form::open(['route' => ["caixas.update", $caixa->id], 'method'=>'put']) !!}
        <div class="form-group">
            {!! Form::label('data', 'Data:') !!}
            {!! Form::dateTime('data', $caixa->data, ['class'=>'form-control', 'disabled' => 'disabled']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('cliente_id', 'CLIENTE:') !!}

            <br/>

            <select id="clienteid" class="form-control m-bot15" name="cliente_id" style="width: 100%">
                <option value="{{$caixas->cliente->id}}" class="form-control">{{$caixas->cliente->nome}}</option>
                @foreach($data1 as $cli)
                    <option class="form-control" value="{{ $cli->id }}">
                        {{ $cli->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {!! Form::label('tipo', 'Entrada/Saída de caixa:') !!}<br />
            {!! Form::select('tipo', array('E' => 'Entrada','S' => 'Saída'), $caixa->tipo, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group has-feedback {{ $errors->has('valor') ? 'has-error' : '' }}">
            {!! Form::label('valor', 'Valor:') !!}
            {!! Form::text('valor', $caixa->valor, ['class'=>'form-control simple-field-data-mask-reverse', 'data-mask'=>'#0.00', 'data-mask-reverse'=>'true', 'data-mask-maxlength'=>'false', 'placeholder'=>'0.00']) !!}
            @if ($errors->has('valor'))
                <span class="help-block">
                        <strong>{{ $errors->first('valor') }}</strong>
                    </span>
            @endif
        </div>
        <div class="form-group has-feedback {{ $errors->has('observacao') ? 'has-error' : '' }}">
            {!! Form::label('observacao', 'Observação:') !!}
            {!! Form::text('observacao', $caixa->observacao, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);', 'maxlength'=>'25']) !!}
            @if ($errors->has('observacao'))
                <span class="help-block">
                    <strong>{{ $errors->first('observacao') }}</strong>
                </span>
            @endif
        </div>
        <div>
            {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection