@extends('front.layouts.app')

@section('title')
Listado de obras
@endsection

@section('styles')
<link href="{{asset("assets/css/list-projects.css")}}" rel="stylesheet">
@endsection

@section('content')

<div class="container-fluid pt-4 container-card">
    <!-- Section - Datos generales -->
    <div class="row mt-3" id="datos-generales" style="background: #fff">
        <div class="col-md-6 background-title bg-rojo px-0 py-1">
            <span class="topic">Listado de Obras</span>
        </div>
    </div>
    <div class="container mx-container">
        <div class="container-subtopic" id="sectorpublico">
            <h3 class="subtopic">Sector Público</h3>
        </div>

        @foreach ($projects as $project)

        <div class="media">
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

            <div class="media-body">
                <div class="mt-5 ml-5 title-obra">{{ $project->title }}</div>
                <br class="hidden-desktop">
                <div class="col-md-10 col-12 px-0 description-obra">
                    <span> {{ $project->description }} </span>
                </div>
                <div class="form-row">
                    <div class="mt-4 form-group col-md-3 col-6 ml-5 container-organismo-publico">
                        <span class="organismo-publico">Gobierno de Jalisco</span>
                    </div>
                    <div class="form-group mt-4 col-md-2 col-6 container-btn">
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
        <br><br>
        @endforeach
    </div>
</div>
<br class="hidden-phone"><br class="hidden-phone">

@endsection