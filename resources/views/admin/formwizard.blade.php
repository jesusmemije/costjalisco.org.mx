<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHzvoUaKDOaWGOu0ZNUpB_SJigsBgOOzI&callback=initMap&libraries=places&v=weekly&language=mx&region=MX"
      defer
    ></script>
@extends("admin/layouts/layout")
@section('styles')

<style>


#map{
    height: 50%;
    width: 50%;
   
}
</style>


@endsection

@section('contenido')

    
    <div id="map"></div>
    


@endsection

@section('scripts')

<script>


let map;

function initMap() {

  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8,
  });
}
  </script>
@endsection
