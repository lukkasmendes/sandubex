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

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => ["fornecedors.update", $fornecedors->id], 'method'=>'put']) !!}
        <div class="form-group">
            {!! Form::label('nome', 'NOME:') !!}
            {!! Form::text('nome', $fornecedors->nome, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('telefone', 'TELEFONE:') !!}<br />
            {!! Form::text('telefone', $fornecedors->telefone, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'(00) 000000000', 'placeholder'=>'(00) 000000000']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'E-MAIL:') !!}
            {!! Form::text('email', $fornecedors->email, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('endereco', 'ENDEREÇO:') !!}<br />
            {!! Form::text('endereco', $fornecedors->endereco, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);', 'placeholder'=>'Informe o endereço completo do fornecedor']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('cnpj', 'CNPJ:') !!}
            {!! Form::text('cnpj', $fornecedors->cnpj, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'00.000.000/0000-00', 'placeholder'=>'00.000.000/0000-00']) !!}
        </div>

        <div>
            {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

    </div>
@endsection