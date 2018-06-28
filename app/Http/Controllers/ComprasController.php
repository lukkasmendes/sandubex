<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Fornecedor;
use Carbon\Carbon;
use Illuminate\Database\Query\Builde;
use App\Http\Requests\CompraRequest;
use Redirect;
use Illuminate\Support\Facades\DB;

class ComprasController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['getLogout', 'getRegister', 'postRegister']]);
    }

    public function index(){
        $compras = Compra::all();
        return view('compras.index', compact('compras'));
    }

    public function create(){
        $data1 = DB::table('produtos')->get();
        $data = DB::table('fornecedors')->get();

        $compra = Fornecedor::all();
        return view('compras.create', ['compra' => $compra], compact('data1', 'data'));
    }

    public function destroy($id){
        try {
            $compra = Compra::findOrFail($id);
            $compra->delete();
        } catch (QueryException $e) {
            flash()->error('Erro ao excluir compra - Compra em uso');
            return redirect()->back();
        }
        \Session::flash('mensagem_sucesso', 'Compra deletada com sucesso!');
        return redirect()->route('compras');
    }

    public function edit($id){
        $data1 = DB::table('produtos')->get();
        $data = DB::table('fornecedors')->get();
        $compras = Compra::find($id);
        return view('compras.edit', compact('compras', 'data1', 'data'));
    }

    public function update(CompraRequest $request, $id){
        $compra = Compra::find($id);
        $compra->update($request->all());

        return redirect()->route('compras');
    }

    public function store(CompraRequest $request){
        $compras = new Compra();

        $dataEntrada = $request->get('dataEntrada');
        $data_formatada = Carbon::createFromFormat('d-m-Y H:i:s', $dataEntrada);
        $data_formatada->format('Y-m-d H:i:s');

        $compras->dataEntrada = $data_formatada;
        $compras->quantidade = $request->get('quantidade');
        $compras->precoCusto = $request->get('precoCusto');
        $compras->fornecedor_id = $request->get('fornecedor_id');
        $compras->produto_id = $request->get('produto_id');
        $compras->save();

        return redirect()->route('compras');
    }
}
