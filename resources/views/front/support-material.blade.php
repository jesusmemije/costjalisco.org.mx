@extends('front.layouts.app')
@section('title')
Material de Apoyo
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />
<link href="{{asset("assets/css/support-material.css")}}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row my2" style="margin-bottom: 5%;">
        <div class="color2"></div>
        <div class="tlt">
            <div style="margin-left:-3%">
                <h2 class="c2">Material de Apoyo
                    <img src="{{ asset('assets/img/logotipo.png') }}" class="img-fluid" width="790"></h2>
            </div>
        </div>
    </div>
</div>
<!---->
<!--<div class="row mb-12 align-items-center">
        <div class="col-md-6">
            <a>
                <img src="{{ asset('assets/img/logotipo.png') }}" class="img-fluid" width="1000" alt="">
            </a>
        </div>
    </div>-->
<div class="container">
    <div class="row material">
        <div class="col-md-5 col-12 part1">
            <div class="row title" id="seminarioabierto">
                <h6>SEMINARIO DE DATOS ABIERTOS:</h6>
            </div>
            <div class="row mt-2 row-modulo hidden-desktop">
                <div class="col-12">
                    <span style="font-weight:bold;">Módulo 1.</span> Marco General
                    <div style="font-weight:bold; font-style:italic">PARTE 1</div>
                </div>
            </div>
            <div class="content1">
                <h5> Herramienta indespensable en la lucha contra la corrupción en la infraestructura y obra pública.
                </h5>
            </div>
        </div>
        <div class="col-md-5" style="background-color:#2c4143;">
            <iframe class="iframe" src="https://www.youtube.com/embed/nd2Bc99HgRE" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>
        <div class="col-md-12 px-0 text-right hidden-desktop" style="margin-top: 5px;">
            <span class="fecha-material-phone">22 de Junio de 2020</span>
        </div>
        <div class="col-md-2 hidden-phone" style="background-color:#d60000;">
            <div class="container-modulo">
                <span style="font-weight:bold;">Módulo 1.</span><br>
                <span>Marco General</span><br>
                <span style="font-weight:bold; font-style:italic">PARTE 1</span>
            </div>
            <div class="row fecha-material">
                <span>22 de Junio de 2020</span>
            </div>
        </div>
    </div>

    <div class="row material">
        <div class="col-md-5 part1">
            <div class="row title">
                <h6>SEMINARIO DE DATOS ABIERTOS:</h6>
            </div>
            <div class="row mt-2 row-modulo hidden-desktop">
                <div class="col-12">
                    <span style="font-weight:bold;">Módulo 1.</span> Marco General
                    <div style="font-weight:bold; font-style:italic">PARTE 2</div>
                </div>
            </div>
            <div class="content1">
                <h5> Herramienta indespensable en la lucha contra la corrupción en la infraestructura y obra pública.
                </h5>
            </div>
        </div>
        <div class="col-md-5" style="background-color:#2c4143;">
            <iframe class="iframe" src="https://www.youtube.com/embed/nd2Bc99HgRE" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>
        <div class="col-md-12 px-0 text-right hidden-desktop" style="margin-top: 5px;">
            <span class="fecha-material-phone">22 de Junio de 2020</span>
        </div>
        <div class="col-md-2 hidden-phone" style="background-color:#d60000;">
            <div class="container-modulo">
                <span style="font-weight:bold;">Módulo 1.</span><br>
                <span>Marco General</span><br>
                <span style="font-weight:bold; font-style:italic">PARTE 2</span>
            </div>
            <div class="row fecha-material">
                <span>22 de Junio de 2020</span>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>

<script>
    var mymap = L.map('mapid').setView([51.505, -0.09], 13);
</script>
@endsection