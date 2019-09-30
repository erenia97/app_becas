<?php

namespace App\Http\Controllers;

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
        try {
         //   $validacion = usuarios::where("nit", $request->input('nit'))->first();
        //   if (!$validacion) {
                $record = usuarios::create([


                  
                      'id_profesion'      => $request->input( 'id_profesion' ),
                      'id_pais'           => $request->input( 'id_pais'),
                      'id_tipo'           => $request->input( 'id_tipo' ),
                      'Nombre'            => $request->input( 'Nombre'  ),
                      'Apellido'          => $request->input( 'Apellido' ),
                      'Correo'             => $request->input( 'Correo'),
                      'telefono'           => $request->input( 'telefono'),
                      'direccion'          => $request->input( 'direccion'),
                      'fecha_nacimiento'   => $request->input( 'fecha_nacimiento'),
                      'sexo'               => $request->input( 'sexo'   ),

                    ]);
                if ($record) {
                    $this->status_code = 200;
                    $this->result      = true;
                    $this->message     = 'Cliente creado correctamente.';
                    $this->records     = $record;
                } else {
                    throw new \Exception('El cliente no pudo ser creado.');
                }
           /* } else {
                throw new \Exception('Ya existe este cliente.');
            }*/

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
            $record = usuarios::find($id);
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
          //  $validacion = usuarios::where('nit',$request->input('nit'))->first();                   
            //if ($validacion == true && $validacion->id != $id) {
              //  throw new \Exception('Ya existe este cliente.');
            //} else {
            $record = usuarios::find($id);
            if ($record) {


                 $record->id_profesion     => $request->input( 'id_profesion',$record->id_profesion );
                 $record->id_pais           => $request->input( 'id_pais',  $record->id_pais);
                 $record->id_tipo           => $request->input( 'id_tipo',$record->id_tipo  );
                 $record->Nombre            => $request->input( 'Nombre',  $record->Nombre  );
                 $record->Apellido          => $request->input( 'Apellido',$record->Apellido );
                 $record->Correo             => $request->input( 'Correo',$record->Correo );
                 $record->telefono           => $request->input( 'telefono' , $record->telefono );
                 $record->direccion          => $request->input( 'direccion', $record->direccion );
                 $record->fecha_nacimiento   => $request->input( 'fecha_nacimiento', $record->fecha_nacimiento);
                 $record->sexo               => $request->input( 'sexo' ,  $record->sexo    );

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
