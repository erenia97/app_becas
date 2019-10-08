@extends('layouts.app')

@section('content')
         <div class="container">
        <h1 style="font-size: 2.2rem">Becas Disponibles</h1>
        <hr/>
  
        <table class="table table-bordered bg-light">
            <thead class="bg-dark" style="color: white">
            <tr>
           
                <th width="60px" style="text-align: center">No</th>              
                <th>Nombre Beca</th>
                <th>Descripcion</th>
                 <th>lugar</th>            
                  <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                  <th>Carrera</th>
                <th>Tipo Beca</th>
                <th width="150px">Ver Detalles</th>
                <th width="150px">Aplicar </th>
            </tr>
            </thead>
            <tbody>
            @php
                $i=1;
            @endphp
            @foreach($records as $record)
                <tr>
                    <th style="text-align: center">{{$i++}}</th>
                    <td>{{$record->Nombre}}</td>
                    <td>{{$record->descripcion}}</td>
                    <td>{{$record->lugar}}</td>
                     <td>{{$record->fecha_inicio}}</td>
                    <td>{{$record->fecha_fin}}</td>
                    <td>{{$record->nombre_carrera}}</td>
                    <td>{{$record->tipo_beca}}</td>


                    <td align="center">
                        <form id="frm_{{$record->id_becas}}"
                              action="{{url('/eliminarBecas/'.$record->id_becas)}}"
                              method="post" style="padding-bottom: 0px;margin-bottom: 0px">
                            <a class="btn btn-primary btn-sm" title="Edit"
                               href="{{url('/registaar/becasupdate/'.$record->id_becas)}}">
                                Ver Detalles</a>
                          
                        </form>
                    </td>
                      <td align="center">
                        <form id="frm_{{$record->id_becas}}"
                              action="{{url('/eliminarBecas/'.$record->id_becas)}}"
                              method="post" style="padding-bottom: 0px;margin-bottom: 0px">
                            <a class="btn btn-primary btn-sm" title="Edit"
                               href="{{url('/registaar/becasupdate/'.$record->id_becas)}}">
                                APLICAR</a>
                          
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        
    </div>
@endsection
             