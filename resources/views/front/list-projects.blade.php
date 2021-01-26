@extends('front.layouts.app')

@section('title')
Listado de obras
@endsection

@section('styles')
<link href="{{asset("assets/css/list-projects.css")}}" rel="stylesheet">
@endsection

@section('content')

<div class="container-fluid py-4">

    <div class="row" style="background: #fff">
        <div class="col-lg-6 col-md-12 col-sm-12 background-title bg-rojo px-0 py-1">
            <span class="topic">Listado de Obras</span>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row mb-5">
            <div class="col-lg-5">
                <a href="">
                    <div class="container-item d-flex justify-content-between align-items-center text-white">
                        <img src="{{ asset('assets/img/project/institucion.png') }}" class="img-fluid" width="36" alt="">
                        <strong>Ayuntamiento de Guadalajara</strong>
                        <img src="{{ asset('assets/img/project/flecha.png') }}" class="img-fluid icon-arrow" alt="">
                    </div>
                </a>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg-5">
                <a href="">
                    <div class="container-item d-flex justify-content-between align-items-center text-white">
                        <img src="{{ asset('assets/img/project/institucion.png') }}" class="img-fluid" width="36" alt="">
                        <strong>Ayuntamiento de Zapopan</strong>
                        <img src="{{ asset('assets/img/project/flecha.png') }}" class="img-fluid icon-arrow" alt="">
                    </div>
                </a>
            </div>
        </div>
    </div>

</div>

@endsection