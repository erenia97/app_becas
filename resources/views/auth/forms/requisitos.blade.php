@extends('layouts.app')

@section('content')
    <div class="container" align="center">
        <div class="col-md-1">
            </div>
        <div  class="card">

            <div  class="card-header " >{{ __('INGRESE REQUISITOS DE BECA') }}</div>

            <div class="card-body ">

                <form  method="POST" action="{{ route('becas.requisitos') }}" enctype="multipart/form-data">
                 
                     @csrf



                     <div class="form-group row">
                        <label for="id_beca" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese el nombre de la beca') }}</label>
                        <div class="col-md-6">
                            <select id="id_beca" type="text" class="form-control{{ $errors->has('id_beca') ? ' is-invalid' : '' }}" name="id_beca">
                                @foreach ($requisitos as $becas)
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
                        <label for="edad" class="col-md-4 col-form-label text-md-right">{{ __('Edad') }}</label>

                        <div class="col-md-6">
                            <input id="edad" type="text" class="form-control{{ $errors->has('edad') ? ' is-invalid' : '' }}" name="edad" value="{{ old('edad') }}">

                            @if ($errors->has('edad'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('edad') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="Profesion" class="col-md-4 col-form-label text-md-right">{{ __('Profesion') }}</label>
                        <div class="col-md-6">
                            <input id="Profesion" type="text" class="form-control{{ $errors->has('Profesion') ? ' is-invalid' : '' }}" name="Profesion" value="{{ old('Profesion') }}">

                            @if ($errors->has('Profesion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Profesion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                     <div id="gender-group" class="form-group text-md-center row{{ $errors->has('gender') ? ' has-error' : '' }}">
                    
                     <label for="sexo" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>

                     <div class="col-md-2"><input id="sexo" type="radio" class="{{ $errors->has('sexo') ? ' is-invalid' : '' }}" name="sexo"   name="sexo" value="1" {{ (old('sexo') == 'Hombre') ? 'checked' : '' }} >Hombre</div>
                    <div class="col-md-2"><input id="sexo" type="radio" class="{{ $errors->has('sexo') ? ' is-invalid' : '' }}" name="sexo"  name="sexo" value="0" {{ (old('sexo') == 'Mujer') ? 'checked' : '' }} >Mujer</div>
                 <div class="col-md-2"><input id="sexo" type="radio" class="{{ $errors->has('sexo') ? ' is-invalid' : '' }}" name="sexo"  name="sexo" value="2" {{ (old('sexo') == 'Mujer') ? 'checked' : '' }} >Indiferente</div>
                        <span class="invalid-feedback" role="alert">
                          @if ($errors->has('sexo'))
                                <span class="invalid-feedback" role="alert">   
                        <strong>{{ $errors->first('sexo') }}</strong>
                        </span>
                    @endif
                 
                 </div>

                    <button type="submit" class="btn btn-info">Enviar</button>
                </form>
            </div>
            
        </div>
    </div>
@endsection