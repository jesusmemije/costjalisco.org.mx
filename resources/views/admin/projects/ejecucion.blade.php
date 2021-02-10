@extends("admin.layouts.app")

@section('styles')
@endsection

@section('content')
@include('admin.projects.phasesnav')


@foreach($contratos as $contrato)
<?php
    $ejecucion=DB::table('proyecto_ejecucion')
    ->where('id_contrato',$contrato->id)
    ->first();
    $btn=false;
    $ruta='project.saveejecucion';
    if($ejecucion==null){
        $ejecucion=new stdClass();
        $ejecucion->variacionespreciocontrato="";
        $ejecucion->razonescambiopreciocontrato="";
        $ejecucion->variacionesduracioncontrato="";
        $ejecucion->razonescambioduracioncontrato="";
        $ejecucion->variacionesalcancecontrato="";
        $ejecucion->razonescambiosalcancecontrato="";
        $ejecucion->aplicacionescalatoria="";
        $ejecucion->estadoactualproyecto="";
        $ejecucion->observaciones="";
      
    }else{
        $btn=true;
        $ruta='project.updateejecucion';
    }
?>
    






<br>
<div class="card mb-4">
    @include('admin.layouts.partials.validation-error')

    @include('admin.layouts.partials.session-flash-status')
    <div class="card-header text-primary font-weight-bold m-0">
        Información de la fase de ejecución del proyecto. Contrato #{{$contrato->id}}
    </div>

    <div class="card-body">


        <form action="{{route($ruta)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$project->id}}" name="id_project">
            <input type="hidden" value="{{$contrato->id}}" name="id_contrato">
            <div class="form-row">
                 <!--
                <div class="form-group col-md-4">
                   
                    <label for="descripcion">Descripción</label>
                    <input id="descripcion" type="text" class="form-control" name='descripcion' value="{{old('descripcion',$project->descripcion)}}" placeholder="Descripción (opcional)">

                </div>
                -->
                <div class="form-group col-md-4">
                    <label for="">Variaciones en el precio del contrato</label>
                    <input maxlength="50" type="text" class="form-control-sm form-control @error('variacionespreciocontrato') is-invalid @enderror" name="variacionespreciocontrato" value="{{$ejecucion->variacionespreciocontrato}}">
                    @error('variacionespreciocontrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="">Razones de cambio en el precio del contrato</label>
                    <input maxlength="50" type="text" class="form-control-sm form-control @error('razonescambiopreciocontrato') is-invalid @enderror" name="razonescambiopreciocontrato" value="{{$ejecucion->razonescambiopreciocontrato}}">
                    @error('razonescambiopreciocontrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Variaciones en la duración del contrato</label>
                    <input  maxlength="50" type="text" class="form-control form-control-sm @error('variacionesduracioncontrato') is-invalid @enderror" name="variacionesduracioncontrato" value="{{$ejecucion->variacionesduracioncontrato}}">
                    @error('variacionesduracioncontrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="">Razones de cambio en la duración del contrato</label>
                    <input maxlength="50" type="text" name="razonescambioduracioncontrato" id="" class="form-control form-control-sm @error('razonescambioduracioncontrato') is-invalid @enderror" value="{{$ejecucion->razonescambioduracioncontrato}}">
                    @error('razonescambioduracioncontrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror


                </div>
                <div class="form-group col-md-4">
                    <label for="">Variaciones en el alcance del contrato</label>
                    <input  maxlength="50" name="variacionesalcancecontrato" type="text" class="form-control form-control-sm @error('variacionesalcancecontrato') is-invalid @enderror" value="{{$ejecucion->variacionesalcancecontrato}}">
                    @error('variacionesalcancecontrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">

                    <label for="">Razones de cambios en el alcance del contrato</label>
                    <input maxlength="50" name="razonescambiosalcancecontrato" type="text" class="form-control form-control-sm @error('razonescambiosalcancecontrato') is-invalid @enderror" value="{{$ejecucion->razonescambiosalcancecontrato}}">
                    @error('razonescambiosalcancecontrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="">Aplicación de escalatoria</label>
                    <input maxlength="50" name="aplicacionescalatoria" type="text" class="form-control form-control-sm @error('aplicacionescalatoria') is-invalid @enderror" value="{{$ejecucion->aplicacionescalatoria}}">
                    @error('aplicacionesescalatoria')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror



                </div>
                <div class="form-group col-md-4">

                    <label for="">Porcentaje de avance financiero del proyecto</label>
                    <input  maxlength="50" type="text" class="form-control form-control-sm @error('estadoactualproyecto') is-invalid @enderror" name="estadoactualproyecto" value="{{$ejecucion->estadoactualproyecto}}">
                    @error('estadoactualproyecto')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror



                </div>

            </div>
            <div class="form-row">
          <div class="form-group col-md-12">
        <label for="observaciones">Observaciones:</label>
        <input type="text" name="observaciones" id="observaciones" class="form-control" value="{{$ejecucion->observaciones}}">
          </div>
        </div>
            @include('admin.projects.selectdocuments')
    
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-warning shadow-sm offset-md-10" style="color: black; font-weight:bold">
                 
                    {{ $btn ? 'Actualizar' : 'Guardar' }}
                </button>
            </div>
           



    </div>
    <!--before this go the data-->


    </form>
    @include('admin.projects.modaldeletedocument')

</div>

@endforeach
<form action="{{route('siguientejecucion')}}" method="post">
@csrf
<input type="hidden" name="id_project" value="{{$project->id}}">
<div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-edit fa-sm text-white-50"></i>
                        {{'Siguiente' }}
                    </button>
                </div>

</form>

@endsection

@section('scripts')
<script src="{{asset('js/deletemodaldocument.js')}}"></script>
@endsection