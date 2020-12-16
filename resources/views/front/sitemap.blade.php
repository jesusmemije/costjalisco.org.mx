@extends('front.layouts.app')
 
@section('title')
Revestimiento y saneamiento del canal de aguas pluviales
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css"/>



          

<!--\cost\costjalisco\public\assets\img\mapa.png-->

@endsection

<style>
#sitio{
  margin-top: 5%;
  margin-bottom: 5%
}
</style>

@section('content')


 <center> 


  <img id="sitio" src="assets/img/mapa.png" width=" " height="650">

 </center> 

 

@endsection

@section('scripts')

@endsection
