@extends('front.layouts.app')

@section('title')
Listado de obras
@endsection

@section('styles')

<style>
    .media {
        height: 310px;
    }
</style>

@endsection

@section('content')

<div class="container-fluid pt-4">
    <!-- Section - Datos generales -->
    <div class="row mt-3" id="datos-generales">
        <div class="col-md-6 background-title px-0 py-1" style="background-image: url('assets/img/titulo.png'); background-repeat: no-repeat;
        background-size: cover;">
            <span style="font-weight: 700; margin-left: 160px;">Listado de Obras</span>
        </div>
    </div>
    <div class="container">
        <div style="height:60px; border-left: 4px solid #2c4143; margin-top:3%; margin-bottom:3%;">
            <h3 style="padding-top:1%; padding-left:1%; font-weight: 700;">Sector Público</h3>
        </div>
    

    <div class="media" style="background-color: #d8d8cd;">
    <img src="{{ asset('assets/img/project/proyecto-2.jpg') }}" width="325" class="img-fluid" alt="">
  <div class="media-body">
    <h5 class="mt-5 ml-5" style="font-weight: 700;">LÍNEA 3 DEL TREN ELÉCTRICO DE GUADALAJARA</h5>
    <div class="col-md-10" style="text-align: justify; margin-left:4%; font-weight: 300;" >
    <span> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
    </span>
    </div>
    
    <div class="form-row">
    <div class="mt-4 form-group col-md-4 ml-5">
   <span style="color:gray; font-weight: 700;">Gobierno de Jalisco</span>
    </div>
   <div style="margin-left:34%; margin-bottom:4%;" class="form-group mt-4"><button class="btn btn-sm" style="background-color: #2c4143; color:white; border-radius:15px; width:130%; height:30px; box-shadow: 0px 6px 6px 0px gray;">Conoce más</button></div>
   
    </div>
  

   

    
    <div class="col-md-11 d-flex justify-content-end align-items-baseline" style="background-color: #d60000;" >
                            <span
                                style="font-size: 26px; font-weight: 700; color:white">100%</span>&nbsp;&nbsp;<span style="color:white">completado</span>
                        </div>

</div>
</div>


<div class="media" style="background-color: #d8d8cd; margin-top:2%;">
    <img src="{{ asset('assets/img/project/proyecto-2.jpg') }}" width="325" class="img-fluid" alt="">
  <div class="media-body">
    <h5 class="mt-5 ml-5" style="font-weight: 700;">REVESTIMIENTO Y SANEAMIENTO DEL CANAL DE AGUAS PLUAVIALES</h5>
    <div class="col-md-10" style="text-align: justify; margin-left:4%; font-weight: 300;" >
    <span> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
    </span>
    </div>
    
    <div class="form-row">
    <div class="mt-4 form-group col-md-4 ml-5">
   <span style="color:gray; font-weight: 700;">Ayuntamiento de Zapopan</span>
    </div>
   <div style="margin-left:34%; margin-bottom:4%;" class="form-group mt-4"><button class="btn btn-sm" style="background-color: #2c4143; color:white; border-radius:15px; width:130%; height:30px; box-shadow: 0px 6px 6px 0px gray;">Conoce más</button></div>
   
    </div>
  

   

    
    <div class="col-md-11 d-flex justify-content-end align-items-baseline" style="background-color: #d60000;" >
                            <span
                                style="font-size: 26px; font-weight: 700; color:white">100%</span>&nbsp;&nbsp;<span style="color:white">completado</span>
                        </div>

</div>
</div>

    
            

        @foreach ($projects as $project)

        <div class="media" style="background-color: #d8d8cd;  margin-top:2%;">
            <img src="{{ asset('assets/img/project/proyecto-2.jpg') }}" width="325" class="img-fluid" alt="">
            <div class="media-body">
                <h5 class="mt-5 ml-5" style="font-weight: 700;">{{ $project->title }}</h5>
                <div class="col-md-10" style="text-align: justify; margin-left:4%; font-weight: 300;">
                    <span> {{ $project->description }} </span>
                </div>
                <div class="form-row">
                    <div class="mt-4 form-group col-md-3 ml-5">
                        <span style="color:gray; font-weight: 700;">Gobierno de Jalisco</span>
                    </div>
                    <div style="margin-left:40%; margin-bottom:4%;" class="form-group mt-4">
                        <a href="{{ route('home.specific_project', $project->id) }}" class="btn btn-sm" style="background-color: #2c4143; color:white; border-radius:15px; width:130%; height:30px; box-shadow: 0px 6px 6px 0px gray;">
                            Conoce más
                        </a>
                    </div>
                </div>
                <div class="col-md-11 d-flex justify-content-end align-items-baseline"
                    style="background-color: #d60000;">
                    <span style="font-size: 26px; font-weight: 700; color:white">100%</span>&nbsp;&nbsp;<span
                        style="color:white">completado</span>
                </div>
            </div>
        </div>
        <br><br>

        @endforeach

    </div>
</div><br><br>

@endsection