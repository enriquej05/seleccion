@extends('layouts.app')
@section('content')
    
<style>
    .uper {
      margin-top: 40px;
    }
  </style>
  <div class="card uper">
    <div class="card-header">
     
    </div>
    <div class="card-body">
      @foreach ($dep as $item)
          <p></p>
          <form method="POST" action="{{route('detalleactividad.update',$item->iIdDetalleActividad)}}">
              <div class="form-group">
                  @csrf
                  @method('PUT')
                  <label for="country_name">Presupuesto:</label>
                  <input type="text" class="form-control" name="nPresupuestoAutorizado" value="{{$item->nPresupuestoAutorizado}}"/>
                </div>
               
                @if ($status == true)
                <button type="submit" class="btn btn-primary">Actualizar</button>
                @else
                <button type="submit" class="btn btn-primary" disabled="disabled">No se puede actualizar</button>

                @endif
            </form>
            @endforeach
    </div>
  </div>
@endsection