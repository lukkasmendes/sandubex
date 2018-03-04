@extends('layouts.app')

<script type="text/javascript">

    function maiuscula(obj) {
        obj.value = obj.value.toUpperCase();
    }

</script>

@section('content')
    <div class="container">
        <h1>NOVA MOVIMENTAÇÃO</h1>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => 'caixas.store']) !!}
            <div class="form-group">
                {!! Form::label('data', 'DATA:') !!}
                {!! Form::dateTime('data', $data = Carbon\Carbon::now('America/Sao_Paulo')->format('d-m-Y H:i:s'), ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('tipo', 'ENTRADA/SAÍDA DE CAIXA:') !!}<br />
                {!! Form::select('tipo', array('E' => 'ENTRADA','S' => 'SAÍDA'), null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('valor', 'VALOR:') !!}
                {!! Form::text('valor', '0.00', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('formaPagamento', 'FORMA DE PAGAMENTO:') !!}<br />
                {!! Form::select('formaPagamento',
                                 array('DI' => 'DINHEIRO', 'DE' => 'DÉBITO', 'CR' => 'CRÉDITO', 'CH' => 'CHEQUE'),
                                 null,
                                 ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('observacao', 'OBSERVAÇÃO:') !!}
                {!! Form::text('observacao', null, ['class'=>'form-control', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div>
            <div>
                {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>
@endsection