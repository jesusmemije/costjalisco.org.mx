@extends('front.layouts.app')

@section('title')
    Descripción del Boletín
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset("assets/css/newsletter.css")}}">
@endsection

@section('content')

<div class="row mx-0 my-4 hidden-phone">
    <div class="col-md-6 px-0">
        <div class="text-center text-white">
            <h3 class="py-2 font-weight-bold title-barra-roja">Boletines</h3>
        </div>
    </div>
</div>

<br class="hidden-desktop">

<div class="row mx-0">
    <div class="col-md-3 px-0">
        <img src="{{ asset($boletin->img_rute) }}" style="width: 100%; height:295px;" alt="">
    </div>
    <div class="media-body">
        <div class="col-md-12" style="background-color:#628EA0; color:#fff; padding:5%;">
            <span class="title-boletin">{{ $boletin->title}}</span>
        </div>
        <div class="col-md-6 date">
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
    </div>
</div>

<div class="container content" style="margin-top:2%; margin-bottom:4%; word-wrap: break-word;">
    @php
    echo $boletin->content;
    @endphp
</div>


</div>

@endsection

@section('scripts')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script>
    window.smoothScroll = function(target) {
        var scrollContainer = target;
        do { //find scroll container
            scrollContainer = scrollContainer.parentNode;
            if (!scrollContainer) return;
            scrollContainer.scrollTop += 1;
        } while (scrollContainer.scrollTop == 0);
        
        var targetY = 0;
        do { //find the top of target relatively to the container
            if (target == scrollContainer) break;
            targetY += target.offsetTop;
        } while (target = target.offsetParent);
        
        scroll = function(c, a, b, i) {
            i++; if (i > 30) return;
            c.scrollTop = a + (b - a) / 30 * i;
            setTimeout(function(){ scroll(c, a, b, i); }, 20);
        }
        // start scrolling
        scroll(scrollContainer, scrollContainer.scrollTop, targetY, 0);
    }
        
</script>
@endsection