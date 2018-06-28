<?php

namespace App\Http\Controllers;

use App\PedidoProduto;
use Carbon\Carbon;
use App\Caixa;
use App\Http\Requests\CaixaRequest;
use Illuminate\Database\Query\Builde;
use Illuminate\Support\Facades\DB;
use Redirect;
use PDF;
use Illuminate\Http\Request;

class CaixasController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['getLogout', 'getRegister', 'postRegister']]);
    }

    public function index(){
        $where = 'Extract(day From data) = Extract(day From Now()) and Extract(month From data) = Extract(month From Now()) and Extract(year From data) = Extract(year From Now())';
        $caixas = Caixa::whereRaw($where)->paginate(9999);

        $pedido_produto = PedidoProduto::all();

        $data1 = DB::table('clientes')->get();

        return view('caixas.index', compact('caixas', 'pedido_produto', 'data1'));
    }

    public function pdfview(Request $request){
        $req = Request();
        $id = $req->input('imprpdf');

        $pedido_produto = DB::select('select count(pp.produto_id) as pedpro, p.nome as pro, c.nome as cli, pp.observacao, pp.formaPagamento, pe.created_at as dat, sum(pp.valor) as soma
                                        from pedido_produtos pp, produtos p, pedidos pe, clientes c
                                        where p.id = pp.produto_id
                                        and pe.id = pp.pedido_id
                                        and c.id = pp.cliente_id
                                        and pedido_id = ?
                                        group by pp.produto_id, p.nome, c.nome, pp.observacao, pp.formaPagamento, pe.created_at, pp.valor', [$id]);

        if($request->has('download')){
            $pdf = PDF::loadView('caixas.pdfview');
            return $pdf->stream();
        }

        return view('caixas.pdfview', compact('id', 'pedido_produto'));
    }

    public function create(){
        $data1 = DB::table('clientes')->get();
        return view('caixas.create', compact('data1'));
    }

    public function destroy($id){
        Caixa::find($id)->delete();
        return redirect()->route('caixas');
    }

    public function edit($id){
        $caixa = Caixa::find($id);
        $data1 = DB::table('clientes')->get();
        $caixas = Caixa::find($id);
        return view('caixas.edit', compact('caixa', 'caixas', 'data1'));
    }

    public function update(CaixaRequest $request, $id){
        $caixa = Caixa::find($id);
        $caixa->update($request->all());

        return redirect()->route('caixas');
    }

    public function store(CaixaRequest $request){
        $caixa = new Caixa();

        $data = $request->get('data');
        $data_formatada = Carbon::createFromFormat('d-m-Y H:i:s', $data);
        $data_formatada->format('Y-m-d H:i:s');

        $caixa->data = $data_formatada;
        $caixa->tipo = $request->get('tipo');
        $caixa->valor = $request->get('valor');
        $caixa->observacao = $request->get('observacao');
        $caixa->save();

        return redirect()->route('caixas');
    }

    public function getCaixa(){
        $dado = Caixa::all();
        return $dado;
    }
}
