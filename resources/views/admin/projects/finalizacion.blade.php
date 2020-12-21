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
                <!--
                <div class="form-group col-md-4">

                    <label for="descripcion">Descripción</label>
                    <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name='descripcion' value="{{old('descripcion',$project->descripcion)}}" placeholder="Descripción (opcional)">
                     @error('descripcion')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

-->

                <div class="form-group col-md-2">
                    <label for="">Costo de finalización</label>
                    <input maxlength="50" type="number" class="form-control @error('costofinalizacion') is-invalid @enderror" name="costofinalizacion" value="{{old('costofinalizacion',$project->costofinalizacion)}}">
                    @error('costofinalizacion')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-2">
                    <label for="">Fecha de finalización</label>
                    <input  maxlength="50" type="date" class="form-control @error('fechafinalizacion') is-invalid @enderror" name="fechafinalizacion" value="{{old('fechafinalizacion',$project->fechafinalizacion)}}">
                    @error('fechafinalizacion')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group col-md-4">
                    <label for="">Alcance a la finalización</label>
                    <input  maxlength="50" type="text" name="alcancefinalizacion" id="" class="form-control @error('alcancefinalizacion') is-invalid @enderror" value="{{old('alcancefinalizacion',$project->alcancefinalizacion)}}">
                    @error('alcancefinalizacion')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">


                <div class="form-group col-md-6">
                    <label for="">Razones de cambio en el proyecto</label>
                    <input  maxlength="50" name="razonescambioproyecto" type="text" class="form-control @error('razonescambioproyecto') is-invalid @enderror" value="{{old('razonescambioproyecto',$project->razonescambioproyecto)}}">
                    @error('razonescambioproyecto')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">

                    <label for="">Referencia a informes de auditoría y evaluación</label>
                    <input maxlength="50" name="referenciainforme" type="file" class="form-control form-control-sm @error('referenciainforme') is-invalid @enderror" value="{{old('referenciainforme',$project->referenciainforme)}}">
                    @error('referenciainforme')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror



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