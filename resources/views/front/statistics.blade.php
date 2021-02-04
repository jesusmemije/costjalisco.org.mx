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
        
        <!-- proyectos---->
        <div class="my-md-5 my-3 seccion-project">
            <div class="" style="border-left: 5px solid red; padding-left: 15px; ">
                <h2 class="my-4 py-0 font-weight-bold" style="padding: 0" id="project">
                    <span class="title-section"><b> Proyectos</b></span>
                </h2><br>
            </div>
        </div>
        <div class="my-md-5">
            <div class="col-md-12">
                {{-- Muestra la cantidad de proyectos que hay en cada sector y hacemos el cálculo del porcentaje, se repite en los 4 sectores --}}
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
                            $porcentajein=(count($sector4)*100) / ( count($sector1) + count($sector2) + count($sector3) + count($sector4));
                        
                            $sec_4=count($sector4);
                        @endphp
                        <span class="cuadro">
                            {{count($sector4)}}
                        </span><br><br class="hidden-phone">
                        <span class="cuadros-title">{{$sector4[0]->titulo}} <br><span style="font-size: 30px"> {{number_format($porcentajein,1)}}%</span></span>
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
                            $porcentajeed=(count($sector1)*100) / ( count($sector1) + count($sector2) + count($sector3) + count($sector4));

                            $sec_1=count($sector1);
                        @endphp
                        <span class="cuadro">
                            {{count($sector1)}}
                        </span><br><br class="hidden-phone">
                        <span class="cuadros-title">{{$sector1[0]->titulo}} <br><span style="font-size: 30px"> {{number_format($porcentajeed,1)}}%</span></span>
                    @endif
                </label>

                <br class="hidden-desktop"><br class="hidden-desktop">

                {{-- muestra el gráfico sobre proyectos --}}
                <div id="donutchartproyectos" style="width:95%; height: 350px;" ></div>
                    
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
                            $porcentajeur=(count($sector3)*100) / ( count($sector1) + count($sector2) + count($sector3) + count($sector4));

                            $sec_3 = count($sector3);
                        @endphp
                        <span class="cuadro">
                            {{count($sector3)}}
                        </span><br><br class="hidden-phone">
                        <span class="cuadros-title">{{$sector3[0]->titulo}} <br><span style="font-size: 30px"> {{number_format($porcentajeur,1)}}%</span></span>
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
                            $porcentajerc=(count($sector2)*100) / ( count($sector1) + count($sector2) + count($sector3) + count($sector4));
                        
                            $sec_2=count($sector2);
                        @endphp
                        <span class="cuadro">
                            {{count($sector2)}}
                        </span><br><br class="hidden-phone">
                        <span class="cuadros-title">{{$sector2[0]->titulo}} <br><span style="font-size: 30px">{{number_format($porcentajerc,1)}}%</span></span>
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
        <div class="my-md-5">
            <div class="col-md-12">
                <br class="hidden-desktop"><br class="hidden-desktop">
                <div id="donutchartadjudicacion" style="width:95%; height: 350px;"></div>
                <br class="hidden-desktop">
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
        <div class="my-md-5">
            <div class="col-md-12">

                <br class="hidden-desktop"><br class="hidden-desktop">
                <div id="donutchartprocedimiento" style="width:95%; height: 350px;" ></div>
                <br class="hidden-desktop">

            </div>
        </div>
        <div class="col-md-12" style="margin-bottom: 100px"></div>
        <!--Personas beneficiadas-->
        <div class="my-1 seccion-project" id="presupuesto">
            <div class="" style="border-left: 5px solid red; padding-left: 15px; ">
                <h2 class="my-4 py-0 font-weight-bold" style="padding: 0">
                    <span class="title-section"><b> Personas beneficiadas</b></span>
                </h2><br>
            </div>
        </div>
        <div class="col-md-12">
            <center>
               
                @if (count($personas_beneficias)==0)
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
                        @foreach ($personas_beneficias as $personas_b)
                            @php
                                $imagen=DB::table('orglogos')
                                    ->select('orglogos.imgroute')
                                    ->where('orglogos.id_organization','=',$personas_b->id_organization)
                                    ->get();

                            @endphp
                            
                            <div class="col-md-3 mb-3">
                                @if (count($imagen)==0)
                                    <img src="{{ asset('orglogos/no-imagen.jpg')}}" width="70"  alt="">
                                @else
                                    <img src="{{ asset('orglogos/'.$imagen->last()->imgroute) }}" width="90" height="90" alt="">
                                @endif
                                <hr id="hr-statistic" >
                                <div id="name-organization" ><b>{{$personas_b->name}}</b></div>
                                
                                <div class="col-md-12 mb-3" id="resultado-estatics">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img id="imagen-subtitulo" src="{{ asset('assets/img/estadisticas/usuario.png')}}" width="33"  alt="" >
                                        </div>
                                        <div class="col-md-10" id="subtitulo">
                                            <span >Personas beneficiadas: </span><br>
                                            <b> {{number_format($personas_b->total_people)}}</b>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            
                            </div>
                            
                                
                        @endforeach
                    </div>
                @endif
                <br>
                <div id="donutchartpresonasbeneficiadas" style="width:95%; height: 350px;" ></div>
            </center>
        </div>
        <div class="col-md-12" style="margin-bottom: 100px"></div>
        <!--Proyectos de la iniciativa-->
        <div class="my-1 seccion-project" id="iniciativa">
            <div class="" style="border-left: 5px solid red; padding-left: 15px; ">
                <h2 class="my-4 py-0 font-weight-bold" style="padding: 0">
                    <span class="title-section"><b> Proyectos en la iniciativa</b></span>
                </h2><br>
            </div>
        </div>
        <div class="col-md-12">
            <center>
                
                @if (count($proyectos)==0)
                    
                    <div class="row">
                        <div class="col-md-12">
                            <center>Ningún resultado</center>
                        </div>
                    </div>
                @else
                    <div class="row">
                        @foreach ($proyectos as $pro)
                            @php
                                // consultamos la imagen de la organiacion
                                $imagen=DB::table('orglogos')
                                    ->select('orglogos.imgroute')
                                    ->where('orglogos.id_organization','=',$pro->id_organization)
                                    ->get();

                            @endphp
                            
                            <div class="col-md-3">
                                {{-- muetra la imagen de cada organización correspondiente --}}
                                @if (count($imagen)==0)
                                    <img src="{{ asset('orglogos/no-imagen.jpg')}}" width="70"  alt="">
                                @else
                                    <img src="{{ asset('orglogos/'.$imagen->last()->imgroute) }}" width="90" height="90" alt="">
                                @endif
                                <hr id="hr-statistic" >
                                <div id="name-organization" ><b>{{$pro->name}}</b></div>
                                
                                <div class="col-md-12 mb-4" id="resultado-estatics">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img id="imagen-subtitulo" style="background:#2c4143; padding:7px 6px 7px 6px;" src="{{ asset('assets/img/project/institucion.png') }}" width="37"  alt="" >
                                        </div>
                                        <div class="col-md-10" id="subtitulo">
                                            <span >Proyectos </span><br>
                                            <b> {{number_format($pro->total_proyectos)}}</b>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                        @endforeach
                    </div>
                @endif
                    <br>
                    <div id="donutchartproyectosiniciativa" style="width:95%; height: 350px;" ></div>
                    
            </center>
            <a href="{{route('card-projects')}}" class="btn-conoce-mas">Conoce más</a>
        </div>
        <div class="col-md-12" style="margin-bottom: 100px"></div>
        {{-- Presupuesto ejercido --}}
        <div class="my-1 seccion-project" id="presupuesto">
            <div class="" style="border-left: 5px solid red; padding-left: 15px; ">
                <h2 class="my-4 py-0 font-weight-bold" style="padding: 0">
                    <span class="title-section"><b> Presupuesto asignado</b></span>
                </h2><br>
            </div>
        </div>
        <div style="margin-left: 20px; position: relative; bottom: 20px">
            <div class="col-md-9 background-title bg-background-total px-0 py-1">
                <span class="total-presupuesto">$ {{number_format($total_presupuesto_ejercido,2)}}</span>
            </div>
        </div>
        <div class="col-md-12" style="margin-left: 2%">
            <center>
                {{-- Recorremos todas las organizaciones --}}
                @if (count($organizaciones_presupuesto)==0)
                    
                    <div class="row">
                        <div class="col-md-12">
                            <center>Ningún resultado</center>
                        </div>
                    </div>
                @else
                    <div class="row" >
                        
                        @foreach ($organizaciones_presupuesto as $organizaciones_p)
                            {{-- Consultamos la imagen de la organicación y solo mostramos la ultima imagen --}}
                            @php
                                $imagen=DB::table('orglogos')
                                    ->select('orglogos.imgroute')
                                    ->where('orglogos.id_organization','=',$organizaciones_p->id)
                                    ->get();
                            @endphp
                            
                            <div class="col-md-3">
                                @if (count($imagen)==0)
                                    <img src="{{ asset('orglogos/no-imagen.jpg')}}" width="70"  alt="">
                                @else
                                    <img src="{{ asset('orglogos/'.$imagen->last()->imgroute) }}" width="90" height="90" alt="">
                                @endif
                                <hr id="hr-statistic" >
                                <div id="name-organization" ><b>{{$organizaciones_p->name}}</b></div>
                                
                                    @php
                                        $total_presupuesto_contrato=0; 
                                        $total_presupuesto_contrato_costofin=0; 
                                        $total_presupuesto_costofin=0; 
                                        $suma_total_presupuesto=0;
                                    @endphp

                                    @if (count($monto_contrato_or)==0)
                                        Sin monto de contrato
                                    @else
                                       {{-- Aqui calculamos el monto del contrato  de todo los proyectos en la cada organización correspondiente --}}
                                       @foreach ($monto_contrato_or as $monto_c)
                                            @if ($organizaciones_p->id==$monto_c->id_organization)
                                                @php
                                                    $total_presupuesto_contrato+=$monto_c->monto_total; 
                                                @endphp     
                                            @else
                                            @endif
                                        @endforeach
                                    @endif

                                    {{-- Aqui se calcula el monto contrato con el campo obligatorio costofinalizacion  --}}
                                    @if (count($costofinalizacion_contrato)==0)
                                        Sin contrato costo fin
                                    @else
                                        @foreach ($costofinalizacion_contrato as $costofinalizacion_con)
                                            @if ($organizaciones_p->id==$costofinalizacion_con->id_organization)
                                                 @php
                                                    $total_presupuesto_contrato_costofin+=$costofinalizacion_con->contrato_total_costofin; 
                                                @endphp
                                            @else
                                            @endif
                                        @endforeach
                                    @endif
                                    {{-- Aqui se calcula el monto del campo costofinalizacion --}}
                                    @if (count($costofinalizacion_or)==0)
                                        Sin costo finalización
                                    @else
                                        @foreach ($costofinalizacion_or as $costofinalizacion_o)

                                            @if ($organizaciones_p->id==$costofinalizacion_o->id_organization)
                                                @php
                                                    $total_presupuesto_costofin+=$costofinalizacion_o->total_costofin; 
                                                @endphp
                                            @else
                                            @endif
                                        @endforeach
                                    @endif
                                           
                                    @php
                                        // Hacemos el cálculo para mostrar el total de cada organización 
                                        $suma_total_presupuesto=($total_presupuesto_contrato-$total_presupuesto_contrato_costofin)+$total_presupuesto_costofin;
                                    @endphp
                                    <div class="col-md-12 mb-4" id="resultado-estatics">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img id="imagen-subtitulo" src="{{ asset('assets/img/estadisticas/din.png')}}" width="33"  alt="" >
                                            </div>
                                            <div class="col-md-10" id="subtitulo">
                                                <span >Monto </span><br>
                                                <b> $ {{number_format($suma_total_presupuesto,2)}}</b>
                                            </div>
                                        </div>
                                    </div>  
                                    {{-- <label for="">Monto <b>$ {{number_format($suma_total_presupuesto,2)}}</b></label> --}}

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
{{-- pasamos los datos del gráfico de proyectos --}}
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Titulo', 'porcentaje'],
        ['Proyectos de Edificación', {{$sec_1}}],
        ['Proyectos Restauración y Conservación', {{$sec_2}}],
        ['Proyectos Urbanos', {{$sec_3}}],
        ['Proyectos de Infraestructura', {{$sec_4}}]
        
      ]);

      var options = {
        chartArea: {'width': '100%', 'height': '100%'},
        colors: ['#d60000', '#58707b', '#61a8bd', '#ffce32'],
        pieHole: 0.4,
        fontSize: 22,
        legend: 'none',
        pieSliceTextStyle: {
            color: 'black',
            bold:true,
          },
      };

      var chart = new google.visualization.PieChart(document.getElementById('donutchartproyectos'));
      chart.draw(data, options);
    }
</script>
{{-- pasamos los datos del gráfico de modalidad de la adjudicación --}}
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Modalidad', 'Total proyectos'],
            @if (count($modalidad_adjudicacion)==0)
            ['Sin proyectos', 0],
            @else
                @foreach ($modalidad_adjudicacion as $modalidad_ad)
                    @if($modalidad_ad->total_project==1)
                        ['{{$modalidad_ad->total_project}} proyecto {{$modalidad_ad->mod_adjudicacion}}  ', {{$modalidad_ad->total_project}}],
                    @else
                        ['{{$modalidad_ad->total_project}} proyectos {{$modalidad_ad->mod_adjudicacion}}  ', {{$modalidad_ad->total_project}}],
                    @endif
                @endforeach
            @endif
      ]);

      var options = {
        chartArea: {'width': '100%', 'height': '100%'},
        colors: ['#d60000', '#58707b', '#61a8bd', '#ffce32','#a8a8a8','#638e7f'],
        fontSize: 22,
        legend: { textStyle: { fontSize: 20}},
        pieHole: 0.4,
        pieSliceTextStyle: {
                color: 'black',
                bold:true,
            },
      };

      var chart = new google.visualization.PieChart(document.getElementById('donutchartadjudicacion'));
      chart.draw(data, options);
    }
</script>
{{-- pasamos los datos del gráfico de modalidad de la adjudicación --}}
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Porcedimiento por etapa', 'Total proyectos'],
            @if (count($procedimiento_etapas)==0)
            ['Sin proyectos', 0],
            @else
                @foreach ($procedimiento_etapas as $procedimiento_e)
                    @if($procedimiento_e->estatus==1)
                        ['Identificación: {{$procedimiento_e->total_status_project}} proyectos', {{$procedimiento_e->total_status_project}}],
                    @elseif($procedimiento_e->estatus==2)
                        ['Preparación: {{$procedimiento_e->total_status_project}} proyectos', {{$procedimiento_e->total_status_project}}],
                    @elseif($procedimiento_e->estatus==3)
                        ['Contratración: {{$procedimiento_e->total_status_project}} proyectos', {{$procedimiento_e->total_status_project}}],
                    @elseif($procedimiento_e->estatus==4)
                        ['Ejecución: {{$procedimiento_e->total_status_project}} proyectos', {{$procedimiento_e->total_status_project}}],
                    @elseif($procedimiento_e->estatus==5)
                        ['Finalizado: {{$procedimiento_e->total_status_project}} proyectos', {{$procedimiento_e->total_status_project}}],
                    @elseif($procedimiento_e->estatus==7)
                        ['Finalizado: {{$procedimiento_e->total_status_project}} proyectos', {{$procedimiento_e->total_status_project}}],
                    @endif
                @endforeach
            @endif
      ]);

      var options = {
        chartArea: {'width': '100%', 'height': '100%'},
        colors: ['#d60000', '#58707b', '#61a8bd', '#ffce32','#a8a8a8','#638e7f'],
        fontSize: 22,
        legend: { textStyle: { fontSize: 20}},
        pieHole: 0.4,
        pieSliceTextStyle: {
                color: 'black',
                bold:true,
            },
      };

      var chart = new google.visualization.PieChart(document.getElementById('donutchartprocedimiento'));
      chart.draw(data, options);
    }
</script>
{{-- pasamos los datos del gráfico de personas beneficiadas --}}
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Personas', 'Total'],
        @foreach ($personas_beneficias as $personas_b)
        ['{{$personas_b->name}}',     {{$personas_b->total_people}}],     
        @endforeach
      ]);

      var options = {
        chartArea: {'width': '100%', 'height': '100%'},
        colors: ['#d60000', '#58707b', '#61a8bd', '#ffce32','#a8a8a8','#638e7f'],
        fontSize: 22,
        legend: { textStyle: { fontSize: 20}},
        pieHole: 0.4,
        pieSliceTextStyle: {
                color: 'black',
                bold:true,
            },
      };

      var chart = new google.visualization.PieChart(document.getElementById('donutchartpresonasbeneficiadas'));
      chart.draw(data, options);
    }
</script>
{{-- Pasamos los datos del gráfico de proyectos de la iniciativa --}}
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
        chartArea: {'width': '100%', 'height': '100%'},
        colors: ['#d60000', '#58707b', '#61a8bd', '#ffce32','#a8a8a8','#638e7f'],
        pieHole: 0.5,
        fontSize: 22,
        legend: 'none',
        pieSliceTextStyle: {
            color: 'black',
            bold:true,
          },
      };

      var chart = new google.visualization.PieChart(document.getElementById('donutchartproyectosiniciativa'));
      chart.draw(data, options);
    }
</script>
@endsection