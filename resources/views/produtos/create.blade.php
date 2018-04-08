@extends('adminlte::page')

@section('title', 'Sandubex')

@section('content_header')

<script type="text/javascript">
    function maiuscula(obj) {
        obj.value = obj.value.toUpperCase();
    }
</script>

<!-- MODAL NOVA CATEGORIA -->

    <div class="modal fade" id="novaCategoria" tabindex="-1" role="dialog" aria-labelledby="novaCategoriaModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="novaCategoriaModal">Nova Categoria</h4>
                </div>
                <div class="modal-body">
                    <p>
                        <script type="text/javascript">

                            function maiuscula(obj) {
                                obj.value = obj.value.toUpperCase();
                            }

                        </script>

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
                            {!! Form::text('descricao', null, ['class'=>'form-control', 'placeholder'=>'Informe a descrição da categoria: bebidas, pães, carnes...', 'style'=>'text-transform:uppercase', 'onblur'=>'maiuscula(this);']) !!}
                        </div>

                    </p>
                </div>
                <div class="modal-footer">
                    {!! Form::open(['route' => 'categorias.store']) !!}

                    <a
                            type="button"
                            class="btn btn-danger"
                            data-dismiss="modal">
                        Cancelar
                    </a>

                    {!! Form::submit('Criar Categoria', ['class'=>'btn btn-success']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

<!-- MODAL NOVA CATEGORIA -->







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
                {!! Form::label('precoCusto', 'Preço de Custo:') !!}
                {!! Form::text('precoCusto', null, ['class'=>'form-control', 'placeholder'=>'Quanto você pagou por este produto', 'style'=>'text-transform:uppercase']) !!}
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
                {!! Form::label('estoque', 'Estoque Atual:') !!}
                {!! Form::text('estoque', null, ['class'=>'form-control', 'placeholder'=>'Informe a quantidade deste produto', 'style'=>'text-transform:uppercase']) !!}
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