@extends('front.layouts.app')

@section('title')
Nosotros
@endsection

@section('content')


    

  

    <!-- Title - Grupo multisectorial-->
    <div class="row mx-0">
        <div class="col-md-6 px-0 mt-2">
            <div class="text-center text-white">
                <h3 class="py-2 font-weight-bold title-barra-roja">Grupo Multisectorial</h3>
            </div>
        </div>
        <div class="col-md-6">
            <div class="line-red-center"></div>
        </div>
    </div>

    <!-- Section - Descripción Grupo multisectorial-->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7 line-red-vertical">
                <div class="mt-5" style="letter-spacing: -.2px;">
                    <p>
                        El Grupo Multisectorial "GMS" está conformado por instituciones de <br>
                        Gobierno, del sector privado, del sector académico y de la sociedad civil.
                    </p>
                    <p>
                        Este grupo, a través de los representantes de cada una de las <br>
                        instituciones que lo integra, es el responsable de guiar el desarrollo, la <br>
                        implementación y supervisión de la iniciativa de CoST en Jalisco.
                    </p>
                </div>
            </div>
            <div class="col-md-5 text-center">
                <a href="{{ route('organizations') }}">
                    <img src="{{ asset('assets/img/home/mas-info.png') }}" class="img-fluid" width="240" alt="">
                </a>
            </div>
        </div>
    </div>

    <!-- Section - Sector público-->
    <div class="container mt-5">
        <div style="border-left: 5px solid #2C4143;">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3 style="font-size: 30px; font-weight: 700; margin-left: 30px;">Sector Público
                    </h3>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-publico/jalisco.jpg') }}" class="img-fluid" width="100"
                        alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-publico/guadalajara.jpg') }}" class="img-fluid"
                        width="70" alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-publico/zapopan.jpg') }}" class="img-fluid" width="70"
                        alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-publico/tonala.jpg') }}" class="img-fluid" width="80"
                        alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-publico/inai.jpg') }}" class="img-fluid" width="100"
                        alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-publico/itei.jpg') }}" class="img-fluid" width="100"
                        alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Section - Sector Académico-->
    <div class="container mt-5">
        <div style="border-left: 5px solid #D60000;">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3 class="text-red" style="font-size: 30px; font-weight: 700; margin-left: 30px;">Sector Académico
                    </h3>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-academico/udg.jpg') }}" class="img-fluid" width="60"
                        alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-academico/iteso.jpg') }}" class="img-fluid" width="50"
                        alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Section - Sector Privado-->
    <div class="container mt-5">
        <div style="border-left: 5px solid #FFCE32;">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3 style="color: #FFCE32; font-size: 30px; font-weight: 700; margin-left: 30px;">Sector Privado
                    </h3>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-privado/cmic.jpg') }}" class="img-fluid" width="100"
                        alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-privado/cicej.jpg') }}" class="img-fluid" width="100"
                        alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sector-privado/comce.jpg') }}" class="img-fluid" width="100"
                        alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Section - Sociedad Civil Organizada-->
    <div class="container mt-5">
        <div style="border-left: 5px solid #61A8BD;">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3 style="color: #61A8BD; font-size: 30px; font-weight: 700; margin-left: 30px;">Sociedad Civil
                        Organizada</h3>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sociedad-civil-organizada/cps.jpg') }}" class="img-fluid"
                        width="100" alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sociedad-civil-organizada/cimtra.jpg') }}" class="img-fluid"
                        width="100" alt="">
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/img/home/sociedad-civil-organizada/mexico.jpg') }}" class="img-fluid"
                        width="120" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Section - Aliados Estratégicos-->
    <div class="container mt-5"  style="margin-bottom:5%">
        <div style="border-left: 5px solid #D8D8CD;">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3 style="color: #D8D8CD; font-size: 30px; font-weight: 700; margin-left: 30px;">Aliados
                        Estratégicos</h3>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-3 text-center">
                    <img src="{{ asset('assets/img/home/aliados-estrategicos/transversal.jpg') }}" class="img-fluid"
                        width="200" alt="">
                </div>
            </div>
        </div>
    </div>


    
</div>
@endsection

@section('scripts')

<script>
    function showEventosAgenda() {
    var eventosAgenda = document.getElementById("panel-oculto");
    if (eventosAgenda.style.display === "none") {
        eventosAgenda.style.display = "block";  
    } else {
        eventosAgenda.style.display = "none";        
    }
}

</script>
@endsection