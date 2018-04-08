<?php

namespace App\Http\Controllers;

use App\Compra;
use Carbon\Carbon;
use Illuminate\Database\Query\Builde;
use App\Http\Requests\CompraRequest;
use Redirect;
use Illuminate\Support\Facades\Response;

class ComprasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getLogout', 'getRegister', 'postRegister']]);
    }

    /*
    public function index(){
        $compras = Compra::paginate(5);
        return view('compras.index', ['compras'=>$compras]);
    }
    */

    public function index(){
        $compras = Compra::all();
        return view('compras.index', compact('compras'));
    }

    public function create(){
        return view('compras.create');
    }

    public function destroy($id){
        Compra::find($id)->delete();
        return redirect()->route('compras');
    }

    public function edit($id){
        $compras = Compra::find($id);
        return view('compras.edit', compact('compras'));
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
