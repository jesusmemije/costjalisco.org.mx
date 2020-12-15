@extends('front.layouts.app')
 
@section('title')
Projects-search
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
@endsection


@section('content')
<style>
    .formulario-projects-serach{
        background: rgb(255, 255, 255);
        padding: 20px 20px 5px 20px;
        border-radius: 0px 30px 0px 0px;
        position: absolute; 
        float: left; 
        z-index: 100;
        width: 250px;
        box-shadow: 5px 5px 2px #999;
        top: 90px;
        left: 40px;
    }
    .mapa{
        z-index: -2;
    }
    .formulario-projects-serach select{
        width: 95%;
        height: 27px;
        margin-top: 9px;
        border-radius: 50px;
        padding: 5px 0px 5px 5px;
        font-size: 14px;
        font-weight: bold;
        color: darkslategrey;
    }
    .formulario-projects-serach input{
        width: 95%;
        height: 27px;
        margin-top: 9px;
        padding: 5px 0px 5px 9px;
        font-size: 14px;
        font-weight: bold;
        color: #628ea0;
        border: 1px solid #628ea0;
    }
    .formulario-projects-serach button{
        margin: 25px auto;
        background: #2C4143;
        color: #fff;
        border-radius: 50px;
        font-size: 13px;
        padding: 1px 20px 1px 20px;
        border: 0;
    }
    .detalle-punto{
        background: #d5d6be;
        width: 200px;
        z-index: 100;
        top: 270px;
        left: 980px;
        color: #628ea0;
        font-weight: bold;
        position: absolute; 
        float: left; 
        text-align: center;
        padding: 15px 15px 2px 25px;
        border-radius: 0px 20px 0px 0px;
        box-shadow: 5px 5px 2px #999;
        font-size: 13px;
    }
    .detalle-punto button{
        margin: 25px auto;
        background: #2C4143;
        color: #fff;
        border-radius: 50px;
        font-size: 13px;
        padding: 1px 20px 1px 20px;
        border: 0;
    }
    .opciones-detelle{
        text-align: left;
        color: #2C4143;
        font-size: 12px;
    }
    
</style>

<div class="container-fluid pt-4">
    <!-- Section - Descripción General del proyecto -->
    {{-- <div class="row" style="background-color: #d8d8cd;">
        <div class="col-md-3 px-0">
            <img src="{{ asset('assets/img/project/proyecto-2.jpg') }}" class="img-fluid" alt="">
        </div>
        <div class="col-md-9 px-0">
            <div class="media-body">
                <div id="titleproject" class="col-md-12">
                    <span>REVESTIMIENTO Y SANEAMIENTO DEL <br> CANAL DE AGUAS PLUVIALES</span>
                </div>
                <div id="benefited" class="col-md-12">
                    <div class="row mx-0 align-items-baseline">
                        <img src="{{ asset('assets/img/project/icons/people.png') }}" class="img-fluid ml-3" width="60"
                            alt="">
                        <label class="ml-3" style="color:#628ea0; font-size: 28px; font-weight: 600;" for="">246,523
                            ciudadanos beneficiados</label>
                    </div>
                    <div class="row mx-0">
                        <div id="btns">
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <button onclick="smoothScroll(document.getElementById('datos-generales'))"
                                    class="btn btn-gris btn-sm"
                                    style="background: linear-gradient(90deg, rgba(145,145,145,1) 0%, rgba(136,136,136,1) 100%); ">DATOS
                                    GENERALES</button>
                                <button onclick="smoothScroll(document.getElementById('identificacion'))"
                                    class="btn btn-gris btn-sm"
                                    style="background: linear-gradient(90deg, rgba(135,135,135,1) 0%, rgba(126,126,126,1) 100%);">IDENTIFICACIÓN</button>
                                <button onclick="smoothScroll(document.getElementById('preparacion'))"
                                    class="btn btn-gris btn-sm"
                                    style="background: linear-gradient(90deg, rgba(125,125,125,1) 0%, rgba(115,115,115,1) 100%);">PREPARACIÓN</button>
                                <button onclick="smoothScroll(document.getElementById('contratacion'))"
                                    class="btn btn-gris btn-sm"
                                    style="background: linear-gradient(90deg, rgba(114,114,114,1) 0%, rgba(93,93,93,1) 100%); ">PROCEDIMIENTO
                                    DE CONTRATACIÓN</button>
                                <button onclick="smoothScroll(document.getElementById('ejecucion'))"
                                    class="btn btn-gris btn-sm"
                                    style="background: linear-gradient(90deg, rgba(91,91,91,1) 0%, rgba(83,83,83,1) 100%);">EJECUCIÓN</button>
                                <button onclick="smoothScroll(document.getElementById('finalizacion'))"
                                    class="btn btn-gris btn-sm"
                                    style="background: linear-gradient(90deg, rgba(82,82,82,1) 0%, rgba(73,73,73,1) 100%);">FINALIZACIÓN</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid" id="status">
                    <div class="row pt-2">
                        <div class="col-md-4">
                            <span style="font-size: 22px; font-weight: 700;">Estatus:</span>
                        </div>
                        <div class="col-md-8 d-flex justify-content-end align-items-baseline">
                            <span
                                style="font-size: 26px; font-weight: 700;">100%</span>&nbsp;&nbsp;<span>completado</span>
                        </div>
                    </div>
                </div>
                <div id="line-date-inagurado" class="py-1">
                    <span style="color: #2C4143"><b>Inagurado: 03/oct/2020</b></span>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Section - Mapa de la localización -->
    <div class="row" >
        <div class="col-md-12">
            <form action="" class="formulario-projects-serach" method="post">
                <select name="" id="">
                    <option value="">Entidad o municipio</option>
                    <option value="">Opción 1</option>
                    <option value="">Opción 2</option>
                    <option value="">Opción 3</option>
    
                </select>
                <select name="" id="">
                    <option value="">Sector</option>
                    <option value="">Opción 1</option>
                    <option value="">Opción 2</option>
                    <option value="">Opción 3</option>
    
                </select>
                <select name="" id="">
                    <option value="">Subsector</option>
                    <option value="">Opción 1</option>
                    <option value="">Opción 2</option>
                    <option value="">Opción 3</option>
    
                </select>
                <select name="" id="">
                    <option value="">Agente Multisectorial</option>
                    <option value="">Opción 1</option>
                    <option value="">Opción 2</option>
                    <option value="">Opción 3</option>
    
                </select>
                <select name="" id="">
                    <option value="">C.P.</option>
                    <option value="">Opción 1</option>
                    <option value="">Opción 2</option>
                    <option value="">Opción 3</option>
    
                </select>
                <input type="text" value="Nombre del proyecto">
                <center>
                    <button>BÚSQUEDA</button>
                </center>
                <a href="#" style="float: right; color: #2C4143">X</a>
            </form>
            <div class="detalle-punto">
                <p>TLAQUEPANQUE</p>
                <div class="opciones-detelle">
                    <span><img width="15px" src="{{asset('assets/img/project/icons/pen-icon.png')}}" alt=""> 6 Proyectos</span><br>
                    <span><img width="15px" src="{{asset('assets/img/project/icons/usuario-icon.png')}}" alt=""> 251,256 personas</span>
                </div>
                <center>
                    <button>Seleccionar</button>
                </center>
                <a href="#" style="float: right; color: #2C4143">X</a>
                
            </div>
            
            {{-- <div class="col-md-12">
            </div> --}}
        </div>
    </div>
    <div id="map" class="row mapa"></div>
    


    <!-- Section - Datos generales -->
    <div class="row mt-5">
        <div class="col-md-8 background-title px-0 py-1">
            <h3 class="py-2 font-weight-bold" style="background-image: url('assets/img/project/barra resultados.png'); background-repeat: no-repeat;
                background-size: cover;">
            <span style="font-weight: 700; margin-left: 115px;">Resultados</span>    
            </h3>
            
        </div>
    </div>
    <div class="container">
        <style>
            .links-color{
                color: #628ea0;
                font-weight: bold;
            }
            .btn-conoce-mas{
                float: right;
                background: red;
                padding: 5px 30px 5px 30px;
                border-radius: 50px;
                box-shadow: 5px 5px 2px #999;

            }
            .btn-conoce-mas:hover{
                background: rgba(218, 3, 3, 0.904);
                color: rgb(230, 230, 230);
            }
            .secciones-projects{
                padding: 25px 40px 20px 40px; 
                border-top: 1px solid #628ea0; 
                border-left: 8px solid #628ea0; 
                border-right: 1px solid #628ea0;
            }
        </style>
        <div class="my-5 secciones-projects">
            <h5 style="color: 628ea0"><b>REVESTIMIENTO Y SANEAMIENTO DEL CANAL DE AGUAS PLUVIALES</b></h5>
            El proyecto de infraestructura con nombre: “Revestimiento y saneamiento del canal en la Calle Arroyo entre
            Calle Platino y Cantera, en la <br>
            Colonia Mariano Otero, municipio de Zapopan, Jalisco.” <br>
            El objetivo es el revestimiento y saneamiento del canal de aguas pluviales que se encuentra en la Calle
            Arroyo entre Calle Platino y <br>
            Cantera, en la Colonia Mariano Otero, municipio de Zapopan, Jalisco.
            <div class="row mt-3">
                <div class="col-md-12 ">
                    <a href="#" class="links-color">Sector Público</a> <span class="links-color">/</span>
                    <a href="#" class="links-color">Ayuntamiento de Zapopan</a>
                    <a href="#" class="btn-conoce-mas">Conoce más</a>
                </div>
            </div>
        </div>
        <div class="my-5 secciones-projects ">
            <h5 style="color: 628ea0"><b>LÍNEA 3 DEL TREN ELÉCTRICO DE GUADALAJARA</b></h5>
            La Linea 3 de Mi Tren, es una de las obras más importantentes en cuanto a infraestructura de transporte público para <br> 
            el Área Metropolitana de Guadalajara y que sumará a la apuesta del Gobierno de Jalisco por una movilidad <br> 
            integrada que conecte a los usuarios de forma rápida, accesible y segura.
            
            <div class="row mt-3">
                <div class="col-md-12 ">
                    <a href="#" class="links-color">Sector Público</a> <span class="links-color">/</span>
                    <a href="#" class="links-color">Gobierno de Jalisco</a>
                    <a href="#" class="btn-conoce-mas">Conoce más</a>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
</div>

@endsection

@section('scripts')
<script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHzvoUaKDOaWGOu0ZNUpB_SJigsBgOOzI&callback=initMap&libraries=places&v=weekly&language=mx&region=MX"
    defer></script>

<script>

        
        var map = L.map('map').
            setView([41.66, -4.72],
                14);

            

        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
            maxZoom: 80
        }).addTo(map);

        L.marker([51.5, -0.09]).addTo(map)
        .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
        .openPopup();

        /* Google maps init
        let map;
    
        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: -34.397,
                    lng: 150.644
                },
                zoom: 8,
            });
        }*/
</script>
@endsection
