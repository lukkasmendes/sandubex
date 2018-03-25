@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content')
    <div class="container">
        <h1>Novo Cliente</h1>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => 'clientes.store']) !!}
            <div class="form-group">
                {!! Form::label('nome', 'Nome:') !!}
                {!! Form::text('nome', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('telefone', 'Telefone:') !!}<br />
                {!! Form::text('telefone', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'E-mail:') !!}
                {!! Form::text('email', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('cpf', 'CPF:') !!}<br />
                {!! Form::text('cpf', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('rg', 'RG:') !!}
                {!! Form::text('rg', null, ['class'=>'form-control']) !!}
            </div>
            <div>
                {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>
@endsection