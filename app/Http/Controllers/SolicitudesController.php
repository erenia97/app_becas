<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\solicitud;
use App\becas;
use App\usuarios;
class SolicitudesController extends Controller
{
   protected $result      = false;
    protected $message     = 'Ocurrió un problema al procesar su solicitud';
    protected $records     = array();
    protected $status_code = 400;
    
    public function index() {
        try {
            $records           = solicitud::all();
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
         //   $validacion = solicitud::where("nit", $request->input('nit'))->first();
        //   if (!$validacion) {
                $record = solicitud::create([


                      'id_requisito'  => $request->input('id_requisito' ),      
                      'id_beca'       => $request->input('id_beca'      ),
                      'id_cliente'       => $request->input('id_cliente'      ),  
                      'edad'          => $request->input('edad'         ),
                      'profesion'     => $request->input('profesion'    ),     
                      'sexo'          => $request->input('sexo'         ),

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
            $record = solicitud::find($id);
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
          //  $validacion = solicitud::where('nit',$request->input('nit'))->first();                   
            //if ($validacion == true && $validacion->id != $id) {
              //  throw new \Exception('Ya existe este cliente.');
            //} else {
            $record = solicitud::find($id);
            if ($record) {



                       $record->id_requisito  => $request->input('id_requisito',$record->id_requisito  );      
                       $record->id_beca       => $request->input('id_beca'     ,$record->id_beca       );
                       $record->id_cliente    => $request->input('id_cliente'     ,$record->id_cliente       );  
                       $record->edad          => $request->input('edad'        ,$record->edad          );
                       $record->profesio      => $request->input('profesion'   ,$record->profesio      );     
                       $record->sexo          => $request->input('sexo'        ,$record->sexo          );
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
            $record = solicitud::find($id);
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
