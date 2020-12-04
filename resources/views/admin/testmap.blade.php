<?php

if(isset($datos)){
 
}else{
  $datos['lat']="";
  $datos['lng']="";
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

    <form action="{{route('tm')}}" method="POST">
    @csrf
    <textarea name="lat" id="lat" cols="30" rows="10">{{$datos['lat']}}</textarea>
    <textarea name="lng" id="lng" cols="30" rows="10">{{$datos['lng']}}</textarea>
    <input type="submit" name="send">
    </form>
  

    <script>

        let l = document.getElementById('lat');
      
       let f= l.value.split('|')
      
       let lng = document.getElementById('lng');
       let f2= lng.value.split('|')
      
   


       
       


        var map = L.map('map').
        setView([41.66, -4.72],
            14);

            

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
    </script>
</body>

</html>