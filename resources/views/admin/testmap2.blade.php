@extends("admin.layouts.app")
<?php

if (isset($datos)) {
} else {
  $datos['lat'] = "";
  $datos['lng'] = "";
}

?>

<!DOCTYPE html>
<html>
<meta charset="utf-8" />

<head>
  <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />

  <style>
    #map {
      height: 400px;
    }
  </style>

</head>

<body>
  <div id="map"></div>
<hr>
 <form id="form" method="POST" enctype="multipart/form-data">
 @csrf


 <input type="file" name="excel"  id="excel" value="Cargar Excel" onchange="return fileValidation()">
  <button>Descargar formato</button>
  <input type="text" id="ver">
  <input type="submit" value="Subir" id="subir">
 </form>

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>Nonbre</th>
        <th>Latitud</th>
        <th>Longitud</th>
        <th>Acciones</th>
        <th>Punto Principal</th>
      </tr>
    </thead>

    <tbody id="cuerpo">
    </tbody>
  </table>

  <button onclick="consulta()">Consulta puntos</button>

  <form action="{{route('tm')}}" method="POST">
    @csrf
    <textarea name="nombre" id="nombre" cols="30" rows="10"></textarea>
    <textarea name="lat" id="lat" cols="30" rows="10">{{$datos['lat']}}</textarea>
    <textarea name="lng" id="lng" cols="30" rows="10">{{$datos['lng']}}</textarea>
    <input type="submit" name="send">
  </form>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <script>

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
   

    $("#form").on('submit', function(evt){
    evt.preventDefault();  

  
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
 });




    let l = document.getElementById('lat');
    let f = l.value.split(',')







    /*
     let f= l.value.split(',')
    
     let lng = document.getElementById('lng');
     let f2= lng.value.split(',')
    */
    var map = L.map('map').
    setView([41.66, -4.72],
      14);



    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
      maxZoom: 12
    }).addTo(map);
    //this is for put the markes on the map getting the data from the inputs.
    L.control.scale().addTo(map);

    /*
      
        for (let i = 0; i < f.length ; i++) {
        
        var markers=  L.marker([f[i].lat,f[i].lng]).addTo(map);
          
        }
        */
        /*
        

        var states = [{
    "type": "Feature",
    "properties": {"party": "Republican"},
    "geometry": {
        "type": "Point",
        "coordinates": [[
            [-104.05, 48.99],
            [-97.22,  48.98],
            [-96.58,  45.94],
            [-104.03, 45.94],
            [-104.05, 48.99]
        ]]
    }
}];

L.geoJSON(states, {
    style: function(feature) {
        switch (feature.properties.party) {
            case 'Republican': return {color: "#ff0000"};
            case 'Democrat':   return {color: "#0000ff"};
        }
    }
}).addTo(map);
*/


var data = [{
"latitud": 43.526523590087891,
"longitud": -5.6150951385498047
}, {
"latitud": 43.511680603027344,
"longitud": -5.6671133041381836
},
{
"latitud": 43.526451110839844,
"longitud": -5.6140098571777344
}]

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




    var markers = new Array();
    var tr = new Array();
    var td;
    var i = 0;
    //var lat;
    //var lng;

    let letras = ['A', 'B', 'C', 'D', 'F', 'G', 'H', 'I'];

    //function to draw the markers on the map.
    function onMapClick(e) {


      $("#cuerpo").html("");

      aux_marker = L.marker(e.latlng);
      markers.push(aux_marker);







      aux_tr = `<tr class=` + i + `>
        <td>  <input type="text"></td>
          <td>` + e.latlng.lat + `</td>
            <td>` + e.latlng.lng + `</td>
            <td><button onclick='delrow(` + i + `)'>Eliminar</button></td>
            <td> <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    
  </div></td>
        </tr>`;



      aux_marker.addTo(map);
      tr.push(aux_tr);
      $("#cuerpo").append(tr);







      let m = "";
      let l = document.getElementById('lat');
      for (let i = 0; i < markers.length; i++) {
        if (markers[i] != null) {


          m = markers[i]._latlng.lat + '|' + m;
        }
      }
      l.value = m;

      /*

      let lng = document.getElementById('lng');
      lng.value = e.latlng.lng + '|' + lng.value;

      */



      let n = "";
      let lng = document.getElementById('lng');
      for (let i = 0; i < markers.length; i++) {
        if (markers[i] != null) {
          n = markers[i]._latlng.lng + '|' + n;
        }
      }
      lng.value = n;


      //l.value=marker;
      i++;
    }

    function consulta() {
      for (let i = 0; i < markers.length; i++) {
        markers[i].addTo(map);

        aux_tr = `<tr class=` + i + `>
        <td>` + letras[i] + `</td>
          <td>` + markers[i]._latlng.lat + `</td>
            <td>` + markers[i]._latlng.lng + `</td>
            <td><button onclick='delrow(` + i + `)'>Eliminar</button></td>
        </tr>`;


        tr.push(aux_tr);

        //console.log(markers[i]._latlng.lat);
      }
      $("#cuerpo").append(tr);

    }


    function delrow(dato) {

      $('.' + dato).remove();

      delete tr[dato];


      markers[dato].remove();



      delete markers[dato];
      console.log(markers);

      let m = "";
      let l = document.getElementById('lat');
      for (let i = 0; i < markers.length; i++) {
        if (markers[i] != null) {


          m = markers[i]._latlng.lat + '|' + m;
        }
      }
      l.value = m;



      lng = document.getElementById('lng');
      lng.value = e.latlng.lng + '|' + lng.value;
      //agregar buscador de direcciones y
      //que dibuje el punto cuando lo busque.
      //añadirle al punto la letra a la cual hace referencia.


      let n = "";
      let lng = document.getElementById('lng');
      for (let i = 0; i < markers.length; i++) {
        if (markers[i] != null) {

          n = markers[i]._latlng.lng + '|' + n;
        }
      }
      lng.value = n;



    }



    map.on('click', onMapClick);
  </script>
</body>

</html>