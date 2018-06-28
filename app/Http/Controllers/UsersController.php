<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Query\Builde;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;


class UsersController extends Controller
{
    use RegistersUsers;

    public function __construct(){
        $this->middleware('auth', ['except' => ['getLogout', 'getRegister', 'postRegister']]);
    }

    public function index(){
        $users = User::all();
        return view('users.index', ['users'=>$users]);
    }

    public function create(){
        return view('users.create');
    }

    public function deletar($id){
        try {
            $user = User::findOrFail($id);
            $user->delete();
        } catch (QueryException $e) {
            flash()->error('Erro ao excluir usuário - Usuário em uso');
            return redirect()->back();
        }
        \Session::flash('mensagem_sucesso', 'Usuário deletado com sucesso!');
        return redirect()->route('users');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user]);
    }

    public function atualizar($id, Request $request){
        $user = User::findOrFail($id);
        $user->update($request->all());

        \Session::flash('mensagem_sucesso', 'Usuário atualizado com sucesso!');
        return redirect()->route('users');
    }

    public function salvar(Request $request){
        $user = new User();
        $user = $user->create($request->all());

        \Session::flash('mensagem_sucesso', 'Usuário cadastrado com sucesso!');
    }
}
