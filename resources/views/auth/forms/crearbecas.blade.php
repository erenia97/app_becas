@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">

            <div class="card-header">{{ __('Registra tu datos') }}</div>

            <div class="card-body">
                <form  method="POST" action="{{ route('registar.beca') }}" enctype="multipart/form-data">
                     @csrf

                     <div class="form-group row">
                        <label for="Nombre" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de beca') }}</label>
                        <div class="col-md-6">
                            <input id="nombre_tipo" type="text" class="form-control{{ $errors->has('Nombre') ? ' is-invalid' : '' }}" name="nombre_tipo" value="{{ old('Nombre') }}">

                            @if ($errors->has('Nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Nombre') }}</strong>
                                </span>
                            @endif
                        </div>  
                    </div>


                   
                     <div class="form-group row">
                        <label for="Nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de beca') }}</label>
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
                            " type="text" class="form-control{{ $errors->has('lugar
                            ') ? ' is-invalid' : '' }}" name="lugar
                            " value="{{ old('lugar
                            ') }}">

                            @if ($errors->has('lugar'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lugar') }}</strong>
                                </span>
                            @endif
                        </div>  
                    </div>

                    <div class="form-group row">
                        <label for="sector" class="col-md-4 col-form-label text-md-right">{{ __('Sector') }}</label>
                        <div class="col-md-6">
                            <input id="sector" type="text" class="form-control{{ $errors->has('sector') ? ' is-invalid' : '' }}" name="sector" value="{{ old('sector') }}">

                            @if ($errors->has('sector'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('sector') }}</strong>
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

