@extends('front.layouts.app')

@section('title')
Nosotros
@endsection

@section('content')

<style>

@media only screen and (max-width: 480px) {
    .title-barra-roja {
        font-size: 24px;
    }
}
    
</style>

<div class="main">

    <!-- Mostramos el titulo de CoST Jalisco -->
    <div class="row mx-0 my-4" id="cost-jalisco">
        <div class="col-md-6 px-0">
            <div class="text-center text-white">
                <h3 class="py-2 font-weight-bold title-barra-roja">CoST Jalisco</h3>
            </div>
        </div>
    </div>

    <!--En está sección mostramos la descripcion de CoST Jalisco -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="text-align: justify;">
                <p>
                    En América Latina, los gobiernos son frecuentemente cuestionados por la falta de transparencia en la gestión pública; lo
                    cual, afecta directamente su credibilidad ante los ciudadanos.
                </p>
                <p>
                    En México, la corrupción se ha vuelto una constante, invadiendo diferentes sectores de la administración pública dentro de
                    todos los niveles de Gobierno.
                </p>
                <p>
                    Uno de los sectores con más incidencia de actos de corrupción, es la industria de la construcción a partir de la ejecución de
                    obra pública, donde sus consecuencias se reflejan en: presupuestos sobregirados y costos elevados, uso de materiales de
                    baja calidad, omisión de estudios y proyectos, baja rentabilidad económica y social, opacidad en las contrataciones, entre
                    otras.
                </p>
                <p>
                    Ante este escenario y, a sabiendas de que la ejecución de obra pública es una pieza fundamental en el desarrollo y el 
                    crecimiento económico de un estado o país, fue que el Instituto de Transparencia, Información Pública y Protección de Datos 
                    Personales del Estado de Jalisco (ITEI) decidió aplicar a la iniciativa internacional de Transparencia en Infraestructura CoST.
                </p>
                <p>
                    Derivado de lo anterior, el Instituto de Transparencia, Información, Pública y Protección de Datos Personales del Estado de
                    Jalisco (ITEI) logró captar el interés del Gobierno del Estado de Jalisco y de los gobiernos municipales de Guadalajara,
                    Tlajumulco de Zuñiga, Tonalá y Zapopan para combatir las prácticas de corrupción dentro de sus proyectos de
                    Infraestructura; por lo cual, aplicó en septiembre de 2019 para adherirse como miembro de la iniciativa internacional "CoST", 
                    con el apoyo de instituciones del sector público y privado, así como de organizaciones de la sociedad civil.
                </p>
                <p>
                    Como resultado del proceso de aplicación, el 18 de octubre de 2019, mediante una carta de aprobación expedida por la 
                    Junta de CoST Internacional, el ITEI fue notificado sobre la aprobación para que, por su conducto, el estado de Jalisco, forme 
                    parte de esta iniciativa internacional.
                </p>
                <p>
                    Con su implementación, pretende mejorar la transparencia en los procesos de infraestructura, exigiendo la publicación de 
                    información que contenga datos claves de todo el ciclo del proyecto (identificación, preparación, contratación, ejecución y 
                    evaluación) a través de herramientas tecnológicas basadas en plataformas de información focalizadas que servirán como 
                    medio de divulgación.
                </p>
                <p>
                    La iniciativa de CoST en Jalisco está liderada por el Grupo Multisectorial "GMS", quien es el responsable de guiar el 
                    desarrollo, la implementación y supervisión de la iniciativa en el estado.
                </p>
                </div>
            </div>
        </div>
    </div>

    <!--Mostramos el título de Objetivo General -->
    <div class="row mx-0 my-4" id="objetivo-general">
        <div class="col-md-6 px-0">
            <div class="text-center text-white">
                <h3 class="py-2 font-weight-bold title-barra-roja">Objetivo General</h3>
            </div>
        </div>
    </div>

    <!--En está sección mostramos la descripcion del Objetivo General -->
    <div class="container mb-md-5">
        <div class="row">
            <div class="col-md-12">
                <p style="text-align: justify;">
                    Fortalecer la transparencia y la rendición de cuentas en las inversiones de infraestructura pública en el Estado de Jalisco 
                    mediante la publicación de información de los procesos de obra pública de forma proactiva y en datos abiertos, a través de 
                    una plataforma tecnológica, que permita mejorar la eficiencia de los recursos ejercidos por las entidades públicas 
                    participantes dentro de la iniciativa CoST en Jalisco, impactando directamente en favor del combate a la corrupción.
                </p>
            </div>
        </div>
    </div>

</div>

@endsection