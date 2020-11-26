@extends('front.layouts.app')

@section('title')
Proyecto
@endsection
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHzvoUaKDOaWGOu0ZNUpB_SJigsBgOOzI&callback=initMap&libraries=places&v=weekly&language=mx&region=MX" defer></script>

@section('content')


<style>
#imgproject{
border: 1px solid black;
height: 360px;
background-image: url("http://localhost/costjalisco/public/assets/img/slider/matute.jpg");
}



#titleproject{
  
    width: 100%;
    height: auto;
  
    
    display: inline-block;
    background-color: #628ea0;
    padding: 20px;
    color: #fff;
    word-break: break-all;
}
#titleproject label{
    font-size: 30px;
    text-align: left;
}
#benefited{
    width: 100%;
    height: auto;
    font-size: calc(1em + 1vw);

    display: inline-block;
    background-color:#d8d8cd;
    padding: 10px;
    word-break: break-all;
}

#status{
    background-color: #d60000;
    height: auto;
    color:#fff;
}

.media{
    background-color:#d8d8cd;
    height: auto;
}
#content{
    border: 1px solid blue;

}
#btns{
    margin-top:5%;
    font-size: 15px;
    border-radius: 8px;
}
#date{
    border-bottom: 3px solid red;
    padding-left:20px;
}
#map{
    width: 100%;
    height: 500px;
}
#data{
    text-align: justify;
    margin-top: 3%;
    margin-bottom: 3%;
}   


</style>
<div class="row">


<div class="container">


<div class="media row">
    <div id="imgproject" class="col-md-4">
    
    </div>
  
  <div class="media-body">
      <div id="titleproject" class="col-md-12">
      <label>REVESTIMIENTO Y SANEAMIENTO DEL CANAL DE AGUAS PLUVIALES 
          
</label>
    
      </div>
      <div id="benefited" class="col-md-12">
          <div>
          <i class="fa fa-users" style="color:#628ea0; font-size:60px"></i>
          <label style="color:#628ea0; font-size: 30px; margin-left:4%" for="">246,333333 ciudadanos beneficiados</label>
          </div>
          
        
      <div  id="btns">
        
        <button class="btn btn-dark btn-sm">Datos Generales</button>
      <button class="btn btn-dark btn-sm">Identifiación</button>
      <button class="btn btn-dark btn-sm">Preparación</button>
      <button class="btn btn-dark btn-sm">Procedimiento de contratación</button>
      <button class="btn btn-dark btn-sm">Ejecución</button>
      <button class="btn btn-dark btn-sm">Finalización</button>
      </div>
      </div>


      <div class="container" id="status">
        
      <div class="form-row" >
         <div class="form-group col-md-4">
            <h4>Estatus:</h4> 
         </div> 
      <div class="form-group col-md-8 d-flex justify-content-end">
           
           <h4>100% completado</h4>
           </div>
          
      </div>
      </div>
      <div id="date">
            <h5 >Inagurado: 03/oct/2020</h5>
           </div>
    
          
           
           
           
     
      
      </div>
     
     </div>
  </div>
 
 
  <div class="container" id="map" style="width: 100%;"></div>

  <div class="container">
      
    <div class="col-md-12" style="margin-top:3%">
    <h2>Datos Generales</h2>

    <div id="data">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis qui modi, odit exercitationem ad vero accusantium ullam in corporis quasi, perferendis dolores ut sint voluptas culpa voluptatem atque aliquid sed.
    </div>

    </div>
    
    <div class="col-md-12">
    <h2>Identificación</h2>

    <div id="data">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis qui modi, odit exercitationem ad vero accusantium ullam in corporis quasi, perferendis dolores ut sint voluptas culpa voluptatem atque aliquid sed.
    </div>

    </div>
    
     

    </div>

  </div>
    
</div>




  

<script>
    let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8,
  });
}
</script>


@endsection