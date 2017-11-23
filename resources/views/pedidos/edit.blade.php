@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Categoria</h1>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => ["categorias.update", $categoria->id], 'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('descricao', 'Descrição:') !!}
                {!! Form::text('descricao', $categoria->descricao, ['class'=>'form-control']) !!}
            </div>
            <div>
                {!! Form::submit('Editar Categoria', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>
@endsection