@extends('front.layouts.app')

@section('title')
Home
@endsection

@section('content')

<div id="main">
    <div id="carouselHome" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselHome" data-slide-to="0" class="active"></li>
            <li data-target="#carouselHome" data-slide-to="1"></li>
            <li data-target="#carouselHome" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/slider/matute.jpg') }}" alt="Puente Matute Remus, Guadalajara Jalisco">
                <div class="container">
                    <div class="carousel-caption">
                        <span class="font-title-corousel font-weight-bold">INFRAESTRUCTURA</span>
                        <span class="font-title-corousel">VALORADA</span>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/slider/rotonda.jpg') }}" alt="">
                <div class="container">
                    <div class="carousel-caption">
                        <span class="font-title-corousel font-weight-bold">INFRAESTRUCTURA</span>
                        <span class="font-title-corousel">VALORADA</span>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/slider/macro.jpg') }}" alt="">
                <div class="container">
                    <div class="carousel-caption">
                        <span class="font-title-corousel font-weight-bold">INFRAESTRUCTURA</span>
                        <span class="font-title-corousel">VALORADA</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center font-weight-bold" style="color: #2C4143; letter-spacing: 1px;">NOSOTROS</h3>
                <div class="section-divider"></div>
            </div>
        </div>
    </div>
    <div class="row mx-0">
        <div class="col-3 px-0">
            <div class="card-title">Organizaciones</div>
            <img src="{{ asset('assets/img/home/indices/org.jpg') }}" class="img-fluid" alt="Indice de organizaciones">
            <div class="card-counter">36</div>
        </div>
        <div class="col-3 px-0">
            <div class="card-title">Proyectos de la iniciativa</div>
            <img src="{{ asset('assets/img/home/indices/proyectos.jpg') }}" class="img-fluid" alt="Indice de proyectos">
            <div class="card-counter">512</div>
        </div>
        <div class="col-3 px-0">
            <div class="card-title">Personas beneficiadas</div>
            <img src="{{ asset('assets/img/home/indices/personas.jpg') }}" class="img-fluid" alt="Indice de personas">
            <div class="card-counter">521,256</div>
        </div>
        <div class="col-3 px-0">
            <div class="card-title">Presupuesto utilizado</div>
            <img src="{{ asset('assets/img/home/indices/presupuesto.jpg') }}" class="img-fluid" alt="Indice de presupuesto">
            <div class="card-counter">1,025,236</div>
        </div>
    </div>
    <div class="row mx-0">
        <div class="col-md-12">
            <div class="text-right mt-3 mb-3">
                <h6 style="color: #58707B;">Actualizado al 25/Nov/2020</h6>
            </div>
        </div>
    </div>
    <div class="row mx-0">
        <div class="col-md-6 px-0 mb-5">
            <div class="text-center text-white">
                <h3 class="py-2 font-weight-bold" style='background-image: url("/assets/img/home/background-rojo.jpg"); background-repeat: no-repeat;
                background-size: cover;'>¿Qué es CoST?</h3>
            </div>
        </div>
    </div>
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
                <span><a href="#" style="color: #D60000; font-size: 18px; font-weight: 700; font-style: italic;">Ver más: https://infrastructuretransparency.org/</a></span>
            </div>
        </div>
    </div>
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
    <div class="container mt-5">
        <div style="border-left: 5px solid #2C4143;">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3 style="color: #2C4143; font-size: 30px; font-weight: 700; margin-left: 30px;">Sector Público</h3>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-publico/jalisco.jpg') }}" class="img-fluid" width="100" alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-publico/guadalajara.jpg') }}" class="img-fluid" width="70" alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-publico/zapopan.jpg') }}" class="img-fluid" width="70" alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-publico/tonala.jpg') }}" class="img-fluid" width="80" alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-publico/inai.jpg') }}" class="img-fluid" width="100" alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-publico/itei.jpg') }}" class="img-fluid" width="100" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div style="border-left: 5px solid #D60000;">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3 style="color: #D60000; font-size: 30px; font-weight: 700; margin-left: 30px;">Sector Académico</h3>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-academico/udg.jpg') }}" class="img-fluid" width="60" alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-academico/iteso.jpg') }}" class="img-fluid" width="50" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div style="border-left: 5px solid #FFCE32;">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3 style="color: #FFCE32; font-size: 30px; font-weight: 700; margin-left: 30px;">Sector Privado</h3>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-privado/cmic.jpg') }}" class="img-fluid" width="100" alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-privado/cicej.jpg') }}" class="img-fluid" width="100" alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-privado/comce.jpg') }}" class="img-fluid" width="100" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div style="border-left: 5px solid #61A8BD;">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3 style="color: #61A8BD; font-size: 30px; font-weight: 700; margin-left: 30px;">Sociedad Civil Organizada</h3>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sociedad-civil-organizada/cps.jpg') }}" class="img-fluid" width="100" alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sociedad-civil-organizada/cimtra.jpg') }}" class="img-fluid" width="100" alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sociedad-civil-organizada/mexico.jpg') }}" class="img-fluid" width="120" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div style="border-left: 5px solid #D8D8CD;">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3 style="color: #D8D8CD; font-size: 30px; font-weight: 700; margin-left: 30px;">Aliados Estratégicos</h3>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-3 text-center">
                    <img src="{{ asset('assets/img/home/aliados-estrategicos/transversal.jpg') }}" class="img-fluid" width="200" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-12">
                <!--<h3 class="text-center font-weight-bold" style="color: #2C4143; letter-spacing: 1px;">PROYECTOS</h3>
                <div class="section-divider"></div>-->
            </div>
        </div>
    </div>
</div>

@endsection