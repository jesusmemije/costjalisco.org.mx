@extends('front.layouts.app')

@section('title')
Mapa del sitio
@endsection

@section('styles')
<style>
  @media only screen and (max-width: 480px) {
    .title-barra-roja {
      background-size: 98%;
      font-size: 20px;
    }
  }
</style>
@endsection

@section('content')
<div class="row mx-0">
  <div class="col-md-6 col-12 px-0 mt-md-2 mt-4">
    <div class="text-center text-white">
      <h3 class="py-2 font-weight-bold title-barra-roja">Mapa del Sitio CoST Jalisco</h3>
    </div>
  </div>
</div>
<div class="container">
  <div class="row mx-0">
    <div class="col-md-12 col-12 text-center px-0">
      <img src="{{asset('assets/img/mapa.png')}}" class="img-fluid my-md-5 my-3">
    </div>
  </div>
</div>
@endsection