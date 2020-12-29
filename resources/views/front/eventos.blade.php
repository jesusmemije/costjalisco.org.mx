@extends('front.layouts.app')
@section('title')
Eventos
@endsection

@section('content')

<style>
    body {
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: left;
        background-color: #fff;
    }

 

    .c2 {
        color: #d60000;
        font-weight: bold;
    }



    .my2 {
        border-top: 1px solid #d60000;
        border-left: 1px solid #d60000;
        border-right: 1px solid #d60000;
        margin-top: 4%;
        height: 100px;
    }

  

    .tlt {
        padding-left: 3.7%;
        padding-top: 3%;
    }

    .f {
        margin-left: 3%;
        margin-right: -1.5%;
    }

    .my2 {
        border-top: 1px solid #d60000;
        border-left: 1px solid #d60000;
        border-right: 1px solid #d60000;
        margin-top: 4%;
        height: 100px;
    }

  

    .color1 {
        border-left: 5px solid #2c4143;
        margin-top: 4%;
    }

    .color2 {
        border-left: 5px solid #d60000;
        margin-top: 4%;
    }
    .eventos{
      
        height: 190px;
    }
    .title{
     
     background-color: #61a8bd;
    }
    .title h6{
        color:white;
        font-weight: 600;
        height: 35px;
       padding:10px;
       padding-left:10%;

    }
    .part1{
        background-color:  #white;
    }
    .content1 h5{
        color:#2c4143;
        font-weight: 600;
        text-align: justify;
    }
    .iframe{
        width: 100%;
        height: 100%;
    }

article {
    column-count: 3;
}

td {
    font-size: 15px;
    line-height: 20px;
    padding: 0 20px;
    text-align: justify;
    vertical-align: top;
    width: 50%;
}
td.first {
    border-right: 5px solid #4BB495  ;
}


</style>

<div class="container">
    <div class="row my2" style="margin-bottom: 5%;">
        <div class="color2"></div>
        <div class="tlt">
            <div style="margin-left:-3%">
                <h1 class="c2">Eventos/Agendas</h1>
            </div>
        </div>
    </div>
</div>
<div class="row mx-0 my-5">
    <div class="col-md-5 px-0 mb-3">
        <div class=" text-center text-white">
            <h1 class="py-1 font-weight-bold subtitle-barra-gris">VER POR MES</h1>
        </div>
    </div>
</div>
<div class="container" >
    <div class="row eventos" style="margin-bottom: 10%;">
        <div class="col-md-3 col-12 part1">
            <div class="row title" style="margin-top:1%;">
                <h6>Noviembre</h6> 
            </div>
            <div class="row title" style="margin-top:1%;">
                <h6>Diciembre</h6> 
            </div>
            <div class="row title" style="margin-top:1%;">
                <h6>Enero 2020</h6> 
            </div>
            <div class="row title" style="margin-top:1%;">
                <h6>Febrero 2020</h6> 
            </div>
        </div>
        <div class="col-md-1.9">
            <div class="color2" style="margin-top:60%;">
                <h1> 01 </h1>
                <h5>Noviembre</h5> 
            </div>
        </div>
        <div class="col-md-7" style="background-color:white">
            <div class="content1"  style="margin-top: 1%;">
                <h5> 
                LANZAMIENTO DE LA INICIATIVA INTERNACIONAL, EN EL TRANSPARENCIA EN INFRAESTRUCTURA, COST Y CONFORMACIÓN DEL GRUPO MULTISECTORIAL
                </h5>
                <p></p>
                <h8> 
                Lanzamiento de la iniciatiava en tranparencia en la construcción? CoST?, que tiene como objetivo inhibir las malasa prácticas en 
                las contrataciones de obra pública y mejorar la eficiencia de los recursos públicos, a través de adoptar amplios estandares de 
                transparencia, basados en un modelo de contrataciones abiertas, y vigilado por auditoria sociales, asi como conformar un Grupo
                Multisectorial integrado por la sociedad civil organizada en temas de transparencia y anticorrupción, el gremio de la construccion,
                y la academia, asi como los entes públicos antes mencionados y este instituto de Transparencia, como presidente del Grupo Multisectorial
                y coordinador de los trabajos
                </h8>
                <br></br>
            </div>
        </div>
    <div>
</div>
</div>
<div class="row">
    <div class="col-md-12 px-0 py-1">
        <h6 class="py-2 font-weight-bold" style="background-image: url('http://pice-software.com/costjalisco/public/assets/img/header/menu-principal.jpg'); background-repeat: no-repeat;background-size: cover;">
            <table>
                <tr>
                    <td>
                        <div class="col-md-9 px-0 py-1">
                            <span style="font-weight: 400; margin-left: 300px; color: white;"><p><i class="fas fa-clock mr-2 fa-lg"></i> <a href="#">
                            <strong>Hora de Inicio:</strong> 10:00 am</a></p></span>    
                        </div>
                    </td>
                    <td>
                        <div class="col-md-8 px-0 py-1">
                            <span style="font-weight: 400; margin-left: 350px; color: white;"><p><i class="fas fa-map-marker-alt mr-2 fa-lg"></i> <a href="#">
                            <strong>Caja Jalisco</strong><p>Manuel Acuña #2624 Col. Ladrón de
                            Guevara. Guadalajara, Jalisco</a></p>
                            </span>
                        </div>
                    </td>
                    <td>
                        <div class="col-md-8 px-0 py-1">
                            <span style="font-weight: 400; margin-left: 550px; color: white;"><p><i class="fas fa-users mr-1 fa-lg"></i> <a href="#">
                            <strong>Contacto:</strong>
                            <p>Luis Arturo Perez Villegas
                            luis.perez@itei.org.mx
                            3630 5745 ext. 1510</a></p>
                            </span>
                        </div>      
                    </td>
                </tr>
            </table>
        </h6>
    </div>
</div>
</div>
@endsection

@section('scripts')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    
<script>
    var mymap = L.map('mapid').setView([51.505, -0.09], 13);
</script>
@endsection

