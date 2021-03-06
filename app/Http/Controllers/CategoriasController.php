<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Database\Query\Builde;
use Illuminate\Database\QueryException;

class CategoriasController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['getLogout', 'getRegister', 'postRegister']]);
    }

    public function index(){
        $categorias = Categoria::all();
        return view('categorias.index', ['categorias'=>$categorias]);
    }

    public function create(){
        return view('categorias.create');
    }

    public function destroy($id){
        try {
            $categoria = Categoria::findOrFail($id);
            $categoria->delete();
        } catch (QueryException $e) {
            flash()->error('Erro ao excluir categoria - Categoria em uso');
            return redirect()->back();
        }
        \Session::flash('mensagem_sucesso', 'Categoria deletada com sucesso!');
        return redirect()->route('categorias');
    }

    public function edit($id){
        $categoria = Categoria::find($id);
        return view('categorias.edit', compact('categoria'));
    }

    public function update(CategoriaRequest $request, $id){
        $categoria = Categoria::find($id)->update($request->all());
        return redirect()->route('categorias');
    }

    public function store(CategoriaRequest $request){
        $nova_categoria = $request->all();
        Categoria::create($nova_categoria);

        return redirect()->route('categorias');
    }
}
