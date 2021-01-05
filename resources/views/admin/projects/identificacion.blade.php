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
                <input required maxlength="255" placeholder="Título del acto público en Jalisco" required id="tituloProyecto" type="text" class="form-control @error('tituloProyecto') is-invalid @enderror" name="tituloProyecto" value="{{old('tituloProyecto',$project->title)}}">
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
                <textarea required maxlength="255" placeholder="Descripción del acto público en Jalisco" class="form-control @error('descripcionProyecto') is-invalid @enderror" rows="1" id="descripcionProyecto" name="descripcionProyecto">{{$project->descripcionProyecto}}</textarea>
                @error('descripcionProyecto')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
              </div>

              <div class="form-group col-md-6">
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
              </div>
            </div>

            <label for="propositoProyecto">
              Próposito
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

              <div class="form-group col-md-6">
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
            
   </div>
            
            @error('lat')
            <div class="invalid-feedback" style="display: block;">Debe seleccionar al menos un lugar en el mapa.</div>
            @enderror
            <h6 class="m-0 font-weight-bold text-primary">Ubicación del proyecto <sup data-bs-toggle="tooltip" data-bs-placement="top" title="Puedes seleccionar un archivo csv con el formato (Descargar formato) para colocar múltiples puntos en el mapa."><i class="fa fa-question-circle" aria-hidden="true"></i>
</sup></h6><br>
           
    
<div id="here" style="border: 1px solid green;" class="row">


<div class="col-md-9">
<input class="btn btn-sm btn-outline-primary" type="file" name="excel"  id="excel" value="Cargar Excel" onchange="return fileValidation()">
  <button class="btn btn-sm btn-outline-info">Descargar formato</button>
  <input type="hidden" id="ver">
  
  <button class="btn btn-outline-success btn-sm" id="subir">Subir</button>
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
          

            <div class="row">
              <div class="col-lg-6">

                <input type="hidden" id="lat" name="lat" value="{{old('lat',$project->lat)}}">
                <input type="hidden" id="lng" name="lng" value="{{old('lng',$project->lng)}}">

                <label for="streetAddress">Calle </label>
                <input required maxlength="50" placeholder="Lugar en el cual se ejecutará el proyecto (calle, colonia, municipio)" required type="text" id="streetAddress" name="streetAddress" class="form-control @error('streetAddress') is-invalid @enderror" value="{{old('streetAddress',$project->streetAddress)}}">
                 @error('streetAddress')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror

              </div>
              <div class="col-lg-6">
                <label for="locality" >Localidad </label>
                <input required maxlength="50" type="text" id="locality" name="locality" class="form-control @error('locality') is-invalid @enderror" value="{{old('locality',$project->locality)}}">
                 @error('locality')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
              </div>
              <div class="col-lg-6">
                <label  for="region">Región </label>
                <input required maxlength="50" type="text" id="region" name="region" class="form-control @error('region') is-invalid @enderror" value="{{old('region',$project->region)}}">
                 @error('region')
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
            <textarea required maxlength="50" name="description" id="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror">{{$project->description}}</textarea>
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
            <input required type="text" class="form-control" name="correoresponsable" value="{{old('correoresponsable',$project->correoresponsable)}}">
            </div>

            </div>
           
           <div class="form-row">

           <div class="form-group col-md-8">
           <label for="domicilioresponsable">Domicilio</label>
            <input  required type="text" class="form-control" name="domicilioresponsable" value="{{old('domicilioresponsable',$project->domicilioresponsable)}}">
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
                <input type="file" class="form-control @error('docfase1') is-invalid @enderror" id="docfase1" name="docfase1[]" multiple>
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
            
               
            </div>
            @if(isset($documents))
            @if(sizeof($documents)!=0)
            <label for="">Lista de documentos</label>
            

            <div class="col-md-6">
           
            <table class="table table-sm">
            <tr>
            <th>Nombre del documento</th>
            <th>Acciones</th>
            </tr>
        

            <tbody>
            @foreach($documents as $document)
            <?php 
              $ruta='documents/'.$document->url;
             
            ?>


            <tr>
            <td>
            <a target="_blank" class="badge badge-pill badge-info" href="{{asset($ruta)}}">{{$document->url}}</a>
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
  </div>

</div>

</div>

@include('admin.projects.modaldeletedocument')

@section('scripts')
<script src="{{asset('js/deletemodaldocument.js')}}"></script>

<script>
  


 //excel to json map part.

//File Validation
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

    


    //ajax processing
    var mydata=[];

    
   

    $("#subir").on('click', function(evt){
      evt.preventDefault();  
      if( $('#ver').val()!=""){
  
    $.ajax({
      data: {
        "_token": "{{ csrf_token() }}",
        "excel": xd,
       
      }, //datos que se envian a traves de ajax
      url: "{{ route('uploadExcel') }}", //archivo que recibe la peticion
      type: 'post', //método de envio
      dataType: "json",
      success: function(resp) { //una vez que el archivo recibe el request lo procesa y lo devuelve
       
        for (let index = 0; index < resp.length; index++) {
        
       
       if((resp[index][0])=='Latitud' || resp[index][1]=="Longitud" || resp[index][0]==null || resp[index][1]==undefined){
     
       }else{
        mydata.push({latitud:resp[index][0],longitud:resp[index][1]});

        let l = document.getElementById('lat');
           l.value = resp[index][0] + '|' + l.value;

         let lng = document.getElementById('lng');
           lng.value = resp[index][1] + '|' + lng.value;

        
       }
      
            
        }
                    
      console.log(mydata);

      pintarPuntos(mydata);

      },
      error: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve

       // alert("Ha ocurrido un error, intente de nuevo.");
        //console.log(response);
      }
    });
      }else{
        alert("Debe seleccionar un archivo .csv para colocar los puntos en el mapa");
      }
 });


function pintarPuntos(data){
    var jsonFeatures = [];

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


$("#del").on('click', function(evt){
      evt.preventDefault(); 
      $(".leaflet-marker-icon").remove();
      $(".leaflet-marker-shadow").remove();

      $("#lat").val("");
      $("#lng").val("");
});






  var subedit = $('#subedit').val();
  var secedit = $('#secedit').val();

  if (subedit != '') {

    get_class_sections(secedit);
  }

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

      let l = document.getElementById('lat');
      
      let f= l.value.split('|')
     
      let lng = document.getElementById('lng');
      let f2= lng.value.split('|')
     
  

  const myLatlng = {
      lat: 20.6566500419128,
      lng: -103.35528485969786
    };

  var map = L.map('map').
        setView(myLatlng,
            12);

            

        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
            maxZoom: 18
        }).addTo(map);


        L.control.scale().addTo(map);
       
       if(f[0]!=""){
          
         
           for(var i=0;i<=f.length;i++){
           
           if(f[i]=="" || f[i]==undefined || f[i]==null){
            
           }else{
            var marker = L.marker([f[i],f2[i]]).addTo(map);
           }
           


}

       }

       
       


       function onMapClick(e) {


           var marker=L.marker(e.latlng, {
               draggable: false
           }).addTo(map);

          // marker.addClass('selectedMarker');
           


           let l = document.getElementById('lat');
           l.value = e.latlng.lat + '|' + l.value;

           let lng = document.getElementById('lng');
           lng.value = e.latlng.lng + '|' + lng.value;
       }

       map.on('click', onMapClick);


       var here=document.getElementsByName('selectedMarker');
       console.log(here);
    
     

</script>

@endsection


@endsection


@section('scripts')

@endsection