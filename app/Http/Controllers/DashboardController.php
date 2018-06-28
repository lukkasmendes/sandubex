<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\PedidoProduto;
use Illuminate\Database\Query\Builde;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Produto;
use App\Caixa;
use Redirect;
use PDF;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Response;


class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['getLogout', 'getRegister', 'postRegister']]);
    }

    public function index(){
        $data = DB::table('categorias')->get();
        return view('dashboard.index', compact('data'));
    }

    public function produtomais(){
        $req = Request();
        $dtin = $req->input('dtin');
        $dtfl = $req->input('dtfl');

        $dtformi = Carbon::createFromFormat('d/m/Y', $dtin);
        $dtformi->format('Y-m-d');

        $dtformf = Carbon::createFromFormat('d/m/Y', $dtfl);
        $dtformf->format('Y-m-d');

        $promais = PedidoProduto::with('produto')
            ->select(DB::raw('count(produto_id) as produto_id'), 'p.nome as pro')
            ->join('produtos as p', 'p.id','=','produto_id')
            ->whereBetween('pedido_produtos.created_at', [$dtformi, $dtformf])
            ->groupBy('produto_id')
            ->orderBy('produto_id','desc')
            ->get();

        return view('relatorios.pdfview', compact( 'promais','dtin', 'dtfl'));
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
            ->where('c.nome','!=','CLIENTE PADRAO')
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

        return view('relatorios.tot_entradas', compact('tote', 'tots', 'dtformi2', 'dtformf2', 'dtin2', 'dtfl2'));
    }

    public function cx(Request $request){
        $req = Request();
        $dat = $req->input('dt');

        $dt = Carbon::createFromFormat('d/m/Y', $dat);
        $dt = $dt->format('Y-m-d');

        $caixas = DB::select("select c.*, c.cliente_id, cl.nome as cliente from caixas c, clientes cl where c.cliente_id = cl.id and data like '".$dt."%'");

        return view('relatorios.cx', compact('caixas', 'dat', 'dt'));
    }

    public function prodcat(){
        $req = Request();
        $cat = $req->input('categoriaid');

        $catego = DB::select("SELECT p.*, c.descricao as categoria FROM produtos p, categorias c where p.categoria_id = c.id
                                and p.categoria_id = ?", [$cat]);

        return view('relatorios.prodcat', compact('catego', 'cat'));
    }

    public function image($id){
        $produto = Produto::find($id);
        $img = Image::make($produto->imagem);
        $response = Response::make($img->encode('jpg'));
        $response->header('Content-Type','image/jpg');
        return $response;
    }
}
