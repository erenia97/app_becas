<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\entidades;
use App\contacto;
use App\usuarios;
use App\User;
use DB;

class ContactoController extends Controller
{
   
          protected $result      = false;
    protected $message     = 'Ocurrió un problema al procesar su solicitud';
    protected $records     = array();
    protected $status_code = 400;
    
    public function index() {
        try {
            $records           = contacto::all();
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
           $user    = auth()->user();
          $cliente = User::where('id_tipo', $user->id_tipo)->first();
         $dato  = DB::table('tipo_usuario')->join('entidades', 'entidades.id_tipo', '=', 'tipo_usuario.id_tipo')
                 ->where('entidades.id_tipo', '=', $cliente->id_tipo)->value('entidades.id_entidad');
         
         
                $record = contacto::create([

              'id_entidad'    => $dato, 
              'nombre'        => $request->input('Nombre'),
              'apellido'      => $request->input('apellido'),
              'telefono'      => $request->input('telefono'),
              'correo'        => $request->input('email'),
                                    ]);
              
    }

    public function show($id) {
        try {
            $record = contacto::find($id);
            if ($record) {
                $this->status_code = 200;
                $this->result      = true;
                $this->message     = 'Cliente consultado correctamente';
                $this->records     = $record;
            } else {
                throw new \Exception('Cliente no encontrado');
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

    public function update(Request $request, $id) {/*
        try {
            $validacion = contacto::where('id_entidad',$request->input('id_entidad'))->first();                   
            if ($validacion == true && $validacion->id != $id) {
                throw new \Exception('Ya existe este cliente.');
            } else {
            $record = contacto::find($id);
            if ($record) {

               $record->id_entidad    = $request->input('id_entidad', $record->id_entidad);
               $record->nombre        = $request->input('nombre',$record->nombre);
               $record->apellido      = $request->input('apellido',$record->apellido);
               $record->telefono      = $request->input('telefono', $record->telefono);
               $record->correo        = $request->input('correo',$record->correo);
                
                $record->save();
                if ($record->save()) {
                    $this->status_code  = 200;
                    $this->result       = true;
                    $this->message      = 'Cliente actualizado correctamente';
                    $this->records      = $record;
                } else {
                    throw new \Exception('El cliente no pudo ser actualizado');
                }
                } else {
                        $this->message = 'El cliente no existe';
                        throw new \Exception('El cliente no existe');
                }
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
        }*/
    }
    

    public function destroy($id) {
        try {
            $record = contacto::find($id);
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
