<?php

namespace App\Http\Controllers;

use App\usuarios;
use Illuminate\Http\Request;
use App\pais;
use App\carreras;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function forms()
    {
        $user = auth()->user();
        $profesion= carreras::all();
        $paises = pais::all();


        $cliente = usuarios::where('id_tipo', $user->id_tipo)->first();

        if ($cliente){
            return redirect()->route('home');
        }

        if ($user->tipo_usuario == 0) {
            return view('auth.forms.usuario', compact('paises','profesion'));
        }

        if ($user->tipo_usuario == 1) {
            return view('auth.forms.entidad', compact('paises'));
            //  return view('auth.forms.entidad', compact('pais'));
        }
    }
}
