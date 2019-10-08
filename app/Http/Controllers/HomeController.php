<?php

namespace App\Http\Controllers;

use App\usuarios;
use Illuminate\Http\Request;
use App\pais;
use App\becas;
use App\carreras;
use App\tipo_Becas;
use App\requisitos;
use App\contacto;
use App\idioma;
use App\nivel;


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

       public function becas()
    {
          $tipobeca= tipo_becas::all();
        return view('auth.forms.crearbecas', compact('tipobeca'));
    }

     public function contacto()
    {
          $tipobeca= tipo_becas::all();
        return view('auth.forms.contacto', compact('tipobeca'));
    }

  public function requisitos()
    {
          $requisitos= becas::all();
        return view('auth.forms.requisitos', compact('requisitos'));
    }



  public function beneficios()
    {
          $beneficios= becas::all();
        return view('auth.forms.beneficios', compact('beneficios'));
    }


    public function forms()
    {
        $user = auth()->user();
        $profesion= carreras::all();
          $idioma= idioma::all();
        $paises = pais::all();
        $nivel = nivel::all();


        $cliente = usuarios::where('id_tipo', $user->id_tipo)->first();

        if ($cliente){
            return redirect()->route('home');
        }

        if ($user->tipo_usuario == 0) {
            return view('auth.forms.usuario', compact('paises','profesion','idioma','nivel'));
        }

        if ($user->tipo_usuario == 1) {
            return view('auth.forms.entidad', compact('paises'));
            //  return view('auth.forms.entidad', compact('pais'));
        }
    }
}
