<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\etnidades;
use App\contacto;

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
        try {
            $validacion = contacto::where("nit", $request->input('nit'))->first();
            if (!$validacion) {
                $record = contacto::create([

              'id_entidad'    => $request->input('id_entidad'),
              'nombre'        => $request->input('nombre'),
              'apellido'      => $request->input('apellido'),
              'telefono'      => $request->input('telefono'),
              'correo'        => $request->input('correo'),
                                    ]);
                if ($record) {
                    $this->status_code = 200;
                    $this->result      = true;
                    $this->message     = 'Cliente creado correctamente.';
                    $this->records     = $record;
                } else {
                    throw new \Exception('El cliente no pudo ser creado.');
                }
            } else {
                throw new \Exception('Ya existe este cliente.');
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

    public function update(Request $request, $id) {
        try {
            $validacion = contacto::where('id_entidad',$request->input('id_entidad'))->first();                   
            if ($validacion == true && $validacion->id != $id) {
                throw new \Exception('Ya existe este cliente.');
            } else {
            $record = contacto::find($id);
            if ($record) {

               $record->id_entidad    => $request->input('id_entidad', $record->id_entidad);
               $record->nombre        => $request->input('nombre',$record->nombre);
               $record->apellido      => $request->input('apellido',$record->apellido);
               $record->telefono      => $request->input('telefono', $record->telefono);
               $record->correo        => $request->input('correo',$record->correo);
                
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
        }
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
32


}
