@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nova Movimentação</h1>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => 'caixas.store']) !!}
            <div class="form-group">
                {!! Form::label('data', 'Data:') !!}
                {!! Form::dateTime('data', $data = Carbon\Carbon::now('America/Sao_Paulo')->format('d-m-Y H:i:s'), ['class'=>'form-control', 'disabled' => 'disabled']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('tipo', 'Entrada/Saída de caixa:') !!}<br />
                {!! Form::select('tipo', array('E' => 'Entrada','S' => 'Saída'), null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('valor', 'Valor:') !!}
                {!! Form::text('valor', '0.00', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('formaPagamento', 'Forma de pagamento:') !!}<br />
                {!! Form::select('formaPagamento',
                                 array('DI' => 'Dinheiro', 'DE' => 'Débito', 'CR' => 'Crédito', 'CH' => 'Cheque'),
                                 null,
                                 ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('observacao', 'Observação:') !!}
                {!! Form::text('observacao', null, ['class'=>'form-control']) !!}
            </div>
            <div>
                {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>
@endsection