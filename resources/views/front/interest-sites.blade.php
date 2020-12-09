@extends('front.layouts.app')

@section('title')
Sitios de Interés
@endsection

@section('content')

<style>
    dl, ol, ul {
        margin-bottom: 0;
    }
</style>

<!-- Title - Sitios de interés -->
<div class="row mx-0 my-4" id="sitios-interes">
    <div class="col-md-6 px-0">
        <div class="text-center text-white">
            <h3 class="py-2 font-weight-bold title-barra-roja">Sitios de interés</h3>
        </div>
    </div>
</div>

<!-- Section - Sector público-->
<div class="container mt-4">
    <div style="border-left: 5px solid #2C4143;">
        <div class="row mb-3">
            <div class="col-md-12">
                <h3 style="font-size: 30px; font-weight: 700; margin-left: 30px;">Sector Público
                </h3>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <ul>
                    <li>Gobierno del Estado de Jalisco</li>
                    <li>Ayuntamiento de Guadalajara</li>
                    <li>Ayuntamiento de Zapopan</li>
                    <li>Ayuntamiento de Tonalá</li>
                    <li>Instituto de Transparencia, Información Pública y Protección de Datos <br>
                        Personales del Estado de Jalisco (ITEI) (Preside)</li>
                    <li>Instituto Nacional de Transparencia, Acceso a la Información y <br>
                        Protección de Datos Personales (INAI)</li>
                </ul>
            </div>
        </div>
    </div>
    <div style="border-left: 5px solid #D60000;">
        <div class="row mb-3">
            <div class="col-md-12">
                <h3 style="color:#D60000; font-size: 30px; font-weight: 700; margin-left: 30px;">Sector Académico
                </h3>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <ul>
                    <li>Universidad de Guadalajara (UdeG)</li>
                    <li>Instituto Tecnológico y de Estudios Superiores de Occidente AC (ITESO)</li>
                    <li>Ayuntamiento de Zapopan</li>
                </ul>
            </div>
        </div>
    </div>
    <div style="border-left: 5px solid #FFCE32;">
        <div class="row mb-3">
            <div class="col-md-12">
                <h3 style="color: #FFCE32; font-size: 30px; font-weight: 700; margin-left: 30px;">Sector Privado
                </h3>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <ul>
                    <li>Cámara Mexicana de la Industria de la Construcción Delegación Jalisco <br>
                    (CMIC Jalisco)</li>
                    <li>Colegio de Ingenieros Civiles del Estado de Jalisco (CICEJ)</li>
                    <li>Consejo Mexicano de Comercio Exterior de Occidente A.C (COMCE)</li>
                </ul>
            </div>
        </div>
    </div>
    <div style="border-left: 5px solid #61A8BD;">
        <div class="row mb-3">
            <div class="col-md-12">
                <h3 style="color: #61A8BD; font-size: 30px; font-weight: 700; margin-left: 30px;">Sociedad Civil Organizada
                </h3>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <ul>
                    <li>Comité de Participación Social del Sistema Estatal Anticorrupción (CPS)</li>
                    <li>Colectivo Ciudadanos por Municipios Transparentes (CIMTRA)</li>
                    <li>México Evalúa, Centro de Análisis de Políticas Públicas A.C.</li>
                </ul>
            </div>
        </div>
    </div>
    <div style="border-left: 5px solid #D8D8CD;">
        <div class="row mb-3">
            <div class="col-md-12">
                <h3 style="color: #D8D8CD; font-size: 30px; font-weight: 700; margin-left: 30px;">Aliados Estratégicos
                </h3>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <ul>
                    <li>Transversal Think Tank</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection