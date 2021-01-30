@extends('front.layouts.app')

@section('title')
    Estadísticas
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset("assets/css/statistics.css")}}">
@endsection

@section('content')

<div class="container-fluid pt-4">
    <!-- Section - Estadisticas -->
    <div class="row mt-md-4 mt-0">
        <div class="col-md-6 col-12 background-title px-0 py-1">
            <span class="title-estadisticas">Estadísticas</span>
        </div>
        <div class="col-md-6 px-0 hidden-desktop-mini">
            <div class="" style="margin-top: 25px;
            border-bottom: 1px solid #628ea0;"></div>
        </div>
    </div>
    <div class="container">
        <div class="my-md-5 my-3 seccion-project">
            <div class="" style="border-left: 5px solid red; padding-left: 15px; ">
                <h2 class="my-4 py-0 font-weight-bold" style="padding: 0" id="project">
                    <span class="title-section"><b> Proyectos</b></span>
                </h2><br>
            </div>
        </div>
        <div class="my-md-5">
            <div class="col-md-12">
                <label class="cuadro-1">
                    @if (empty($sector4[0]->titulo))
                    @php
                    $sec_4=0;
                    @endphp
                    <span class="cuadro">
                        0
                    </span><br><br class="hidden-phone">
                    <span class="cuadros-title">Proyectos de Infraestructura</span>
                    @else
                    @php
                    $sec_4=count($sector4);
                    @endphp
                    <span class="cuadro">
                        {{count($sector4)}}
                    </span><br><br class="hidden-phone">
                    <span class="cuadros-title">{{$sector4[0]->titulo}}</span>
                    @endif
                </label>

                <label class="cuadro-2">
                    @if (empty($sector1[0]->titulo))
                    @php
                    $sec_1=0;
                    @endphp
                    <span class="cuadro">
                        0
                    </span><br><br class="hidden-phone">
                    <span class="cuadros-title">Proyectos de Edificación</span>
                    @else
                    @php
                    $sec_1=count($sector1);
                    @endphp
                    <span class="cuadro">
                        {{count($sector1)}}
                    </span><br><br class="hidden-phone">
                    <span class="cuadros-title">{{$sector1[0]->titulo}}</span>
                    @endif
                </label>

                <br class="hidden-desktop"><br class="hidden-desktop">
                <div id="piechart"></div>
                <br class="hidden-desktop">

                <label class="cuadro-3">
                    @if (empty($sector3[0]->titulo))
                        @php
                            $sec_3=0;
                        @endphp
                        <span class="cuadro">
                            0
                        </span><br><br>
                        <span class="cuadros-title">Proyectos Urbanos</span>
                    @else
                        @php
                            $sec_3 = count($sector3);
                        @endphp
                        <span class="cuadro">
                            {{count($sector3)}}
                        </span><br><br class="hidden-phone">
                        <span class="cuadros-title">{{$sector3[0]->titulo}}</span>
                    @endif
                </label>

                <label class="cuadro-4">
                    @if (empty($sector2[0]->titulo))
                        @php
                            $sec_2 = 0;
                        @endphp
                        <span class="cuadro">
                            0
                        </span><br><br class="hidden-phone">
                        <span class="cuadros-title">Proyectos Restauración y Conservación</span>
                    @else
                        @php
                            $sec_2=count($sector2);
                        @endphp
                        <span class="cuadro">
                            {{count($sector2)}}
                        </span><br><br class="hidden-phone">
                        <span class="cuadros-title">{{$sector2[0]->titulo}}</span>
                    @endif
                </label>
            </div>
        </div>
        <!--Modalidad de la adjudicación-->
        <div class="col-md-12" style="margin-bottom: 100px"></div>
        <div class="my-1 seccion-project" id="presupuesto">
            <div class="" style="border-left: 5px solid red; padding-left: 15px; ">
                <h2 class="my-4 py-0 font-weight-bold" style="padding: 0">
                    <span class="title-section"><b> Modalidad de la adjudicación</b></span>
                </h2><br>
            </div>
        </div>
        
        <!--Procedimiento por etapas-->
        <div class="col-md-12" style="margin-bottom: 100px"></div>
        <div class="my-1 seccion-project" id="presupuesto">
            <div class="" style="border-left: 5px solid red; padding-left: 15px; ">
                <h2 class="my-4 py-0 font-weight-bold" style="padding: 0">
                    <span class="title-section"><b> Procedimiento por etapas</b></span>
                </h2><br>
            </div>
        </div>
        <!--Personas beneficiadas-->
        <div class="col-md-12" style="margin-bottom: 100px"></div>
        <div class="my-1 seccion-project" id="presupuesto">
            <div class="" style="border-left: 5px solid red; padding-left: 15px; ">
                <h2 class="my-4 py-0 font-weight-bold" style="padding: 0">
                    <span class="title-section"><b> Personas beneficiadas</b></span>
                </h2><br>
            </div>
        </div>
        <!--Proyectos de la iniciativa-->
        <div class="col-md-12" style="margin-bottom: 100px"></div>
        <div class="my-1 seccion-project" id="iniciativa">
            <div class="" style="border-left: 5px solid red; padding-left: 15px; ">
                <h2 class="my-4 py-0 font-weight-bold" style="padding: 0">
                    <span class="title-section"><b> Proyectos de la iniciativa</b></span>
                </h2><br>
            </div>
        </div>
        <div class="col-md-12">
            <center>
                @php
                    $contador=0;
                    @endphp
                @if (count($proyectos)==0)
                    @php
                            $contador=0;
                    @endphp
                    <div class="row">
                        <div class="col-md-12">
                            <center>Ningún resultado</center>
                        </div>
                    </div>
                @else
                    <div class="row">
                        @foreach ($proyectos as $pro)
                            @php
                                $contador+=$pro->total_proyectos;

                                $imagen=DB::table('orglogos')
                                    ->select('orglogos.imgroute')
                                    ->where('orglogos.id_organization','=',$pro->id_organization)
                                    ->get();

                            @endphp
                            
                            <div class="col-md-3">
                                @if (count($imagen)==0)
                                    <img src="{{ asset('orglogos/no-imagen.jpg')}}" width="70"  alt="">
                                @else
                                    <img src="{{ asset('orglogos/'.$imagen->last()->imgroute) }}" width="90" height="90" alt="">
                                @endif
                                <br>
                                <small>{{$pro->name}}</small><br>
                                <label for="">Proyectos <b> {{number_format($pro->total_proyectos)}}</b></label>
                            
                            </div>
                            
                                
                        @endforeach
                    </div>
                @endif

                
                    
                
                <br>
                     <div id="donutchart" style="width: 450px; height: 300px;" >
                    </div>
                    {{-- <span style="position: absolute; bottom: 230px; right: 40px;">{{$contador}}</span> --}}
                {{-- <input type="text" value="{{$total_proyectos}}" class="circle"> --}}
                
            </center>
            <a href="{{route('card-projects')}}" class="btn-conoce-mas">Conoce más</a>
        </div>
        <div class="col-md-12" style="margin-bottom: 100px"></div>
        <div class="my-1 seccion-project" id="presupuesto">
            <div class="" style="border-left: 5px solid red; padding-left: 15px; ">
                <h2 class="my-4 py-0 font-weight-bold" style="padding: 0">
                    <span class="title-section"><b> Presupuesto ejercido</b></span>
                </h2><br>
            </div>
        </div>
        <div style="margin-left: 20px; position: relative; bottom: 20px">
            <div class="col-md-9 background-title bg-background-total px-0 py-1">
                @php
                    $total_contrato=0;
                    $totalfinalizacion=0;
                    $total_sumado=0;
                @endphp

                @if (count($monto_contrato)==0)
                    @php
                        $total_sumado=0;
                    @endphp
                @else
                    @foreach ($monto_contrato as $monto_c)
                            
                    @endforeach
                @endif
                

                <span class="total-presupuesto">$ {{number_format($total_sumado,2)}}</span>
            </div>
        </div>
        <div class="col-md-12" style="margin-left: 2%">
            <center>
                @php
                    $contador=0;
                @endphp
                @if (count($monto_contrato_or)==0)
                    @php
                            $contador=0;
                    @endphp
                    <div class="row">
                        <div class="col-md-12">
                            <center>Ningún resultado</center>
                        </div>
                    </div>
                @else
                    <div class="row" >
                        
                        @foreach ($monto_contrato_or as $monto_c)
                            @php
                                

                                $imagen=DB::table('orglogos')
                                    ->select('orglogos.imgroute')
                                    ->where('orglogos.id_organization','=',$monto_c->id_organization)
                                    ->get();

                            @endphp
                            
                            <div class="col-md-3">
                                @if (count($imagen)==0)
                                    <img src="{{ asset('orglogos/no-imagen.jpg')}}" width="70"  alt="">
                                @else
                                    <img src="{{ asset('orglogos/'.$imagen->last()->imgroute) }}" width="90" height="90" alt="">
                                @endif
                                <br>
                                <small>{{$pro->name}}</small><br>
                                <label for="">Monto <b>$ {{number_format($monto_c->monto_total,2)}}</b></label>
                            
                            </div>
                        @endforeach
                    </div>
                @endif
            </center>
        </div>
        
        <div class="col-md-12 hidden-phone" style="margin-bottom: 100px"></div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
    $(document).ready(function(){
        $(".circle").knob({
            "min":0,
            "max":100,
            "width":200,
            "height":200,
            "fgColor":"#ffce32",
            "readOnly":true,
            "displayInput":true,
            
        })
    })
</script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['', 'Hours per Day'],
          ['Proyectos de Edificación', {{$sec_1}}],
          ['Proyectos Restauración y Conservación', {{$sec_2}}],
          ['Proyectos Urbanos', {{$sec_3}}],
          ['Proyectos de Infraestructura', {{$sec_4}}]
        ]);

        var options = {
            //title: 'My Daily Activities',
            chartArea: {'width': '100%', 'height': '100%'},
            colors: ['#d60000', '#58707b', '#61a8bd', '#ffce32'],
            fontSize: 22,
            legend: 'none',
            pieSliceTextStyle: {
                color: 'black',
                bold:true,
            },
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        @foreach ($proyectos as $proyecto)
        ['{{$proyecto->name}}',     {{$proyecto->total_proyectos}}],     
        @endforeach
        
      ]);

      var options = {
        // title: 'My Daily Activities',
        chartArea: {'width': '100%', 'height': '100%'},
        colors: ['#ffce32','#d60000', '#58707b', '#61a8bd','#2c4143','#638e7f'],
        pieHole: 0.5,
        fontSize: 22,
        legend: 'none',
        pieSliceTextStyle: {
            color: 'black',
            bold:true,
          },
      };

      var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
      chart.draw(data, options);
    }
  </script>
@endsection