@extends("admin.layouts.app")


@section('content')

<?php

$ambiental = new stdClass();
$ambiental->descripcionAmbiental = '';
$ambiental->fecharealizacionAmbiental='';



?>

@include('admin.projects.phasesnav')


<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHzvoUaKDOaWGOu0ZNUpB_SJigsBgOOzI&callback=initMap&libraries=places&v=weekly&language=mx&region=MX"
      defer
    >
</script>

    @section('styles')

    
<style>
        label{
            color: black;
            
        }
      #map{
        height: 500px;
        width:100%;
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
  width: 400px;
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

<form action="{{route($ruta)}}" method="POST" enctype="multipart/form-data">
@csrf  
   

<div class="row">
<div class="col-lg-12">

<input hidden type="text" value="{{$project->id}}" name="id_project">

<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
  @include('admin.layouts.partials.validation-error')
    
    @include('admin.layouts.partials.session-flash-status')
  <h6 class="m-0 font-weight-bold text-primary">Impacto Ambiental</h6>
  </a>
  <!-- Card Content - Collapse -->
  
  <div class="collapse show" id="collapseCardExample1">
    <div class="card-body">
    
  <form>
<!--
    <label for="">Descripción</label>
    <input maxlength="100 required" type="text" class="form-control" name="descripcionAmbiental" value="{{old('descripcionAmbiental',$project->descripcionAmbiental)}}">
    --->
    <div class="form-row">
    <div class="form-group col-md-4">
    <label for="">Estudios de Impacto Ambiental</label>
   
     <?php

     
     $check="";


     ?> 

     @foreach($catambientals as $catambiental)  
     <div class="form-check">
     
      <?php
    
      ?>

     <input required class="form-check-input" 
     <?php 
       if($catambiental->id==$project->tipoAmbiental){
        echo "checked";
      }
     ?>
     type="radio" name="tipoAmbiental" value="{{$catambiental->id}}" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    {{$catambiental->titulo}}
  </label>
     </div>
     @endforeach



  

    </div>
    <div class="form-group col-md-4">
    <label for="">Fecha de realización</label>
    <input required type="date" class="form-control" name="fecharealizacionAmbiental" value="{{old('fecharealizacionAmbiental',$project->fecharealizacionAmbiental)}}">
    </div>
    <div class="form-group col-md-4">
    <label for="">Responsable del estudio</label>
    <input maxlength="100" required  type="text" class="form-control" name="responsableAmbiental" value="{{old('responsableAmbiental',$project->responsableAmbiental)}}">
    </div>
    
    </div>



  
  


</div>
    
  </div>
  
  
</div>

<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample2">

  <h6 class="m-0 font-weight-bold text-primary">Estudio de Factibilidad</h6>
  </a>
  <!-- Card Content - Collapse -->
  
  <div class="collapse show" id="collapseCardExample2">
    <div class="card-body">
    
  <form>
   <!---
    <label for="">Descripción</label>
    <input maxlength="100" required type="text" class="form-control" name="descripcionFactibilidad" value="{{old('descripcionFactibilidad',$project->descripcionFactibilidad)}}">
    -->
    <div class="form-row">
    <div class="form-group col-md-4">
    <label for="">Estudios de Factibilidad</label>
    <select required multiple class="form-control" id="exampleFormControlSelect2" name="tipoFactibilidad" > 
    @foreach($catfacs as $catfac)

    @if($catfac->id==$project->tipoFactibilidad)
    <option selected value="{{$catfac->id}}">{{$catfac->titulo}}</option>
    @else
    <option value="{{$catfac->id}}">{{$catfac->titulo}}</option>
    @endif
    @endforeach
    </select>

   
    
      

    </div>
    <div class="form-group col-md-4">
    <label for="">Fecha de realización</label>
    <input required type="date" class="form-control" name="fecharealizacionFactibilidad" value="{{old('fecharealizacionFactibilidad',$project->fecharealizacionFactibilidad)}}">
    </div>
    <div class="form-group col-md-4">
    <label  for="">Responsable del estudio</label>
    <input maxlength="100 required type="text" class="form-control" name="responsableFactibilidad" value="{{old('responsableFactibilidad',$project->responsableFactibilidad)}}">
    </div>
    
    </div>



  
  


</div>

  </div>
  
  
</div>

<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample3">
  
  <h6 class="m-0 font-weight-bold text-primary">Estudios de impacto en el terreno y asentamientos</h6>
  </a>
  <!-- Card Content - Collapse -->
  
  <div class="collapse show" id="collapseCardExample3">
    <div class="card-body">
    
  <form>
      <!--
    <label for="">Descripción</label>
    <input maxlength="100 required type="text" class="form-control" name="descripcionImpacto" value="{{old('descripcionImpacto',$project->descripcionImpacto)}}">
    --->
    <div class="form-row">
    <div class="form-group col-md-4">
    <label for="">Estudios de Impacto en el terreno y asentamientos </label>
    <select required multiple class="form-control" id="exampleFormControlSelect2" name="tipoImpacto"> 
    
   
    @foreach($catimpactos as $impacto)
    @if($impacto->id==$project->tipoImpacto){

      <option selected value="{{$impacto->id}}" >{{$impacto->titulo}}</option>
    @else
      <option value="{{$impacto->id}}" >{{$impacto->titulo}}</option>
    @endif
    @endforeach
    </select>

   
    
      

    </div>
    <div class="form-group col-md-4">
    <label for="">Fecha de realización</label>
    
    <input required type="date" class="form-control" name="fecharealizacionImpacto" value="{{old('fecharealizacionImpacto',$project->fecharealizacionimpacto)}}">
    </div>
    <div class="form-group col-md-4">
    <label for="">Responsable del estudio</label>
    <input maxlength="100 required type="text" class="form-control" name="responsableImpacto" value="{{old('responsableImpacto',$project->responsableImpacto)}}">
    </div>
    
    </div>



  
  


</div>
    
  </div>
  
  
</div>




</div>

<div class="col-lg-6">

<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#collapseCardExample4" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample4">

  <h6 class="m-0 font-weight-bold text-primary">Recurso</h6>
  </a>
  <!-- Card Content - Collapse -->
  
  <div class="collapse show" id="collapseCardExample4">
    <div class="card-body">
    


    
    <div class="form-row">
    <div class="form-group col-md-4">
    <label for="">Origen del recurso</label>
    
    
    <select required id="" class="form-control" multiple name="origenrecurso">
    @foreach($catorigenrecurso as $origen)
   
    @if($origen->id==$project->description)
    <option selected value="{{$origen->id}}">{{$origen->titulo}}</option>
    @else
    {{$project->description}}
    <option  value="{{$origen->id}}">{{$origen->titulo}}</option>
    @endif
    @endforeach
    </select>   

    </div>
    <div class="form-group col-md-4">
    <label for="">Fondo o fuente de financiamiento y partida presupuestal</label>
    <input required type="text" class="form-control" name="fuenterecurso" value="{{old('fuenterecurso',$project->sourceParty_name)}}">
    </div>
    <div class="form-group col-md-4">
    <label for="">Fecha de aprobación del monto de recurso autorizado</label>
      <?php

      $date="";
     
      if($project->iniciopresupuesto!=null){
        $date=new DateTime($project->iniciopresupuesto);
        $date=$date->format('Y-m-d');
      
      }
   
      ?>
    <input required type="date" class="form-control" name="fecharecurso" value="{{old('fecharecurso',$date)}}">
    </div>
    
    </div>



  
  


</div>
    
  </div>
  
  
</div>

</div>

@include('admin.projects.selectdocuments')
    





</div>
<div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-sm btn-primary shadow-sm offset-md-10">
                    <i class="fas {{ $medit ? 'fa-save' : 'fa-edit' }} fa-sm text-white-50"></i>
                    {{ $medit ? 'Actualizar' : 'Siguiente' }}
                </button>
            </div>
</form>

@include('admin.projects.modaldeletedocument')
  

@section('scripts')
<script src="{{asset('js/deletemodaldocument.js')}}"></script>
<script>


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


@section('scripts')

@endsection