@extends('adminlte::page')
@section('title', 'Sandubex')
@section('content_header')
<script type="text/javascript">
    function maiuscula(obj) {
        obj.value = obj.value.toUpperCase();
    }
</script>

    <div class="container">
        <h1>Editar Fornecedor</h1>

        {!! Form::open(['route' => ["fornecedors.update", $fornecedors->id], 'method'=>'put']) !!}
        <div class="form-group has-feedback {{ $errors->has('nome') ? 'has-error' : '' }}">
            {!! Form::label('nome', 'NOME:') !!}
            {!! Form::text('nome', $fornecedors->nome, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            @if ($errors->has('nome'))
                <span class="help-block">
                    <strong>{{ $errors->first('nome') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('telefone') ? 'has-error' : '' }}">
            {!! Form::label('telefone', 'TELEFONE:') !!}<br />
            {!! Form::text('telefone', $fornecedors->telefone, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'(00) 000000000', 'placeholder'=>'(00) 000000000']) !!}
            @if ($errors->has('telefone'))
                <span class="help-block">
                    <strong>{{ $errors->first('telefone') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
            {!! Form::label('email', 'E-MAIL:') !!}
            {!! Form::text('email', $fornecedors->email, ['class'=>'form-control']) !!}
            @if ($errors->has('nome'))
                <span class="help-block">
                    <strong>{{ $errors->first('nome') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('endereco') ? 'has-error' : '' }}">
            {!! Form::label('endereco', 'ENDEREÇO:') !!}<br />
            {!! Form::text('endereco', $fornecedors->endereco, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);', 'placeholder'=>'Informe o endereço completo do fornecedor']) !!}
            @if ($errors->has('endereco'))
                <span class="help-block">
                    <strong>{{ $errors->first('endereco') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('cnpj') ? 'has-error' : '' }}">
            {!! Form::label('cnpj', 'CNPJ:') !!}
            {!! Form::text('cnpj', $fornecedors->cnpj, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'00.000.000/0000-00', 'placeholder'=>'00.000.000/0000-00']) !!}
            @if ($errors->has('cnpj'))
                <span class="help-block">
                    <strong>{{ $errors->first('cnpj') }}</strong>
                </span>
            @endif
        </div>

        <div>
            {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

    </div>
@endsection