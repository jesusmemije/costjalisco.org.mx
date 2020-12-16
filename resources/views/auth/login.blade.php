@extends('front.layouts.app')

@section('title')
Login
@endsection

@section('content')

<style>
    .container-fluid {
        background-color: #deedf1;
        margin-top: 2%;
    }

    .form {
        height: 550px;
        border-top-right-radius: 30px;
        margin-top: 10%;
        background-color: #f7f7f7;
        margin-bottom: 10%;
        box-shadow: 6px 6px 0px 0px #a9b4b7;
        justify-content: center;
    }

    .form a {
        color: black;
    }

    .inp {
        width: 70% !important;
        border-radius: 0px !important;
        margin-bottom: 8%;
    }

    .logo {
        margin-top: 10%;
        height: 400px;
    }

    .sub {
        width: 50%;
        border-radius: 100px !important;
    }

    .nc {
        padding-left: 20%;
        padding-top: 12%;
    }

    .inspecost {
        margin-top: 30%;
        margin-left: 45%;
        width: 40%;
        height: 40%;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 logo">
            <div class="inspecost">
                <img src="assets/img/login/Grupo928.png" alt="" height="230">
            </div>
        </div>

        <div class="form col-md-4">
            <div class="nc">
                <a href="{{route('account')}}" style="color:#5e6e70;">crea una nueva cuenta</a>
            </div>
            <div align="center">
                <h4 style="margin-bottom:15%; margin-top:12%">INICIA SESIÓN</h4>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group inp">
                        <span class="input-group-append" style="background-color:#fff;">
                            <div class="input-group-text bg-transparent" style="border-right: 0;"><span class='icon'>
                                    <img src="assets/img/login/inp1.png" height="20" alt=""></div>
                        </span>
                        <input placeholder="jonhsmit@mail.com" style="border-left: 0" name="email" type="email" class="form-control @error('email') is-invalid @enderror" required autofocus>

                    </div>
                    <div class="input-group inp">
                        <span class="input-group-append" style="background-color:#fff;">
                            <div class="input-group-text bg-transparent" style="border-right: 0;"><img src="assets/img/login/inp2.png" height="20" alt="">
                            </div>
                        </span>
                        <input placeholder="**********" style="border-left: 0" name="password" class="form-control inp  @error('email') is-invalid @enderror" type="password" required autocomplete="current-password">
                    </div>
                    @error('email')
                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}</div>
                    @enderror
                    <a style="color: #9a9a9a;" href="{{ route('password.request') }}">¿olvidaste la contraseña?</a><br>
                    <a style="color: #9a9a9a;" href="">¿no eres miembro aún?</a><br>
                    <button class="btn sub" type="submit" style="font-weight:600; margin-top:5%; background-color:#2c4143; color:#fff;">ACEPTAR</button>
                </form>
            </div>


        </div>
    </div>
</div>

@endsection