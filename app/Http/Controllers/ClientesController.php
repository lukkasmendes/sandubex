<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;

class ClientesController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['getLogout', 'getRegister', 'postRegister']]);
    }

    public function index(){
        $clientes = Cliente::all();
        return view('clientes.index', ['clientes'=>$clientes]);
    }

    public function create(){
        return view('clientes.create');
    }

    public function destroy($id){
        try {
            $cliente = Cliente::findOrFail($id);
            $cliente->delete();
        } catch (QueryException $e) {
            flash()->error('Erro ao excluir cliente - Cliente vinculado');
            return redirect()->back();
        }
        \Session::flash('mensagem_sucesso', 'Cliente excluído com sucesso!');
        return redirect()->route('clientes');
    }

    public function edit($id){
        $clientes = Cliente::find($id);
        return view('clientes.edit', compact('clientes'));
    }

    public function update(ClienteRequest $request, $id){
        $cliente = Cliente::find($id)->update($request->all());
        return redirect()->route('clientes');
    }

    public function store(ClienteRequest $request){
        $novo_cliente = $request->all();
        Cliente::create($novo_cliente);

        return redirect()->route('clientes');
    }

    public function store2(ClienteRequest $request){
        $novo_cliente = $request->all();
        Cliente::create($novo_cliente);

        return redirect()->route('pedidos');
    }
}
