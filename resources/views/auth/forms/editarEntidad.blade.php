@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">

            <div class="card-header">{{ __('DATOS ENTIDAD') }}</div>

            <div class="card-body">


  @foreach ($records as $record)
 
               <form  method="POST" action="{{ route('update.entidad', $record->id_entidad) }}" enctype="multipart/form-data">
     @endforeach   

                @method('PUT')
              
                     @csrf
                     <div class="form-group row">
                        <label for="Nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>               
                        
                            @foreach ($records as $record)
                              <div class="col-md-6">
                            <input id="Nombre" type="text" class="form-control"  name="Nombre" value=" {{ $record->Nombre }}">
                             </div>  
                              @endforeach                                                               
                    </div>


                    <div class="form-group row">
                        <label for="Razon_social" class="col-md-4 col-form-label text-md-right">{{ __('Razon Social') }}</label>
                        <div class="col-md-6">
                             @foreach ($records as $record)
                            <input id="Razon_social" type="text" class="form-control" name="Razon_social" value="{{ $record->Razon_social }}">
                              @endforeach          
                            @if ($errors->has('Razon_social'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Razon_social') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_pais" class="col-md-4 col-form-label text-md-right">{{ __('Pais') }}</label>
                        <div class="col-md-6">
                            <select id="id_pais" type="text" class="form-control" name="id_pais">
                                @foreach ($records as $record)

                                     @foreach ($paises as $pais)
                                    <option value="{{$record->id_pais}}">{{ $pais->nombre_pais }}</option>
                                     @endforeach

                                 @endforeach 
                            </select>
                            @if ($errors->has('id_pais'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('id_pais') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pagina_Web" class="col-md-4 col-form-label text-md-right">{{ __('Pegina web') }}</label>
                        <div class="col-md-6">
                             @foreach ($records as $record)

                            <input id="pagina_Web" type="text" class="form-control" name="pagina_Web" value="{{ $record->pagina_Web}}">
                                @endforeach
                            @if ($errors->has('pagina_Web'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pagina_Web') }}</strong>
                                </span>
                            @endif
                        </div>  
                    </div>

                    <div class="form-group row">
                        <label for="sector" class="col-md-4 col-form-label text-md-right">{{ __('Sector') }}</label>
                        <div class="col-md-6">
                             @foreach ($records as $record)

                            <input id="sector" type="text" class="form-control" name="sector" value="{{$record->sector}}">
                            @endforeach
                            @if ($errors->has('sector'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $rrors->first('sector') }}</strong>
                                </span>
                            @endif
                        </div>  
                    </div>

                    <div class="form-group row">
                        <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>
                        <div class="col-md-6">


                            @foreach($records as $photo)

                              <img style="width:50%" src="/storage/{{$photo->logo}}">
                                @endforeach
                           
                            @if ($errors->has('logo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('logo') }}</strong>
                                </span>
                            @endif
                        </div>  
                    </div>

                    <div class="form-group row">
                        <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>
                        <div class="col-md-6">

                            @foreach($records as $record)
                            <input id="direccion" type="text" class="form-control" name="direccion" value="{{$record->direccion}}">
                            @endforeach
                            @if ($errors->has('direccion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                            @endif
                        </div>  
                    </div>

                    <div class="form-group row">
                        <label for="Nit" class="col-md-4 col-form-label text-md-right">{{ __('Nit') }}</label>
                        <div class="col-md-6">
                            @foreach($records as $record)
                            <input id="Nit" type="text" class="form-control" name="Nit" value="{{$record->Nit}}">
                            @endforeach
                            @if ($errors->has('Nit'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Nit') }}</strong>
                                </span>
                            @endif
                        </div>  
                    </div>

                    <div class="form-group row">
                        <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>
                        <div class="col-md-6">

                            @foreach($records as $record)

                            <input id="telefono" type="text" class="form-control" name="telefono" value="{{$record->telefono}}">
                             @endforeach
                            @if ($errors->has('telefono'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                            @endif
                        </div>  
                    </div>
                      <div class="col-md-4">

                      </div>
                                      
                    <div class="form-group row">
                      <div class="col-md-2">

                        <a class="btn btn-link" href="{{ route('update.update.entidad', $record->id_entidad) }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>

                         <button href="{{ route('update.update.entidad', $record->id_entidad) }}" class="btn btn-danger">Guardar</button>  
                        </div>
                          <button type="submit" class="btn btn-danger">Cancelar</button>
                        
                                    

                      
                </form>
            </div>
            
        </div>
    </div>
@endsection