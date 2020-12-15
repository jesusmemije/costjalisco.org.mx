@extends('front.layouts.app')
 
@section('title')
Projects-search
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
@endsection


@section('content')
<style>
    .formulario-projects-serach{
        background: rgb(255, 255, 255);
        padding: 20px 20px 5px 20px;
        border-radius: 0px 30px 0px 0px;
        /* position: absolute;  */
        /* float: left;  */
        /* z-index: 100; */
        width: 335px;
        box-shadow: 8px 5px 2px #999;
        /* top: 90px;
        left: 40px; */
    }
    
    .formulario-projects-serach select{
        width: 98%;
        height: 35px;
        margin-top: 13px;
        border-radius: 50px;
        padding: 5px 0px 5px 5px;
        font-size: 15px;
        font-weight: bold;
        color: darkslategrey;
    }
    .formulario-projects-serach input{
        width: 98%;
        height: 35px;
        margin-top: 13px;
        padding: 5px 0px 5px 9px;
        font-size: 15px;
        font-weight: bold;
        color: #628ea0;
        border: 1px solid #628ea0;
    }
    .formulario-projects-serach button{
        margin: 30px auto;
        background: rgb(206, 0, 0);
        color: #fff;
        border-radius: 50px;
        font-size: 15px;
        padding: 2px 30px 2px 30px;
        border: 0;
    }
    .formulario-projects-serach button:hover{
        background: rgb(182, 1, 1);
    }
    .fondo{
        background: #d9ebf3;
        padding: 120px;
    }
    
</style>

<div class="container-fluid pt-4">
    <!-- Section - Mapa de la localización -->
    <div class="row mt-5">
        <div class="col-md-8 background-title px-0 py-1">
            <h3 class="py-2 font-weight-bold" style="background-image: url('assets/img/newsletters/background-red.png'); background-repeat: no-repeat;
                background-size: cover;">
            <span style="font-weight: 700; margin-left: 115px;">Buscador</span>    
            </h3>
            
        </div>
    </div>
    <div class="row fondo mt-3">
        <div class="col-md-6">
            <br><br><br><br><br>
            <center>
                <img src="assets/img/login/Grupo928.png" width="50%" alt="">
            </center>
        </div>
        <div class="col-md-6 mt-4 mb-4">
            <form action="" class="formulario-projects-serach" method="post">
                <select name="" id="">
                    <option value="">Entidad o municipio</option>
                    <option value="">Opción 1</option>
                    <option value="">Opción 2</option>
                    <option value="">Opción 3</option>
    
                </select>
                <select name="" id="">
                    <option value="">Sector</option>
                    <option value="">Opción 1</option>
                    <option value="">Opción 2</option>
                    <option value="">Opción 3</option>
    
                </select>
                <select name="" id="">
                    <option value="">Subsector</option>
                    <option value="">Opción 1</option>
                    <option value="">Opción 2</option>
                    <option value="">Opción 3</option>
    
                </select>
                <select name="" id="">
                    <option value="">Agente Multisectorial</option>
                    <option value="">Opción 1</option>
                    <option value="">Opción 2</option>
                    <option value="">Opción 3</option>
    
                </select>
                <select name="" id="">
                    <option value="">C.P.</option>
                    <option value="">Opción 1</option>
                    <option value="">Opción 2</option>
                    <option value="">Opción 3</option>
    
                </select>
                <input type="text" value="Beneficiarios">
                <input type="text" value="Presupuesto">
                <center>
                    <button>BUSCAR</button>
                </center>
                <a href="#" style="float: right; color: #2C4143">X</a>

                <br>
            </form>
            
            
            {{-- <div class="col-md-12">
            </div> --}}
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection
