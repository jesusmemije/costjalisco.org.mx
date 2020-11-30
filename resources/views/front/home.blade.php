@extends('front.layouts.app')

@section('title')
Home
@endsection

@section('content')

<!-- Contenido -->
<div class="main">

    <!-- Section - Carousel main -->
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

    <!-- Btn Agenda -->
    <div class="btn-agenda">
        <a href="#">
            <img src="{{ asset('assets/img/home/btn-eventos.png') }}" class="img-fluid" alt="Agenda CoST Jalisco">
        </a>
    </div>

    <!-- Título - Nosotros -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center font-weight-bold" style="color: #2C4143; letter-spacing: 1px;">NOSOTROS</h3>
                <div class="section-divider"></div>
            </div>
        </div>
    </div>

    <!-- Section - Índices -->
    <div class="row mx-0">
        <div class="col-3 px-0">
            <div class="card-indice-title">Organizaciones</div>
            <img src="{{ asset('assets/img/home/indices/org.jpg') }}" class="img-fluid" alt="Indice de organizaciones">
            <div class="card-indice-counter">36</div>
        </div>
        <div class="col-3 px-0">
            <div class="card-indice-title">Proyectos de la iniciativa</div>
            <img src="{{ asset('assets/img/home/indices/proyectos.jpg') }}" class="img-fluid" alt="Indice de proyectos">
            <div class="card-indice-counter">512</div>
        </div>
        <div class="col-3 px-0">
            <div class="card-indice-title">Personas beneficiadas</div>
            <img src="{{ asset('assets/img/home/indices/personas.jpg') }}" class="img-fluid" alt="Indice de personas">
            <div class="card-indice-counter">521,256</div>
        </div>
        <div class="col-3 px-0">
            <div class="card-indice-title">Presupuesto utilizado</div>
            <img src="{{ asset('assets/img/home/indices/presupuesto.jpg') }}" class="img-fluid"
                alt="Indice de presupuesto">
            <div class="card-indice-counter">1,025,236</div>
        </div>
    </div>

    <!-- Label de actuaización -->
    <div class="row mx-0">
        <div class="col-md-12">
            <div class="text-right mt-3 mb-3">
                <h6 style="color: #58707B;">Actualizado al 25/Nov/2020</h6>
            </div>
        </div>
    </div>

    <!-- Title - ¿Qúes es CoST? -->
    <div class="row mx-0">
        <div class="col-md-6 px-0 mb-5">
            <div class="text-center text-white">
                <h3 class="py-2 font-weight-bold" style='background-image: url("/assets/img/home/background-rojo.jpg"); background-repeat: no-repeat;
                background-size: cover;'>¿Qué es CoST?</h3>
            </div>
        </div>
    </div>

    <!-- Section - Descripción CoST -->
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="border-right: 1px solid #D60000;">
                <div class="my-4" style="color: #2C4143; letter-spacing: -.4px; font-weight: 600;">
                    <p>
                        La iniciativa de Transparencia en Infraestructura <strong>[Construction <br>
                            Sector Transparency Initiative] o "CoST" por sus siglas en <br>
                            inglés,</strong> es la encargada de promover la transparencia y la <br>
                        rendición de cuentas dentro de las diferentes etapas de los <br>
                        proyectos de infraestructura y obra pública.
                    </p>
                    <p>
                        Actualmente, tiene presencia en 19 países distribuidos en <br>
                        cuatro continentes, donde trabaja directamente con el Gobierno, <br>
                        la sociedad civil y la industria del ramo de la contrucción para <br>
                        promover la divulgación, validación e interpretación de datos de <br>
                        proyectos de infraestructura y obra pública.
                    </p>
                    <br>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <br><br>
                <img src="{{ asset('assets/img/header/vector-ciudad.png') }}" class="img-fluid" width="460" alt="">
                <br><br>
                <span><a href="#" style="color: #D60000; font-size: 18px; font-weight: 700; font-style: italic;">Ver
                        más: https://infrastructuretransparency.org/</a></span>
            </div>
        </div>
    </div>

    <!-- Title - Grupo multisectorial-->
    <div class="row mx-0">
        <div class="col-md-6 px-0 mt-2">
            <div class="text-center text-white">
                <h3 class="py-2 font-weight-bold" style='background-image: url("/assets/img/home/background-rojo.jpg"); background-repeat: no-repeat;
                background-size: cover;'>Grupo Multisectorial</h3>
            </div>
        </div>
        <div class="col-md-6">
            <div class="line-red-center"></div>
        </div>
    </div>

    <!-- Section - Descripción Grupo multisectorial-->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7" style="border-right: 1px solid #D60000;">
                <div class="mt-5" style="color: #2C4143; letter-spacing: -.4px; font-weight: 600;">
                    <p>
                        El Grupo Multisectorial "GMS" está conformado por instituciones de <br>
                        Gobierno, del sector privado, del sector académico y de la sociedad civil.
                    </p>
                    <p>
                        Este grupo, a través de los representantes de cada una de las <br>
                        instituciones que lo integra, es el responsable de guiar el desarrollo, la <br>
                        implementación y supervisión de la iniciativa de CoST en Jalisco.
                    </p>
                </div>
            </div>
            <div class="col-md-5 text-center">
                <a href="#">
                    <img src="{{ asset('assets/img/home/mas-info.png') }}" class="img-fluid" width="240" alt="">
                </a>
            </div>
        </div>
    </div>

    <!-- Section - Sector público-->
    <div class="container mt-5">
        <div style="border-left: 5px solid #2C4143;">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3 style="color: #2C4143; font-size: 30px; font-weight: 700; margin-left: 30px;">Sector Público
                    </h3>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-publico/jalisco.jpg') }}" class="img-fluid" width="100"
                        alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-publico/guadalajara.jpg') }}" class="img-fluid"
                        width="70" alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-publico/zapopan.jpg') }}" class="img-fluid" width="70"
                        alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-publico/tonala.jpg') }}" class="img-fluid" width="80"
                        alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-publico/inai.jpg') }}" class="img-fluid" width="100"
                        alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-publico/itei.jpg') }}" class="img-fluid" width="100"
                        alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Section - Sector Académico-->
    <div class="container mt-5">
        <div style="border-left: 5px solid #D60000;">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3 style="color: #D60000; font-size: 30px; font-weight: 700; margin-left: 30px;">Sector Académico
                    </h3>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-academico/udg.jpg') }}" class="img-fluid" width="60"
                        alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-academico/iteso.jpg') }}" class="img-fluid" width="50"
                        alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Section - Sector Privado-->
    <div class="container mt-5">
        <div style="border-left: 5px solid #FFCE32;">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3 style="color: #FFCE32; font-size: 30px; font-weight: 700; margin-left: 30px;">Sector Privado
                    </h3>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-privado/cmic.jpg') }}" class="img-fluid" width="100"
                        alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-privado/cicej.jpg') }}" class="img-fluid" width="100"
                        alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-privado/comce.jpg') }}" class="img-fluid" width="100"
                        alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Section - Sociedad Civil Organizada-->
    <div class="container mt-5">
        <div style="border-left: 5px solid #61A8BD;">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3 style="color: #61A8BD; font-size: 30px; font-weight: 700; margin-left: 30px;">Sociedad Civil
                        Organizada</h3>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sociedad-civil-organizada/cps.jpg') }}" class="img-fluid"
                        width="100" alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sociedad-civil-organizada/cimtra.jpg') }}" class="img-fluid"
                        width="100" alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sociedad-civil-organizada/mexico.jpg') }}" class="img-fluid"
                        width="120" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Section - Aliados Estratégicos-->
    <div class="container mt-5">
        <div style="border-left: 5px solid #D8D8CD;">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3 style="color: #D8D8CD; font-size: 30px; font-weight: 700; margin-left: 30px;">Aliados
                        Estratégicos</h3>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-3 text-center">
                    <img src="{{ asset('assets/img/home/aliados-estrategicos/transversal.jpg') }}" class="img-fluid"
                        width="200" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Título - Proyectos-->
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center font-weight-bold" style="color: #2C4143; letter-spacing: 1px;">PROYECTOS</h3>
                <div class="section-divider"></div>
            </div>
        </div>
    </div>

    <!-- Section - Carousel proyectos -->
    <div class="row mx-0">
        <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12 px-0">
            <div id="carouselProjects" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="background-color: #D8D8CD;">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('assets/img/home/slider-proyectos/tren-ligero.jpg') }}"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="col-md-8">
                                <h2 class="font-weight-bold my-4" style="color:#D60000">LÍNEA 3 DEL TREN LIGERO EN
                                    GUADALAJARA</h2>
                                <div class="row" style="color:#2C4143">
                                    <div class="col-md-6" style="border-right: 1px solid #777;">
                                        <p>
                                            Dará servicio a 240 mil pasajeros al día mediante <br>
                                            18 estaciones y 16 trenes para su servicio, <br>
                                            además de 7,000 empleos directos y 15 mil <br>
                                            indirectos.
                                        </p>
                                        <p>
                                            Conectando gran parte de la ciudad desde <br>
                                            Tlaquepaque hasta Tesistán.
                                        </p>
                                    </div>
                                    <div class="col-md-6 pl-4">
                                        <p><img src="{{ asset('assets/img/home/slider-proyectos/icons/dinero.png') }}"
                                                class="img-fluid icon-img-carousel" alt="">
                                            <strong>&nbsp; Inversión: </strong> 20 mil millones de pesos</p>
                                        <p><img src="{{ asset('assets/img/home/slider-proyectos/icons/reloj.png') }}"
                                                class="img-fluid icon-img-carousel" alt="">
                                            <strong>&nbsp; Periodo de construcción: </strong> 2014-2020</p>
                                        <p><img src="{{ asset('assets/img/home/slider-proyectos/icons/ubicacion.png') }}"
                                                class="img-fluid icon-img-carousel" alt="">
                                            <strong>&nbsp; Ubicación: </strong> Zapopan, Guadalajara, Tlaquepaque.</p>
                                        <p><img src="{{ asset('assets/img/home/slider-proyectos/icons/usuarios.png') }}"
                                                class="img-fluid icon-img-carousel" alt="">
                                            <strong>&nbsp; Beneficiarios: </strong> 240 mil pasajeros al día</p>
                                        <br>
                                        <span><a href="#" style="color: #D60000; font-size: 18px; font-weight: 700; font-style: italic;">Ver más <span style="letter-spacing: -4px">>></span></a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="rectangulo-rojo-avance-carousel text-white"><span
                                    style="font-size: 32px;"><strong>100%</strong></span><span style="font-size: 14px;"
                                    class="mx-2">completado</span></div>
                        </div>
                    </div>
                    <div class="carousel-item" style="background-color: #D8D8CD;">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('assets/img/home/slider-proyectos/aguas-pluviales.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-md-8">
                                <h2 class="font-weight-bold my-4" style="color:#D60000">REVESTIMIENTO Y SANEAMIENTO DEL
                                    CANAL DE AGUAS PLUVIALES</h2>
                                <div class="row" style="color:#2C4143">
                                    <div class="col-md-6" style="border-right: 1px solid #777;">
                                        <p>
                                            El proyecto de infraestructura con nombre: <br>
                                            "Revestimiento y saneamiento del canal en la Calle Arroyo" <br>
                                            El objetivo es el revestimiento y saneamiento del <br>
                                            canal de aguas pluviales que se encuentra en la <br>
                                            Calle Arroyo entre Calle Platino y Cantera, en la <br>
                                            Colonia Mariano Otero, municipio de Zapopan, <br>
                                            Jalisco. El proyecto cuenta con indicador de <br>
                                            impacto ambiental.
                                        </p>
                                    </div>
                                    <div class="col-md-6 pl-4">
                                        <p><img src="{{ asset('assets/img/home/slider-proyectos/icons/dinero.png') }}"
                                                class="img-fluid icon-img-carousel" alt="">
                                            <strong>&nbsp; Inversión: </strong> $57,1857.77</p>
                                        <p><img src="{{ asset('assets/img/home/slider-proyectos/icons/reloj.png') }}"
                                                class="img-fluid icon-img-carousel" alt="">
                                            <strong>&nbsp; Periodo de construcción: </strong> 63 días</p>
                                        <p><img src="{{ asset('assets/img/home/slider-proyectos/icons/ubicacion.png') }}"
                                                class="img-fluid icon-img-carousel" alt="">
                                            <strong>&nbsp; Ubicación: </strong> Calle Platino y Cantera, en la Colonia
                                            <br> Marino Otero, municipio de Zapopan <br>Jalisco</p>
                                        <p><img src="{{ asset('assets/img/home/slider-proyectos/icons/usuarios.png') }}"
                                                class="img-fluid icon-img-carousel" alt="">
                                            <strong>&nbsp; Beneficiarios: </strong> 26.450 ciudadanos</p>
                                        <br>
                                        <span><a href="#"
                                                style="color: #D60000; font-size: 18px; font-weight: 700; font-style: italic;">
                                                Ver más <span style="letter-spacing: -4px">>></span></a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="rectangulo-rojo-avance-carousel text-white"><span
                                    style="font-size: 32px;"><strong>100%</strong></span><span style="font-size: 14px;"
                                    class="mx-2">completado</span></div>
                        </div>
                    </div>
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
    <div class="row mx-0 my-4 align-items-center">
        <div class="col-md-12 px-0">
            <img src="{{ asset('assets/img/home/box-newsletter.jpg') }}" class="img-fluid"
                alt="Newsletter - CoST Jalisco">
            <div class="form-newsletter">
                <form action="">
                    <h6 style="font-size: 16px; font-weight: 600;" class="mb-3">¡Regístrate para seguir próximos
                        proyectos!</h6>
                    <input type="text" id="email" name="email" placeholder="Tu correo aquí" class="input-newsletter">
                    <button class="btn-newsletter mt-3">SUSCRIBIRSE</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Título - Nuestras redes-->
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center font-weight-bold" style="color: #2C4143; letter-spacing: 1px;">NUESTRAS REDES</h3>
                <div class="section-divider"></div>
            </div>
        </div>
    </div>
    
    <!-- Section - Timeline redes sociales -->
    <div class="container pb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="timeline"></div>
                <div class="timeline-icon-position"><i class="fab fa-twitter fa-sm"></i></div>
                <a class="twitter-timeline" data-lang="es" data-height="280" data-theme="light" href="https://twitter.com/JesusMemije_?ref_src=twsrc%5Etfw">Tweets by JesusMemije_</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
            </div>
            <div class="col-md-4">
                <div class="timeline"></div>
                <div class="timeline-icon-position"><i class="fab fa-youtube fa-sm"></i></div>
                <iframe width="350" height="280" src="https://www.youtube.com/embed/VWO3nEuWo4k?start=61" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-md-4">
                <div class="timeline"></div>
                <div class="timeline-icon-position"><i class="fab fa-facebook-f fa-sm"></i></div>
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fweb.facebook.com%2FParaReflexiones%2F&tabs=timeline&width=340&height=300&small_header=false&adapt_container_width=true&hide_cover=true&show_facepile=true&appId" width="350" height="280" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
        </div>
    </div>

    <!-- Section - Visitas -->
    <div class="container py-5">
        <div class="row line-top-right">
            <div class="border-left-visitantes"></div>
            <div class="col-md-5 text-right pt-4 px-0" style="line-height: 1.1;">
                <br><span style="font-size: 38px; color: #D60000;" class="font-weight-bold">Eres el visitante número:</span><br>
                <span style="font-size: 14px; color: #58707B;">Actualizado al 27 de Noviembre de 2020</span>
            </div>
            <div class="col-md-7 pt-4">
                <img src="{{ asset('assets/img/home/barra-visitas.jpg') }}" class="img-fluid" alt="">
                <div class="text-white visitantes-counter" style="font-size: 38px;"><strong>425,263</strong></div>
            </div>
        </div>
        <br>
    </div>

</div>

@endsection