@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">

            <div class="card-header">{{ __('Registra tu datos') }}</div>

            <div class="card-body">
                <form  method="POST" action="{{ route('registar.beca') }}" enctype="multipart/form-data">
                     @csrf

                  <div class="form-group row">
                        <label for="nombre_beca" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese el tipo de Beca') }}</label>
                        <div class="col-md-6">
                            <input id="nombre_beca" type="text" class="form-control{{ $errors->has('nombre_beca') ? ' is-invalid' : '' }}" name="nombre_beca" value="{{ old('nombre_beca') }}">

                            @if ($errors->has('nombre_beca'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre_beca') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>




                          <div class="form-group row">
                        <label for="nombre_Carrera" class="col-md-4 col-form-label text-md-right">{{ __('Profesion a Especializarce') }}</label>
                        <div class="col-md-6">
                            <input id="nombre_Carrera" type="text" class="form-control{{ $errors->has('nombre_Carrera') ? ' is-invalid' : '' }}" name="nombre_Carrera" value="{{ old('nombre_Carrera') }}">

                            @if ($errors->has('nombre_Carrera'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre_Carrera') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

        

        
                          <div class="form-group row">
                        <label for="Nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de la beca') }}</label>
                        <div class="col-md-6">
                            <input id="Nombre" type="text" class="form-control{{ $errors->has('Nombre') ? ' is-invalid' : '' }}" name="Nombre" value="{{ old('Nombre') }}">

                            @if ($errors->has('Nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Nombre') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

        

                    


                    <div class="form-group row">
                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Decripcion') }}</label>
                        <div class="col-md-6">
                            <input id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" value="{{ old('descripcion') }}">

                            @if ($errors->has('descripcion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                   

                    <div class="form-group row">
                        <label for="lugar
                        " class="col-md-4 col-form-label text-md-right">{{ __('Lugar de Beca') }}</label>
                        <div class="col-md-6">
                            <input id="lugar
                            " type="text" class="form-control{{ $errors->has('lugar') ? ' is-invalid' : '' }}" name="lugar" value="{{ old('lugar') }}">

                            @if ($errors->has('lugar'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lugar') }}</strong>
                                </span>
                            @endif
                        </div>  
                    </div>

                  
                    <div class="form-group row">
                        <label for="fecha_inicio" class="col-md-4 col-form-label text-md-right">{{ __('Fecha iniciacion para aplicar') }}</label>
                        <div class="col-md-6">
                            <input id="fecha_inicio" type="date" class="form-control{{ $errors->has('fecha_inicio') ? ' is-invalid' : '' }}" name="fecha_inicio">
                            @if ($errors->has('fecha_inicio'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fecha_inicio') }}</strong>
                                </span>
                            @endif
                        </div>  
                    </div>

                    <div class="form-group row">
                        <label for="fecha_fin" class="col-md-4 col-form-label text-md-right">{{ __('Fecha finalizacion para aplicar') }}</label>
                        <div class="col-md-6">
                            <input id="fecha_fin" type="date" class="form-control{{ $errors->has('fecha_fin') ? ' is-invalid' : '' }}" name="fecha_fin" value="{{ old('fecha_fin') }}">

                            @if ($errors->has('fecha_fin'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fecha_fin') }}</strong>
                                </span>
                            @endif
                        </div>  
                    </div>

                  
                    <button type="submit" class="btn btn-info">Enviar</button>
                </form>
            </div>
            
        </div>
    </div>
@endsection


