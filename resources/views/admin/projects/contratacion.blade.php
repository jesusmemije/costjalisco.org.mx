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
                <label for=""><b>Datos de contacto de la entidad de adjudicación:</b></label>
                <div class="form-row">
                <div class="form-group col-md-6">
                                    <label for="">Entidad de adjudicación</label>
                                    <input  maxlength="50" type="text" class="form-control @error('entidadadjudicacion') is-invalid @enderror" name="entidadadjudicacion" value="{{old('entidadadjudicacion',$project->entidadadjudicacion)}}">
                                    @error('entidadadjudicacion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                </div>
                    <div class="form-row">

                   
                                   

                        <!--
                        <div class="form-group col-md-6">
                            <label for="descripcion">Descripción</label>

                            <textarea required maxlength="50" name="descripcion" id="descripcion" class="form-control " name='descripcion' cols="30" rows="4">{{old('descripcion',$project->descripcion)}}</textarea>
                           
                        </div>
-->
                        <div class="form-group col-md-6">
                        <label for="nombrecontacto">Nombre</label>
                        <input type="text" name="nombrecontacto" id="nombrecontacto" class="form-control" value="{{old('nombrecontacto',$project->nombrecontacto)}}">
                        
                                   <!-- <input maxlength="50" type="text" class="form-control @error('datosdecontacto') is-invalid @enderror" name="datosdecontacto" value="{{old('datosdecontacto',$project->datosdecontacto)}}">
                                    @error('datosdecontacto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror-->
                             



                        </div>

                        <div class="form-group col-md-3">
                        <label for="email">Correo electrónico</label>
                        <input type="text" id="emailcontacto"  maxlength="150" name="emailcontacto" class="form-control" value="{{old('emailcontacto',$project->emailcontacto)}}">
                        </div>

                        <div class="form-group col-md-3">
                        <label for="telefonocontacto"  >Télefono</label>
                        <input type="number"   name="telefonocontacto" id="telefonocontacto" class="form-control" value="{{old('telefonocontacto',$project->telefonocontacto)}}">
                        </div>


                    </div>
                </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-12">
                        <label for="domiciliocontacto">Domicilio</label>
                        <input type="text" id="domiciliocontacto" name="domiciliocontacto" class="form-control" value="{{old('domiciliocontacto',$project->domiciliocontacto)}}">
                        </div>
            </div>
            <div class="form-row">
          
            <div class="form-group col-md-6">
                                    <label for="">Fecha de publicación</label>
                                    <input maxlength="50" type="date" class="form-control @error('fechapublicacion') is-invalid @enderror" name="fechapublicacion" value="{{old('fechapublicacion',$project->fechapublicacion)}}">
                                    @error('fechapublicacion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>

                               
                                </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="">Nombre del responsable</label>
                    <input  maxlength="50" type="text" class="form-control @error('nombreresponsable') is-invalid @enderror" name="nombreresponsable" value="{{old('nombreresponsable',$project->nombreresponsable)}}">
                    @error('nombreresponsable')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="">Modalidad de la adjudicación</label>


                    <select  name="modalidadadjudicacion" id="" class="form-control @error('modalidadadjudicacion') is-invalid @enderror">
                        <option value="">Seleccione una opción</option>
                        @foreach($catmodalidad_adjudicacion as $mod)
                        @if($project->modalidadadjudicacion==$mod->id)
                        <option selected value="{{$mod->id}}">{{$mod->titulo}}</option>
                        @else
                        <option value="{{$mod->id}}">{{$mod->titulo}}</option>
                        @endif

                        @endforeach

                    </select>
                    @error('modalidadadjudicacion')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="">Tipo de contrato</label>
                    <?php 
                       // print_r($project->tipocontrato);
                    ?>
                    <select  id="" class="form-control @error('tipocontrato') is-invalid @enderror" name="tipocontrato">
                        <option value="">Seleccione una opción</option>
                        @foreach($cattipo_contrato as $contrato)
                        @if($project->tipocontrato== $contrato->id)
                        <option selected value="{{$contrato->id}}">{{$contrato->titulo}}</option>
                        @else
                        <option value="{{$contrato->id}}">{{$contrato->titulo}}</option>
                        @endif

                        @endforeach
                    </select>
                    @error('tipocontrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-3">

                    <label for="">Modalidad de de contratación</label>


                    <select  name="modalidadcontrato" id="" class="form-control @error('modalidadcontrato') is-invalid @enderror">
                        <option value="">Seleccione una opción</option>
                        @foreach($catmodalidad_contratacion as $modcontrato)
                        @if($project->modalidadcontrato==$modcontrato->id)
                        <option selected value="{{$modcontrato->id}}">{{$modcontrato->titulo}}</option>
                        @else
                        <option value="{{$modcontrato->id}}">{{$modcontrato->titulo}}</option>
                        @endif

                        @endforeach

                    </select>
                    @error('modalidadcontrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>


            <div class="form-row">
                <div class="form-group col-md-4">

                    <label for="">Estado actual de la contratación</label>

                    <select name="estadoactual" id="" class="form-control @error('estadoactual') is-invalid @enderror">
                        <option value="">Seleccione una opción</option>
                        @foreach($contractingprocess_status as $contractstatus)
                        @if($project->estadoactual==$contractstatus->id)
                        <option selected value="{{$contractstatus->id}}">{{$contractstatus->titulo}}</option>
                        @else
                        <option value="{{$contractstatus->id}}">{{$contractstatus->titulo}}</option>
                        @endif

                        @endforeach

                    </select>
                    @error('estadoactual')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">

                    <label for="">Empresas participantes</label>
                    <input  maxlength="250" type="text" class="form-control @error('empresasparticipantes') is-invalid @enderror" name="empresasparticipantes" value="{{old('empresasparticipantes',$project->empresasparticipantes)}}">
                    @error('empresasparticipantes')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group col-md-4">
                    <label for=""> Entidad administradora del contrato</label>
                    <input  maxlength="50" type="text" name="entidad_admin_contrato" value="{{old('entidad_admin_contrato',$project->entidad_admin_contrato)}}" class="form-control @error('entidad_admin_contrato') is-invalid @enderror" placeholder="Nombre del área o dependencia responsable de la administración y seguimiento del contrato">
                    @error('entidad_admin_contrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">

                    <label for="">Título del contrato</label>
                    <input maxlength="50" type="text" name="titulocontrato" value="{{old('titulocontrato',$project->titulocontrato)}}" class="form-control @error('titulocontrato') is-invalid @enderror" placeholder="Nombre o título de contrato">
                    @error('titulocontrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="">Empresa contratada</label>
                    <input  maxlength="250" type="text" class="form-control @error('empresacontratada') is-invalid @enderror" name="empresacontratada" value="{{old('empresacontratada',$project->empresacontratada)}}">
                    @error('empresacontratada')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="">Vía por la que presenta su propuesta</label>
                    <input  maxlength="50" type="text" class="form-control @error('viapropuesta') is-invalid @enderror" name="viapropuesta" value="{{old('viapropuesta',$project->viapropuesta)}}">
                    @error('viapropuesta')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>



            </div>


            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Fecha de presentación de su propuesta</label>
                    <input maxlength="50" type="date" class="form-control @error('fechapresentacionpropuesta') is-invalid @enderror" name="fechapresentacionpropuesta" value="{{old('fechapresentacionpropuesta',$project->fechapresentacionpropuesta)}}">
                    @error('fechapresentacionpropuesta')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="">Monto del contrato</label>
                    <input  maxlength="50" type="number" class="form-control @error('montocontrato') is-invalid @enderror" name="montocontrato" value="{{old('montocontrato',$project->montocontrato)}}">
                    @error('montocontrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group col-md-4">

                    <label for="">Alcance del trabajo según el contrato</label>
                    <input  maxlength="50" type="text" class="form-control @error('alcancecontrato') is-invalid @enderror" name="alcancecontrato" value="{{old('alcancecontrato',$project->alcancecontrato)}}">
                    @error('alacancecontrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


            </div>

            <div class="form-row">


                <div class="form-group col-md-4">

                    <label for="">Fecha de inicio del contrato </label>
                    <input maxlength="50" type="date" class="form-control @error('fechainiciocontrato') is-invalid @enderror" name="fechainiciocontrato" value="{{old('fechainiciocontrato',$project->fechainiciocontrato)}}">
                    @error('fechainiciocontrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="">Duración del proyecto de acuerdo con lo establecido en el contrato</label>
                    <input  maxlength="50" type="text" class="form-control @error('duracionproyecto_contrato') is-invalid @enderror" name="duracionproyecto_contrato" value="{{old('duracionproyecto_contrato',$project->duracionproyecto_contrato)}}">
                    @error('duracionproyecto_contrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
             
            
            

    </div>
    <!--before this go the data-->
  
     
          <div class="form-group col-md-12">
        <label for="observaciones">Observaciones:</label>
        <input type="text" name="observaciones" id="observaciones" class="form-control" value="{{old('observaciones',$project->observaciones)}}">
          </div>


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