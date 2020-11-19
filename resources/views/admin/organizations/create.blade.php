@extends("admin.layouts.app")

@section('styles')
<link rel="stylesheet" href="{{asset('plugins/dropify/css/dropify.min.css')}}"/>


@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="background-color: white;">
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{route('organizations.index')}}">Organizaciones</a></li>
    <li class="breadcrumb-item active" aria-current="page">Registrar</li>
  </ol>
</nav>
<h1 class="h3 mb-4 text-gray-800">Registro de organización</h1>

@include('admin.layouts.partials.validation-error')
    
@include('admin.layouts.partials.session-flash-status')
<div class="row d-flex">


<div class="col-lg-6">

<div class="card shadow">
    <!-- Card Header - Accordion -->
    <a href="#collap1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collap1">
      <h6 class="m-0 font-weight-bold text-primary">Datos de la organización</h6>
    </a>
    <form method="post" action="{{route('organizations.store')}}"  enctype="multipart/form-data">
    @method('post')
    @include('admin.organizations._form')
</form>
      

      
      </div>

     
@endsection
@section('scripts')

<script src="{{asset('plugins/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('plugins/pages/dropify.js')}}"></script>

@endsection