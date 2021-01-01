@extends('front.layouts.app')
@section('title')
Eventos
@endsection

@section('content')

<style>
    body {
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: left;
        background-color: #fff;
    }

 

    .c2 {
        color: #d60000;
        font-weight: bold;
    }



    .my2 {
        border-top: 1px solid #d60000;
        border-left: 1px solid #d60000;
        border-right: 1px solid #d60000;
        margin-top: 4%;
        height: 100px;
    }

  

    .tlt {
        padding-left: 3.7%;
        padding-top: 3%;
    }

    .f {
        margin-left: 3%;
        margin-right: -1.5%;
    }

    .my2 {
        border-top: 1px solid #d60000;
        border-left: 1px solid #d60000;
        border-right: 1px solid #d60000;
        margin-top: 4%;
        height: 100px;
    }

  

    .color1 {
        border-left: 5px solid #2c4143;
        margin-top: 4%;
    }

    .color2 {
        border-left: 5px solid #d60000;
        margin-top: 4%;
    }
    .eventos{
      
        height: 190px;
    }
    .title{
     
     background-color: #61a8bd;
     width: 276px;
     border: 0;

    }
    .title h6{
        color:white;
        font-weight: 600;
        height: 35px;
       padding:10px;
       padding-left:10%;

    }
    .part1{
        background-color:  #white;
    }
    .content1 h5{
        color:#2c4143;
        font-weight: 600;
        text-align: justify;
    }
    .iframe{
        width: 100%;
        height: 100%;
    }

article {
    column-count: 3;
}

td {
    font-size: 15px;
    line-height: 20px;
    padding: 0 20px;
    text-align: justify;
    vertical-align: top;
    width: 50%;
}
td.first {
    border-right: 5px solid #4BB495  ;
}


</style>

<div class="container">
    <div class="row my2" style="margin-bottom: 5%;">
        <div class="color2"></div>
        <div class="tlt">
            <div style="margin-left:-3%">
                <h1 class="c2">Eventos/Agendas</h1>
            </div>
        </div>
    </div>
</div>
<div class="row mx-0 my-5">
    <div class="col-md-5 px-0 mb-3">
        <div class=" text-center text-white">
            <h1 class="py-1 font-weight-bold subtitle-barra-gris">VER POR MES</h1>
        </div>
    </div>
</div>
<div class="container" >
    <div class="row eventos" style="margin-bottom: 10%;">
        <div class="col-md-3 col-12 part1">
            @php
                $cont1=0;    
                $cont2=0;    
                $cont3=0;    
                $cont4=0;    
                $cont5=0;    
                $cont6=0;    
                $cont7=0;    
                $cont8=0;    
                $cont9=0;    
                $cont10=0;    
                $cont11=0;    
                $cont12=0;    
            @endphp
            @foreach ($eventos as $evento)
                @php
                    $newDate = date("M", strtotime($evento->date_start));
                @endphp

                @if ($newDate=='Jan')
                    @php
                        $cont1+=1;
                    @endphp
                @elseif($newDate=='Feb')
                    @php
                        $cont2+=1;    
                    @endphp
                @elseif($newDate=='Mar')
                    @php
                        $cont3+=1;    
                    @endphp
                @elseif($newDate=='Apr')
                    @php
                        $cont4+=1;    
                    @endphp
                @elseif($newDate=='May')
                    @php
                        $cont5+=1;    
                    @endphp
                @elseif($newDate=='Jun')
                    @php
                        $cont6+=1;    
                    @endphp
                @elseif($newDate=='Jul')
                    @php
                        $cont7+=1;    
                    @endphp
                @elseif($newDate=='Aug')
                    @php
                        $cont8+=1;    
                    @endphp
                @elseif($newDate=='Sep')
                    @php
                        $cont9+=1;    
                    @endphp
                @elseif($newDate=='Oct')
                    @php
                        $cont10+=1;    
                    @endphp
                @elseif($newDate=='Nov')
                    @php
                        $cont11+=1;    
                    @endphp
                @elseif($newDate=='Dec')
                    @php
                        $cont12+=1;    
                    @endphp
                    
                @endif


            @endforeach
                @if ($cont1>=1)
                    <button onclick="mostrar_dias('01','Enero')" class="row title" style="margin-top:1%;">
                        <h6>Enero {{$cont1}} eventos</h6> 
                    </button>
                    
                @else
                
                @endif
                @if ($cont2>=1)
                    <button onclick="mostrar_dias('02','Febrero')" class="row title" style="margin-top:1%;">
                        <h6>Febrero {{$cont2}} eventos</h6> 
                    </button>
                        
                @else
                    
                @endif
                @if ($cont3>=1)
                    <button onclick="mostrar_dias('03','Marzo')" class="row title" style="margin-top:1%;">
                        <h6>Marzo {{$cont3}} eventos</h6> 
                    </button>
                @else
                    
                @endif
                @if ($cont4>=1)
                    <button onclick="mostrar_dias('04','Abril')" class="row title" style="margin-top:1%;">
                        <h6>Abril {{$cont4}} eventos</h6> 
                    </button>
                @else
                    
                @endif
                @if ($cont5>=1)
                    <button onclick="mostrar_dias('05','Mayo')" class="row title" style="margin-top:1%;">
                        <h6>Mayo {{$cont5}} eventos</h6> 
                    </button>
                @else
                    
                @endif
                @if ($cont6>=1)
                    <button onclick="mostrar_dias('06','Junio')" class="row title" style="margin-top:1%;">
                        <h6>Junio {{$cont6}} eventos</h6> 
                    </button>
                @else
                    
                @endif
                @if ($cont7>=1)
                    <button onclick="mostrar_dias('07','Julio')" class="row title" style="margin-top:1%;">
                        <h6>Julio {{$cont7}} eventos</h6> 
                    </button>
                @else
                    
                @endif
                @if ($cont8>=1)
                    <button onclick="mostrar_dias('08','Agosto')" class="row title" style="margin-top:1%;">
                        <h6>Agosto {{$cont8}} eventos</h6> 
                    </button>
                @else
                    
                @endif
                @if ($cont9>=1)
                    <button onclick="mostrar_dias('09','Septiembre')" class="row title" style="margin-top:1%;">
                        <h6>Septiembre {{$cont9}} eventos</h6> 
                    </button>
                @else
                    
                @endif
                @if ($cont10>=1)
                    <button onclick="mostrar_dias('10','Octubre')" class="row title" style="margin-top:1%;">
                        <h6>Octubre {{$cont10}} eventos</h6> 
                    </button>
                @else
                    
                @endif
                @if ($cont11>=1)
                    <button onclick="mostrar_dias('11','Noviembre')" class="row title" style="margin-top:1%;">
                        <h6>Noviembre {{$cont11}} eventos</h6> 
                    </button>
                @else
                    
                @endif
                @if ($cont12>=1)
                    <button onclick="mostrar_dias('12','Diciembre')" class="row title" style="margin-top:1%;">
                        <h6>Diciembre {{$cont12}} eventos</h6> 
                    </button>
                @else
                    
                @endif
        </div>
        <div class="col-md-1.9" style="margin-top:1%;">
            <div style="margin-left:20%" id="id_dias">
                <center><small>Clic en el mes</small></center>    
            </div>
        </div>
        <div style="margin-left:2%" class="col-md-7" style="background-color:white">
            <div  class="content1"  style="margin-top: 1%;">
                <div class="col-md-12" ></div>
                <h5 id="titulo"> 
                    <center>Seleccione un mes y despues el dia</center>
                
                </h5>
                <p></p>
                <h8 id="descripcion">
                    
                </h8>
                <br></br>
            </div>
        </div>
    <div>
</div>
</div>
<div class="row">
    <div class="col-md-12 px-0 py-1">
        <h6 class="py-2 font-weight-bold" style="background-image: url('http://pice-software.com/costjalisco/public/assets/img/header/menu-principal.jpg'); background-repeat: no-repeat;background-size: cover;">
            <table>
                <tr>
                    <td>
                        <div class="col-md-9 px-0 py-1">
                            <span style="font-weight: 400; margin-left: 300px; color: white;"><p><i class="fas fa-clock mr-2 fa-lg"></i> <a href="#">
                            <strong>Hora de Inicio:</strong> <span id="hora"> </span></a></p></span>  
                            
                        </div>
                    </td>
                    <td>
                        <div class="col-md-8 px-0 py-1">
                            <span style="font-weight: 400; margin-left: 350px; color: white;"><p><i class="fas fa-map-marker-alt mr-2 fa-lg"></i> <a href="#">
                            {{-- <strong>Caja Jalisco</strong><p>Manuel Acuña #2624 Col. Ladrón de
                            Guevara. Guadalajara, Jalisco</a></p> --}}
                            <strong>Ubicación</strong><br>
                            <span id="ubicacion"></span>
                            </span>
                        </div>
                    </td>
                    <td>
                        <div class="col-md-8 px-0 py-1">
                            <span style="font-weight: 400; margin-left: 550px; color: white;"><p><i class="fas fa-users mr-1 fa-lg"></i> <a href="#">
                            <strong>Contacto:</strong><br>
                            <span id="contacto"></span>
                            {{-- <p>Luis Arturo Perez Villegas
                            luis.perez@itei.org.mx
                            3630 5745 ext. 1510</a></p> --}}
                            </span>
                        </div>      
                    </td>
                </tr>
            </table>
        </h6>
    </div>
</div>
</div>
@endsection

@section('scripts')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    
<script>
    var mymap = L.map('mapid').setView([51.505, -0.09], 13);
</script>

<script>
    function mostrar_dias(mes,name)
    {

        if ($.trim(mes) != ''){
                    // $('#loading2').html('<img src="{{asset('assets/img/project/carga.gif')}}" alt="loading" width="20" style="margin-left: 45%; margin-top:15px;" />');
                    $.get('mostrar_dias',{mes:mes}, function (dias) {
                        // $('#loading2').fadeIn(700).html('');
                        $('#id_dias').empty();
                        // $('#id_dias').append("<option value=''>Seleccione subsector</option>");
                        $.each(dias, function (index, value){
                            $('#id_dias').append("<button onclick='mostrar_contenido("+index+")' style=' border: 5px solid #61a8bd; background: transparent; border-top: 3px solid #0000; border-bottom: 3px solid #0000; border-left: 3px solid #0000;'><h1>"+value+"</h1><small>"+name+"</small></button>")
                        })
                    })
                }
    }

    function mostrar_contenido(id_event)
    { 
        if ($.trim(id_event) != ''){
            $.ajax({
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id_event": id_event
                    }, //datos que se envian a traves de ajax
                    url: "{{ url('mostrar_contenido') }}", //archivo que recibe la peticion
                    type: 'post', //método de envio
                    dataType: "json",
                    success: function(resp) { //una vez que el archivo recibe el request lo procesa y lo devuelve

                    console.log(resp);
                    const foriginal = resp[0].date_start;
                    const hora = foriginal.slice(10, -3);
                    const hora_d = foriginal.slice(11, -6);
                    console.log(hora_d);
                    const h =12;
                        if (hora_d>=h) {
                            $("#hora").empty();
                            $("#hora").append(hora +' PM');
                        } else {
                            $("#hora").empty();
                            $("#hora").append(hora +' AM');
                        }
                        $("#titulo").empty();
                        $("#descripcion").empty();
                        
                        $("#ubicacion").empty();
                        $("#contacto").empty();

                        $("#titulo").append(resp[0].title);
                        $("#descripcion").append(resp[0].description);
                        
                        $("#ubicacion").append(resp[0].location);
                        $("#contacto").append(resp[0].contact);




                    },
                    error: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve

                    // alert("Ha ocurrido un error, intente de nuevo.");
                        console.log(response);
                    }
                    });
        }
    }
</script>
@endsection

