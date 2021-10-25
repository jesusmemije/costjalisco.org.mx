@extends('front.layouts.app')

@section('title')
Datos del proyecto
@endsection

@section('styles')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
<link href="{{asset("assets/css/project-single.css")}}" rel="stylesheet">



<link rel="stylesheet" href="{{asset('markercluster/dist/MarkerCluster.Default.css')}}" />
<link rel="stylesheet" href="{{asset('markercluster/dist/MarkerCluster.css')}}" />


@endsection
<?php
//Para cargar los puntos desde una tabla dedicada (sin usar)
$puntos = DB::table('RedJalisco')
    ->get();


?>

@section('content')
<!-- Section - Descripción General del proyecto -->
<div class="container-fluid container-single pt-4">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="row mb-md-5 mb-3  bg-gris-single-project">
            <div class="col-md-3 px-0">

                <div class="carousel-inner">

                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <!--Recorre las imagenes del proyecto para colocarlo en el carrusel-->
                        @for ($i = 1; $i < sizeof($project_imgs); $i++) <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}">
                            </li>
                            @endfor
                    </ol>

                    @foreach ($project_imgs as $img)

                    <div class="carousel-item @if($loop->first) active @endif" style="background-color: #D8D8CD;">
                        <div class="row">
                            <div class="d-flex align-items-center justify-content-center">

                                @php
                                $imagen=DB::table('projects_imgs')
                                ->select('projects_imgs.imgroute')
                                ->where('projects_imgs.id','=',$img->id)
                                ->get();
                                @endphp
                                @if (count($imagen)==0)
                                <img src="{{ asset('projects_imgs/sinimagen.png') }}" class="img-obra" alt="">
                                @else
                                {{-- <img src="{{ asset('projects_imgs/'.$imagen->last()->imgroute) }}" width="325" height="310" alt=""> --}}

                                <img src="{{ asset('projects_imgs/'.$imagen->last()->imgroute) }}" height="310" style="width: 600%;">
                                <h2 class="hidden-desktop" style="position: absolute; text-align: center; color: #fff;">{{ $project->title }}
                                    @endif
                            </div>




                        </div>
                    </div>

                    @endforeach

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
                    <div id="titleproject" class="col-md-12 hidden-phone">
                        <span>{{ mb_strtoupper($project->title)}}</span>
                    </div>
                    <div id="benefited" class="col-md-12">
                        <div class="row mx-0 align-items-baseline">
                            <img src="{{ asset('/assets/img/project/icons/people.png') }}" class="img-fluid ml-3 icon-people" width="60" alt="">
                            <label class="ml-3 text-personas-beneficiadas" for="">{{number_format($project->people)}}
                                personas beneficiadas</label>
                            <!--setlocale(LC_MONETARY, 'en_US');
                                echo money_format('%(#10n', $number) . "\n";-->
                        </div>
                        <div class="row mx-0 hidden-phone">
                            <div id="btns">
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <button onclick="smoothScroll(document.getElementById('datos-generales'))" class="btn btn-gris btn-sm" style="background: linear-gradient(90deg, rgba(145,145,145,1) 0%, rgba(136,136,136,1) 100%); ">DATOS
                                        GENERALES</button>
                                    <button onclick="smoothScroll(document.getElementById('identificacion'))" class="btn btn-gris btn-sm" style="background: linear-gradient(90deg, rgba(135,135,135,1) 0%, rgba(126,126,126,1) 100%);">IDENTIFICACIÓN</button>
                                    <button onclick="smoothScroll(document.getElementById('preparacion'))" class="btn btn-gris btn-sm" style="background: linear-gradient(90deg, rgba(125,125,125,1) 0%, rgba(115,115,115,1) 100%);">PREPARACIÓN</button>
                                    <button onclick="smoothScroll(document.getElementById('contratacion'))" class="btn btn-gris btn-sm" style="background: linear-gradient(90deg, rgba(114,114,114,1) 0%, rgba(93,93,93,1) 100%); ">PROCEDIMIENTO
                                        DE CONTRATACIÓN</button>
                                    <button onclick="smoothScroll(document.getElementById('ejecucion'))" class="btn btn-gris btn-sm" style="background: linear-gradient(90deg, rgba(91,91,91,1) 0%, rgba(83,83,83,1) 100%);">EJECUCIÓN</button>
                                    <button onclick="smoothScroll(document.getElementById('finalizacion'))" class="btn btn-gris btn-sm" style="background: linear-gradient(90deg, rgba(82,82,82,1) 0%, rgba(73,73,73,1) 100%);">FINALIZACIÓN</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid" id="status">
                        <div class="row pt-2">
                            <div class="col-md-4 col-4">
                                <span style="font-size: 24px; font-weight: 700;">Estatus:</span>
                            </div>
                            <div class="col-md-8 col-8 d-flex justify-content-end align-items-baseline">
                                <span style="font-size: 24px; font-weight: 700;">{{$project->porcentaje_obra}}%</span>&nbsp;&nbsp;<span>completado</span>
                            </div>
                        </div>
                    </div>
                    <div id="line-date-inagurado" class="py-1 hidden-phone">
                        <?php
                        /**Se formatea la fecha para mostrarla en formato para humanos */
                        setlocale(LC_ALL, 'es_ES');
                        $date = date_create($project->updated); ?>
                        @php
                        $fechaActual = $project->updated;
                        setlocale(LC_TIME, "spanish");
                        $fecha_c = $fechaActual;
                        $fecha_c = str_replace("/", "-", $fecha_c);
                        $Nueva_Fecha_c = date("d-M-Y", strtotime($fecha_c));
                        $fecha_created = strftime("%d de %B de %Y", strtotime($Nueva_Fecha_c));

                        @endphp
                        <span style="color: #2C4143"><b>Proyecto actualizado al: {{$fecha_created}}</b></span>
                    </div>
                    <br class="hidden-desktop">
                </div>
            </div>
        </div>
    </div>

    <!-- Section - Mapa de la localización -->
    <div class="row" id="map"></div>

    <!-- Section - Datos generales -->
    <div class="row mt-5" id="datos-generales">
        <div class="col-md-6 md-12 background-title px-0 py-1">
            <span class="title-project-single">Datos Generales</span>
        </div>
        <div class="col-md-6 px-0 hidden-phone">
            <div style="margin-top: 25px; border-bottom: 1px solid #628ea0;"></div>
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
            <span>{{$project->involucrado}}</span><br><br>
            @if($project->video!="")
            <label for="">Ver video</label>
            <span><a href="{{$project->video}}" target="_blank"><i class="fas fa-video"></i></a></span><br>
            @endif

            <span><b>Observaciones de la sección:</b></label><br>
                <span>{{$project->observaciones1}}</span>


        </div>
    </div>



    <!-- Section - Identificación -->
    <div class="row mt-5" id="identificacion">
        <div class="col-md-6 background-title px-0 py-1">
            <span class="title-project-single">Identificación del Proyecto</span>
        </div>
        <div class="col-md-6 px-0">
            <div class="" style="margin-top: 25px;
            border-bottom: 1px solid #628ea0;"></div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 data mt-4">
                <span><b>Título del proyecto: </b>{{$project->title}}</span><br>



                <i class="fas fa-edit"></i>
                <span><b>Número del acto público, ID.Entidad: </b>{{$project->ocid}}</span><br>
                <span><b>Descripción: </b>{{$project->description}}</span><br>
                <span><b>Autoridad Pública: </b>{{$autoridad_publica->name}}</span><br>
                <span><b>Propósito: </b>{{$project->purpose}}</span><br>
                <span><b>Sector: </b>{{$sector->titulo}}</span><br>
                <span>En el subsector de
                    {{$subsector->titulo}}
                </span><br>
                <span><b>Tipo de proyecto: </b>{{$projecttype->titulo}}</span><br>
                <span><b>Personas beneficiadas: </b>{{number_format($project->people)}}</span><br>
                <span><b>Porcentaje de avance de la obra: </b>{{$project->porcentaje_obra}}%</span><br>


                <span><b>Ubicación del proyecto:</b></span><br>
                <span><b>Calle: </b> {{$address->streetAddress}} <b>Colonia: </b> {{$address->suburb}} <b>Localidad: </b> {{$address->locality}}
                </span><br>
                <span><b>Región: </b> {{$address->region}} <b>Estado: </b> {{$address->state}} <b>CP: </b> {{$address->postalCode}} <b>País: </b> {{$address->countryName}}</span>
                <br>
                <span><b>Descripción del lugar:</b>{{$project->descriptionlocation}}</span><br><br>



                <span><b>Observaciones de la sección:</b></label><br>
                    <span>{{$project->observaciones2}}</span>





            </div>
            <div class="col-md-6 data" style="border-left:1px solid #628ea0;">
                <h3 style="padding-left:34px; font-weight: bold; color:#628ea0;">Responsables del proyecto</h3>

                @foreach($responsableproyecto as $responsable)
                <br>
                @if($responsable->nombreresponsable!='')
                <img src="{{ asset('/assets/img/project/icons/people.png') }}" class="img-fluid mx-1" width="22" alt="">
                <span style="font-weight: bold;">{{$responsable->nombreresponsable}}</span></br>
                @endif
                @if($responsable->cargoresponsable!='')
                <span style="padding-left:34px;">{{$responsable->cargoresponsable}}</span></br>
                @endif

                @if($responsable->telefonoresponsable!='')
                <span style="padding-left:34px;">{{$responsable->telefonoresponsable}}</span><br>
                @endif

                @if($responsable->correoresponsable!='')
                <span style="padding-left:34px;">{{$responsable->correoresponsable}}</span><br>
                @endif

                <span style="padding-left:34px; font-weight:bold;">Domicilio del contacto</span><br>

                @if($responsable->streetAddressc!='')
                <span style="padding-left:34px;"><b>Calle: </b>{{$responsable->streetAddressc}}</span>
                @endif
                @if($responsable->streetNumc!='')
                <span style="padding-left:34px;"><b>Número: </b>{{$responsable->streetNumc}}</span>
                @endif
                @if($responsable->suburbc!='')
                <span style="padding-left:34px;"><b>Colonia: </b>{{$responsable->suburbc}}</span>
                @endif
                @if($responsable->localityc!='')
                <span style="padding-left:34px;"><b>Municipio: </b>{{$responsable->localityc}}</span>
                @endif
                @if($responsable->postalCodec!='')
                <span style="padding-left:34px;"><b>CP: </b>{{$responsable->postalCodec}}</span><br>
                @endif
                @endforeach

            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                <img src="{{asset('assets/img/project/icons/icono.png')}}" class="img-fluid" width="32">
                <button data-toggle="modal" data-target="#deleteUserModal" data-titulo='identificacion' data-idproject="{{$project->id_project}}" class="btn btn-sm btn-documents" style="font-size: 11px;">DESCARGA LOS DATOS DE ESTA SECCIÓN</button>
            </div>
        </div>
    </div>


    <!-- Section - Preparación -->
    <div class="row mt-5" id="preparacion">
        <div class="col-md-6 background-title px-0 py-1">
            <span class="title-project-single">Preparación del Proyecto</span>
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


                @foreach($estudiosAmbiental as $estudioAmbiental)
                <?php
                $tipoAmbiental = DB::table('catambiental')
                    ->where('id', '=', $estudioAmbiental->tipoAmbiental)
                    ->first();
                ?>
                <span class="preparacion-subtitle">Estudios de impacto:
                    {{$tipoAmbiental->titulo}}</span><br>
                <img src="{{ asset('/assets/img/project/icons/people.png') }}" class="img-fluid mx-1" width="22" alt="">
                <span style="font-weight: 700;">Responsable: {{$estudioAmbiental->responsableAmbiental}}</span><br>
                <span style="padding-left:34px;"><b>Numero(s) de identificación del estudio:
                    </b>{{$estudioAmbiental->numeros_ambiental}}</span>
                <br>
                <span style="padding-left:34px;"><b>Fecha de realización:
                    </b>{{$estudioAmbiental->fecharealizacionAmbiental}}</span>
                <br>
                <br>

                @endforeach


                <br class="hidden-desktop">

                @foreach($estudiosFactibilidad as $estudioFactibilidad)
                <?php
                $tipoFactibilidad = DB::table('catfac')
                    ->where('id', '=', $estudioFactibilidad->tipoFactibilidad)
                    ->first();
                ?>
                <span class="preparacion-subtitle">Estudios de factibilidad:
                    {{$tipoFactibilidad->titulo}}</span><br>
                <img src="{{ asset('/assets/img/project/icons/people.png') }}" class="img-fluid mx-1" width="22" alt="">
                <span style="font-weight: 700;">Responsable: {{$estudioFactibilidad->responsableFactibilidad}}</span><br>
                <span style="padding-left:34px;"><b>Numero(s) de identificación del estudio:
                    </b>{{$estudioFactibilidad->numeros_factibilidad}}</span>
                <br>
                <span style="padding-left:34px;"><b>Fecha de realización:
                    </b>{{$estudioFactibilidad->fecharealizacionFactibilidad}}</span>
                <br>
                <br>
                @endforeach


                <br class="hidden-desktop">

                @foreach($estudiosImpacto as $estudioImpacto)
                <?php
                $tipoImpacto = DB::table('catimpactoterreno')
                    ->where('id', '=', $estudioImpacto->tipoImpacto)
                    ->first();
                ?>
                <span class="preparacion-subtitle">Estudios de Impacto en el terreno y asentamientos:
                    {{$tipoImpacto->titulo}}</span><br>
                <img src="{{ asset('/assets/img/project/icons/people.png') }}" class="img-fluid mx-1" width="22" alt="">
                <span style="font-weight: 700;">Responsable: {{$estudioImpacto->responsableImpacto}}</span><br>
                <span style="padding-left:34px;"><b>Numero(s) de identificación del estudio:
                    </b>{{$estudioImpacto->numeros_impacto}}</span>
                <br>
                <span style="padding-left:34px;"><b>Fecha de realización:
                    </b>{{$estudioImpacto->fecharealizacionimpacto}}</span>
                <br>
                <br>

                @endforeach
             

                        <br class="hidden-desktop">

                        @foreach($origenesRecurso as $origenRecurso)

                        <?php
                        $tipoRecurso = DB::table('catorigenrecurso')
                            ->where('id', '=', $origenRecurso->description)
                            ->first();
                        ?>

                        <span class="preparacion-subtitle">Origen del recurso:
                            {{$tipoRecurso->titulo}}</span><br>

                        <i class="fas fa-hand-holding-usd" style="padding-left: 10px; color:#628ea0; font-size:20px"></i>
                        <span style="font-weight: 700;">Fondo o fuente de financiamiento y partida presupuestal: {{$origenRecurso->sourceParty_name}}</span><br>
                        <span style="padding-left:34px;"><b>Fecha de realización:
                                @php
                                $f=strtotime($origenRecurso->iniciopresupuesto);
                                @endphp
                            </b>{{date('Y-m-d',$f)}}</span>
                        <br>
                        <br>

                        @endforeach
                        @if($observacionesPreparacion!="")
                <span><b>Observaciones de la sección:</b></label><br>
                    <span>{{$observacionesPreparacion->observaciones}}</span>
                    @else
                    <span><b>Observaciones de la sección:</b></label><br>
                        @endif


                        <br class="hidden-desktop">

            </div>

        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                <img src="{{asset('assets/img/project/icons/icono.png')}}" class="img-fluid" width="32">
                <button data-toggle="modal" data-target="#deleteUserModal" data-titulo='preparacion' data-idproject="{{$project->id_project}}" class="btn btn-sm btn-documents" style="font-size: 11px;">DESCARGA LOS DATOS DE ESTA SECCIÓN</button>
            </div>
        </div>
    </div>




    <!-- Section - Procedimiento de contratación -->
    <div class="row mt-5" id="contratacion">
        <div class="col-md-6 background-title px-0 py-1">
            <span class="title-project-single">Procedimiento de contratación</span>
        </div>
        <div class="col-md-6 px-0">
            <div class="" style="margin-top: 25px;
            border-bottom: 1px solid #628ea0;"></div>
        </div>
    </div>
    <div class="container">
        @php $montocontrato_final=0; @endphp

        @if(sizeof($contratos)>0)



        @foreach($contratos as $contrato)

        <?php

        $domicilio = DB::table('address')
            ->where('id', '=', $contrato->id_address)
            ->first();

        $montocontrato_final = $montocontrato_final + $contrato->montocontrato;



        ?>
        <div class="row mt-4 mb-4">

            <div class="col-md-6" style="border-right:1px solid #628ea0;">
                <style>
                    .visible {
                        visibility: visible;
                        /* Al alterar las márgenes y el height no es necesaria esta propiedad */
                        opacity: 1;
                        height: auto;
                        padding: 15px 0px;
                        transition: 3s;
                        /* background: red; */
                    }

                    .container-item {
                        background: linear-gradient(45deg, #2C4143 35%, #58707B 35%);
                        padding: 5px 20px;
                        border-radius: 20px;
                        color: #fff;
                    }
                </style>
                <div class="container-item mb-4" >
                    <strong style=" font-size: 20px !important">
                        {{$contrato->titulocontrato}}
                    </strong>
                </div>
                <span style="padding-left: 20px;"><b>Datos de contacto de la entidad de adjudicación:</b></span><br>
                <span style="padding-left: 20px;"><b>Entidad de adjudiación: </b>{{$contrato->entidadadjudicacion}}</span><br>
                <span style="padding-left: 20px;"><b>Nombre: </b>{{$contrato->nombrecontacto}}</span><br>
                {{-- botón para mostrar el contenido  --}}
                <button onclick="mostrar_contenido({{$contrato->id}})" id="show{{$contrato->id}}" style="float: right; color: #628ea0; background: transparent; border: 0;">Ver más</button>
                {{-- div que captura todos los datos que estarán ocultos al momento de iniciar la página --}}
                <div id="vermas{{$contrato->id}}" style="display: none; padding-left: 20px;">


                    <span><b>Correo electrónico: </b>{{$contrato->emailcontacto}}</span><br>
                    <span><b>Télefono: </b>{{$contrato->telefonocontacto}}</span><br><br>

                    @if($domicilio!=null)
                    <span style=" font-weight:bold;">Domicilio del contacto</span><br>
                    @if($domicilio->streetAddress!='')
                    <span><b>Calle: </b>{{$domicilio->streetAddress}}</span>
                    @endif
                    @if($domicilio->streetNum!='')
                    <span><b>Número: </b>{{$domicilio->streetNum}}</span>
                    @endif
                    @if($domicilio->suburb!='')
                    <span><b>Colonia: </b>{{$domicilio->suburb}}</span>
                    @endif
                    @if($domicilio->locality!='')
                    <span><b>Municipio: </b>{{$domicilio->locality}}</span>
                    @endif
                    @if($domicilio->postalCode!='')
                    <span><b>CP: </b>{{$domicilio->postalCode}}</span><br>
                    @endif


                    @endif
                    <br>
                    <br>
                    <?php
                    $tipocontrato = DB::table('cattipo_contrato')
                        ->where('id', '=', $contrato->tipocontrato)
                        ->first();
                    $modalidadcontratacion = DB::table('catmodalidad_contratacion')
                        ->where('id', '=', $contrato->modalidadcontrato)
                        ->first();
                    $modalidadadjudicacion = DB::table('catmodalidad_adjudicacion')
                        ->where('id', '=', $contrato->modalidadadjudicacion)
                        ->first();
                        if ($modalidadadjudicacion == null) {
                            $modalidadadjudicacion = new stdClass();
                            $modalidadadjudicacion->titulo = "";
                        }

                    $estadoactual = DB::table('contractingprocess_status')
                        ->where('id', '=', $contrato->estadoactual)
                        ->first();
                        if ($estadoactual == null) {
                            $estadoactual = new stdClass();
                            $estadoactual->titulo = "";
                        }
                    if ($modalidadcontratacion == null) {
                        $modalidadcontratacion = new stdClass();
                        $modalidadcontratacion->titulo = "";
                    }
                    if ($tipocontrato == null) {
                        $tipocontrato = new stdClass();
                        $tipocontrato->titulo = "";
                    }
                    $empresas = $contrato->empresasparticipantes;
                    $empresasparticipantes = explode(",", $empresas);
                    if (sizeof($empresasparticipantes) != 0) {
                        $empresa_principal = $empresasparticipantes[0];
                    }




                    ?>

<i class="fas fa-calendar-alt"></i>
            <span><b>Fecha de publicación: {{$contrato->fechapublicacion}}</b></span><br>

            <i class="fas fa-user-tie"></i>
            <span><b>Nombre del responsable: {{$contrato->nombreresponsable}}</b></span><br>
          
            <i class="fas fa-file-alt"></i>
            <span><b>Modalidad de la adjudicación:</b>{{$modalidadadjudicacion->titulo}}</span><br>


                    <i class="fas fa-file-alt"></i>
                    <span><b>Tipo de contrato:</b> {{$tipocontrato->titulo}}</span><br>
             
                    <i class="fas fa-file-signature"></i>
                    <span><b>Modalidad de contratación:</b> {{$modalidadcontratacion->titulo}}</span><br>
                    <i class="fas fa-file-alt"></i>
                    <span><b> Estado actual de la contratación:</b>{{$estadoactual->titulo}}</span><br>
                    <i class="fas fa-edit"></i>
                    <span><b>Entidad administradora del contrato:</b> {{$contrato->entidad_admin_contrato}}</span><br>
                    <i class="fas fa-file-invoice"></i>
                    <span><b>Título del contrato:</b> {{$contrato->titulocontrato}}</span><br>
                   
                    <i class="fas fa-briefcase"></i>
                    <span><b>Empresa contratada:</b>{{$contrato->empresacontratada}}</span><br>
                    <i class="fas fa-print"></i>
                    <span><b>Vía por la que presenta su propuesta:</b> {{$contrato->viapropuesta}}</span><br>
                   
                    <i class="fas fa-calendar-alt"></i>
            <span><b>Fecha de presentación de su propuesta:</b>{{$contrato->fechapresentacionpropuesta}}</span><br>
            <i class="fas fa-hand-holding-usd"></i>
                    <span><b>Monto del contrato (cantidad estipulada):</b>${{number_format($contrato->montocontrato)}}</span><br>
                    <i class="fas fa-hard-hat"></i>
                    <span><b>Alcance del trabajo según el contrato:</b> {{$contrato->alcancecontrato}}</span><br>
                    <i class="fas fa-calendar-alt"></i>
            <span><b>Fecha de inicio del contrato:</b> {{$contrato->fechainiciocontrato}}</span><br>
                    <i class="far fa-clock"></i>
                    <span><b>Duración del proyecto de acuerdo con lo establecido del contrato:</b>
                        {{$contrato->duracionproyecto_contrato}}</span><br><br>



                    <span><b>Observaciones de la sección:</b></label><br>
                        <span>{{$contrato->observaciones}}</span><br>

                        {{-- botón para ocultar el contenido --}}
                        <button onclick="ocultar_contenido({{$contrato->id}},'c')" id="hide{{$contrato->id}}" style="float: right; color: #628ea0; background: transparent; border: 0; display: none;">Cerrar</button>


                        <br class="hidden-desktop">
                </div>
            </div>

            <div class="col-md-6 border-top-empresas">
                <br class="hidden-desktop">
                <h3 class="ml-4 title-empresas" style="font-weight: bold; color:#628ea0;">Empresas participantes</h3>
                <div class="row py-4" id="empresa_principal">
                    <div class="col-md-2 col-2">
                        <img src="{{ asset('/assets/img/project/icons/fabrica.png') }}" class="img-fluid mx-1" width="50" alt="">
                    </div>
                    <div class="col-md-10 col-10 px-0">


                        <span style="font-weight: 700;">{{ $empresa_principal }}</span><br>
                    </div>
                </div>
                <div id="vermas-em{{$contrato->id}}" style="display: none">



                    @foreach($empresasparticipantes as $empresa)
                    <div class="row py-4">
                        <div class="col-md-2 col-2">
                            <img src="{{ asset('/assets/img/project/icons/fabrica.png') }}" class="img-fluid mx-1" width="50" alt="">
                        </div>
                        <div class="col-md-10 col-10 px-0">
                            <span style="font-weight: 700;">{{ $empresa }}</span><br>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
        @endforeach
        <!--Esto es para cuando no haya datos --->
        @else
     
<div class="row mt-4 mb-4">

    <div class="col-md-6" style="border-right:1px solid #628ea0;">
        <style>
            .visible {
                visibility: visible;
                /* Al alterar las márgenes y el height no es necesaria esta propiedad */
                opacity: 1;
                height: auto;
                padding: 15px 0px;
                transition: 3s;
                /* background: red; */
            }

            .container-item {
                background: linear-gradient(45deg, #2C4143 35%, #58707B 35%);
                padding: 5px 20px;
                border-radius: 20px;
                color: #fff;
            }
        </style>
        <div class="container-item mb-4">
            <strong style=" font-size: 20px !important">
              
            </strong>
        </div>
        <span style="padding-left: 20px;"><b>Datos de contacto de la entidad de adjudicación:</b></span><br>
        <span style="padding-left: 20px;"><b>Entidad de adjudiación: </b></span><br>
        <span style="padding-left: 20px;"><b>Nombre: </b></span><br>
      


            <span style="padding-left: 20px;"><b>Correo electrónico: </b></span><br>
            <span style="padding-left: 20px;"><b>Télefono: </b></span><br><br>

          
            <span style=" font-weight:bold; padding-left: 20px;" >Domicilio del contacto</span><br>
           
            <span style="padding-left: 20px;"><b>Calle: </b></span>
          
            <span style="padding-left: 20px;"><b>Número: </b></span>
          
            <span style="padding-left: 20px;"><b>Colonia: </b></span>
          
            <span style="padding-left: 20px;"><b>Municipio: </b></span>
           
            <span style="padding-left: 20px;"><b>CP: </b></span><br>
           
            <br>
            <br>
            <i class="fas fa-calendar-alt"></i>
            <span><b>Fecha de publicación:</b></span><br>
            <i class="fas fa-user-tie"></i>
            <span><b>Nombre del responsable:</b></span><br>
            <i class="fas fa-file-alt"></i>
            <span><b>Modalidad de la adjudicación:</b></span><br>



            <i class="fas fa-file-alt"></i>
            <span><b>Tipo de contrato:</b></span><br>
        

            <i class="fas fa-file-alt"></i>
            <span><b> Estado actual de la contratación:</b></span><br>
            <i class="fas fa-file-signature"></i>
            <span><b>Modalidad de contratación:</b> </span><br>
            <i class="fas fa-edit"></i>
            <span><b>Entidad administradora del contrato:</b></span><br>

            
            <i class="fas fa-briefcase"></i>
            <span><b>Empresa contratada:</b></span><br>

            <i class="fas fa-file-invoice"></i>
            <span><b>Título del contrato:</b></span><br>

            


            <i class="fas fa-print"></i>
            <span><b>Vía por la que presenta su propuesta:</b></span><br>

            
            <i class="fas fa-calendar-alt"></i>
            <span><b>Fecha de presentación de su propuesta:</b></span><br>
            <i class="fas fa-hand-holding-usd"></i>
            <span><b>Monto del contrato (cantidad estipulada):</b></span><br>
            <i class="fas fa-hard-hat"></i>
            <span><b>Alcance del trabajo según el contrato:</b> </span><br>

            

            <i class="fas fa-calendar-alt"></i>
            <span><b>Fecha de inicio del contrato:</b> </span><br>
            <i class="far fa-clock"></i>
            <span><b>Duración del proyecto de acuerdo con lo establecido del contrato:</b>
               </span><br><br>



            <span><b>Observaciones de la sección:</b></label><br>
                <span></span><br>

              


                <br class="hidden-desktop">
        </div>
    </div>




            @endif


            <div class="row">
                <div class="col-md-12 text-right">
                    <img src="{{asset('assets/img/project/icons/icono.png')}}" class="img-fluid" width="32">
                    <button data-toggle="modal" data-target="#deleteUserModal" data-titulo='contratacion' data-idproject="{{$project->id_project}}" class="btn btn-sm btn-documents" style="font-size: 11px;">DESCARGA LOS DATOS DE ESTA SECCIÓN</button>
                </div>
            </div>
    </div>

    <!-- Section - Procedimiento de ejecución -->
    <div class="row mt-5" id="ejecucion">
        <div class="col-md-6 background-title px-0 py-1">
            <span class="title-project-single">Ejecución</span>
        </div>
        <div class="col-md-6 px-0">
            <div class="" style="margin-top: 25px;
            border-bottom: 1px solid #628ea0;"></div>
        </div>
    </div>
    <div class="container">
    @if(sizeof($ejecuciones)>0)
        @foreach($ejecuciones as $ejecucion)
        <div class="row">
            <div class="col-md-6 mt-5">
                <div class="container-item mb-4">
                    <strong style=" font-size: 20px !important">
                        {{$ejecucion->estadoactualproyecto}}%
                    </strong>
                </div>

                <i class="fas fa-hand-holding-usd" style="padding-left: 20px;"></i>



                @if(is_numeric($ejecucion->variacionespreciocontrato))
                <span><b>Variaciones en el precio del contrato:</b>${{number_format($ejecucion->variacionespreciocontrato)}}</span><br>
                @else
                <span><b>Variaciones en el precio del contrato:</b>{{($ejecucion->variacionespreciocontrato)}}</span><br>
                @endif
                {{-- botón para mostrar el contenido  --}}
                <button onclick="mostrar_contenido_e({{$ejecucion->id}})" id="show-e{{$ejecucion->id}}" style="float: right; color: #628ea0; background: transparent; border: 0;">Ver más</button>
                {{-- div que captura todos los datos que estarán ocultos al momento de iniciar la página --}}
                <div id="vermas-e{{$ejecucion->id}}" style="display: none; padding-left: 20px;">
                    <i class="fas fa-file-alt"></i>
                    <span><b>Razones de cambio en el precio del
                            contrato:</b>{{$ejecucion->razonescambiopreciocontrato}}</span><br>
                    <i class="fas fa-file-alt"></i>
                    <span><b>Variaciones en la duración del contrato:</b>{{$ejecucion->variacionesduracioncontrato }}</span><br>
                    <i class="far fa-clock"></i>
                    <span><b>Razones de cambio en la duración del
                            contrato:</b>{{$ejecucion->razonescambioduracioncontrato}}</span><br>
                    <i class="fas fa-file-alt"></i>
                    <span><b>Variaciones en el alcance del contrato:</b>{{$ejecucion->variacionesalcancecontrato}}</span><br>
                    <i class="fas fa-file-alt"></i>
                    <span><b>Razones de cambios en el alcance del
                            contrato:</b>{{$ejecucion->razonescambiosalcancecontrato}}</span><br>
                    <i class="fas fa-file-alt"></i>
                    <span><b>Aplicación de escalatoria:</b>{{$ejecucion->aplicacionescalatoria}}</span><br>
                    <i class="fas fa-check-square"></i>
                    <span><b>Estado actual del proyecto (avance financiero):</b>{{$ejecucion->estadoactualproyecto}}</span><br>
                    <br>

                    <span><b>Observaciones de la sección:</b></label><br>
                        <span>{{$project->observaciones}}</span><br>

                        {{-- botón para ocultar el contenido --}}
                        <button onclick="ocultar_contenido_e({{$ejecucion->id}})" id="hide-e{{$ejecucion->id}}" style="float: right; color: #628ea0; background: transparent; border: 0; display: none;">Cerrar</button>

                </div>

            </div>
        </div>
        @endforeach
        @else


        <div class="row">
            <div class="col-md-6 mt-5">
                <div class="container-item mb-4">
                    <strong style=" font-size: 20px !important">
                       
                    </strong>
                </div>

                <i class="fas fa-hand-holding-usd" ></i>
              
                <span><b>Variaciones en el precio del contrato:</b></span><br>
               
             
                    <i class="fas fa-file-alt"></i>
                    <span><b>Razones de cambio en el precio del
                            contrato:</b></span><br>
                    <i class="fas fa-file-alt"></i>
                    <span><b>Variaciones en la duración del contrato:</b></span><br>
                    <i class="far fa-clock"></i>
                    <span><b>Razones de cambio en la duración del
                            contrato:</b></span><br>
                    <i class="fas fa-file-alt"></i>
                    <span><b>Variaciones en el alcance del contrato:</b></span><br>
                    <i class="fas fa-file-alt"></i>
                    <span><b>Razones de cambios en el alcance del
                            contrato:</b></span><br>
                    <i class="fas fa-file-alt"></i>
                    <span><b>Aplicación de escalatoria:</b></span><br>
                    <i class="fas fa-check-square"></i>
                    <span><b>Estado actual del proyecto:</b></span><br>
                    <br>

                    <span><b>Observaciones de la sección:</b></label><br>
                        <span></span><br>

                      
              

            </div>
        </div>


        

        @endif


        <br class="hidden-desktop">
        <div class="row">
            <div class="col-md-12 text-right">
                <img src="{{asset('assets/img/project/icons/icono.png')}}" class="img-fluid" width="32">
                <button data-toggle="modal" data-target="#deleteUserModal" data-titulo='ejecucion' data-idproject="{{$project->id_project}}" class="btn btn-sm btn-documents" style="font-size: 11px;">DESCARGA LOS DATOS DE ESTA SECCIÓN</button>
            </div>
        </div>

    </div>

    <!-- <div class="col-md-2 text-right">
                <img src="{{asset('assets/img/project/icons/pdf.png')}}" class="img-fluid" width="32">
                <button class="btn btn-sm btn-documents" style="font-size: 11px;">ABRIR PDF</button>
            </div> -->

    <!-- Section - Finalización -->
    <div class="row mt-5" id="finalizacion">
        <div class="col-md-6 background-title px-0 py-1">
            <span class="title-project-single">Finalización</span>
        </div>
        <div class="col-md-6 px-0">
            <div class="" style="margin-top: 25px;
            border-bottom: 1px solid #628ea0;">
            </div>
        </div>

    </div>

    <div class="container">
        @php $montofinalizacion_f=0; $inaugurada="n/a"; @endphp

        @if(sizeof($finalizaciones)>0)

        @foreach ($finalizaciones as $finalizacion)
        @if ($loop->first)
        @if($finalizacion->fechafinalizacion!="")
        @php
        $inaugurada=$finalizacion->fechafinalizacion
        @endphp
        @endif
        @endif

        <div class="row">
            <div class="col-md-6 mt-5">
                <div class="container-item mb-4">
                    <strong style=" font-size: 20px !important">
                        {{$finalizacion->alcancefinalizacion}}
                    </strong>
                </div>
                <?php

                $montofinalizacion_f = $montofinalizacion_f + $finalizacion->costofinalizacion;

                if ($finalizacion->fechafinalizacion == "") {
                    $f = "";
                } else {
                    $f = strtotime($finalizacion->fechafinalizacion);
                }
                ?>
                <span style="padding-left: 20px;"><b>Costo de finalización: </b>${{number_format($finalizacion->costofinalizacion)}}</span><br>
                {{-- botón para mostrar el contenido  --}}
                <button onclick="mostrar_contenido_f({{$finalizacion->id}})" id="show-f{{$finalizacion->id}}" style="float: right; color: #628ea0; background: transparent; border: 0;">Ver más</button>
                {{-- div que captura todos los datos que estarán ocultos al momento de iniciar la página --}}
                <div id="vermas-f{{$finalizacion->id}}" style="display: none; padding-left: 20px;">
                    <span><b>Fecha de finalización: </b>@if($f=="")@else{{date('d/m/Y',$f)}}@endif</span><br>
                    <span><b>Alcance de la finalización: </b>{{$finalizacion->alcancefinalizacion}}</span><br>
                    <span><b>Razones de cambio en el proyecto: </b>{{$finalizacion->razonescambioproyecto}}</span><br>
                     <span><b>Referencia a informes de auditoría y evaluación: </b>{{$finalizacion->referenciainforme}}</span><br>
                    <br>
                   
                    <span><b>Observaciones de la sección:</b></label><br>
                        <span>{{$finalizacion->observaciones}}</span>
                    

                        {{-- botón para ocultar el contenido --}}
                        <button onclick="ocultar_contenido_f({{$finalizacion->id}})" id="hide-f{{$finalizacion->id}}" style="float: right; color: #628ea0; background: transparent; border: 0; display: none;">Cerrar</button>
                </div>

            </div>
        </div>
        @endforeach
        
        @else

        <div class="row">
            <div class="col-md-6 mt-5">
                <div class="container-item mb-4">
                    <strong style=" font-size: 20px !important">
                        
                    </strong>
                </div>
              
                <span><b>Costo de finalización: </b></span><br>
              
                    <span><b>Fecha de finalización: </b></span><br>
                    <span><b>Alcance de la finalización: </b></span><br>
                    <span><b>Razones de cambio en el proyecto: </b></span><br>
                    <span><b>Referencia a informes de auditoría y evaluación: </b></span><br>
                    <br>
                   
                    <span><b>Observaciones de la sección:</b></label><br>
                        <span></span>
                


            </div>
        </div>
        @endif

        <br class="hidden-desktop">
        <div class="row">
            <div class="col-md-12 text-right">
                <img src="{{asset('assets/img/project/icons/icono.png')}}" class="img-fluid" width="32">
                <button data-toggle="modal" data-target="#deleteUserModal" data-titulo='finalizacion' data-idproject="{{$project->id_project}}" class="btn btn-sm btn-documents" style="font-size: 11px;">DESCARGA LOS DATOS DE ESTA SECCIÓN</button>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row align-items-baseline">
            <div class="col-md-7" style="background-color:#d60000; color:#fff;">
                <div class="d-flex justify-content-end align-items-baseline">
                    <span style="font-size: 26px; font-weight: 700;">{{$project->porcentaje_obra}}%
                    </span>&nbsp;&nbsp;<span> completado</span>
                </div>
            </div>
            <div class="col-md-3 text-inaguracion">

                <span style="font-weight: 700;">Inaugurada:

                    @php
                    if($inaugurada!="n/a"){
                    $phpdate = strtotime( $inaugurada );
                    $inaugurada = date( 'Y-m-d', $phpdate );
                    }


                    @endphp
                    {{$inaugurada}}

                </span>

            </div>
        </div>

    </div>

    <!-- Barra - Resumen -->
    <div class="row" id="background-resumen">
        <div class="col-md-12 col-12 d-flex justify-content-center" style="height: auto;">
            <div class="col-md-3 px-0 col-4 text-center text-white py-3">
                <img src="{{ asset('/assets/img/project/icons/beneficiarios.png') }}" class="img-fluid" width="24" alt="">
                <br class="hidden-desktop">
                &nbsp<span class="text-resumen">Beneficiarios: {{number_format($project->people)}}</span>
            </div>
            <div class="mt-3 border-vertical-resumen"></div>
            <div class="col-md-3 px-0 col-4 text-center text-white py-3">
                <img src="{{ asset('/assets/img/project/icons/ubicacion.png') }}" class="img-fluid" width="16" alt="">
                <br class="hidden-desktop">
                &nbsp<span class="text-resumen">{{$address_f}}</span>
            </div>
            <div class="mt-3 border-vertical-resumen"></div>
            <div class="col-md-3 px-0 col-4 text-center text-white py-3">
                <img src="{{ asset('/assets/img/project/icons/dinero.png') }}" class="img-fluid" width="24" alt="">
                <br class="hidden-desktop">
                &nbsp<span class="text-resumen">Inversión: $

                    @if($montofinalizacion_f!=0)
                    {{number_format($montofinalizacion_f)}}

                    @else
                    {{number_format($montocontrato_final)}}

                    @endif

                </span>
            </div>
            <div class="mt-3 border-vertical-resumen"></div>
        </div>
    </div>

    <!-- Section - Documentos para descargar -->
    <div class="row align-items-center" id="background-docs">
        <div class="col-md-6 col-6 text-center my-5">
            <p class="text-descargar"><strong>¡Descarga todos los documentos del proyecto!</strong></p>
            <a href="#" data-toggle="modal" data-target="#modaldocuments">
                <img src="{{asset('/assets/img/project/icons/clic.png')}}" class="img-fluid icon-clic" width="50" alt="">
            </a>
        </div>
        <div class="col-md-4 col-4 text-center my-5" style="margin-left: 3%;">
        <div class="container-item d-flex justify-content-between align-items-center text-white">
                        {{-- <img src="{{ asset('assets/img/project/institucion.png') }}" class="img-fluid" width="36" alt=""> --}}
                        <strong id="titulos-phone">DESCARGA LOS DATOS DE LA INICIATIVA</strong>
                    </div>
                    <div  class="col-md-12 mt-4">
        
                <a href="{{route('projectexport',[$project->id_project,'csv'])}}"><i style="font-size: 30px; margin-right:1%" class="fas fa-file-csv"></i> </a>   
        
        
                <a href="{{route('projectexport',[$project->id_project,'xlsx'])}}"><i style="font-size: 30px; margin-right:1%" class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                <a href="{{route('jsonproject',$project->id_project)}}"><i style="font-size: 30px;" class="fa fa-file-alt" aria-hidden="true"></i></a>
                
            </div>
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
                                <th>Tipo de documento</th>
                                <th>Descargar</th>
                            </tr>
                        </thead>
                        <tbody id="tBody">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaldocuments" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Documentos del proyecto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Documento</th>
                                <th>Tipo de documento</th>
                                <th>Descargar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($project_documents as $document)
                            <tr>
                                <?php
                                $tipo = DB::table('documenttype')
                                    ->where('id', '=', $document->documentType)
                                    ->first();
                                $ruta = asset('documents/' . $document->url);
                                ?>

                                <td>{{$document->url}}</td>
                                <td>{{$tipo->titulo}}</td>
                                <td>
                                    <center><a class="btn btn-dark" href="{{$ruta}}"><i class="fas fa-download  fa-sm text-white-50"></i></a></center>
                                </td>


                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>

<input type="hidden" id="lat" value="{{$project->lat}}">
<input type="hidden" id="lng" value="{{$project->lng}}">



@endsection

@section('scripts')
<script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<script src="{{asset('markercluster/dist/leaflet.markercluster.js')}}"></script>


<script type="text/javascript">
    // listen for screen resize events

    window.addEventListener('load', function(event) {

        var width = document.documentElement.clientWidth;

        if (width < 1550) {
            zona = 7;
        } else {
            zona = 8;
        }

        var icon = L.icon({
            iconUrl: '/assets/img/map/marker.png',
            iconSize: [25, 35], // size of the icon
        });

        var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            osmAttrib = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            osm = L.tileLayer(osmUrl, {
                maxZoom: 19,
                attribution: osmAttrib
            }),
            bounds = new L.LatLngBounds(new L.LatLng(22.629, -103.886), new L.LatLng(18.489, -102.940));

        var map = new L.Map('map', {
            scrollWheelZoom: false,
            center: bounds.getCenter(),
            zoom: zona,
            layers: [osm],
            maxBounds: bounds
        });


        //Obtiene los campos oculttos lat y lng, y separa los valores con la fución split para guardar cada valor independiente
        //en cada posición del array. Despúes valido que la cadena no este vacía y creo los puntos/marcadores.

        let lat = document.getElementById('lat');
        let lng = document.getElementById('lng');

        let lat_split = lat.value.split('|')
        let lng_split = lng.value.split('|')
        var markers = L.markerClusterGroup();

        if (lat_split[0] != "") {
            for (var i = 0; i <= lat_split.length; i++) {
                if (lat_split[i] == "" || lat_split[i] == undefined || lat_split[i] == null) {
                    console.log("Última localización de cada proyecto.")
                } else {
                    //console.log([lat_split[i], lng_split[i]])
                    marker = L.marker([lat_split[i], lng_split[i]], {
                        icon: icon
                    })//.bindPopup('<p>You are here ' + lat_split[i] + ',' + lng_split[i] + '</p>'); Opcional. Para conocer la latlng.

                    markers.addLayer(marker)
                }
            }
        }
        map.addLayer(markers);


        /*
        const puntos = @json($puntos);
        console.log(puntos);
      
        
      puntos.forEach(function(item, index) {
          var lat=item.lat;
          var lng = item.lng;
          //console.log(item.principal);
          if(lat==null){

          }else{
              

          
          L.marker( [lat,lng], {icon: icon} ).addTo(map);
          }
         
      }); 
      */

    });

    window.onload = function() {
        /**Modal que carga los documentos de determinada fase en base al titulo/nombre
         * de la fase  y id del proyecto. */
        $('#deleteUserModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var titulo = button.data('titulo')
            var idproject = button.data('idproject');
            console.log(idproject);
            $('#modaltitulo').html("Documentos de la fase de: " + titulo);

            $.ajax({
                data: {
                    "_token": "{{ csrf_token() }}",
                    "titulo": titulo,
                    "idproject": idproject,
                },
                url: "{{ route('getdocumentsproject') }}",
                type: 'post',
                dataType: "json",
                success: function(resp) {

                    /*una vez que el archivo recibe el request lo procesa y lo devuelve
                    y  construye la tabla dentro del modal con el nombre y tipo del documento de 
                    determinada fase
                    */

                    console.log(resp);
                    $(".display tbody tr").remove();
                    trHTML = '';
                    $.each(resp, function(i, userData) {

                        var public_path = "{{asset('documents/') }}";
                        var f = public_path + "/" + resp[i].url
                        trHTML +=
                            '<tr><td >' +
                            '<center>' + resp[i].url + '</center>' +
                            '<td>' + resp[i].titulo + ' </td>' +
                            '</td>><td>' +
                            '<center><a class="btn btn-dark" href=' + f + '><i class="fas fa-download  fa-sm text-white-50"></i></a></center>' +
                            '</tr>';
                    });

                    $('#tBody').append(trHTML);

                    if (resp.length == 0) {
                        trHTML += '<tr><td>Sin documentos</td><td></td></tr>';
                        $('#tBody').append(trHTML);
                    }

                },
                error: function(response) {

                }
            });

        })

    }
</script>
<script type="text/javascript">
    // funciones para mostrar y ocultar el contenido de contratacion
    function mostrar_contenido(id) {
        $('#empresa_principal').hide();
        $("#vermas" + id).show();
        $("#vermas-em" + id).show();
        $("#hide" + id).show();
        $("#show" + id).hide();


        $("#vermas" + id).addClass("visible");
        $("#vermas-em" + id).addClass("visible");

        return false;
    }

    function ocultar_contenido(id) {
        $('#empresa_principal').show();
        $("#vermas" + id).hide();
        $("#vermas-em" + id).hide();
        $("#show" + id).show();
        $("#hide" + id).hide();
        $("#vermas" + id).removeClass("visible");
        $("#vermas-em" + id).removeClass("visible");

        return false;
    }
    // funciones para mostrar y ocultar el contenido de ejecución

    function mostrar_contenido_e(id) {
        $("#vermas-e" + id).show();
        // $("#vermas-em-e"+id).show();
        $("#hide-e" + id).show();
        $("#show-e" + id).hide();

        $("#vermas-e" + id).addClass("visible");

        return false;
    }

    function ocultar_contenido_e(id) {
        $("#vermas-e" + id).hide();
        // $("#vermas-em"+id).hide();
        $("#show-e" + id).show();
        $("#hide-e" + id).hide();
        $("#vermas-e" + id).removeClass("visible");

        return false;
    }

    // funciones para mostrar y ocultar el contenido de finalicación

    function mostrar_contenido_f(id) {
        $("#vermas-f" + id).show();
        // $("#vermas-em-e"+id).show();
        $("#hide-f" + id).show();
        $("#show-f" + id).hide();

        $("#vermas-f" + id).addClass("visible");

        return false;
    }

    function ocultar_contenido_f(id) {
        $("#vermas-f" + id).hide();
        // $("#vermas-em"+id).hide();
        $("#show-f" + id).show();
        $("#hide-f" + id).hide();
        $("#vermas-f" + id).removeClass("visible");

        return false;
    }
</script>
@endsection