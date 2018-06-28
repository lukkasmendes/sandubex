@extends('adminlte::page')
@section('title', 'Sandubex')
@section('content_header')
<script type="text/javascript">
    function maiuscula(obj) {
        obj.value = obj.value.toUpperCase();
    }
</script>
    <div class="container" enctype="multipart/form-data">
        <h1>Novo Fornecedor</h1>
        {!! Form::open(['route' => 'fornecedors.store']) !!}
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
        <div class="form-group has-feedback {{ $errors->has('endereco') ? 'has-error' : '' }}">
            {!! Form::label('endereco', 'ENDEREÇO:') !!}<br />
            {!! Form::text('endereco', null, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);', 'placeholder'=>'Informe o endereço completo do fornecedor']) !!}
            @if ($errors->has('endereco'))
                <span class="help-block">
                    <strong>{{ $errors->first('endereco') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group has-feedback {{ $errors->has('cnpj') ? 'has-error' : '' }}">
            {!! Form::label('cnpj', 'CNPJ:') !!}
            {!! Form::text('cnpj', null, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'00.000.000/0000-00', 'placeholder'=>'00.000.000/0000-00']) !!}
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
