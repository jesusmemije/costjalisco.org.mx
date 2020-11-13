@csrf
    <div class="collapse show" id="collap1">
      <div class="card-body">
      

      <div class="form-row">
      <div class="form-group col-md-12">
        <label for="name">Nombre de la organización</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $organization->orgname) }}">
      </div>
    </div>
  
    <div class="form-row">
      <div class="form-group col-md-12">
      <label for="name">Rol de la organización</label>
      <select name="partyRole" id="" class="form-control">
        <option value="">Selecciona el rol</option>

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
    <input type="text" name="nameContact" class="form-control" value="{{ old('nameContact', $organization->name) }}">
      </div>
      <div class="form-group col-md-6">
      <label>Email </label>
    <input type="text" name="emailContact" class="form-control" value="{{ old('emailContact', $organization->email) }}"> 
    
      </div>
      
    </div>

    <div class="form-row">
    
      <div class="form-group col-md-6">
      <label>Télefono </label>
    <input type="text" name="telephone" class="form-control" value="{{ old('telephone', $organization->telephone) }}">
      </div>
      <div class="form-group col-md-6">
      <label>Número de Fax</label>
    <input type="text" name="faxNumber" class="form-control" value="{{ old('faxNumber', $organization->faxNumber) }}">
      </div>
    </div>

   
    <div class="form-row">
    <div class="form-group col-md-8">
      <label for="">URL</label>
    <input type="text" name="url" class="form-control" value="{{ old('url', $organization->url) }}">
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
    <input type="text" name="streetAddress" class="form-control" value="{{ old('streetAddress', $organization->streetAddress) }}">
      </div>

      <div class="form-group col-md-4">
      <label>Localidad </label>
    <input type="text" name="locality" class="form-control" value="{{ old('locality', $organization->locality) }}">
    </div>
    
    <div class="form-group col-md-4">
      <label>Región </label>
    <input type="text" name="region" class="form-control" value="{{ old('region', $organization->region) }}">
    
    </div>
    
</div>

    <div class="form-row">
    
      <div class="form-group col-md-4">
      <label>Código Postal </label>
    <input type="text" name="postalCode" class="form-control" value="{{ old('postalCode', $organization->postalCode) }}">
      </div>
      <div class="form-group col-md-6">
      <label>País</label>
    <input type="text" name="countryName" class="form-control" value="{{ old('countryName', $organization->countryName  ) }}">
      </div>
    </div>

   
    <div class="form-row">
    <div class="form-group col-md-12">
      <label for="">Descripción del lugar</label>
    <input type="text" name="description" class="form-control" >
      </div>
    </div>
   

      </div>
    </div>

</div>
<hr>
<a class="btn btn-sm btn-primary shadow-sm" href="{{route('organizations.index')}}">Regresar</a>
<button type="submit" class="btn btn-sm btn-primary shadow-sm">
    Registrar
    </button>
        
      </div>
