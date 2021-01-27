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
        @if (count($organizacion)==0)
            <div class="col-md-12">
                <center>Sin proyectos</center>
            </div>
        @else
            @foreach ($organizacion as $organiza)

                        <div class="row mb-5">
                            <div class="col-lg-5">
                                <a href="">
                                    <div class="container-item d-flex justify-content-between align-items-center text-white">
                                        <img src="{{ asset('assets/img/project/institucion.png') }}" class="img-fluid" width="36" alt="">
                                        <strong>{{$organiza->name}}</strong>
                                        <img src="{{ asset('assets/img/project/flecha.png') }}" class="img-fluid icon-arrow" alt="">
                                    </div>
                                </a>
                            </div>
                                @php
                                    $contar=0;
                                    $conta2=0;
                                @endphp
                                @foreach ($projects as $project)
                                    @php
                                        $contar+=1;
                                    @endphp
                                    {{-- <b>{{$contar}}</b> --}}
                                    @if ($contar<=2)
                                        @if ($organiza->id==$project->id_organization)
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
                                                                <span class="organismo-publico">Gobierno de Jalisco</span>
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
                                    @else
                                        <style>
                                            #content{
                                                display: none;
                                                /* background: red; */
                                            }
                                        </style>
                                    @endif
                                    @if ($contar==2)
                                        <div class="col-md-12">
                                            <button id="show" style="background: slategrey; color: #fff; padding: 2px 15px 2px 15px; float: right; margin: 7px; border-radius: 20px;">Ver mas</button>
                                        </div>
                                    @else
                                    @endif
                                @endforeach
                                <div style="margin-left: 3%;" class="col-md-12" id="content" style="">
                                @foreach ($projects as $project)
                                    @php
                                        $conta2+=1
                                    @endphp
                                        @php
                                            $conta2+=1;
                                        @endphp
                                        {{-- <b>{{$conta2}}</b> --}}
                                        @if ($conta2>2)
                                            @if ($organiza->id==$project->id_organization)
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
                                                                <span class="organismo-publico">Gobierno de Jalisco</span>
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
            @endforeach
        @endif
        

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
    </div>

</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function(){
    $("#hide").on('click', function() {
        $("#content").hide();
        return false;
    });
 
    $("#show").on('click', function() {
        $("#content").show();
        return false;
    });
});
</script>
@endsection