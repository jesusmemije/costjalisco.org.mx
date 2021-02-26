@extends('front.layouts.app')

@section('title')
Listado de obras
@endsection

@section('styles')
<link href="{{asset("assets/css/list-projects.css")}}" rel="stylesheet">
@endsection

@section('content')

<div class="container-fluid px-0 pt-4">

    <div class="row mx-0" style="background: #fff">
        <div class="col-lg-6 col-md-12 col-sm-12 background-title bg-rojo px-0 py-1">
            <span class="topic">Listado de Obras</span>
        </div>
       
    </div>
    
    <div class="container" id="mtop-phone">
    <div>

      
        <div class="row mt-4" >
            <div class="col-lg-6" >
                
                    <div class="container-item d-flex justify-content-between align-items-center text-white">
                        {{-- <img src="{{ asset('assets/img/project/institucion.png') }}" class="img-fluid" width="36" alt=""> --}}
                        <strong id="titulos-phone">DESCARGA TODOS LOS PROYECTOS DE LA INICIATIVA</strong>
                    </div>
                
            </div>
            <div style="margin-left: 3%;" class="col-md-12 mt-4">
        
                <a href="{{route('projectexportallcsv')}}"><i style="font-size: 30px; margin-right:1%" class="fas fa-file-csv"></i> </a>   
        
        
                <a href="{{route('projectexportall')}}"><i style="font-size: 30px; margin-right:1%" class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                <a href="{{route('jsonprojects')}}" target="_blank"><i style="font-size: 30px;" class="fa fa-file-alt" aria-hidden="true"></i></a>
                
            </div>
        </div>
    <hr>
        @php
        // Estas variables es para tomar la decision de mostrar o ocultar la organización que contenga proyectos
            $num1=0;
            $num2=0;
            $num3=0;
            $num4=0;
            $num5=0;
        @endphp
        @if (count($projects)==0)
            <div class="col-md-12">
                <center>
                    Ningún proyecto
                </center>
            </div>
        @else
            {{-- Con este foreach tomamos la decisión de que si en la consulta hay organizaciones con el id que se le está pasando manual, entonces le agregamos un 1 para darnos cuenta que la organización de ese id tiene proyectos. --}}
            @foreach ($projects as $project)
                @if ($project->id_organization==2)
                    @php
                        $num1=1;
                    @endphp
                @elseif($project->id_organization==7)
                    @php
                        $num2=1;
                    @endphp
                @elseif($project->id_organization==8)
                    @php
                        $num3=1;
                    @endphp
                @elseif($project->id_organization==9)
                    @php
                        $num4=1;
                    @endphp
                @elseif($project->id_organization==10)
                    @php
                        $num5=1;
                    @endphp
                @endif
            @endforeach
        @endif

        @if ($num1==1)
        {{-- Decimos si num1 es igual a 1, es porque tiene proyectos y lo mostramos. Asi sucesivamente con los demas --}}
            <div class="row mb-5">
                <div class="col-lg-6">
                    <a href="">
                        <div class="container-item d-flex justify-content-between align-items-center text-white">
                            <img src="{{ asset('assets/img/project/institucion.png') }}" class="img-fluid" width="36" alt="">
                            <strong id="titulos-phone">GOBIERNO DEL ESTADO DE JALISCO (SIOP)</strong>
                        </div>
                    </a>
                </div>
                @php
                // Estas variables es para ocultar mostrar un solo proyecto y ocultar los demas
                    $contar2=0;
                    $conta22=0;
                    $id_proyecto=0;
                @endphp
                @foreach ($projects as $project)
                    
                    {{-- Aqui tomamos la decisión, si en la consulta existe el id de la prganización en el que actualmente estamos, entonces el contador hacemos que aumente de 1 en 1.  --}}
                    @if ($project->id_organization==2)
                        @php
                            $contar2+=1;
                        @endphp

                        {{-- Decimos si el contador es menor o igual a 1, entonces ocultamos los demas proyectos y mostramos los datos del primer proyecto --}}
                        @if ($contar2<=1)
                                <style>
                                    #content2{
                                        display: none;
                                    }
                                </style>
                                <div style="margin-left: 3%;" class="col-md-12">
                                    <div class="media" >
                                            @php
                                            // Consultamos las imagenes segun el id del proyecto y solo mostramos el ultimo
                                            $imagen = DB::table('projects_imgs')
                                            ->select('projects_imgs.imgroute')
                                            ->where('projects_imgs.id_project','=',$project->id)
                                            ->get();
                                            @endphp
                                            @if (count($imagen) == 0)
                                                <img src="{{ asset('projects_imgs/sinimagen.png') }}" class="img-obra" width="325" height="310"
                                                style="border: 2px solid rgb(180, 180, 180)" alt="">
                                            @else
                                                <img src="{{ asset('projects_imgs/'.$imagen->last()->imgroute) }}" class="img-obra" width="325" height="30" alt="">
                                            @endif
                            
                                            @php
                                                $title = substr($project->title,0,36).'...';
                                                $description = substr($project->description,0,120).'...';
                                            @endphp
                            
                                        <div class="media-body">
                                            <div class="m-text-description">
                                                <div class="mt-5 mt-sm-4 ml-5 title-obra">{{ $title }} </div>
                                                <br class="hidden-desktop">
                                                <div class="col-md-10 col-sm-10 col-12 px-0 description-obra">
                                                    <span> {{ $description }} </span>
                                                </div>
                                                <div class="form-row">
                                                    <div class="mt-4 form-group col-md-7 col-sm-7 col-6 ml-5 container-organismo-publico">
                                                        <span style="margin-bottom: -55%;" class="organismo-publico">{{$project->name_organization}}</span>
                                                    </div>
                                                    <div class="form-group mt-4 col-md-3 col-sm-3 col-6 container-btn">
                                                        <a href="{{ route('project-single', $project->id) }}" style="margin-bottom: 5%;" class="btn btn-sm btn-conoce-mas">
                                                            Conoce más
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-11 d-flex justify-content-end align-items-baseline bg-red">
                                                <span class="porcentaje">{{$project->porcentaje_obra}}%</span>&nbsp;&nbsp;<span
                                                    style="color:white">completado</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @else
                            
                        @endif
                        {{-- Decimos si el contador es mayor que 1 y el contador es menor que 3, entonces mostramos el boton --}}
                        @if ($contar2>1 && $contar2<3)
                            <div class="col-md-12">
                                <button id="show2" style="background: slategrey; color: #fff; padding: 2px 15px 2px 15px; float: right; margin: 7px; border-radius: 20px;">Ver más</button>
                                <button id="hide2" style="background: slategrey; color: #fff; padding: 2px 15px 2px 15px; float: right; margin: 7px; border-radius: 20px; display: none">Cerrar</button>
                                
                            </div>
                        @else
                        @endif
                    @else
                        
                    @endif
                    
                @endforeach
                <div style="margin-left: 3%;" class="col-md-12" id="content2" style="display: none">
                    @foreach ($projects as $project)
                            
                        @if ($project->id_organization==2)
                            @php
                            // Con esta variable ocultaremos los demas proyectos 
                                $conta22+=1;
                            @endphp
                            {{-- Si el contador2 es mayor que 1 entonces mostramos los proyectos. --}}
                            @if ($conta22>1)
                                @if ($id_proyecto==$project->id)
                                    
                                @else
                                    <div class="media" >
                                            @php
                                            $imagen = DB::table('projects_imgs')
                                            ->select('projects_imgs.imgroute')
                                            ->where('projects_imgs.id_project','=',$project->id)
                                            ->get();
                                            @endphp
                                            @if (count($imagen) == 0)
                                                <img src="{{ asset('projects_imgs/sinimagen.png') }}" class="img-obra" width="325" height="310"
                                                style="border: 2px solid rgb(180, 180, 180)" alt="">
                                            @else
                                                <img src="{{ asset('projects_imgs/'.$imagen->last()->imgroute) }}" class="img-obra" width="325" height="310" alt="">
                                            @endif
                            
                                            @php
                                                $title = substr($project->title,0,36).'...';
                                                $description = substr($project->description,0,120).'...';
                                            @endphp
                            
                                        <div class="media-body">
                                            <div class="m-text-description">
                                                <div class="mt-5 mt-sm-4 ml-5 title-obra">{{ $title }} </div>
                                                <br class="hidden-desktop">
                                                <div class="col-md-10 col-sm-10 col-12 px-0 description-obra">
                                                    <span> {{ $description }} </span>
                                                </div>
                                                <div class="form-row">
                                                    <div class="mt-4 form-group col-md-7 col-sm-7 col-6 ml-5 container-organismo-publico">
                                                        <span class="organismo-publico">{{$project->name_organization}}</span>
                                                    </div>
                                                    <div class="form-group mt-4 col-md-3 col-sm-3 col-6 container-btn">
                                                        <a href="{{ route('project-single', $project->id) }}" class="btn btn-sm btn-conoce-mas">
                                                            Conoce más
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-11 d-flex justify-content-end align-items-baseline bg-red">
                                                <span class="porcentaje">{{$project->porcentaje_obra}}%</span>&nbsp;&nbsp;<span
                                                    style="color:white">completado</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @else
                            
                            @endif
                            @php
                                $id_proyecto=$project->id;
                            @endphp
                        @else
                        
                        @endif
                        
                    @endforeach
                </div>
            </div>  
        @else
            
        @endif

        @if ($num2==1)
            <div class="row mb-5">
                <div class="col-lg-6">
                    <a href="">
                        <div class="container-item d-flex justify-content-between align-items-center text-white">
                            <img src="{{ asset('assets/img/project/institucion.png') }}" class="img-fluid" width="36" alt="">
                            <strong id="titulos-phone">AYUNTAMIENTO DE GUADALAJARA</strong>
                        </div>
                    </a>
                </div>
                    @php
                        $contar7=0;
                        $conta27=0;
                        $id_proyecto7=0;
                    @endphp
                    @foreach ($projects as $project)
                        
                            
                        @if ($project->id_organization==7)
                            @php
                                $contar7+=1;
                            @endphp
                            @if ($contar7<=1)
                                    <style>
                                        #content7{
                                            display: none;
                                        }
                                    </style>
                                    <div style="margin-left: 3%;" class="col-md-12">
                                        <div class="media" >
                                                @php
                                                $imagen = DB::table('projects_imgs')
                                                ->select('projects_imgs.imgroute')
                                                ->where('projects_imgs.id_project','=',$project->id)
                                                ->get();
                                                @endphp
                                                @if (count($imagen) == 0)
                                                    <img src="{{ asset('projects_imgs/sinimagen.png') }}" class="img-obra" width="325" height="310"
                                                    style="border: 2px solid rgb(180, 180, 180)" alt="">
                                                @else
                                                    <img src="{{ asset('projects_imgs/'.$imagen->last()->imgroute) }}" class="img-obra" width="325" height="310" alt="">
                                                @endif
                                
                                                @php
                                                    $title = substr($project->title,0,36).'...';
                                                    $description = substr($project->description,0,120).'...';
                                                @endphp
                                
                                            <div class="media-body">
                                                <div class="m-text-description">
                                                    <div class="mt-5 mt-sm-4 ml-5 title-obra">{{ $title }}  </div>
                                                    <br class="hidden-desktop">
                                                    <div class="col-md-10 col-sm-10 col-12 px-0 description-obra">
                                                        <span> {{ $description }} </span>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="mt-4 form-group col-md-7 col-sm-7 col-6 ml-5 container-organismo-publico">
                                                            <span class="organismo-publico">{{$project->name_organization}}</span>
                                                        </div>
                                                        <div class="form-group mt-4 col-md-3 col-sm-3 col-6 container-btn">
                                                            <a href="{{ route('project-single', $project->id) }}" class="btn btn-sm btn-conoce-mas">
                                                                Conoce más
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-11 d-flex justify-content-end align-items-baseline bg-red">
                                                    <span class="porcentaje">{{$project->porcentaje_obra}}%</span>&nbsp;&nbsp;<span
                                                        style="color:white">completado</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @else
                                
                            @endif
                            @if ($contar7>1 && $contar7<3)
                                <div class="col-md-12">
                                    <button id="show7" style="background: slategrey; color: #fff; padding: 2px 15px 2px 15px; float: right; margin: 7px; border-radius: 20px;">Ver más</button>
                                    <button id="hide7" style="background: slategrey; color: #fff; padding: 2px 15px 2px 15px; float: right; margin: 7px; border-radius: 20px; display: none">Cerrar</button>
                                
                                </div>
                            @else
                            @endif
                        @else
                            
                        @endif
                        
                    @endforeach
                    <div style="margin-left: 3%;" class="col-md-12" id="content7" style="display: none">
                        @foreach ($projects as $project)
                                
                            @if ($project->id_organization==7)
                                @php
                                    $conta27+=1;
                                @endphp
                                @if ($conta27>1)
                                    @if ($id_proyecto7==$project->id)
                                        
                                    @else
                                        <div class="media" >
                                                @php
                                                $imagen = DB::table('projects_imgs')
                                                ->select('projects_imgs.imgroute')
                                                ->where('projects_imgs.id_project','=',$project->id)
                                                ->get();
                                                @endphp
                                                @if (count($imagen) == 0)
                                                    <img src="{{ asset('projects_imgs/sinimagen.png') }}" class="img-obra" width="325" height="310"
                                                    style="border: 2px solid rgb(180, 180, 180)" alt="">
                                                @else
                                                    <img src="{{ asset('projects_imgs/'.$imagen->last()->imgroute) }}" class="img-obra" width="325" height="310" alt="">
                                                @endif
                                
                                                @php
                                                    $title = substr($project->title,0,36).'...';
                                                    $description = substr($project->description,0,120).'...';
                                                @endphp
                                
                                            <div class="media-body">
                                                <div class="m-text-description">
                                                    <div class="mt-5 mt-sm-4 ml-5 title-obra">{{ $title }} </div>
                                                    <br class="hidden-desktop">
                                                    <div class="col-md-10 col-sm-10 col-12 px-0 description-obra">
                                                        <span> {{ $description }} </span>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="mt-4 form-group col-md-7 col-sm-7 col-6 ml-5 container-organismo-publico">
                                                            <span class="organismo-publico">{{$project->name_organization}}</span>
                                                        </div>
                                                        <div class="form-group mt-4 col-md-3 col-sm-3 col-6 container-btn">
                                                            <a href="{{ route('project-single', $project->id) }}" class="btn btn-sm btn-conoce-mas">
                                                                Conoce más
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-11 d-flex justify-content-end align-items-baseline bg-red">
                                                    <span class="porcentaje">{{$project->porcentaje_obra}}%</span>&nbsp;&nbsp;<span
                                                        style="color:white">completado</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    
                                @else
                                
                                @endif
                                @php
                                    $id_proyecto7=$project->id;
                                @endphp
                            @else
                            
                            @endif
                            
                        @endforeach
                    </div>
            </div> 
        @else
            
        @endif
        
        @if ($num3==1)
            <div class="row mb-5">
                <div class="col-lg-6">
                    <a href="">
                        <div class="container-item d-flex justify-content-between align-items-center text-white">
                            <img src="{{ asset('assets/img/project/institucion.png') }}" class="img-fluid" width="36" alt="">
                            <strong id="titulos-phone">AYUNTAMIENTO DE ZAPOPAN</strong>
                        </div>
                    </a>
                </div>
                    @php
                        $contar8=0;
                        $conta28=0;
                        $id_proyecto8=0;
                    @endphp
                    @foreach ($projects as $project)
                        
                            
                        @if ($project->id_organization==8)
                            @php
                                $contar8+=1;
                            @endphp
                            @if ($contar8<=1)
                                <style>
                                    #content8{
                                        display: none;
                                    }
                                </style>
                                    <div style="margin-left: 3%;" class="col-md-12">
                                        <div class="media" >
                                                @php
                                                $imagen = DB::table('projects_imgs')
                                                ->select('projects_imgs.imgroute')
                                                ->where('projects_imgs.id_project','=',$project->id)
                                                ->get();
                                                @endphp
                                                @if (count($imagen) == 0)
                                                    <img src="{{ asset('projects_imgs/sinimagen.png') }}" class="img-obra" width="325" height="310"
                                                    style="border: 2px solid rgb(180, 180, 180)" alt="">
                                                @else
                                                    <img src="{{ asset('projects_imgs/'.$imagen->last()->imgroute) }}" class="img-obra" width="325" height="310" alt="">
                                                @endif
                                
                                                @php
                                                    $title = substr($project->title,0,36).'...';
                                                    $description = substr($project->description,0,120).'...';
                                                @endphp
                                
                                            <div class="media-body">
                                                <div class="m-text-description">
                                                    <div class="mt-5 mt-sm-4 ml-5 title-obra">{{ $title }} </div>
                                                    <br class="hidden-desktop">
                                                    <div class="col-md-10 col-sm-10 col-12 px-0 description-obra">
                                                        <span> {{ $description }} </span>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="mt-4 form-group col-md-7 col-sm-7 col-6 ml-5 container-organismo-publico">
                                                            <span class="organismo-publico">{{$project->name_organization}}</span>
                                                        </div>
                                                        <div class="form-group mt-4 col-md-3 col-sm-3 col-6 container-btn">
                                                            <a href="{{ route('project-single', $project->id) }}" class="btn btn-sm btn-conoce-mas">
                                                                Conoce más
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-11 d-flex justify-content-end align-items-baseline bg-red">
                                                    <span class="porcentaje">{{$project->porcentaje_obra}}%</span>&nbsp;&nbsp;<span
                                                        style="color:white">completado</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @else
                                
                            @endif
                            @if ($contar8>1 && $contar8<3)
                                <div class="col-md-12">
                                    <button id="show8" style="background: slategrey; color: #fff; padding: 2px 15px 2px 15px; float: right; margin: 7px; border-radius: 20px;">Ver más</button>
                                    <button id="hide8" style="background: slategrey; color: #fff; padding: 2px 15px 2px 15px; float: right; margin: 7px; border-radius: 20px; display: none">Cerrar</button>
                                </div>
                            @else
                            @endif
                        @else
                            
                        @endif
                        
                    @endforeach
                    <div style="margin-left: 3%;" class="col-md-12" id="content8" style="display: none">
                        @foreach ($projects as $project)
                                
                            @if ($project->id_organization==8)
                                @php
                                    $conta28+=1;
                                @endphp
                                @if ($conta28>1)
                                    @if ($id_proyecto8==$project->id)
                                        
                                    @else
                                        <div class="media" >
                                                @php
                                                $imagen = DB::table('projects_imgs')
                                                ->select('projects_imgs.imgroute')
                                                ->where('projects_imgs.id_project','=',$project->id)
                                                ->get();
                                                @endphp
                                                @if (count($imagen) == 0)
                                                    <img src="{{ asset('projects_imgs/sinimagen.png') }}" class="img-obra" width="325" height="310"
                                                    style="border: 2px solid rgb(180, 180, 180)" alt="">
                                                @else
                                                    <img src="{{ asset('projects_imgs/'.$imagen->last()->imgroute) }}" class="img-obra" width="325" height="310" alt="">
                                                @endif
                                
                                                @php
                                                    $title = substr($project->title,0,36).'...';
                                                    $description = substr($project->description,0,120).'...';
                                                @endphp
                                
                                            <div class="media-body">
                                                <div class="m-text-description">
                                                    <div class="mt-5 mt-sm-4 ml-5 title-obra">{{ $title }} </div>
                                                    <br class="hidden-desktop">
                                                    <div class="col-md-10 col-sm-10 col-12 px-0 description-obra">
                                                        <span> {{ $description }} </span>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="mt-4 form-group col-md-7 col-sm-7 col-6 ml-5 container-organismo-publico">
                                                            <span class="organismo-publico">{{$project->name_organization}}</span>
                                                        </div>
                                                        <div class="form-group mt-4 col-md-3 col-sm-3 col-6 container-btn">
                                                            <a href="{{ route('project-single', $project->id) }}" class="btn btn-sm btn-conoce-mas">
                                                                Conoce más
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-11 d-flex justify-content-end align-items-baseline bg-red">
                                                    <span class="porcentaje">{{$project->porcentaje_obra}}%</span>&nbsp;&nbsp;<span
                                                        style="color:white">completado</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    
                                @else
                                
                                @endif
                                @php
                                    $id_proyecto8=$project->id;
                                @endphp
                            @else
                            
                            @endif
                        @endforeach
                    </div>
            </div> 
        @else
            
        @endif
              
        @if ($num4==1)
            <div class="row mb-5">
                <div class="col-lg-6">
                    <a href="">
                        <div class="container-item d-flex justify-content-between align-items-center text-white">
                            <img src="{{ asset('assets/img/project/institucion.png') }}" class="img-fluid" width="36" alt="">
                            <strong id="titulos-phone">AYUNTAMIENTO DE TONALÁ</strong>
                        </div>
                    </a>
                </div>
                    @php
                        $contar9=0;
                        $conta29=0;
                        $id_proyecto9=0;
                    @endphp
                    @foreach ($projects as $project)
                        
                            
                        @if ($project->id_organization==9)
                            @php
                                $contar9+=1;
                            @endphp
                            @if ($contar9<=1)
                                <style>
                                    #content9{
                                        display: none;
                                    }
                                </style>
                                    <div style="margin-left: 3%;" class="col-md-12">
                                        <div class="media" >
                                                @php
                                                $imagen = DB::table('projects_imgs')
                                                ->select('projects_imgs.imgroute')
                                                ->where('projects_imgs.id_project','=',$project->id)
                                                ->get();
                                                @endphp
                                                @if (count($imagen) == 0)
                                                    <img src="{{ asset('projects_imgs/sinimagen.png') }}" class="img-obra" width="325" height="310"
                                                    style="border: 2px solid rgb(180, 180, 180)" alt="">
                                                @else
                                                    <img src="{{ asset('projects_imgs/'.$imagen->last()->imgroute) }}" class="img-obra" width="325" height="310" alt="">
                                                @endif
                                
                                                @php
                                                    $title = substr($project->title,0,36).'...';
                                                    $description = substr($project->description,0,120).'...';
                                                @endphp
                                
                                            <div class="media-body">
                                                <div class="m-text-description">
                                                    <div class="mt-5 mt-sm-4 ml-5 title-obra">{{ $title }} </div>
                                                    <br class="hidden-desktop">
                                                    <div class="col-md-10 col-sm-10 col-12 px-0 description-obra">
                                                        <span> {{ $description }} </span>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="mt-4 form-group col-md-7 col-sm-7 col-6 ml-5 container-organismo-publico">
                                                            <span class="organismo-publico">{{$project->name_organization}}</span>
                                                        </div>
                                                        <div class="form-group mt-4 col-md-3 col-sm-3 col-6 container-btn">
                                                            <a href="{{ route('project-single', $project->id) }}" class="btn btn-sm btn-conoce-mas">
                                                                Conoce más
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-11 d-flex justify-content-end align-items-baseline bg-red">
                                                    <span class="porcentaje">{{$project->porcentaje_obra}}%</span>&nbsp;&nbsp;<span
                                                        style="color:white">completado</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @else
                                
                            @endif
                            @if ($contar9>1 && $contar9<3)
                                <div class="col-md-12">
                                    <button id="show9" style="background: slategrey; color: #fff; padding: 2px 15px 2px 15px; float: right; margin: 7px; border-radius: 20px;">Ver más</button>
                                    <button id="hide9" style="background: slategrey; color: #fff; padding: 2px 15px 2px 15px; float: right; margin: 7px; border-radius: 20px; display: none">Cerrar</button>
                                </div>
                            @else
                            @endif
                        @else
                            
                        @endif
                        
                    @endforeach
                    <div style="margin-left: 3%;" class="col-md-12" id="content9" style="display: none">
                        @foreach ($projects as $project)
                                
                            @if ($project->id_organization==9)
                                @php
                                    $conta29+=1;
                                @endphp
                                @if ($conta29>1)
                                    @if ($id_proyecto9==$project->id)
                                            
                                    @else
                                        <div class="media" >
                                                @php
                                                $imagen = DB::table('projects_imgs')
                                                ->select('projects_imgs.imgroute')
                                                ->where('projects_imgs.id_project','=',$project->id)
                                                ->get();
                                                @endphp
                                                @if (count($imagen) == 0)
                                                    <img src="{{ asset('projects_imgs/sinimagen.png') }}" class="img-obra" width="325" height="310"
                                                    style="border: 2px solid rgb(180, 180, 180)" alt="">
                                                @else
                                                    <img src="{{ asset('projects_imgs/'.$imagen->last()->imgroute) }}" class="img-obra" width="325" height="310" alt="">
                                                @endif
                                
                                                @php
                                                    $title = substr($project->title,0,36).'...';
                                                    $description = substr($project->description,0,120).'...';
                                                @endphp
                                
                                            <div class="media-body">
                                                <div class="m-text-description">
                                                    <div class="mt-5 mt-sm-4 ml-5 title-obra">{{ $title }} </div>
                                                    <br class="hidden-desktop">
                                                    <div class="col-md-10 col-sm-10 col-12 px-0 description-obra">
                                                        <span> {{ $description }} </span>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="mt-4 form-group col-md-7 col-sm-7 col-6 ml-5 container-organismo-publico">
                                                            <span class="organismo-publico">{{$project->name_organization}}</span>
                                                        </div>
                                                        <div class="form-group mt-4 col-md-3 col-sm-3 col-6 container-btn">
                                                            <a href="{{ route('project-single', $project->id) }}" class="btn btn-sm btn-conoce-mas">
                                                                Conoce más
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-11 d-flex justify-content-end align-items-baseline bg-red">
                                                    <span class="porcentaje">{{$project->porcentaje_obra}}%</span>&nbsp;&nbsp;<span
                                                        style="color:white">completado</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    
                                @else
                                
                                @endif
                                @php
                                    $id_proyecto9=$project->id;
                                @endphp
                            @else
                            
                            @endif
                        @endforeach
                    </div>
            </div> 
        @else
            
        @endif
           
        @if ($num5==1)
            <div class="row mb-5">
                <div class="col-lg-6">
                    <a href="">
                        <div class="container-item d-flex justify-content-between align-items-center text-white">
                            <img src="{{ asset('assets/img/project/institucion.png') }}" class="img-fluid" width="36" alt="">
                            <strong id="titulos-phone">AYUNTAMIENTO DE TLAJOMULCO DE ZÚÑIGA</strong>
                        </div>
                    </a>
                </div>
                    @php
                        $contar10=0;
                        $conta210=0;
                        $id_proyecto10=0;
                    @endphp
                    @foreach ($projects as $project)
                        
                            
                        @if ($project->id_organization==10)
                            @php
                                $contar10+=1;
                            @endphp
                            @if ($contar10<=1)
                                    <style>
                                        #content10{
                                            display: none;
                                        }
                                    </style>
                                    <div style="margin-left: 3%;" class="col-md-12">
                                        <div class="media" >
                                                @php
                                                $imagen = DB::table('projects_imgs')
                                                ->select('projects_imgs.imgroute')
                                                ->where('projects_imgs.id_project','=',$project->id)
                                                ->get();
                                                @endphp
                                                @if (count($imagen) == 0)
                                                    <img src="{{ asset('projects_imgs/sinimagen.png') }}" class="img-obra" width="325" height="310"
                                                    style="border: 2px solid rgb(180, 180, 180)" alt="">
                                                @else
                                                    <img src="{{ asset('projects_imgs/'.$imagen->last()->imgroute) }}" class="img-obra" width="325" height="310" alt="">
                                                @endif
                                
                                                @php
                                                    $title = substr($project->title,0,36).'...';
                                                    $description = substr($project->description,0,120).'...';
                                                @endphp
                                
                                            <div class="media-body">
                                                <div class="m-text-description">
                                                    <div class="mt-5 mt-sm-4 ml-5 title-obra">{{ $title }} </div>
                                                    <br class="hidden-desktop">
                                                    <div class="col-md-10 col-sm-10 col-12 px-0 description-obra">
                                                        <span> {{ $description }} </span>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="mt-4 form-group col-md-7 col-sm-7 col-6 ml-5 container-organismo-publico">
                                                            <span class="organismo-publico">{{$project->name_organization}}</span>
                                                        </div>
                                                        <div class="form-group mt-4 col-md-3 col-sm-3 col-6 container-btn">
                                                            <a href="{{ route('project-single', $project->id) }}" class="btn btn-sm btn-conoce-mas">
                                                                Conoce más
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-11 d-flex justify-content-end align-items-baseline bg-red">
                                                    <span class="porcentaje">{{$project->porcentaje_obra}}%</span>&nbsp;&nbsp;<span
                                                        style="color:white">completado</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @else
                                
                            @endif
                            @if ($contar10>1 && $contar10<3)
                                <div class="col-md-12">
                                    <button id="show10" style="background: slategrey; color: #fff; padding: 2px 15px 2px 15px; float: right; margin: 7px; border-radius: 20px;">Ver más</button>
                                    <button id="hide10" style="background: slategrey; color: #fff; padding: 2px 15px 2px 15px; float: right; margin: 7px; border-radius: 20px; display: none">Cerrar</button>
                                </div>
                            @else
                            @endif
                        @else
                            
                        @endif
                        
                    @endforeach
                    <div style="margin-left: 3%;" class="col-md-12" id="content10" style="display: none">
                        @foreach ($projects as $project)
                                
                            @if ($project->id_organization==10)
                                @php
                                    $conta210+=1;
                                @endphp
                                @if ($conta210>1)
                                    @if ($id_proyecto10==$project->id)
                                            
                                    @else
                                        <div class="media" >
                                                @php
                                                $imagen = DB::table('projects_imgs')
                                                ->select('projects_imgs.imgroute')
                                                ->where('projects_imgs.id_project','=',$project->id)
                                                ->get();
                                                @endphp
                                                @if (count($imagen) == 0)
                                                    <img src="{{ asset('projects_imgs/sinimagen.png') }}" class="img-obra" width="325" height="310"
                                                    style="border: 2px solid rgb(180, 180, 180)" alt="">
                                                @else
                                                    <img src="{{ asset('projects_imgs/'.$imagen->last()->imgroute) }}" class="img-obra" width="325" height="310" alt="">
                                                @endif
                                
                                                @php
                                                    $title = substr($project->title,0,36).'...';
                                                    $description = substr($project->description,0,120).'...';
                                                @endphp
                                
                                            <div class="media-body">
                                                <div class="m-text-description">
                                                    <div class="mt-5 mt-sm-4 ml-5 title-obra">{{ $title }} </div>
                                                    <br class="hidden-desktop">
                                                    <div class="col-md-10 col-sm-10 col-12 px-0 description-obra">
                                                        <span> {{ $description }} </span>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="mt-4 form-group col-md-7 col-sm-7 col-6 ml-5 container-organismo-publico">
                                                            <span class="organismo-publico">{{$project->name_organization}}</span>
                                                        </div>
                                                        <div class="form-group mt-4 col-md-3 col-sm-3 col-6 container-btn">
                                                            <a href="{{ route('project-single', $project->id) }}" class="btn btn-sm btn-conoce-mas">
                                                                Conoce más
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-11 d-flex justify-content-end align-items-baseline bg-red">
                                                    <span class="porcentaje">{{$project->porcentaje_obra}}%</span>&nbsp;&nbsp;<span
                                                        style="color:white">completado</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                
                                @endif
                                @php
                                    $id_proyecto10=$project->id;
                                @endphp
                            @else
                            
                            @endif
                        @endforeach
                    </div>
            </div> 
        @else
            
        @endif
    </div>

</div>

@endsection
@section('scripts')
<script>
    // Al darle clic en el boton cerrar con id hide2 entonces ocultamos los proyectos
    $(document).ready(function(){
    $("#hide2").on('click', function() {
        $("#content2").hide();
        $("#show2").show();
        $("#hide2").hide();

        return false;
    });
    // Al darle clic en el boton Ver más con id show2 mostramos los proyectos
    $("#show2").on('click', function() {
        $("#content2").show();
        $("#hide2").show();
        $("#show2").hide();

        return false;
    });


    $("#hide8").on('click', function() {
        $("#content8").hide();
        $("#show8").show();
        $("#hide8").hide();

        return false;
    });
 
    $("#show8").on('click', function() {
        $("#content8").show();
        $("#hide8").show();
        $("#show8").hide();

        return false;
    });


    $("#hide9").on('click', function() {
        $("#content9").hide();
        $("#show9").show();
        $("#hide9").hide();

        return false;
    });
 
    $("#show9").on('click', function() {
        $("#content9").show();
        $("#hide9").show();
        $("#show9").hide();

        return false;
    });


    $("#hide10").on('click', function() {
        $("#content10").hide();
        $("#show10").show();
        $("#hide10").hide();

        return false;
    });
 
    $("#show10").on('click', function() {
        $("#content10").show();
        $("#hide10").show();
        $("#show10").hide();

        return false;
    });


    $("#hide7").on('click', function() {
        $("#content7").hide();
        $("#show7").show();
        $("#hide7").hide();

        return false;
    });
 
    $("#show7").on('click', function() {
        $("#content7").show();
        $("#hide7").show();
        $("#show7").hide();

        return false;
    });
});
</script>
@endsection