
@csrf

  

    <div class="collapse show" id="collap1">
      <div class="card-body">
      <input type="hidden" name="id_organization" value="{{$organization->id_organization}}">

      <div class="form-row">
      <div class="form-group col-md-12">
        <label for="name">Nombre de la organización</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $organization->orgname) }}">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>
  
    <div class="form-row">
      <div class="form-group col-md-12">
      <label for="name">Rol de la organización</label>
      <select required name="partyRole" id="" class="form-control @error('partyRole') is-invalid @enderror">
        <option value="">Selecciona el rol</option>

@foreach($roles as $rol)

@if($rol->id==$organization->partyid)
<option selected value="{{$rol->id}}">{{$rol->titulo}}</option>
@else
<option value="{{$rol->id}}">{{$rol->titulo}}</option>
@endif

@endforeach

</select>
@error('partyRole')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
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
    <input required maxlength="255" type="text" name="nameContact" class="form-control @error('nameContact') is-invalid @enderror" value="{{ old('nameContact', $organization->name) }}">
    @error('nameContact')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
      </div>

      <div class="form-group col-md-6">
      <label>Email </label>
    <input required maxlength="50" type="text" name="emailContact" class="form-control @error('emailContact') is-invalid @enderror" value="{{ old('emailContact', $organization->email) }}">
    @error('emailContact')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror 
      </div> 
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
      <label>Télefono </label>
    <input required maxlength="50" type="text" name="telephone" class="form-control @error('telephone') is-invalid @enderror" value="{{ old('telephone', $organization->telephone) }}">
    @error('telephone')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
      </div>
      <div class="form-group col-md-6">
      <label>Número de Fax</label>
    <input required maxlength="50" type="text" name="faxNumber" class="form-control @error('faxNumber') is-invalid @enderror" value="{{ old('faxNumber', $organization->faxNumber) }}">
    @error('faxNumber')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
      </div>
    </div>

   
    <div class="form-row">
    <div class="form-group col-md-8">
      <label required maxlength="100" for="">URL</label>
    <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" value="{{ old('url', $organization->url) }}">
    @error('url')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
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
    <input required maxlength="50" type="text" name="streetAddress" class="form-control @error('streetAddress') is-invalid @enderror" value="{{ old('streetAddress', $organization->streetAddress) }}">
    @error('streetAddress')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
      </div>

      <div class="form-group col-md-4">
      <label>Localidad </label>
    <input required maxlength="50" type="text" name="locality" class="form-control @error('locality') is-invalid @enderror" value="{{ old('locality', $organization->locality) }}">
    @error('locality')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>
    
    <div class="form-group col-md-4">
      <label>Región </label>
    <input required maxlength="50" type="text" name="region" class="form-control @error('region') is-invalid @enderror" value="{{ old('region', $organization->region) }}">
    @error('region')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    
    </div>
    
</div>

    <div class="form-row">
    
      <div class="form-group col-md-4">
      <label>Código Postal </label>
    <input required maxlength="50" type="text" name="postalCode" class="form-control @error('postalCode') is-invalid @enderror" value="{{ old('postalCode', $organization->postalCode) }}">
    @error('postalCode')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
      </div>
      <div class="form-group col-md-6">
      <label>País</label>
    <input required maxlength="50" type="text" name="countryName" class="form-control @error('countryName') is-invalid @enderror" value="{{ old('countryName', $organization->countryName  ) }}">
    @error('countryName')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
      </div>
    </div>

 
   
    <div class="form-row">
    <div class="form-group col-md-12">
      <label for="">Descripción del lugar</label>
    <input required maxlength="100" type="text" name="description" class="form-control @error('description') is-invalid @enderror"  value="{{ old('description', $organization->description  ) }}">
    @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror

     <label for="imgOrg">Logotipo de la organización</label>
    
   
   
    <div class="cardfile" >
  <?php

  if(empty($ruta)){
    $ruta="";
  }else{
    $ruta=asset($ruta);
  }
  ?>

    <input type="file" name="imgOrg"  class="dropify"  data-height="200" data-default-file="<?php echo $ruta;  ?>" />
          
    </div>

      </div>
    </div>

</div>

<hr>

  
  
   
     
      
         
              
     
              
<div style="margin-bottom:2%" class="d-flex justify-content-center">

<a style="margin-right: 2%;" class="btn btn-sm btn-primary shadow-sm" href="{{route('organizations.index')}}">
 
Regresar</a>

@if(!$create)
<button type="submit" class="btn btn-sm btn-primary shadow-sm" >
<i class="fa fa-edit"></i>
    Editar
    </button>
@else
<button type="submit" class="btn btn-sm btn-primary shadow-sm">
<i class="fa fa-save"></i>
    Registrar
    </button>
@endif

</div> 
    
    