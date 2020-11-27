@extends('front.layouts.app')

@section('title')
Proyecto
@endsection
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHzvoUaKDOaWGOu0ZNUpB_SJigsBgOOzI&callback=initMap&libraries=places&v=weekly&language=mx&region=MX" defer></script>

@section('content')


<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    #imgproject {
        border: 1px solid black;
        height: 360px;
        background-image: url("assets/img/home/slider-main/matute.jpg");
    }



    #titleproject {

        width: 100%;
        height: auto;
        text-align: justify;

        background-color: #628ea0;
        padding: 20px;
        color: #fff;

    }

    #titleproject span {
        font-size: 30px;

    }

    #benefited {
        width: 100%;
        height: auto;
        font-size: calc(1em + 1vw);

        display: inline-block;
        background-color: #d8d8cd;
        padding: 10px;
        margin-top: 2%;
        word-break: break-all;
    }

    #status {
        background-color: #d60000;
        height: auto;
        color: #fff;
    }

    .media {
        background-color: #d8d8cd;
        height: auto;
    }

    #content {
        border: 1px solid blue;

    }

    #btns {
        margin-top: 2%;
        border-radius: 8px;
    }
    #btns button{
        font-size:13px;
    }

    #date {
        border-bottom: 3px solid red;
        padding-left: 20px;
    }

    #map {

        height: 500px;
    }

    .data {
        text-align: justify;
        margin-top: 3%;
        margin-bottom: 3%;
        padding-left: 3%;

    }

    .data2 {
        text-align: left;
        margin-top: 3%;

        padding-left: 3%;
    }

    .g {
        color: #000;
        padding-left: 3%;
        font-size: 50px;
        color: #fff;

        background-repeat: no-repeat;
        background-image: url("assets/img/project/barra3.png");
    }

    #docs {

        height: auto;
        margin-top: 6%;
        margin-bottom: 6%;

        background-image: url("assets/img/project/fondo-doc.jpg");
    }

    #doc1 {
        justify-content: center;
    }
    .tablescroll{
  margin-top: 3%;
  max-height: 300px;
  overflow: auto;
  display:inline-block;
  width: 100%;
  overflow-x: hidden;
}
#fn{
   
    margin-top: 3%;
    background-image: url("assets/img/project/barrafond.jpg");
   
}
</style>



<div class="container-fluid">


    <div class="media row">
        <div id="imgproject" class="col-md-4">

        </div>

        <div class="media-body">
            <div id="titleproject" class="col-md-12">
                <span>REVESTIMIENTO Y SANEAMIENTO DEL CANAL DE AGUAS PLUVIALES</span>

            </div>
            <div id="benefited" class="col-md-12">
                <div>
                    <i class="fas fa-user-friends" style="color:#628ea0; margin-left:2%; font-size:60px"></i>

                    <label style="color:#628ea0; font-size: 30px; margin-left:1%" for="">246,333333 ciudadanos beneficiados</label>
                </div>


                <div id="btns">

                    <button onclick="smoothScroll(document.getElementById('dt'))" class="btn btn-dark btn-sm">DATOS GENERALES</button>
                    <button onclick="smoothScroll(document.getElementById('identificacion'))" class="btn btn-dark btn-sm">IDENTIFICACIÓN</button>
                    <button onclick="smoothScroll(document.getElementById('preparacion'))" class="btn btn-dark btn-sm">PREPARACIÓN</button>
                    <button onclick="smoothScroll(document.getElementById('contratacion'))" class="btn btn-dark btn-sm">PROCEDIMIENTO DE CONTRATACIÓN</button>
                    <button onclick="smoothScroll(document.getElementById('ejecucion'))" class="btn btn-dark btn-sm">EJECUCIÓN</button>
                    <button onclick="smoothScroll(document.getElementById('finalizacion'))" class="btn btn-dark btn-sm">FINALIZACIÓN</button>
                </div>
            </div>


            <div class="container-fluid" id="status">

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <h4>Estatus:</h4>
                    </div>
                    <div class="form-group col-md-8 d-flex justify-content-end">

                        <h4>100% completado</h4>
                    </div>

                </div>
            </div>
            <div id="date">
                <span><b>Inagurado: 03/oct/2020</b></span>
            </div>







        </div>

    </div>


    <div class="row" id="map"></div>

    <div class="row" style="margin-top: 4%; " id="dt">

        <div class="col-md-6 g">
            <h1>Datos Generales</h1>
        </div>
        <div class="col-md-6">
            <img src="assets/img/project/Línea.png" alt="" style="width:100%; margin-top:3%;">

        </div>
    </div>
    <?php //this information may be a db table consult. 
    $cadena = "El proyecto de infraestructura con nombre: “Revestimiento y saneamiento del canal en la Calle Arroyo entre Calle Platino y Cantera, en la Colonia Mariano Otero, municipio de Zapopan, Jalisco.”
    El objetivo es el revestimiento y saneamiento del canal de aguas pluviales que se encuentra en la Calle Arroyo entre Calle Platino y Cantera, en la Colonia Mariano Otero, municipio de Zapopan, Jalisco. El proyecto cuenta con indicador de impacto ambiental, donde el responsable del estudio es: “Ingeniería en Mecánica de Suelos y Control de Occidente S.A. de C.V., con estudio de factibilidad Técnico económica, ecológica o social, con recursos federales en el ramo 33 del Fondo de Aportaciones para la Infraestructura Social.";

    ?>


    <div class="data">
        {{$cadena}}
    </div>



    <div class="row" id="identificacion">
        <div class="col-md-6 g">
            <h1>Identificación</h1>
        </div>
        <div class="col-md-6">
            <img src="assets/img/project/Línea.png" alt="" style="width:100%; margin-top:3%;">
        </div>
    </div>

    <div class="row">



        <div class="col-md-6 data" style="margin-top:6%;">

           <span><b>Número del acto público, ID.Entidad:</b></span><br>
           <span>DOPI-MUN-R33-DS-CI-055-2019</span><br>
           <span>En el subsector de Servicios</span><br>

           <span><b>Número o números de identificación del estudio del impacto en el terreno y asentamientos:</b></span><br>
           <span>DOC-IMSCO-07</span><br>
           


        </div>

        <div class="col-md-6 data" style="border-left:1px solid #628ea0;">


            <h3 style="color:#628ea0">Responsables del proyecto</h3>
            <?php
            $responsables = [];
            $responsables[] = ['name' => 'Lic. José Rodolfo Hernández', 'cargo' => 'Dirección de obras Públicas e Infraestructura de Zapopan, Jalisco.', 'email' => 'rodolfo.berrecil@zapopan.gob.mx'];
            $responsables[] = ['name' => 'Lic. Grabriel Marín Acevedo', 'cargo' => 'Jefe de Departamento B', 'email' => ''];
            $responsables[] = ['name' => 'Arq. José Luis Vázquez Morán', 'cargo' => '', 'email' => 'joseluis.vazquez@zapopan.gob.mx'];

            ?>


            @foreach($responsables as $responsable)
            <br>
            @if($responsable['name']!='')
            <i class="fas fa-user-friends" style="color:#628ea0; font-size:20px;"></i>
            <span style="font-weight: bold;">{{$responsable['name']}}</span></br>
            @endif
            @if($responsable['cargo']!='')
            <span style="padding-left:3%">{{$responsable['cargo']}}</span></br>
            @endif
            @if($responsable['email']!='')
            <span style="padding-left:3%">{{$responsable['email']}}</span><br>
            @endif
            @endforeach
            <div class="row">
                <div class="col-md-10" style="border-bottom:1px solid #628ea0; ; margin-top:4%;"></div>
            </div>


        </div>







    </div>



    <div class="row" id="preparacion">
        <div class="col-md-6 g">
            <h1>Preparación</h1>
        </div>
        <div class="col-md-6">
            <img src="assets/img/project/Línea.png" alt="" style="width:100%; margin-top:3%;">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 data2">
            <?php
            $adjudicacion = [];
            $impacto_ambiental = [];
            $factibilidad = [];
            $impacto = [];

            $adjudicacion[] = ['nombre' => '', 'email'];

            ?>
            <p>Se realizaron estudios sobre el impacto ambiental, así como estudios de factibilidad y estudios de impacto en terreno y asentamientos, con recursos federales. Con la Unidad de Presupuesto y Contratación de Obra Publica como entidad de ajudicación. </p>
        </div>
        <div class=col-md-6>


            <span style="padding-left:9%;font-size:18px; color:#628ea0; font-weight:bold;">Responsable del contacto de la entidad de adjudicación</span><br>
            <i class="fas fa-user-friends" style="color:#628ea0; font-size:20px; margin-left:4%;"></i>
            <span>Lic. Sandra Patricia Sánchez Váldez</span><br>
            <span style="padding-left:9%">sandra.sanchez@zapopan.gob.mx</span><br><br>

            <span style="padding-left:9%;font-size:18px; color:#628ea0; font-weight:bold;">Responsables de estudios de impacto de terreno</span><br>
            <i class="fas fa-user-friends" style="color:#628ea0; font-size:20px; margin-left:4%;"></i>
            <span>Ingeniería en Mécanica de Suelos y Control de Occidente S.A. de C.V.</span><br>
            <span></span><br>

            <span style="padding-left:9%;font-size:18px; color:#628ea0; font-weight:bold;">Responsables de estudios de factibilidad</span><br>
            <i class="fas fa-user-friends" style="color:#628ea0; font-size:20px; margin-left:4%;"></i>
            <span>Tesorería Municipal</span><br>
            <span></span><br>

            <span style="padding-left:9%;font-size:18px;color:#628ea0; font-weight:bold;">Responsable del estudio de impacto de terreno y asentamientos</span><br>
            <i class="fas fa-user-friends" style="color:#628ea0; font-size:20px; margin-left:4%;"></i>
            <span>M en C.E. Alonso López Flores</span><br>
            <span></span>

        </div>


    </div>

    <div class="row" id="contratacion">
        <div class="col-md-6 g" style="margin-top: 4%; ">
            <h1>Procedimiento de contratación</h1>
        </div>
        <div class="col-md-6">
            <img src="assets/img/project/Línea.png" alt="" style="width:100%; margin-top:12%;">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 data2">
            <?php
            $adjudicacion = [];
            $impacto_ambiental = [];
            $factibilidad = [];
            $impacto = [];

            $adjudicacion[] = ['nombre' => '', 'email'];

            ?>

            <span><b>Tipo de contrato:</b> Obras</span><br>
            <span><b>Modalidad de contratación:</b> Precios unitarios</span><br>
            <span><b>Entidad administradora del contrato:</b>Unidad de Presupuesto y Contratación de Obra Publica</span><br>
            <span><b>Título del contrato:</b> DOPI-MUN-R33-DC-SI-055-2019</span><br>
            <span><b>Vía por la que presenta su propuesta:</b> JUNTA DE APERTURA</span><br>
            <span><b>Monto del contrato (cantidad estipulada):</b>$571857.77</span><br>
            <span><b>Alcance del trabajo según el contrato:</b>REVESTIMIENTO Y SANEAMIENTO DEL CANAL EN LA COLONIA MARIANO OTERO, EN ZAPOPAN</span><br>
            <span><b>Duración del proyecto de acuerdo con lo establecido del contrato:</b> 63 DÍAS</span><br>



        </div>
        <div class="col-md-6 data" style="border-left: 1px solid #628ea0;">
            <h3 style="color:#628ea0">Empresas participantes</h3>

            <?php
            $empresas = [];
            $empresas[] = ['nombre' => 'CONSTRUCCIONES TECNICAS DE OCCIDENTE SA DE CV'];
            $empresas[] = ['nombre' => 'CONSTRUCTORA CENTAURO DE INFRAESTRUCTURA A DE CV'];
            $empresas[] = ['nombre' => 'FAZER CONSTRUCCIONES SA DE CV'];
            $empresas[] = ['nombre' => 'GUILLERMO VARGAS LARA'];
            $empresas[] = ['nombre' => 'SALVADOR PANTOJA VACA'];

            ?>
            <div class="tablescroll">

            
            <table class="table table-sm table-borderless">
             
                <tbody>
                    @foreach($empresas as $empresa)
                    <tr>
                        <td>
                            <i style="font-size:50px; color:#628ea0;" class="fas fa-building"></i>
                        </td>
                        <td  style="font-weight: bold; padding-top:5%;">
                          {{$empresa['nombre']}}
                        </td>
                        
                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
        </div>

    </div>

    <div class="row" id="ejecucion">
        <div class="col-md-6 g">
            <h1>Ejecución</h1>
        </div>
        <div class="col-md-6">
            <img src="assets/img/project/Línea.png" alt="" style="width:100%; margin-top:3%;">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 data2">
         
           
            <span><b>Variaciones en el precio del contrato:</b></span><br>
            <span><b>Razones de cambio en el precio del contrato:</b></span><br>
            <span><b>Variaciones en la duración del contrato:</b></span><br>
            <span><b>Razones de cambio en la duración del contrato:</b></span><br>
            <span><b>Variaciones en el alcance del contrato:</b></span><br>
            <span><b>Razones de cambios en el alcance del contrato:</b></span><br>
            <span><b>Aplicación de escalatoria:</b></span><br>
            <span><b>Estado actual del proyecto:</b> Concluído</span><br>
            


        </div>
       


    </div>

    <div class="row" id="finalizacion">
        <div class="col-md-6 g" style="margin-top: 4%;">
            <h1>Finalización</h1>
        </div>
        <div class="col-md-6">
            <img src="assets/img/project/Línea.png" alt="" style="width:100%; margin-top:12%;">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 data2">
         
           
            <span><b>Costo de finalización:</b></span><br>
            <span><b>Fecha de finalización:</b></span><br>
            <span><b>Alcance de la finalización:</b></span><br>
            <span><b>Razones de cambio en el proyecto:</b></span><br>
       </div>
    </div>
    <div class="row" >
    <div class="col-md-6" style="background-color:#d60000; color:#fff; margin-left:3%; margin-top:4%;">
    <div class="d-flex justify-content-end">
        

        <h3>100%</h3><span style="padding-top:1%; padding-left:1%;">completado</span>
    </div>

    </div>
    <div class="col-md-2" style="margin-top:5%;">
        <label for=""><b>Inagurada: 15/Ago/2020</b></label>
    </div>
    </div>

    <div class="row" id="fn">

    <div class="form-row col-md-12 d-flex justify-content-center" style="height: auto;">
        <div class="col-md-3 form-group" style="color:#fff; padding:10px;">
           <i class="fa fa-user" style="font-size: 20px;"></i>
          <span>Beneficiarios: 569 950 ciudadanos</span> 
           
        </div>
        <div class="col-md-3 form-group" style="color:#fff; padding:10px;">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
           <span>Colonia Mariano Otero, Zapopan.</span> 
        </div>
        <div class="col-md-3 form-group" style="color:#fff; padding:10px;">
        <i class="fa fa-usd" aria-hidden="true"></i>
            <span>Inversión: $571857.77</span> 
        </div>

    </div>

    </div>

    <div class="row" id="docs">
        <div class="col-md-4" style="font-weight:bold;; margin-top:5%; margin-left:8%;">
            <p style="color:#fff; font-family:Arial, Helvetica, sans-serif; text-align:center">¡Descarga los documentos del proyecto!</p>

            <img style=" margin-left:40%;" src="assets/img/project/icon-clic.png" alt="">
        </div>


        <div class="col-md-2 offset-md-1" style="margin-top:4%;">
            <img src="assets/img/project/icon-pdf.png" style="margin-left: 20%;" alt="" height="100">
            <button class="btn btn-sm" style="margin-top:10%; margin-bottom:14%; border:1px solid transparent; border-radius:15px; color:#fff; background-color:#628ea0;">ABRIR DOCUMENTO PDF</button>
        </div>


        <div class="col-md-2" style="margin-top:4%;">
            <img src="assets/img/project/icon-excel.png" style="margin-left:20%;" alt="" height="100">
            <button class="btn btn-sm" style="margin-top:10%; margin-bottom:14%; border:1px solid transparent; border-radius:15px; color:#fff; background-color:#628ea0;">ABRIR DOCUMENTO XLS</button>
        </div>

    </div>



</div>







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