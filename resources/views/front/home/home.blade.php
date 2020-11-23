@extends('front.layouts.app')

@section('title')
Home
@endsection

@section('content')

<div id="main">
    <div id="carouselHome" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselHome" data-slide-to="0" class="active"></li>
            <li data-target="#carouselHome" data-slide-to="1"></li>
            <li data-target="#carouselHome" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/img_chania.jpg') }}" alt="">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1>INFRAESTRUCTURA <br> VALORADA</h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/img_chania.jpg') }}" alt="">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>INFRAESTRUCTURA <br> VALORADA</h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/img_chania.jpg') }}" alt="">
                <div class="container">
                    <div class="carousel-caption text-right">
                        <h1>INFRAESTRUCTURA <br> VALORADA</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection