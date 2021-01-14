@extends('front.layouts.app')

@section('title')
Boletines
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset("assets/css/newsletter.css")}}">
@endsection


@section('content')
<div class="container-fluid pt-md-4">
    <!-- Section - Datos generales -->
    <div class="container">
        
        <div class="seccion-project">
            <div class="border-red-left">
                <h3 class="my-4 py-0 font-weight-bold" style="padding: 0">
                    <span style="font-weight: bold; margin-left: 10px; padding: 0; color: red;"><b> Boletines</b></span>
                </h3><br class="hidden-phone">
            </div>
        </div>
        @if (count($boletines)==0)
        <center>No hay boletines</center>
        @else
        @foreach ($boletines as $boletin)
        <div class="row container-boletin">
            <div class="col-md-5 px-0">
                <img src="{{ asset($boletin->img_rute) }}" style="width: 100%; height:265px;" alt="">
            </div>

            <div class="media-body">

                <div class="col-md-12" style="background-color:#628EA0; color:#fff; padding:6%;">
                    <span class="title-bolentin">{{$boletin->title}}</span>
                </div>
                <div class="col-md-12">
                    <div class="row ">
                        <div class="col-md-8 date">
                            @if (empty($boletin->date))
                            <center>No hay fecha</center>
                            @else
                            @php
                            setlocale(LC_TIME, "spanish");
                            $mi_fecha = $boletin->date;
                            $mi_fecha = str_replace("/", "-", $mi_fecha);
                            $Nueva_Fecha = date("d-M-Y", strtotime($mi_fecha));
                            $fecha_correcta = strftime("%d de %B de %Y", strtotime($Nueva_Fecha));

                            // echo $Mes_Anyo;
                            @endphp
                            {{ $fecha_correcta }}

                            @endif
                        </div>
                        <div class="col-md-3 mt-4 mb-2"><a href="{{route('newsletter-single',[$boletin->id])}}"
                                class="ver-mas"><i>Ver más >></i></a></div>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
        @endif

    <div class="row">
        <br><br><br>
        {{-- <div class="col-md-12 mt-5">
            <button type="button" class="btn-tbl-link">></button>
                span class="contador">1 de 1</span>
            <button type="button" class="btn-tbl-link"><</button>
        </div> --}}
    </div>
</div>
<br class="hidden-phone">
<br class="hidden-phone">
<br class="hidden-phone">
<br class="hidden-phone">
</div>

@endsection

@section('scripts')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
@endsection