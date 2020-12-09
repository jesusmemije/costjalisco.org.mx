@extends("admin.layouts.app")
@section('styles')
<link rel="stylesheet" href="{{asset('plugins/dropify/css/dropify.min.css')}}"/>
 <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,900|Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
<style>

  p{
    font-size:20px;
  }
</style>


@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#"><i class="fas fa-fw fa-home"></i> Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{route('organizations.index')}}">Organizaciones</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar</li>
  </ol>
</nav>
<h1 class="h3 mb-4 text-gray-800">Editar organización</h1>
@include('admin.layouts.partials.validation-error')
    
@include('admin.layouts.partials.session-flash-status')
<form method="post" action="{{route('organizations.update')}}" enctype="multipart/form-data">
<div class="row d-flex">


<div class="col-lg-6">

<div class="card shadow">
    <!-- Card Header - Accordion -->
    <a href="#collap1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collap1">
      <h6 class="m-0 font-weight-bold text-primary">Datos de la organización</h6>
    </a>
   
    @include('admin.organizations._form')

      
      
      </div>
      </form>

@endsection

@section('scripts')
<script src="{{asset('plugins/dropify/js/dropify.min.js')}}"></script>
<script>
  $('.dropify').dropify({
    messages: {
        'default': 'Arrastra y suelta tu imagen aquí o da un clic',
    }
  });
  
</script>

@endsection