@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content')
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
            {!! Form::label('nome', 'Nome:') !!}
            {!! Form::text('nome', $clientes->nome, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('telefone', 'Telefone:') !!}<br />
            {!! Form::text('telefone', $clientes->telefone, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'E-mail:') !!}
            {!! Form::text('email', $clientes->email, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('cpf', 'CPF:') !!}<br />
            {!! Form::text('cpf', $clientes->cpf, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('rg', 'RG:') !!}
            {!! Form::text('rg', $clientes->rg, ['class'=>'form-control']) !!}
        </div>
            <div>
                {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>
@endsection