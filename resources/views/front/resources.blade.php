@extends('front.layouts.app')

@section('title')
Recursos
@endsection

@section('content')

<style>
    .title-barra-roja {
        background-image: url("/assets/img/background-rojo.jpg"); 
        background-repeat: no-repeat;
        background-size: cover;
    }
    .subtitle-barra-gris {
        background-image: url("/assets/img/background-gris.jpg"); background-repeat: no-repeat;
        background-size: 500px; 
        padding-left: 6rem; 
        font-size: 24px;
    }
</style>

<!-- Title - Documentos de interés -->
<div class="row mx-0 my-4" id="documentos-interes">
    <div class="col-md-6 px-0">
        <div class="text-center text-white">
            <h3 class="py-2 font-weight-bold title-barra-roja">Documentos de interés</h3>
        </div>
    </div>
</div>

<!-- Sub-Title - Cartas de apoyo -->
<div class="row mx-0 my-4" id="apoyo">
    <div class="col-md-6 px-0">
        <div class="text-white">
            <h3 class="py-2 font-weight-bold subtitle-barra-gris">Cartas de apoyo</h3>
        </div>
    </div>
</div>

<!-- Contenido - Cartas de apoyo -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="listStyle">
                <li>CIMTRA</li>
                <li>CMIC</li>
                <li>COMCE</li>
                <li>CPS</li>
                <li>MARHNOS</li>
            </ul>
        </div>
    </div>
</div>

<!-- Sub-Title - Cartas de intención -->
<div class="row mx-0 my-4" id="intencion">
    <div class="col-md-6 px-0">
        <div class="text-white">
            <h3 class="py-2 font-weight-bold subtitle-barra-gris">Cartas de intención</h3>
        </div>
    </div>
</div>

<!-- Contenido - Cartas de intención -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="listStyle">
                <li>Carta de intención Gobierno del Estado</li>
                <li>Carta de intención Guadalajara</li>
                <li>Carta de intención Tlajomulco</li>
                <li>Carta de intención Tonalá</li>
                <li>Carta de intención Zapopan</li>
            </ul>
        </div>
    </div>
</div>

<!-- Sub-Title - Cartas de aplicación -->
<div class="row mx-0 mt-3" id="aplicacion">
    <div class="col-md-6 px-0">
        <div class="text-white">
            <h3 class="py-2 font-weight-bold subtitle-barra-gris">Cartas de aplicación</h3>
        </div>
    </div>
</div>

<!-- Contenido - Cartas de aplicación -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="listStyle">
                <li>Carta de Aplicación CoST Jalisco</li>
            </ul>
        </div>
    </div>
</div>

<!-- Sub-Title - Cartas de aprobación -->
<div class="row mx-0 mt-3" id="aprobacion">
    <div class="col-md-6 px-0">
        <div class="text-white">
            <h3 class="py-2 font-weight-bold subtitle-barra-gris">Cartas de aprobación</h3>
        </div>
    </div>
</div>

<!-- Contenido - Cartas de aprobación -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="listStyle">
                <li>Carta de Aprobación CoST Jalisco 19/oct/2018</li>
            </ul>
        </div>
    </div>
</div>

<!-- Sub-Title - Plan de trabajo -->
<div class="row mx-0 mt-3" id="plan-trabajo">
    <div class="col-md-6 px-0">
        <div class="text-white">
            <h3 class="py-2 font-weight-bold subtitle-barra-gris">Plan de trabajo</h3>
        </div>
    </div>
</div>

<!-- Contenido - Plan de trabajo -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="listStyle">
                <li>Plan de Trabajo CoST Jalisco</li>
            </ul>
        </div>
    </div>
</div>

<!-- Sub-Title - Actas -->
<div class="row mx-0 mt-3" id="actas">
    <div class="col-md-6 px-0">
        <div class="text-white">
            <h3 class="py-2 font-weight-bold subtitle-barra-gris">Actas</h3>
        </div>
    </div>
</div>

<!-- Contenido - Actas -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="listStyle">
                <li>Acta de Instalación CoST Jalisco</li>
            </ul>
        </div>
    </div>
</div>

<!-- Sub-Title - Informes de aseguramiento -->
<div class="row mx-0 mt-3" id="informes-aseguramiento">
    <div class="col-md-6 px-0">
        <div class="text-white">
            <h3 class="py-2 font-weight-bold subtitle-barra-gris">Informes de aseguramiento</h3>
        </div>
    </div>
</div>

<!-- Contenido - Informes de aseguramiento -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="listStyle">
                <li>Acta de Instalación CoST Jalisco</li>
            </ul>
        </div>
    </div>
</div>

<!-- Sub-Title - Reglamentos -->
<div class="row mx-0 mt-3" id="reglamentos">
    <div class="col-md-6 px-0">
        <div class="text-white">
            <h3 class="py-2 font-weight-bold subtitle-barra-gris">Reglamentos</h3>
        </div>
    </div>
</div>

<!-- Contenido - Reglamentos -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="listStyle">
                <li>Reglamento Interno Iniciativa de Transparencia en Infraestructura Pública "CoST Jalisco"</li>
            </ul>
        </div>
    </div>
</div>

<!-- Sub-Title - Estándares -->
<div class="row mx-0 mt-3" id="estandares">
    <div class="col-md-6 px-0">
        <div class="text-white">
            <h3 class="py-2 font-weight-bold subtitle-barra-gris">Estándares</h3>
        </div>
    </div>
</div>

<!-- Contenido - Estándares -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="listStyle">
                <li>Estandar de indicadores CoST Jalisco</li>
            </ul>
        </div>
    </div>
</div>

<!-- Sub-Title - Mapa de sitio aprobado -->
<div class="row mx-0 mt-3" id="mapa-sitio">
    <div class="col-md-6 px-0">
        <div class="text-white">
            <h3 class="py-2 font-weight-bold subtitle-barra-gris">Mapa de sitio aprobado</h3>
        </div>
    </div>
</div>

<!-- Contenido - Mapa de sitio aprobado -->
<div class="container mb-5">
    <div class="row">
        <div class="col-md-12">
            <ul class="listStyle">
                <li>Mapa de sitio aprobado</li>
            </ul>
        </div>
    </div>
</div>

@endsection