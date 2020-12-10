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

    

<div class="row">
    <div class="col-md-12">
    <div>

  
    <form action="{{route($ruta)}}" method="POST" enctype="multipart/form-data">
            @csrf
<div class="card mb-4">
    @include('admin.layouts.partials.validation-error')

    @include('admin.layouts.partials.session-flash-status')
    <div class="card-header text-primary font-weight-bold m-0">
        Información del proceso de contratación
    </div>

    <div class="card-body">

            <input type="hidden" value="{{$project->id}}" name="id_project">


            <div class="row">
                <div class="col-md-12">
                    <div class="form-row">


   <!---
                        <div class="form-group col-md-6">
                        
                            <label  for="descripcion">Descripción</label>

                            <textarea maxlength="100" required name="descripcion" id="descripcion" class="form-control" name='descripcion' cols="30" rows="4">{{old('descripcion',$project->descripcion)}}</textarea>

                        </div>
                           -->
                        <div class="form-group col-md-6">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="">Datos de contacto de la entidad de adjudicación</label>
                                    <input maxlength="200" required type="text" class="form-control" name="datosdecontacto" value="{{old('datosdecontacto',$project->datosdecontacto)}}">
                                </div>



                                <div class="form-group col-md-6">
                                    <label for="">Fecha de publicación</label>
                                    <input  required type="date" class="form-control" name="fechapublicacion" value="{{old('fechapublicacion',$project->fechapublicacion)}}">


                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Entidad de adjudicación</label>
                                    <input maxlength="200" required type="text" class="form-control" name="entidadadjudicacion" value="{{old('entidadadjudicacion',$project->entidadadjudicacion)}}">
                                </div>
                            </div>



                        </div>


                    </div>
                </div>
            </div>



            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="">Nombre del responsable</label>
                    <input maxlength="200" required type="text" class="form-control" name="nombreresponsable" value="{{old('nombreresponsable',$project->nombreresponsable)}}">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Modalidad de la adjudicación</label>


                    <select required name="modalidadadjudicacion" id="" class="form-control">
                        <option value="">Seleccione una opción</option>
                        @foreach($catmodalidad_adjudicacion as $mod)
                        @if($project->modalidadadjudicacion==$mod->id)
                        <option selected value="{{$mod->id}}">{{$mod->titulo}}</option>
                        @else
                        <option value="{{$mod->id}}">{{$mod->titulo}}</option>
                        @endif

                        @endforeach

                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Tipo de contrato</label>
                    <select required id="" class="form-control" name="tipocontrato">
                        <option value="">Seleccione una opción</option>
                        @foreach($cattipo_contrato as $contrato)
                        @if($project->tipocontrato== $contrato->id)
                        <option selected value="{{$contrato->id}}">{{$contrato->titulo}}</option>
                        @else
                        <option value="{{$contrato->id}}">{{$contrato->titulo}}</option>
                        @endif

                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-3">

                    <label for="">Modalidad de de contratación</label>


                    <select required name="modalidadcontrato" id="" class="form-control">
                        <option value="">Seleccione una opción</option>
                        @foreach($catmodalidad_contratacion as $modcontrato)
                        @if($project->modalidadcontrato==$modcontrato->id)
                        <option selected value="{{$modcontrato->id}}">{{$modcontrato->titulo}}</option>
                        @else
                        <option value="{{$modcontrato->id}}">{{$modcontrato->titulo}}</option>
                        @endif

                        @endforeach

                    </select>
                </div>

            </div>


            <div class="form-row">
                <div class="form-group col-md-4">

                    <label for="">Estado actual de la contratación</label>

                    <select required name="estadoactual" id="" class="form-control">
                        <option value="">Seleccione una opción</option>
                        @foreach($contractingprocess_status as $contractstatus)
                        @if($project->estadoactual==$contractstatus->id)
                        <option selected value="{{$contractstatus->id}}">{{$contractstatus->titulo}}</option>
                        @else
                        <option value="{{$contractstatus->id}}">{{$contractstatus->titulo}}</option>
                        @endif

                        @endforeach

                    </select>
                </div>

                <div class="form-group col-md-4">

                    <label for="">Empresas participantes</label>
                    <input maxlength="200" required type="text" class="form-control" name="empresasparticipantes" value="{{old('empresasparticipantes',$project->empresasparticipantes)}}">

                </div>

                <div class="form-group col-md-4">
                    <label for=""> Entidad administradora del contrato</label>
                    <input maxlength="200" required type="text" name="entidad_admin_contrato" value="{{old('entidad_admin_contrato',$project->entidad_admin_contrato)}}" class="form-control" placeholder="Nombre del área o dependencia responsable de la administración y seguimiento del contrato">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">

                    <label for="">Título del contrato</label>
                    <input maxlength="200" required type="text" name="titulocontrato" value="{{old('titulocontrato',$project->titulocontrato)}}" class="form-control" placeholder="Nombre o título de contrato">
                </div>

                <div class="form-group col-md-4">
                    <label for="">Empresa contratada</label>
                    <input maxlength="200" type="text" class="form-control" name="empresacontratada" value="{{old('empresacontratada',$project->empresacontratada)}}">
                </div>

                <div class="form-group col-md-4">
                    <label for="">Vía por la que presenta su propuesta</label>
                    <input maxlength="200" required type="text" class="form-control" name="viapropuesta" value="{{old('viapropuesta',$project->viapropuesta)}}">
                </div>



            </div>


            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Fecha de presentación de su propuesta</label>
                    <input required type="date" class="form-control" name="fechapresentacionpropuesta" value="{{old('fechapresentacionpropuesta',$project->fechapresentacionpropuesta)}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Monto del contrato</label>
                    <input required type="number" class="form-control" name="montocontrato" value="{{old('montocontrato',$project->montocontrato)}}">

                </div>

                <div class="form-group col-md-4">

                    <label for="">Alcance del trabajo según el contrato</label>
                    <input maxlength="200" required type="text" class="form-control" name="alcancecontrato" value="{{old('alcancecontrato',$project->alcancecontrato)}}">
                </div>


            </div>

            <div class="form-row">


                <div class="form-group col-md-4">

                    <label for="">Fecha de inicio del contrato </label>
                    <input required type="date" class="form-control" name="fechainiciocontrato" value="{{old('fechainiciocontrato',$project->fechainiciocontrato)}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Duración del proyecto de acuerdo con lo establecido en el contrato</label>
                    <input required type="text" class="form-control" name="duracionproyecto_contrato" value="{{old('duracionproyecto_contrato',$project->duracionproyecto_contrato)}}">
                </div>

            </div>
             
            
            

    </div>
    <!--before this go the data-->


</div>
    @include('admin.projects.selectdocuments')
      
        <div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-sm btn-primary shadow-sm">
        <i class="fas {{ $medit ? 'fa-save' : 'fa-edit' }} fa-sm text-white-50"></i>
        {{ $medit ? 'Actualizar' : 'Siguiente' }}
</button>
    </div>

</div>


</div>

</form>
<!--end card-->

@include('admin.projects.modaldeletedocument')
@endsection

@section('scripts')
<script src="{{asset('js/deletemodaldocument.js')}}"></script>
@endsection