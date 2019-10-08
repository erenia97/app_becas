<?php

namespace App\Http\Controllers;

use http\Client;
use Illuminate\Http\Request;
use App\usuarios;
use App\carreras;
use App\pais;
use App\User;
Use DB;

class ClientesController extends Controller
{
    protected $result      = false;
    protected $message     = 'Ocurrió un problema al procesar su solicitud';
    protected $records     = array();
    protected $status_code = 400;

    public function index() {
         $paises = pais::all();
          $user    = auth()->user();
          $profesion= carreras::all();
       //  $cliente = User::where('id_tipo', $user->id_tipo)->get();

         $dato  = DB::table('tipo_usuario')->join('cliente', 'cliente.id_tipo', '=', 'tipo_usuario.id_tipo')
                 ->where('cliente.id_tipo', '=', $user->id_tipo)->value('cliente.id_cliente');


         $records   = DB::table('cliente')->where('id_cliente', $dato)->first();

        return view('auth.forms.clientesUpdate', compact('records','paises','profesion'));
    }

    public function store(Request $request) {

        usuarios::create([
            'id_profesion'      => $request->input( 'id_profesion' ),
            'id_pais'           => $request->input( 'id_pais'),
            'id_tipo'           => auth()->user()->id_tipo,
            'Nombre'            => $request->input( 'Nombre'  ),
            'Apellido'          => $request->input( 'Apellido' ),
            'Correo'             => $request->input( 'Correo'),
            'telefono'           => $request->input( 'telefono'),
            'direccion'          => $request->input( 'direccion'),
            'fecha_nacimiento'   => $request->input( 'fecha_nacimiento'),
            'sexo'               => $request->input( 'sexo'   ),
        ]);

        return redirect()->route('home');
    }

    public function show($id) {
        return route('layouts.forms.update-usuario');
    }

    public function update(Request $request, $id_cliente) {
  $records = entidades::find($id_cliente);
        $paises = pais::all();

        if ($records) {
            // $records->id_tipo = auth()->user()->id_tipo;
            $records->id_profesion = $request->input('id_profesion', $records->id_profesion);
            $records->id_tipo = $request->input('id_tipo', $records->id_tipo);
            $records->id_pais = $request->input('id_pais', $records->id_pais);
            $records->Nombre = $request->input('Nombre', $records->Nombre);
            $records->Apellido = $request->input('Apellido', $records->Apellido);
            $records->Correo = $request->input('Correo', $records->Correo);
            $records->telefono = $request->input('telefono', $records->telefono);
            $records->direccion = $request->input('direccion', $records->direccion);
              $records->fecha_nacimiento = $request->input('fecha_nacimiento', $records->fecha_nacimiento);
            $records->sexo = $request->input('sexo', $records->sexo);
            $records->save();
        }
        return view('auth.forms.clientesUpdate', compact('records', 'paises'));

    }


    public function destroy($id) {
        try {
            $record = usuarios::find($id);
            if ($record) {
                $record->delete();
                $this->status_code = 200;
                $this->result      = true;
                $this->message     = 'Cliente eliminado correctamente.';
            } else {
                throw new \Exception('El cliente no pudo ser encontrado.');
            }
        } catch (\Exception $e) {
            $this->status_code = 400;
            $this->result      = false;
            $this->message     = env('APP_DEBUG')?$e->getMessage():$this->message;
        }finally{
            $response = [
                'result'  => $this->result,
                'message' => $this->message,
                'records' => $this->records,
            ];

            return response()->json($response, $this->status_code);
        }
    }

}
