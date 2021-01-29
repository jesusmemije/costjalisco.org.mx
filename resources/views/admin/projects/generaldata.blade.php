@extends("admin.layouts.app")


@section('content')

@include('admin.projects.phasesnav')

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
  .delete-image{
    display: none;
  }
</style>
@endsection



<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <br>

  <div class="col-lg-12">
    <form id="phase1" method="POST" action="{{route($ruta)}}" enctype="multipart/form-data">
      @csrf
      <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
          @include('admin.layouts.partials.validation-error')


          @include('admin.layouts.partials.session-flash-status')

          <input type="hidden" value="{{$project->id}}" name="id_project">


          <h6 class="m-0 font-weight-bold text-primary">Datos generales del responsable del registro del proyecto</h6>
        </a>
        <!-- Card Content - Collapse -->

        <div class="collapse show" id="collapseCardExample1">
          <div class="card-body">
          

            <!---
            <label for="descripcion">Descripción</label>
            <input  type="text" name="descripcion" id="descripcion" class="form-control" value="{{old('descripcion',$generaldata->descripcion)}}">
           -->
            <label for="nombreresponsable">Nombre de la persona que registra el proyecto</label>
            <input required  type="text" name="nombreresponsable" id="nombreresponsable" class="form-control @error('nombreresponsable') is-invalid @enderror" value="{{old('nombreresponsable',$generaldata->responsable)}}">
            @error('nombreresponsable')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror


            <label for="email">Correo electrónico (Institucional)</label>
            <input required  placeholder="Institucional" type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email',$generaldata->email)}}">
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror


            <label for="organismo">Organismo al que pertenece</label>
            <input required type="text" name="organismo" class="form-control @error('organismo') is-invalid @enderror" id="organismo" value="{{old('organismo',$generaldata->organismo)}}">
            @error('organismo')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror


            <label for="puesto">Puesto que desempeña dentro del organismo</label>
            <input required  type="text" name="puesto" class="form-control @error('puesto') is-invalid @enderror" id="puesto" value="{{old('puesto',$generaldata->puesto)}}">
             @error('puesto')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror


            <label for="involucrado">En caso de haber una persona más involucrada en el registro del proyecto favor de mencionar</label>
            <input required placeholder="Este archivo es de carácter opcional" type="text" name="involucrado" class="form-control @error('involucrado') is-invalid @enderror" id="involucrado" value="{{old('involucrado',$generaldata->involucrado)}}">
            @error('involucrado')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror

          </div>

        </div>

      </div> <!-- end of card -->

      <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample2">
        @php
            $imagen_obra=DB::table('projects_imgs')
            // ->join('projects_imgs','project.id','=','projects_imgs.id_project')
            ->select('projects_imgs.imgroute')
            ->where('projects_imgs.id_project','=',$generaldata->id_project)
            ->get();
          @endphp

        <div class="form-row">

        <div class="form-group col-md-10">
        <h6 class="m-0 font-weight-bold text-primary">Imagenes de la obra</h6>
        </div>
        @if (count($imagen_obra)!=0)
        
        <div class="form-group d-flex justify-content-end">
        <button class="btn btn-danger btn-sm" onclick="document.location.href=this.getAttribute('href');" href="{{route('delimgproject',$generaldata->id_project)}}">Eliminar imagenes</button>
        </div>
        @endif
        </div>

         
      
        </a>
        <!-- Card Content - Collapse -->
      

        <div class="collapse show" id="collapseCardExample2">
          <div class="card-body">
  
         @if (count($imagen_obra)==0)
        
          <div id="imagesdiv" class="input-images"></div>  
          @else
              <script>
                var images=new Array();
function rellenar(img){
  images.push(img);
}

</script>
          
              @foreach ($imagen_obra as $imagen)
            
                <?php 
                $ruta=asset('projects_imgs/'.$imagen->imgroute) ;
                

                echo "<script>rellenar('$ruta'); </script>"; 
                ?>
              @endforeach

              <label for="">Agregar nueva imágen</label>
              <br>
              <div id="imagesdiv"  class="input-images"></div>  
          @endif

         

         

       

        
        <br>
   
        <div class="col-md-6">
        <label for="video">URL vídeo:</label>
        <input type="text" name="video" name="video" class="form-control" value="{{old('video',$generaldata->video)}}">
        </div>
       
        <div class="col-md-12">
        <label for="observaciones">Observaciones:</label>
        <input type="text" name="observaciones" id="observaciones" class="form-control" value="{{old('observaciones',$generaldata->observaciones)}}">
        </div>

          </div>

        </div>

    
      </div> <!-- end of card -->
      

      <div class="d-flex justify-content-end">
              <button id="send" type="submit"  class="btn btn-sm btn-primary shadow-sm">
                <i class="fas {{ $edit ? 'fa-save' : 'fa-edit' }} fa-sm text-white-50"></i>
                {{ $edit ? 'Actualizar' : 'Siguiente' }}
              </button>

            </div>
            <br>
            
    </form>

</div>

</div>



@include('admin.projects.modaldeletedocument')

@section('scripts')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script>



var x = document.getElementById("myDIV");
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

var imagenescontrol=new Array();




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

  function getFile(filePath) {
        return filePath.substr(filePath.lastIndexOf('\\') + 1).split('.')[0];
    }

    function getoutput() {
        outputfile.value = getFile(inputfile.value);
        extension.value = inputfile.value.split('.')[1];
        return extetension.value;
    }


  $('#generaldataimgs').on("change", function(){ 
    
   // document.getElementById('urlimgs').innerHTML=getoutput();
    //var hola=document.getElementById('imagesdiv').getElementsByTagName('img');

     // console.log(hola);
      /*
      for(var i=0; i<numItems; i++){
        imagenescontrol.push(hola[i]);
      }
      */
    
    });

    $('#verificar').on('click',function(){
      document.getElementById('urlimgs').innerHTML="";
      var hola=document.getElementById('imagesdiv').getElementsByTagName('img');

     console.log(hola);
     
     for(var i=0; i<hola.length; i++){
       aux=document.getElementById('urlimgs').innerHTML;
       document.getElementById('urlimgs').innerHTML=aux+hola[i].src+'|';
   
     }

    });

    function  get_id_button(myi){
      alert(myi);
      /*
      var hola=document.getElementById('imagesdiv').getElementsByTagName('img');
      recurso=hola[myi-1].src;
      alert(recurso);
      */
    }

   
</script>

@endsection

@endsection



