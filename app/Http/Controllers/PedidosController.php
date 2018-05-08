<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Estoque;
use App\Produto;
use App\PedidoProduto;
use App\Pedido;
use Illuminate\Support\Facades\Auth;
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

        $pedidos = Pedido::where([
            'status'  => 'RE',
            'user_id' => Auth::id()
        ])->get();

        return view('pedidos.index',
            compact('data', 'clientes', 'produtos', 'pedidos'));
    }


    public function adicionar()
    {

        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idproduto = $req->input('id');

        $produto = Produto::find($idproduto);
        if( empty($produto->id) ) {
            $req->session()->flash('mensagem-falha', 'Produto não encontrado!');
            return redirect()->route('pedidos.index');
        }

        $idusuario = Auth::id();

        $idpedido = Pedido::consultaId([
            'user_id' => $idusuario,
            'status'  => 'RE' // Reservada
        ]);

        if( empty($idpedido) ) {
            $pedido_novo = Pedido::create([
                'user_id' => $idusuario,
                'status'  => 'RE'
            ]);

            $idpedido = $pedido_novo->id;

        }

        PedidoProduto::create([
            'pedido_id'  => $idpedido,
            'produto_id' => $idproduto,
            'valor'      => $produto->precoVenda,
            'status'     => 'RE'
        ]);

        $req->session()->flash('mensagem-sucesso', 'Produto adicionado com sucesso!');

        return redirect()->route('pedidos');

    }


    public function remover()
    {



        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idpedido           = $req->input('pedido_id');
        $idproduto          = $req->input('produto_id');
        $remove_apenas_item = (boolean)$req->input('item');
        $idusuario          = Auth::id();

        $idpedido = Pedido::consultaId([
            'id'      => $idpedido,
            'user_id' => $idusuario,
            'status'  => 'RE' // Reservada
        ]);

        if( empty($idpedido) ) {
            $req->session()->flash('mensagem-falha', 'Pedido não encontrado!');
            return redirect()->route('pedidos.index');
        }

        $where_produto = [
            'pedido_id'  => $idpedido,
            'produto_id' => $idproduto
        ];

        $produto = PedidoProduto::where($where_produto)->orderBy('id', 'desc')->first();
        if( empty($produto->id) ) {
            $req->session()->flash('mensagem-falha', 'Produto não encontrado!');
            return redirect()->route('carrinho.index');
        }

        if( $remove_apenas_item ) {
            $where_produto['id'] = $produto->id;
        }
        PedidoProduto::where($where_produto)->delete();

        $check_pedido = PedidoProduto::where([
            'pedido_id' => $produto->pedido_id
        ])->exists();

        if( !$check_pedido ) {
            Pedido::where([
                'id' => $produto->pedido_id
            ])->delete();
        }

        $req->session()->flash('mensagem-sucesso', 'Produto removido!');

        return redirect()->route('pedidos');
    }

}
