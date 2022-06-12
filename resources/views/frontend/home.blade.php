@extends('layouts.app')
@section('content')
Hola mundo
<div>

</div>
<div class="container mt-2">
    <div class="row">
    <div class="col-lg-12 margin-tb">
    <div class="pull-left">
    <h2>Examen Laravel</h2>
    </div>
    <div class="pull-right mb-2">
    </div>
    </div>
    </div>
    <h1>prueba</h1>
    
    <table class="table table-bordered">
        <tr>
        <th>Id Detalle</th>
        <th>Nombre actividad</th>
        <th>Nombre dependencia</th>
        <th>Presupuesto Autorizado</th>
        <th >Acción</th>
        <tbody>
            @foreach ($prueba_eloq_dep as $dependencia)
                @foreach ($dependencia->activities as $actividad)
                    @foreach ($actividad->activityDetails as $count => $activityDetail)
                        <tr>
                            <td>{{$activityDetail->iIdDetalleActividad}}</td>
                            <td>{{$actividad->vActividad}}</td>
                            <td>{{$dependencia->vDependencia}}</td>
                            <td>{{$activityDetail->nPresupuestoAutorizado}}</td>
                            <td>
                                <a href="{{route('detalleactividad.edit',[$activityDetail->iIdDetalleActividad,$dependencia->vDependencia])}}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            @endforeach
        </tbody>
    </table>
    
@endsection