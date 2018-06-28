<?php
namespace App\Http\Controllers;

use App\Categoria;
use App\Produto;
use App\Http\Requests\ProdutoRequest;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ProdutosController extends Controller{

    public function __construct(){
        $this->middleware('auth', ['except' => ['getLogout', 'getRegister', 'postRegister']]);
    }

    public function index(){
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

//select2
    public function create(){
        $data = DB::table('categorias')->get();
        $produto = Categoria::all();
        return view('produtos.create', ['produto' => $produto], compact('data'));
    }
//select2

    public function destroy($id){
        try {
            $produto = Produto::findOrFail($id);
            $produto->delete();
        } catch (QueryException $e) {
            flash()->error('Erro ao excluir produto - Produto em uso');
            return redirect()->back();
        }
        \Session::flash('mensagem_sucesso', 'Produto deletado com sucesso!');
        return redirect()->route('produtos');
    }

    public function edit($id){
        $data = DB::table('categorias')->get();
        $produto = Produto::find($id);
        return view('produtos.edit', compact('produto'), compact('data'));
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
        // $produto->precoCusto_est = $request->precoCusto_est;
        $produto->estoqueMin = $request->estoqueMin;
        // $produto->quantidade_est = $request->quantidade_est;
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
        $produto->estoque_id = $request->get('estoque_id');
        $produto->precoVenda = $request->get('precoVenda');
        $produto->estoqueMin = $request->get('estoqueMin');
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