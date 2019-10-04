<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\requisitos;
use App\becas;
class RequisitosController extends Controller
{
     protected $result      = false;
    protected $message     = 'Ocurrió un problema al procesar su solicitud';
    protected $records     = array();
    protected $status_code = 400;
    
    public function index() {
        try {
            $records           = requisitos::all();
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
             // $validacion = requisitos::where("nit", $request->input('nit'))->first();
           // if (!$validacion) {
                $record = requisitos::create([

                      
                     'id_beca'   => $request->input('id_beca'  ),
                     'edad'      => $request->input('edad'     ),
                     'profesion' => $request->input('Profesion'),
                     'sexo'      => $request->input('sexo'     ),
                       
                     
                    ]);
               

    }

    public function show($id) {
        try {
            $record = requisitos::find($id);
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
          //  $validacion = requisitos::where('nit',$request->input('nit'))->first();                   
           // if ($validacion == true && $validacion->id != $id) {
             //   throw new \Exception('Ya existe este cliente.');
            //} else {
            $record = requisitos::find($id);
            if ($record) {
   
                      //$record->d_entidad         => $request->input('d_entidad'   , $record->d_entidad   );

                      $record->id_beca   = $request->input('id_beca'  ,$record->id_beca  );
                      $record->edad      = $request->input('edad'     ,$record->edad     );
                      $record->profesion = $request->input('profesion',$record->profesion);
                      $record->sexo      = $request->input('sexo'     ,$record->sexo     );
       
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
          //      }
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
            $record = requisitos::find($id);
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
