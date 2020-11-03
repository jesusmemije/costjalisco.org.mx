<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHzvoUaKDOaWGOu0ZNUpB_SJigsBgOOzI&callback=initMap&libraries=places&v=weekly&language=mx&region=MX"
      defer
    ></script>

    @section('styles')
<style>
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

<div class="col-lg-12">

<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
    <h6 class="m-0 font-weight-bold text-primary">Proyecto</h6>
  </a>
  <!-- Card Content - Collapse -->
  <div class="collapse show" id="collapseCardExample1">
    <div class="card-body">

      <label>
        Título del proyecto
      </label>
      <input type="text" class="form-control" name="tituloProyecto">
      <div class="form-row">
    <div class="form-group col-md-6">
      <label>
        Descripción
      </label>
      <textarea class="form-control" rows="1"  name="descripcionProyecto"></textarea>
    </div>
    <div class="form-group col-md-6">
        <label for="">Autoridad Pública</label>
    <select name="autoridadP" class="form-control">

@foreach($autoridadP as $autoridad)

<option value="{{$autoridad->id}}">{{$autoridad->name}}</option>

@endforeach

</select>
    </div>


</div>
     



    
      <label>
        Próposito
      </label>
      <input type="text" class="form-control" name="propositoProyecto">
    <div class="form-row">
    <div class="form-group col-md-6">

   
   
      <label>
        Sector
      </label>

      <select class="form-control" name="sectorProyecto">
      @foreach ($sectors as $sector)
                <option value="{{$sector->id}}">{{$sector->titulo}}</option>

                @endforeach
      </select>
      </div>
      <div class="form-group col-md-6">
      <label>
        Subsector
      </label>

      <select class="form-control" name="sectorProyecto">
      @foreach ($sectors as $sector)
                <option value="{{$sector->id}}">{{$sector->titulo}}</option>

                @endforeach
      </select>
      </div>

      </div>

      <h5 class="m-0 font-weight-bold text-primary">Ubicación del proyecto</h5><br>

      
      <div class="pac-card"  id="pac-card">
      <div>
        <div id="title">Encuentra el lugar</div>
        <div id="type-selector" class="pac-controls">
          <input
            type="radio"
            name="type"
            id="changetype-all"
            checked="checked"
          />
          <label for="changetype-all">All</label>

          <input type="radio" name="type" id="changetype-establishment" />
          <label for="changetype-establishment">Establishments</label>

          <input type="radio" name="type" id="changetype-address" />
          <label for="changetype-address">Addresses</label>

          <input type="radio" name="type" id="changetype-geocode" />
          <label for="changetype-geocode">Geocodes</label>
        </div>
        <div id="strict-bounds-selector" class="pac-controls">
          <input type="checkbox" id="use-strict-bounds" value="" />
          <label for="use-strict-bounds">Strict Bounds</label>
        </div>
      </div>
      <div id="pac-container">
        <input id="pac-input" type="text" placeholder="Enter a location" />
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
    <input hidden type="text" id="lat" name="lat">
      <input hidden type="text" id="lng" name="lng">
     
    <label>Calle </label>
    <input type="text" name="streetAddress" class="form-control">
    </div>
    <div class="col-lg-6">
    <label>Localidad </label>
    <input type="text" name="locality" class="form-control">
    </div>
    <div class="col-lg-6">
    <label>Región </label>
    <input type="text" name="region" class="form-control">
    </div>
    <div class="col-lg-6">
    <label>Código Postal </label>
    <input type="text" name="postalCode" class="form-control">
    </div>
    <div class="col-lg-6">
    <label>País</label>
    <input type="text" name="countryName" class="form-control">
    </div>
    </div>

    <label for="">Descripción del lugar</label>
    <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
    
    </div>
    <hr>
    <button id="part1" class="btn btn-sm btn-primary shadow-sm offset-md-10">
      <i class="fas fa-save fa-sm text-white-50"></i>
     Siguiente
    </button>
    <hr>
  </div>
</div>

</div>

</div>


@section('scripts')

<script>

$('#part1').click(function(){
$('#profile-tab').tab('show');

});

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
  const myLatlng = { lat: 20.6566500419128, lng: -103.35528485969786 };
  const map = new google.maps.Map(document.getElementById("map"), {
    center: myLatlng,
    zoom: 13,
  });
    // Create the initial InfoWindow.
    let infoWindow = new google.maps.InfoWindow({
    content: "Click the map to get Lat/Lng!",
    position: myLatlng,
  });
  infoWindow.open(map);
  // Configure the click listener.
  map.addListener("click", (mapsMouseEvent) => {
    // Close the current InfoWindow.
    
    document.getElementById('lat').value=mapsMouseEvent.latLng.lat();
    document.getElementById('lng').value=mapsMouseEvent.latLng.lng();
    
    
    infoWindow.close();
    // Create a new InfoWindow.
    infoWindow = new google.maps.InfoWindow({
      position: mapsMouseEvent.latLng,
    });
    infoWindow.setContent(
      JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
     
    );
    infoWindow.open(map);
  
    
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
    .addEventListener("click", function () {
      console.log("Checkbox clicked! New state=" + this.checked);
      autocomplete.setOptions({ strictBounds: this.checked });
    });
}


  </script>

@endsection
