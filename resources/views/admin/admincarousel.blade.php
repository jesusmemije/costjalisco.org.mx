@extends("admin.layouts.app")


@section('content')


<script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />

 <!-- google maps links
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHzvoUaKDOaWGOu0ZNUpB_SJigsBgOOzI&callback=initMap&libraries=places&v=weekly&language=mx&region=MX" defer></script>
-->
@section('styles')

<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="{{asset('plugins/imageuploader/dist/image-uploader.min.css')}}">

<style>
  label {
    color: black;

  }

  #map {
    height: 500px;
    width: 100%;
  }

  #description {
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
  }

  #infowindow-content .title {
    font-weight: bold;
  }

  #infowindow-content {
    display: none;
  }

  #map #infowindow-content {
    display: inline;
  }


  .pac-card {
    margin: 10px 10px 0 0;
    border-radius: 2px 0 0 2px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    outline: none;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    background-color: #fff;
    font-family: Roboto;
  }

  #pac-container {
    padding-bottom: 12px;
    margin-right: 12px;
  }

  .pac-controls {
    display: inline-block;
    padding: 5px 11px;
  }

  .pac-controls label {
    font-family: Roboto;
    font-size: 13px;
    font-weight: 300;
  }

  #pac-input {
    background-color: #fff;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    margin-left: 12px;
    padding: 0 11px 0 13px;
    text-overflow: ellipsis;

  }

  #pac-input:focus {
    border-color: #4d90fe;
  }

  #title {
    color: #fff;
    background-color: #4d90fe;
    font-size: 25px;
    font-weight: 500;
    padding: 6px 12px;
  }
</style>
@endsection



<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <br>

  <div class="col-lg-12">
    <form id="phase1" method="POST" action="" enctype="multipart/form-data">
      @csrf
    <!-- end of card -->

      <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample2">
         



          <h6 class="m-0 font-weight-bold text-primary">Imágenes del carrosuel principal del sitio</h6>
        </a>
        <!-- Card Content - Collapse -->
      

        <div class="collapse show" id="collapseCardExample2">
          <div class="card-body">
  
    
          <div id="imagesdiv" class="input-images"></div>  
       
      
          </div>

        </div>
 

      </div> <!-- end of card -->
      <div class="d-flex justify-content-end">
              <button id="send" type="submit"  class="btn btn-sm btn-primary shadow-sm">
                <i class="fas {{ $edit ? 'fa-save' : 'fa-edit' }} fa-sm text-white-50"></i>
                {{ $edit ? 'Actualizar' : 'Siguiente' }}
              </button>

            </div>
            
    </form>

</div>

</div>


@include('admin.projects.modaldeletedocument')

@section('scripts')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script>

$('#phase1').on('submit', function(event) {


  event.preventDefault();

  var numItems = $('.uploaded-image').length;

  if(numItems==0){
    alert("Debes seleccionar al menos 1 imágen.");
  }else{
    event.currentTarget.submit();
  }





})



</script>

<script src="{{asset('js/deletemodaldocument.js')}}"></script>

<script type="text/javascript" src="{{asset('plugins/imageuploader/dist/image-uploader.min.js')}}"></script>
<script>

let preloaded = [];



if(typeof images!='undefined'){

  for(let i=0;i<images.length;i++){
  preloaded.push({id: i, src:images[i]});

}




$('.input-images').imageUploader(
{
  preloaded: preloaded,
    label:"Arrastra y suelta archivos aquí o haz clic para navegar",
   
}
);


}else{
  $('.input-images').imageUploader(
{
 
    label:"Arrastra y suelta archivos aquí o haz clic para navegar",
   
}
);
}







  $('#pac-input').keypress(function(e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {

      e.preventDefault();
      return false;
    }
  });
  $('input').keypress(function(e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {

      e.preventDefault();
      return false;
    }
  });

 

</script>

@endsection

@endsection



