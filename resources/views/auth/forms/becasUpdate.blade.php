@extends('layouts.app')

@section('content') 
      

    <div class="container">
        <div class="card">

            <div class="card-header">{{ __('DATOS ENTIDAD') }}</div>

            <div class="card-body">


               <form  method="POST" action="{{ route('update.update.becas', $records->id_becas) }}" enctype="multipart/form-data">
                     @csrf
                   


                      <div class="form-group row">
                        <label for="tipo_beca" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese el tipo de Beca') }}</label>
                        <div class="col-md-6">
                            <input id="tipo_beca" type="text" class="form-control" name="tipo_beca" value="{{$records->tipo_beca}}">
                            @if ($errors->has('tipo_beca'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tipo_beca') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                
                <div class="form-group row">
                        <label for="nombre_carrera" class="col-md-4 col-form-label text-md-right">{{ __('Profesion a Especializarce') }}</label>
                        <div class="col-md-6">
                            <input id="nombre_carrera" type="text" class="form-control" name="nombre_carrera" value="{{$records->nombre_carrera}}">
                            @if ($errors->has('nombre_carrera'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre_carrera') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                        <div class="form-group row">
                        <label for="Nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de la Beca') }}</label>
                        <div class="col-md-6">
                            <input id="Nombre" type="text" class="form-control" name="Nombre" value="{{$records->Nombre}}">
                            @if ($errors->has('Nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Nombre') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                     <div class="form-group row">
                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('descripcion') }}</label>
                         <div class="col-md-6">
                            <input id="descripcion" type="text" class="form-control"  name="descripcion" value=" {{ $records->descripcion }}">
                          </div>
                    </div>

                    <div class="form-group row">
                        <label for="lugar
                        " class="col-md-4 col-form-label text-md-right">{{ __('Lugar de Beca') }}</label>
                        <div class="col-md-6">
                            <input id="lugar
                            " type="text" class="form-control{{ $errors->has('lugar') ? ' is-invalid' : '' }}" name="lugar" value="{{ $records->lugar}}">

                            @if ($errors->has('lugar'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lugar') }}</strong>
                                </span>
                            @endif
                        </div>  
                    </div>
                    
                    <div class="form-group row">
                        <label for="fecha_inicio" class="col-md-4 col-form-label text-md-right">{{ __('fecha_inicio') }}</label>
                        <div class="col-md-6">
                            <input id="fecha_inicio" type="date" class="form-control" name="fecha_inicio" value="{{$records->fecha_inicio}}">
                            @if ($errors->has('fecha_inicio'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fecha_inicio') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="fecha_fin" class="col-md-4 col-form-label text-md-right">{{ __('fecha_fin') }}</label>
                        <div class="col-md-6">
                            <input id="fecha_fin" type="date" class="form-control" name="fecha_fin" value="{{$records->fecha_fin}}">
                            @if ($errors->has('fecha_fin'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $rrors->first('fecha_fin') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                   


                   
                   

                    
                      <div class="col-md-4">

                      </div>

                    <div class="form-group row">
                      <div class="col-md-6">
                          <button type="submit" class="btn btn-info">Guardar</button>
                          <button class="btn btn-danger">Cancelar</button>
                

               
                      </div>
                    </div>



             


                </form>


            </div>

        </div>
 

                  

      </div>


   <!--          <div class="form-group row">
                      <div class="col-md-6">
  <form action="{{ route('eliminarentidad', $records->id_entidad) }}" method="POST" style="display: inline">
                        @csrf @method('DELETE')                
                    
                    <button class="btn btn-danger" onclick="return confirm('you re sure you want to delete this post ?')"><i class="fa fa-times"></i>
                    Eliminar
                 </button>                         
                 </form>
                 </div>
                    </div> EJEMPLO DE ELIMINAR--> 
@endsection
