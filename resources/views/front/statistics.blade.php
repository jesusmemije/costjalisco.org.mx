@extends('front.layouts.app')
 
@section('title')
Estadísticas
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
@endsection


@section('content')

<style>
    .links-color{
        color: #628ea0;
        font-weight: bold;
    }
    .btn-conoce-mas{
        float: right;
        background: #d60000;
        color: #fff;
        padding: 5px 30px 5px 30px;
        border-radius: 50px;
        box-shadow: 5px 5px 2px #999;

    }
    .btn-conoce-mas:hover{
        background: rgba(218, 3, 3, 0.904);
        color: rgb(230, 230, 230);
    }
    .secciones-projects{
        padding: 25px 40px 20px 40px; 
        border-top: 1px solid #628ea0; 
        border-left: 8px solid #628ea0; 
        border-right: 1px solid #628ea0;
    }
</style>


<style>
    .links-color{
        color: #628ea0;
        font-weight: bold;
    }
    .btn-conoce-mas{
        float: right;
        background: red;
        padding: 5px 30px 5px 30px;
        border-radius: 50px;
        box-shadow: 5px 5px 2px #999;

    }
    .btn-conoce-mas:hover{
        background: rgba(218, 3, 3, 0.904);
        color: rgb(230, 230, 230);
    }
    .seccione-project{
        padding: 20px 0px 0px 0px; 
        border-top: 1px solid red; 
        border-left: 1px solid red; 
        border-right: 1px solid red;
    }
    .projets-pro{
        margin: 0px 25px 0px 25px;
        /* padding: 20px 25px 0px 25px; */
        /* width: 250px; */
        width: 100%;
        background: #d5d6be;
        border-radius: 0px 30px 0px 0px;
    }
    .encabezado-project{
        padding: 20px 20px 8px 20px;
    }
    .pie-project{
        padding: 10px 20px 0px 20px;
        background: #2C4143;
    }
    .pie-project p{
        color: #fff;
        font-size: 14px;
        padding: 0px;
        margin: 0px;
    }
    .detalle-project{
        padding: 5px;
    }
    .detalle-project a{
        /* float: right; */
        color: red;
        font-weight: bold;
        font-size: 12px;
        margin-left: 170px
    }
    .detalle-project a:hover{
        color: rgb(199, 0, 0);
    }
    .projets-pro-buscar{
        margin: 0px 0px 0px 25px;
        padding: 30px;
        background: #628ea0;
        border-radius: 30px 0px 0px 30px;

    }
    .projets-pro-buscar ul li{
        color: #fff;
        font-size: 12px;
    }
    .projets-pro-buscar button{
        margin: 20px 0px 10px 0px;
        background: #2C4143;
        color: #fff;
        border-radius: 50px;
        font-size: 13px;
        padding: 1px 20px 1px 20px;
        border: 0;
    }
    .projets-pro-buscar button:hover{
        background: #1d2a2c;
        color: rgb(204, 204, 204);
    }
</style>

<div class="container-fluid pt-4">
    <!-- Section - Estadisticas -->
    <div class="row mt-5">
        <div class="col-md-6 background-title px-0 py-1" style="background-image: url('http://pice-software.com/costjalisco/public/assets/img/newsletters/background-title.png'); background-repeat: no-repeat;
        background-size: cover;">
            <span style="font-weight: 700; margin-left: 140px;">Estadísticas</span>
        </div>
        <div class="col-md-6 px-0">
            <div class="" style="margin-top: 25px;
            border-bottom: 1px solid #628ea0;"></div>
        </div>
    </div>
    <div class="container">
        <div class="my-5 seccione-project">
            <div class="" style="border-left: 5px solid red; padding-left: 15px; " >
                <h2 class="my-4 py-0 font-weight-bold" style="padding: 0">
                <span style="font-weight: 700; margin-left: 0px; padding: 0; color: red;" ><b> Proyectos</b></span>    
                </h2><br>
            </div>
        </div>
        <div class="my-5">
          
            <div class="col-md-12">
               
                    
                    <label style="margin-left: 20%">
                        @if (empty($sector4[0]->titulo))
                            @php
                                $sec_4=0;
                            @endphp
                            <span for="" style="border: 1px solid rgb(116, 116, 116); padding: 5px 15px 5px 15px; font-size: 30px; font-weight: bold">
                                0
                            </span><br><br>
                            <span style="font-weight: bold;">Proyectos de Infraestructura</span>
                        @else
                            @php
                                $sec_4=count($sector4);
                            @endphp
                            <span style="border: 1px solid  rgb(116, 116, 116); padding: 5px 15px 5px 15px; font-size: 30px; font-weight: bold">
                                {{count($sector4)}}
                            </span><br><br>
                            <span style="font-weight: bold;">{{$sector4[0]->titulo}}</span>
                            
                        @endif
                    
                    </label>

                    <label style="position: absolute; margin-left: 28%;  z-index: 10;">
                        @if (empty($sector1[0]->titulo))
                            @php
                                $sec_1=0;
                            @endphp
                            <span style="border: 1px solid rgb(116, 116, 116); padding: 5px 15px 5px 15px; font-size: 30px; font-weight: bold">
                                0
                            </span><br><br>
                            <span style="font-weight: bold;" style="font-weight: bold">Proyectos de Edificación</span>
                        @else
                            @php
                                $sec_1=count($sector1);
                            @endphp
                            <span style="border: 1px solid  rgb(116, 116, 116); padding: 5px 15px 5px 15px; font-size: 30px; font-weight: bold">
                                {{count($sector1)}}
                            </span><br><br>
                            <span style="font-weight: bold;">{{$sector1[0]->titulo}}</span>
                        @endif
                    </label>
                    
                
                        <div id="piechart" style="width: 500px; height: 300px; margin-left: 35%;"></div>
                
                    <label style="margin-left: 20%">
                        @if (empty($sector3[0]->titulo))
                            @php
                                $sec_3=0;
                            @endphp
                            <span for="" style="border: 1px solid rgb(116, 116, 116); padding: 5px 15px 5px 15px; font-size: 30px; font-weight: bold">
                                0
                            </span><br><br>
                            <span style="font-weight: bold;">Proyectos Urbanos</span>
                        @else
                            @php
                                $sec_3=count($sector3);
                            @endphp
                            <span for="" style="border: 1px solid rgb(116, 116, 116); padding: 5px 15px 5px 15px; font-size: 30px; font-weight: bold">
                                {{count($sector3)}}
                            </span><br><br>
                            <span style="font-weight: bold;">{{$sector3[0]->titulo}}</span>
                            
                        @endif
                    
                    </label>

                    <label style="position: absolute; margin-left: 35%;  z-index: 10;">
                        @if (empty($sector2[0]->titulo))
                            @php
                                $sec_2=0;
                            @endphp
                            <span style="border: 1px solid  rgb(116, 116, 116); padding: 5px 15px 5px 15px; font-size: 30px; font-weight: bold">
                                0
                            </span><br><br>
                            <span style="font-weight: bold;" style="font-weight: bold">Proyectos Restauración y Conservación</span>
                        @else
                            @php
                                $sec_2=count($sector2);
                            @endphp
                            <span style="border: 1px solid rgb(116, 116, 116); padding: 10px 20px 10px 20px; font-size: 35px; font-weight: bold">
                                {{count($sector2)}}
                            </span><br><br>
                            <span style="font-weight: bold;">{{$sector2[0]->titulo}}</span>
                        @endif
                    </label>
               
                
            </div>
            
        </div>
        <div class="col-md-12" style="margin-bottom: 100px"></div>
        <div class="my-1 seccione-project">
            <div class="" style="border-left: 5px solid red; padding-left: 15px; " >
                <h2 class="my-4 py-0 font-weight-bold" style="padding: 0">
                <span style="font-weight: 700; margin-left: 0px; padding: 0; color: red;" ><b> Proyectos de la iniciativa</b></span>    
                </h2><br>
            </div>
        </div>
        <div class="col-md-12">
            <center>
                <input type="text" value="{{$total_proyectos}}" class="circle">
            </center>
            <a href="{{route('card-projects')}}" style="float: right; position: relative; bottom: 100px" class="btn-conoce-mas">Conoce más</a>
            
        </div>
        <div class="col-md-12" style="margin-bottom: 100px"></div>
        <div class="my-1 seccione-project">
            <div class="" style="border-left: 5px solid red; padding-left: 15px; " >
                <h2 class="my-4 py-0 font-weight-bold" style="padding: 0">
                <span style="font-weight: 700; margin-left: 0px; padding: 0; color: red;" ><b> Presupuesto utilizado</b></span>    
                </h2><br>
            </div>
        </div>
        <div style="margin-left: 20px; position: relative; bottom: 20px">
            <div class="col-md-9 background-title px-0 py-1" style="background-image: url('http://pice-software.com/costjalisco/public/assets/img/estadisticas/presupuesto-imagen.png'); background-repeat: no-repeat;
        background-size: cover;">
            <span style="font-weight: 700; margin-left: 55%;">$ {{number_format($total_contrato,2)}}</span>
        </div>
    </div>
    <div class="col-md-12" style="margin-bottom: 100px"></div>
</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js"></script>
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
        //   title: 'My Daily Activities',
            chartArea: {'width': '100%', 'height': '90%'},
          colors: ['#d60000', '#58707b', '#61a8bd', '#ffce32']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
@endsection
