@extends('front.layouts.app')

@section('title')
Recursos
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset("assets/css/resources.css")}}">
@endsection

@section('content')

<!-- Title - Documentos de interés -->
<div class="row mx-0 my-4" id="documentos-interes">
    <div class="col-lg-7 col-md-10 col-sm-10 px-0">

        <div class="text-center text-white">
            <h3 class="py-2 font-weight-bold title-barra-roja">Documentos de interés</h3>
        </div>
    </div>
</div>

<!-- Sub-Title - Cartas de apoyo -->
<div class="row mx-0 my-4" id="apoyo">
    <div class="col-lg-6 col-md-9 col-sm-9 px-0">
        <div class="text-white" id="cartaapoyo">
            <h3 class="py-2 font-weight-bold subtitle-barra-gris">Cartas de apoyo</h3>
        </div>
    </div>
</div>

<!-- Contenido - Cartas de apoyo -->
<div class="row mx-0">
    <div class="col-md-1 px-0"></div>
    <div class="col-lg-2 col-md-3 col-6 text-center mb-3 px-0">
        <a href="https://www.itei.org.mx/cost/docs/cartas_apoyo/Carta_Apoyo_CIMTRA.pdf" class="links-doc" target="_blank">
            <img width="160px" src="{{ asset('assets/img/resources/1-cimtra.png') }}">
        </a>
    </div>
    <div class="col-lg-2 col-md-3 col-6 text-center mb-3 px-0">
        <a href="https://www.itei.org.mx/cost/docs/cartas_apoyo/Carta_Apoyo_CMIC.pdf" class="links-doc" target="_blank">
            <img width="160px" src="{{ asset('assets/img/resources/2-cmic.png') }}">
        </a>
    </div>
    <div class="col-lg-2 col-md-3 col-6 text-center mb-3 px-0">
        <a href="https://www.itei.org.mx/cost/docs/cartas_apoyo/Carta_Apoyo_COMCE.pdf" class="links-doc" target="_blank">
            <img width="160px" src="{{ asset('assets/img/resources/3-comce.png') }}">
        </a>
    </div>
    <div class="col-lg-2 col-md-3 col-6 text-center mb-3 px-0">
        <a href="https://www.itei.org.mx/cost/docs/cartas_apoyo/Carta_Apoyo_CPS.pdf" class="links-doc" target="_blank">
            <img width="160px" src="{{ asset('assets/img/resources/4-cps.png') }}">
        </a>
    </div>
    <div class="col-lg-2 col-md-3 col-6 text-center mb-3 px-0">
        <a href="https://www.itei.org.mx/cost/docs/cartas_apoyo/Carta_Apoyo_MARHNOS.pdf" class="links-doc" target="_blank">
            <img width="160px" src="{{ asset('assets/img/resources/5-marhno.png') }}">
        </a>
    </div>
    <div class="col-md-1 px-0"></div>
</div>

<!-- Sub-Title - Cartas de intención -->
<div class="row mx-0 my-4" id="intencion">
    <div class="col-lg-6 col-md-9 col-sm-9 px-0">
        <div class="text-white" id="cartaintencion">
            <h3 class="py-2 font-weight-bold subtitle-barra-gris">Cartas de intención</h3>
        </div>
    </div>
</div>
<!-- Contenido - Cartas de intención -->
<div class="row mx-0">
    <div class="col-md-1"></div>
    <div class="col-lg-2 col-md-3 col-6 text-center mb-3 px-0">
        <a href="https://www.itei.org.mx/cost/docs/cartas_intencion/Carta_intencion_Gob_del_Estado.pdf" class="links-doc" target="_blank">
            <img width="160px" src="{{ asset('assets/img/resources/carta-intencion-jalisco.png') }}">
        </a>
    </div>
    <div class="col-lg-2 col-md-3 col-6 text-center mb-3 px-0">
        <a href="https://www.itei.org.mx/cost/docs/cartas_intencion/Carta_intencion_Guadalajara.pdf" class="links-doc" target="_blank">
            <img width="160px" src="{{ asset('assets/img/resources/carta-intencion-gdl.png') }}">
        </a>
    </div>
    <div class="col-lg-2 col-md-3 col-6 text-center mb-3 px-0">
        <a href="https://www.itei.org.mx/cost/docs/cartas_intencion/Carta_intencion_Tlajomulco.pdf" class="links-doc" target="_blank">
            <img width="160px" src="{{ asset('assets/img/resources/carta-intencion-tlajomulco.png') }}">
        </a>
    </div>

    <div class="col-lg-2 col-md-3 col-6 text-center mb-3 px-0">
        <a href="https://www.itei.org.mx/cost/docs/cartas_intencion/Carta_intencion_Tonala.pdf" class="links-doc" target="_blank">
            <img width="160px" src="{{ asset('assets/img/resources/carta-intencion-tonala.png') }}">
        </a>
    </div>

    <div class="col-lg-2 col-md-3 col-6 text-center mb-3 px-0">
        <a href="https://www.itei.org.mx/cost/docs/cartas_intencion/Carta_intencion_Zapopan.pdf" class="links-doc" target="_blank">
            <img width="160px" src="{{ asset('assets/img/resources/carta-intencion-zapopan.png') }}">
        </a>
    </div>
    <div class="col-md-1"></div>
</div>

<!-- Sub-Title - Cartas de aplicación -->
<div class="row mx-0 mt-3" id="aplicacion">
    <div class="col-lg-6 col-md-9 col-sm-9 px-0">
        <div class="text-white" id="cartaaplicacion">
            <h3 class="py-2 font-weight-bold subtitle-barra-gris">Cartas de aplicación</h3>
        </div>
    </div>
</div>

<!-- Contenido - Cartas de aplicación -->
<div class="row mx-0">
    <div class="col-md-1 col-1"></div>
    <div class="col-lg-3 col-md-3 col-6 text-center mb-3 px-0">
        <a href="https://www.itei.org.mx/cost/docs/Carta_Aplicacion_CoST_Jalisco.pdf" class="links-doc" target="_blank">
            <img class="img-fluid" src="{{ asset('assets/img/resources/carta-aplicacion-cost.png') }}">
        </a>
    </div>
</div>                    

<!-- Sub-Title - Cartas de aprobación -->
<div class="row mx-0 mt-3" id="aprobacion">
    <div class="col-lg-6 col-md-9 col-sm-9 px-0">
        <div class="text-white" id="cartaaprobacion">
            <h3 class="py-2 font-weight-bold subtitle-barra-gris">Cartas de aprobación</h3>
        </div>
    </div>
</div>

<!-- Contenido - Cartas de aprobación -->

<div class="row mx-0">
    <div class="col-md-1 col-1"></div>
    <div class="col-lg-3 col-md-3 col-6 text-center mb-3 px-0">
        <a href="https://www.itei.org.mx/cost/docs/Carta_Aprobacion_CoST_Jalisco_181019.pdf" class="links-doc" target="_blank">
            <img class="img-fluid" src="{{ asset('assets/img/resources/cartaaplicacioncost-fecha.png') }}">
        </a>
    </div>
</div>

<!-- Sub-Title - Plan de trabajo -->
<div class="row mx-0 mt-3" id="plan-trabajo">
    <div class="col-lg-6 col-md-9 col-sm-9 px-0">
        <div class="text-white" id="plantrabajo">
            <h3 class="py-2 font-weight-bold subtitle-barra-gris">Plan de trabajo</h3>
        </div>
    </div>
</div>

<!-- Contenido - Plan de trabajo -->
<div class="row mx-0">
    <div class="col-md-1 col-1"></div>
    <div class="col-lg-3 col-md-3 col-6 text-center mb-3 px-0">
        <a href="https://www.itei.org.mx/cost/docs/Plan_de_Trabajo_Aprobado.pdf" class="links-doc" target="_blank">
            <img class="img-fluid" src="{{ asset('assets/img/resources/plan-de-trabajo-cost.png') }}">
        </a> 
    </div>
</div>

<!-- Sub-Title - Actas -->
<div class="row mx-0 mt-3" id="actas">
    <div class="col-lg-6 col-md-9 col-sm-9 px-0">
        <div class="text-white" id="actas">
            <h3 class="py-2 font-weight-bold subtitle-barra-gris">Actas</h3>
        </div>
    </div>
</div>

<!-- Contenido - Actas -->
<div class="row mx-0">
    <div class="col-md-1 col-1"></div>
    <div class="col-lg-3 col-md-3 col-6 text-center mb-3 px-0">
        <a href="https://www.itei.org.mx/cost/docs/Acta_Instalacion_CoST_Jalisco.pdf" class="links-doc" target="_blank">
            <img class="img-fluid" src="{{ asset('assets/img/resources/carta-instalacion-cost.png') }}">
        </a>  
    </div>
</div>

<!-- Sub-Title - Informes de aseguramiento -->
<div class="row mx-0 mt-3" id="informes-aseguramiento">
    <div class="col-lg-6 col-md-9 col-sm-9 px-0">
        <div class="text-white" id="informe">
            <h3 class="py-2 font-weight-bold subtitle-barra-gris">Informes de aseguramiento</h3>
        </div>
    </div>
</div>

<!-- Contenido - Informes de aseguramiento -->
<div class="row mx-0">
    <div class="col-md-1 col-1"></div>
    <div class="col-lg-3 col-md-3 col-6 text-center mb-3 px-0">
        <a href="#" class="links-doc" target="_blank">
            <img class="img-fluid" src="{{ asset('assets/img/resources/informe-aseguramiento-pendiente.png') }}">
        </a>
        <!--<div class="form-group col-lg-2 col-md-4 col-sm-5">
            <img width="160px" src="{{ asset('assets/img/documentos/cost-logo.jpg') }}">
        </div>
        <div class="form-group col-lg-7 col-md-4 col-sm-7" style="margin-top:1%;">
            <li><a href="#" class="links-doc" target="_blank">Pendiente</a></li>
        </div>-->
    </div>
</div>

<!-- Sub-Title - Reglamentos -->
<div class="row mx-0 mt-3" id="reglamentos">
    <div class="col-lg-6 col-md-9 col-sm-9 px-0">
        <div class="text-white" id="reglamentos">
            <h3 class="py-2 font-weight-bold subtitle-barra-gris">Reglamentos</h3>
        </div>
    </div>
</div>

<!-- Contenido - Reglamentos -->
<div class="row mx-0">
    <div class="col-md-1 col-1"></div>
    <div class="col-lg-3 col-md-3 col-6 text-center mb-3 px-0">
        <a href="https://www.itei.org.mx/cost/docs/Reglamento_Interno_Aprobado.pdf" class="links-doc" target="_blank">
            <img class="img-fluid" src="{{ asset('assets/img/resources/reglamento-cost.png') }}">
        </a>
    </div>
</div>

<!-- Sub-Title - Estándares -->
<div class="row mx-0 mt-3" id="estandares">
    <div class="col-lg-6 col-md-9 col-sm-9 px-0">
        <div class="text-white" id="estandares">
            <h3 class="py-2 font-weight-bold subtitle-barra-gris">Estándares</h3>
        </div>
    </div>
</div>

<!-- Contenido - Estándares -->
<div class="row mx-0">
    <div class="col-md-1 col-1"></div>
    <div class="col-lg-3 col-md-3 col-6 text-center mb-3 px-0">
        <a href="https://www.itei.org.mx/cost/docs/Estandar_de_Indicadores_CoST_Aprobado.pdf" class="links-doc" target="_blank">
            <img class="img-fluid" src="{{ asset('assets/img/resources/estandar-indicadores-cost.png') }}">
        </a>
    </div>
</div>

<!-- Sub-Title - Mapa de sitio aprobado -->
<div class="row mx-0 mt-3" id="mapa-sitio">
    <div class="col-lg-6 col-md-9 col-sm-9 px-0">
        <div class="text-white" id="mapasitio">
            <h3 class="py-2 font-weight-bold subtitle-barra-gris">Mapa de sitio aprobado</h3>
        </div>
    </div>
</div>

<!-- Contenido - Mapa de sitio aprobado -->
<div class="row mx-0">
    <div class="col-md-1 col-1"></div>
    <div class="col-lg-3 col-md-3 col-6 text-center mb-3 px-0">
        <a href="https://www.itei.org.mx/cost/docs/Mapa_de_Sitio_Aprobado.pdf" class="links-doc" target="_blank">
            <img class="img-fluid" src="{{ asset('assets/img/resources/mapa-sitio.png') }}">
        </a>
    </div>
</div>

@endsection