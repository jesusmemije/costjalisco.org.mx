@extends("admin.layouts.app")
@section('content')

<link href="{{asset("admin_assets/vendor/datatables/dataTables.bootstrap4.min.css")}}" rel="stylesheet">

<script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />


@section('styles')
  <!-- Custom styles for this page -->
 
  <style>
     #map {
    height: 500px;
    width: 100%;
  }

  #myInput {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
  border-collapse: collapse; /* Collapse borders */
  width: 100%; /* Full-width */
  border: 1px solid #ddd; /* Add a grey border */
  font-size: 18px; /* Increase font-size */
}

#myTable th, #myTable td {
  text-align: left; /* Left-align text */
  padding: 12px; /* Add padding */
}

#myTable tr {
  /* Add a bottom border to all table rows */
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  /* Add a grey background color to the table header and on hover */
  background-color: #f1f1f1;
}
  </style>


@endsection
<?php

if (isset($datos)) {
} else {
  $datos['lat'] = "";
  $datos['lng'] = "";
}

?>


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
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

  <table  id="myTable" class="table">
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
   

  </div>
  <!--
  <button id="test2">append</button>
  <button onclick="consulta()">Consulta puntos</button>-->

  <form action="{{route('tm')}}" method="POST">
    @csrf
    <textarea name="name" id="name" cols="30" rows="10"></textarea>
    <textarea name="lat" id="lat" cols="30" rows="10">{{$datos['lat']}}</textarea>
    <textarea name="lng" id="lng" cols="30" rows="10">{{$datos['lng']}}</textarea>
    <textarea name="punto" id="punto" cols="30" rows="10"></textarea>
    <input type="submit" name="send">
  </form>


@endsection


@section('scripts')
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="{{asset("admin_assets/vendor/datatables/jquery.dataTables.min.js")}}"></script>
  <script src="{{asset("admin_assets/vendor/datatables/dataTables.bootstrap4.min.js")}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset("admin_assets/js/demo/datatables-demo.js")}}"></script>
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
    var markers = new Array();
    var names=new Array();
    var fromfile=false;
    var fromclic=false;
    var index=0;
    var i = 0;
    var jsonFeatures = [];


    //icons

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

  var map = L.map('map').
        setView(myLatlng,
            12);

          

 
    $("#subir").on('click', function(evt){
      fromfile=true;
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
        <td>  <label id=`+index+` >`+resp[index][0]+`</label>
          <td>` +resp[index][1]+ `</td>
            <td>` +resp[index][2] + `</td>
            <td><button disabled>Eliminar</button>
            <i class="fas fa-eye"></i><input  type="checkbox" class="gg"  onchange='greenpoint(event,` + (index-1) + `)'>
            </td>
            </td>
            <td> <div class="form-check">
    <input type="radio" name="inputs" class="form-check-input exampleCheck1" onchange='puntop(`+resp[index][1]+`,`+resp[index][2]+`)'>
    
  </div></td>
        </tr>`;
        

      flashCardList.insertAdjacentHTML("beforeend", auxfields );
      aux_marker.addTo(map);
       }
      
            
        }
                    
      //console.log(mydata);

     // pintarPuntos(mydata);

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





    let l = document.getElementById('lat');
    let f = l.value.split(',')


 function cambioinput(inputvalue){
   //alert("hola");
   let name = document.getElementById('name');
   name.value = inputvalue + '|' + name.value;

   names.push(inputvalue);

    }
    function puntop(lat,lng){
      //alert(val);
      let punto = document.getElementById('punto');
      punto.value=lat+'|'+lng;
    }





    /*
     let f= l.value.split(',')
    
     let lng = document.getElementById('lng');
     let f2= lng.value.split(',')
    */
  

    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
      maxZoom: 12
    }).addTo(map);
    //this is for put the markes on the map getting the data from the inputs.
    L.control.scale().addTo(map);

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



  var flashCardList  = document.getElementById('cuerpo')
   
    var tr = new Array();
    var td;
    var inputvalues=new Array();
    var x=false;
    //var lat;
    //var lng;

    

    //function to draw the markers on the map.
    function onMapClick(e) {

      fromclic=true;
    
    /*Para concatenar los valores de latlng en los inputs correspondientes*/
      aux_marker = L.marker(e.latlng);
      //aux_marker.setIcon(greenIcon);
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
    var auxfields = `<tr class=` + i + `>
        <td>  <input id=`+i+` type="text" name="array[]" onchange='cambioinput(this.value)'></td>
          <td>` + e.latlng.lat + `</td>
            <td>` + e.latlng.lng + `</td>
            <td><button style="margin-right:2%;"  onclick='delrow(` + i + `)'>Eliminar</button>
            <i class="fas fa-eye"></i><input  type="checkbox" class="gg"  onchange='greenpoint(event,` + i + `)'>
            </td>
            <td> <div class="form-check">
    <input type="radio" class="form-check-input exampleCheck1" name="inlineRadioOptions" onchange='puntop(`+e.latlng.lat+`,`+e.latlng.lng+`)'>
    
    
  </div></td>
        </tr>`;
        
      



      aux_marker.addTo(map);
      flashCardList.insertAdjacentHTML("beforeend", auxfields );
    
      i++;
    }

  
  
    
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

    function delrow(dato) {
      console.log(names);
     
      auxdato=dato;
      var c=0;
       if(x){
        dato=dato-2;
        c=dato;
      }

     

      $('.' + auxdato).remove();

  

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
        console.log(i);
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
