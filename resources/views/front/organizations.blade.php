
@extends('front.layouts.app')
@section('title')
Proyecto
@endsection
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>

@section('content')


<style>
    body {
    margin: 0;
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-color: #fff;
    }

    .c1{
        color:#2c4143;
        font-weight: bold;
    }
    .c2{
        color:#d60000;
        font-weight: bold;
    }
    .c3{
        color:#ffce32;
        font-weight: bold;
    }
    .c4{
        color:#61a8bd;
        font-weight: bold;
    }
    .c5{
        color:#d8d8cd;
        font-weight: bold;
    }


   .my{
       border-top:1px solid #2c4143;
       border-left:1px solid #2c4143;
       border-right:1px solid #2c4143;
       margin-top:4%;
       height: 100px;
       
   }
   .my2{
       border-top:1px solid #d60000;
       border-left:1px solid #d60000;
       border-right:1px solid #d60000;
       margin-top:4%;
       height: 100px;
   }
   .my3{
       border-top:1px solid #ffce32;
       border-left:1px solid #ffce32;
       border-right:1px solid #ffce32;
       margin-top:4%;
       height: 100px;
   }
   .my4{
       border-top:1px solid #61a8bd;
       border-left:1px solid #61a8bd;
       border-right:1px solid #61a8bd;
       margin-top:4%;
       height: 100px;
   }
   .my5{
       border-top:1px solid #d8d8cd;
       border-left:1px solid #d8d8cd;
       border-right:1px solid #d8d8cd;
       margin-top:4%;
       height: 100px;
   }
   .tlt{
  
    padding-left: 3.7%;
    padding-top: 3%;
   }
   
   .f{
      margin-left: 3%;
      margin-right:-1.5%;
   }
   .my2{
       border-top:1px solid #d60000;
       border-left:1px solid #d60000;
       border-right:1px solid #d60000;
       margin-top:4%;
       height: 100px;
   }
   .table{
       height: auto;
      
   }
   .color1{
    border-left: 5px solid #2c4143; margin-top:4%;
   }
   .color2{
    border-left: 5px solid #d60000; margin-top:4%;
   }
   .color3{
    border-left: 5px solid #ffce32; margin-top:4%;
   }
   .color4{
    border-left: 5px solid #61a8bd; margin-top:4%;
   }
   .color5{
    border-left: 5px solid #d8d8cd; margin-top:4%;
   }
   .tr1{
   
    background-image: url("assets/img/organizations/publico.png");
    color:#fff;
    font-size:1em;
   }

   .tr2{
    background-image: url("assets/img/organizations/academico.png");
    color:#fff;
    font-size:1em;
   }
   .tr3{
    background-image: url("assets/img/organizations/privado.png");
    color:#fff;
    font-size:1em;
   }
   .tr4{
    background-image: url("assets/img/organizations/civil.png");
    color:#fff;
    font-size:1em;
   }
   .tr5{
    background-image: url("assets/img/organizations/estrategico.png");
    color:#fff;
    font-size:1em;
   }
   th{
    text-align: center;
   }
   td{
    text-align: center;
   }

</style>



 
<div class="container">

  

<div class="row my">

<div class="color1"></div>
<div  class="tlt">
   <h2 class="c1">Sector Público<h2>
   </div>



</div>
   <div class="row f">

   <table class="table col-md-12 table-bordered" >
            <tr class="tr1">
                <th style="width: 35%;">
             
                <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-inst.png" height="30">
     
               
                <span >Institución</span> 
                </th>

                <th style="width: 30%;">
                <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-u.png" height="30">
                Titular</th>
                <th style="width: 40%;">
                <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-u2.png" height="30">
                Enlace</th>

            </tr>         

             <tbody>
             @foreach($publicos as $data)
                 <tr>
                    

                     <td>
                       
                         {{$data->institucion}}
                        </td>
                     <td>
                     <span style="font-weight:600">{{$data->titular}}</span>
                     <br>
                     <span style="font-style:italic; font-size:13px;">{{$data->titular_cargo}}</span>

                     </td>
                     <td>
                     <span style="font-weight:600"> {{$data->enlace}}</span>
                         <br>
                         <span style="font-style:italic; font-size:13px;">{{$data->enlace_cargo}}</span>
                     </td>
                    
                 </tr>

                 @endforeach
             </tbody>
         </table>

   </div>


   
<div class="row my2">

<div class="color2"></div>
<div  class="tlt">
   <h2  class="c2">Sector Académico<h2>
   </div>



</div>
   <div class="row f">
   
 <table class="table col-md-12 table-bordered" >
                <tr class="tr2">
                <th style="width: 35%;">
             
                <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-inst.png" height="30">
     
               
                <span >Institución</span> 
                </th>

                <th style="width: 30%;">
                <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-u.png" height="30">
                Titular</th>
                <th style="width: 40%;">
                <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-u2.png" height="30">
                Enlace</th>

            </tr>         

             <tbody>
             @foreach($academicos as $data)
                 <tr>
                    

                     <td>{{$data->institucion}}</td>
                     <td>
                     <span style="font-weight:600">{{$data->titular}}</span>
                     <br>
                     <span style="font-style:italic; font-size:13px;">{{$data->titular_cargo}}</span>

                     </td>
                     <td>
                     <span style="font-weight:600"> {{$data->enlace}}</span>
                         <br>
                         <span style="font-style:italic; font-size:13px;">{{$data->enlace_cargo}}</span>
                     </td>
                    
                 </tr>

                 @endforeach
             </tbody>
         </table>
 
   </div>

   
<div class="row my3">

<div class="color3"></div>
<div  class="tlt">
   <h2  class="c3">Sector Privado<h2>
   </div>



</div>
   <div class="row f">
 
   <table class="table col-md-12 table-bordered" >
   <tr class="tr3">
                <th style="width: 35%;">
             
                <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-inst.png" height="30">
     
               
                <span >Institución</span> 
                </th>

                <th style="width: 30%;">
                <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-u.png" height="30">
                Titular</th>
                <th style="width: 40%;">
                <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-u2.png" height="30">
                Enlace</th>

            </tr>          

             <tbody>
             @foreach($privados as $data)
                 <tr>
                    

                     <td>{{$data->institucion}}</td>
                     <td>
                     <span style="font-weight:600">{{$data->titular}}</span>
                     <br>
                     <span style="font-style:italic; font-size:13px;">{{$data->titular_cargo}}</span>

                     </td>
                     <td>
                     <span style="font-weight:600"> {{$data->enlace}}</span>
                         <br>
                         <span style="font-style:italic; font-size:13px;">{{$data->enlace_cargo}}</span>
                     </td>
                    
                 </tr>

                 @endforeach
             </tbody>
         </table>
   </div>


   
<div class="row my4">

<div class="color4"></div>
<div  class="tlt">
   <h2  class="c4">Sociedad Civil Organizada<h2>
   </div>



</div>
   <div class="row f">

   <table class="table col-md-12 table-bordered" >
   <tr class="tr4">
                <th style="width: 35%;">
             
                <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-inst.png" height="30">
     
               
                <span >Institución</span> 
                </th>

                <th style="width: 30%;">
                <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-u.png" height="30">
                Titular</th>
                <th style="width: 40%;">
                <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-u2.png" height="30">
                Enlace</th>

            </tr>      

             <tbody>
             @foreach($organizados as $data)
                 <tr>
                    

                     <td>{{$data->institucion}}</td>
                     <td>
                     <span style="font-weight:600">{{$data->titular}}</span>
                     <br>
                     <span style="font-style:italic; font-size:13px;">{{$data->titular_cargo}}</span>

                     </td>
                     <td>
                     <span style="font-weight:600"> {{$data->enlace}}</span>
                         <br>
                         <span style="font-style:italic; font-size:13px;">{{$data->enlace_cargo}}</span>
                     </td>
                    
                 </tr>

                 @endforeach
             </tbody>
         </table>
   </div>



   
<div class="row my5">

<div class="color5"></div>
<div  class="tlt">
   <h2  class="c5">Aliados Estratégicos<h2>
   </div>



</div>
   <div class="row f">
  
   <table class="table col-md-12 table-bordered" >
   <tr class="tr5">
                <th style="width: 35%;">
             
                <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-inst.png" height="30">
     
               
                <span >Institución</span> 
                </th>

                <th style="width: 30%;">
                <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-u.png" height="30">
                Titular</th>
                <th style="width: 40%;">
                <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-u2.png" height="30">
                Enlace</th>

            </tr>  
             <tbody>
             @foreach($estrategicos as $data)
                 <tr>
                    

                     <td>
                       
                         {{$data->institucion}}
                        
                        </td>
                     <td>
                     <span style="font-weight:600">{{$data->titular}}</span>
                     <br>
                     <span style="font-style:italic; font-size:13px;">{{$data->titular_cargo}}</span>

                     </td>
                     <td>
                     <span style="font-weight:600"> {{$data->enlace}}</span>
                         <br>
                         <span style="font-style:italic; font-size:13px;">{{$data->enlace_cargo}}</span>
                     </td>
                    
                 </tr>

                 @endforeach
             </tbody>
         </table>
  
   </div>
   

   

</div>







<script>


var mymap = L.map('mapid').setView([51.505, -0.09], 13);

window.smoothScroll = function(target) {
    var scrollContainer = target;
    do { //find scroll container
        scrollContainer = scrollContainer.parentNode;
        if (!scrollContainer) return;
        scrollContainer.scrollTop += 1;
    } while (scrollContainer.scrollTop == 0);
    
    var targetY = 0;
    do { //find the top of target relatively to the container
        if (target == scrollContainer) break;
        targetY += target.offsetTop;
    } while (target = target.offsetParent);
    
    scroll = function(c, a, b, i) {
        i++; if (i > 30) return;
        c.scrollTop = a + (b - a) / 30 * i;
        setTimeout(function(){ scroll(c, a, b, i); }, 20);
    }
    // start scrolling
    scroll(scrollContainer, scrollContainer.scrollTop, targetY, 0);
}




</script>


@endsection