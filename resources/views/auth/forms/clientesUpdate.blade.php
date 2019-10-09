@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Registra tu datos') }}</div>
            <div class="card-body">
                <form  method="POST" action="{{ route('update.update.clientes', $records->id_cliente) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="id_carrera" class="col-md-4 col-form-label text-md-right">{{ __('Profesion') }}</label>


                        <div class="col-md-6">
                            <select id="id_carrera" type="text" class="form-control{{ $errors->has('id_carrera') ? ' is-invalid' : '' }}" name="id_carrera">

                                @foreach ($profesion as $profesion)
                                    @if($profesion->lista == 'CCH_EC_Escolaridad')
                                        <option value="{{$profesion->id_carrera}}">{{ $profesion->carrera }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('id_carrera'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('id_carrera') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="id_profesion" class="col-md-4 col-form-label text-md-right">{{ __('Carrera') }}</label>
                        <div class="col-md-6">
                            <select id="id_profesion" type="text" class="form-control{{ $errors->has('id_profesion') ? ' is-invalid' : '' }}" name="id_profesion">
                            </select>
                            @if ($errors->has('id_profesion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('id_profesion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="Nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                        <div class="col-md-6">
                            <input id="Nombre" type="text" class="form-control{{ $errors->has('Nombre') ? ' is-invalid' : '' }}" name="Nombre" value="{{$records->Nombre }}">

                            @if ($errors->has('Nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Nombre') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="Apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>
                        <div class="col-md-6">
                            <input id="Apellido" type="text" class="form-control{{ $errors->has('Apellido') ? ' is-invalid' : '' }}" name="Apellido" value="{{ $records->Apellido }}">

                            @if ($errors->has('Apellido'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Apellido') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_pais" class="col-md-4 col-form-label text-md-right">{{ __('Pais') }}</label>
                        <div class="col-md-6">
                            <select id="id_pais" type="text" class="form-control{{ $errors->has('id_pais') ? ' is-invalid' : '' }}" name="id_pais">
                                @foreach ($paises as $pais)
                                    <option value="{{$pais->id_pais}}" @if($pais->id_pais == $records->id_pais) selected @endif>{{ $pais->nombre_pais }}</option>
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
                        <label for="Correo" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>
                        <div class="col-md-6">
                            <input id="Correo" type="text" class="form-control{{ $errors->has('Correo') ? ' is-invalid' : '' }}" name="Correo" value="{{ $records->Correo }}">

                            @if ($errors->has('Correo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Correo') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>
                        <div class="col-md-6">
                            <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ $records->telefono}}">

                            @if ($errors->has('telefono'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>
                        <div class="col-md-6">
                            <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{ $records->direccion}}">
                            @if ($errors->has('direccion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de nacimiento') }}</label>
                        <div class="col-md-6">
                            <input id="fecha_nacimiento" type="date" class="form-control{{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}" name="fecha_nacimiento" value="{{ $records->fecha_nacimiento }}">

                            @if ($errors->has('fecha_nacimiento'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sexo" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>
                        <div class="col-md-6">
                            <select name="sexo" id="sexo" class="form-control" Value="{{ $records->sexo }}">
                                @if( $records->sexo ==0) selected
                                <option value="0" >Hombre</option>
                                @else
                                <option value="1">Mujer</option>
                                @endif
                                <option value="0" >Hombre</option>
                                <option value="1">Mujer</option>
                            </select>
                            @if ($errors->has('sexo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('sexo') }}</strong>
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

@push('scripts')
    <script>

        // Carga inicial
        cargarProfeccion("{{ $records->id_profesion }}");

        $(document).on('change', '#id_carrera', function() {
            // Does some stuff and logs the event to the console
            //console.log('antes de la llamada',$('#id_carrera').val());
            cargarCarreras($('#id_carrera').val())
        });

        function cargarProfeccion(id) {
            $.ajax({
                url: "{{ env('APP_URL') }}/api/get/carreras/hijo?id_carrera="+id
            }).done(function(response) {
                var profe = response;
                $('#id_carrera option[value="'+ profe.id_carrera_pareja +'"]').prop('selected', true);
                cargarCarreras(profe.id_carrera_pareja);
            });
        }

        function cargarCarreras(carreraId) {

            console.log(carreraId);

            $('#id_profesion').empty();
            $("#id_profesion option").each(function() {
                $(this).remove();
            });

            $.ajax({
                url: "{{ env('APP_URL') }}/api/get/carreras?id_carrera="+carreraId
            }).done(function(carreras) {

                //var profe = response;
                console.log(carreras);

                $.each(carreras, function( index, element ) {
                    // element == this
                    $('#id_profesion').append('<option value="'+element.id_carrera+'">'+element.carrera+'</option>');
                });

                $('#id_profesion option[value="'+ {{ $records->id_profesion  }} +'"]').prop('selected', true);
            });
        }
    </script>
@endpush


