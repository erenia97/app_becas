<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\entidades;
use App\pais;
use App\User;
use DB;
class EntidadesController extends Controller
{

 protected $result      = false;
    protected $message     = 'Ocurrió un problema al procesar su solicitud';
    protected $records     = array();
    protected $status_code = 400;

    public function index() {
         $paises = pais::all();
          $user    = auth()->user();
       //  $cliente = User::where('id_tipo', $user->id_tipo)->get();

         $dato  = DB::table('tipo_usuario')->join('entidades', 'entidades.id_tipo', '=', 'tipo_usuario.id_tipo')
                 ->where('entidades.id_tipo', '=', $user->id_tipo)->value('entidades.id_entidad');


         $records   = DB::table('entidades')->where('id_entidad', $dato)->first();

        return view('auth.forms.entidadupdate', compact('records','paises'));
    }

    public function store(Request $request) {
        $record = entidades::create([
          'id_tipo'            => auth()->user()->id_tipo,
          'Nombre'             => $request->input(       'Nombre'),
          'Razon_social'       => $request->input( 'Razon_social'),
          'id_pais'             => $request->input(      'id_pais'),
          'pagina_Web'         => $request->input(   'pagina_Web'),
          'sector'             => $request->input(       'sector'),
          'logo'               => $request->logo->store('', 'public'),
          'direccion'          => $request->input(    'direccion'),
          'Nit'                => $request->input(          'Nit'),
          'telefono'           => $request->input(     'telefono'),
        ]);

        return redirect()->route('home');

    }

    public function show($records) {



      //      $record = entidades::all->where($dato,'=','id_entidad');

    }

    public function update(Request $request, $id_entidad) {

        $records = entidades::find($id_entidad);
        $paises = pais::all();

        if ($records) {
            // $records->id_tipo = auth()->user()->id_tipo;
            $records->Nombre = $request->input('Nombre', $records->Nombre);
            $records->Razon_social = $request->input('Razon_social', $records->Razon_social);
            $records->id_pais = $request->input('id_pais', $records->id_pais);
            $records->pagina_Web = $request->input('pagina_Web', $records->pagina_Web);
            $records->sector = $request->input('sector', $records->sector);
            $records->logo = $request->input('logo', $records->logo);
            $records->direccion = $request->input('direccion', $records->direccion);
            $records->Nit = $request->input('Nit', $records->Nit);
            $records->telefono = $request->input('telefono', $records->telefono);

            $records->save();
        }
        return view('auth.forms.entidadupdate', compact('records', 'paises'));
    }


    public function destroy($id) {
        try {
            $record = entidades::find($id);
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
