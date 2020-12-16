@extends('front.layouts.app')
 
@section('title')
Boletines
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
@endsection


@section('content')
<div class="container-fluid pt-4">
    <!-- Section - Datos generales -->
    <div class="container">
        <style>
            
            
            .seccione-project{
                padding: 20px 0px 0px 0px; 
                border-top: 1px solid red; 
                border-left: 1px solid red; 
                border-right: 1px solid red;
                margin-top: 50px;
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
            .date{
                margin-top:3%; color:#fff; 
                padding: 1% 0px 1% 5%;
                margin-bottom:3%;
                background-repeat:no-repeat;
                background-image: url("{{asset('assets/img/newsletters/background-title - 2.png')}}");
            }
            .cont-boletin{
                padding-left: 70px;
                padding-right: 70px;
                padding-top: 0px;
                margin-bottom: 50px;

            }
            .ver-mas{
                float: right; 
                color: #2C4143; 
                font-weight: bold;
            }
            .ver-mas:hover{
                float: right; 
                color: #547477; 
                font-weight: bold;
            }
            .btn-tbl-link{
                background: #d9dbb9;
                width: 55px;
                height: 50px;
                font-weight: bold;
                border: 0px;
                font-size: 19px;
                color: #3e6b72;
                float: right;
            }
            .btn-tbl-link:hover{
                color: #274a50;
            }
            .contador{
                font-size: 19px;
                font-weight: bold;
                margin: 11px;
                float: right;
            }
            .mt4{
                margin-top: 100px;
            }
        </style>
        <div class="seccione-project">
            <div class="" style="border-left: 5px solid red; padding-left: 10px; " >
                <h3 class="my-4 py-0 font-weight-bold" style="padding: 0">
                <span style="font-weight: bold; margin-left: 10px; padding: 0; color: red;" ><b> Boletines</b></span>    
                </h3><br>
            </div>
        </div>
        <div class="row cont-boletin">
            <div class="col-md-5 px-0">
                <img src="{{ asset('assets/img/newsletters/foto.png') }}" style="width: 100%; height:265px;" alt="">
            </div> 
    
            <div class="media-body" style="background-color: #d8d8cd; margin-top:1%;">
    
                <div class="col-md-12" style="background-color:#628EA0; color:#fff; padding:6%;">
                    <span style="font-size:25px;">Transferencia y rendición de cuentas en infraestructura pública, promovida a través de iniciativa CoST e ITEI en el estado de Jalisco.</span>
                </div>
                <div class="col-md-12">
                    <div class="row ">
                        <div class="col-md-8 date">
                        15 de Octubre del 2020 
                        </div>
                        <div class="col-md-3 mt-4"><a href="{{route('newsletter-single')}}" class="ver-mas" ><i>Ver más >></i></a></div>
                    </div>
                </div>
    
            </div>
        </div>
        <div class="row cont-boletin">
            <div class="col-md-5 px-0">
                <img src="{{ asset('assets/img/newsletters/boletin2.jpg') }}" style="width: 100%; height:265px;" alt="">
            </div> 
    
            <div class="media-body" style="background-color: #d8d8cd; margin-top:1%;">
    
                <div class="col-md-12" style="background-color:#628EA0; color:#fff; padding:6%;">
                    <span style="font-size:25px;">Renueva Zapopan avenida Industria Textil en la colonia Altagracia</span>
                </div>
                <div class="col-md-12">
                    <div class="row ">
                        <div class="col-md-8 date">
                        15 de Noviembre del 2020 
                        </div>
                        <div class="col-md-3 mt-4"><a href="{{ route('newsletter-single') }}" class="ver-mas"><i>Ver más >></i></a></div>
                    </div>
                </div>
    
            </div>
        </div>
        <div class="row">
            <br><br>
            <div class="col-md-12 mt4">
                <button type="button" class="btn-tbl-link">></button>
                <span class="contador">1 de 1</span>
                <button type="button" class="btn-tbl-link"><</button>
            </div>
        </div>
    </div>
    <br><br><br><br>
</div>

@endsection

@section('scripts')
<script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

@endsection
