@extends('front.layouts.app')

@section('title')
Listado de obras
@endsection

@section('styles')
<link href="{{asset("assets/css/list-projects.css")}}" rel="stylesheet">
@endsection

@section('content')

<div class="container-fluid py-4">

    <div class="row" style="background: #fff">
        <div class="col-lg-6 col-md-12 col-sm-12 background-title bg-rojo px-0 py-1">
            <span class="topic">Listado de Obras</span>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row mb-5">
            <div class="col-lg-6">
                <a href="">
                    <div class="container-item d-flex justify-content-between align-items-center text-white">
                        <img src="{{ asset('assets/img/project/institucion.png') }}" class="img-fluid" width="36" alt="">
                        <strong>GOBIERNO DEL ESTADO DE JALISCO (SIOP)</strong>
                        <img src="{{ asset('assets/img/project/flecha.png') }}" class="img-fluid icon-arrow" alt="">
                    </div>
                </a>
            </div>
            @php
                $contar2=0;
                $conta22=0;
            @endphp
            @foreach ($projects as $project)
                
                    
                @if ($project->id_organization==2)
                    @php
                        $contar2+=1;
                    @endphp
                    {{-- <b>{{$contar}}</b> --}}
                    @if ($contar2<=1)
                            <style>
                                #content2{
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
                                            $description = substr($project->description,0,140).'...';
                                        @endphp
                        
                                    <div class="media-body">
                                        <div class="mt-5 mt-sm-4 ml-5 title-obra">{{ $title }} </div>
                                        <br class="hidden-desktop">
                                        <div class="col-md-10 col-sm-10 col-12 px-0 description-obra">
                                            <span> {{ $description }} </span>
                                        </div>
                                        <div class="form-row">
                                            <div class="mt-4 form-group col-md-3 col-sm-3 col-6 ml-5 container-organismo-publico">
                                                <span class="organismo-publico">{{$project->name_organization}}</span>
                                            </div>
                                            <div class="form-group mt-4 col-md-2 col-sm-3 col-6 container-btn">
                                                <a href="{{ route('project-single', $project->id) }}" class="btn btn-sm btn-conoce-mas">
                                                    Conoce más
                                                </a>
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
                            $conta22+=1;
                        @endphp
                        {{-- <b>{{$conta2}}</b> --}}
                        @if ($conta22>1)
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
                                            $description = substr($project->description,0,140).'...';
                                        @endphp
                        
                                    <div class="media-body">
                                        <div class="mt-5 mt-sm-4 ml-5 title-obra">{{ $title }} </div>
                                        <br class="hidden-desktop">
                                        <div class="col-md-10 col-sm-10 col-12 px-0 description-obra">
                                            <span> {{ $description }} </span>
                                        </div>
                                        <div class="form-row">
                                            <div class="mt-4 form-group col-md-3 col-sm-3 col-6 ml-5 container-organismo-publico">
                                                <span class="organismo-publico">{{$project->name_organization}}</span>
                                            </div>
                                            <div class="form-group mt-4 col-md-2 col-sm-3 col-6 container-btn">
                                                <a href="{{ route('project-single', $project->id) }}" class="btn btn-sm btn-conoce-mas">
                                                    Conoce más
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-11 d-flex justify-content-end align-items-baseline bg-red">
                                            <span class="porcentaje">{{$project->porcentaje_obra}}%</span>&nbsp;&nbsp;<span
                                                style="color:white">completado</span>
                                        </div>
                                    </div>
                                </div>
                            
                        @else
                        
                        @endif
                    @else
                    
                    @endif
                @endforeach
            </div>
        </div>        
        <div class="row mb-5">
            <div class="col-lg-6">
                <a href="">
                    <div class="container-item d-flex justify-content-between align-items-center text-white">
                        <img src="{{ asset('assets/img/project/institucion.png') }}" class="img-fluid" width="36" alt="">
                        <strong>AYUNTAMIENTO DE ZAPOPAN</strong>
                        <img src="{{ asset('assets/img/project/flecha.png') }}" class="img-fluid icon-arrow" alt="">
                    </div>
                </a>
            </div>
                @php
                    $contar8=0;
                    $conta28=0;
                @endphp
                @foreach ($projects as $project)
                    
                        
                    @if ($project->id_organization==8)
                        @php
                            $contar8+=1;
                        @endphp
                        {{-- <b>{{$contar}}</b> --}}
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
                                                $description = substr($project->description,0,140).'...';
                                            @endphp
                            
                                        <div class="media-body">
                                            <div class="mt-5 mt-sm-4 ml-5 title-obra">{{ $title }} </div>
                                            <br class="hidden-desktop">
                                            <div class="col-md-10 col-sm-10 col-12 px-0 description-obra">
                                                <span> {{ $description }} </span>
                                            </div>
                                            <div class="form-row">
                                                <div class="mt-4 form-group col-md-3 col-sm-3 col-6 ml-5 container-organismo-publico">
                                                    <span class="organismo-publico">{{$project->name_organization}}</span>
                                                </div>
                                                <div class="form-group mt-4 col-md-2 col-sm-3 col-6 container-btn">
                                                    <a href="{{ route('project-single', $project->id) }}" class="btn btn-sm btn-conoce-mas">
                                                        Conoce más
                                                    </a>
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
                            {{-- <b>{{$conta2}}</b> --}}
                            @if ($conta28>1)
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
                                                $description = substr($project->description,0,140).'...';
                                            @endphp
                            
                                        <div class="media-body">
                                            <div class="mt-5 mt-sm-4 ml-5 title-obra">{{ $title }} </div>
                                            <br class="hidden-desktop">
                                            <div class="col-md-10 col-sm-10 col-12 px-0 description-obra">
                                                <span> {{ $description }} </span>
                                            </div>
                                            <div class="form-row">
                                                <div class="mt-4 form-group col-md-3 col-sm-3 col-6 ml-5 container-organismo-publico">
                                                    <span class="organismo-publico">{{$project->name_organization}}</span>
                                                </div>
                                                <div class="form-group mt-4 col-md-2 col-sm-3 col-6 container-btn">
                                                    <a href="{{ route('project-single', $project->id) }}" class="btn btn-sm btn-conoce-mas">
                                                        Conoce más
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-11 d-flex justify-content-end align-items-baseline bg-red">
                                                <span class="porcentaje">{{$project->porcentaje_obra}}%</span>&nbsp;&nbsp;<span
                                                    style="color:white">completado</span>
                                            </div>
                                        </div>
                                    </div>
                                
                            @else
                            
                            @endif
                        @else
                        
                        @endif
                    @endforeach
                </div>
        </div>    
        <div class="row mb-5">
            <div class="col-lg-6">
                <a href="">
                    <div class="container-item d-flex justify-content-between align-items-center text-white">
                        <img src="{{ asset('assets/img/project/institucion.png') }}" class="img-fluid" width="36" alt="">
                        <strong>AYUNTAMIENTO DE TONALÁ</strong>
                        <img src="{{ asset('assets/img/project/flecha.png') }}" class="img-fluid icon-arrow" alt="">
                    </div>
                </a>
            </div>
                @php
                    $contar9=0;
                    $conta29=0;
                @endphp
                @foreach ($projects as $project)
                    
                        
                    @if ($project->id_organization==9)
                        @php
                            $contar9+=1;
                        @endphp
                        {{-- <b>{{$contar}}</b> --}}
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
                                                $description = substr($project->description,0,140).'...';
                                            @endphp
                            
                                        <div class="media-body">
                                            <div class="mt-5 mt-sm-4 ml-5 title-obra">{{ $title }} </div>
                                            <br class="hidden-desktop">
                                            <div class="col-md-10 col-sm-10 col-12 px-0 description-obra">
                                                <span> {{ $description }} </span>
                                            </div>
                                            <div class="form-row">
                                                <div class="mt-4 form-group col-md-3 col-sm-3 col-6 ml-5 container-organismo-publico">
                                                    <span class="organismo-publico">{{$project->name_organization}}</span>
                                                </div>
                                                <div class="form-group mt-4 col-md-2 col-sm-3 col-6 container-btn">
                                                    <a href="{{ route('project-single', $project->id) }}" class="btn btn-sm btn-conoce-mas">
                                                        Conoce más
                                                    </a>
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
                            {{-- <b>{{$conta2}}</b> --}}
                            @if ($conta29>1)
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
                                                $description = substr($project->description,0,140).'...';
                                            @endphp
                            
                                        <div class="media-body">
                                            <div class="mt-5 mt-sm-4 ml-5 title-obra">{{ $title }} </div>
                                            <br class="hidden-desktop">
                                            <div class="col-md-10 col-sm-10 col-12 px-0 description-obra">
                                                <span> {{ $description }} </span>
                                            </div>
                                            <div class="form-row">
                                                <div class="mt-4 form-group col-md-3 col-sm-3 col-6 ml-5 container-organismo-publico">
                                                    <span class="organismo-publico">{{$project->name_organization}}</span>
                                                </div>
                                                <div class="form-group mt-4 col-md-2 col-sm-3 col-6 container-btn">
                                                    <a href="{{ route('project-single', $project->id) }}" class="btn btn-sm btn-conoce-mas">
                                                        Conoce más
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-11 d-flex justify-content-end align-items-baseline bg-red">
                                                <span class="porcentaje">{{$project->porcentaje_obra}}%</span>&nbsp;&nbsp;<span
                                                    style="color:white">completado</span>
                                            </div>
                                        </div>
                                    </div>
                                
                            @else
                            
                            @endif
                        @else
                        
                        @endif
                    @endforeach
                </div>
        </div>  
        <div class="row mb-5">
            <div class="col-lg-6">
                <a href="">
                    <div class="container-item d-flex justify-content-between align-items-center text-white">
                        <img src="{{ asset('assets/img/project/institucion.png') }}" class="img-fluid" width="36" alt="">
                        <strong>AYUNTAMIENTO DE TLAJOMULCO de ZÚÑIGA</strong>
                        <img src="{{ asset('assets/img/project/flecha.png') }}" class="img-fluid icon-arrow" alt="">
                    </div>
                </a>
            </div>
                @php
                    $contar10=0;
                    $conta210=0;
                @endphp
                @foreach ($projects as $project)
                    
                        
                    @if ($project->id_organization==10)
                        @php
                            $contar10+=1;
                        @endphp
                        {{-- <b>{{$contar}}</b> --}}
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
                                                $description = substr($project->description,0,140).'...';
                                            @endphp
                            
                                        <div class="media-body">
                                            <div class="mt-5 mt-sm-4 ml-5 title-obra">{{ $title }} </div>
                                            <br class="hidden-desktop">
                                            <div class="col-md-10 col-sm-10 col-12 px-0 description-obra">
                                                <span> {{ $description }} </span>
                                            </div>
                                            <div class="form-row">
                                                <div class="mt-4 form-group col-md-3 col-sm-3 col-6 ml-5 container-organismo-publico">
                                                    <span class="organismo-publico">{{$project->name_organization}}</span>
                                                </div>
                                                <div class="form-group mt-4 col-md-2 col-sm-3 col-6 container-btn">
                                                    <a href="{{ route('project-single', $project->id) }}" class="btn btn-sm btn-conoce-mas">
                                                        Conoce más
                                                    </a>
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
                            {{-- <b>{{$conta2}}</b> --}}
                            @if ($conta210>1)
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
                                                $description = substr($project->description,0,140).'...';
                                            @endphp
                            
                                        <div class="media-body">
                                            <div class="mt-5 mt-sm-4 ml-5 title-obra">{{ $title }} </div>
                                            <br class="hidden-desktop">
                                            <div class="col-md-10 col-sm-10 col-12 px-0 description-obra">
                                                <span> {{ $description }} </span>
                                            </div>
                                            <div class="form-row">
                                                <div class="mt-4 form-group col-md-3 col-sm-3 col-6 ml-5 container-organismo-publico">
                                                    <span class="organismo-publico">{{$project->name_organization}}</span>
                                                </div>
                                                <div class="form-group mt-4 col-md-2 col-sm-3 col-6 container-btn">
                                                    <a href="{{ route('project-single', $project->id) }}" class="btn btn-sm btn-conoce-mas">
                                                        Conoce más
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-11 d-flex justify-content-end align-items-baseline bg-red">
                                                <span class="porcentaje">{{$project->porcentaje_obra}}%</span>&nbsp;&nbsp;<span
                                                    style="color:white">completado</span>
                                            </div>
                                        </div>
                                    </div>
                                
                            @else
                            
                            @endif
                        @else
                        
                        @endif
                    @endforeach
                </div>
        </div>  
        <div class="row mb-5">
            <div class="col-lg-6">
                <a href="">
                    <div class="container-item d-flex justify-content-between align-items-center text-white">
                        <img src="{{ asset('assets/img/project/institucion.png') }}" class="img-fluid" width="36" alt="">
                        <strong>AYUNTAMIENTO DE GUADALAJARA</strong>
                        <img src="{{ asset('assets/img/project/flecha.png') }}" class="img-fluid icon-arrow" alt="">
                    </div>
                </a>
            </div>
                @php
                    $contar7=0;
                    $conta27=0;
                @endphp
                @foreach ($projects as $project)
                    
                        
                    @if ($project->id_organization==7)
                        @php
                            $contar7+=1;
                        @endphp
                        {{-- <b>{{$contar}}</b> --}}
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
                                                $description = substr($project->description,0,140).'...';
                                            @endphp
                            
                                        <div class="media-body">
                                            <div class="mt-5 mt-sm-4 ml-5 title-obra">{{ $title }}  </div>
                                            <br class="hidden-desktop">
                                            <div class="col-md-10 col-sm-10 col-12 px-0 description-obra">
                                                <span> {{ $description }} </span>
                                            </div>
                                            <div class="form-row">
                                                <div class="mt-4 form-group col-md-3 col-sm-3 col-6 ml-5 container-organismo-publico">
                                                    <span class="organismo-publico">{{$project->name_organization}}</span>
                                                </div>
                                                <div class="form-group mt-4 col-md-2 col-sm-3 col-6 container-btn">
                                                    <a href="{{ route('project-single', $project->id) }}" class="btn btn-sm btn-conoce-mas">
                                                        Conoce más
                                                    </a>
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
                                                $description = substr($project->description,0,140).'...';
                                            @endphp
                            
                                        <div class="media-body">
                                            <div class="mt-5 mt-sm-4 ml-5 title-obra">{{ $title }} </div>
                                            <br class="hidden-desktop">
                                            <div class="col-md-10 col-sm-10 col-12 px-0 description-obra">
                                                <span> {{ $description }} </span>
                                            </div>
                                            <div class="form-row">
                                                <div class="mt-4 form-group col-md-3 col-sm-3 col-6 ml-5 container-organismo-publico">
                                                    <span class="organismo-publico">{{$project->name_organization}}</span>
                                                </div>
                                                <div class="form-group mt-4 col-md-2 col-sm-3 col-6 container-btn">
                                                    <a href="{{ route('project-single', $project->id) }}" class="btn btn-sm btn-conoce-mas">
                                                        Conoce más
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-11 d-flex justify-content-end align-items-baseline bg-red">
                                                <span class="porcentaje">{{$project->porcentaje_obra}}%</span>&nbsp;&nbsp;<span
                                                    style="color:white">completado</span>
                                            </div>
                                        </div>
                                    </div>
                                
                            @else
                            
                            @endif
                        @else
                        
                        @endif
                    @endforeach
                </div>
        </div> 
    </div>
       
        

        {{-- <div class="row mb-5">
            <div class="col-lg-5">
                <a href="">
                    <div class="container-item d-flex justify-content-between align-items-center text-white">
                        <img src="{{ asset('assets/img/project/institucion.png') }}" class="img-fluid" width="36" alt="">
                        <strong>Ayuntamiento de Zapopan</strong>
                        <img src="{{ asset('assets/img/project/flecha.png') }}" class="img-fluid icon-arrow" alt="">
                    </div>
                </a>
            </div>
        </div> --}}
    {{-- </div> --}}

</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function(){
    $("#hide2").on('click', function() {
        $("#content2").hide();
        $("#show2").show();
        $("#hide2").hide();

        return false;
    });
 
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