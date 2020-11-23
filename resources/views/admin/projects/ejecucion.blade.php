@extends("admin.layouts.app")

@section('styles')
@endsection

@section('content')
@include('admin.projects.phasesnav')

<br>
<div class="card mb-4">
    @include('admin.layouts.partials.validation-error')

    @include('admin.layouts.partials.session-flash-status')
    <div class="card-header text-primary font-weight-bold m-0">
        Información de la fase de ejecución del proyecto
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
                <div class="form-group col-md-4">
                    <label for="">Variaciones en el precio del contrato</label>
                    <input type="file" class="form-control-sm form-control" name="variacionespreciocontrato" value="{{old('variacionespreciocontrato',$project->variacionespreciocontrato)}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Razones de cambio en el precio del contrato</label>
                    <input type="file" class="form-control-sm form-control" name="razonescambiopreciocontrato" value="{{old('razonescambiopreciocontrato',$project->razonescambiopreciocontrato)}}">
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Variaciones en la duración del contrato</label>
                    <input type="file" class="form-control form-control-sm" name="variacionesduracioncontrato" value="{{old('variacionesduracioncontrato',$project->variacionesduracioncontrato)}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Razones de cambio en la duración del contrato</label>
                    <input type="file" name="razonescambioduracioncontrato" id="" class="form-control form-control-sm" value="{{old('razonescambioduracioncontrato',$project->razonescambioduracioncontrato)}}">


                </div>
                <div class="form-group col-md-4">
                    <label for="">Variaciones en el alcance del contrato</label>
                    <input name="variacionesalcancecontrato" type="file" class="form-control form-control-sm" value="{{old('',)}}">
                </div>

                <div class="form-group col-md-4">

                    <label for="">Razones de cambios en el alcance del contrato</label>
                    <input name="razonescambiosalcancecontrato" type="file" class="form-control form-control-sm" value="{{old('',)}}">



                </div>
                <div class="form-group col-md-4">

                    <label for="">Aplicación de escalatoria</label>
                    <input name="aplicacionescalatoria" type="file" class="form-control form-control-sm" value="{{old('',)}}">



                </div>
                <div class="form-group col-md-4">

                    <label for="">Estado actual del proyecto</label>
                    <input type="text" class="form-control form-control-sm" name="estadoactualproyecto" value="{{old('estadoactualproyecto',$project->estadoactualproyecto)}}">



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