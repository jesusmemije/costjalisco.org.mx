<meta name="csrf-token" content="{{ csrf_token() }}">
@extends("admin.layouts.app")


@section('content')

@include('admin.projects.phasesnav')

<script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />

 
@section('styles')
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
  .transparente{
    color: #000; /* Fallback for older browsers */
    color: rgba(0, 0, 0, 0.5);
  }
</style>
@endsection



<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <br>

  <div class="col-lg-12">
    <form id="phase1" method="POST" action="{{route($ruta)}}" enctype="multipart/form-data">
      @csrf
      
      @include('admin.layouts.partials.session-flash-status')
@include('admin.layouts.partials.validation-error')

      <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample2">

          <h6 class="m-0 font-weight-bold text-primary">Proyecto</h6>
        </a>
        <!-- Card Content - Collapse -->

        <div class="collapse show" id="collapseCardExample2">
          <div class="card-body">
              <input type="hidden" value="{{$project->id}}" name="id_project">
            <div class="form-row">
              <div class="form-group col-md-9">
                <label for="tituloProyecto">
                  Título del proyecto
                </label>
                <input required placeholder="Título del acto público en Jalisco" required id="tituloProyecto" type="text" class="form-control @error('tituloProyecto') is-invalid @enderror" name="tituloProyecto" value="{{old('tituloProyecto',$project->title)}}">
                 @error('tituloProyecto')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
              </div>
              <div class="form-group col-md-3">
                <label for="ocid">
                  Número que identifica al proyecto
                </label>
                <input required maxlength="50" placeholder="Número del acto público (ID Entidad)" required id="ocid" type="text" class="form-control @error('ocid') is-invalid @enderror" name="ocid" value="{{old('ocid',$project->ocid)}}">
                @error('ocid')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
              </div>

            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="descripcionProyecto">
                  Descripción
                </label>
                <textarea required placeholder="Descripción del acto público en Jalisco" class="form-control @error('descripcionProyecto') is-invalid @enderror" rows="1" id="descripcionProyecto" name="descripcionProyecto">{{$project->descripcionProyecto}}</textarea>
                @error('descripcionProyecto')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
              </div>

              <div class="form-group col-md-6">
              <?php

use App\Models\DocumentType;


$id_organization=auth()->user()->id_organization;
             
              ?>
              @if($id_organization=="")
                <label for="autoridadP">Autoridad Pública</label>
                <select required id="autoridadP" name="autoridadP" class="form-control @error('autoridadP') is-invalid @enderror">
                  <option value="">Seleccionar</option>
                  @foreach($autoridadP as $autoridad)

                  @if($autoridad->id==$project->publicAuthority_id)

                  <option value="{{$autoridad->id}}" selected>{{$autoridad->name}}</option>
                  @else
                  <option value="{{$autoridad->id}}">{{$autoridad->name}}</option>
                  @endif
                  @endforeach

                </select>
                 @error('autoridadP')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @else
            <div style="display: none;">
           
            <label for="autoridadP">Autoridad Pública</label>
                <select  required id="autoridadP" name="autoridadP" class="form-control @error('autoridadP') is-invalid @enderror">
                  <option value="">Seleccionar</option>
                  @foreach($autoridadP as $autoridad)

                  @if($autoridad->id==$id_organization)

                  <option value="{{$autoridad->id}}" selected>{{$autoridad->name}}</option>
                  @else
                  <option value="{{$autoridad->id}}">{{$autoridad->name}}</option>
                  @endif
                  @endforeach

                </select>
                </div>    
            @endif
              </div>
            </div>

            <label for="propositoProyecto">
              Propósito
            </label>
            <input required maxlength="100" placeholder="Objetivo del proyecto" type="text" class="form-control @error('propositoProyecto') is-invalid @enderror" id="propositoProyecto" name="propositoProyecto" value="{{old('propositoProyecto',$project->purpose)}}">
             @error('propositoProyecto')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror


            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="sectorProyecto"> 
                  Sector
                </label>
                <input hidden type="text" value="{{$project->sector}}" id="secedit">
                <select required id="sectorProyecto" class="form-control @error('secedit') is-invalid @enderror" name="sectorProyecto" onchange="return get_class_sections(this.value)">
                  <option value="">Seleccione un sector</option>
                  @foreach ($sectors as $sector)
                  @if($sector->id==$project->sector)
                  <option value="{{$sector->id}}" selected>{{$sector->titulo}}</option>
                  @else
                  <option value="{{$sector->id}}">{{$sector->titulo}}</option>
                  @endif

                  @endforeach
                </select>
                @error('secedit')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
              </div>


              <div class="form-group col-md-6">
                <label for="subsector">
                  Subsector
                </label>
                <input hidden type="text" name="" id="subedit" value="{{$project->subsector}}">

                <select required id="subsector" class="form-control @error('subsector') is-invalid @enderror" name="subsector">
                  <option value="">Seleccione un subsector</option>
                </select>
                @error('subsector')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
              </div>
              </div>

              <div class="form-row">

              <div class="form-group col-md-4">
              <label for="tipoProyecto">Tipo de proyecto</label>
              <select required name="tipoProyecto" id="tipoProyecto" class="form-control @error('tipoProyecto') is-invalid @enderror">
                <option value="">Seleccione un tipo</option>
                @foreach($types as $type)
                @if($type->id==$project->type)
                <option value='{{$type->id}}' selected>{{$type->titulo}}</option>
                @else
                <option value='{{$type->id}}'>{{$type->titulo}}</option>
                @endif

                @endforeach
              </select>
              </div>
               @error('tipoProyecto')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-group col-md-3">
            <label for="people">Personas beneficiadas</label>
            <input required maxlength="50" placeholder="Persona Beneficiaria" type="number" name="people" id="people" class="form-control @error('people') is-invalid @enderror" value="{{old('people',$project->people)}}">
            
            @error('people')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group col-md-4">
            <label for="porcentaje_obra">Porcentaje de avance físico de la obra</label>
            <input required maxlength="3" placeholder="p.ej. 100" type="number" name="porcentaje_obra" id="porcentaje_obra" class="form-control @error('porcentaje_obra') is-invalid @enderror" value="{{old('porcentaje_obra',$project->porcentaje_obra)}}">
            
            @error('porcentaje_obra')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            
   </div>
            
            @error('lat')
            <div class="invalid-feedback" style="display: block;">Debe seleccionar al menos un lugar en el mapa.</div>
            @enderror
            <h6 class="m-0 font-weight-bold text-primary">Ubicación del proyecto <sup data-bs-toggle="tooltip" data-bs-placement="top" title="Puedes seleccionar un archivo csv con el formato (Descargar formato) para colocar múltiples puntos en el mapa."><i class="fa fa-question-circle" aria-hidden="true"></i>
</sup></h6><br>
           
    
<div id="here" class="row">


<div class="col-md-9">

<input class="btn btn-sm btn-outline-primary"  form="formId" type="file" name="excel"  id="excel" value="Cargar Excel" onchange="return fileValidation()">
  <?php
  $d='color:blue';

  $url = public_path() . '/documents' . '/' . 'puntosdeejemplo.csv';
        if (!file_exists(($url))) {
      // $d="pointer-events:none;";
        }

 
  ?>
  <a class="btn btn-sm btn-outline-info"  style="<?php //echo $d; ?>" href="{{asset('documents/puntosdeejemplo.csv')}}" style="color:blue">Descargar formato</a>
  <input type="hidden" id="ver">
  
  <button type="submit"  class="btn btn-outline-success btn-sm"  form="formId" id="subir">Subir</button>
</div>


  <div class="col-md-3">
  <button id="del" class="btn btn-outline-danger btn-sm d-flex justify-content-end">Eliminar puntos del mapa</button>
  
  </div>
 
</div>

 <hr>

            <div id="map"></div>
            
            <div id="infowindow-content">
              <img src="" width="16" height="16" id="place-icon" />
              <span id="place-name" class="title"></span><br />
              <span id="place-address"></span>
            </div>
          
     <hr> 
     <label for="myInput">Buscar:</label>
     <input class="form-control"  type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por nombre..">
     <div class="">
            <table id="myTable" class="table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Latitud</th>
        <th>Longitud</th>
        <th>Acciones</th>
        <th>Punto Principal</th>
      </tr>
    </thead>

    <tbody id="cuerpo">
  
  
    </tbody>
  </table>
  </table>
  <hr>

            <div class="row">
              <div class="col-lg-4">
              <input  type="hidden" name="names" id="name" value="{{old('names',$project->names)}}">
                <input type="hidden" id="lat" name="lat" value="{{old('lat',$project->lat)}}">
                <input type="hidden" id="lng" name="lng" value="{{old('lng',$project->lng)}}">
                <textarea hidden name="principal" id="punto"   >{{old('principal',$project->principal)}}</textarea>

                <label for="streetAddress">Calle </label>
                <input required  placeholder="Lugar en el cual se ejecutará el proyecto (calle, colonia, municipio)" required type="text" id="streetAddress" name="streetAddress" class="form-control @error('streetAddress') is-invalid @enderror" value="{{old('streetAddress',$project->streetAddress)}}">
                 @error('streetAddress')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror

              </div>
              <div class="col-lg-4">
                <label for="suburb" >Colonia </label>
                <input required type="text" id="suburb" name="suburb" class="form-control @error('suburb') is-invalid @enderror" value="{{old('suburb',$project->suburb)}}">
                 @error('suburb')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
              </div>
              <div class="col-lg-4">
                <label for="locality" >Localidad </label>
                <input required type="text" id="locality" name="locality" class="form-control @error('locality') is-invalid @enderror" value="{{old('locality',$project->locality)}}">
                 @error('locality')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
              </div>
              <div class="col-lg-4">
                <label  for="region">Región </label>
                <input required  type="text" id="region" name="region" class="form-control @error('region') is-invalid @enderror" value="{{old('region',$project->region)}}">
                 @error('region')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
              </div>
              <div class="col-lg-4">
                <label  for="state">Estado </label>
                <input required  type="text" id="state" name="state" class="form-control @error('state') is-invalid @enderror" value="{{old('state',$project->state)}}">
                 @error('state')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
              </div>

              <div class="col-lg-2">
                <label  for="postalCode">Código Postal </label>
                <input required minlength="5" maxlength="5" type="text" id="postalCode" name="postalCode" class="form-control @error('postalCode') is-invalid @enderror" value="{{old('postalCode',$project->postalCode)}}">
                 @error('postalCode')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
              </div>
              <div class="col-lg-6">
                <label  for="countryName">País</label>
                <input required maxlength="50" type="text" id="countryName" name="countryName" class="form-control @error('countryName') is-invalid @enderror" value="{{old('countryName',$project->countryName)}}">
                 @error('countryName')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
              </div>
            </div>

            <label for="description">Descripción del lugar</label>
            <textarea required  name="description" id="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror">{{$project->description}}</textarea>
             @error('description')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div><br>
            <h6 class="m-0 font-weight-bold text-primary">Responsable del proyecto</h6>
            <br>
            <div class="form-row">
            <div class="form-group col-md-8">
            <label for="nombreresponsable">Nombre del responsable del proyecto</label>
            <input required type="text" class="form-control" name="nombreresponsable" value="{{old('nombreresponsable',$project->nombreresponsable)}}">
            </div>
            <div class="form-group col-md-4">
            <label for="cargoresponsable">Cargo</label>
            <input required type="text" class="form-control" name="cargoresponsable" value="{{old('cargoresponsable',$project->cargoresponsable)}}">
            </div>

            </div>
            
             </div>

             <div>
            <h6 class="m-0 font-weight-bold text-primary">Datos de contacto del responsable del proyecto</h6>
            <br>
            <div class="form-row">
              <div class="form-group col-md-4">
              <label for="telefonoresponsable">Télefono</label>
            <input required type="number" class="form-control" name="telefonoresponsable" value="{{old('telefonoresponsable',$project->telefonoresponsable)}}">
              </div>
              <div class="form-group col-md-8">
              <label for="correoresponsable">Correo electrónico</label>
            <input required type="email" class="form-control" name="correoresponsable" value="{{old('correoresponsable',$project->correoresponsable)}}">
            </div>

            </div>
           
           
                      <label for="domiciliocontacto" class="m-0 font-weight-bold text-primary">Domicilio</label>
                        <div class="form-row">
                        
                            <div class="form-group col-md-5">
                                
                                <!--<input type="text" id="domiciliocontacto" name="domiciliocontacto" class="form-control" value="">-->

                                <label for="streetAddress" >Calle</label>
                                <input type="text" id="streetAddress" name="streetAddressc" class="form-control" value="{{old('streetAddressc',$project->streetAddressc )}}">
                                
                            </div>
                            <div class="form-group col-md-2" >
                                <label for="streetNum">Número</label>
                                <input type="text" id="streetNum" name="streetNumc" class="form-control"value="{{old('streetNumc',$project->streetNumc)}}">
                            </div>
                            <div class="form-group col-md-5" >
                                <label for="suburb">Colonia</label>
                                <input type="text" id="suburb" name="suburbc" class="form-control"value="{{old('suburb',$project->suburbc)}}">
                            </div>
                            <div class="form-group col-md-5" >
                                <label for="locality">Municipio</label>
                                <input type="text" id="locality" name="localityc" class="form-control" value="{{old('localityc',$project->localityc)}}">
                            </div>
                            <div class="form-group col-md-2" >
                                <label for="postalCode">Código postal</label>
                                <input type="text" minlength="5" maxlength="5" id="postalCode" name="postalCodec" class="form-control" value="{{old('postalCodec',$project->postalCodec)}}">
                            </div>
                            <div class="form-group col-md-4">
                            <label for="horarioresponsable">Horario de oficina</label>
                            <input required type="text" class="form-control" name="horarioresponsable" value="{{old('horarioresponsable',$project->horarioresponsable)}}">
                            </div>
                        </div>
           
          




             </div>
             <hr>

            <div class="form-row">
              <div class="form-group col-md-4">

                <label for="docfase1">Documentos</label>
               
                <input type="file" class="form-control @error('docfase1') is-invalid @enderror" id="docfase1" name="docfase1[]"  multiple onchange="return validateSize()">
                 @error('docfase1')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
              </div>
              
            
            
            
              <div class="form-group col-md-6">
                
                <label for="documenttype">Tipo de documento</label>
                <select name="documenttype" id="documenttype" class="form-control @error('documenttype') is-invalid @enderror">
                <option value="">Selecciona un opción</option>
                @foreach($documentstype as $type)
              
                <option value="{{$type->id}}">{{$type->titulo}}</option>

                @endforeach

                </select>
                 @error('documenttype')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            
              </div>
              <p><small>El tamaño de los archivos debe ser menor a 20MB</small></p>

               
            </div>
            @if(isset($documents))
            @if(sizeof($documents)!=0)
            <label for="">Lista de documentos</label>
            

            <div class="col-md-6">
           
            <table class="table table-sm">
            <tr>
            <th>Nombre del documento</th>
            <th>Tipo de documento</th>
            <th>Acciones</th>
            </tr>
        

            <tbody>
            @foreach($documents as $document)
            <?php 
              $ruta='documents/'.$document->url;
              $tipo=DocumentType::find($document->documentType);
            
             
            ?>


            <tr>
            <td>
            <a target="_blank" class="badge badge-pill badge-info" href="{{asset($ruta)}}">{{$document->url}}</a>
            </td>

            <td>
              @if($tipo!=null)
              {{$tipo->titulo}}
              @endif
            </td>
           
            <td>

            <a  id="deldoc" href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteUserModal" data-id="{{ $document->id }}" data-name="{{ $document->url }}">
            <i class="fa fa-trash"></i>  
</a>
           

            </td>
            </tr>

            @endforeach

           
           
            
            
            
            </tbody>

          </table>
          </div>
          @endif
          @endif
           
          <div class="form-row">
          <div class="form-group col-md-12">
        <label for="observaciones">Observaciones:</label>
        <input type="text" name="observaciones" id="observaciones" class="form-control" value="{{old('observaciones',$project->observaciones)}}">
          </div>
        </div>
           
            <hr>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas {{ $edit ? 'fa-save' : 'fa-edit' }} fa-sm text-white-50"></i>
                {{ $edit ? 'Actualizar' : 'Siguiente' }}
              </button>

            </div>
          </div>








        </div>

    </form>
    <form  id='formId'>@csrf</form>
  </div>

</div>

</div>




@include('admin.projects.modaldeletedocument')

@section('scripts')
<script src="{{asset('js/deletemodaldocument.js')}}"></script>

<script>


/**Para validación de tamaño de archivos */

function validateSize(){
  if (!window.FileReader) { // This is VERY unlikely, browser support is near-universal
        console.log("The file API isn't supported on this browser yet.");
        return false;
    }

    var input = document.getElementById('docfase1');
    if (!input.files) { // This is VERY unlikely, browser support is near-universal
        console.error("This browser doesn't seem to support the `files` property of file inputs.");
        return false;
    } else if (!input.files[0]) {
        //addPara("Please select a file before clicking 'Load'");
        alert("Debe seleccionar al menos un archivo");
        return false;
    } else {
        var file = input.files[0];
        let finalSize=0;
       // addPara("File " + file.name + " is " + file.size + " bytes in size");
       //alert("File " + file.name + " is " + file.size + " bytes in size");

       for(let i=0; i<input.files.length;i++){
          finalSize=file.size+finalSize;
       }

       if(finalSize>=20971520){
        alert('El tamaño total de los archivos supera los 20MB');

        input.value='';
        return false;
       }

      
    }
}


//Con fines de pruebas.
var org=document.querySelector('autoridadP');
//console.log(org);


//Validación del archivo
var fileInput = document.getElementById('excel');
 var xd;
function fileValidation(){
    xd=  document.getElementById("excel").files[0].name; 
    $('#ver').val(xd);
var filePath = fileInput.value;
var allowedExtensions = /(.xlsx|.csv)$/i;
if(!allowedExtensions.exec(filePath)){
    alert('Please upload file having extensions .xlsx or .csv');
    fileInput.value = '';
    return false;
}
}





var mydata=[];
var markers = new Array();
var names=new Array();
var fromfile=false;
var fromclic=false;
var index=0;
var i = 0;
var jsonFeatures = [];


//Iconos.

var greenIcon = new L.Icon({
iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
iconSize: [25, 41],
iconAnchor: [12, 41],
popupAnchor: [1, -34],
shadowSize: [41, 41]
});
var blueIcon = new L.Icon({
iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
iconSize: [25, 41],
iconAnchor: [12, 41],
popupAnchor: [1, -34],
shadowSize: [41, 41]
});

const myLatlng = {
      lat: 20.6566500419128,
      lng: -103.35528485969786
    };

  var map = L.map('map',{scrollWheelZoom: false,}).
        setView(myLatlng,

            12);

  /**Se manda el el excel subido mediante AJAX. Procesa la respuesta en json y dibuja los puntos
   * en el mapa y se construye la tabla. */    
  $('#formId').submit( function( e ) {
    e.preventDefault();

    var data = new FormData();
jQuery.each(jQuery('#formId')[0].files, function(i, file) {
    data.append('file-'+i, file);
});


    
    
    var fileform = new FormData(this); // <-- 'this' is your form element
    var token = $('meta[name="csrf-token"]').attr('content');

 
$.ajax({
      headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
      cache: false,
    contentType: false,
    processData: false,
            url: "{{ route('uploadExcel') }}",
            data: fileform,
            type: 'POST',   
           dataType:'json',
           success: function(resp) { //una vez que el archivo recibe el request lo procesa y lo devuelve
    console.log(resp);
    for (; index < resp.length; index++) {
    
   
   if((resp[index][1])=='Latitud' || (resp[index][0])=='Nombre' || resp[index][2]=="Longitud" || resp[index][0]==null || resp[index][1]==undefined){
 
   }else{
  


    mydata.push({latitud:resp[index][1],longitud:resp[index][2]});

    let ll=resp[index][1];
    let lgg=resp[index][2];
   let= aux_marker = L.marker([ll,lgg]);


    markers.push(aux_marker)
    

    names.push(resp[index][0]);
    let name = document.getElementById('name');
       name.value = resp[index][0] + '|' + name.value;

    let l = document.getElementById('lat');
       l.value = resp[index][1] + '|' + l.value;

     let lng = document.getElementById('lng');
       lng.value = resp[index][2] + '|' + lng.value;

       var auxfields = `<tr class=` + index + `>
       <td> <label id=`+index+` >`+resp[index][0]+`</label>
      <td>` +resp[index][1]+ `</td>
        <td>` +resp[index][2] + `</td>
        
        <td><i class="fas fa-eye"></i><input  type="checkbox" class="gg"  onchange='greenpoint(event,` + (index-1) + `)'></td>
        </td>
        </td>
        <td> <div class="form-check">
<input required type="radio" name="inputs" class="form-check-input exampleCheck1" onchange='puntop(`+resp[index][1]+`,`+resp[index][2]+`)'>

</div></td>
    </tr>`;
    

  flashCardList.insertAdjacentHTML("beforeend", auxfields );
  aux_marker.addTo(map);
   }
  
        
    }
                
  //console.log(mydata);

 // pintarPuntos(mydata);

  },
          
  })
  
  });

   
          



let l = document.getElementById('lat');
let f = l.value.split(',')

//Guarda los nombres de los inputs generados dinamicamente en un input que se mandará al servidor.
function cambioinput(inputvalue){
//alert("hola");
let name = document.getElementById('name');
name.value = inputvalue + '|' + name.value;

names.push(inputvalue);

}
/**Guarda la latlng del punto principal en su input asociado. */
function puntop(lat,lng){
  //alert(val);
  let punto = document.getElementById('punto');
  punto.value=lat+'|'+lng;
}



L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
  maxZoom: 15
}).addTo(map);
//this is for put the markes on the map getting the data from the inputs.
L.control.scale().addTo(map);

//Función que dibuja/pinta los puntos en el mapa mediante un json (obtenido del ajax que manda el excel).
function pintarPuntos(data){


data.forEach(function(point){
var lat = point.latitud;
var lon = point.longitud;

var feature = {type: 'Feature',
    properties: point,
    geometry: {
        type: 'Point',
       
        coordinates: [lon,lat]
    }
};

jsonFeatures.push(feature);
});

var geoJson = { type: 'FeatureCollection', features: jsonFeatures };

L.geoJson(geoJson).addTo(map);
}

/**Función que elimina todos los puntos dibujados en el mapa previamente y limpia todos las
 * cajas de texto o inputs en las que se haya guardado información referente a los puntos('nombres,lat
 * lng,etc'). También limpia las filas de la tabla generada.
 */
$("#del").on('click', function(evt){
      evt.preventDefault(); 
      $(".leaflet-marker-icon").remove();
      $(".leaflet-marker-shadow").remove();

      $("#lat").val("");
      $("#lng").val("");
      $("#name").val("");
      $("#cuerpo").empty();

      markers=new Array();
      names=new Array();
      index=0;
      i=0;
      x=false;
      fromfile=false;


      console.log(names);


});



var subedit = $('#subedit').val();
  var secedit = $('#secedit').val();

  if (subedit != '') {

    get_class_sections(secedit);
  }
/**Función  que recibe el id del select que contiene los ids de los sectores 
 * y lo manda mendiante ajax y rellena el select de los subsectores mediante la respuesta ajax.
 */
  function get_class_sections(id) {

    var select = $("#sectorProyecto");
    var subedit = $('#subedit').val();


    $('#subsector option').remove();
    $.ajax({
      data: {
        "_token": "{{ csrf_token() }}",
        "id": id
      }, //datos que se envian a traves de ajax
      url: "{{ route('catalogs.subsec') }}", //archivo que recibe la peticion
      type: 'post', //método de envio
      dataType: "json",
      success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve

        var bop = document.createElement("option");
        bop.value="";
        $(bop).html('Selecciona un subsector');
        $(bop).appendTo("#subsector");

        for (let index = 0; index < response.length; index++) {

          var option = document.createElement("option"); //Creas el elemento opción
          $(option).html(response[index].titulo); //Escribes en él el nombre de la provincia
          option.value = response[index].id;

          if (option.value == subedit) {
            $(option).prop('selected', true);
          }

          $(option).appendTo("#subsector");


        }


      },
      error: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve

        alert("Ha ocurrido un error, intente de nuevo.");
        console.log(response);
      }
    });



  }

  /**Previene el submit del form con 'enter' */
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



var flashCardList  = document.getElementById('cuerpo')

var tr = new Array();
var td;
var inputvalues=new Array();
var x=false;
//var lat;
//var lng;

function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
} 
  //here
  //Dibuja los puntos en base a los inputs rellenados desde la base de datos (registros previos)
	 let lf = document.getElementById('lat');


      
      let ff= lf.value.split('|')
     
      let lngf = document.getElementById('lng');
      let f2= lngf.value.split('|')

      //Para el registro de 'nombres' (nombre del punto de ubicación)

      let aux_name=document.getElementById('name');

      let name=aux_name.value.split('|');

      //para el punto principal

      var principal=document.getElementById('punto');
      principal=principal.value.split('|');
      var checked="";


      console.log(ff[0]);
      console.log(principal[0]);
      


       if(ff[0]!=""){
          
         
           for(var index=0;index<=ff.length;index++){
           
           if(ff[index]=="" || ff[index]==undefined || ff[index]==null){
            
           }else{

            if(ff[index]==principal[0]){
              checked="checked";
            }

            var marker = L.marker([ff[index],f2[index]]);

            markers.push(marker);

            if(name[index]==undefined || name[index]==''){
              name[index]="Sin nombre";
            }
           

            marker.addTo(map);

            //Para cargar de datos la tabla con la información de la bd
            var auxfields = `<tr class=` + index + `>
       <td> <label class='transparente' id=`+i+` >`+name[index]+`</label>
      <td>` +ff[index]+ `</td>
        <td>` +f2[index]+ `</td>
        
        <td><i class="fas fa-eye"></i><input  type="checkbox"   class="gg"  onchange='greenpoint(event,` + (index) + `)'></td>
        </td>
        </td>
        <td> <div class="form-check">
<input required type="radio" name="inputs" ` +checked+ ` class="form-check-input exampleCheck1" onchange='puntop(`+ff[index]+`,`+f2[index]+`)'>
 
</div></td>
    </tr>`;
    
    i=markers.length;

  flashCardList.insertAdjacentHTML("beforeend", auxfields );

           }
           

checked="";
}


       }


//function to draw the markers on the map.
function onMapClick(e) {

  fromclic=true;

/*Para concatenar los valores de latlng en los inputs correspondientes*/
  aux_marker = L.marker(e.latlng);

    let l = document.getElementById('lat');
  l.value=l.value+e.latlng.lat+'|';

  let lng = document.getElementById('lng');
  lng.value=lng.value+e.latlng.lng+'|';


  markers.push(aux_marker);
 

  //Para rellenar la tabla con los inputs en base a la selección de puntos en el mapa.
  if(fromfile){
  i=index;
   fromfile=false;
   x=true;
 
  }
  console.log('el indice es:'+i);
  console.log('el número de elementos del array es:'+markers);
var auxfields = `<tr class=` + i + `>
    <td>  <input required id=`+i+` type="text" name="array[]"  onchange='cambioinput(this.value)'></td>
      <td>` + e.latlng.lat + `</td>
        <td>` + e.latlng.lng + `</td>
        <td><button style="margin-right:2%;"  onclick='delrow(` + i + `)'>Eliminar</button>
        <i class="fas fa-eye"></i><input  type="checkbox" class="gg"  onchange='greenpoint(event,` + i + `)'>
        </td>
        <td> <div class="form-check">
<input required type="radio" class="form-check-input exampleCheck1" name="inlineRadioOptions" onchange='puntop(`+e.latlng.lat+`,`+e.latlng.lng+`)'>


</div></td>
    </tr>`;
    
  



  aux_marker.addTo(map);
  flashCardList.insertAdjacentHTML("beforeend", auxfields );

  i++;
}


//Función que pinta de color verde el marcador/punto del mapa seleccionado como 'punto principal'

function greenpoint(event,index){
 
  if(x){
    index=index-2;
   
  }


  //console.log(index);
  console.log(markers);
  //if(index)
  var checkbox = event.target;

if (checkbox.checked) {
//Checkbox has been checked
markers[index].setIcon(greenIcon);

} else {
//Checkbox has been unchecked
markers[index].setIcon(blueIcon);
}
/*
markers[index].setIcon(greenIcon);
aux=markers[index].options.icon;
aux=aux.options.iconUrl
console.log(aux);

if(aux=="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png"){
  console.log('si');
}
*/
}
/**Función que elimina la fila de la tabla generada dinámicamente con el botón "eliminar"
 *dentro de la misma fila.
  */
function delrow(dato) {
  console.log(markers);
 
  auxdato=dato;
  var c=0;
   if(x){
    dato=dato-2;
    c=dato;
  }

 

  $('.' + auxdato).remove();


console.log(dato);
markers[dato].remove();



  delete markers[dato];
  delete names[dato];


  console.log(names);



let b = "";
  let name = document.getElementById('name');
  for (let i=0; i< names.length; i++) {
    if (names[i] != null) {


      b = names[i]+ '|' + b;
    }
  }
  name.value = b;

 
  let m = "";
  let l = document.getElementById('lat');
  for (let i=0; i < markers.length; i++) {
   
    if (markers[i] != null) {


      m = markers[i]._latlng.lat + '|' + m;
    }
  }
 
  l.value = m;


  let n = "";
  let lng = document.getElementById('lng');
  for (let i=0;i< markers.length; i++) {
    if (markers[i] != null) {

      n = markers[i]._latlng.lng + '|' + n;
    }
  }
  lng.value = n;

}



map.on('click', onMapClick);
</script>
@endsection


@endsection


@section('scripts')

@endsection