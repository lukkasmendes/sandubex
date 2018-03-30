@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content')
    <div class="container">
        <h1>Novo Fornecedor</h1>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => 'fornecedors.store']) !!}
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
                {!! Form::label('endereco', 'Endereço:') !!}<br />
                {!! Form::text('endereco', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('cnpj', 'CNPJ:') !!}
                {!! Form::text('cnpj', null, ['class'=>'form-control']) !!}
            </div>
            <div>
                {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>
@endsection