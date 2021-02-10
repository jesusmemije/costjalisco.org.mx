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
            <style>
                #chartdiv {
                width: 100%;
                height: 400px;
                }	
                #chartdiv a{
                    display: none !important;
                    
                }
                #img-1phone{
                    border: 1px solid #000; 
                    width: 48px; 
                    height: 45px; 
                    margin-left: 26%; 
                    top: 0px; 
                    position: absolute;"
                }
                .cuadro-2 {
                    position: absolute;
                    margin-left: 70%;
                    z-index: 10;
                }
                #img-2phone{
                    border: 1px solid #000; 
                    width: 48px; 
                    height: 45px; 
                    margin-left: 76%; 
                    top: 0px; 
                    position: absolute;"
                }	
                #img-3phone{
                    border: 1px solid #000; 
                    width: 48px; 
                    height: 45px; 
                    margin-left: 26%; 
                    bottom: 66px; 
                    position: absolute;" 									

                } 
                .cuadro-4 {
                    position: absolute;
                    margin-left: 70%; 
                    bottom: 10px;
                    z-index: 10;
                }
                #img-4phone{
                    border: 1px solid #000; 
                    width: 48px; 
                    height: 45px; 
                    margin-left: 76%; 
                    bottom: 66px; 
                    position: absolute;"
                }
                
                /* Modalidad de la adjudicación */
                #circulo-list{
                    height: 32px; 
                    width: 32px; 
                    border-radius: 40px; 
                    margin: 8px;
                    position: absolute;
                }
                

                @media only screen and (max-width: 480px) {

                    .seccion-project {
                        padding: unset;
                    }

                    .title-estadisticas {
                        font-size: 24px;
                        margin-left: 50px;
                    }

                    .cuadro-1 {
                        margin-left: 0;
                    }

                    #img-1phone{
                        border: 1px solid #000;
                        width: 40px;
                        height: 29px;
                        margin-left: 15%;
                        top: -2px;
                        position: absolute;
                    }

                    .cuadro-2 {
                        text-align: right;
                        margin-left: 51%;
                    }

                    #img-2phone{
                        border: 1px solid #000;
                        width: 40px;
                        height: 29px;
                        margin-left: 66.5%;
                        top: -2px;
                        position: absolute;
                    }
                    #chartdiv{
                        margin-top: -50px;
                        height: 250px;
                        margin-left: 4%;
                    }
                    #chartdiv text{
                        font-size: 12px !important;
                    }


                    .cuadro-3 {
                        margin-left: 0;
                    }
                    #img-3phone{
                        border: 1px solid #000;
                        width: 40px;
                        height: 29px;
                        margin-left: 15%;
                        bottom: 39px;
                        position: absolute;
                    }

                    .cuadro-4 {
                        text-align: right;
                        margin-left: 51%;
                        bottom: -14px;

                    }
                    #img-4phone{
                        border: 1px solid #000;
                        width: 40px;
                        height: 29px;
                        margin-left: 66.5%;
                        bottom: 39px;
                        position: absolute;
                    }

                    .cuadros-title {
                        font-size: 11px;
                    }

                    .cuadro {
                        font-size: 15px;
                    }

                    #piechart {
                        width: 100%;
                        height: auto;
                        margin-left: 0;
                    }

                    .title-section {
                        font-size: 26px;
                    }

                    .btn-conoce-mas {
                        bottom: -10px;
                    }

                    .total-presupuesto {
                        margin-left: unset;
                    }

                    .bg-background-total {
                        background-size: cover;
                    }

                    /* Modalidad de la adjudicacion */
                    #donutchartadjudicacion{
                        width: 100%;
                        height: 180px !important;
                        margin-left: 0px !important;
                        margin-top: -50px;
                    }
                    #donutchartadjudicacion text{
                        font-size: 12px !important;
                    }
                    #donutchartadjudicacion-list{
                        color: #000;
                        position: static !important;
                        margin-left: 4% !important;
                        font-weight: 200;
                        font-size: 12px !important;
                    }
                    #circulo-list{
                        height: 18px !important; 
                        width: 18px !important; 
                        border-radius: 40px;
                        position: absolute;
                        
                    }
                    #text-ciculo{
                        margin-left: 40px !important; 
                        margin-top: 10px !important;
                    }

                    /* Procedimiento por etapas */
                    #donutchartprocedimiento{
                        width: 100%;
                        height: 180px !important;
                        margin-left: 0px !important;
                        margin-top: -50px;
                    }
                    #donutchartprocedimiento text{
                        font-size: 12px !important;
                    }
                    #donutchartprocedimiento-list{
                        color: #000;
                        position: static !important;
                        margin-left: 4% !important;
                        font-weight: 200;
                        font-size: 12px !important;
                    }

                    /* Personas beneficiadas */
                    #donutchartpresonasbeneficiadas{
                        width: 100%;
                        height: 180px !important;
                        margin-left: 0px !important;
                        margin-top: -50px;
                    }
                    #donutchartpresonasbeneficiadas text{
                        font-size: 12px !important;
                    }
                    #donutchartpresonasbeneficiadas-list{
                        color: #000;
                        position: static !important;
                        margin-left: 4% !important;
                        font-weight: 200;
                        font-size: 12px !important;
                    }

                    /* Proyectos en la iniciativa */
                    #donutchartproyectosiniciativa{
                        width: 100%;
                        height: 180px !important;
                        margin-left: 0px !important;
                        margin-top: -50px;
                    }
                    #donutchartproyectosiniciativa text{
                        font-size: 12px !important;
                    }

                    #resultado-estatics{
                        text-align: center !important;
                    }

                }
            </style>
            <div class="col-md-12">
                {{-- Muestra la cantidad de proyectos que hay en cada sector y hacemos el cálculo del porcentaje, se repite en los 4 sectores --}}
                
                <label class="cuadro-1" style="position: absolute;">
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
                        <span class="cuadros-title">{{$sector4[0]->titulo}} </span>
                    @endif
                </label>
                <img id="img-1phone"  src="assets/img/infraestructu.png" alt="">


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
                        <span class="cuadros-title">{{$sector1[0]->titulo}} </span>
                    @endif
                </label>
                <img id="img-2phone"  src="assets/img/63611.png" alt="">


                <br class="hidden-desktop"><br class="hidden-desktop">

                {{-- muestra el gráfico sobre proyectos --}}
                <div id="chartdiv"></div>
                {{-- <div id="donutchartproyectos" style="width:95%; height: 350px;" ></div> --}}
                    
                <br class="hidden-desktop">
                <label class="cuadro-3" style="position: absolute; bottom: 10px">
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
                        <span class="cuadros-title">{{$sector3[0]->titulo}} </span>
                    @endif
                </label>
                <img id="img-3phone"  src="assets/img/urbano.png" alt="">


                <label class="cuadro-4" >
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
                        <span class="cuadros-title">{{$sector2[0]->titulo}} </span>
                    @endif
                </label>
                <img id="img-4phone"  src="assets/img/conservacion y restauracion.png" alt="">
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
            <style>
                #donutchartadjudicacion {
                    width: 100%;
                    height: 400px;
                    margin-left: -270px ;
                    margin-top: -100px;
                }	
                #donutchartadjudicacion a{
                    display: none !important;
                    
                }	
                #donutchartadjudicacion-list{
                    color: #000;
                    z-index: 10;
                    position: absolute;
                    margin-left: 51%;
                    font-weight: 200;
                    font-size: 19px;
                    bottom: 85px;
                }
                #donutchartprocedimiento{
                    width: 100%;
                    height: 400px;
                    margin-left: -200px;
                    margin-top: -100px;
                }
                #donutchartprocedimiento a{
                    display: none !important;
                    
                }
                #donutchartprocedimiento-list{
                    color: #000;
                    z-index: 10;
                    position: absolute;
                    margin-left: 60%;
                    font-weight: 200;
                    font-size: 19px;
                    bottom: 85px;
                }
                #text-ciculo{
                    margin-left: 55px; 
                    margin-top: 10px
                }
                #donutchartpresonasbeneficiadas{
                    width: 100%;
                    height: 400px;
                    margin-left: -550px;
                    margin-top: -20px;
                }
                #donutchartpresonasbeneficiadas a{
                    display: none !important;
                    
                }
                #donutchartpresonasbeneficiadas-list{
                    color: #000;
                    z-index: 10;
                    position: absolute;
                    margin-left: 55%;
                    font-weight: 200;
                    font-size: 19px;
                    bottom: 110px;
                }
                #donutchartproyectosiniciativa{
                    width: 100%;
                    height: 400px;
                    margin-left: 0px ;
                    margin-top: -70px;
                }
                #donutchartproyectosiniciativa a{
                    display: none !important;
                    
                }
                
                
            </style>
            <div class="col-md-12">
                <br class="hidden-desktop"><br class="hidden-desktop">
                <div id="donutchartadjudicacion" ></div>

                <div id="donutchartadjudicacion-list" >
                    @if (count($modalidad_adjudicacion)==0)
                        <center>Sin resultados</center>
                    @else
                        @php
                            $cont_color=0;
                        @endphp
                        @foreach ($modalidad_adjudicacion as $item)
                            @php
                                $cont_color+=1;
                            @endphp
                            @if ($cont_color==1)
                                <div  class="d-flex"><div id="circulo-list" style="background: #d60000;"></div><span id="text-ciculo" >{{$item->total_project}} Proyectos  {{$item->mod_adjudicacion}}</span> </div>
                            @elseif($cont_color==2)
                                <div  class="d-flex"><div id="circulo-list" style="background: #58707b;"></div><span id="text-ciculo" >{{$item->total_project}} Proyectos  {{$item->mod_adjudicacion}}</span> </div>
                            @elseif($cont_color==3)
                                <div  class="d-flex"><div id="circulo-list" style="background: #61a8bd;"></div><span id="text-ciculo" >{{$item->total_project}} Proyectos  {{$item->mod_adjudicacion}}</span> </div>

                            @elseif($cont_color==4)
                                <div   class="d-flex"><div id="circulo-list" style="background: #ffce32;"></div><span id="text-ciculo" >{{$item->total_project}} Proyectos  {{$item->mod_adjudicacion}}</span> </div>
                            @elseif($cont_color==5)
                                <div  class="d-flex"><div id="circulo-list" style="background: #a8a8a8;"></div><span id="text-ciculo" >{{$item->total_project}} Proyectos  {{$item->mod_adjudicacion}}</span> </div>
                            @elseif($cont_color==6)
                                <div  class="d-flex"><div id="circulo-list" style="background: #638e7f;"></div><span id="text-ciculo" >{{$item->total_project}} Proyectos  {{$item->mod_adjudicacion}}</span> </div>


                            @else
                                
                            @endif
                        @endforeach
                    @endif
                        
                        
                   
                </div>
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
                <div id="donutchartprocedimiento" ></div>
                <div id="donutchartprocedimiento-list" >
                    @if (count($procedimiento_etapas)==0)
                        <center>Sin resultados</center>
                    @else
                        @php
                            $cont_color=0;
                        @endphp
                        @foreach ($procedimiento_etapas as $procedimiento_e)
                            @php
                                $cont_color+=1;
                            @endphp
                            @if ($cont_color==1)
                                <div class="d-flex"><div id="circulo-list" style="background: #d60000;"></div><span id="text-ciculo">Identificación {{$procedimiento_e->total_status_project}} Proyectos </span> </div>
                            @elseif($cont_color==2)
                                <div class="d-flex"><div id="circulo-list" style="background: #58707b;"></div><span id="text-ciculo">Preparación {{$procedimiento_e->total_status_project}} Proyectos </span> </div>
                            @elseif($cont_color==3)
                                <div class="d-flex"><div id="circulo-list" style="background: #61a8bd;"></div><span id="text-ciculo">Contratración {{$procedimiento_e->total_status_project}} Proyectos </span> </div>

                            @elseif($cont_color==4)
                                <div  class="d-flex"><div id="circulo-list" style="background: #ffce32;"></div><span id="text-ciculo">Ejecución {{$procedimiento_e->total_status_project}} Proyectos </span> </div>
                            @elseif($cont_color==5)
                                <div class="d-flex"><div id="circulo-list" style="background: #a8a8a8;"></div><span id="text-ciculo">Finalizado {{$procedimiento_e->total_status_project}} Proyectos </span> </div>

                            @else
                                
                            @endif
                        @endforeach
                    @endif
                        
                        
                   
                </div>
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
                <div id="donutchartpresonasbeneficiadas" ></div>
                <div id="donutchartpresonasbeneficiadas-list" >
                    @if (count($personas_beneficias)==0)
                        <center>Sin resultados</center>
                    @else
                        @php
                            $cont_color=0;
                        @endphp
                        @foreach ($personas_beneficias as $personas_b)
                            @php
                                $cont_color+=1;
                            @endphp
                            @if ($cont_color==1)
                                <div class="d-flex"><div id="circulo-list" style="background: #d60000;"></div><span id="text-ciculo">{{$personas_b->name}} </span> </div>
                            @elseif($cont_color==2)
                                <div class="d-flex"><div id="circulo-list" style="background: #58707b;"></div><span id="text-ciculo">{{$personas_b->name}} </span> </div>
                            @elseif($cont_color==3)
                                <div class="d-flex"><div id="circulo-list" style="background: #61a8bd;"></div><span id="text-ciculo">{{$personas_b->name}} </span> </div>

                            @elseif($cont_color==4)
                                <div  class="d-flex"><div id="circulo-list" style="background: #ffce32;"></div><span id="text-ciculo">{{$personas_b->name}} </span> </div>
                            @elseif($cont_color==5)
                                <div class="d-flex"><div id="circulo-list" style="background: #a8a8a8;"></div><span id="text-ciculo">{{$personas_b->name}} </span> </div>

                            @else
                                
                            @endif
                        @endforeach
                    @endif
                        
                        
                   
                </div>
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
                    <div id="donutchartproyectosiniciativa" ></div>
                    
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
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
{{-- <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script> --}}
{{-- <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" /> --}}
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>



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
<script>
    var chart = AmCharts.makeChart( "chartdiv", {
    "type": "pie",
    "theme": "light",
    // "titles": [ {
    //     "text": "Visitors countries",
    //     "size": 16
    // } ],
    "dataProvider": [ 
    {
        "sector": "Proyectos de Edificación",
        "proyectos": {{$sec_1}}
    }, {
        "sector": "Proyectos Restauración y Conservación",
        "proyectos": {{$sec_2}}
    }, {
        "sector": "Proyectos Urbanos",
        "proyectos": {{$sec_3}}
    }, {
        "sector": "Proyectos de Infraestructura",
        "proyectos": {{$sec_4}}
    } ],
    "valueField": "proyectos",
    // "titleField": "sector",
    "colors": ['#d60000', '#58707b', '#61a8bd', '#ffce32'],
    "chartArea": {'width': '100%', 'height': '100%'},
    "startEffect": "elastic",
    "startDuration": 2,
    "labelRadius": 15,
    "innerRadius": "40%",
    "depth3D": 10,
    // "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
    "angle": 15,
    "fontSize": 25,
    
    } );
</script>

{{-- pasamos los datos del gráfico de modalidad de la adjudicación --}}
<script>
    var chart = AmCharts.makeChart( "donutchartadjudicacion", {
    "type": "pie",
    "theme": "light",
    // "titles": [ {
    //     "text": "Visitors countries",
    //     "size": 16
    // } ],
    "dataProvider": [ 

        @if (count($modalidad_adjudicacion)==0)
            {"modalidad":'Sin proyectos',
            "proyectos": 0
             },
            @else
                @foreach ($modalidad_adjudicacion as $modalidad_ad)
                    @if($modalidad_ad->total_project==1)
                        {
                            "modalidad":'{{$modalidad_ad->total_project}} proyecto {{$modalidad_ad->mod_adjudicacion}}  ',
                            "proyectos":{{$modalidad_ad->total_project}}},
                    @else
                        {
                            "modalidad":'{{$modalidad_ad->total_project}} proyectos {{$modalidad_ad->mod_adjudicacion}}  ', 
                            "proyectos":{{$modalidad_ad->total_project}}},
                    @endif
                @endforeach
            @endif
            
    ],
    "valueField": "proyectos",
    // "titleField": "modalidad",
    "colors": ['#d60000', '#58707b', '#61a8bd', '#ffce32','#a8a8a8','#638e7f'],
    "chartArea": {'width': '100%', 'height': '100%'},
    "startEffect": "elastic",
    "startDuration": 2,
    "labelRadius": 15,
    "innerRadius": "40%",
    "depth3D": 10,
    // "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
    "angle": 15,
    "fontSize": 25,
    
    } );
</script>
{{-- pasamos los datos del gráfico de procedimiento por etapas --}}
<script>
    var chart = AmCharts.makeChart( "donutchartprocedimiento", {
    "type": "pie",
    "theme": "light",
    // "titles": [ {
    //     "text": "Visitors countries",
    //     "size": 16
    // } ],
    "dataProvider": [ 

        @if (count($procedimiento_etapas)==0)
            {   
                "modalidad":'Sin proyectos',
                "proyectos": 0
            },
            
            @else
                @foreach ($procedimiento_etapas as $procedimiento_e)
                    @if($procedimiento_e->estatus==1)
                        {
                            "procedimiento":'Identificación: {{$procedimiento_e->total_status_project}} proyectos', 
                            "proyectos":{{$procedimiento_e->total_status_project}}
                        },
                    @elseif($procedimiento_e->estatus==2)
                        {
                            "procedimiento":'Preparación: {{$procedimiento_e->total_status_project}} proyectos', 
                            "proyectos":{{$procedimiento_e->total_status_project}}
                        },
                    @elseif($procedimiento_e->estatus==3)
                        {
                            "procedimiento":'Contratración: {{$procedimiento_e->total_status_project}} proyectos',
                            "proyectos": {{$procedimiento_e->total_status_project}}
                        },
                    @elseif($procedimiento_e->estatus==4)
                        {
                            "procedimiento":'Ejecución: {{$procedimiento_e->total_status_project}} proyectos', 
                            "proyectos":{{$procedimiento_e->total_status_project}}
                        },
                    @elseif($procedimiento_e->estatus==5)
                        {
                            "procedimiento":'Finalizado: {{$procedimiento_e->total_status_project}} proyectos', 
                            "proyectos":{{$procedimiento_e->total_status_project}}
                        },
                    @elseif($procedimiento_e->estatus==7)
                        {
                            "procedimiento":'Finalizado: {{$procedimiento_e->total_status_project}} proyectos', 
                            "proyectos":{{$procedimiento_e->total_status_project}}
                        },
                    @endif
                @endforeach
            @endif
            
    ],
    "valueField": "proyectos",
    // "titleField": "procedimiento",
    "colors": ['#d60000', '#58707b', '#61a8bd', '#ffce32','#a8a8a8','#638e7f'],
    "chartArea": {'width': '100%', 'height': '100%'},
    "startEffect": "elastic",
    "startDuration": 2,
    "labelRadius": 15,
    "innerRadius": "40%",
    "depth3D": 10,
    // "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
    "angle": 15,
    "fontSize": 25,
    
    } );
</script>

{{-- pasamos los datos del gráfico de personas beneficiadas --}}
<script>
    var chart = AmCharts.makeChart( "donutchartpresonasbeneficiadas", {
    "type": "pie",
    "theme": "light",
    // "titles": [ {
    //     "text": "Visitors countries",
    //     "size": 16
    // } ],
    "dataProvider": [ 

        @foreach ($personas_beneficias as $personas_b)
            {
                "personas":'{{$personas_b->name}}', 
                "proyectos":{{$personas_b->total_people}}
            },
        @endforeach
            
    ],
    "valueField": "proyectos",
    // "titleField": "personas",
    "colors": ['#d60000', '#58707b', '#61a8bd', '#ffce32','#a8a8a8','#638e7f'],
    "chartArea": {'width': '100%', 'height': '100%'},
    "startEffect": "elastic",
    "startDuration": 2,
    "labelRadius": 15,
    "innerRadius": "40%",
    "depth3D": 10,
    // "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
    "angle": 15,
    "fontSize": 25,
    "bold":true,
    
    } );
</script>

{{-- Pasamos los datos del gráfico de proyectos de la iniciativa --}}
<script>
    var chart = AmCharts.makeChart( "donutchartproyectosiniciativa", {
    "type": "pie",
    "theme": "light",
    // "titles": [ {
    //     "text": "Visitors countries",
    //     "size": 16
    // } ],
    "dataProvider": [ 

        @foreach ($proyectos as $proyecto)
        {
            "proyectos_ini":'{{$proyecto->name}}', 
            "proyectos":{{$proyecto->total_proyectos}}},     
        @endforeach
            
    ],
    "valueField": "proyectos",
    // "titleField": "proyectos_ini",
    "colors": ['#d60000', '#58707b', '#61a8bd', '#ffce32','#a8a8a8','#638e7f'],
    "chartArea": {'width': '100%', 'height': '100%'},
    "startEffect": "elastic",
    "startDuration": 2,
    "labelRadius": 15,
    "innerRadius": "40%",
    "depth3D": 10,
    // "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
    "angle": 15,
    "fontSize": 25,
    "textStyle": {
        // bold:true,
    }
    
    } );
</script>

@endsection