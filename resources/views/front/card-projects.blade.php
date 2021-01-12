@extends('front.layouts.app')

@section('title')
Proyectos
@endsection

@section('content')
<div class="container-fluid pt-4">
    <!-- Section - Datos generales -->
    <div class="container">
        <style>
            .links-color {
                color: #628ea0;
                font-weight: bold;
            }

            .btn-conoce-mas {
                float: right;
                background: red;
                padding: 5px 30px 5px 30px;
                border-radius: 50px;
                box-shadow: 5px 5px 2px #999;

            }

            .btn-conoce-mas:hover {
                background: rgba(218, 3, 3, 0.904);
                color: rgb(230, 230, 230);
            }

            .seccione-project {
                padding: 20px 0px 0px 0px;
                border-top: 1px solid red;
                border-left: 1px solid red;
                border-right: 1px solid red;
            }

            .projets-pro {
                margin: 0px 25px 0px 25px;
                /* padding: 20px 25px 0px 25px; */
                /* width: 250px; */
                width: 100%;
                background: #d5d6be;
                border-radius: 0px 30px 0px 0px;
            }

            .encabezado-project {
                height: 75px;
                padding: 20px 20px 8px 20px;
            }

            .pie-project {
                padding: 10px 20px 0px 20px;
                background: #2C4143;
            }

            .pie-project p {
                color: #fff;
                font-size: 14px;
                padding: 0px;
                margin: 0px;
            }

            .detalle-project {
                padding: 5px;
            }

            .detalle-project a {
                /* float: right; */
                color: red;
                font-weight: bold;
                font-size: 12px;
                margin-left: 170px
            }

            .detalle-project a:hover {
                color: rgb(199, 0, 0);
            }

            .projets-pro-buscar {
                width: 95%;
                margin: 0px 0px 0px 45px;
                padding: 30px 30px 30px 30px;
                background: #628ea0;
                border-radius: 30px 0px 0px 30px;

            }

            .projets-pro-buscar ul li {
                color: #fff;
                font-size: 12px;
            }

            .projets-pro-buscar button {
                margin: 20px 0px 10px 0px;
                background: #2C4143;
                color: #fff;
                border-radius: 50px;
                font-size: 13px;
                padding: 1px 20px 1px 20px;
                border: 0;
            }

            .projets-pro-buscar button:hover {
                background: #1d2a2c;
                color: rgb(204, 204, 204);
            }

            @media only screen and (max-width: 480px) {

                .seccione-project {
                    padding: unset;
                }

                .projets-pro {
                    margin: unset;
                    padding: 20px 25px 0px 25px;
                }

                .encabezado-project {
                    padding: 20px 0px 8px 0px;
                }

                .projets-pro-buscar {
                    width: 100%;
                    margin: unset;
                }

            }

        </style>

        <div class="my-1 seccione-project">
            <div class="" style="border-left: 5px solid red; padding-left: 15px; ">
                <h2 class="my-4 py-0 font-weight-bold" style="padding: 0">
                    <span style="font-weight: 700; margin-left: 0px; padding: 0; color: red;"><b> Proyectos</b></span>
                </h2><br>
            </div>
        </div>
        <div class="my-4">
            <div class="row">

                @foreach ($projects as $project)
                <div class="col-md-3 mb-5">
                    <div class="projets-pro">
                        <div class="encabezado-project">
                            <h5>
                                <b>
                                    @php
                                    $titulo=substr($project->title,0,35).'...';
                                    @endphp
                                    {{ $titulo }}
                                </b>
                            </h5>
                        </div>
                        @php
                        $imagen=DB::table('projects_imgs')
                        ->select('projects_imgs.imgroute')
                        ->where('projects_imgs.id_project','=',$project->id)
                        ->get();
                        @endphp
                        @if (count($imagen)==0)
                        <img src="{{ asset('projects_imgs/sinimagen.png') }}" width="255" height="280"
                            style="border: 2px solid rgb(180, 180, 180); width: 100%;" alt="">
                        @else
                        <img src="{{ asset('projects_imgs/'.$imagen->last()->imgroute) }}" style="width: 100%;" width="255" height="280"
                            alt="">

                        @endif
                        {{-- <img src="http://pice-software.com/costjalisco/public/assets/img/project/proyecto1.jpg" class="img-fluid" width="280" alt="Chatbot - Página CoST Jalisco" style="background: #647d80"> --}}
                        <div class="pie-project">
                            @php
                            $sector_rec=substr($project->sector,0,12).'..';
                            $subsector_rec=substr($project->subsector,0,35).'...';
                            @endphp
                            <p style="font-size: 20px"><b style="margin: 0; padding: 0;">Sector {{$sector_rec}}</b></p>
                            <p style="padding-bottom: 5px"><i style="margin: 0; padding: 0;">{{$subsector_rec}}</i></p>
                        </div>
                        <div class="detalle-project">
                            <a href="{{ route('project-single', $project->id) }}"><i>Ver más >></i></a>
                        </div>
                    </div>
                    <br>
                </div>
                @endforeach

                <div class="col-md-3 my-4">
                    <div class="projets-pro-buscar">
                        <br><br>
                        <center>
                            <img src="http://pice-software.com/costjalisco/public/assets/img/home/chatbot.png"
                                class="img-fluid" width="280" alt="Chatbot - Página CoST Jalisco">
                        </center>
                        <br>
                        <ul>
                            <li><a href="{{ route('list-projects') }}">Conoce más proyectos</a></li>
                            <li><a href="{{ route('newsletters') }}">Boletines</a></li>
                            <li><a href="{{ route('journal') }}">Noticias</a></li>
                        </ul>
                        <center>
                            <button><a href="{{ route('search-engine') }}">Buscar</a></button>
                        </center>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br class="hidden-phone"><br class="hidden-phone"><br class="hidden-phone">
</div>

@endsection

@section('scripts')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
@endsection