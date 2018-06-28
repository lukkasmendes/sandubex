<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Produto;
use App\PedidoProduto;
use App\Pedido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;

class PedidosController extends Controller{
    private $produto;

    public function __construct(Produto $produto){
        $this->middleware('auth', ['except' => ['getLogout', 'getRegister', 'postRegister']]);
        $this->produto = $produto;
    }

    public function index(){
        $clientes = Cliente::all();

        $produtos = $this->getProdutos();

        $data = DB::table('clientes')->get();

        $pedidos = Pedido::where([
            'status'  => 'RE',
            'user_id' => Auth::id()
        ])->get();

        return view('pedidos.index', compact('data', 'clientes', 'produtos', 'pedidos'));
    }

    public function getProdutos(){
        return Produto::with('estoque')
            ->select('produtos.id',
                'produtos.nome',
                'produtos.categoria_id',
                'produtos.unidade',
                'produtos.estoque_id',
                'produtos.precoVenda',
                'produtos.validade',
                'produtos.estoqueMin',
                'produtos.descricao',
                'produtos.imagem')
            ->join('estoques as e', 'estoque_id','=', 'e.id')
            ->where('e.quantidade', '>', '0')
            ->paginate(9999);
    }

    public function adicionar(){
        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idproduto = $req->input('idr');

        $produto = Produto::find($idproduto);
        if( empty($produto->id) ) {
            $req->session()->flash('mensagem-falha', 'Produto não encontrado!');
            return redirect()->route('pedidos');
        }

        $idusuario = Auth::id();

        $idpedido = Pedido::consultaId([
            'user_id' => $idusuario,
            'status'  => 'RE' // Reservado
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

    public function adicionarBKPfuncionando(){
        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idproduto = $req->input('idr');

        $produto = Produto::find($idproduto);
        if( empty($produto->id) ) {
            $req->session()->flash('mensagem-falha', 'Produto não encontrado!');
            return redirect()->route('pedidos');
        }

        $idusuario = Auth::id();

        $idpedido = Pedido::consultaId([
            'user_id' => $idusuario,
            'status'  => 'RE' // Reservado
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

    public function remover(){
        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idpedido           = $req->input('pedido_id');
        $idproduto          = $req->input('produto_id');
        $remove_apenas_item = (boolean)$req->input('item');
        $idusuario          = Auth::id();

        $idpedido = Pedido::consultaId([
            'id'      => $idpedido,
            'user_id' => $idusuario,
            'status'  => 'RE' // Reservado
        ]);

        if( empty($idpedido) ) {
            $req->session()->flash('mensagem-falha', 'Pedido não encontrado!');
            return redirect()->route('pedidos');
        }

        $where_produto = [
            'pedido_id'  => $idpedido,
            'produto_id' => $idproduto
        ];

        $produto = PedidoProduto::where($where_produto)->orderBy('id', 'desc')->first();
        if( empty($produto->id) ) {
            $req->session()->flash('mensagem-falha', 'Produto não encontrado!');
            return redirect()->route('pedidos');
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

    public function cancelar(){
        PedidoProduto::where([
            'status' => 'RE'
        ])->delete();

        Pedido::where([
            'status' => 'RE'
        ])->delete();

        return redirect()->route('pedidos');
    }

    public function concluir(){
        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idpedido  = $req->input('pedido_id');
        $idcliente = $req->input('cliente_id');

        $obs = $req->get('observacao');

        //$obs = $req->input('obs');
        $pagar = $req->get('pagar_em');
        $idusuario = Auth::id();

        $check_pedido = Pedido::where([
            'id'      => $idpedido,
            'user_id' => $idusuario,
            'status'  => 'RE' // Reservado
        ])->exists();

        if( !$check_pedido ) {
            $req->session()->flash('mensagem-falha', 'Pedido não encontrado!');
            return redirect()->route('pedidos');
        }

        $check_produtos = PedidoProduto::where([
            'pedido_id' => $idpedido
        ])->exists();
        if(!$check_produtos) {
            $req->session()->flash('mensagem-falha', 'Produtos do pedido não encontrados!');
            return redirect()->route('pedidos');
        }

        PedidoProduto::where([
            'pedido_id' => $idpedido
        ])->update([
            'status' => 'PA',
            'cliente_id' => $idcliente,
            'observacao' => $obs,
            'formaPagamento' => $pagar
        ]);
        Pedido::where([
            'id' => $idpedido
        ])->update([
            'status' => 'PA'
        ]);

        $req->session()->flash('mensagem-sucesso', 'Pedido concluído com sucesso!');

        return redirect()->route('pedidos');
    }

    public function autocomplete(Request $request){
        $term = Input::get('term');
        $data = Cliente::where('nome', 'LIKE', '%'.$term.'%')
                        ->orWhere('cpf', 'LIKE', '%'.$term.'%')
                        ->take(10)
                        ->get();
        $results=array();
        foreach ($data as $key => $v){
            $results[]=['id'=>$v->id, 'value'=>$v->nome.' '.$v->cpf];
        }

        if(count($results))
            return response()->json($results);
        else
            return ['value'=>'Cliente não encontrado','id'=>''];
    }
}
