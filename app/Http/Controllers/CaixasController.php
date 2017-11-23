<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Caixa;
use App\Http\Requests\CaixaRequest;
use Illuminate\Database\Query\Builde;

class CaixasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getLogout', 'getRegister', 'postRegister']]);
    }

    public function index(){
        $caixas = Caixa::paginate(5);
        return view('caixas.index', ['caixas'=>$caixas]);
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
        $caixa = Caixa::find($id)->update($request->all());
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
        $caixa->formaPagamento = $request->get('formaPagamento');
        $caixa->observacao = $request->get('observacao');
        $caixa->save();

        return redirect()->route('caixas');
    }
}
