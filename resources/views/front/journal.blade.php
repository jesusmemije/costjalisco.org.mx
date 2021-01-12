@extends('front.layouts.app')
@section('title')
Notas perodísticas
@endsection

@section('styles')
<link href="{{asset("assets/css/journal.css")}}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row my2" style="margin-bottom: 5%;">
        <div class="color2"></div>
        <div class="tlt">
            <h2 class="c2">Notas periodísticas<h2>
        </div>
    </div>
    @if (count($journal)==0)
    <center>No hay noticias</center>
    @else
    @foreach ($journal as $jour)
    <div class="media" style="margin-left: 8%; margin-bottom:4%;">
        <div id="mural" style="height:112px; text-align: center;" class="col-md-3">
            <img style="margin-top: 3%" src="{{asset($jour->rutaimg)}}" width="230px" height="100px" alt="">
        </div>

        <div class="media-body">
            <div id="titulo" style="margin-top:4%;">
                @php
                $titulo=substr($jour->title,0,38).'...';
                @endphp

                <h3 style="margin-left:3%;">{{ $titulo }}</h3>
            </div>
            <div id="url" class="col-md-10" style="background-color: #d8d8cd;">
                <div class="py-2">
                    <a class="url-a" target="_blank" href="{{$jour->url_periodico}}">{{$jour->url_periodico}}</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif

</div>

@endsection