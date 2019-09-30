<?php

namespace App\Http\Controllers;

use http\Client;
use Illuminate\Http\Request;
use App\usuarios;
use App\carreras;
use App\pais;
use App\User;


class ClientesController extends Controller
{
    protected $result      = false;
    protected $message     = 'Ocurrió un problema al procesar su solicitud';
    protected $records     = array();
    protected $status_code = 400;

    public function index() {
        try {
            $records           = usuarios::all();
            $this->status_code = 200;
            $this->result      = true;
            $this->message     = 'Registros consultados correctamente';
            $this->records     = $records;
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

    public function update(Request $request, $id) {

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
