@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">

            <div class="card-header">{{ __('Registra tu datos') }}</div>

            <div class="card-body">
                <form  method="POST" action="{{ route('registar.entidad') }}" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group row">
                        <label for="Nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

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
                        <label for="Razon_social" class="col-md-4 col-form-label text-md-right">{{ __('Razon Social') }}</label>
                        <div class="col-md-6">
                            <input id="Razon_social" type="text" class="form-control{{ $errors->has('Razon_social') ? ' is-invalid' : '' }}" name="Razon_social" value="{{ old('Razon_social') }}">

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
                            <select id="id_pais" type="text" class="form-control{{ $errors->has('id_pais') ? ' is-invalid' : '' }}" name="id_pais">
                                @foreach ($paises as $pais)
                                    <option value="{{$pais->id_pais}}">{{ $pais->nombre_pais }}</option>
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
                            <input id="pagina_Web" type="text" class="form-control{{ $errors->has('pagina_Web') ? ' is-invalid' : '' }}" name="pagina_Web" value="{{ old('pagina_Web') }}">

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
                            <input id="sector" type="text" class="form-control{{ $errors->has('sector') ? ' is-invalid' : '' }}" name="sector" value="{{ old('sector') }}">

                            @if ($errors->has('sector'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('sector') }}</strong>
                                </span>
                            @endif
                        </div>  
                    </div>

                    <div class="form-group row">
                        <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>
                        <div class="col-md-6">
                            <input id="logo" type="file" class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" name="logo">
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
                            <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{ old('direccion') }}">

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
                            <input id="Nit" type="text" class="form-control{{ $errors->has('Nit') ? ' is-invalid' : '' }}" name="Nit" value="{{ old('Nit') }}">

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
                            <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}">

                            @if ($errors->has('telefono'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telefono') }}</strong>
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