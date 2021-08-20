<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request) {
        
        /*
        $credentials = $request->validate([
            'id' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('index');
        */

        $rules = [
            'id' => 'required',
            'password' => 'required'
        ];

        $feedback = [
            'id.required' => 'O campo usuário é de preenchimento obrigatório',
            'password.required' => 'O campo senha é de preenchimento obrigatório'
            //'required' => 'O campo :attribute é de preenchimento obrigatório',
        ];

        $request->validate($rules, $feedback);

        if(Auth::attempt(['id' => $request->id, 'password' => $request->password])) {
            return redirect()->route('index');
        } else {
            return redirect()->route('index', ['erro' => '1']);
        }
    }
}
