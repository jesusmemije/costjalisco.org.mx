@extends('front.layouts.app')

@section('title')
Eventos
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset("assets/css/events.css")}}">
@endsection

@section('content')
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
    <div class="col-lg-5 col-md-9 subtitle-barra-gris px-0 py-1">
        <span class="text-por-mes">VER POR MES</span>
    </div>
</div>
<div class="container">
    <div class="row eventos" style="margin-bottom: 10%;">
        <div class="col-lg-3 col-md-3 col-12 part1">
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
            <button onclick="mostrar_dias('01','Enero')" class="row title" id="enero" style="margin-top:1%;">
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
        <div class="col-lg-1 col-md-4 col-sm-4" style="margin-top:1%;">
            <div id="id_dias">
                <center><small>Clic en el mes</small></center>
            </div>
        </div>
        <div style="margin-left:2%" class="col-lg-7 col-md-8" style="background-color:white">
            <div class="content1" style="margin-top: 1%;">
                <div class="col-md-12"></div>
                <h5 id="titulo">
                    Seleccione un mes y despues el día
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

    <div class="row hidden-desktop">
        <div class="col-12">
            <p><i class="fas fa-clock ml-2" style="color: #FFCE32;"></i>
                <a href="#" style="color:#2C4143">
                    <strong>Hora de Inicio:</strong> <span id="hora-phone"> </span>
                </a>
            </p>
        </div>
        <div class="col-12">
            <p><i class="fas fa-map-marker-alt ml-2" style="color: #FFCE32;"></i>
                <a href="#" style="color:#2C4143">
                    <strong>Ubicación:</strong> <span id="ubicacion-phone"> </span>
                </a>
            </p>
        </div>
        <div class="col-12">
            <p><i class="fas fa-users ml-2" style="color: #FFCE32;"></i>
                <a href="#" style="color:#2C4143">
                    <strong>Contacto:</strong> <span id="contacto-phone"> </span>
                </a>
            </p>
        </div>
    </div>

    <div class="row hidden-phone">
        <div class="col-md-12 px-0 py-1">
            <h6 class="py-2 font-weight-bold" style="background: linear-gradient(45deg, #638E9F 50%, #58707C 50%);">
                <table>
                    <tr>
                        <td>
                            <div class="col-md-9 col-sm-9 px-0 py-1">
                                <span class="result-item">
                                    <p><i class="fas fa-clock mr-2 fa-lg"></i> <a href="#">
                                    <strong>Hora de Inicio:</strong> <span id="hora"> </span></a></p>
                                </span>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-8 col-sm-8 px-0 py-1">
                                <span class="result-item">
                                    <p><i class="fas fa-map-marker-alt mr-2 fa-lg"></i> <a href="#">
                                    <strong>Ubicación</strong><br>
                                    <span id="ubicacion"></span>
                                </span>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-8 col-sm-8 px-0 py-1">
                                <span class="result-item">
                                    <p><i class="fas fa-users mr-1 fa-lg"></i> <a href="#">
                                    <strong>Contacto:</strong><br>
                                    <span id="contacto"></span>
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
<script>
    function mostrar_dias(mes,name)
    {
        if ($.trim(mes) != ''){
            $("#titulo").empty();
            $("#titulo").append('Seleccione un mes y despues el día');
            $("#descripcion").empty();

            $("#hora").empty();
            $("#ubicacion").empty();
            $("#contacto").empty();

            $("#hora-phone").empty();
            $("#ubicacion-phone").empty();
            $("#contacto-phone").empty();

            $('#id_dias').empty();
            $('#id_dias').html('<img src="{{asset('assets/img/project/carga.gif')}}" alt="loading" width="30" style="margin-left: 30px; margin-top:15px;" />');
            $.get('mostrar_dias',{mes:mes}, function (dias) {
                $('#id_dias').fadeIn(900).html('');
                $('#id_dias').empty();
                $.each(dias, function (index, value){
                    $('#id_dias').append("<button onclick='mostrar_contenido("+index+")' style=' border: 5px solid #61a8bd; background: transparent; border-top: 3px solid #0000; border-bottom: 3px solid #0000; border-left: 3px solid #0000;'><h1>"+value+"</h1><small>"+name+"</small></button>")
                })
            })
        }
    }

    function mostrar_contenido(id_event)
    { 
        if ($.trim(id_event) != ''){
            
            $("#titulo").empty();
            $("#descripcion").empty();

            $("#hora").empty();
            $("#ubicacion").empty();
            $("#contacto").empty();

            $("#hora-phone").empty();
            $("#ubicacion-phone").empty();
            $("#contacto-phone").empty();
            
            $('#titulo').html('<img src="{{asset('assets/img/project/carga.gif')}}" alt="loading" width="30" style="margin-left: 30px; margin-top:15px;" />');
            $.ajax({
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id_event": id_event
                    },
                    url: "{{ url('mostrar_contenido') }}",
                    type: 'post',
                    dataType: "json",
                    success: function(resp) {

                    $('#titulo').fadeIn(900).html('');
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

                    if (hora_d>=h) {
                        $("#hora-phone").empty();
                        $("#hora-phone").append(hora +' PM');
                    } else {
                        $("#hora-phone").empty();
                        $("#hora-phone").append(hora +' AM');
                    }

                    $("#titulo").empty();
                    $("#descripcion").empty();
                        
                    $("#ubicacion").empty();
                    $("#contacto").empty();

                    $("#ubicacion-phone").empty();
                    $("#contacto-phone").empty();

                    $("#titulo").append(resp[0].title);
                    $("#descripcion").append("<p style='text-align: justify;'>"+resp[0].description+"</p>");
                        
                    $("#ubicacion").append(resp[0].location);
                    $("#contacto").append(resp[0].contact);

                    $("#ubicacion-phone").append(resp[0].location);
                    $("#contacto-phone").append(resp[0].contact);

                },
                error: function(response) {
                    console.log(response);
                }
            });
        }
    }
</script>
@endsection