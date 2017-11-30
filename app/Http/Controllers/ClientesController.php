<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getLogout', 'getRegister', 'postRegister']]);
    }

    public function index(){
        $clientes = Cliente::paginate(5);
        return view('clientes.index', ['clientes'=>$clientes]);
    }

    public function create(){
        return view('clientes.create');
    }

    public function destroy($id){
        Cliente::find($id)->delete();
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
}