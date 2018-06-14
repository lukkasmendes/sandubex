<?php

namespace App\Http\Controllers;

use App\PedidoProduto;
use App\Produto;
use Carbon\Carbon;
use App\Caixa;
use App\Http\Requests\CaixaRequest;
use Illuminate\Database\Query\Builde;
use Illuminate\Support\Facades\DB;
use Redirect;
use PDF;
use App\Http\Requests;
use Illuminate\Http\Request;

class CaixasController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['getLogout', 'getRegister', 'postRegister']]);
    }

    public function index(){
        $where = 'Extract(day From data) = Extract(day From Now()) and Extract(month From data) = Extract(month From Now()) and Extract(year From data) = Extract(year From Now())';
        $caixas = Caixa::whereRaw($where)->paginate(9999);

//        $whereE = 'Extract(day From data) = Extract(day From Now())';
//        $entrada = DB::table('caixas')
//                        ->select(DB::raw('sum(valor) as quanti'))
//                        ->where('tipo','E')
//                        ->where('Extract(day From data)', 'Extract(day From Now())')
//                        ->get();

//        return view('caixas.index', ['caixas'=>$caixas], compact('entrada'));

        return view('caixas.index', ['caixas'=>$caixas]);
    }

    public function pdfview(Request $request, $id){
//        $items = DB::table("caixas")->get();

/*        $pedido_produto = DB::table('pedido_produtos')
            ->where('pedido_id', [$id])
            ->get();  */

        $sum = DB::table('pedido_produtos')->select('valor')->where('pedido_id', [$id])->groupBy('pedido_id')->sum('valor');

        $ped_prod = Caixa::all();

        $pedido_produto = DB::table('pedido_produtos')
            ->select('pedido_id', 'produto_id', 'valor', 'cliente_id', 'formaPagamento', 'observacao')
            ->where('pedido_id', [$id])
//            ->groupBy('produto_id', 'valor', 'cliente_id', 'formaPagamento', 'observacao')
            ->get();
//            ->sum('valor');

        view()->share('pedido_produto', $pedido_produto);

        if($request->has('download')){
            $pdf = PDF::loadView('caixas.pdfview');
//            return $pdf->download('pdfview.pdf');
            return $pdf->stream();
        }

        return view('caixas.pdfview');
    }

    public function create(){
        return view('caixas.create');
    }

    public function destroy($id){
        Caixa::find($id)->delete();
        return redirect()->route('caixas');
    }

    public function edit($id){
        $caixa = Caixa::find($id);
        return view('caixas.edit', compact('caixa'));
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
