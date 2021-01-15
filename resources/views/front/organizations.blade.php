@extends('front.layouts.app')

@section('title')
    Organizaciones
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset("assets/css/organizations.css")}}">
@endsection

@section('content')

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
</div><br><br class="hidden-phone">

@endsection