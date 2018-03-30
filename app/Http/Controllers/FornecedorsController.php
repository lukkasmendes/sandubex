<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;
use App\Http\Requests\FornecedorRequest;

class FornecedorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getLogout', 'getRegister', 'postRegister']]);
    }

    public function index(){
        $fornecedors = Fornecedor::paginate(5);
        return view('fornecedors.index', ['fornecedors'=>$fornecedors]);
    }

    public function create(){
        return view('fornecedors.create');
    }

    public function destroy($id){
        Fornecedor::find($id)->delete();
        return redirect()->route('fornecedors');
    }

    public function edit($id){
        $fornecedors = Fornecedor::find($id);
        return view('fornecedors.edit', compact('fornecedors'));
    }

    public function update(FornecedorRequest $request, $id){
        $fornecedor = Fornecedor::find($id)->update($request->all());
        return redirect()->route('fornecedors');
    }

    public function store(FornecedorRequest $request){
        $novo_fornecedor = $request->all();
        Fornecedor::create($novo_fornecedor);

        return redirect()->route('fornecedors');
    }
}
