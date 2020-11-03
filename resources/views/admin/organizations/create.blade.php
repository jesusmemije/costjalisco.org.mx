@extends("admin.layouts.app")


@section('content')
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
    <form method="post" action="{{route('organizations.store')}}">
    @csrf
    <div class="collapse show" id="collap1">
      <div class="card-body">
      

      <div class="form-row">
      <div class="form-group col-md-12">
        <label for="name">Nombre de la organización</label>
        <input type="text" name="name" class="form-control">
      </div>
    </div>
  
    <div class="form-row">
      <div class="form-group col-md-12">
      <label for="name">Rol de la organización</label>
      <select name="partyRole" id="" class="form-control">

@foreach($roles as $rol)
<option value="{{$rol->id}}">{{$rol->titulo}}</option>
@endforeach

</select>
      </div>
    </div>


    

   

 

      </div>
    </div>

</div>
<hr>
<div class="card shadow">
    <!-- Card Header - Accordion -->
    <a href="#collap3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collap3">
      <h6 class="m-0 font-weight-bold text-primary">Datos de contacto</h6>
    </a>

    <div class="collapse show" id="collap3">
      <div class="card-body">
      

    
    <div class="form-row">
      <div class="form-group col-md-6">
      <label>Nombre </label>
    <input type="text" name="nameContact" class="form-control">
      </div>
      <div class="form-group col-md-6">
      <label>Email </label>
    <input type="text" name="emailContact" class="form-control">
    
      </div>
      
    </div>

    <div class="form-row">
    
      <div class="form-group col-md-6">
      <label>Télefono </label>
    <input type="text" name="telephone" class="form-control">
      </div>
      <div class="form-group col-md-6">
      <label>Número de Fax</label>
    <input type="text" name="faxNumber" class="form-control">
      </div>
    </div>

   
    <div class="form-row">
    <div class="form-group col-md-8">
      <label for="">URL</label>
    <input type="text" name="url" class="form-control">
      </div>
    </div>
   

      </div>
    </div>

</div>
        
      </div>

      <div class="col-lg-6">

<div class="card shadow">
    <!-- Card Header - Accordion -->
    <a href="#collap2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collap2">
      <h6 class="m-0 font-weight-bold text-primary">Ubicación de la organización</h6>
    </a>

    <div class="collapse show" id="collap2">
      <div class="card-body">
      

    
    <div class="form-row">
      <div class="form-group col-md-4">
      <label>Calle </label>
    <input type="text" name="streetAddress" class="form-control">
      </div>

      <div class="form-group col-md-4">
      <label>Localidad </label>
    <input type="text" name="locality" class="form-control">
    </div>
    
    <div class="form-group col-md-4">
      <label>Región </label>
    <input type="text" name="region" class="form-control">
    
    </div>
    
</div>

    <div class="form-row">
    
      <div class="form-group col-md-4">
      <label>Código Postal </label>
    <input type="text" name="postalCode" class="form-control">
      </div>
      <div class="form-group col-md-6">
      <label>País</label>
    <input type="text" name="countryName" class="form-control">
      </div>
    </div>

   
    <div class="form-row">
    <div class="form-group col-md-12">
      <label for="">Descripción del lugar</label>
    <input type="text" name="description" class="form-control">
      </div>
    </div>
   

      </div>
    </div>

</div>
<hr>
<button type="submit" class="btn btn-sm btn-primary shadow-sm">
    Registrar
    </button>
        
      </div>

</form>
      
      
      </div>

@endsection