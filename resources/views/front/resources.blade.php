@extends('front.layouts.app')

@section('title')
Recursos
@endsection

@section('content')



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
<style>
    li a{
        color: darkslategrey;
        font-weight: bold;
    }
</style>
<!-- Contenido - Cartas de apoyo -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="listStyle">
            <div class="form-row"> 
            <div class="form-group col-md-2">
            <img style="margin-left:15%" src="{{ asset('assets/img/documentos/1-cimtra logo.jpg') }}">
            </div>
            <div class="form-group col-md-2" style="margin-top:1%;"><li><a href="https://www.itei.org.mx/cost/docs/cartas_apoyo/Carta_Apoyo_CIMTRA.pdf" target="_blank" >CIMTRA</a></li></div>
            </div>

            <div class="form-row"> 
            <div class="form-group col-md-2">
            <img style="margin-left:15%" src="{{ asset('assets/img/documentos/2-cmic logo.jpg') }}">
            </div>
            <div class="form-group col-md-2" style="margin-top:0.5%;"><li><a href="https://www.itei.org.mx/cost/docs/cartas_apoyo/Carta_Apoyo_CMIC.pdf" target="_blank" >CMIC</a></li></div>
            </div>
           
            <div class="form-row"> 
            <div class="form-group col-md-2">
            <img style="margin-left:15%" src="{{ asset('assets/img/documentos/3-comce logo.jpg') }}">
            </div>
            <div class="form-group col-md-2" style="margin-top:1%;"><li><a href="https://www.itei.org.mx/cost/docs/cartas_apoyo/Carta_Apoyo_COMCE.pdf" target="_blank" >COMCE</a></li></div>
            </div>
          
            <div class="form-row"> 
            <div class="form-group col-md-2">
            <img style="margin-left:20%" src="{{ asset('assets/img/documentos/4-cps logo.jpg') }}">
            </div>
            <div class="form-group col-md-2" style="margin-top:1%;"><li><a href="https://www.itei.org.mx/cost/docs/cartas_apoyo/Carta_Apoyo_CPS.pdf" target="_blank">CPS</a></li></div>
            </div>

            <div class="form-row"> 
            <div class="form-group col-md-2">
            <img style="margin-left:28%" src="{{ asset('assets/img/documentos/5-marhnos logo.jpg') }}">
            </div>
            <div class="form-group col-md-2" style="margin-top:1%;"><li><a href="https://www.itei.org.mx/cost/docs/cartas_apoyo/Carta_Apoyo_MARHNOS.pdf" target="_blank">MARHNOS</a></li></div>
            </div>   
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

            <div class="form-row"> 
            <div class="form-group col-md-2"> 
            <img style="margin-left:18%" src="{{ asset('assets/img/documentos/6-jal logo.jpg') }}">
            </div>
            <div class="form-group col-md-6" style="margin-top:0.5%;"><li><a href="https://www.itei.org.mx/cost/docs/cartas_intencion/Carta_intencion_Gob_del_Estado.pdf" target="_blank">Carta de intención Gobierno del Estado</a></li></div>
            </div>

            <div class="form-row"> 
            <div class="form-group col-md-2">
            <img style="margin-left:18%" src="{{ asset('assets/img/documentos/7-gdl-logo.jpg') }}">
            </div>
            <div class="form-group col-md-6" style="margin-top:1%;"><li><a href="https://www.itei.org.mx/cost/docs/cartas_intencion/Carta_intencion_Guadalajara.pdf" target="_blank">Carta de intención Guadalajara</a></li></div>
            </div>

            <div class="form-row"> 
            <div class="form-group col-md-2">
            <img style="margin-left:14%" src="{{ asset('assets/img/documentos/8-tlajomulco-logo.jpg') }}">
            </div>
            <div class="form-group col-md-6" style="margin-top:1%;"><li><a href="https://www.itei.org.mx/cost/docs/cartas_intencion/Carta_intencion_Tlajomulco.pdf" target="_blank">Carta de intención Tlajomulco</a></li></div>
            </div>

            <div class="form-row"> 
            <div class="form-group col-md-2">
            <img style="margin-left:18%" src="{{ asset('assets/img/documentos/9-tonala logo.jpg') }}">
            </div>
            <div class="form-group col-md-6" style="margin-top:1%;"><li><a href="https://www.itei.org.mx/cost/docs/cartas_intencion/Carta_intencion_Tonala.pdf" target="_blank">Carta de intención Tonalá</a></li></div>
            </div>

            <div class="form-row"> 
            <div class="form-group col-md-2">
            <img style="margin-left:18%" src="{{ asset('assets/img/documentos/10-zapopan-logo.jpg') }}">
            </div>
            <div class="form-group col-md-6" style="margin-top:1%;"><li><a href="https://www.itei.org.mx/cost/docs/cartas_intencion/Carta_intencion_Zapopan.pdf" target="_blank">Carta de intención Zapopan</a></li></div>
            </div>

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
            <div class="form-row"> 
            <div class="form-group col-md-2">
            <img width="160px" src="{{ asset('assets/img/documentos/cost-logo.jpg') }}">
            </div> 
            <div class="form-group col-md-7" style="margin-top:1%;"><li><a href="https://www.itei.org.mx/cost/docs/Carta_Aplicacion_CoST_Jalisco.pdf" target="_blank">Carta de Aplicación CoST Jalisco</a></li></div>
            </div>
                
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
            <div class="form-row"> 
            <div class="form-group col-md-2">
            <img width="160px" src="{{ asset('assets/img/documentos/cost-logo.jpg') }}">
            </div>
            <div class="form-group col-md-7" style="margin-top:1%;"><li><a href="https://www.itei.org.mx/cost/docs/Carta_Aprobacion_CoST_Jalisco_181019.pdf" target="_blank">Carta de Aprobación CoST Jalisco 19/oct/2018</a></li></div>
            </div>
               
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
            <div class="form-row"> 
            <div class="form-group col-md-2">
            <img width="160px" src="{{ asset('assets/img/documentos/cost-logo.jpg') }}">
            </div>
            <div class="form-group col-md-7" style="margin-top:1%;"> <li><a href="https://www.itei.org.mx/cost/docs/Plan_de_Trabajo_Aprobado.pdf" target="_blank">Plan de Trabajo CoST Jalisco</a></li></div>
            </div>
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
            <div class="form-row"> 
            <div class="form-group col-md-2">
            <img width="160px" src="{{ asset('assets/img/documentos/cost-logo.jpg') }}">
            </div>
            <div class="form-group col-md-6" style="margin-top:1%;"><li><a href="https://www.itei.org.mx/cost/docs/Acta_Instalacion_CoST_Jalisco.pdf" target="_blank">Acta de Instalación CoST Jalisco</a></li></div>
            </div>
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
            <div class="form-row"> 
            <div class="form-group col-md-2">
            <img width="160px" src="{{ asset('assets/img/documentos/cost-logo.jpg') }}">
            </div>
            <div class="form-group col-md-7" style="margin-top:1%;"><li><a href="#" target="_blank">Pendiente</a></li></div>
            </div>
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
            <div class="form-row"> 
            <div class="form-group col-md-2">
            <img width="160px" src="{{ asset('assets/img/documentos/cost-logo.jpg') }}">
            </div>
            <div class="form-group col-md-10" style="margin-top:1%;"><li><a href="https://www.itei.org.mx/cost/docs/Reglamento_Interno_Aprobado.pdf" target="_blank">Reglamento Interno Iniciativa de Transparencia en Infraestructura Pública "CoST Jalisco"</a></li></div>
            </div> 
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
            <div class="form-row"> 
            <div class="form-group col-md-2">
            <img width="160px" src="{{ asset('assets/img/documentos/cost-logo.jpg') }}">
            </div>
            <div class="form-group col-md-8" style="margin-top:1%;"><li><a href="https://www.itei.org.mx/cost/docs/Estandar_de_Indicadores_CoST_Aprobado.pdf" target="_blank">Estandar de indicadores CoST Jalisco</a></li></div>
            </div> 
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
            <div class="form-row"> 
            <div class="form-group col-md-2">
            <img style="margin-left:70%" src="{{ asset('assets/img/documentos/archivo-icono.jpg') }}">
            </div>
            <div class="form-group col-md-5" style="margin-top:1%;"><li><a href="https://www.itei.org.mx/cost/docs/Mapa_de_Sitio_Aprobado.pdf" target="_blank">Mapa de sitio aprobado</a></li></div>
            </div>      
            </ul>
        </div>
    </div>
</div>

@endsection