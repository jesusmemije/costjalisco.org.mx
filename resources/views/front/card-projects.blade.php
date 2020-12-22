@extends('front.layouts.app')
 
@section('title')
Proyectos
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
@endsection

@section('content')
<div class="container-fluid pt-4">
    <!-- Section - Datos generales -->
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
            .seccione-project{
                padding: 20px 0px 0px 0px; 
                border-top: 1px solid red; 
                border-left: 1px solid red; 
                border-right: 1px solid red;
            }
            .projets-pro{
                margin: 0px 25px 0px 25px;
                /* padding: 20px 25px 0px 25px; */
                /* width: 250px; */
                width: 100%;
                background: #d5d6be;
                border-radius: 0px 30px 0px 0px;
            }
            .encabezado-project{
                padding: 20px 20px 8px 20px;
            }
            .pie-project{
                padding: 10px 20px 0px 20px;
                background: #2C4143;
            }
            .pie-project p{
                color: #fff;
                font-size: 14px;
                padding: 0px;
                margin: 0px;
            }
            .detalle-project{
                padding: 5px;
            }
            .detalle-project a{
                /* float: right; */
                color: red;
                font-weight: bold;
                font-size: 12px;
                margin-left: 170px
            }
            .detalle-project a:hover{
                color: rgb(199, 0, 0);
            }
            .projets-pro-buscar{
                margin: 0px 0px 0px 25px;
                padding: 30px;
                background: #628ea0;
                border-radius: 30px 0px 0px 30px;

            }
            .projets-pro-buscar ul li{
                color: #fff;
                font-size: 12px;
            }
            .projets-pro-buscar button{
                margin: 20px 0px 10px 0px;
                background: #2C4143;
                color: #fff;
                border-radius: 50px;
                font-size: 13px;
                padding: 1px 20px 1px 20px;
                border: 0;
            }
            .projets-pro-buscar button:hover{
                background: #1d2a2c;
                color: rgb(204, 204, 204);
            }
        </style>
        <div class="my-1 seccione-project">
            <div class="" style="border-left: 5px solid red; padding-left: 15px; " >
                <h2 class="my-4 py-0 font-weight-bold" style="padding: 0">
                <span style="font-weight: 700; margin-left: 0px; padding: 0; color: red;" ><b> Proyectos</b></span>    
                </h2><br>
            </div>
        </div>
        <div class="my-4">
            <div class="row">

                @foreach ($projects as $project)
                <div class="col-md-3 mb-4">
                    <div class="projets-pro">
                        <div class="encabezado-project">
                            <h5>
                                <b>
                                    {{ $project->title }}
                                </b>
                            </h5>
                        </div>
                        <img src="http://pice-software.com/costjalisco/public/assets/img/project/proyecto1.jpg" class="img-fluid" width="280" alt="Chatbot - Página CoST Jalisco" style="background: #647d80">
                        <div class="pie-project">
                            <p style="font-size: 20px"><b style="margin: 0; padding: 0;">Sector Público</b></p>
                            <p style="padding-bottom: 5px"><i style="margin: 0; padding: 0;">Gobierno de Jalisco</i></p>
                        </div>
                        <div class="detalle-project">
                           <a href="{{ route('project-single', $project->id) }}"><i>Ver más >></i></a>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="col-md-3 my-4">
                    <div class="projets-pro-buscar">
                        <br>
                        <center>
                            <img src="http://pice-software.com/costjalisco/public/assets/img/home/chatbot.png" class="img-fluid" width="280" alt="Chatbot - Página CoST Jalisco" >
                        </center>
                        <ul>
                            <li><a href="{{ route('list-projects') }}">Conoce más proyectos</a></li>
                            <li><a href="{{ route('newsletters') }}">Boletines</a></li>
                            <li><a href="{{ route('journal') }}">Noticias</a></li>
                        </ul>
                        <center>
                            <button><a href="{{ route('search-engine') }}">Buscar</a></button>
                        </center>
                    </div>
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

@endsection
