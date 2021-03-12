@extends("admin.layouts.app")


@section('content')


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

<form id="phase3" action="{{route($ruta)}}" method="POST" enctype="multipart/form-data">
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
    <div class="card-body" >

  <form>
  <div id="putbase1"></div>




  


    
    <div class="form-row" id="aclonar1">
    <div class="form-group col-md-4">
    <label for="">Estudios de Impacto Ambiental</label>
   
     <?php

     
     $check="";


     ?> 

     @foreach($catambientals as $catambiental)  
     <div class="form-check">
     
      <?php
    
      ?>

     <input class="form-check-input" 
   
     type="radio" name="tipoAmbiental" required value="{{$catambiental->id}}" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    {{$catambiental->titulo}}
  </label>
     </div>
     @endforeach



  

    </div>
    <div class="form-group col-md-4">
    <label for="">Fecha de realización</label>
    <input required maxlength="50" type="date" class="form-control @error('fecharealizacionAmbiental') is-invalid @enderror" name="fecharealizacionAmbiental" >
    @error('fecharealizacionAmbiental')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>
    <div class="form-group col-md-4">
    <label for="">Responsable del estudio</label>
    <input required maxlength="255" type="text" class="form-control @error('responsableAmbiental') is-invalid @enderror" name="responsableAmbiental">
    @error('responsableAmbiental')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

    <label for="numeros_ambiental">Número o números de identificación del estudio de impacto ambiental (En caso de ser más de uno favor de separarlos con una coma).</label>
    <input required type="text"  class="form-control" name="numeros_ambiental">
    </div>
    @if(isset($ambiental))
    @if(sizeof($ambiental)!=0)
      <hr>
    <div class="form-row">
                            <div class="form-group">
                               
                                <label for="">Listado de estudios</label>


                                <div class="col-md-12">

                                    <table class="table table-sm">
                                        <tr>
                                            <th>Nombre del estudio</th>
                                            <th>Fecha de realización</th>
                                            <th>Responsable del estudio</th>
                                            <th>Número o números de identificación del estudio de impacto ambiental</th>
                                            <th>Acciones</th>
                                        </tr>


                                        <tbody>
                                        @foreach($ambiental as $dato)
                                          <tr>
                                          
                                          <?php
                                          $tipoAmbiental=DB::table('catambiental')
                                          ->where('id','=',$dato->tipoAmbiental)
                                          ->first();
                                          ?>
                                        
                                          <td>{{$tipoAmbiental->titulo}}</td>
                                          <td>{{$dato->fecharealizacionAmbiental}}</td>
                                          <td>{{$dato->responsableAmbiental}}</td>
                                          <td>{{$dato->numeros_ambiental}}</td>
                                          
                                          <td>
                                          <div class="form-row">

                                          <div class="form-group">
                                          <button class="btn btn-warning btn-sm btn-circle"><i class="fa fa-edit"></i></button>
                                          </div>

                                          <div class="form-group">
                                          <button class="btn btn-danger btn-sm btn-circle"><i class="fa fa-trash"></i></button>
                                          </div>
                                          
                                          </div>
                                          
                                          
                                          </td>


                                          </tr>
                                        @endforeach
                                         
                                        </tbody>

                                    </table>
                                </div>
                            

                            </div>



                        </div>
                        @endif
                        @endif
  
      
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
     
    
    <div class="form-row">
    <div class="form-group col-md-4">
    <label for="">Estudios de Factibilidad</label>
    <select required multiple class="form-control" id="exampleFormControlSelect2" name="tipoFactibilidad" > 
    @foreach($catfacs as $catfac)

    <option value="{{$catfac->id}}">{{$catfac->titulo}}</option>

    @endforeach
    </select>

   
    
      

    </div>
    <div class="form-group col-md-4">
    <label for="">Fecha de realización</label>
    <input required maxlength="50" type="date" class="form-control @error('fecharealizacionFactibilidad') is-invalid @enderror" name="fecharealizacionFactibilidad" >
    @error('fecharealizacionFactibilidad')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>
    <div class="form-group col-md-4">
    <label for="">Responsable del estudio</label>
    <input required maxlength="255" type="text" class="form-control @error('responsableFactibilidad') is-invalid @enderror" name="responsableFactibilidad" >
    @error('responsableFactibilidad')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>
    <label for="numeros_factibilidad">Número o números de identificación del estudio de factibilidad. (En caso de ser más de uno favor de separarlos con una coma).</label>
    <input required type="text"   class="form-control" name="numeros_factibilidad" id="numeros_factibilidad">
    </div>

    @if(isset($factibilidad))
    @if(sizeof($factibilidad)!=0)
  <hr>
    <div class="form-row">
                            <div class="form-group">
                               
                                <label for="">Listado de estudios</label>


                                <div class="col-md-12">

                                    <table class="table table-sm">
                                        <tr>
                                            <th>Nombre del estudio</th>
                                            <th>Fecha de realización</th>
                                            <th>Responsable del estudio</th>
                                            <th>Número o números de identificación del estudio de impacto de factibilidad</th>
                                            <th>Acciones</th>
                                        </tr>


                                        <tbody>
                                        @foreach($factibilidad as $dato)
                                          <tr>
                                          
                                          <?php
                                          $tipoFactibilidad=DB::table('catfac')
                                          ->where('id','=',$dato->tipoFactibilidad)
                                          ->first();
                                          ?>
                                        
                                          <td>{{$tipoFactibilidad->titulo}}</td>
                                          <td>{{$dato->fecharealizacionFactibilidad}}</td>
                                          <td>{{$dato->responsableFactibilidad}}</td>
                                          <td>{{$dato->numeros_factibilidad}}</td>
                                          
                                          <td>
                                          <div class="form-row">

                                          <div class="form-group">
                                          <button class="btn btn-warning btn-sm btn-circle"><i class="fa fa-edit"></i></button>
                                          </div>

                                          <div class="form-group">
                                          <button class="btn btn-danger btn-sm btn-circle"><i class="fa fa-trash"></i></button>
                                          </div>
                                          
                                          </div>
                                          
                                          
                                          </td>


                                          </tr>
                                        @endforeach
                                         
                                        </tbody>

                                    </table>
                                </div>
                            

                            </div>



                        </div>
                    @endif
                    @endif

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
  
    <div class="form-row">
    <div class="form-group col-md-4">
    <label for="">Estudios de Impacto en el terreno y asentamientos </label>
    <select required multiple class="form-control" id="exampleFormControlSelect2" name="tipoImpacto"> 
    
   
    @foreach($catimpactos as $impacto)
   
      <option value="{{$impacto->id}}" >{{$impacto->titulo}}</option>

    @endforeach
    </select>

   
    
      

    </div>
    <div class="form-group col-md-4">
    <label for="">Fecha de realización</label>
    
    <input required maxlength="50" type="date" class="form-control @error('fecharealizacionImpacto') is-invalid @enderror" name="fecharealizacionImpacto">
    @error('fecharealizacionImpacto')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>
    <div class="form-group col-md-4">
    <label for="">Responsable del estudio</label>
    <input required maxlength="255" type="text" class="form-control @error('responsableImpacto') is-invalid @enderror" name="responsableImpacto" >
    @error('responsableImpacto')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>
    <label for="numeros_impacto">Número o números de identificación del estudio del impacto en el terreno y asentamientos (En caso de ser más de uno favor de separaros con una coma)</label>
    <input required type="text"  class="form-control" name="numeros_impacto" id="numeros_impacto">
    </div>
    @if(isset($impactos))
    @if(sizeof($impactos)!=0)
  <hr>
  
 
    <div class="form-row">
                            <div class="form-group">
                               
                                <label for="">Listado de estudios</label>


                                <div class="col-md-12">

                                    <table class="table table-sm">
                                        <tr>
                                            <th>Nombre del estudio</th>
                                            <th>Fecha de realización</th>
                                            <th>Responsable del estudio</th>
                                            <th>Número o números de identificación del estudio de impacto de factibilidad</th>
                                            <th>Acciones</th>
                                        </tr>


                                        <tbody>
                                        @foreach($impactos as $dato)
                                          <tr>
                                          
                                          <?php
                                          $tipoImpacto=DB::table('catimpactoterreno')
                                          ->where('id','=',$dato->tipoImpacto)
                                          ->first();
                                          ?>
                                        
                                          <td>{{$tipoImpacto->titulo}}</td>
                                          <td>{{$dato->fecharealizacionimpacto}}</td>
                                          <td>{{$dato->responsableImpacto}}</td>
                                          <td>{{$dato->numeros_impacto}}</td>
                                          
                                          <td>
                                          <div class="form-row">

                                          <div class="form-group">
                                          <button class="btn btn-warning btn-sm btn-circle"><i class="fa fa-edit"></i></button>
                                          </div>

                                          <div class="form-group">
                                          <button class="btn btn-danger btn-sm btn-circle"><i class="fa fa-trash"></i></button>
                                          </div>
                                          
                                          </div>
                                          
                                          
                                          </td>


                                          </tr>
                                        @endforeach
                                         
                                        </tbody>

                                    </table>
                                </div>
                            

                            </div>



                        </div>


                  @endif
                  @endif
  


</div>
    
  </div>
  
  
</div>

<div class="col-lg-12">

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
   
   
    <option  value="{{$origen->id}}">{{$origen->titulo}}</option>

    @endforeach
    </select>   

    </div>
    <div class="form-group col-md-4">
    <label for="">Fondo o fuente de financiamiento y partida presupuestal</label>
    <input required maxlength="255" type="text" class="form-control @error('fuenterecurso') is-invalid @enderror" name="fuenterecurso">
    @error('fuenterecurso')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>
    <div class="form-group col-md-4">
    <label for="">Fecha de aprobación del monto de recurso autorizado</label>
     
    <input required maxlength="50" type="date" class="form-control @error('fecharecurso') is-invalid @enderror" name="fecharecurso" >
    @error('fecharecurso')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>
    
    </div>
    @if(isset($origen_recurso))
    @if(sizeof($origen_recurso)!=0)
    <div class="form-row">
                            <div class="form-group">
                               
                                <label for="">Listado de recursosx</label>


                                <div class="col-md-12">

                                    <table class="table table-sm">
                                        <tr>
                                            <th>Origen del recurso</th>
                                            <th>Fondo o fuente de financiamiento y partida presupuestal</th>
                                            <th>Fecha de aprobación del monto de recurso autorizado</th>
                                          
                                            <th>Acciones</th>
                                        </tr>


                                        <tbody>
                                        @foreach($origen_recurso as $dato)
                                          <tr>
                                          
                                          <?php
                                          $tipoRecurso=DB::table('catorigenrecurso')
                                          ->where('id','=',$dato->description)
                                          ->first();
                                          ?>
                                        
                                          <td>{{$tipoRecurso->titulo}}</td>
                                          <td>{{$dato->sourceParty_name}}</td>
                                          <td>{{$dato->iniciopresupuesto}}</td>
                                       
                                          
                                          <td>
                                          <div class="form-row">

                                          <div class="form-group">
                                          <button class="btn btn-warning btn-sm btn-circle"><i class="fa fa-edit"></i></button>
                                          </div>

                                          <div class="form-group">
                                          <button class="btn btn-danger btn-sm btn-circle"><i class="fa fa-trash"></i></button>
                                          </div>
                                          
                                          </div>
                                          
                                          
                                          </td>


                                          </tr>
                                        @endforeach
                                         
                                        </tbody>

                                    </table>
                                </div>
                            

                            </div>



                        </div>
                @endif
                @endif
  
  


</div>
    
  </div>
  
  
</div>



<div class="form-row">
          <div class="form-group col-md-12">
        <label for="observaciones">Observaciones:</label>
        @if(isset($ambiental))
        @if(sizeof($ambiental)>0)
        <input type="text" name="observaciones" id="observaciones" class="form-control" value="{{old('observaciones',$ambiental[0]->observaciones)}}">
       
        
        @endif
        @else
        <input type="text" name="observaciones" id="observaciones" class="form-control">
        @endif
          </div>
        </div>
</div>
</div>

</div>




    





</div>

<div class="d-flex justify-content-end">
                <button onclick="sendphase3()"  type="submit" class="btn btn-sm btn-primary shadow-sm offset-md-10">
                    <i class="fas {{ $medit ? 'fa-save' : 'fa-edit' }} fa-sm text-white-50"></i>
                    {{ $medit ? 'Actualizar' : 'Siguiente' }}
                </button>
            </div>
</form>



@include('admin.projects.modaldeletedocument')
  

@section('scripts')
<script src="{{asset('js/deletemodaldocument.js')}}"></script>
<script>

base1=document.getElementById('baseclonar1').style.display='none';

//var checkcloned=document.getElementById('checkclon');
  //console.log(checkcloned);
  //checkcloned.setAttribute('name','');
  

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
var i_clon=0;
function nuevoambiental(){
  i_clon++;
  var c = document.getElementById("baseclonar1");
  var clon = c.cloneNode(true);
  var checkcloned=document.getElementById('checkclon');
  //console.log(checkcloned);
  checkcloned.setAttribute('name','ptmjimbo');
  
  clon.id='newclon'+i_clon;
  clon.style.display='block';

  divclon= document.getElementById('putbase1')

  divclon.prepend(clon);
}

function eliminarclon(){

  document.getElementById("baseclonar1").remove();
}
function sendphase3(){
  eliminarclon();
 
}

function nuevoambiental2(){

  var radioHtml = '<input type="radio" name="' + name + '" />';

  divclon= document.getElementById('putbase1');

  divclon.innerHTML = radioHtml;
}


</script>

@endsection


@endsection


@section('scripts')

@endsection