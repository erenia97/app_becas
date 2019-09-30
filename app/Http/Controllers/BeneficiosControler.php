<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\beneficios;
use App\becas;
class BeneficiosControler extends Controller
{
  
    protected $result      = false;
    protected $message     = 'Ocurrió un problema al procesar su solicitud';
    protected $records     = array();
    protected $status_code = 400;
    
    public function index() {
        try {
            $records           = beneficios::all();
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
            $validacion = beneficios::where("id_becas", $request->input('id_becas'))->first();
            if (!$validacion) {
                $record = beneficios::create([
                        'id_becas'        => $request->input('id_becas'),                       
                        'descripcion'     => $request->input('descripcion'),
                         'lugar'          => $request->input('lugar'),
                         'cobertura'      => $request->input('cobertura'),
                         'tiempo'         => $request->input('tiempo'),
                        
                    ]);
                if ($record) {
                    $this->status_code = 200;
                    $this->result      = true;
                    $this->message     = 'Proveedor creado correctamente.';
                    $this->records     = $record;
                } else {
                    throw new \Exception('El proveedor no pudo ser creado.');
                }
            } else {
                throw new \Exception('Ya existe este proveedor.');
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
            $record = beneficios::find($id);
            if ($record) {
                $this->status_code = 200;
                $this->result      = true;
                $this->message     = 'Cuenta consultado correctamente';
                $this->records     = $record;
            } else {
                throw new \Exception('Cuenta no encontrado');
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
            $validacion = beneficios::where('nombre',$request->input('nombre'))->first();                   
            if ($validacion == true && $validacion->id != $id) {
                throw new \Exception('Ya existe este proveedor.');
            } else {
            $record = beneficios::find($id);
            if ($record) {

                    $record->id_becas       =$request->input('id_becas',$record->id_becas );                       
                    $record->descripcion     = $request->input('descripcion',$record->descripcion );
                    $record->lugar         = $request->input('lugar', $record->lugar );
                    $record->cobertura      = $request->input('cobertura', $record->cobertura);
                    $record->tiempo         = $request->input('tiempo',  $record->tiempo  );
            
                
                $record->save();
                if ($record->save()) {
                    $this->status_code  = 200;
                    $this->result       = true;
                    $this->message      = 'Proveedor actualizado correctamente';
                    $this->records      = $record;
                } else {
                    throw new \Exception('El proveedor no pudo ser actualizado');
                }
                } else {
                        $this->message = 'El proveedor no existe';
                        throw new \Exception('El proveedor no existe');
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
            $record = beneficios::find($id);
            if ($record) {
                $record->delete();
                $this->status_code = 200;
                $this->result      = true;
                $this->message     = 'Proveedor eliminado correctamente.';
            } else {
                throw new \Exception('El proveedor no pudo ser encontrado.');
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
