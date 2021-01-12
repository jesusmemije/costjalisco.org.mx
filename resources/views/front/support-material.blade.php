@extends('front.layouts.app')
@section('title')
Material de Apoyo
@endsection

@section('content')

<style>
    body {
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: left;
        background-color: #fff;
    }

 

    .c2 {
        color: #d60000;
        font-weight: bold;
    }



    .my2 {
        border-top: 1px solid #d60000;
        border-left: 1px solid #d60000;
        border-right: 1px solid #d60000;
        margin-top: 4%;
        height: 100px;
    }

  

    .tlt {
        padding-left: 3.7%;
        padding-top: 3%;
    }

    .f {
        margin-left: 3%;
        margin-right: -1.5%;
    }

    .my2 {
        border-top: 1px solid #d60000;
        border-left: 1px solid #d60000;
        border-right: 1px solid #d60000;
        margin-top: 4%;
        height: 100px;
    }

  

    .color1 {
        border-left: 5px solid #2c4143;
        margin-top: 4%;
    }

    .color2 {
        border-left: 5px solid #d60000;
        margin-top: 4%;
    }
    .material{
      
        height: 210px;
    }
    .title{
     
     background-color: black;
    }
    .title h6{
        color:white;
        font-weight: 600;
        height: 35px;
       padding:10px;
       padding-left:10%;

    }
    .part1{
        background-color:  #d8d8cd;
    }
    .content1 h5{
        color:#2c4143;
        font-weight: 600;
        text-align: justify;
    }
    .iframe{
        width: 100%;
        height: 100%;
    }

</style>

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
<div class="container" ><!--
    <div class="row material" style="margin-bottom: 5%;">
    

    <div class="col-md-5 col-12 part1">
        <div class="row title" style="margin-top:8%;" id="seminarioabierto">
           <h6>SEMINARIO DE DATOS ABIERTOS:</h6> 
        </div>
        <div class="content1"  style="margin-top: 4%;">
           <h5> Herramienta indespensable en la lucha contra la corrupción en la infraestructura y obra pública.
</h5>
        </div>
    </div>

    <div class="col-md-5" style="background-color:#2c4143;">
    <iframe class="iframe" src="https://www.youtube.com/embed/nd2Bc99HgRE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="col-md-2" style="background-color:#d60000;">
        <div style="color:white; margin-top:40%">
        <span style="font-weight:bold;">Módulo 1.</span><br>
      <span>Marco General</span><br>
      <span style="font-weight:bold; font-style:italic">PARTE 1</span>
        </div>
     
    <div class="row" style="background-color: #ffce32; margin-top:32%; font-weight:600; justify-content: center;
  align-items: center;">
    <span>22 de Junio de 2020</span>
    </div>
      
    </div>



    </div>

    <div class="row material" style="margin-bottom: 5%;">
    

    <div class="col-md-5 part1">
        <div class="row title" style="margin-top:8%;">
           <h6>SEMINARIO DE DATOS ABIERTOS:</h6> 
        </div>
        <div class="content1"  style="margin-top: 4%;">
           <h5> Herramienta indespensable en la lucha contra la corrupción en la infraestructura y obra pública.
</h5>
        </div>
    </div>

    <div class="col-md-5" style="background-color:#2c4143;">
    <iframe class="iframe" src="https://www.youtube.com/embed/nd2Bc99HgRE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="col-md-2" style="background-color:#d60000;">
        <div style="color:white; margin-top:40%">
        <span style="font-weight:bold;">Módulo 1.</span><br>
      <span>Marco General</span><br>
      <span style="font-weight:bold; font-style:italic">PARTE 2</span>
        </div>
     
    <div class="row" style="background-color: #ffce32; margin-top:32%; font-weight:600; justify-content: center;
  align-items: center;">
    <span>22 de Junio de 2020</span>
    </div>
      
    </div>



    </div>
   --->
   


   @foreach($materials as $material)

   <div class="row material" style="margin-bottom: 5%;">
    

    <div class="col-md-5 col-12 part1">
        <div class="row title" style="margin-top:8%;">
           <h6>{{$material->titulo}}</h6> 
        </div>
        <div class="content1"  style="margin-top: 4%;">
           <h5>{{$material->descripcion}}
</h5>
        </div>
    </div>

    <div class="col-md-5" style="background-color:#2c4143;">
    <iframe class="iframe" src="{{$material->url}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="col-md-2" style="background-color:#d60000;">
        <div style="color:white; margin-top:40%">
       
       <?php
       
       $claves = array_map('trim', preg_split('/\R/', $material->modulo));
       
       ?>

       @foreach($claves as $clave)
       <span>{{$clave}}</span><br>
       @endforeach
      
      
        </div>
     
    <div class="row" style="background-color: #ffce32; margin-top:32%; font-weight:600; justify-content: center;
  align-items: center;">
    <span>{{$material->created_at->format('d/m/Y h:i A') }}</span>
    </div>
      
    </div>



    </div>


   @endforeach


</div>


@endsection

@section('scripts')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    
<script>
    var mymap = L.map('mapid').setView([51.505, -0.09], 13);
</script>
@endsection