@extends("admin.layouts.app")
@section('title')
    Crear usuario
@endsection
@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Registrar usuario</h1>

<div class="row d-flex justify-content-center">
  <div class="col-md-8 col-sm-12">
    
    @include('admin.layouts.partials.validation-error')
    
    @include('admin.layouts.partials.session-flash-status')
    
    <form action="{{ route("users.store") }}" method="POST">
      @php
          $clt_create = true;
      @endphp
      @include('admin.users._form')
    </form>
  
  </div>
</div>

@endsection