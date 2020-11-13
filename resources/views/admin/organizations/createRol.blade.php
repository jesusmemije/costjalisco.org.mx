@extends("admin.layouts.app")


@section('content')
<style>

.content{
  background: purple !important;
}
</style>

@include('admin.layouts.partials.validation-error')    
@include('admin.layouts.partials.session-flash-status')
<h1 class="h3 mb-4 text-gray-800">Creando rol</h1>
<div class="row d-flex justify-content-center">
<div class="col-lg-6">

        <div class="card shadow mb-4">
          <!-- Card Header - Accordion -->
          <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
            <h6 class="m-0 font-weight-bold text-primary">Datos del nuevo rol</h6>
          </a>
          <!-- Card Content - Collapse -->
          <div class="collapse show" id="collapseCardExample1">
            <div class="card-body">
            <form method="post" action="{{route('organizations.storeRol')}}">

            @csrf
              <label>
                Título del nuevo rol
              </label>
              <input type="text" class="form-control" name="title">

              <label>
                Descripción del rol
              </label>
              <textarea class="form-control" cols="30" rows="6" name="description"></textarea>
              <br>
              <button type="submit" class="btn btn-sm btn-primary shadow-sm offset-lg-10">
                  Registrar
              </button>
              </form> 
            </div>
             
          </div>
        </div>
        
      </div>
      </div>

@endsection