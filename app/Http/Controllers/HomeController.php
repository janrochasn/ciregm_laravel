<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request) {
        $erro = '';

        if($request->get('erro') == 1) {
            $erro = 'Usuário e/ou senha não existe';
        }
        return view('index', ['erro' => $erro]);
    }
}
