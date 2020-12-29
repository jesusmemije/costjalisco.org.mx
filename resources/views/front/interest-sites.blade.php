@extends('front.layouts.app')

@section('title')
Sitios de Interés
@endsection

@section('content')

<style>
    dl, ol, ul {
        margin-bottom: 0;
    }
    .mya{
        color: #000000;
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
                    <li><a class="mya" href="https://www.jalisco.gob.mx/">Gobierno del Estado de Jalisco</a></li>
                    <li><a class="mya" href="https://guadalajara.gob.mx/">Ayuntamiento de Guadalajara</a></li>
                    <li><a class="mya" href="https://www.zapopan.gob.mx/v3/">Ayuntamiento de Zapopan</a></li>
                    <li><a class="mya" href="https://tonala.gob.mx/portal/">Ayuntamiento de Tonalá</a></li>
                    <li><a class="mya" href="https://www.itei.org.mx/v4/">Instituto de Transparencia, Información Pública y Protección de Datos <br>
                        Personales del Estado de Jalisco (ITEI) (Preside)</a></li>
                    <li><a class="mya" href="https://home.inai.org.mx/">Instituto Nacional de Transparencia, Acceso a la Información y <br>
                        Protección de Datos Personales (INAI)</a></li>
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
                    <li><a class="mya" href="https://www.udg.mx/">Universidad de Guadalajara (UdeG)</a></li>
                    <li><a class="mya" href="https://www.iteso.mx/">Instituto Tecnológico y de Estudios Superiores de Occidente AC (ITESO)</a></li>
                    <li> <a class="mya" href="https://www.zapopan.gob.mx/v3/">Ayuntamiento de Zapopan</a></li>
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
                    <li><a class="mya" href="https://cmicjalisco.org.mx/">Cámara Mexicana de la Industria de la Construcción Delegación Jalisco <br>
                    (CMIC Jalisco)</a></li>
                    <li><a class="mya" href="https://cicej.org/">Colegio de Ingenieros Civiles del Estado de Jalisco (CICEJ)</a</li>
                    <li><a class="mya" href="http://comceoccte.org.mx/">Consejo Mexicano de Comercio Exterior de Occidente A.C (COMCE)</a></li>
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
                    <li><a class="mya" href="http://cpsjalisco.org/">Comité de Participación Social del Sistema Estatal Anticorrupción (CPS)</a></li>
                    <li><a class="mya" href="http://www.cimtra.org.mx/portal/">Colectivo Ciudadanos por Municipios Transparentes (CIMTRA)</a></li>
                    <li><a class="mya" href="https://www.mexicoevalua.org/">México Evalúa, Centro de Análisis de Políticas Públicas A.C.</a></li>
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
                    <li><a class="mya" target="_blank" href="http://transversalthinktank.org/about">Transversal Think Tank</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@section('scripts')

<script>

$('.mya').attr('target', '_blank');
</script>

@endsection

@endsection