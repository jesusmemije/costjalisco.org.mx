@extends("admin.layouts.app")


@section('content')

@include('admin.projects.phasesnav')


<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHzvoUaKDOaWGOu0ZNUpB_SJigsBgOOzI&callback=initMap&libraries=places&v=weekly&language=mx&region=MX" defer></script>

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
      <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
          @include('admin.layouts.partials.validation-error')


          @include('admin.layouts.partials.session-flash-status')



          <h6 class="m-0 font-weight-bold text-primary">Datos generales del responsable del registro del proyecto</h6>
        </a>
        <!-- Card Content - Collapse -->

        <div class="collapse show" id="collapseCardExample1">
          <div class="card-body">

            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{old('descripcion',$generaldata->descripcion)}}">

            <label for="nombreresponsable">Nombre de la persona que registra el proyecto</label>
            <input type="text" name="nombreresponsable" id="nombreresponsable" class="form-control" value="{{old('nombreresponsable',$generaldata->responsable)}}">


            <label for="email">Correo electrónico (Institucional)</label>
            <input type="email" name="email" class="form-control" id="email" value="{{old('email',$generaldata->email)}}">

            <label for="organismo">Organismo al que pertenece</label>
            <input type="text" name="organismo" class="form-control" id="organismo" value="{{old('organismo',$generaldata->organismo)}}">

            <label for="puesto">Puesto que desempeña dentro del organismo</label>
            <input type="text" name="puesto" class="form-control" id="puesto" value="{{old('puesto',$generaldata->puesto)}}">

            <label for="involucrado">En caso de haber una persona más involucrada en el registro del proyecto favor de mencionar</label>
            <input type="text" name="involucrado" class="form-control" id="involucrado" value="{{old('involucrado',$generaldata->involucrado)}}">





          </div>

        </div>

      </div>



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
                <input required id="tituloProyecto" type="text" class="form-control" name="tituloProyecto" value="{{old('tituloProyecto',$project->title)}}">
              </div>
              <div class="form-group col-md-3">
                <label for="ocid">
                  Número que identifica al proyecto
                </label>
                <input required id="ocid" type="text" class="form-control" name="ocid" value="{{old('ocid',$project->ocid)}}">
              </div>

            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="descripcionProyecto">
                  Descripción
                </label>
                <textarea class="form-control" rows="1" id="descripcionProyecto" name="descripcionProyecto">{{$project->description}}</textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="autoridadP">Autoridad Pública</label>
                <select required id="autoridadP" name="autoridadP" class="form-control">
                  <option value="">Seleccionar</option>
                  @foreach($autoridadP as $autoridad)

                  @if($autoridad->id==$project->publicAuthority_id)

                  <option value="{{$autoridad->id}}" selected>{{$autoridad->name}}</option>
                  @else
                  <option value="{{$autoridad->id}}">{{$autoridad->name}}</option>
                  @endif
                  @endforeach

                </select>
              </div>


            </div>

            <label for="propositoProyecto">
              Próposito
            </label>
            <input type="text" class="form-control" id="propositoProyecto" name="propositoProyecto" value="{{old('propositoProyecto',$project->purpose)}}">
            <div class="form-row">
              <div class="form-group col-md-6">



                <label for="sectorProyecto"> 
                  Sector
                </label>
                <input hidden type="text" value="{{$project->sector}}" id="secedit">
                <select required id="sectorProyecto" class="form-control" name="sectorProyecto" onchange="return get_class_sections(this.value)">

                  <option value="">Seleccione un sector</option>
                  @foreach ($sectors as $sector)
                  @if($sector->id==$project->sector)
                  <option value="{{$sector->id}}" selected>{{$sector->titulo}}</option>
                  @else
                  <option value="{{$sector->id}}">{{$sector->titulo}}</option>
                  @endif



                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="subsector">
                  Subsector
                </label>
                <input hidden type="text" name="" id="subedit" value="{{$project->subsector}}">

                <select required id="subsector" class="form-control" name="subsector">
                  <option value="">Seleccione un subsector</option>
                </select>
              </div>
              <label for="tipoProyecto" class="col-md-2">Tipo de proyecto</label>

              <select name="tipoProyecto" id="tipoProyecto" class="form-control col-md-6">
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

            <h6 class="m-0 font-weight-bold text-primary">Ubicación del proyecto</h6><br>


            <div class="pac-card col-md-4" id="pac-card">
              <div>
                <div id="title">Encuentra el lugar</div>


              </div>
              <div id="pac-container">
                <br>
                <input id="pac-input" type="text" placeholder="Ingresa una ubicación" />
              </div>
            </div>

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
                <input required type="text" id="streetAddress" name="streetAddress" class="form-control" value="{{old('streetAddress',$project->streetAddress)}}">
              </div>
              <div class="col-lg-6">
                <label for="locality" >Localidad </label>
                <input type="text" id="locality" name="locality" class="form-control" value="{{old('locality',$project->locality)}}">
              </div>
              <div class="col-lg-6">
                <label  for="region">Región </label>
                <input type="text" id="region" name="region" class="form-control" value="{{old('region',$project->region)}}">
              </div>
              <div class="col-lg-6">
                <label  for="postalCode">Código Postal </label>
                <input type="text" id="postalCode" name="postalCode" class="form-control" value="{{old('postalCode',$project->postalCode)}}">
              </div>
              <div class="col-lg-6">
                <label  for="countryName">País</label>
                <input type="text" id="countryName" name="countryName" class="form-control" value="{{old('countryName',$project->countryName)}}">
              </div>
            </div>

            <label for="description">Descripción del lugar</label>
            <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{$project->description}}</textarea>
            <div class="form-row">
              <div class="form-group col-md-4">

                <label for="docfase1">Documentos</label>
                <input type="file" class="form-control" id="docfase1" name="docfase1[]" multiple>
              </div>
              <div class="form-group col-md-6">
                <label for="documenttype">Tipo de documento</label>
                <select name="documenttype" id="documenttype" class="form-control">
                <option value="">Selecciona un opción</option>
                @foreach($documentstype as $type)
              
                <option value="{{$type->id}}">{{$type->titulo}}</option>

                @endforeach

                </select>
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
    /*
    let infoWindow = new google.maps.InfoWindow({
      content: "Selecciona una parte del mapa",
      position: myLatlng,
    });
    
    infoWindow.open(map);
    */
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
      /*
      infoWindow.close();
      // Create a new InfoWindow.
      infoWindow = new google.maps.InfoWindow({
        position: mapsMouseEvent.latLng,
      });
      infoWindow.setContent(
        JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)

      );
      infoWindow.open(map);
      */

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
</script>

@endsection


@endsection


@section('scripts')

@endsection