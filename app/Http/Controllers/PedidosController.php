<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Produto;
use Illuminate\Support\Facades\DB;

class PedidosController extends Controller
{
    private $produto;

    public function __construct(Produto $produto)
    {
        $this->middleware('auth', ['except' => ['getLogout', 'getRegister', 'postRegister']]);
        $this->produto = $produto;
    }


    public function index(){
        $clientes = Cliente::all();
        $produtos = Produto::all();
        $data = DB::table('clientes')->get();

        return view('pedidos.index',
            compact('data', 'clientes', 'produtos'));
    }



}
