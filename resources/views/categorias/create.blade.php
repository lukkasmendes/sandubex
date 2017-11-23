@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nova Categoria</h1>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => 'categorias.store']) !!}
            <div class="form-group">
                {!! Form::label('descricao', 'Descrição:') !!}
                {!! Form::text('descricao', null, ['class'=>'form-control', 'placeholder'=>'Informe a descrição da categoria: bebidas, pães, carnes...']) !!}
            </div>
            <div>
                {!! Form::submit('Criar Categoria', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>
@endsection