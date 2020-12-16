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
@include('admin.layouts.partials.session-flash-status')
@include('admin.layouts.partials.validation-error')


<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <br>

  <div class="col-lg-12">
    <form id="phase1" method="POST" action="{{route($ruta)}}" enctype="multipart/form-data">
      @csrf
      


      <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample2">

          <h6 class="m-0 font-weight-bold text-primary">Proyecto</h6>
        </a>
        <!-- Card Content - Collapse -->

        <div class="collapse show" id="collapseCardExample2">
          <div class="card-body">


            <input type="text" value="{{$project->id}}" name="id_project">
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
            <input type="number" name="people" id="people" class="form-control" value="{{old('people',$project->people)}}">
            </div>
            
   </div>
            
            @error('lat')
            <div class="invalid-feedback" style="display: block;">Debe seleccionar al menos un lugar en el mapa.</div>
            @enderror
            <h6 class="m-0 font-weight-bold text-primary">Ubicación del proyecto</h6><br>
        

            <!-- buscador 
            <div class="pac-card col-md-4" id="pac-card">
              <div>
                <div id="title">Encuentra el lugar</div>


              </div>
              <div id="pac-container">
                <br>
                <input id="pac-input" type="text" placeholder="Ingresa una ubicación" />
              </div>
            </div>
                -->
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
           if(f[i]!=""){
               var marker = L.marker([f[i],f2[i]]).addTo(map);
           }else{

           }
           


}

       }
       


       function onMapClick(e) {


           L.marker(e.latlng, {
               draggable: true
           }).addTo(map);

           let l = document.getElementById('lat');
           l.value = e.latlng.lat + '|' + l.value;

           let lng = document.getElementById('lng');
           lng.value = e.latlng.lng + '|' + lng.value;
       }

       map.on('click', onMapClick);

/* google maps init
  let map;
  function initMap() {

    const myLatlng = {
      lat: 20.6566500419128,
      lng: -103.35528485969786
    };
    const map = new google.maps.Map(document.getElementById("map"), {
      center: myLatlng,
      zoom: 13,
    });
    // Create the initial InfoWindow.
    
    let infoWindow = new google.maps.InfoWindow({
      content: "Selecciona una parte del mapa",
      position: myLatlng,
    });
    
    infoWindow.open(map);
    
    // Configure the click listener.

    const savedLatlng = {
      lat: document.getElementById('lat').value,
      lng: document.getElementById('lng').value,
    }


    let mymarker = new google.maps.Marker({
      position: savedLatlng,
      title: "Hello World!"
    });
    mymarker.setMap(mymarker);

    map.addListener("click", (mapsMouseEvent) => {
      // Close the current InfoWindow.

      lat = mapsMouseEvent.latLng.lat();
      lng = mapsMouseEvent.latLng.lng();

      document.getElementById('lat').value = lat;
      document.getElementById('lng').value = lng;

      const themarker = {
        lat: lat,
        lng: lng
      };
      
      infoWindow.close();
      // Create a new InfoWindow.
      infoWindow = new google.maps.InfoWindow({
        position: mapsMouseEvent.latLng,
      });
      infoWindow.setContent(
        JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)

      );
      infoWindow.open(map);
      

      mymarker.setMap(null);
      mymarker = new google.maps.Marker({
        position: themarker,
        title: "Hello World!"
      });
      mymarker.setMap(map);

    });






    const card = document.getElementById("pac-card");
    const input = document.getElementById("pac-input");
    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);
    const autocomplete = new google.maps.places.Autocomplete(input);
    // Bind the map's bounds (viewport) property to the autocomplete object,
    // so that the autocomplete requests use the current map bounds for the
    // bounds option in the request.
    autocomplete.bindTo("bounds", map);
    // Set the data fields to return when the user selects a place.
    autocomplete.setFields(["address_components", "geometry", "icon", "name"]);
    const infowindow = new google.maps.InfoWindow();
    const infowindowContent = document.getElementById("infowindow-content");
    infowindow.setContent(infowindowContent);
    const marker = new google.maps.Marker({
      map,
      anchorPoint: new google.maps.Point(0, -29),
    });
    autocomplete.addListener("place_changed", () => {
      infowindow.close();
      marker.setVisible(false);
      const place = autocomplete.getPlace();

      if (!place.geometry) {
        // User entered the name of a Place that was not suggested and
        // pressed the Enter key, or the Place Details request failed.
        window.alert("No details available for input: '" + place.name + "'");
        return;
      }

      // If the place has a geometry, then present it on a map.
      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17); // Why 17? Because it looks good.
      }
      marker.setPosition(place.geometry.location);
      marker.setVisible(true);
      let address = "";

      if (place.address_components) {
        address = [
          (place.address_components[0] &&
            place.address_components[0].short_name) ||
          "",
          (place.address_components[1] &&
            place.address_components[1].short_name) ||
          "",
          (place.address_components[2] &&
            place.address_components[2].short_name) ||
          "",
        ].join(" ");
      }
      infowindowContent.children["place-icon"].src = place.icon;
      infowindowContent.children["place-name"].textContent = place.name;
      infowindowContent.children["place-address"].textContent = address;
      infowindow.open(map, marker);
    });

    // Sets a listener on a radio button to change the filter type on Places
    // Autocomplete.
    function setupClickListener(id, types) {
      const radioButton = document.getElementById(id);
      radioButton.addEventListener("click", () => {
        autocomplete.setTypes(types);
      });
    }
    setupClickListener("changetype-all", []);
    setupClickListener("changetype-address", ["address"]);
    setupClickListener("changetype-establishment", ["establishment"]);
    setupClickListener("changetype-geocode", ["geocode"]);
    document
      .getElementById("use-strict-bounds")
      .addEventListener("click", function() {
        console.log("Checkbox clicked! New state=" + this.checked);
        autocomplete.setOptions({
          strictBounds: this.checked
        });
      });
      
  }
  */
</script>

@endsection


@endsection


@section('scripts')

@endsection