@extends('front.layouts.app')
@section('title')
Organizaciones
@endsection

@section('content')

<style>
    .c1 {
        color: #2c4143;
        font-weight: bold;
    }

    .c2 {
        color: #d60000;
        font-weight: bold;
    }

    .c3 {
        color: #ffce32;
        font-weight: bold;
    }

    .c4 {
        color: #61a8bd;
        font-weight: bold;
    }

    .c5 {
        color: #d8d8cd;
        font-weight: bold;
    }


    .my {
        border-top: 1px solid #2c4143;
        border-left: 1px solid #2c4143;
        border-right: 1px solid #2c4143;
        margin-top: 4%;
        height: 100px;
    }

    .my2 {
        border-top: 1px solid #d60000;
        border-left: 1px solid #d60000;
        border-right: 1px solid #d60000;
        margin-top: 4%;
        height: 100px;
    }

    .my3 {
        border-top: 1px solid #ffce32;
        border-left: 1px solid #ffce32;
        border-right: 1px solid #ffce32;
        margin-top: 4%;
        height: 100px;
    }

    .my4 {
        border-top: 1px solid #61a8bd;
        border-left: 1px solid #61a8bd;
        border-right: 1px solid #61a8bd;
        margin-top: 4%;
        height: 100px;
    }

    .my5 {
        border-top: 1px solid #d8d8cd;
        border-left: 1px solid #d8d8cd;
        border-right: 1px solid #d8d8cd;
        margin-top: 4%;
        height: 100px;
    }

    .tlt {
        padding-left: 3.7%;
        padding-top: 3%;
    }

    .f {
        margin-left: 3%;
        margin-right: -1.5%;
    }

    .my2 {
        border-top: 1px solid #d60000;
        border-left: 1px solid #d60000;
        border-right: 1px solid #d60000;
        margin-top: 4%;
        height: 100px;
    }

    .table {
        height: auto;
    }

    .color1 {
        border-left: 5px solid #2c4143;
        margin-top: 4%;
    }

    .color2 {
        border-left: 5px solid #d60000;
        margin-top: 4%;
    }

    .color3 {
        border-left: 5px solid #ffce32;
        margin-top: 4%;
    }

    .color4 {
        border-left: 5px solid #61a8bd;
        margin-top: 4%;
    }

    .color5 {
        border-left: 5px solid #d8d8cd;
        margin-top: 4%;
    }

    .tr1 {
        background-image: url("assets/img/organizations/publico2.png");
        color: #fff;
        font-size: 1em;
    }

    .tr2 {
        background-image: url("assets/img/organizations/academico2.png");
        color: #fff;
        font-size: 1em;
    }

    .tr3 {
        background-image: url("assets/img/organizations/privado2.png");
        color: #fff;
        font-size: 1em;
    }

    .tr4 {
        background-image: url("assets/img/organizations/civil2.png");
        color: #fff;
        font-size: 1em;
    }

    .tr5 {
        background-image: url("assets/img/organizations/estrategico2.png");
        color: #fff;
        font-size: 1em;
    }

    th {
        text-align: center;
    }

    td {
        text-align: center;
    }
</style>

<div class="container">
    <div class="row my">
        <div class="color1"></div>
        <div class="tlt">
            <h2 class="c1">Sector Público<h2>
        </div>
    </div>
    <div class="row f">
        <table class="table col-md-12 table-bordered">
            <tr class="tr1">
                <th style="width: 35%;">
                    <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-inst.png"
                        height="30">
                    <span>Institución</span>
                </th>
                <th style="width: 30%;">
                    <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-u.png"
                        height="30">
                    Titular</th>
                <th style="width: 40%;">
                    <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-u2.png"
                        height="30">
                    Enlace</th>
            </tr>
            <tbody>
                @foreach($publicos as $data)
                <tr>
                    <td>
                        {{$data->institucion}}
                    </td>
                    <td>
                        <span style="font-weight:600">{{$data->titular}}</span>
                        <br>
                        <span style="font-style:italic; font-size:13px;">{{$data->titular_cargo}}</span>
                    </td>
                    <td>
                        <span style="font-weight:600"> {{$data->enlace}}</span>
                        <br>
                        <span style="font-style:italic; font-size:13px;">{{$data->enlace_cargo}}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row my2">
        <div class="color2"></div>
        <div class="tlt">
            <h2 class="c2">Sector Académico<h2>
        </div>
    </div>
    <div class="row f">
        <table class="table col-md-12 table-bordered">
            <tr class="tr2">
                <th style="width: 35%;">
                    <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-inst.png"
                        height="30">
                    <span>Institución</span>
                </th>
                <th style="width: 30%;">
                    <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-u.png"
                        height="30">
                    Titular</th>
                <th style="width: 40%;">
                    <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-u2.png"
                        height="30">
                    Enlace</th>
            </tr>
            <tbody>
                @foreach($academicos as $data)
                <tr>
                    <td>{{$data->institucion}}</td>
                    <td>
                        <span style="font-weight:600">{{$data->titular}}</span>
                        <br>
                        <span style="font-style:italic; font-size:13px;">{{$data->titular_cargo}}</span>
                    </td>
                    <td>
                        <span style="font-weight:600"> {{$data->enlace}}</span>
                        <br>
                        <span style="font-style:italic; font-size:13px;">{{$data->enlace_cargo}}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row my3">
        <div class="color3"></div>
        <div class="tlt">
            <h2 class="c3">Sector Privado<h2>
        </div>
    </div>
    <div class="row f">
        <table class="table col-md-12 table-bordered">
            <tr class="tr3">
                <th style="width: 35%;">
                    <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-inst.png"
                        height="30">
                    <span>Institución</span>
                </th>
                <th style="width: 30%;">
                    <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-u.png"
                        height="30">
                    Titular</th>
                <th style="width: 40%;">
                    <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-u2.png"
                        height="30">
                    Enlace</th>
            </tr>
            <tbody>
                @foreach($privados as $data)
                <tr>
                    <td>{{$data->institucion}}</td>
                    <td>
                        <span style="font-weight:600">{{$data->titular}}</span>
                        <br>
                        <span style="font-style:italic; font-size:13px;">{{$data->titular_cargo}}</span>
                    </td>
                    <td>
                        <span style="font-weight:600"> {{$data->enlace}}</span>
                        <br>
                        <span style="font-style:italic; font-size:13px;">{{$data->enlace_cargo}}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row my4">
        <div class="color4"></div>
        <div class="tlt">
            <h2 class="c4">Sociedad Civil Organizada<h2>
        </div>
    </div>
    <div class="row f">
        <table class="table col-md-12 table-bordered">
            <tr class="tr4">
                <th style="width: 35%;">
                    <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-inst.png"
                        height="30">
                    <span>Institución</span>
                </th>
                <th style="width: 30%;">
                    <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-u.png"
                        height="30">
                    Titular</th>
                <th style="width: 40%;">
                    <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-u2.png"
                        height="30">
                    Enlace</th>
            </tr>
            <tbody>
                @foreach($organizados as $data)
                <tr>
                    <td>{{$data->institucion}}</td>
                    <td>
                        <span style="font-weight:600">{{$data->titular}}</span>
                        <br>
                        <span style="font-style:italic; font-size:13px;">{{$data->titular_cargo}}</span>
                    </td>
                    <td>
                        <span style="font-weight:600"> {{$data->enlace}}</span>
                        <br>
                        <span style="font-style:italic; font-size:13px;">{{$data->enlace_cargo}}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row my5">
        <div class="color5"></div>
        <div class="tlt">
            <h2 class="c5">Aliados Estratégicos<h2>
        </div>
    </div>
    <div class="row f">
        <table class="table col-md-12 table-bordered">
            <tr class="tr5">
                <th style="width: 35%;">
                    <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-inst.png"
                        height="30">
                    <span>Institución</span>
                </th>
                <th style="width: 30%;">
                    <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-u.png"
                        height="30">
                    Titular</th>
                <th style="width: 40%;">
                    <img style="padding-right:4%; margin-bottom:2%;" src="assets/img/organizations/icon-u2.png"
                        height="30">
                    Enlace</th>
            </tr>
            <tbody>
                @foreach($estrategicos as $data)
                <tr>
                    <td>
                        {{$data->institucion}}
                    </td>
                    <td>
                        <span style="font-weight:600">{{$data->titular}}</span>
                        <br>
                        <span style="font-style:italic; font-size:13px;">{{$data->titular_cargo}}</span>
                    </td>
                    <td>
                        <span style="font-weight:600"> {{$data->enlace}}</span>
                        <br>
                        <span style="font-style:italic; font-size:13px;">{{$data->enlace_cargo}}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div><br><br>

@endsection