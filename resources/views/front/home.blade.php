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
    <div class="row" style="margin-left: 0; margin-right: 0;">
        <div class="col-3" style="padding: 0;">
            <div class="card-title">Organizaciones</div>
            <img src="{{ asset('assets/img/indice/org.jpg') }}" class="img-fluid" alt="">
            <div class="card-counter">36</div>
        </div>
        <div class="col-3" style="padding: 0;">
            <div class="card-title">Proyectos de la iniciativa</div>
            <img src="{{ asset('assets/img/indice/proyectos.jpg') }}" class="img-fluid" alt="">
            <div class="card-counter">512</div>
        </div>
        <div class="col-3" style="padding: 0;">
            <div class="card-title">Personas beneficiadas</div>
            <img src="{{ asset('assets/img/indice/personas.jpg') }}" class="img-fluid" alt="">
            <div class="card-counter">521,256</div>
        </div>
        <div class="col-3" style="padding: 0;">
            <div class="card-title">Presupuesto utilizado</div>
            <img src="{{ asset('assets/img/indice/presupuesto.jpg') }}" class="img-fluid" alt="">
            <div class="card-counter">1,025,236</div>
        </div>
    </div>
    <br>
</div>

@endsection