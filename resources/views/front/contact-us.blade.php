@extends('front.layouts.app')

@section('title')
    Contactanos
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset("assets/css/contact-us.css")}}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 logo hidden-phone">
            <div class="inspecost">
                <img src="assets/img/login/Grupo928.png" alt="" height="230">
            </div>
        </div>
        <div class="form col-md-4 col-12">
            <div>
                <h4 style="text-align:center; margin-bottom:5%; margin-top:12%; font-weight: bold;">CONTACTO</h4>
                <form>
                    @csrf
                    <div class="inps">
                        <label for="name">Tu nombre</label>
                        <input id="name" name="name" type="text" class="form-control  form-control-sm" autofocus
                            required>
                        <label for="email">Correo electrónico</label>
                        <input id="email" name="email" type="email" class="form-control  form-control-sm" required>
                        <label placeholder="" for="asunto">Asunto</label>
                        <input id="asunto" name="asunto" type="text" class="form-control  form-control-sm" required>
                        <label for="mensaje">Mensaje</label>
                        <textarea style="resize:none;" name="mensaje" id="mensaje" cols="30"
                            class="form-control"></textarea>
                    </div>
                    <div align="center">
                        <button class="btn sub" type="submit"
                            style="font-weight:600; margin-top:14%; background-color:#2c4143; color:#fff;">ACEPTAR</button>
                    </div>
                </form>
            </div>
            @include('admin.layouts.partials.validation-error')
        </div>
    </div>
</div>

@endsection