@extends("admin.layouts.app")

@section('content')
<h1 class="h3 mb-4 text-gray-800">Editar organización</h1>
@include('admin.layouts.partials.validation-error')
    
@include('admin.layouts.partials.session-flash-status')
<div class="row d-flex">


<div class="col-lg-6">

<div class="card shadow">
    <!-- Card Header - Accordion -->
    <a href="#collap1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collap1">
      <h6 class="m-0 font-weight-bold text-primary">Datos de la organización</h6>
    </a>
    <form method="post" action="{{route('organizations.store')}}">
    @include('admin.organizations._form')
</form>
      
      
      </div>

@endsection