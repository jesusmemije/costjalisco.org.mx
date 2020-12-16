@extends('front.layouts.app')
 
@section('title')
Estadísticas
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
@endsection


@section('content')
<style>
    .links-color{
        color: #628ea0;
        font-weight: bold;
    }
    .btn-conoce-mas{
        float: right;
        background: #d60000;
        color: #fff;
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
<div class="container-fluid pt-4">
    <!-- Section - Datos generales -->
    <div class="row mt-5" id="datos-generales">
        <div class="col-md-6 background-title px-0 py-1" style="background-image: url('assets/img/newsletters/background-title.png'); background-repeat: no-repeat;
        background-size: cover;">
            <span style="font-weight: 700; margin-left: 140px;">Estadísticas</span>
        </div>
        <div class="col-md-6 px-0">
            <div class="" style="margin-top: 25px;
            border-bottom: 1px solid #628ea0;"></div>
        </div>
    </div>
    <div class="container">
        <div class="my-5">
            <div class="row">
                <div class="col-md-3" style="background: #61a8bc; padding: 50px;">
                    <h4 class="mt-4 mb-4" style="color: #fff; font-weight: bold;">Organizaciones</h4>
                    <center>
                        <img src="{{asset('assets/img/estadisticas/organizaciones icon.png')}}" width="90px" alt="">
                    </center>
                </div>
                <div class="col-md-9" style="padding: 20px;">
                    <div style="border-left: 7px solid #61a8bc; padding: 15px;">
                        <p style="margin-left: 15px;">Algunas de las instituciones que han colaborado son:</p>
                        <ul>
                            <li>Gobierno del Estado de Jalisco</li>
                            <li>Ayuntamiento de Guadalajara</li>
                            <li>Ayuntamiento de Zapopan</li>
                            <li>Universidad de Guadalajara</li>
                            <li>Transversal Think Tank</li>
                            <li>Colectivo Ciudadadanos por Municipios Transparentes(CIMTRA)</li>
                            <li>Consejo Mexicano de Comercio Exterior de Occidente A.C (COMCE)</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3" style="background: #58707c; padding: 50px 50px;">
                    <h4 class="mt-4 mb-4" style="color: #fff; font-weight: bold;">Proyectos de la iniciativa</h4>
                    <center>
                        <img src="{{asset('assets/img/estadisticas/pyectos icon.png')}}" width="90px" alt="">
                    </center>
                </div>
                <div class="col-md-9" style="padding: 20px;">
                    <div style="border-left: 7px solid #58707c; padding: 15px;">
                        <p style="margin-left: 15px;" >Hasta 2020 los proyectos han sido los siguientes:</p><br>
                        <h4 style="font-weight: bold; margin-left: 15px;">Línea 3 del Tren Eléctrico de Guadalajara</h4>
                        <h4 style="font-weight: bold; margin-left: 15px;">Saneamiento y revestimiento de aguas pluviales en Zapopan</h4>
                        <h4 style="font-weight: bold; margin-left: 15px;">Macrolibramiento de Guadalajara</h4><br>
                        <a href="{{route('home.projects')}}" class="btn-conoce-mas">Conoce más</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3" style="background: #ffce33; padding: 50px 50px;">
                    <h4 class="mt-4 mb-4" style="color: #fff; font-weight: bold;">Personas beneficiadas</h4>
                    <center>
                        <img src="{{asset('assets/img/estadisticas/beneficiados-icon.png')}}" width="90px" alt="">
                    </center>
                </div>
                <div class="col-md-9" style="padding: 20px;">
                    <div style="border-left: 7px solid #ffce33; padding: 15px;"><br><br><br><br>
                        <h3 style="font-weight: bold; margin-left: 15px;">896,256 mil beneficiados</h3>
                        <br><br><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3" style="background: #d60000; padding: 50px 50px;">
                    <h4 class="mt-4 mb-4" style="color: #fff; font-weight: bold;">Presupuesto utilizado</h4>
                    <center>
                        <img src="{{asset('assets/img/estadisticas/presupuesto icon.png')}}" width="90px" alt="">
                    </center>
                </div>
                <div class="col-md-9" style="padding: 20px;">
                    <div style="border-left: 7px solid #d60000; padding: 15px;"><br>
                        <p style="margin-left: 15px;" >Presupuesto utilizado desde la iniciativa de CoST Jalisco</p><br>
                        <br>
                        <h3 style="font-weight: bold; margin-left: 15px;">$ 4'435,567.20</h3>
                        <br><br>
                    </div>
                </div>
            </div>
            
        </div>
    </div><br><br>
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
            maxZoom: 18
        }).addTo(map);

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
