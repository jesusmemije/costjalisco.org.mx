@extends('front.layouts.app')

@section('title')
    Material de Apoyo
@endsection

@section('styles')
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

<div class="container">

    @foreach($materials as $material)

    @php
        $claves = array_map('trim', preg_split('/\R/', $material->modulo));
    @endphp

    <div class="row material" style="margin-bottom: 5%;">

        <div class="col-md-5 col-12 part1">
            <div class="row title">
                <h6>{{$material->titulo}}</h6>
            </div>
            <div class="row mt-2 row-modulo hidden-desktop">
                <div class="col-12">

                    @foreach($claves as $clave)
                        <span>{{$clave}}</span><br>
                    @endforeach

                </div>
            </div>
            <div class="content1">
                <h5>{{$material->descripcion}}</h5>
            </div>
        </div>

        <div class="col-md-5" style="background-color:#2c4143;">
            <iframe class="iframe" src="{{$material->url}}" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>

        <div class="col-md-12 px-0 text-right hidden-desktop" style="margin-top: 5px;">
            <span class="fecha-material-phone">{{$material->created_at->format('d/m/Y h:i A') }}</span>
        </div>

        <div class="col-md-2 hidden-phone" style="background-color:#d60000;">

            <div class="container-modulo">

                @foreach($claves as $clave)
                <span>{{$clave}}</span><br>
                @endforeach

            </div>
            <div class="row fecha-material">
                <span>{{$material->created_at->format('d/m/Y h:i A') }}</span>
            </div>
        </div>
    </div>

    @endforeach
</div>

@endsection