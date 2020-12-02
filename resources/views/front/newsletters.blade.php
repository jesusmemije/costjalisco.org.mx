@extends('front.layouts.app')


@section('content')

<style>

.date{
    margin-top:3%; color:#fff; 
    padding: 1% 0px 1% 5%;
    margin-bottom:3%;
    background-repeat:no-repeat;
    background-image: url("assets/img/newsletters/background-title.png");
}

.boletin{

    margin-top: 2%;
   
    margin-bottom:5%;
    color:#fff;
    font-size:30px;
    background-repeat:no-repeat;
    background-image: url("assets/img/titulo.png");
    
    
}
.boletin span{

  
    padding-left:38%;
}
.ver{
    margin-top: 3%;
    margin-right:4%;
}
.ver button{
    font-weight: 600;
    border-radius:30px;
    width: 180%;
    box-shadow: 4px 4px 0px 0px #a9b4b7;

    
}

</style>

<div class="container-fluid">
        <div class="row">
        <div class="col-md-6 boletin">
           <span>Boletines</span>

         
        </div>   
        </div>

        <div class="row">

        <div class="col-md-3 px-0">
            <img src="{{ asset('assets/img/newsletters/foto.png') }}" style="width: 100%; height:295px;" alt="">
        </div> 

        <div class="media-body" style="background-color: #d8d8cd; margin-top:1%;">

        <div class="col-md-12" style="background-color:#628EA0; color:#fff; padding:5%;">
            <span style="font-size:25px;">Transferencia y rendición de cuentas en infraestructura pública, promovida a través de iniciativa CoST e ITEI en el estado de Jalisco.</span>
        </div>

        <div class="col-md-8 date">
          15 de Octubre del 2020
        </div>

        </div>


        </div>

        <div class="container" style="margin-top:2%; margin-bottom:4%;">
      
        
        El ITEI impulsa la iniciativa CoST que tiene por objeto promover la transparencia y la rendición de cuentas en todas las etapas de los proyectos de infraestructura y obra pública. 
        <br><br>
        Se llevó a cabo la Primera Sesión Ordinaria 2020 del Grupo Multisectorial de CoST Jalisco, la Comisionada Presidente del Instituto de Transparencia, Acceso a la Información Pública y Protección de Datos Personales del Estado de Jalisco (ITEI) y Coordinadora de Organismos Garantes de las Entidades Federativas del Sistema Nacional de Transparencia, Cynthia Cantero Pacheco, dio a conocer el cronograma del plan de trabajo, considerando el involucramiento de los enlaces de los Municipios de Guadalajara, Zapopan, Tonalá, Tlajomulco y el Gobierno del Estado de Jalisco, además de describir lo que pretende tal iniciativa. 
        <br><br>
        Lo que se busca con la iniciativa CoST es aperturar todo el ciclo de la obra pública, desde su planeación, la proyección o generación a través de proyectos ejecutivos, procesos de licitación, o procesos que se lleven a cabo para adjudicar las obras públicas y por supuesto los contratos, la participación de la empresas y finalmente la ejecución" dijo. 
        <br><br>
        CoST Jalisco es un proyecto impulsado por el ITEI, ésta sesión que se llevó a cabo en Palacio de Gobierno del Estado de Jalisco, tuvo por objeto presentar los avances de la iniciativa de Transparencia en Infraestructura, así como la aprobación del Reglamento Interior, el estándar de indicadores CoST Jalisco, el Mapa de Sitio de la Plataforma de Divulgación y un banner de incorporación dentro de sus sitios web institucionales que publicite y redireccione a la página web de CoST Jalisco. 
        <br><br>
        CoST Transparency es una iniciativa internacional encargada de promover la transparencia y rendición de cuentas dentro de las diferentes etapas de los proyectos de infraestructura y obra pública, contando con la participación ciudadana. 
        <br><br>
        Su objetivo es trabajar directamente con gobierno, sociedad civil y la industria de la construcción para promover la divulgación, validación e interpretación de datos de los proyectos de infraestructura y obra pública. 
        <br><br>
        Al respecto, Cantero Pacheco sostuvo, "El proyecto de la iniciativa CoST contempla la evaluación para el cumplimiento de 40 indicadores formarán parte de las etapas clave, dentro del ciclo de la infraestructura. Los 40 rubros que la iniciativa de CoST contempla, se encuentran contenidas como obligaciones en la Ley de Transparencia, la diferencia es cómo se divulgará la información, la cual se desarrollará bajo estándares de Datos Abiertos, con la finalidad de que la información sea de fácil acceso y localización para el ciudadano". 
        <br><br>
        Enfatizó que es importante que las autoridades conozcan que los parámetros de CoST se ajustan a la normativa contenida en la Ley de Transparencia, además de ser un proyecto que tiene apoyo internacional para su desarrollo al ser considerado ejemplar. 
        <br><br>
        "Gracias a la colaboración del Banco de Desarrollo de América Latina y los recursos que ha gestionado, se desarrolla actualmente una plataforma, que se contempla en dos fases. La primera la identificación del proyecto y la segunda fase que contiene el contrato, será observado desde el proyecto de contratación hasta la finalización de la obra", acotó. 
         <br><br>
         Hizo notar que el capítulo local de CoST Transparency en Jalisco, se encuentra integrado por un grupo multisectorial con la finalidad de mejorar el valor de las inversiones en infraestructura y obra pública, aumentando la transparencia y la rendición de cuentas. 
         <br><br>
         "El grupo multisectorial de CoST, observará el desarrollo de las obras, se encuentra conformado por Instituciones de Gobierno, del sector privado, del sector académico y de la sociedad civil, que es la responsable de guiar el desarrollo, la implementación y supervisión de la iniciativa de CoST en Jalisco" dijo. 
         <br><br>
         El Secretario de Infraestructura y Obra Pública, David Miguel Zamora Bueno, comentó que la ciudadanía merece el desarrollo de un trabajo serio, minucioso y a tiempo, por parte de sus autoridades. 
         <br><br>
         "En esta pandemia es indispensable llevar certeza a la población, crear empleos. Impulsar la manufactura se refleja de inmediato en la construcción de carreteras y escuelas. Es una firme apuesta de este gobierno" expresó. 
         <br><br>
         A su juicio enfatizó, que la iniciativa CoST, nació como un esfuerzo pionero en el país, un esfuerzo del Sector Privado, de los Medios de Comunicación, de la Cámara de la Industria de la Construcción y del Instituto de Transparencia del Estado de Jalisco ITEI. "Creo que debemos de responder a la gente". 
         <br><br>
         El Gerente Regional Senior para América Latina CoST, Manuel González Caballero, manifestó su alegría por la atención que las autoridades brindan al programa, pero sobre todo por el progreso sobre el cumplimiento de los compromisos planteados en materia de transparencia y combate a la corrupción en obra pública. 
         <br><br>
         "La reactivación económica en el contexto del COVID-19, contempla el impulso de los Gobiernos de fuertes inversiones en infraestructura, es importante para nosotros participar sobre el rumbo que tomarán las iniciativas. Felicitó al ITEI porque ellos están encaminado el desarrollo del programa a través de un modelo con visión a 5 años". 
         <br><br>
         "Hoy día el trabajo del ITEI es ejemplo y servirá como modelo para ser aplicado en otros Estados de México y en otros puntos de Latinoamérica", enfatizó. 
         <br><br>
         Para el Comisionado Presidente del Instituto Nacional de Transparencia (INAI), Francisco Javier Acuña Llamas, hoy día la gestión pública de Jalisco "se encuentra iluminada, producto de un trabajo tenaz desarrollado en un contexto complejo". 
         <br><br>
         Sostuvo que la idea de un organismo que se hace que se transparente la función pública, suele ser incomoda para el Gobierno, en dónde la presencia de las autoridades de la entidad, acompañando este proceso y esta iniciativa de CoST en Jalisco, es un gran punto de partida. 
         <br><br>
         "Esperamos que esta iniciativa CoST, pueda expandirse a otros ámbitos de la política y otros puntos de la Republica, el Pleno del INAI es testigo de este acontecimiento de la vida pública en Jalisco. Las tecnologías de la información nos demuestran que nos pueden brindar refugio, hoy generamos nuevas rutas sobre infraestructura pública" explicó. 
         <br><br>
         En ese sentido se refirió a la importancia que cobra la infraestructura y sus procesos de ejecución, mismos que deben estar bien claros. 
         <br><br>
         "La infraestructura es una de las principales actividades que debe ser escrutada. Cuando un país es huésped de este tipo de iniciativas democráticas, deben ser valoradas y la ciudadanía debe defenderlas para que no surjan espacios de caos (?) la iniciativa CoST nos da certeza y a pesar de las contra olas nos reanima, no importa que la transparencia sea incomoda para los gobernantes, por las constantes preguntas de la ciudadanía" abundó. 
         <br><br>
         Y finalizó señalando que es de suma trascendencia el empoderamiento de los ciudadanos con este tipo de ejercicios. 
         <br><br>
         Qué bueno que sea así, que la ciudadanía se empodere de la exigencia y participe en la vida pública. Gracias a Cynthia Cantero y a CoST por confiar en Jalisco", expresó. 
         <br><br>
         Manifestó que los mexicanos debemos buscar defender la democracia en el actual contexto y por supuesto que la obra pública será un compensatorio en el mercado, por la desaceleración provocada por el COVID-19, pero también es una oportunidad de generar confianza a través del uso correcto de las finanzas públicas. 
         <br><br>
         "En el INAI, vemos con mucho entusiasmo la implementación de este proyecto en Jalisco" sentenció. 
         <br><br>
         En su intervención, el Presidente Municipal de Zapopan, Pablo Lemus Navarro, enfatizó que transparentar los recursos públicos es una actividad importante en su administración por lo que ha sido fundamental contar con el apoyo del ITEI. 
         <br><br>
         "Desde lo local, en el ámbito municipal estamos atentos a la necesidad de dinamizar la economía, por ello contemplamos la obra pública, contemplamos generar una política contra cíclica para fortalecer el área económica y la infraestructura es importante impulsor" explicó. 
         <br><br>
         Destacó que busca que las personas que habitan el Municipio de Zapopan, se queden tranquilas del uso y destino de los recursos públicos y adicionalmente sean participes de una rendición de cuentas, en donde la ciudadanía pueda apreciar que beneficios que le deja esa obra pública. 
         <br><br>
         "Seguiremos trabajando con el ITEI" subrayó. 
         <br><br>
         El Presidente Municipal de Tonalá, Juan Antonio González Mora, destacó que, desde el inicio de su administración, Tonalá era considerado el cuarto Municipio más endeudado del país y que con la transparencia pudieron dar vuelta a esa dinámica nociva para el municipio. 
         <br><br>
         "Parecía que existía una dinámica para frenar la transparencia, cuando instalamos la transparencia de manera firme y se convirtió la actividad en una prioridad para nosotros: en dos años luego de adoptar la normativa de transparencia y rendición de cuentas, hemos alcanzado mejores posiciones" dijo. 
         <br><br>
         Comentó, que se consideraba a Tonalá como un municipio atrasado en infraestructura y hoy día desarrolla labores de forma comprometida con Universidades y Sectores Empresariales para hacer de Tonalá un mejor lugar. 
         <br><br>
         La Presidenta del Comité de Participación Social del Sistema Estatal Anticorrupción (CPS), Lucía Almaraz Cázares, manifestó su alegría por el desarrolló de trabajos conjuntos con el ITEI y la Contraloría del Estado. 
         <br><br>
         "El CPS se siente en confianza con estas instituciones que consideramos aliadas. La transparencia debe ir de la mano con el control de la corrupción y la iniciativa CoST contempla estos dos aspectos, agradezco a Cynthia Cantero por ser nuestra aliada", concluyó. 
        </div>
        <div class="d-flex justify-content-end ver">
            <div><button class="btn btn-dark btn-sm">Ver más</div>
            

          

            </button>
            <div style="padding-top:2%;margin-left:4%;" >
            <img src="assets/img/newsletters/clic.png" height="50" alt=""> 
            </div>
           


        </div>
        
      
</div>

@endsection

@section('scripts')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHzvoUaKDOaWGOu0ZNUpB_SJigsBgOOzI&callback=initMap&libraries=places&v=weekly&language=mx&region=MX"
    defer></script>

<script>
    window.smoothScroll = function(target) {
        var scrollContainer = target;
        do { //find scroll container
            scrollContainer = scrollContainer.parentNode;
            if (!scrollContainer) return;
            scrollContainer.scrollTop += 1;
        } while (scrollContainer.scrollTop == 0);
        
        var targetY = 0;
        do { //find the top of target relatively to the container
            if (target == scrollContainer) break;
            targetY += target.offsetTop;
        } while (target = target.offsetParent);
        
        scroll = function(c, a, b, i) {
            i++; if (i > 30) return;
            c.scrollTop = a + (b - a) / 30 * i;
            setTimeout(function(){ scroll(c, a, b, i); }, 20);
        }
        // start scrolling
        scroll(scrollContainer, scrollContainer.scrollTop, targetY, 0);
    }
        let map;
    
        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: -34.397,
                    lng: 150.644
                },
                zoom: 8,
            });
        }
</script>
@endsection