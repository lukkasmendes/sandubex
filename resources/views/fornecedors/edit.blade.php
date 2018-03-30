@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content')
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
            {!! Form::label('nome', 'Nome:') !!}
            {!! Form::text('nome', $fornecedors->nome, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('telefone', 'Telefone:') !!}<br />
            {!! Form::text('telefone', $fornecedors->telefone, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'E-mail:') !!}
            {!! Form::text('email', $fornecedors->email, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('endereco', 'Endereco:') !!}<br />
            {!! Form::text('endereco', $fornecedors->endereco, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('cnpj', 'CNPJ:') !!}
            {!! Form::text('cnpj', $fornecedors->cnpj, ['class'=>'form-control']) !!}
        </div>
            <div>
                {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>
@endsection