@extends('front.layouts.app')

@section('title')
Inicio
@endsection

@section('content')

<!-- Contenido -->
<div class="main">

<!--MODAL-->
<div class="chatbot text-center">
  

    <img src="{{ asset('assets/img/home/chatbot.png') }}" type="button" 
    class="img-fluid" width="280" alt="Chatbot - Página CoST Jalisco"
    data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Titulo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <div class="modal-body">
        <form>
          
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Mensaje:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>





    
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
    $ruta=asset('assets/img/home/slider-main/'.$h[0]->url);
   
    ?>


                <img src="{{$ruta }}"
                    alt="">
                <div class="container">
                    <div class="carousel-caption">
                        <span class="font-title-carousel font-weight-bold">INFRAESTRUCTURA</span>
                        <span class="font-title-carousel">VALORADA</span>
                    </div>
                </div>
            </div>

            @for ($i = 1; $i < sizeof($h); $i++)
            <div class="carousel-item">
            <?php 
    $ruta=asset('assets/img/home/slider-main/'.$h[$i]->url);
    
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
                <h3 class="text-center font-weight-bold">NOSOTROS</h3>
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
                <h6 class="text-muted">Actualizado al 25/Nov/2020</h6>
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
                <span><a href="https://infrastructuretransparency.org/" class="ver-mas-font" target="_BLANK">Ver más:
                        https://infrastructuretransparency.org/</a></span>
            </div>
        </div>
    </div>

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
                <a href="{{ route('organizations') }}">
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
                    <h3 style="font-size: 30px; font-weight: 700; margin-left: 30px;">Sector Público
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
                    <h3 class="text-red" style="font-size: 30px; font-weight: 700; margin-left: 30px;">Sector Académico
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
                <a href="{{route('card-projects')}}">
                    <h3 class="text-center font-weight-bold" style="color: #2C4143;">PROYECTOS</h3>
                </a>
                <div class="section-divider"></div>
            </div>
        </div>
    </div>

    <!-- Section - Carousel proyectos -->
    <div class="row mx-0">
        <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12 px-0">
            <div id="carouselProjects" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                    @foreach ($projects as $project)

                    <div class="carousel-item @if($loop->first) active @endif" style="background-color: #D8D8CD;">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('assets/img/home/slider-proyectos/aguas-pluviales.jpg') }}"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="col-md-8">
                                <h2 class="font-weight-bold my-4 text-red">{{ $project->title }}</h2>
                                <div class="row">
                                    <div class="col-md-6" style="border-right: 1px solid #777;">
                                        <p>
                                            {{ $project->description }}
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
                                        <span><a href="{{ route('project-single', $project->id) }}" class="text-red"
                                                style="font-size: 18px; font-weight: 700; font-style: italic;">Ver
                                                más <span style="letter-spacing: -4px">>></span></a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="rectangulo-rojo-avance-carousel text-white"><span
                                    style="font-size: 32px;"><strong>100%</strong></span><span style="font-size: 14px;"
                                    class="mx-2">completado</span></div>
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
    <div class="row mx-0 my-4 align-items-center">
        <div class="col-md-12 px-0">
            <img src="{{ asset('assets/img/home/box-newsletter.jpg') }}" class="img-fluid"
                alt="Newsletter - CoST Jalisco">
            <div class="form-newsletter">
                <form action="">
                    <h6 style="font-size: 16px; font-weight: 600;" class="mb-3">¡Regístrate para seguir próximos
                        proyectos!</h6>
                    <input type="email" id="email" name="email" placeholder="Tu correo aquí" class="input-newsletter" required>
                    <button class="btn-newsletter mt-3">SUSCRIBIRSE</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Título - Nuestras redes-->
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center font-weight-bold">NUESTRAS REDES
                </h3>
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
                <a class="twitter-timeline" data-lang="es" data-height="280" data-theme="light"
                    href="https://twitter.com/CostJalisco?ref_src=twsrc%5Etfw">Tweets by CostJalisco</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <div class="col-md-4">
                <div class="timeline"></div>
                <div class="timeline-icon-position"><i class="fab fa-youtube fa-sm"></i></div>
                <iframe width="350" height="280" src="https://www.youtube.com/embed/nd2Bc99HgRE" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <div class="col-md-4">
                <div class="timeline"></div>
                <div class="timeline-icon-position"><i class="fab fa-facebook-f fa-sm"></i></div>
                <iframe
                    src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FCoSTransparency&tabs=timeline&width=350&height=280&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                    width="350" height="280" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                    allowfullscreen="true"
                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
        </div>
    </div>

    <!-- Section - Visitas -->
    <div class="container py-5">
        <div class="row line-top-right">
            <div class="border-left-visitantes"></div>
            <div class="col-md-5 text-right pt-4 px-0" style="line-height: 1.1;">
                <br><span style="font-size: 38px;" class="font-weight-bold text-red">Eres el visitante
                    número:</span><br>
                <span style="font-size: 14px; color: #58707B;">Actualizado al 27 de Noviembre de 2020</span>
            </div>
            <div class="col-md-7 pt-4">
                <img src="{{ asset('assets/img/home/barra-visitas.jpg') }}" class="img-fluid" alt="">
                <div class="text-white visitantes-counter" style="font-size: 38px;">
                    <img src="https://counter8.stat.ovh/private/contadorvisitasgratis.php?c=697yd224qzc47tqjsdxlbnlhb32un2kh"
                        border="0"></a>
                </div>
            </div>
        </div>
        <br>
    </div>
</div>
@endsection

@section('scripts')

<script>
    function showEventosAgenda() {
    var eventosAgenda = document.getElementById("panel-oculto");
    if (eventosAgenda.style.display === "none") {
        eventosAgenda.style.display = "block";  
    } else {
        eventosAgenda.style.display = "none";        
    }
}

</script>
@endsection