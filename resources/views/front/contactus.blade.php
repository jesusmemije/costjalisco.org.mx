@extends('front.layouts.app')

<style>
    .container-fluid {
        background-color: #deedf1;
    }

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
    .inps textarea{
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
</style>
@section('content')

<div class="container-fluid">
    <div class="row">


        <div class="col-md-6 logo">

            <div class="inspecost">
                <img src="assets/img/login/Grupo928.png" alt="" height="230">
            </div>







        </div>


        <div class="form col-md-4">





            <div>
                <h4 style="text-align:center; margin-bottom:5%; margin-top:12%;">CONTACTO</h4>

                <form>
                    @csrf
                    <div class="inps">


                        <label for="name">Tu nombre</label>
                        <input id="name" name="name" type="text" class="form-control  form-control-sm" autofocus required>
                        <label for="email">Correo electrónico</label>
                        <input id="email" name="email"  type="email" class="form-control  form-control-sm" required>
                        <label placeholder="" for="asunto">Asunto</label>
                        <input id="asunto" name="asunto"  type="text" class="form-control  form-control-sm" required>
                        <label for="mensaje">Mensaje</label>                      
                        <textarea style="resize:none;" name="mensaje" id="mensaje" cols="30"  class="form-control"></textarea>

                    </div>



                    <div align="center">
                        <button class="btn sub" type="submit" style="font-weight:600; margin-top:14%; background-color:#2c4143; color:#fff;">ACEPTAR</button>
                    </div>

                </form>
            </div>

            @include('admin.layouts.partials.validation-error')
        </div>
    </div>
</div>



@endsection