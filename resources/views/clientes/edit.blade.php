@extends('adminlte::page')
@section('title', 'Sandubex')
@section('content_header')
<script type="text/javascript">
    function maiuscula(obj) {
        obj.value = obj.value.toUpperCase();
    }
</script>

    <div class="container">
        <h1>Editar Cliente</h1>

        {!! Form::open(['route' => ["clientes.update", $clientes->id], 'method'=>'put']) !!}
        <div class="form-group has-feedback {{ $errors->has('nome') ? 'has-error' : '' }}">
            {!! Form::label('nome', 'NOME:') !!}
            {!! Form::text('nome', $clientes->nome, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            @if ($errors->has('nome'))
                <span class="help-block">
                    <strong>{{ $errors->first('nome') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('telefone') ? 'has-error' : '' }}">
            {!! Form::label('telefone', 'TELEFONE:') !!}<br />
            {!! Form::text('telefone', $clientes->telefone, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'(00) 000000000', 'placeholder'=>'(00) 000000000']) !!}
            @if ($errors->has('telefone'))
                <span class="help-block">
                    <strong>{{ $errors->first('telefone') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
            {!! Form::label('email', 'E-MAIL:') !!}
            {!! Form::text('email', $clientes->email, ['class'=>'form-control']) !!}
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('cpf') ? 'has-error' : '' }}">
            {!! Form::label('cpf', 'CPF:') !!}<br />
            {!! Form::text('cpf', $clientes->cpf, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'000.000.000-00', 'placeholder'=>'000.000.000-00']) !!}
            @if ($errors->has('cpf'))
                <span class="help-block">
                    <strong>{{ $errors->first('cpf') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('rg') ? 'has-error' : '' }}">
            {!! Form::label('rg', 'RG:') !!}
            {!! Form::text('rg', $clientes->rg, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'0000000000', 'placeholder'=>'0000000000']) !!}
            @if ($errors->has('rg'))
                <span class="help-block">
                    <strong>{{ $errors->first('rg') }}</strong>
                </span>
            @endif
        </div>

        <div>
            {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

    </div>
@endsection