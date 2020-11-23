@extends("admin.layouts.app")

@section('styles')

<style>
    label {
        color: #000;
    }
</style>

@endsection

@section('content')

@include('admin.projects.phasesnav')
<br>
<div class="card mb-4">
    @include('admin.layouts.partials.validation-error')

    @include('admin.layouts.partials.session-flash-status')
    <div class="card-header text-primary font-weight-bold m-0">
        Información referente a la finalización del proyecto
    </div>

    <div class="card-body">


        <form action="{{route($ruta)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$project->id}}" name="id_project">
            <div class="form-row">
                <div class="form-group col-md-4">

                    <label for="descripcion">Descripción</label>
                    <input id="descripcion" type="text" class="form-control" name='descripcion' value="{{old('descripcion',$project->descripcion)}}" placeholder="Descripción (opcional)">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Costo de finalización</label>
                    <input type="number" class="form-control" name="costofinalizacion" value="{{old('costofinalizacion',$project->costofinalizacion)}}">
                </div>

                <div class="form-group col-md-2">
                    <label for="">Fecha de finalización</label>
                    <input type="date" class="form-control" name="fechafinalizacion" value="{{old('fechafinalizacion',$project->fechafinalizacion)}}">
                </div>

                <div class="form-group col-md-4">
                    <label for="">Alcance a la finalización</label>
                    <input type="text" name="alcancefinalizacion" id="" class="form-control" value="{{old('alcancefinalizacion',$project->alcancefinalizacion)}}">


                </div>
            </div>

            <div class="form-row">


                <div class="form-group col-md-6">
                    <label for="">Razones de cambio en el proyecto</label>
                    <input name="razonescambioproyecto" type="text" class="form-control" value="{{old('razonescambioproyecto',$project->razonescambioproyecto)}}">
                </div>

                <div class="form-group col-md-4">

                    <label for="">Referencia a informes de auditoría y evaluación</label>
                    <input name="referenciainforme" type="file" class="form-control form-control-sm" value="{{old('referenciainforme',$project->referenciainforme)}}">



                </div>



            </div>
            @include('admin.projects.selectdocuments')
    

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-sm btn-primary shadow-sm offset-md-10">
                    <i class="fas {{ $medit ? 'fa-save' : 'fa-edit' }} fa-sm text-white-50"></i>
                    {{ $medit ? 'Actualizar' : 'Finalizar registro' }}
                </button>
            </div>


    </div>
    <!--before this go the data-->


    </form>


</div>









@endsection

@section('scripts')
@endsection