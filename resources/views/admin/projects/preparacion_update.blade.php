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
.btnmas{
    color:#000; 
    font-weight:bold; 
}
.btnme{
  color: #000;
}
    </style>
@endsection   

  
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
<br>

<form  action="{{route('guardarAmbiental')}}" method="POST">
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


  <div id="putbase1"></div>




  


    
    <div class="form-row" id="aclonar1">
    <div class="form-group col-md-4">
    <label for="">Estudios de Impacto Ambiental</label>
   
     <?php

use App\Models\DocumentType;

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
    
   
    </div>
    
    <div>
    <label for="numeros_ambiental">Número o números de identificación del estudio de impacto ambiental (En caso de ser más de uno favor de separarlos con una coma).</label>
    <input required type="text"  class="form-control" name="numeros_ambiental">
    </div>
   
 
      <hr>
      
      <div class="d-flex justify-content-end">
     <a href="{{route('noaplica',$project->id)}}" class="btn btn-success" style="margin-right: 1%;">No aplica</a>
    <input type="submit" class="btn btn-warning btnmas" value="Agregar">
    </div>
       
    @if(isset($ambiental))
    @if(sizeof($ambiental)!=0)
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
                                          <?php 
                                          $f = strtotime($dato->fecharealizacionAmbiental);
                                          
                                          ?>

                                          <div class="form-group">
                                          <a data-toggle="modal" data-radio="{{$tipoAmbiental->id}}" data-target="#modalAmbiental" data-id="{{$dato->id}}" data-responsable="{{$dato->responsableAmbiental}}" data-numeros="{{$dato->numeros_ambiental}}" data-fecha="{{date('Y-m-d',$f)}}" class="btn btn-warning btn-sm btn-circle"><i class="fa fa-edit btnme"></i></a>
                                          </div>

                                          <div class="form-group">
                                          <a data-toggle="modal" data-target="#eliminarDato" data-id="{{$dato->id}}" data-caso="ambiental" class="btn btn-danger btn-sm btn-circle"><i class="fa fa-trash btnme"></i></a>
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
  </form>


  <form  action="{{route('guardarFactibilidad')}}" method="POST">
@csrf  

<input   hidden  type="text" value="{{$project->id}}" name="id_project">
  <div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample2">

  <h6 class="m-0 font-weight-bold text-primary">Estudio de Factibilidad</h6>
  </a>
  <!-- Card Content - Collapse -->
  
  <div class="collapse show" id="collapseCardExample2">
    <div class="card-body">
    

     
    
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

  
  <hr>
  <div class="d-flex justify-content-end">
  <a href="{{route('noaplica',$project->id)}}" class="btn btn-success" style="margin-right: 1%;">No aplica</a>
    <input type="submit" class="btn btn-warning btnmas" value="Agregar">
    </div>
    @if(isset($factibilidad))
    @if(sizeof($factibilidad)!=0)
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
                                          <?php 
                                          $f = strtotime($dato->fecharealizacionFactibilidad);
                                          
                                          ?>

                                          <div class="form-group">
                                          <a data-toggle="modal" data-target="#modalFactibilidad" data-id="{{$dato->id}}" data-responsable="{{$dato->responsableFactibilidad}}" data-numeros="{{$dato->numeros_factibilidad}}" data-fecha="{{date('Y-m-d',$f)}}" class="btn btn-warning btn-sm btn-circle"><i class="fa fa-edit btnme"></i></a>
                                          </div>

                                          <div class="form-group">
                                          <a data-toggle="modal" data-target="#eliminarDato" data-id="{{$dato->id}}" data-caso="factibilidad" class="btn btn-danger btn-sm btn-circle"><i class="fa fa-trash btnme"></i></a>
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

</form>


<form  action="{{route('guardarImpacto')}}" method="POST">
@csrf  

<input  hidden  type="text" value="{{$project->id}}" name="id_project">
<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample3">
  
  <h6 class="m-0 font-weight-bold text-primary">Estudios de impacto en el terreno y asentamientos</h6>
  </a>
  <!-- Card Content - Collapse -->
  
  <div class="collapse show" id="collapseCardExample3">
    <div class="card-body">
    

  
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
   
  <hr>
  <div class="d-flex justify-content-end">
  <a href="{{route('noaplica',$project->id)}}" class="btn btn-success" style="margin-right: 1%;">No aplica</a>
    <input type="submit" class="btn btn-warning btnmas" value="Agregar">
    </div>
    @if(isset($impactos))
    @if(sizeof($impactos)!=0)
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
                                          <?php 
                                          $f = strtotime($dato->fecharealizacionimpacto);
                                          
                                          ?>
                                          <div class="form-group">
                                          <a data-toggle="modal" data-target="#modalImpacto" data-id="{{$dato->id}}" data-responsable="{{$dato->responsableImpacto}}" data-numeros="{{$dato->numeros_impacto}}" data-fecha="{{date('Y-m-d',$f)}}" class="btn btn-warning btn-sm btn-circle btnme"><i class="fa fa-edit btnme"></i></a>
                                          </div>

                                          <div class="form-group">
                                          <a data-toggle="modal" data-target="#eliminarDato" data-id="{{$dato->id}}" data-caso="impacto" class="btn btn-danger btn-sm btn-circle"><i class="fa fa-trash btnme"></i></a>
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
</form>

<div class="col-lg-12">

<form action="{{route('guardarRecurso')}}" method="POST">
@csrf  

<input hidden   type="text" value="{{$project->id}}" name="id_project">
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
    <div class="d-flex justify-content-end">
    <a href="{{route('noaplica',$project->id)}}" class="btn btn-success" style="margin-right: 1%;">No aplica</a>
    <input type="submit" class="btn btn-warning btnmas" value="Agregar">
    </div>
    @if(isset($origen_recurso))
    @if(sizeof($origen_recurso)!=0)
    <div class="form-row">
                            <div class="form-group">
                               
                                <label for="">Listado de recursos</label>


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
                                          $f = strtotime($dato->iniciopresupuesto);
                                          ?>
                                        
                                          <td>{{$tipoRecurso->titulo}}</td>
                                          <td>{{$dato->sourceParty_name}}</td>
                                          <td>{{date('Y-m-d',$f)}}</td>
                                       
                                          
                                          <td>
                                          <div class="form-row">

                                        
                                          <div class="form-group">
                                          <a data-toggle="modal" data-target="#modalRecurso" data-id="{{$dato->id_recurso}}" data-responsable="{{$dato->sourceParty_name}}"  data-fecha="{{date('Y-m-d',$f)}}" class="btn btn-warning btn-sm btn-circle btnme"><i class="fa fa-edit btnme"></i></a>
                                          </div>

                                          <div class="form-group">
                                          <a data-toggle="modal" data-target="#eliminarDato" data-id="{{$dato->id_recurso}}" data-caso="recurso" class="btn btn-danger btn-sm btn-circle"><i class="fa fa-trash btnme"></i></a>
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

</form>
<form action="{{route('actualizarObservacionPreparacion')}}" method="POST">
@csrf  
<input hidden   type="text" value="{{$project->id}}" name="id_project">
<div class="form-row">
          <div class="form-group col-md-12">
        <label for="observaciones">Observaciones:</label>
    
        @if(sizeof($observaciones)>0)
        <input type="text" name="observaciones" id="observaciones" class="form-control" value="{{old('observaciones',$observaciones[0]->observaciones)}}">
        @else
     
        <input type="text" name="observaciones" id="observaciones" class="form-control">
        @endif
          </div>
        </div>
        <div class="d-flex justify-content-end">
    <input type="submit" class="btn btn-warning btn-sm btnmas" value="Actualizar observaciones">
   
    </div>
</form>
</div>
</div>

</div>

<form action="{{route('guardarDocumentosPreparacion')}}" enctype="multipart/form-data" method="POST">
@csrf  
<div class="col-lg-6">
<input hidden   type="text" value="{{$project->id}}" name="id_project">
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample5" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample5">

        <h6 class="m-0 font-weight-bold text-primary">Documentos</h6>
    </a>
    <!-- Card Content - Collapse -->

    <div class="collapse show" id="collapseCardExample5">
        <div class="card-body">

            <form>


                <div class="form-row">
                    <div class="form-group">
                        <label for="">Seleccionar documentos</label>
                        <input type="file" class="form-control" name="documents[]" multiple>
                        <label>Tipo de documento</label>
                        <select name="documenttype" id="documenttype" class="form-control @error('documenttype') is-invalid @enderror">
                <option value="">Selecciona un opción</option>
                @foreach($documentstype as $type)
              
                <option value="{{$type->id}}">{{$type->titulo}}</option>

                @endforeach

                </select>
                 @error('documenttype')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror

                        @if(sizeof($documents)!=0)
                        <br>
                        <label for="">Lista de documentos</label>


                        <div class="col-md-12">

                            <table class="table table-sm">
                                <tr>
                                    <th>Nombre del documento</th>
                                    <th>Tipo de documento</th>
                                    <th>Acciones</th>
                                </tr>


                                <tbody>
                                    @foreach($documents as $document)
                                    <?php
                                    $ruta = 'documents/' . $document->url;
                                    $tipo=DocumentType::find($document->documentType);
                                    ?>


                                    <tr>
                                        <td>
                                            <a target="_blank" class="badge badge-pill badge-info" href="{{asset($ruta)}}">{{$document->url}}</a>
                                        </td>

                                        <td>
              {{$tipo->titulo}}
            </td>

                                        <td>

                                            <a id="deldoc" href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteUserModal" data-id="{{ $document->id }}" data-name="{{ $document->url }}">
                                                <i class="fa fa-trash"></i>
                                            </a>


                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        @endif

                    </div>



                </div>
                
        <div class="d-flex justify-content-end">
    <input type="submit" class="btn btn-warning btn-sm btnmas" value="Guardar documentos">
   
    </div>
        </div>

    
    </div>
</div>


</div>
</form>




</div>




    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>¿Seguro que desea eliminar el documento  <strong><span class="name-user"></span></strong>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary shadow-sm" data-dismiss="modal">
            <i class="fas fa-times fa-sm text-white-50"></i>
            No, salir
          </button>
          <form id="formDelete" action="{{ route('project.deletedocument') }}" method="POST">
           
            @csrf
            <input type="hidden" value="" id="doc_id" name="doc_id">
            <button type="submit" class="btn btn-sm btn-danger shadow-sm">
              <i class="fas fa-trash fa-sm text-white-50"></i>
              Si, eliminar
            </button>
            
          </form>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="eliminarDato" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Confirmar eliminación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>¿Seguro que desea eliminar el registro? </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary shadow-sm" data-dismiss="modal">
            <i class="fas fa-times fa-sm text-white-50"></i>
            No, salir
          </button>
          <form id="formDelete" action="{{route('eliminarEstudio')}}" data-action=" " method="POST">
       
            @csrf
            <input type="hidden" name="id_eliminar" id="id_eliminar">
            <input type="hidden" name="caso" id="caso">

            <button type="submit" class="btn btn-sm btn-danger shadow-sm">
              <i class="fas fa-trash fa-sm text-white-50"></i>
              Si, eliminar
            </button>
           
          </form>
        </div>
      </div>
    </div>
  </div>


@include('admin.projects.modalAmbiental')
@include('admin.projects.modalFactibilidad')
@include('admin.projects.modalImpacto')
@include('admin.projects.modalRecurso')

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


<script>
//Para los modales



$('#modalAmbiental').on('show.bs.modal', function(event) {
   
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
 //   var name = button.data('name')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    
    var fecha=button.data('fecha');
    
    var responsable=button.data('responsable');
    var numeros=button.data('numeros');
    $('#id_estudio').val(id);
    $('#fechamodalAmbiental').val(fecha);
    $('#responsablemodalAmbiental').val(responsable);
    $('#numerosmodal_ambiental').val(numeros);
    console.log(responsable);
    //var modal = $(this)
    //modal.find('.modal-title').text(title)
    

})

$('#modalFactibilidad').on('show.bs.modal', function(event) {
   
   var button = $(event.relatedTarget) // Button that triggered the modal
   var id = button.data('id') // Extract info from data-* attributes
//   var name = button.data('name')
       // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
       // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
   
   var fecha=button.data('fecha');
   
   var responsable=button.data('responsable');
   var numeros=button.data('numeros');
   $('#id_estudio2').val(id);
   $('#fechamodalFactibilidad').val(fecha);
   $('#responsablemodalFactibilidad').val(responsable);
   $('#numerosmodal_factibilidad').val(numeros);
   console.log(id);
   //var modal = $(this)
   //modal.find('.modal-title').text(title)
   

})

$('#modalImpacto').on('show.bs.modal', function(event) {
   
   var button = $(event.relatedTarget) // Button that triggered the modal
   var id = button.data('id') // Extract info from data-* attributes
//   var name = button.data('name')
       // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
       // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
   
   var fecha=button.data('fecha');
   
   var responsable=button.data('responsable');
   var numeros=button.data('numeros');
   $('#id_estudio3').val(id);
   $('#fechamodalImpacto').val(fecha);
   $('#responsablemodalImpacto').val(responsable);
   $('#numerosmodal_impacto').val(numeros);
   console.log(id);
   //var modal = $(this)
   //modal.find('.modal-title').text(title)
   

})

$('#modalRecurso').on('show.bs.modal', function(event) {
   
   var button = $(event.relatedTarget) // Button that triggered the modal
   var id = button.data('id') // Extract info from data-* attributes
//   var name = button.data('name')
       // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
       // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
   
   var fecha=button.data('fecha');
   
   var responsable=button.data('responsable');
   var numeros=button.data('numeros');
   $('#id_recurso').val(id);

   $('#fuenterecursomodal').val(responsable)
   $('#fecharecursomodal').val(fecha)
  
   console.log(id);
   //var modal = $(this)
   //modal.find('.modal-title').text(title)
   

})

$('#eliminarDato').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var name = button.data('name')
        var caso=button.data('caso');
        $('#id_eliminar').val(id);
        $('#caso').val(caso);

       
    })

</script>

@endsection


@endsection


@section('scripts')

@endsection