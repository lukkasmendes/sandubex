@extends('adminlte::page')

@include('categorias.create')

@section('title', 'Sandubex')

@section('content_header')

<script type="text/javascript">
    function maiuscula(obj) {
        obj.value = obj.value.toUpperCase();
    }
</script>

    <div class="container" enctype="multipart/form-data">

        <h1>Novo Produto</h1>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => 'produtos.store', 'files'=>'true']) !!}
            <div class="form-group">
                {!! Form::label('nome', 'Nome:') !!}
                {!! Form::text('nome', null, ['class'=>'form-control', 'placeholder'=>'Infome o nome do produto', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div>


            <div class="form-group">


<!-- Select2 -->

                {!! Form::label('categoria_id', 'Categoria:') !!}

                <a
                        class="btn btn-success"
                        data-toggle="modal"
                        title="Nova Categoria"
                        data-target="#novaCategoria">
                    <i class="fas fa-plus"></i>
                </a>

                <br/>

                <select id="categoriaid" class="form-control m-bot15" name="categoria_id">
                    <option>Selecione uma categoria</option>

                        @foreach($data as $cat)
                            <option value="{{ $cat->id }}">
                                {{ $cat->descricao }}
                            </option>
                        @endforeach

                </select>

<!-- Select2 -->


            </div>


            <div class="form-group">
                {!! Form::label('unidade', 'Unidade:') !!}
                {!! Form::text('unidade', null, ['class'=>'form-control', 'placeholder'=>'Unidade de medida: unidade, litros, kg...', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div>





            <div class="form-group">
                {!! Form::label('precoCusto_est', 'Preço de Custo:') !!}
                {!! Form::text('precoCusto_est', "0.00", ['class'=>'form-control', 'placeholder'=>'0.00', 'title' => 'ESTE VALOR APARECERÁ QUANDO FIZER UMA COMPRA DESTE PRODUTO', 'disabled' => 'disabled', 'style'=>'text-transform:uppercase']) !!}
            </div>





            <div class="form-group">
                {!! Form::label('precoVenda', 'Preço de Venda:') !!}
                {!! Form::text('precoVenda', null, ['class'=>'form-control', 'placeholder'=>'Quanto este produto vai custar para o cliente', 'style'=>'text-transform:uppercase'], number_format(2)) !!}
            </div>
            <div class="form-group">
                {!! Form::label('estoqueMin', 'Estoque Mínimo:') !!}
                {!! Form::text('estoqueMin', null, ['class'=>'form-control', 'placeholder'=>'Informe a quantidade mínima que este produto deve ter', 'style'=>'text-transform:uppercase']) !!}
            </div>




            <div class="form-group">
                {!! Form::label('quantidade_est', 'Estoque Atual:') !!}
                {!! Form::text('quantidade_est', "0", ['class'=>'form-control', 'placeholder'=>'0', 'title' => 'ESTE VALOR APARECERÁ QUANDO FIZER UMA COMPRA DESTE PRODUTO', 'disabled' => 'disabled', 'style'=>'text-transform:uppercase']) !!}
            </div>




            <div class="form-group">
                {!! Form::label('validade', 'Validade:') !!}
                {!! Form::text('validade', null, ['class'=>'form-control', 'placeholder'=>'Informe a validade deste produto', 'style'=>'text-transform:uppercase']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('descricao', 'Descrição:') !!}
                {!! Form::text('descricao', null, ['class'=>'form-control', 'placeholder'=>'Informe uma breve descrição deste produto', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('imagem', 'Imagem do Produto:') !!}
                {!! Form::file('imagem', null, ['class'=>'form-control']) !!}
            </div>
            <div>
                {!! Form::submit('Criar Produto', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#categoriaid").select2();
        });
    </script>
@endsection