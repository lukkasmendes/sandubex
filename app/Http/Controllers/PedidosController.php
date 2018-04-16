<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Produto;
use Illuminate\Support\Facades\DB;

class PedidosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getLogout', 'getRegister', 'postRegister']]);
    }

    public function index(){
        $clientes = Cliente::all();
        $data = DB::table('clientes')->get();
        $produtos = Produto::get();

        return view('pedidos.index',
            compact('data'),
            compact('clientes'),
            compact('produtos'));
    }



}
