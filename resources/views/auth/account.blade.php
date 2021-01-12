@extends('front.layouts.app')

@section('title')
Crear cuenta
@endsection

@section('content')

<style>
    .form {
        height: 550px;
        border-top-right-radius: 30px;
        margin-top: 10%;
        background-color: #f7f7f7;
        margin-bottom: 10%;
        box-shadow: 6px 6px 0px 0px #a9b4b7;
    }

    .inps {
        padding-left: 10%;
    }

    .inps input {
        width: 80% !important;
        border-radius: 0px !important;
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

    .input-group-text {
        border: 1px solid #617882;
        border-right-color: rgb(0, 0, 0);
        border-right-style: solid;
        border-right-width: 1px;
    }

    .form-control {
        border-color: #617882;
    }

    .form-control:focus {
        border-color: #617882;
        box-shadow: none;
    }

    .input-group>.custom-select:not(:first-child),
    .input-group>.form-control:not(:first-child) {
        border-radius: 0;
    }

    body {
        background: #DEEDF1;
    }

    label {
        display: inline-block;
        margin-top: .8rem;
        margin-bottom: 0;
    }

    @media only screen and (max-width: 480px) {
        body {
            background: #F7F7F7;
        }

        .form {
            height: auto;
            border-top-right-radius: unset;
            background-color: #f7f7f7;
            margin-top: 0;
            margin-bottom: 0;
            box-shadow: unset;
        }
    }
    
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 logo hidden-phone">
            <div class="inspecost">
                <img src="assets/img/login/Grupo928.png" alt="" height="230">
            </div>
        </div>
        <div class="form col-md-4 col-12">
            <div>
                <h4 style="margin-bottom:5%; margin-top:12%; padding-left:10%; font-weight: 600;">CREA UNA NUEVA CUENTA
                </h4>
                <form>
                    @csrf
                    <div class="inps">
                        <label for="name">Tu nombre</label>
                        <input id="name" name="name" type="text" class="form-control  form-control-sm" autofocus
                            required>
                        <label for="email">Correo electrónico</label>
                        <input id="email" name="email" type="email" class="form-control  form-control-sm" required>
                        <label placeholder="" for="date">Fecha de nacimiento</label>
                        <input id="date" name="date" type="date" class="form-control  form-control-sm" required>
                        <label for="password">Contraseña</label>
                        <input id="password" name="password" type="password" class="form-control  form-control-sm"
                            required autocomplete="new-password">
                        <label for="password_confirmation">Repetir contraseña</label>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                            class="form-control  form-control-sm" required autocomplete="new-password">
                    </div>
                    <div align="center">
                        <button class="btn sub" type="submit"
                            style="font-weight:600; margin-top:5%; background-color:#2c4143; color:#fff;">ACEPTAR</button>
                    </div>
                </form>
            </div>
            @include('admin.layouts.partials.validation-error')
        </div>
    </div>
</div>

@endsection