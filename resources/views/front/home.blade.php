@extends('front.layouts.app')

@section('title')
Inicio
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset("assets/css/home.css")}}">
@endsection

@section('content')
<!-- Contenido -->
<div class="main">

    <!--MODAL-->
    <div class="chatbot text-center">
        <img src="{{ asset('assets/img/home/chatbot.png') }}" type="button" class="img-fluid" width="280"
            alt="Chatbot - Página CoST Jalisco" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-bs-whatever="@mdo">
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Super Inspe-CoST</h5>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">x</button>
                </div>
                <form>
                    <div class="modal-body">
                        <label for="message-text" class="col-form-label">Busca por una palabra clave</label>
                        <div class="input-group">

                            <div class="row no-gutters w-100">
                                <div class="col">
                                    <input class="form-control border-secondary border-right-0 rounded-0" type="text" id="inputSearch" placeholder="Escribe palabras clave">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <ul id="box-search">
                                <li><a href="{{url('/#inicio-nosotros')}}"><i class="fas fa-search"></i>Inicicio >
                                        Nosotros</a></li>
                                <li><a href="{{url('know-more')}}"><i class="fas fa-search"></i>Conoce más >
                                        Historia</a></li>
                                <li><a href="{{url('know-more#que-es-cost')}}"><i class="fas fa-search"></i>Conoce más >
                                        ¿Que es CoST?</a></li>
                                <li><a href="{{url('know-more#beneficios')}}"><i class="fas fa-search"></i>Conoce más >
                                        Beneficios</a></li>
                                <li><a href="{{url('know-more#procesos-de-cost')}}"><i class="fas fa-search"></i>Conoce
                                        más > Procesos de CoST</a></li>
                                <li><a href="{{url('know-more#divulgacion')}}"><i class="fas fa-search"></i>Conoce más >
                                        Divulgacion</a></li>
                                <li><a href="{{url('know-more#aseguramiento')}}"><i class="fas fa-search"></i>Conoce más
                                        > Aseguramiento</a></li>
                                <li><a href="{{url('know-more#auditoria-social')}}"><i class="fas fa-search"></i>Conoce
                                        más > Auditoria Social</a></li>

                                <li><a href="{{url('about-us#cost-jalisco')}}"><i class="fas fa-search"></i>Nosotros >
                                        CoST Jalisco</a></li>
                                <li><a href="{{url('about-us#objetivo-general')}}"><i class="fas fa-search"></i>Nosotros
                                        > Objetivo de CoST jalisco</a></li>
                                <li><a href="{{url('multisectorial')}}"><i class="fas fa-search"></i>Nosotros > Grupo
                                        Multisectorial</a></li>

                                <li><a href="{{url('statistics')}}"><i class="fas fa-search"></i>Proyectos >
                                        Estadisticas</a></li>
                                <li><a href="{{url('search-engine')}}"><i class="fas fa-search"></i>Proyectos > Motor de
                                        búsqueda</a></li>
                                <li><a href="{{url('georeferencing')}}"><i class="fas fa-search"></i>Proyectos >
                                        Georreferenciación</a></li>
                                <li><a href="{{url('list-projects')}}"><i class="fas fa-search"></i>Proyectos > Listado
                                        de obras</a></li>

                                <li><a href="{{url('resources')}}"><i class="fas fa-search"></i>Recursos > Documentos de
                                        interes</a></li>
                                <li><a href="{{url('support-material')}}"><i class="fas fa-search"></i>Recursos >
                                        Material de apoyo</a></li>

                                <li><a href="{{url('eventos')}}"><i class="fas fa-search"></i>Noticias > Eventos</a>
                                </li>
                                <li><a href="{{url('newsletters')}}"><i class="fas fa-search"></i>Noticias >
                                        Boletines</a></li>
                                <li><a href="{{url('journal')}}"><i class="fas fa-search"></i>Noticias > Notas
                                        Periodisticas</a></li>

                                <li><a href="{{url('statistics#iniciativa')}}"><i
                                            class="fas fa-search"></i>Proyectos</a></li>
                                <li><a href="{{url('statistics#iniciativa')}}"><i class="fas fa-search"></i>Proyectos de
                                        la iniciativa</a></li>
                                <li><a href="{{url('statistics#presupuesto')}}"><i class="fas fa-search"></i>Presupuesto
                                        utilizado</a></li>

                                <li><a href="{{url('list-projects#sectorpublico')}}"><i class="fas fa-search"></i>Sector
                                        público</a></li>
                                <li><a href="{{url('resources#cartaapoyo')}}"><i class="fas fa-search"></i>Cartas de
                                        apoyo</a></li>
                                <li><a href="{{url('resources#cartaintencion')}}"><i class="fas fa-search"></i>Cartas de
                                        intención</a></li>
                                <li><a href="{{url('resources#cartaaplicacion')}}"><i class="fas fa-search"></i>Cartas
                                        de aplicación</a></li>
                                <li><a href="{{url('resources#cartaaprobacion')}}"><i class="fas fa-search"></i>Cartas
                                        de aprobación</a></li>
                                <li><a href="{{url('resources#plantrabajo')}}"><i class="fas fa-search"></i>Plan de
                                        trabajo</a></li>
                                <li><a href="{{url('resources#actas')}}"><i class="fas fa-search"></i>Actas</a></li>
                                <li><a href="{{url('resources#informe')}}"><i class="fas fa-search"></i>Informes de aseguramiento</a></li>
                                <li><a href="{{url('resources#reglamentos')}}"><i class="fas fa-search"></i>Reglamentos</a></li>
                                <li><a href="{{url('resources#estandares')}}"><i class="fas fa-search"></i>Estándares</a></li>
                                <li><a href="{{url('resources#mapasitio')}}"><i class="fas fa-search"></i>Mapa de sitio aprobado</a></li>
                                <li><a href="{{url('support-material#seminarioabierto')}}"><i class="fas fa-search"></i>Seminarios de datos abiertos</a></li>
                                <li><a href="{{url('eventos#enero')}}"><i class="fas fa-search"></i>Eventos de enero</a></li>

                            </ul>
                            <div id="cover-ctn-search"></div>
                        </div>
                        <br><br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <!-- Section - Carousel main default -->
    @if(sizeof($h)==0)
    <div id="carouselHome" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselHome" data-slide-to="0" class="active"></li>
            <li data-target="#carouselHome" data-slide-to="1"></li>
            <li data-target="#carouselHome" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/home/slider-main/matute.jpg') }}"
                    alt="Puente Matute Remus, Guadalajara Jalisco">
                <div class="container">
                    <div class="carousel-caption">
                        <span class="font-title-carousel font-weight-bold">INFRAESTRUCTURA</span>
                        <span class="font-title-carousel">VALORADA</span>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/home/slider-main/rotonda.jpg') }}" alt="">
                <div class="container">
                    <div class="carousel-caption">
                        <span class="font-title-carousel font-weight-bold">INFRAESTRUCTURA</span>
                        <span class="font-title-carousel">VALORADA</span>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/home/slider-main/macro.jpg') }}" alt="">
                <div class="container">
                    <div class="carousel-caption">
                        <span class="font-title-carousel font-weight-bold">INFRAESTRUCTURA</span>
                        <span class="font-title-carousel">VALORADA</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @else
    <div id="carouselHome" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselHome" data-slide-to="0" class="active"></li>
            <li data-target="#carouselHome" data-slide-to="1"></li>
            <li data-target="#carouselHome" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">

                <?php 
                    $ruta = asset('assets/img/home/slider-main/'.$h[0]->url);
                ?>

                <img src="{{$ruta }}" alt="">
                <div class="container">
                    <div class="carousel-caption">
                        <span class="font-title-carousel font-weight-bold">INFRAESTRUCTURA</span>
                        <span class="font-title-carousel">VALORADA</span>
                    </div>
                </div>
            </div>

            @for ($i = 1; $i < sizeof($h); $i++) <div class="carousel-item">
                <?php 
                    $ruta = asset('assets/img/home/slider-main/'.$h[$i]->url);
                ?>
                <img src="{{$ruta }}" alt="">
                <div class="container">
                    <div class="carousel-caption">
                        <span class="font-title-carousel font-weight-bold">INFRAESTRUCTURA</span>
                        <span class="font-title-carousel">VALORADA</span>
                    </div>
                </div>
        </div>
        @endfor
    </div>
</div>

@endif

<!-- Btn Agenda -->
<!--
 <div class="btn-agenda">
        <img src="{{ asset('assets/img/home/btn-eventos.png') }}" onclick="showEventosAgenda()" class="img-fluid"
            style="cursor: pointer;" alt="Agenda CoST Jalisco">
    </div> 
    
    <div id="panel-oculto" class="container-aventos-agenda">
        <img src="{{ asset('assets/img/home/eventos-agenda.png') }}" class="img-fluid" alt="Agenda CoST Jalisco">
        <div class="container-agenda-fechas">
            <div class="row mx-0">
                <div class="col-md-1"></div>
                <div class="col-md-3 pl-1 pr-2 text-right">
                    <div class="fecha">
                        <label class="mr-3 agenda-day">01</label>
                        <label class="agenda-mes">NOVIEMBRE</label><br>
                        <label class="agenda-descripcion">Evento previo a día de muertos</label>
                    </div>
                    <div class="line-agenda-fechas"></div>
                </div>
                <div class="col-md-3 pl-1 pr-2 text-right">
                    <div class="fecha">
                        <label class="mr-3 agenda-day">12</label>
                        <label class="agenda-mes">NOVIEMBRE</label><br>
                        <label class="agenda-descripcion">"La insfraestructura y economía" Imparte: Luis Rosales. Auditorio
                            Telmex 8:00 pm Cupo limitado</label>
                    </div>
                    <div class="line-agenda-fechas"></div>
                </div>
                <div class="col-md-3 pl-1 pr-2 text-right">
                    <div class="fecha">
                        <label class="mr-3 agenda-day">28</label>
                        <label class="agenda-mes">NOVIEMBRE</label><br>
                        <label class="agenda-descripcion">La insfraestructura y economía" Imparte: Luis Rosales. Auditorio
                            Telmex 8:00 pm Cupo limitado</label>
                    </div>
                    <div class="line-agenda-fechas"></div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
-->

<!-- Título - Nosotros -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center font-weight-bold" id="inicio-nosotros">NOSOTROS</h3>
            <div class="section-divider"></div>
        </div>
    </div>
</div>

<!-- Section - Índices -->
<div class="row mx-0">
    <div class="col-lg-3 col-md-4 col-sm-6 col-6 px-0">
        <div class="card-indice-title">Organizaciones</div>
        <img src="{{ asset('assets/img/home/indices/org.jpg') }}" class="img-fluid" alt="Indice de organizaciones">
        <div class="card-indice-counter">
            {{$total_organization}}
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-6 px-0">
        <div class="card-indice-title">Proyectos de la iniciativa</div>
        <img src="{{ asset('assets/img/home/indices/proyectos.jpg') }}" class="img-fluid" alt="Indice de proyectos">
        <div class="card-indice-counter">
            {{$total_proyectos}}
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 col-6 px-0">
        <div class="card-indice-title">Personas beneficiadas</div>
        <img src="{{ asset('assets/img/home/indices/personas.jpg') }}" class="img-fluid" alt="Indice de personas">
        <div class="card-indice-counter">
            {{$total_beneficiarios}}
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-6 px-0">
        <div class="card-indice-title">Presupuesto utilizado</div>
        <img src="{{ asset('assets/img/home/indices/presupuesto.jpg') }}" class="img-fluid" alt="Indice de presupuesto">
        <div class="card-indice-counter presupuesto">
            ${{number_format($total_contrato,2)}}
        </div>
    </div>
</div>

<!-- Label de actuaización -->
<div class="row mx-0">
    <div class="col-md-12">
        <div class="text-right mt-3 mb-3">
            @php

                if(sizeof($complements)!=0){
                    setlocale(LC_TIME, "spanish");
                $fecha_c = $complements[0]->fecha_actualizacion;
                $fecha_c = str_replace("/", "-", $fecha_c);			
                $Nueva_Fecha_c = date("d-M-Y", strtotime($fecha_c));	
                $fecha_update = strftime("%d de %B de %Y", strtotime($Nueva_Fecha_c));
                }else{
                    $fecha_update="";
                }
               

            @endphp
            <h6 class="text-muted">Actualizado al {{$fecha_update}}</h6>
        </div>
    </div>
</div>

<!-- Title - ¿Qúes es CoST? -->
<div class="row mx-0">
    <div class="col-md-6 px-0 mb-5">
        <div class="text-center text-white">
            <h3 class="py-2 font-weight-bold title-barra-roja">¿Qué es CoST?</h3>
        </div>
    </div>
</div>

<!-- Section - Descripción CoST -->
<div class="container">
    <div class="row">
        <div class="col-md-6 line-red-vertical">
            <div class="my-4" style="letter-spacing: -.2px;">
                <p>
                    La iniciativa de Transparencia en Infraestructura <strong>[Construction <br class="hidden-phone">
                        Sector Transparency Initiative] o "CoST" por sus siglas en <br class="hidden-phone">
                        inglés,</strong> es la encargada de promover la transparencia y la <br class="hidden-phone">
                    rendición de cuentas dentro de las diferentes etapas de los <br class="hidden-phone">
                    proyectos de infraestructura y obra pública.
                </p>
                <p>
                    Actualmente, tiene presencia en 19 países distribuidos en <br class="hidden-phone">
                    cuatro continentes, donde trabaja directamente con el Gobierno, <br class="hidden-phone">
                    la sociedad civil y la industria del ramo de la contrucción para <br class="hidden-phone">
                    promover la divulgación, validación e interpretación de datos de <br class="hidden-phone">
                    proyectos de infraestructura y obra pública.
                </p>
                <br>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <br class="hidden-phone"><br class="hidden-phone">
            <img src="{{ asset('assets/img/header/vector-ciudad.png') }}" class="img-fluid" width="460" alt="">
            <br class="hidden-phone"><br>
            <span><a href="https://infrastructuretransparency.org/" class="ver-mas-font" target="_BLANK">Ver más:
                    https://infrastructuretransparency.org/</a></span>
        </div>
    </div>
</div>

<br class="hidden-desktop">

<!-- Title - Grupo multisectorial-->
<div class="row mx-0">
    <div class="col-md-6 px-0 mt-2">
        <div class="text-center text-white">
            <h3 class="py-2 font-weight-bold title-barra-roja">Grupo Multisectorial</h3>
        </div>
    </div>
    <div class="col-md-6">
        <div class="line-red-center"></div>
    </div>
</div>

<!-- Section - Descripción Grupo multisectorial-->
<div class="container">
    <div class="row align-items-center">
        <div class="col-md-7 line-red-vertical">
            <div class="mt-5" style="letter-spacing: -.2px;">
                <p>
                    El Grupo Multisectorial "GMS" está conformado por instituciones de <br class="hidden-phone">
                    Gobierno, del sector privado, del sector académico y de la sociedad civil.
                </p>
                <p>
                    Este grupo, a través de los representantes de cada una de las <br class="hidden-phone">
                    instituciones que lo integra, es el responsable de guiar el desarrollo, la <br class="hidden-phone">
                    implementación y supervisión de la iniciativa de CoST en Jalisco.
                </p>
            </div>
        </div>
        <div class="col-md-5 text-center hidden-phone">
            <a href="{{ route('organizations') }}">
                <img src="{{ asset('assets/img/home/mas-info.png') }}" class="img-fluid" width="240" alt="">
            </a>
        </div>
    </div>
</div>

<!-- Section - Sector público-->
<div class="container mt-5 hidden-phone">
    <div style="border-left: 5px solid #2C4143;">
        <div class="row mb-3">
            <div class="col-md-12">
                <h3 class="title-sector">Sector Público
                </h3>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-2 col-sm-2 text-center">
                <a href="https://www.jalisco.gob.mx/" target="_BLANK">
                    <img src="{{ asset('assets/img/home/sector-publico/jalisco.jpg') }}" class="img-fluid" width="100"
                        alt="">
                </a>
            </div>
            <div class="col-md-2 col-sm-2 text-center">
                <a href="https://guadalajara.gob.mx/" target="_BLANK">
                    <img src="{{ asset('assets/img/home/sector-publico/guadalajara.jpg') }}" class="img-fluid"
                        width="70" alt="">
                </a>
            </div>
            <div class="col-md-2 col-sm-2 text-center">
                <a href="https://www.zapopan.gob.mx/v3/" target="_BLANK">
                    <img src="{{ asset('assets/img/home/sector-publico/zapopan.jpg') }}" class="img-fluid" width="70"
                        alt="">
                </a>
            </div>
            <div class="col-md-2 col-sm-2 text-center">
                <a href="https://tonala.gob.mx/portal/" target="_BLANK">
                    <img src="{{ asset('assets/img/home/sector-publico/tonala.jpg') }}" class="img-fluid" width="80"
                        alt="">
                </a>
            </div>
            <div class="col-md-2 col-sm-2 text-center">
                <a href=" https://home.inai.org.mx/" target="_BLANK">
                    <img src="{{ asset('assets/img/home/sector-publico/inai.jpg') }}" class="img-fluid" width="100"
                        alt="">
                </a>
            </div>
            <div class="col-md-2 col-sm-2 text-center">
                <a href="https://www.itei.org.mx/v4/" target="_BLANK">
                    <img src="{{ asset('assets/img/home/sector-publico/itei.jpg') }}" class="img-fluid" width="100"
                        alt="">
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Section - Sector Académico-->
<div class="container mt-5 hidden-phone">
    <div style="border-left: 5px solid #D60000;">
        <div class="row mb-3">
            <div class="col-md-12">
                <h3 class="text-red title-sector">Sector Académico
                </h3>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-2 col-sm-2 text-center">
                <a href="https://www.udg.mx/" target="_BLANK">
                    <img src="{{ asset('assets/img/home/sector-academico/udg.jpg') }}" class="img-fluid" width="60"
                        alt="">
                </a>
            </div>
            <div class="col-md-2 col-sm-2 text-center">
                <a href="https://www.iteso.mx/" target="_BLANK">
                    <img src="{{ asset('assets/img/home/sector-academico/iteso.jpg') }}" class="img-fluid" width="50"
                        alt="">
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Section - Sector Privado-->
<div class="container mt-5 hidden-phone">
    <div style="border-left: 5px solid #FFCE32;">
        <div class="row mb-3">
            <div class="col-md-12">
                <h3 style="color: #FFCE32;" class="title-sector">Sector Privado
                </h3>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-2 col-sm-2 text-center">
                <a href="https://cmicjalisco.org.mx/" target="_BLANK">
                    <img src="{{ asset('assets/img/home/sector-privado/cmic.jpg') }}" class="img-fluid" width="100"
                        alt="">
                </a>
            </div>
            <div class="col-md-2 col-sm-2 text-center">
                <a href="https://www.cicej.org/" target="_BLANK">
                    <img src="{{ asset('assets/img/home/sector-privado/cicej.jpg') }}" class="img-fluid" width="100"
                        alt="">
                </a>
            </div>
            <div class="col-md-2 col-sm-2 text-center">
                <a href="http://www.comceoccte.org.mx/" target="_BLANK">
                    <img src="{{ asset('assets/img/home/sector-privado/comce.jpg') }}" class="img-fluid" width="100"
                        alt="">
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Section - Sociedad Civil Organizada-->
<div class="container mt-5 hidden-phone">
    <div style="border-left: 5px solid #61A8BD;">
        <div class="row mb-3">
            <div class="col-md-12">
                <h3 style="color: #61A8BD;" class="title-sector">Sociedad Civil
                    Organizada</h3>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-2 col-sm-2 text-center">
                <a href="http://cpsjalisco.org/" target="_BLANK">
                    <img src="{{ asset('assets/img/home/sociedad-civil-organizada/cps.jpg') }}" class="img-fluid"
                        width="100" alt="">
                </a>
            </div>
            <div class="col-md-2 col-sm-2 text-center">
                <a href="http://cimtrajalisco.org/" target="_BLANK">
                    <img src="{{ asset('assets/img/home/sociedad-civil-organizada/cimtra.jpg') }}" class="img-fluid"
                        width="100" alt="">
                </a>
            </div>
            <div class="col-md-2 col-sm-2 text-center">
                <a href="http://www.mexicoevalua.org/" target="_BLANK">
                    <img src="{{ asset('assets/img/home/sociedad-civil-organizada/mexico.jpg') }}" class="img-fluid"
                        width="120" alt="">
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Section - Aliados Estratégicos-->
<div class="container mt-5 hidden-phone">
    <div style="border-left: 5px solid #D8D8CD;">
        <div class="row mb-3">
            <div class="col-md-12">
                <h3 style="color: #D8D8CD;" class="title-sector">Aliados
                    Estratégicos</h3>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-3 col-sm-3 text-center">
                <a href="http://transversalthinktank.org/about" target="_BLANK">
                    <img src="{{ asset('assets/img/home/aliados-estrategicos/transversal.jpg') }}" class="img-fluid"
                        width="200" alt="">
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Section - Sector público-->
<div class="container mt-5 hidden-desktop">
    <!-- Section - Sector público-->
    <div class="container mt-5 hidden-desktop">
        <div style="border-left: 5px solid #2C4143; margin-bottom: 3rem;">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3 class="title-sector">Sector Público
                    </h3>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <ul style="margin-bottom: 0;">
                        <li><a class="mya" href="https://www.jalisco.gob.mx/">Gobierno del Estado de Jalisco</a></li>
                        <li><a class="mya" href="https://guadalajara.gob.mx/">Ayuntamiento de Guadalajara</a></li>
                        <li><a class="mya" href="https://www.zapopan.gob.mx/v3/">Ayuntamiento de Zapopan</a></li>
                        <li><a class="mya" href="https://tonala.gob.mx/portal/">Ayuntamiento de Tonalá</a></li>
                        <li><a class="mya" href="https://www.itei.org.mx/v4/">Instituto de Transparencia, Información
                                Pública y Protección de Datos <br>
                                Personales del Estado de Jalisco (ITEI) (Preside)</a></li>
                        <li><a class="mya" href="https://home.inai.org.mx/">Instituto Nacional de Transparencia, Acceso
                                a la
                                Información y <br>
                                Protección de Datos Personales (INAI)</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div style="border-left: 5px solid #D60000; margin-bottom: 3rem;">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3 style="color:#D60000;" class="title-sector">Sector Académico
                    </h3>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-12">
                    <ul style="margin-bottom: 0;">
                        <li><a class="mya" href="https://www.udg.mx/">Universidad de Guadalajara (UdeG)</a></li>
                        <li><a class="mya" href="https://www.iteso.mx/">Instituto Tecnológico y de Estudios Superiores
                                de
                                Occidente AC (ITESO)</a></li>
                        <li> <a class="mya" href="https://www.zapopan.gob.mx/v3/">Ayuntamiento de Zapopan</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div style="border-left: 5px solid #FFCE32; margin-bottom: 3rem;">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3 style="color: #FFCE32;" class="title-sector">Sector Privado
                    </h3>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-12">
                    <ul style="margin-bottom: 0;">
                        <li><a class="mya" href="https://cmicjalisco.org.mx/">Cámara Mexicana de la Industria de la
                                Construcción Delegación Jalisco <br>
                                (CMIC Jalisco)</a></li>
                        <li><a class="mya" href="https://cicej.org/">Colegio de Ingenieros Civiles del Estado de Jalisco
                                (CICEJ)</a</li> <li><a class="mya" href="http://comceoccte.org.mx/">Consejo Mexicano de
                                    Comercio Exterior de Occidente A.C (COMCE)</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div style="border-left: 5px solid #61A8BD; margin-bottom: 3rem;">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3 style="color: #61A8BD;" class="title-sector">Sociedad Civil Organizada
                    </h3>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-12">
                    <ul style="margin-bottom: 0;">
                        <li><a class="mya" href="http://cpsjalisco.org/">Comité de Participación Social del Sistema
                                Estatal
                                Anticorrupción (CPS)</a></li>
                        <li><a class="mya" href="http://www.cimtra.org.mx/portal/">Colectivo Ciudadanos por Municipios
                                Transparentes (CIMTRA)</a></li>
                        <li><a class="mya" href="https://www.mexicoevalua.org/">México Evalúa, Centro de Análisis de
                                Políticas Públicas A.C.</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div style="border-left: 5px solid #D8D8CD; margin-bottom: 3rem;">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3 style="color: #D8D8CD;" class="title-sector">Aliados Estratégicos
                    </h3>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-12">
                    <ul style="margin-bottom: 0;">
                        <li><a class="mya" target="_blank" href="http://transversalthinktank.org/about">Transversal
                                Think
                                Tank</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-right hidden-desktop">
            <a href="{{ route('organizations') }}">
                <img src="{{ asset('assets/img/home/mas-info.png') }}" class="img-fluid" width="180" alt="">
            </a>
        </div>
    </div>

</div>

<!-- Título - Proyectos-->
<div class="container pt-5">
    <div class="row">
        <div class="col-md-12 bg-gris">
            <a href="{{route('card-projects')}}">
                <h3 class="text-center font-weight-bold" style="color: #2C4143;">PROYECTOS</h3>
            </a>
            <div class="section-divider"></div>
        </div>
    </div>
</div>

<!-- Section - Carousel proyectos -->
<div class="row mx-0">
    <div class="col-lg-12  col-md-12 col-sm-12 col-12 px-0">
        <div id="carouselProjects" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                @foreach ($projects as $project)

                <div class="carousel-item @if($loop->first) active @endif" style="background-color: #D8D8CD;">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4" style="display: flex; align-items: center;">
                        
                            @php
                                $imagen=DB::table('projects_imgs')
                                ->select('projects_imgs.imgroute')
                                ->where('projects_imgs.id_project','=',$project->id_project)
                                ->get();
                            @endphp
                            @if (count($imagen)==0)
                                <img src="{{ asset('projects_imgs/sinimagen.png') }}" class="img-obra" alt="">
                            @else
                                {{-- <img src="{{ asset('projects_imgs/'.$imagen->last()->imgroute) }}" width="325" height="310"  alt=""> --}}
                                
                                <img src="{{ asset('projects_imgs/'.$imagen->last()->imgroute) }}" class="img-obra" alt="">
                            @endif
                        </div>
                        @php
                            $title = substr($project->title,0,42).'...';
                            $description = substr($project->description,0,100).'...';
                            $ubicacion = substr($project->streetAddress." ".$project->locality." ".$project->region, 0, 32).'...';
                        @endphp
                        <div class="hidden-desktop"
                            style="position: absolute; left: 0; top: 50%; transform: translateY(-50%); width: 100%; font-size: 26px; text-align: center; padding: 0 30px;">
                            <span class="font-weight-bold" style="color: #fff; text-shadow: 0.1em 0.1em 0.2em black">
                                <a href="{{ route('project-single', $project->id_project) }}">{{ $title }}</a>
                            </span>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 hidden-phone">
                            <h2 class="font-weight-bold my-4 text-red font-size-title">{{ $title }}</h2>
                            <div class="row">
                                <div class="col-md-6 col-sm-6" style="border-right: 1px solid #777;">
                                    <p>
                                        {{ $description }}
                                    </p>
                                </div>
                                <div class="col-md-6 col-sm-6 pl-4">
                                    <p>
                                        <img src="{{ asset('assets/img/home/slider-proyectos/icons/dinero.png') }}"
                                            class="img-fluid icon-img-carousel" alt="">
                                        <strong>&nbsp; Inversión: </strong> $
                                        {{number_format($project->montocontrato,2)}}</p>
                                    <p class="hidden-desktop-mini"><img src="{{ asset('assets/img/home/slider-proyectos/icons/reloj.png') }}"
                                            class="img-fluid icon-img-carousel" alt="">
                                        <strong>&nbsp; Periodo de construcción: </strong> {{$project->period}}</p>
                                    <p><img src="{{ asset('assets/img/home/slider-proyectos/icons/ubicacion.png') }}"
                                            class="img-fluid icon-img-carousel" alt="">
                                        <strong>&nbsp; Ubicación: </strong>{{ $ubicacion }}</p>
                                    <p><img src="{{ asset('assets/img/home/slider-proyectos/icons/usuarios.png') }}"
                                            class="img-fluid icon-img-carousel" alt="">
                                        <strong>&nbsp; Beneficiarios: </strong> {{$project->people}}</p>
                                    <br>
                                    <span><a href="{{ route('project-single', $project->id_project) }}" class="text-red"
                                            style="font-size: 18px; font-weight: 700; font-style: italic;">Ver
                                            más <span style="letter-spacing: -4px">>></span></a></span>
                                </div>
                            </div>
                        </div>
                        <div class="rectangulo-rojo-avance-carousel text-white"><span
                                style="font-size: 32px;"><strong>{{$project->porcentaje_obra}}%</strong></span><span
                                style="font-size: 14px;" class="mx-2">completado</span></div>
                    </div>
                </div>

                @endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselProjects" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselProjects" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<!-- Section - newsletter -->
<div class="row mx-0 my-4 align-items-center hidden-tablet">
    <div class="col-md-12 col-sm-12 px-0">
        <img src="{{ asset('assets/img/home/box-newsletter.jpg') }}" class="img-fluid" alt="Newsletter - CoST Jalisco">
        <div class="form-newsletter">
            <form action="{{route('savemailsubscriberf')}}" method="POST">
                @csrf
                <h6 style="font-size: 16px; font-weight: 600;" class="mb-3">¡Regístrate para seguir próximos
                    proyectos!</h6>
                <input type="email" id="email" name="email" placeholder="Tu correo aquí" class="input-newsletter"
                    required>
                <button type="submit" class="btn-newsletter mt-3">SUSCRIBIRSE</button>
            </form>
        </div>
    </div>
</div>

<!-- Título - Nuestras redes-->
<div class="container pt-5 hidden-phone">
    <div class="row">
        <div class="col-md-12 bg-gris">
            <h3 class="text-center font-weight-bold">NUESTRAS REDES
            </h3>
            <div class="section-divider"></div>
        </div>
    </div>
</div>

<!-- Section - Timeline redes sociales -->
<div class="container pb-5 hidden-phone">
    <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="timeline"></div>
            <div class="timeline-icon-position"><i class="fab fa-twitter fa-sm"></i></div>
            <a class="twitter-timeline" data-lang="es" data-height="280" data-theme="light"
                href="https://twitter.com/CostJalisco?ref_src=twsrc%5Etfw">Tweets by CostJalisco</a>
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="timeline"></div>
            <div class="timeline-icon-position"><i class="fab fa-youtube fa-sm"></i></div>
            <iframe width="350" height="280" style="width: 100%;" src="https://www.youtube.com/embed/nd2Bc99HgRE" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 text-center">
            <div class="timeline"></div>
            <div class="timeline-icon-position"><i class="fab fa-facebook-f fa-sm"></i></div>
            <iframe
                src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FCoSTransparency&tabs=timeline&width=350&height=280&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                width="350" height="280" style="border:none;overflow:hidden;" scrolling="no" frameborder="0"
                allowfullscreen="true"
                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        </div>
    </div>
</div>

<!-- Section - Visitas -->
<div class="container py-5 hidden-phone">
    <div class="row line-top-right">
        <div class="border-left-visitantes"></div>
        <div class="col-md-5 text-right pt-4 px-0" style="line-height: 1.1;">
            <br><span style="font-size: 38px;" class="font-weight-bold text-red">Eres el visitante
                número:</span><br>
            <span style="font-size: 14px; color: #58707B;">Actualizado al {{$fecha_update}}</span>
        </div>
        <div class="col-md-7 pt-4">
            <img src="{{ asset('assets/img/home/barra-visitas.jpg') }}" class="img-fluid" alt="">
            <div class="text-white visitantes-counter" style="font-size: 38px;">
                <img src="https://counter8.stat.ovh/private/contadorvisitasgratis.php?c=697yd224qzc47tqjsdxlbnlhb32un2kh"
                    border="0">
            </div>
        </div>
    </div>
    <br>
</div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@if (session('status'))
<!-- <div class="alert alert-success alert-dismissible col-sm-12">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>x</span>
        </button>
    </div> --->
<script>
    Swal.fire({
            icon:'info',
            title:'{{session("status")}}',
            customClass: {
                title: 'modaltitle',
                button:'modalbtn'
            },
            width: '400px'
        })
</script>
@endif

<script>
    // //Ejecutando funciones
    // document.getElementById("icon-search").addEventListener("click", mostrar_buscador);
    // document.getElementById("cover-ctn-search").addEventListener("click", ocultar_buscador);

    //Declarando variables
    // bars_search =       document.getElementById("ctn-bars-search");
    // cover_ctn_search =  document.getElementById("cover-ctn-search");
    //     document.getElementById("icon-menu").addEventListener("click", mostrar_menu);

    // function mostrar_menu(){

    //     document.getElementById("move-content").classList.toggle('move-container-all');
    //     document.getElementById("show-menu").classList.toggle('show-lateral');
    // }

    // //Ejecutando funciones
    // document.getElementById("icon-search").addEventListener("click", mostrar_buscador);
    // document.getElementById("cover-ctn-search").addEventListener("click", ocultar_buscador);

    // //Declarando variables
    // bars_search =       document.getElementById("ctn-bars-search");
    // cover_ctn_search =  document.getElementById("cover-ctn-search");
    inputSearch =       document.getElementById("inputSearch");
    box_search =        document.getElementById("box-search");


    //Funcion para mostrar el buscador
    function mostrar_buscador(){

        bars_search.style.top = "80px";
        cover_ctn_search.style.display = "block";
        inputSearch.focus();

        if (inputSearch.value === ""){
            box_search.style.display = "none";
        }

    }

    //Funcion para ocultar el buscador
    function ocultar_buscador(){

        bars_search.style.top = "-10px";
        cover_ctn_search.style.display = "none";
        inputSearch.value = "";
        box_search.style.display = "none";

    }

    //Creando filtrado de busqueda

    document.getElementById("inputSearch").addEventListener("keyup", buscador_interno);

    function buscador_interno(){


        filter = inputSearch.value.toUpperCase();
        li = box_search.getElementsByTagName("li");

        //Recorriendo elementos a filtrar mediante los "li"
        for (i = 0; i < li.length; i++){

            a = li[i].getElementsByTagName("a")[0];
            textValue = a.textContent || a.innerText;

            if(textValue.toUpperCase().indexOf(filter) > -1){

                li[i].style.display = "";
                box_search.style.display = "block";

                if (inputSearch.value === ""){
                    box_search.style.display = "none";
                }

            }else{
                li[i].style.display = "none";
            }
        }
    }
</script>
@endsection