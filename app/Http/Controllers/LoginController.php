<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request) {

        //Regras de validação
        $rules = [
            'id' => 'required',
            'password' => 'required'
        ];

        //Mensagens de erro
        $feedback = [
            'id.required' => 'O campo usuário é de preenchimento obrigatório',
            'password.required' => 'O campo senha é de preenchimento obrigatório'
            //'required' => 'O campo :attribute é de preenchimento obrigatório',
        ];

        //Validação das credenciais informadas no form
        $request->validate($rules, $feedback);

        //Autenticação
        if(Auth::attempt(['id' => $request->id, 'password' => $request->password])) {
            return redirect()->route('atividades.index');

        } else {

            //return redirect()->route('index', ['erro' => '1']);
            return back()->withErrors([
                'msg' => 'Usuário/senha não existe.'
            ])->withInput($request->except('password'));
    
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
