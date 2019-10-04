@extends('layouts.app')

@section('content')
    <div class="container" align="center">
        <div class="col-md-1">
            </div>
        <div  class="card">

            <div  class="card-header " >{{ __('INGRESE REQUISITOS DE BECA') }}</div>

            <div class="card-body ">

                <form  method="POST" action="{{ route('registro.beneficios') }}" enctype="multipart/form-data">
                 
                     @csrf



                     <div class="form-group row">
                        <label for="id_beca" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese el nombre de la beca') }}</label>
                        <div class="col-md-6">
                            <select id="id_beca" type="text" class="form-control{{ $errors->has('id_beca') ? ' is-invalid' : '' }}" name="id_beca">
                                @foreach ($beneficios as $becas)
                                    <option value="{{$becas->id_becas}}">{{ $becas->Nombre}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('id_beca'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('id_beca') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>



                     <div class="form-group row">
                        <label for="edad" class="col-md-4 col-form-label text-md-right">{{ __('descripcion') }}</label>

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
                        <label for="Profesion" class="col-md-4 col-form-label text-md-right">{{ __('lugar') }}</label>
                        <div class="col-md-6">
                            <input id="lugar" type="text" class="form-control{{ $errors->has('lugar') ? ' is-invalid' : '' }}" name="lugar" value="{{ old('lugar') }}">

                            @if ($errors->has('lugar'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lugar') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="Profesion" class="col-md-4 col-form-label text-md-right">{{ __('cobertura') }}</label>
                        <div class="col-md-6">
                            <input id="cobertura" type="text" class="form-control{{ $errors->has('cobertura') ? ' is-invalid' : '' }}" name="cobertura" value="{{ old('cobertura') }}">

                            @if ($errors->has('cobertura'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cobertura') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="Profesion" class="col-md-4 col-form-label text-md-right">{{ __('tiempo') }}</label>
                        <div class="col-md-6">
                            <input id="tiempo" type="text" class="form-control{{ $errors->has('tiempo') ? ' is-invalid' : '' }}" name="tiempo" value="{{ old('tiempo') }}">

                            @if ($errors->has('tiempo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tiempo') }}</strong>
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