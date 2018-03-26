<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Http\Requests\ProdutoRequest;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ProdutosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getLogout', 'getRegister', 'postRegister']]);
    }

    public function index(){
        $produtos = Produto::paginate(3);
        return view('produtos.index', compact('produtos'));
    }

    public function create(){
        return view('produtos.create');
    }

    public function destroy($id){
        Produto::find($id)->delete();
        return redirect()->route('produtos');
    }

    public function edit($id){
        $produto = Produto::find($id);
        return view('produtos.edit', compact('produto'));
    }

    public function update(ProdutoRequest $request, $id){
        $this->validate($request, [
            'imagem' => 'required|mimes:jpeg,png,bmp,jpg,gif,svg|max:2048',
        ]);

        $produto = Produto::find($id);

        $file = Input::file('imagem');
        $img = Image::make($file)->resize(50, 150);
        Response::make($img->encode('jpg'));

        $produto->nome = $request->nome;
        $produto->categoria_id = $request->categoria_id;
        $produto->unidade = $request->unidade;
        $produto->precoVenda = $request->precoVenda;
        $produto->precoCusto = $request->precoCusto;
        $produto->estoqueMin = $request->estoqueMin;
        $produto->estoque = $request->estoque;
        $produto->validade = $request->validade;
        $produto->descricao = $request->descricao;
        $produto->imagem = $img;
        $produto->save();

        return redirect()->route('produtos');
    }

    public function store(ProdutoRequest $request){
        $this->validate($request, [
            'imagem' => 'required|mimes:jpeg,png,bmp,jpg,gif,svg|max:2048',
        ]);

        $file = Input::file('imagem');
        $img = Image::make($file)->resize(50, 150);
        Response::make($img->encode('jpg'));

        $produto = new Produto();
        $produto->nome = $request->get('nome');
        $produto->categoria_id = $request->get('categoria_id');
        $produto->unidade = $request->get('unidade');
        $produto->precoVenda = $request->get('precoVenda');
        $produto->precoCusto = $request->get('precoCusto');
        $produto->estoqueMin = $request->get('estoqueMin');
        $produto->estoque = $request->get('estoque');
        $produto->validade = $request->get('validade');
        $produto->descricao = $request->get('descricao');
        $produto->imagem = $img;
        $produto->save();

        return redirect()->route('produtos');
    }

    public function image($id){
        $produto = Produto::find($id);
        $img = Image::make($produto->imagem);
        $response = Response::make($img->encode('jpg'));
        $response->header('Content-Type','image/jpg');
        return $response;
    }
}