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

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => ["clientes.update", $clientes->id], 'method'=>'put']) !!}
        <div class="form-group">
            {!! Form::label('nome', 'NOME:') !!}
            {!! Form::text('nome', $clientes->nome, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('telefone', 'TELEFONE:') !!}<br />
            {!! Form::text('telefone', $clientes->telefone, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'(00) 000000000', 'placeholder'=>'(00) 000000000']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'E-MAIL:') !!}
            {!! Form::text('email', $clientes->email, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('cpf', 'CPF:') !!}<br />
            {!! Form::text('cpf', $clientes->cpf, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'000.000.000-00', 'placeholder'=>'000.000.000-00']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('rg', 'RG:') !!}
            {!! Form::text('rg', $clientes->rg, ['class'=>'form-control simple-field-data-mask', 'data-mask'=>'0000000000', 'placeholder'=>'0000000000']) !!}
        </div>

        <div>
            {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

    </div>
@endsection