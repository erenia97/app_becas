<?php

namespace App\Http\Controllers;

use App\carreras;
use Illuminate\Http\Request;

class CarrerasController extends Controller
{
    public function carreras(Request $request){
            return carreras::where('id_carrera_pareja', $request->input('id_carrera'))->get();
    }
}
