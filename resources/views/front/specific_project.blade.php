@extends('front.layouts.app')

@section('title')
Proyecto
@endsection
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHzvoUaKDOaWGOu0ZNUpB_SJigsBgOOzI&callback=initMap&libraries=places&v=weekly&language=mx&region=MX" defer></script>

@section('content')


<style>

body{
    font-family: 'Arial';
}

#imgproject{
border: 1px solid black;
height: 360px;
background-image: url("assets/img/home/slider-main/matute.jpg");
}



#titleproject{
  
    width: 100%;
    height: auto;
    text-align: justify;
    
    background-color: #628ea0;
    padding: 20px;
    color: #fff;
  
}
#titleproject span{
    font-size: 30px;
   
}
#benefited{
    width: 100%;
    height: auto;
    font-size: calc(1em + 1vw);

    display: inline-block;
    background-color:#d8d8cd;
    padding: 10px;
    margin-top: 2%;
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
    margin-top:2%;
    font-size: 15px;
    border-radius: 8px;
}
#date{
    border-bottom: 3px solid red;
    padding-left:20px;
}
#map{
  
    height: 500px;
}
#data{
    text-align: justify;
    margin-top: 3%;
    margin-bottom: 3%;
    padding-left:3%;
    
}  
#g{
    color:#000;
    padding-left:3%;
    font-size: 50px;
    color:#fff;
    background-repeat: no-repeat;
    background-image: url("assets/img/project/barra.png");
}

#docs{
   
    height: auto;
    margin-bottom: 6%;
   
    background-image: url("assets/img/project/fondo-doc.jpg");
}

#doc1{
    justify-content: center;
}




</style>



<div class="container-fluid">


<div class="media row">
    <div id="imgproject" class="col-md-4">
    
    </div>
  
  <div class="media-body">
      <div id="titleproject" class="col-md-12">
      <span>REVESTIMIENTO Y SANEAMIENTO DEL CANAL DE AGUAS PLUVIALES</span>
    
      </div>
      <div id="benefited" class="col-md-12">
          <div>
          <i class="fas fa-user-friends" style="color:#628ea0; margin-left:2%; font-size:60px"></i>
 
          <label style="color:#628ea0; font-size: 30px; margin-left:1%" for="">246,333333 ciudadanos beneficiados</label>
          </div>
          
        
      <div  id="btns">
        
        <button class="btn btn-dark btn-sm">DATOS GENERALES</button>
      <button class="btn btn-dark btn-sm">IDENTIFIACIÓN</button>
      <button class="btn btn-dark btn-sm">PREPARACIÓN</button>
      <button class="btn btn-dark btn-sm">PROCEDIMIENTO DE CONTRATACIÓN</button>
      <button class="btn btn-dark btn-sm">EJECUCIÓN</button>
      <button class="btn btn-dark btn-sm">FINALIZACIÓN</button>
      </div>
      </div>


      <div class="container-fluid" id="status">
        
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

 
  <div class="row" id="map"></div>

  <div class="row" style="margin-top: 4%; ">
      
    <div id="g" class="col-md-6">
    <h1>Datos Generales</h1>
    </div>
    <div id="g2" class="col-md-6" >
        <img src="assets/img/project/Línea.png"  alt="" style="width:100%; margin-top:3%;">

    </div>
  </div>
  <?php //this information may be a db table consult. 
    $cadena="El proyecto de infraestructura con nombre: “Revestimiento y saneamiento del canal en la Calle Arroyo entre Calle Platino y Cantera, en la Colonia Mariano Otero, municipio de Zapopan, Jalisco.”
    El objetivo es el revestimiento y saneamiento del canal de aguas pluviales que se encuentra en la Calle Arroyo entre Calle Platino y Cantera, en la Colonia Mariano Otero, municipio de Zapopan, Jalisco. El proyecto cuenta con indicador de impacto ambiental, donde el responsable del estudio es: “Ingeniería en Mecánica de Suelos y Control de Occidente S.A. de C.V., con estudio de factibilidad Técnico económica, ecológica o social, con recursos federales en el ramo 33 del Fondo de Aportaciones para la Infraestructura Social.";
?>
           

    <div id="data">
    {{$cadena}}
    </div>

   
    
    <div class="row">
    <div id="g" class="col-md-6">
    <h1>Identificación</h1>
    </div>
    <div class="col-md-6">
    <img src="assets/img/project/Línea.png" alt="" style="width:100%; margin-top:3%;">
    </div>
    </div>

    <div class="row">
   

  
    <div id="data" class="col-md-6" style="margin-top:6%;">
    
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis qui modi, odit exercitationem ad vero accusantium ullam in corporis quasi, perferendis dolores ut sint voluptas culpa voluptatem atque aliquid sed.
     
           
    </div>
    
    <div id="data" class="col-md-6"  style="border-left:1px solid #628ea0;">
   
    
        <h2 style="color:#628ea0">Responsables del proyecto</h2>
           <?php 
           $responsables=[];
           $responsables[]=['name'=>'Lic. José Rodolfo Hernández','cargo'=>'Dirección de obras Públicas e Infraestructura de Zapopan, Jalisco.','email'=>'rodolfo.berrecil@zapopan.gob.mx'];
           $responsables[]=['name'=>'Lic. Grabriel Marín Acevedo','cargo'=>'Jefe de Departamento B','email'=>''];
           $responsables[]=['name'=>'Arq. José Luis Vázquez Morán','cargo'=>'','email'=>'joseluis.vazquez@zapopan.gob.mx'];
         
           ?>
           
         
        @foreach($responsables as $responsable)
        <br>
        @if($responsable['name']!='')
        <i class="fas fa-user-friends" style="color:#628ea0; font-size:20px;"></i>
        <span style="font-weight: bold;">{{$responsable['name']}}</span></br>
        @endif
        @if($responsable['cargo']!='')
        <span style="padding-left:3%" >{{$responsable['cargo']}}</span></br>
        @endif
        @if($responsable['email']!='')
        <span style="padding-left:3%">{{$responsable['email']}}</span><br>
        @endif
        @endforeach
        <div class="row">
        <div class="col-md-10" style="border-bottom:1px solid #628ea0; ; margin-top:4%;"></div>
        </div>
       

    </div>
 

   

    
     

    </div>
    
    <div class="row" id="docs">
    <div class="col-md-4"  style="font-weight:bold;; margin-top:5%; margin-left:8%;">
    <p style="color:#fff; font-family:Arial, Helvetica, sans-serif; text-align:center">¡Descarga los documentos del proyecto!</p>
    
    <img style=" margin-left:40%;" src="assets/img/project/icon-clic.png"alt="">
    </div>


    <div class="col-md-2 offset-md-2" style="margin-top:4%;">
    <img src="assets/img/project/icon-pdf.png" style="margin-left: 20%;" alt="" height="100">
    <button style="margin-top:10%; margin-bottom:14%; border:1px solid transparent; border-radius:15px; color:#fff; background-color:#628ea0;" >ABRIR DOCUMENTO PDF</button>
    </div>


    <div class="col-md-2" style="margin-top:4%;">
    <img src="assets/img/project/icon-excel.png" style="margin-left: 20%;" alt="" height="100">
    <button style="margin-top:10%; margin-bottom:14%; border:1px solid transparent; border-radius:15px; color:#fff; background-color:#628ea0;">ABRIR DOCUMENTO PDF</button>
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