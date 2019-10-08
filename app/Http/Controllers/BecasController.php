<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\becas;
use App\tipo_becas;
use App\carreras;
use App\entidades;
use App\beneficios;
use app\User;
use DB;



class BecasController extends Controller
{
     protected $result      = false;
    protected $message     = 'Ocurrió un problema al procesar su solicitud';
    protected $records     = array();
    protected $status_code = 400;
    
    public function index() {
          $user    = auth()->user();
         $cliente = User::where('id_tipo', $user->id_tipo)->first();
         $dato  = DB::table('tipo_usuario')->join('entidades', 'entidades.id_tipo', '=', 'tipo_usuario.id_tipo')
                 ->where('entidades.id_tipo', '=', $cliente->id_tipo)->value('entidades.id_entidad');


            $records           = becas::all()->where('id_entidad','=',$dato);

           return view('auth.forms.BecasIndex', compact('records'));
    }

    public function store(Request $request) {

         $user    = auth()->user();
         $cliente = User::where('id_tipo', $user->id_tipo)->first();
         $dato  = DB::table('tipo_usuario')->join('entidades', 'entidades.id_tipo', '=', 'tipo_usuario.id_tipo')
                 ->where('entidades.id_tipo', '=', $cliente->id_tipo)->value('entidades.id_entidad');
         
              $record = becas::create([
                        
                        'id_entidad'     =>$dato,  
                        'descripcion'     =>$request->input('descripcion'),
                        'lugar'           =>$request->input('lugar'),
                        'fecha_inicio'    => date("Y-m-d",strtotime($request->input('fecha_inicio'))),
                        'fecha_fin'       => date("Y-m-d", strtotime($request->input('fecha_fin'))),
                        'Nombre'          =>$request->input('Nombre'  ),
                         'nombre_carrera' =>$request->input('nombre_Carrera'  ),
                        'tipo_beca'       =>$request->input('nombre_beca'  ),
                    ]);
                   return view('home', compact('records','paises'));
          
    }

    public function show($dato) {

        $user    = auth()->user();
         $cliente = User::where('id_tipo', $user->id_tipo)->first();
      $records           = becas::all()->where('id_becas','=',$dato)->first();

           return view('auth.forms.becasUpdate', compact('records'));
    }

    public function update(Request $request, $id_becas) {
        
      

        $records = becas::find($id_becas);
      

        if ($records) {
            // $records->id_tipo = auth()->user()->id_tipo;
            $records->descripcion       = $request->input('descripcion', $records->descripcion);
            $records->lugar             = $request->input('lugar', $records->lugar);
            $records->fecha_inicio       = date("Y-m-d", strtotime($request->input('fecha_inicio', $records->fecha_inicio)));
             $records->fecha_fin          = date("Y-m-d", strtotime($request->input('fecha_fin', $records->fecha_fin)));
            $records->Nombre      = $request->input('Nombre', $records->Nombre);
            $records->nombre_carrera   = $request->input('nombre_carrera', $records->nombre_carrera);
            $records->tipo_beca       = $request->input('tipo_beca', $records->tipo_beca);

            $records->save();
            return redirect('/registar/index');
        }
                           


    }
    

    public function destroy($records) {

         $request = becas::find($records)->first();
         $de = beneficios::all()->where('id_becas','=',$records)->first();
            /**
             * undocumented constant
             **/
          
       if ($de)
              {
            $de->delete();
             $request->delete();
          }
       else
        {
             $request->Delete('cascade');

       return redirect('/registar/index');
    }}
}
