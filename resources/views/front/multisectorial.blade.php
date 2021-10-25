@extends('front.layouts.app')

@section('title')
Nosotros
@endsection

@section('content')

<style>
    .container-img-sector {
        padding: 24px;
    }

    @media only screen and (max-width: 480px) {

        .title-barra-roja {
            width: 90%;
            font-size: 26px;
        }
        #text {
		text-align: justify;
		-webkit-hyphens: auto; /* A día de hoy aún es necesario el prefijo para soportar a Safari */
		hyphens: auto;
	    }
    }
</style>
<!-- Title - Grupo multisectorial-->
<div class="row mx-0">
    <div class="col-md-6 px-0 mt-md-2 mt-4">
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
            <div class="mt-md-5 mt-3" style="letter-spacing: -.2px;">
                <p style="text-align: justify;">
                    El Grupo Multisectorial "GMS" está conformado por instituciones de  
                    Gobierno, del sector privado, del sector académico y de la sociedad civil.
                </p>
                <p style="text-align: justify;">
                    Este grupo, a través de los representantes de cada una de las 
                    instituciones que lo integra, es el responsable de guiar el desarrollo, la 
                    implementación y supervisión de la iniciativa de CoST en Jalisco.</p>
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
            <div class="col-md-12 col-12">
                <h3 class="title-sector">Sector Público
                </h3>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-2 col-3 text-center container-img-sector" style="margin-right: -4%;">
                <img src="{{ asset('assets/img/home/sector-publico/jalisco.jpg') }}" class="img-fluid" width="100"
                    alt="">
            </div>
            <div class="col-md-2 col-3 text-center container-img-sector" style="margin-right: -4%;">
                <img src="{{ asset('assets/img/home/sector-publico/guadalajara.jpg') }}" class="img-fluid" width="70"
                    alt="">
            </div>
            <div class="col-md-2 col-3 text-center container-img-sector" style="margin-right: -4%;">
                <img src="{{ asset('assets/img/home/sector-publico/zapopan.jpg') }}" class="img-fluid" width="70"
                    alt="">
            </div>
            <div class="col-md-2 col-3 text-center container-img-sector" style="margin-right: -4%;">
                <img src="{{ asset('assets/img/home/sector-publico/tonala.jpg') }}" class="img-fluid" width="80" alt="">
            </div>
            <div class="col-md-2 col-3 text-center container-img-sector" style="margin-right: -4%;">
                <img src="{{ asset('assets/img/home/sector-publico/tlajomulco.jpg') }}" class="img-fluid" width="130" alt="">
            </div>
            <div class="col-md-2 col-3 text-center container-img-sector" style="margin-right: -4%;">
                <img src="{{ asset('assets/img/home/sector-publico/inai.jpg') }}" class="img-fluid" width="100" alt="">
            </div>
            <div class="col-md-2 col-3 text-center container-img-sector" style="margin-right: -4%;">
                <img src="{{ asset('assets/img/home/sector-publico/itei.jpg') }}" class="img-fluid" width="100" alt="">
            </div>
        </div>
    </div>
</div>

<!-- Section - Sector Académico-->
<div class="container mt-5">
    <div style="border-left: 5px solid #D60000;">
        <div class="row mb-3">
            <div class="col-md-12">
                <h3 class="text-red title-sector">Sector Académico
                </h3>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-2 col-3 text-center container-img-sector">
                <img src="{{ asset('assets/img/home/sector-academico/udg.jpg') }}" class="img-fluid" width="60" alt="">
            </div>
            <div class="col-md-2 col-3 text-center container-img-sector">
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
                <h3 class="title-sector" style="color: #FFCE32;">Sector Privado
                </h3>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-2 col-3 text-center container-img-sector">
                <img src="{{ asset('assets/img/home/sector-privado/cmic.jpg') }}" class="img-fluid" width="100" alt="">
            </div>
            <div class="col-md-2 col-3 text-center container-img-sector">
                <img src="{{ asset('assets/img/home/sector-privado/cicej.jpg') }}" class="img-fluid" width="100" alt="">
            </div>
            <div class="col-md-2 col-3 text-center container-img-sector">
                <img src="{{ asset('assets/img/home/sector-privado/comce.jpg') }}" class="img-fluid" width="100" alt="">
            </div>
        </div>
    </div>
</div>

<!-- Section - Sociedad Civil Organizada-->
<div class="container mt-5">
    <div style="border-left: 5px solid #61A8BD;">
        <div class="row mb-3">
            <div class="col-md-12">
                <h3 class="title-sector" style="color: #61A8BD;">Sociedad Civil
                    Organizada</h3>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-2 col-3 text-center container-img-sector">
                <img src="{{ asset('assets/img/home/sociedad-civil-organizada/cps.jpg') }}" class="img-fluid"
                    width="100" alt="">
            </div>
            <div class="col-md-2 col-3 text-center container-img-sector">
                <img src="{{ asset('assets/img/home/sociedad-civil-organizada/cimtra.jpg') }}" class="img-fluid"
                    width="100" alt="">
            </div>
            <div class="col-md-2 col-3 text-center container-img-sector">
                <img src="{{ asset('assets/img/home/sociedad-civil-organizada/mexico.jpg') }}" class="img-fluid"
                    width="120" alt="">
            </div>
        </div>
    </div>
</div>

<!-- Section - Aliados Estratégicos-->
<div class="container mt-5" style="margin-bottom:5%">
    <div style="border-left: 5px solid #D8D8CD;">
        <div class="row mb-3">
            <div class="col-md-12">
                <h3 class="title-sector" style="color: #D8D8CD;">Aliados
                    Estratégicos</h3>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-3 col-5 text-center container-img-sector">
                <img src="{{ asset('assets/img/home/aliados-estrategicos/transversal.jpg') }}" class="img-fluid"
                    width="200" alt="">
            </div>
        </div>
    </div>
</div>
@endsection