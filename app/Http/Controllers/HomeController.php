<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request) {
        if(Auth::check()) {
            return redirect()->route('atividades.index');
        }
        return view('index');
    }
}
