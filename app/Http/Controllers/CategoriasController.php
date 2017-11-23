<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Http\Requests\CategoriaRequest;
use App\Produto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builde;


class CategoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getLogout', 'getRegister', 'postRegister']]);
    }

    public function index(){
        $categorias = Categoria::paginate(5);
        return view('categorias.index', ['categorias'=>$categorias]);
    }

    public function create(){
        return view('categorias.create');
    }

    public function destroy($id){
        if(Produto::where('categoria_id', $id)->count() == 0){
            Categoria::find($id)->delete();
            return redirect()->route('categorias');
        }else{
            echo "<h1>Você não pode excluir esta categoria pois existe um produto que a utiliza!</h1>";
        }
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
