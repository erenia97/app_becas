@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">

            <div class="card-header">{{ __('DATOS ENTIDAD') }}</div>

            <div class="card-body">


               <form  method="POST" action="{{ route('update.update.entidad', $records->id_entidad) }}" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group row">
                        <label for="Nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                         <div class="col-md-6">
                            <input id="Nombre" type="text" class="form-control"  name="Nombre" value=" {{ $records->Nombre }}">
                          </div>
                    </div>
                    <div class="form-group row">
                        <label for="Razon_social" class="col-md-4 col-form-label text-md-right">{{ __('Razon Social') }}</label>
                        <div class="col-md-6">
                            <input id="Razon_social" type="text" class="form-control" name="Razon_social" value="{{ $records->Razon_social }}">
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
                            <input id="pagina_Web" type="text" class="form-control" name="pagina_Web" value="{{ $records->pagina_Web}}">
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
                            <input id="sector" type="text" class="form-control" name="sector" value="{{$records->sector}}">
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
                            <img style="width:50%" src="{{ url('storage/'.$records->logo)  }}">
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
                            <input id="direccion" type="text" class="form-control" name="direccion" value="{{$records->direccion}}">
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
                            <input id="Nit" type="text" class="form-control" name="Nit" value="{{$records->Nit}}">
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
                            <input id="telefono" type="text" class="form-control" name="telefono" value="{{$records->telefono}}">
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
                          <button type="submit" class="btn btn-info">Guardar</button>
                          <button class="btn btn-danger">Cancelar</button>
                      </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
