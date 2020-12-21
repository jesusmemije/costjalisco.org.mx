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

          <input type="text" value="{{$project->id}}" name="id_project">


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
            <input required maxlength="50" type="text" name="nombreresponsable" id="nombreresponsable" class="form-control @error('nombreresponsable') is-invalid @enderror" value="{{old('nombreresponsable',$generaldata->responsable)}}">
            @error('nombreresponsable')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror


            <label for="email">Correo electrónico (Institucional)</label>
            <input required maxlength="50" placeholder="Institucional" type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email',$generaldata->email)}}">
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror


            <label for="organismo">Organismo al que pertenece</label>
            <input required maxlength="255" type="text" name="organismo" class="form-control @error('organismo') is-invalid @enderror" id="organismo" value="{{old('organismo',$generaldata->organismo)}}">
            @error('organismo')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror


            <label for="puesto">Puesto que desempeña dentro del organismo</label>
            <input required maxlength="255" type="text" name="puesto" class="form-control @error('puesto') is-invalid @enderror" id="puesto" value="{{old('puesto',$generaldata->puesto)}}">
             @error('puesto')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror


            <label for="involucrado">En caso de haber una persona más involucrada en el registro del proyecto favor de mencionar</label>
            <input required maxlength="50" placeholder="Este archivo es de carácter opcional" type="text" name="involucrado" class="form-control @error('involucrado') is-invalid @enderror" id="involucrado" value="{{old('involucrado',$generaldata->involucrado)}}">
            @error('involucrado')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror

          </div>

        </div>

      </div> <!-- end of card -->

      <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample2">
         



          <h6 class="m-0 font-weight-bold text-primary">Imagénes de la obra</h6>
        </a>
        <!-- Card Content - Collapse -->

        <div class="collapse show" id="collapseCardExample2">
          <div class="card-body">
  
        
         
          @php
            $imagen_obra=DB::table('projects_imgs')
            // ->join('projects_imgs','project.id','=','projects_imgs.id_project')
            ->select('projects_imgs.imgroute')
            ->where('projects_imgs.id_project','=',$generaldata->id_project)
            ->get();
          @endphp
          @if (count($imagen_obra)==0)
            <div class="input-images"></div>  
          @else
              <script>
                var images=new Array();
function rellenar(img){
  images.push(img);
}

</script>
          
              @foreach ($imagen_obra as $imagen)
                <img src="{{ asset('projects_imgs/'.$imagen->imgroute) }}" width="300" height="300" style="margin-left:1%" alt="">
                <?php 
                $ruta=asset('projects_imgs/'.$imagen->imgroute) ;
                

                echo "<script>rellenar('$ruta'); </script>"; 
                ?>
              @endforeach

            


              <br><br>
              <label for="">Agregar nueva imágen</label>
              <br>
              <div class="input-images"></div>  
          @endif

         

         

       

        




          </div>

        </div>

      </div> <!-- end of card -->
      <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas {{ $edit ? 'fa-save' : 'fa-edit' }} fa-sm text-white-50"></i>
                {{ $edit ? 'Actualizar' : 'Siguiente' }}
              </button>

            </div>
    </form>

</div>

</div>


@include('admin.projects.modaldeletedocument')

@section('scripts')
<script src="{{asset('js/deletemodaldocument.js')}}"></script>

<script type="text/javascript" src="{{asset('plugins/imageuploader/dist/image-uploader.min.js')}}"></script>
<script>
 //console.log(images);
var myobj=new Object();

for(let i=0; i<images.length; i++){

  myobj.src= images[i];

}

console.log(myobj);



$('.input-images').imageUploader(
{
  preloaded: preloaded,
    label:"Arrastra y suelta archivos aquí o haz clic para navegar",
   
}
);


var element = document.getElementById("images");



//setInterval('alerta()',20000);


function alerta(){
  alert("wtf");
  alert(getCount(element, false));
}

//alert(getCount(element, false)); // Simply one level
//alert(getCount(element, true)); // Get all child node count





function getCount(parent, getChildrensChildren){
    var relevantChildren = 0;
    var children = parent.childNodes.length;
    for(var i=0; i < children; i++){
        if(parent.childNodes[i].nodeType != 3){
            if(getChildrensChildren)
                relevantChildren += getCount(parent.childNodes[i],true);
            relevantChildren++;
        }
    }
    return relevantChildren;
}


/*

for (index = 0; index < inputs.length; ++index) {
    console.log(inputs[index]);
}

*/


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



