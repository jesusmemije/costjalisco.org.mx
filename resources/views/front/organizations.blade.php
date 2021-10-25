@extends('front.layouts.app')

@section('title')
    Organizaciones
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset("assets/css/organizations.css")}}">
@endsection

@section('content')
<!--Mostramos el titulo de sector público-->

<div class="container">
    <div class="row my">
        <div class="color1"></div>
        <div class="tlt">
            <h2 class="c1">Sector Público<h2>
        </div>
    </div>
    <!--En esta sección lo que se hace es crear una tabla-->
    <!---->
    <div class="row f">
        <table class="table col-md-12 table-bordered">
            <tr class="tr1">
                <th style="width: 10%;" class="hidden-phone"></th>
                <th class="th-institucion">
                    <img style="padding-right:4%; margin-bottom:2%;"
                        src="{{asset('assets/img/organizations/icon-inst.png')}}" height="30">
                    <span>Institución</span>
                </th>
                <th class="th-titular">
                    <img style="padding-right:4%; margin-bottom:2%;"
                        src="{{asset('assets/img/organizations/icon-u.png')}}" height="30"><br class="hidden-desktop">
                    Titular</th>
                <th class="th-enlace">
                    <img style="padding-right:4%; margin-bottom:2%;"
                        src="{{asset('assets/img/organizations/icon-u2.png')}}" height="30"><br class="hidden-desktop">
                    Enlace</th>
            </tr>

            @php
                $url = 'assets/img/home/sector-publico/';
                $counter = 0;
                $img_publico = array(
                    0 => 'jalisco.jpg',
                    1 => 'guadalajara.jpg',
                    2 => 'zapopan.jpg',
                    3 => 'tonala.jpg',
                    4 => 'tlajomulco.jpg ',
                    5 => 'itei.jpg',
                    6 => 'inai.jpg'
                );
            @endphp

            <tbody>
                @foreach($publicos as $data)
                <tr>
                    <td class="hidden-phone">
                        <img src="{{ asset( $url . $img_publico[$counter] ) }}" class="img-fluid" width="80" alt="">
                    </td>
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
                @php
                    $counter ++;
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    <!--Mostramos la tabla de sector académico-->
    <div class="row my2">
        <div class="color2"></div>
        <div class="tlt">
            <h2 class="c2">Sector Académico<h2>
        </div>
    </div>
    <div class="row f">
        <table class="table col-md-12 table-bordered">
            <tr class="tr2">
                <th style="width: 10%;" class="hidden-phone"></th>
                <th class="th-institucion">
                    <img style="padding-right:4%; margin-bottom:2%;"
                        src="{{asset('assets/img/organizations/icon-inst.png')}}" height="30">
                    <span>Institución</span>
                </th>
                <th class="th-titular">
                    <img style="padding-right:4%; margin-bottom:2%;"
                        src="{{asset('assets/img/organizations/icon-u.png')}}" height="30"><br class="hidden-desktop">
                    Titular</th>
                <th class="th-enlace">
                    <img style="padding-right:4%; margin-bottom:2%;"
                        src="{{asset('assets/img/organizations/icon-u2.png')}}" height="30"><br class="hidden-desktop">
                    Enlace</th>
            </tr>

            @php
                $url = 'assets/img/home/sector-academico/';
                $counter = 0;
                $img_academico = array(
                    0 => 'udg.jpg',
                    1 => 'iteso.jpg'
                );
            @endphp

            <tbody>
                @foreach($academicos as $data)
                <tr>
                    <td class="hidden-phone">
                        <img src="{{ asset( $url . $img_academico[$counter] ) }}" class="img-fluid" width="60" alt="">
                    </td>
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
                @php
                    $counter ++;
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    <!--Mostramos la tabla de sector privado-->
    <div class="row my3">
        <div class="color3"></div>
        <div class="tlt">
            <h2 class="c3">Sector Privado<h2>
        </div>
    </div>
    <div class="row f">
        <table class="table col-md-12 table-bordered">
            <tr class="tr3">
                <th style="width: 10%;" class="hidden-phone"></th>
                <th class="th-institucion">
                    <img style="padding-right:4%; margin-bottom:2%;"
                        src="{{asset('assets/img/organizations/icon-inst.png')}}" height="30">
                    <span>Institución</span>
                </th>
                <th class="th-titular">
                    <img style="padding-right:4%; margin-bottom:2%;"
                        src="{{asset('assets/img/organizations/icon-u.png')}}" height="30"><br class="hidden-desktop">
                    Titular</th>
                <th class="th-enlace">
                    <img style="padding-right:4%; margin-bottom:2%;"
                        src="{{asset('assets/img/organizations/icon-u2.png')}}" height="30"><br class="hidden-desktop">
                    Enlace</th>
            </tr>

            @php
                $url = 'assets/img/home/sector-privado/';
                $counter = 0;
                $img_privado = array(
                    0 => 'cmic.jpg',
                    1 => 'cicej.jpg',
                    2 => 'comce.jpg'
                );
            @endphp

            <tbody>
                @foreach($privados as $data)
                <tr>
                    <td class="hidden-phone">
                        <img src="{{ asset( $url . $img_privado[$counter] ) }}" class="img-fluid" alt="">
                    </td>
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
                @php
                    $counter ++;
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    <!--Mostramos la tabla de la sociedad civil organizada-->
    <div class="row my4">
        <div class="color4"></div>
        <div class="tlt">
            <h2 class="c4">Sociedad Civil Organizada<h2>
        </div>
    </div>
    <div class="row f">
        <table class="table col-md-12 table-bordered">
            <tr class="tr4">
                <th style="width: 10%;" class="hidden-phone"></th>
                <th class="th-institucion">
                    <img style="padding-right:4%; margin-bottom:2%;"
                        src="{{asset('assets/img/organizations/icon-inst.png')}}" height="30">
                    <span>Institución</span>
                </th>
                <th class="th-titular">
                    <img style="padding-right:4%; margin-bottom:2%;"
                        src="{{asset('assets/img/organizations/icon-u.png')}}" height="30"><br class="hidden-desktop">
                    Titular</th>
                <th class="th-enlace">
                    <img style="padding-right:4%; margin-bottom:2%;"
                        src="{{asset('assets/img/organizations/icon-u2.png')}}" height="30"><br class="hidden-desktop">
                    Enlace</th>
            </tr>

            @php
                $url = 'assets/img/home/sociedad-civil-organizada/';
                $counter = 0;
                $img_sociedad = array(
                    0 => 'cps.jpg',
                    1 => 'cimtra.jpg',
                    2 => 'mexico.jpg'
                );
            @endphp

            <tbody>
                @foreach($organizados as $data)
                <tr>
                    <td class="hidden-phone">
                        <img src="{{ asset( $url . $img_sociedad[$counter] ) }}" class="img-fluid" alt="">
                    </td>
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
                @php
                    $counter ++;
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>

     <!--Mostramos la tabla de Aliados Estratégicos-->

    <!--<div class="row my5">
        <div class="color5"></div>
        <div class="tlt">
            <h2 class="c5">Aliados Estratégicos<h2>
        </div>
    </div>
    <div class="row f">
        <table class="table col-md-12 table-bordered">
            <tr class="tr5">
                <th style="width: 12%;" class="hidden-phone"></th>
                <th class="th-institucion">
                    <img style="padding-right:4%; margin-bottom:2%;"
                        src="{{asset('assets/img/organizations/icon-inst.png')}}" height="30">
                    <span>Institución</span>
                </th>
                <th class="th-titular">
                    <img style="padding-right:4%; margin-bottom:2%;"
                        src="{{asset('assets/img/organizations/icon-u.png')}}" height="30"><br class="hidden-desktop">
                    Titular</th>
                <th class="th-enlace">
                    <img style="padding-right:4%; margin-bottom:2%;"
                        src="{{asset('assets/img/organizations/icon-u2.png')}}" height="30"><br class="hidden-desktop">
                    Enlace</th>
            </tr>

            @php
                $url = 'assets/img/home/aliados-estrategicos/';
                $counter = 0;
                $img_aliados = array(
                    0 => 'transversal.jpg'
                );
            @endphp

            <tbody>
                @foreach($estrategicos as $data)
                <tr>
                    <td class="hidden-phone">
                        <img src="{{ asset( $url . $img_aliados[$counter] ) }}" class="img-fluid" alt="">
                    </td>
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
                @php
                    $counter ++;
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>-->
    
</div><br><br class="hidden-phone">

@endsection