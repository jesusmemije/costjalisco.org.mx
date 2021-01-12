@extends('front.layouts.app')
 
@section('title')
Datos del proyecto
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
@endsection
<meta charset='utf-8'>

@section('content')


  
  
    <!-- Section - Descripción General del proyecto -->
    
            <!--<img src="{{ asset('assets/img/project/proyecto-2.jpg') }}" class="img-fluid" alt="">-->
    <div class="container-fluid pt-4">        
 
    
   <!-- <img src="{{ asset('assets/img/project/proyecto-2.jpg') }}" class="img-fluid" alt=""> -->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<div class="row mb-5" style="background-color: #d8d8cd;">
    
    <div class="col-md-3 px-0">
    
  <ol class="carousel-indicators">

    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    @for ($i = 1; $i < sizeof($project_imgs); $i++)
    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
   
    @endfor
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <?php 
    $ruta=asset('projects_imgs/'.$project_imgs[0]->imgroute);
   
    ?>

    <img src="{{$ruta}}" class="d-block w-100" height="300" alt="">
    </div>
    @for ($i = 1; $i < sizeof($project_imgs); $i++)
    <div class="carousel-item">
    <?php 
    $ruta=asset('projects_imgs/'.$project_imgs[$i]->imgroute);
    
    ?> 
    <img src="{{$ruta}}" height="300"  class="d-block w-100" alt="">
    </div>
    @endfor
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="col-md-9 px-0">
            <div class="media-body">
                <div id="titleproject" class="col-md-12">
                    <span>{{ $project->title }}</span>
                </div>
                <div id="benefited" class="col-md-12">
                    <div class="row mx-0 align-items-baseline">
                        <img src="{{ asset('/assets/img/project/icons/people.png') }}" class="img-fluid ml-3" width="60"
                            alt="">
                        <label class="ml-3" style="color:#628ea0; font-size: 28px; font-weight: 600;" for="">{{number_format($project->people)}}
                            ciudadanos beneficiados</label>
                    </div>
                    <div class="row mx-0">
                        <div id="btns">
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <button onclick="smoothScroll(document.getElementById('datos-generales'))"
                                    class="btn btn-gris btn-sm"
                                    style="background: linear-gradient(90deg, rgba(145,145,145,1) 0%, rgba(136,136,136,1) 100%); ">DATOS
                                    GENERALES</button>
                                <button onclick="smoothScroll(document.getElementById('identificacion'))"
                                    class="btn btn-gris btn-sm"
                                    style="background: linear-gradient(90deg, rgba(135,135,135,1) 0%, rgba(126,126,126,1) 100%);">IDENTIFICACIÓN</button>
                                <button onclick="smoothScroll(document.getElementById('preparacion'))"
                                    class="btn btn-gris btn-sm"
                                    style="background: linear-gradient(90deg, rgba(125,125,125,1) 0%, rgba(115,115,115,1) 100%);">PREPARACIÓN</button>
                                <button onclick="smoothScroll(document.getElementById('contratacion'))"
                                    class="btn btn-gris btn-sm"
                                    style="background: linear-gradient(90deg, rgba(114,114,114,1) 0%, rgba(93,93,93,1) 100%); ">PROCEDIMIENTO
                                    DE CONTRATACIÓN</button>
                                <button onclick="smoothScroll(document.getElementById('ejecucion'))"
                                    class="btn btn-gris btn-sm"
                                    style="background: linear-gradient(90deg, rgba(91,91,91,1) 0%, rgba(83,83,83,1) 100%);">EJECUCIÓN</button>
                                <button onclick="smoothScroll(document.getElementById('finalizacion'))"
                                    class="btn btn-gris btn-sm"
                                    style="background: linear-gradient(90deg, rgba(82,82,82,1) 0%, rgba(73,73,73,1) 100%);">FINALIZACIÓN</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid" id="status">
                    <div class="row pt-2">
                        <div class="col-md-4">
                            <span style="font-size: 22px; font-weight: 700;">Estatus:</span>
                        </div>
                        <div class="col-md-8 d-flex justify-content-end align-items-baseline">
                            <span
                                style="font-size: 26px; font-weight: 700;">{{$project->porcentaje_obra}}%</span>&nbsp;&nbsp;<span>completado</span>
                        </div>
                    </div>
                </div>
                <div id="line-date-inagurado" class="py-1">
                    <?php 
                    setlocale(LC_ALL, 'es_ES');
                    $date=date_create($project->updated);?>
                    <span style="color: #2C4143"><b>Inagurado:  {{date_format($date,'d/M/Y')}}</b></span>
                </div>
            </div>
        </div>
    </div>

</div>
  
 


        

    <!-- Section - Mapa de la localización -->
    <div class="row" id="map"></div>

    <!-- Section - Datos generales -->
    <div class="row mt-5" id="datos-generales">
        
        <div class="col-md-6 background-title px-0 py-1" style="background-image: url('http://pice-software.com/costjalisco/public/assets/img/newsletters/background-title.png'); background-repeat: no-repeat;
            background-size: cover;">
            <span style="font-weight: 700; margin-left: 140px;">Datos Generales</span>
        </div>
        <div class="col-md-6 px-0">
            <div class="" style="margin-top: 25px;
            border-bottom: 1px solid #628ea0;"></div>
        </div>
    </div>
    <div class="container">
        <div class="my-5">
            {{ $project->purpose }}
            <br><br>
            <span><b>Nombre de la persona que registra el proyecto</b></span><br>
            <span>{{$project->responsable}}</span><br>
            <span><b>Correo electrónico (Institucional)</b></span><br>
            <span>{{$project->email}}</span>
            <br>
            <span><b>Organismo al que pertenece</b></span><br>
            <span>{{$project->organismo}}</span>
            <br>
            <span><b>Puesto que desempeña dentro del organismo</b></span><br>
            <span>{{$project->puesto}}</span>
            <br>
            <span><b>Otros involucrados en el registro del proyecto</b></span><br>
            <span>{{$project->involucrado}}</span>
            
        </div>
        
    </div>

    <!-- Section - Identificación -->
    <div class="row mt-5" id="identificacion">
        <div class="col-md-6 background-title px-0 py-1" style="background-image: url('http://pice-software.com/costjalisco/public/assets/img/newsletters/background-title.png'); background-repeat: no-repeat;
            background-size: cover;">
            <span style="font-weight: 700; margin-left: 140px;">Identificación</span>
        </div>
        <div class="col-md-6 px-0">
            <div class="" style="margin-top: 25px;
            border-bottom: 1px solid #628ea0;"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 my-2">
            <h3 style="color:#628ea0; font-weight: 700; margin-bottom: 0;" class="ml-4">Responsables del proyecto</h3>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 data mt-4">
                <span><b>Número del acto público, ID.Entidad:</b></span><br>
                <span>{{$project->ocid}}</span><br>
                <span>En el subsector de 
                    {{$subsector->titulo}}
                </span><br>
                <span><b>Número o números de identificación del estudio del impacto en el terreno y
                        asentamientos:</b></span><br>
                <span>
                   {{$project->numeros_impacto}}
                </span><br>
            </div>
            <div class="col-md-6 data" style="border-left:1px solid #628ea0;">
                <?php
               
                ?>
                @foreach($responsableproyecto as $responsable)
                <br>
                @if($responsable->nombreresponsable!='')
                <img src="{{ asset('/assets/img/project/icons/people.png') }}" class="img-fluid mx-1" width="22" alt="">
                <span style="font-weight: bold;">{{$responsable->nombreresponsable}}</span></br>
                @endif
                @if($responsable->cargoresponsable!='')
                <span style="padding-left:34px;">{{$responsable->cargoresponsable}}</span></br>
                @endif
                @if($responsable->correoresponsable!='')
                <span style="padding-left:34px;">{{$responsable->correoresponsable}}</span><br>
                @endif
                @endforeach
  
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
          
                <img src="{{asset('assets/img/project/icons/icono.png')}}" class="img-fluid" width="32">
                <button class="btn btn-sm btn-documents" data-titulo='identificacion' data-idproject="{{$project->id_project}}" data-toggle="modal" data-target="#deleteUserModal" style="font-size: 11px;">DESCARGA DE DATOS ABIERTOS</button>
            </div>
        </div>
    </div>

    <!-- Section - Preparación -->
    <div class="row mt-5" id="preparacion">
        <div class="col-md-6 background-title px-0 py-1" style="background-image: url('http://pice-software.com/costjalisco/public/assets/img/newsletters/background-title.png'); background-repeat: no-repeat;
            background-size: cover;">
            <span style="font-weight: 700; margin-left: 140px;">Preparación</span>
        </div>
        <div class="col-md-6 px-0">
            <div class="" style="margin-top: 25px;
            border-bottom: 1px solid #628ea0;"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 mb-2">
              <!--
                <p>Se realizaron estudios sobre el impacto ambiental, así como estudios de factibilidad y estudios de
                    impacto en terreno y asentamientos, con <br>
                    recursos federales. <br>
                    Con la Unidad de Presupuesto y Contratación
                    de Obra Publica como entidad de ajudicación. </p>
-->
            </div>
            <div class="col-md-12">
            
                
                <span style="padding-left:34px;font-size:18px; color:#628ea0; font-weight:bold;">Estudios de impacto: {{$tipoAmbiental->titulo}}</span><br>
                <img src="{{ asset('/assets/img/project/icons/people.png') }}" class="img-fluid mx-1" width="22" alt="">
                <span style="font-weight: 700;">Responsable: {{$project->responsableAmbiental}}</span><br>
                <span style="padding-left:34px;"><b>Numero(s) de identificación del estudio: </b>{{$project->numeros_ambiental}}</span>
                <br>
                <span style="padding-left:34px;"><b>Fecha de realización: </b>{{$project->fecharealizacionAmbiental}}</span>
                    <br>

                    <span style="padding-left:34px;font-size:18px; color:#628ea0; font-weight:bold;">Estudios de factibilidad: {{$tipoFactibilidad->titulo}}</span><br>
                <img src="{{ asset('/assets/img/project/icons/people.png') }}" class="img-fluid mx-1" width="22" alt="">
                <span style="font-weight: 700;">Responsable: {{$project->responsableFactibilidad}}</span><br>
                <span style="padding-left:34px;"><b>Numero(s) de identificación del estudio: </b>{{$project->numeros_factibilidad}}</span>
                <br>
                <span style="padding-left:34px;"><b>Fecha de realización: </b>{{$project->fecharealizacionFactibilidad}}</span>
                    <br>

                    <span style="padding-left:34px;font-size:18px; color:#628ea0; font-weight:bold;">Estudios de factibilidad: {{$tipoImpacto->titulo}}</span><br>
                <img src="{{ asset('/assets/img/project/icons/people.png') }}" class="img-fluid mx-1" width="22" alt="">
                <span style="font-weight: 700;">Responsable: {{$project->responsableImpacto}}</span><br>
                <span style="padding-left:34px;"><b>Numero(s) de identificación del estudio: </b>{{$project->numeros_impacto}}</span>
                <br>
                <span style="padding-left:34px;"><b>Fecha de realización: </b>{{$project->fecharealizacionimpacto}}</span>
                    <br>
                <!-- old version
                <span style="padding-left:34px;font-size:18px; color:#628ea0; font-weight:bold;">Responsables de
                    estudios de
                    impacto ambiental</span><br>
                <img src="{{ asset('/assets/img/project/icons/people.png') }}" class="img-fluid mx-1" width="22" alt="">
                <span style="font-weight: 700;">{{$project->responsableAmbiental}}
               

                    </span><br>
                    <span style="padding-left:34px;"><b>Numero(s) de identificación del estudio: </b>{{$project->numeros_ambiental}}</span>
                    <br>
                    <span style="padding-left:34px;"><b>Fecha de realización: </b>{{$project->fecharealizacionAmbiental}}</span>
          
                    <br><br>
                <span style="padding-left:34px;font-size:18px; color:#628ea0; font-weight:bold;">Responsables de
                    estudios de
                    factibilidad</span><br>
                <img src="{{ asset('/assets/img/project/icons/people.png') }}" class="img-fluid mx-1" width="22" alt="">
                <span style="font-weight: 700;">{{$project->responsableFactibilidad}}</span>
                <br>
                    <span style="padding-left:34px;"><b>Numero(s) de identificación del estudio: </b>{{$project->numeros_factibilidad}}</span>
                    <br>
                    <span style="padding-left:34px;"><b>Fecha de realización: </b>{{$project->fecharealizacionFactibilidad}}</span>
          
                <br><br>
                <span style="padding-left:34px;font-size:18px;color:#628ea0; font-weight:bold;">Responsable del estudio
                    de
                    impacto de terreno y asentamientos</span><br>
                <img src="{{ asset('/assets/img/project/icons/people.png') }}" class="img-fluid mx-1" width="22" alt="">
                <span style="font-weight: 700;">{{$project->responsableImpacto}}</span>
                
                <br>
                    <span style="padding-left:34px;"><b>Numero(s) de identificación del estudio: </b>{{$project->numeros_impacto}}</span>
                    <br>
                    <span style="padding-left:34px;"><b>Fecha de realización: </b>{{$project->fecharealizacionimpacto}}</span>
-->
            </div> 
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                <img src="{{asset('assets/img/project/icons/icono.png')}}" class="img-fluid" width="32">
                <button data-toggle="modal" data-target="#deleteUserModal"  data-titulo='preparacion' data-idproject="{{$project->id_project}}" class="btn btn-sm btn-documents" style="font-size: 11px;">DESCARGA DE DATOS ABIERTOS</button>
            </div>
        </div>
    </div>

    <!-- Section - Procedimiento de contratación -->
    <div class="row mt-5" id="contratacion">
        <div class="col-md-6 background-title px-0 py-1" style="background-image: url('http://pice-software.com/costjalisco/public/assets/img/newsletters/background-title.png'); background-repeat: no-repeat;
            background-size: cover;">
            <span style="font-weight: 700; margin-left: 140px;">Procedimiento de contratación</span>
        </div>
        <div class="col-md-6 px-0">
            <div class="" style="margin-top: 25px;
            border-bottom: 1px solid #628ea0;"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5">
             
                <span><b>Tipo de contrato:</b> {{$tipocontrato->titulo}}</span><br>
                <span><b>Modalidad de contratación:</b>{{$modalidadcontratacion->titulo}}</span><br>
                <span><b>Entidad administradora del contrato:</b>{{$project->entidad_admin_contrato}}</span><br>
                <span><b>Título del contrato:</b> {{$project->titulocontrato}}</span><br>
                <span><b>Vía por la que presenta su propuesta:</b>{{$project->viapropuesta}}</span><br>
                <span><b>Monto del contrato (cantidad estipulada):</b>{{$project->montocontrato}}</span><br>
                <span><b>Alcance del trabajo según el contrato:</b>{{$project->alcancecontrato}}</span><br>
                <span><b>Duración del proyecto de acuerdo con lo establecido del contrato:</b> {{$project->duracionproyecto_contrato}}</span><br>
            </div>
            <div class="col-md-6">
                <h3 style="color:#628ea0; font-weight: 700; margin-bottom: 0;" class="ml-4">Empresas participantes</h3>
       
                @foreach($empresasparticipantes as $empresa)
                <div class="row py-4" style="border-left: 1px solid #628ea0;">
                    <div class="col-md-2">
                        <img src="{{ asset('/assets/img/project/icons/fabrica.png') }}" class="img-fluid mx-1" width="50"
                            alt="">
                    </div>
                    <div class="col-md-10 px-0">
                        <span style="font-weight: 700;">{{ $empresa }}</span><br>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                <img src="{{asset('assets/img/project/icons/icono.png')}}" class="img-fluid" width="32">
                <button data-toggle="modal" data-target="#deleteUserModal" class="btn btn-sm btn-documents" data-titulo='contratacion' data-idproject="{{$project->id_project}}" data-toggle="modal" data-target="#deleteUserModal" style="font-size: 11px;">DESCARGA DE DATOS ABIERTOS</button>
            </div>
        </div>
    </div>

    <!-- Section - Ejecución -->
    <div class="row mt-5" id="ejecucion">
        <div class="col-md-6 background-title px-0 py-1" style="background-image: url('http://pice-software.com/costjalisco/public/assets/img/newsletters/background-title.png'); background-repeat: no-repeat;
            background-size: cover;">
            <span style="font-weight: 700; margin-left: 140px;">Ejecución</span>
        </div>
        <div class="col-md-6 px-0">
            <div class="" style="margin-top: 25px;
            border-bottom: 1px solid #628ea0;"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5">
               


                <span><b>Variaciones en el precio del contrato:</b>{{$project->variacionespreciocontrato}}</span><br>
                <span><b>Razones de cambio en el precio del contrato:</b>{{$project->razonescambiopreciocontrato}}</span><br>
                <span><b>Variaciones en la duración del contrato:</b>{{$project->variacionesduracioncontrato	}}</span><br>
                <span><b>Razones de cambio en la duración del contrato:</b>{{$project->razonescambioduracioncontrato}}</span><br>
                <span><b>Variaciones en el alcance del contrato:</b>{{$project->variacionesalcancecontrato}}</span><br>
                <span><b>Razones de cambios en el alcance del contrato:</b>{{$project->razonescambiosalcancecontrato}}</span><br>
                <span><b>Aplicación de escalatoria:</b>{{$project->aplicacionescalatoria}}</span><br>
                <span><b>Estado actual del proyecto:</b>{{$project->estadoactualproyecto}}</span><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                <img src="{{asset('assets/img/project/icons/icono.png')}}" class="img-fluid" width="32">
                <button data-toggle="modal" data-target="#deleteUserModal" data-titulo='ejecucion' data-idproject="{{$project->id_project}}" class="btn btn-sm btn-documents" style="font-size: 11px;">DESCARGA DE DATOS ABIERTOS</button>
            </div>
        </div>
    </div>

<!-- <div class="col-md-2 text-right">
                <img src="{{asset('assets/img/project/icons/pdf.png')}}" class="img-fluid" width="32">
                <button class="btn btn-sm btn-documents" style="font-size: 11px;">ABRIR PDF</button>
            </div> -->

    <!-- Section - Finalización -->
    <div class="row mt-5" id="finalizacion">
        <div class="col-md-6 background-title px-0 py-1" style="background-image: url('http://pice-software.com/costjalisco/public/assets/img/newsletters/background-title.png'); background-repeat: no-repeat;
            background-size: cover;">
            <span style="font-weight: 700; margin-left: 140px;">Finalización</span>
        </div>
        <div class="col-md-6 px-0">
            <div class="" style="margin-top: 25px;
            border-bottom: 1px solid #628ea0;">
        </div>  
        
           
              
    </div>
    </div>
    
    <div class="container">
       
        <div class="row">
            <div class="col-md-6 mt-5">
                <span><b>Costo de finalización:</b>{{$project->costofinalizacion}}</span><br>
                <span><b>Fecha de finalización:</b>{{$project->fechafinalizacion}}</span><br>
                <span><b>Alcance de la finalización:</b>{{$project->alcancefinalizacion}}</span><br>
                <span><b>Razones de cambio en el proyecto:</b>{{$project->razonescambioproyecto}}</span><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                <img src="{{asset('assets/img/project/icons/icono.png')}}" class="img-fluid" width="32">
                <button data-toggle="modal" data-target="#deleteUserModal" data-titulo='finalizacion' data-idproject="{{$project->id_project}}" class="btn btn-sm btn-documents" style="font-size: 11px;">DESCARGA DE DATOS ABIERTOS</button>
            </div>
        </div>
       
    </div>
   
  
           
    <div class="container mt-5">
        <div class="row align-items-baseline">
            <div class="col-md-7" style="background-color:#d60000; color:#fff;">
                <div class="d-flex justify-content-end align-items-baseline">
                    <span style="font-size: 26px; font-weight: 700;">{{$project->porcentaje_obra}}% </span>&nbsp;&nbsp;<span> completado</span>
                </div>
            </div>
            <div class="col-md-3">
                <?php
                $f=strtotime($project->fechafinalizacion);
                ?>
                <span style="font-weight: 700;">Inagurada: 
                {{date('d/m/Y',$f)}}
              </span>
            </div>
            
        </div>
    </div>

    <!-- Barra - Resumen -->
    <div class="row" id="background-resumen">
        <div class="col-md-12 d-flex justify-content-center" style="height: auto;">
            <div class="col-md-3 text-center text-white py-3">
                <img src="{{ asset('/assets/img/project/icons/beneficiarios.png') }}" class="img-fluid" width="24" alt="">
                &nbsp<span>Beneficiarios: {{$project->people}}</span>
            </div>
            <div style="height: 1.5em;
            border-left: 1px solid #B0C6CF;" class="mt-3"></div>
            <div class="col-md-3 text-center text-white py-3">
                <img src="{{ asset('/assets/img/project/icons/ubicacion.png') }}" class="img-fluid" width="16" alt="">
                &nbsp<span>{{$address_f}}</span>
            </div>
            <div style="height: 1.5em;
            border-left: 1px solid #B0C6CF;" class="mt-3"></div>
            <div class="col-md-3 text-center text-white py-3">
                <img src="{{ asset('/assets/img/project/icons/dinero.png') }}" class="img-fluid" width="24" alt="">
                &nbsp<span>Inversión: {{$project->costofinalizacion}}</span>
            </div>
            <div style="height: 1.5em;
            border-left: 1px solid #B0C6CF;" class="mt-3"></div>
        </div>
    </div>

    <!-- Section - Documentos para descargar -->
    <div class="row align-items-center" id="background-docs">
        <div class="col-md-6 text-center my-5">
            <p style="color:#fff;"><strong>¡Descarga los documentos del proyecto!</strong></p>
            <a href="">
                <img src="{{asset('/assets/img/project/icons/clic.png')}}" class="img-fluid" width="50" alt="">
            </a>
        </div>
        <div class="col-md-6 text-center my-5">
           
            <img src="{{asset('/assets/img/project/icons/excel.png')}}" class="img-fluid" width="100"><br><br>
            <a class="btn btn-sm btn-documents"  href="{{route('projectexport',$project->id_project)}}">ABRIR DOCUMENTO XLS</a>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modaltitulo"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <div class="table-responsive">
        <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Documento</th>
              <th>Descargar</th>
            </tr>
          </thead>
          <tbody id="tBody">
           
          </tbody>
        </table>
      </div>
       
        </div>
        <div class="modal-footer">
        
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
<script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<script type="text/javascript">
    // listen for screen resize events
      var zona = 0;
      window.addEventListener('load', function(event){

            var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                          osmAttrib = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                          osm = L.tileLayer(osmUrl, { maxZoom: 14, attribution: osmAttrib });
  
              var map = new L.Map('map', {
                  scrollWheelZoom: false,
                  center: ["20.689742","-103.3928097"],
                  zoom: 14,
                  layers: [osm],
                  
              });
  
            L.marker(["20.689742","-103.3928097"]).addTo(map);

    });


    window.onload = function() {
     
      

     $('#deleteUserModal').on('show.bs.modal', function (event) {
       var button = $(event.relatedTarget) // Button that triggered the modal
       var titulo = button.data('titulo') // Extract info from data-* attributes
        var idproject=button.data('idproject');
        console.log(idproject);
        $('#modaltitulo').html("Documentos de la fase de: " +titulo);
     

        $.ajax({
      data: {
        "_token": "{{ csrf_token() }}",
        "titulo": titulo,
        "idproject" : idproject,
      }, //datos que se envian a traves de ajax
      url: "{{ route('getdocumentsproject') }}", //archivo que recibe la peticion
      type: 'post', //método de envio
      dataType: "json",
      success: function(resp) { //una vez que el archivo recibe el request lo procesa y lo devuelve

        console.log(resp);
        $(".display tbody tr").remove();
        trHTML = '';
      
        
       

       
                        $.each(resp, function (i, userData) {
                                
                               // var datatitle=resp[i].titulo;
                             
                                //datatitle=datatitle.replace(/\s/g, ',')
                                var public_path = "{{asset('documents/') }}";
                                var f=public_path+"/"+resp[i].url
                                trHTML +=
                                    '<tr><td >'
                                    + '<center>'+resp[i].url+'</center>'
                                    + '</td>><td>'
                                    +'<center><a class="btn btn-dark" href='+f+'><i class="fas fa-download  fa-sm text-white-50"></i></a></center>'
                                    + '</tr>';
                            
                        });


                     
                        $('#tBody').append(trHTML);

                        if(resp.length==0){
            trHTML +='<tr><td>Sin documentos</td><td></td></tr>';               
            $('#tBody').append(trHTML);
        }

                    


      },
      error: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve

       // alert("Ha ocurrido un error, intente de nuevo.");
        
      }
    });




     })
     
   }
</script>
@endsection
