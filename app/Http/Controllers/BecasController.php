<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\becas;
use App\tipo_becas;
use App\carreras;
use App\entidades;



class BecasController extends Controller
{
     protected $result      = false;
    protected $message     = 'Ocurrió un problema al procesar su solicitud';
    protected $records     = array();
    protected $status_code = 400;
    
    public function index() {
        try {
            $records           = becas::all();
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
           // $validacion = becas::where("Lugar", $request->input('Lugar'))->first();
            if (!$validacion) {
                $record = becas::create([

                        'id_entidad'     => $request->input('id_entidad'),
                        'id_tipo'        => $request->input('id_tipo'),
                        'id_grado'       => $request->input('id_grado'),
                        'descripcion'     => $request->input('descripcion'),
                        'Lugar'           => $request->input('Lugar'),
                        'fecha_inicio'    => $request->input('fecha_inicio'),
                        'fecha_fin'     => $request->input('fecha_fin'),
                        'Nombre'       => $request->input('Nombre'  ),
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
            $record = becas::find($id);
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
            $validacion = becas::where('Lugar',$request->input('Lugar'))->first();                   
            if ($validacion == true && $validacion->id != $id) {
                throw new \Exception('Ya existe este cliente.');
            } else {
            $record = becas::find($id);
            if ($record) {
                $record->id_entidad     => $request->input('id_entidad',$record->id_entidad );
                $record->id_tipo        => $request->input('id_tipo',$record->id_tipo);
                $record->id_grado       => $request->input('id_grado', $record->id_grado);
                $record->descripcion         = $request->input('descripcion', $record->descripcion);
                $record->Lugar            = $request->input('Lugar', $record->Lugar);
                $record->fecha_inicio       = $request->input('fecha_inicio', $record->fecha_inicio);
                $record->fecha_fin      = $request->input('fecha_fin', $record->fecha_fin);
                $record->Nombre        = $request->input('Nombre', $record->Nombre);
                
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
            $record = becas::find($id);
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