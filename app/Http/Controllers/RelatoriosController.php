<?php

namespace App\Http\Controllers;

use App\Categoria;
use Carbon\Carbon;
use App\Http\Requests\CategoriaRequest;
use App\PedidoProduto;
use Illuminate\Database\Query\Builde;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Produto;
use App\Caixa;
use App\Http\Requests\CaixaRequest;
use Redirect;
use PDF;
use App\Http\Requests;


class RelatoriosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getLogout', 'getRegister', 'postRegister']]);
    }

    public function index(){
        return view('relatorios.index');
    }

    public function produtomais(){
        $req = Request();
        $dtin = $req->input('dtin');
        $dtfl = $req->input('dtfl');


        $dtformi = Carbon::createFromFormat('d/m/Y', $dtin);
        $dtformi->format('Y-m-d');

        $dtformf = Carbon::createFromFormat('d/m/Y', $dtfl);
        $dtformf->format('Y-m-d');



/*        $consulta = PedidoProduto::with('produto')
            ->select(DB::raw('count(pedido_produto.produto_id as soma', 'pedido_produtos.id', 'pedido_produtos.produto_id'))
            ->join('produtos as p', 'produto_id','=','p.id')
            ->whereBetween('created_at', ['2018-06-01', '2018-06-30'])
            ->groupBy('produto_id')
            ->orderBy('soma','desc');*/

        /*$consulta = DB::table('pedido_produtos as pp')
            ->select(DB::raw('count(pp.produto_id as soma', 'pp.id', 'pp.produto_id'))
            ->join('produtos as p', 'p.id', 'pp.produto_id')
            ->whereBetween('pp.created_at', ['2018-06-01', '2018-06-30'])
            ->groupBy('pp.id','pp.produto_id')
            ->orderBy('count(pp.produto_id)','desc');*/


        /*FUNCIONOU SEM O COUNT
         * $consulta = PedidoProduto::with('produto')
            ->select('pedido_produtos.id', 'pedido_produtos.produto_id')
            ->join('produtos as p', 'pedido_produtos.produto_id','=','p.id')
            ->whereBetween('pedido_produtos.created_at', ['2018-06-01', '2018-06-30'])
            ->groupBy('pedido_produtos.produto_id','pedido_produtos.id')
            ->get();*/


/*        FUNCIONOU SEM O COUNT
            $consulta = DB::table('pedido_produtos as pp')
            ->select('pp.id', 'pp.produto_id')
            ->join('produtos as p', 'p.id', 'pp.produto_id')
            ->whereBetween('pp.created_at', ['2018-06-01', '2018-06-30'])
            ->groupBy('pp.id','pp.produto_id')
            ->get();*/


        $contador = $this->getContador();
        $consulta = $this->getProdMais();



        $promais = PedidoProduto::with('produto')
            ->select(DB::raw('count(produto_id) as produto_id'), 'p.nome as pro')
            ->join('produtos as p', 'p.id','=','produto_id')
            ->whereBetween('pedido_produtos.created_at', [$dtformi, $dtformf])
            ->groupBy('produto_id')
            ->orderBy('produto_id','desc')
            ->get();



        //dd($consulta);
        //dd($promais);
        return view('relatorios.pdfview', compact( 'promais','dtin', 'dtfl'));
    }

    public function getProdMais(){
        return PedidoProduto::with('produto')
            ->select('pedido_produtos.produto_id')
            ->join('produtos as p', 'pedido_produtos.produto_id','=','p.id')
            ->whereBetween('pedido_produtos.created_at', ['2018-06-01', '2018-06-30'])
            ->groupBy('pedido_produtos.produto_id')
            ->get();
    }

    public function getContador(){
        return DB::table('pedido_produtos as pp')
            ->select(DB::raw('count(pp.produto_id)'))
            ->join('produtos as p', 'p.id', 'pp.produto_id')
            ->whereBetween('pp.created_at', ['2018-06-01', '2018-06-30'])
            ->groupBy('pp.produto_id')
            ->count('pp.produto_id');
    }





    public function climais(){
        $req = Request();
        $dtin3 = $req->input('dtin3');
        $dtfl3 = $req->input('dtfl3');

        $dtformi3 = Carbon::createFromFormat('d/m/Y', $dtin3);
        $dtformi3->format('Y-m-d');

        $dtformf3 = Carbon::createFromFormat('d/m/Y', $dtfl3);
        $dtformf3->format('Y-m-d');

        $climais = Caixa::with('cliente')
            ->select(DB::raw('count(cliente_id) as cliente_id'), 'c.nome as cli')
            ->join('clientes as c', 'c.id','=','cliente_id')
            ->whereBetween('data', [$dtformi3, $dtformf3])
            ->groupBy('cliente_id')
            ->get();

        return view('relatorios.climais', compact('climais','cliente',  'dtformi3', 'dtformf3', 'dtin3', 'dtfl3'));
    }





    public function tot_entradas(){
        $req = Request();
        $dtin2 = $req->input('dtin2');
        $dtfl2 = $req->input('dtfl2');


        $dtformi2 = Carbon::createFromFormat('d/m/Y', $dtin2);
        $dtformi2->format('Y-m-d');

        $dtformf2 = Carbon::createFromFormat('d/m/Y', $dtfl2);
        $dtformf2->format('Y-m-d');


        $tote = DB::table('caixas')
            ->select('valor')
            ->where('tipo','E')
            ->whereBetween('data', [$dtformi2, $dtformf2])
            ->sum('valor');

        $tots = DB::table('caixas')
            ->select('valor')
            ->where('tipo','S')
            ->whereBetween('data', [$dtformi2, $dtformf2])
            ->sum('valor');

        //dd($tote);
        return view('relatorios.tot_entradas', compact('tote', 'tots', 'dtformi2', 'dtformf2', 'dtin2', 'dtfl2'));
    }

}
