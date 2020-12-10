@extends("admin.layouts.app")
@section('title')
    Cátalogos
@endsection
@section('styles')
  <!-- Custom styles for this page -->
  <link href="{{asset("admin_assets/vendor/datatables/dataTables.bootstrap4.min.css")}}" rel="stylesheet">
<style>

.tablescroll{
  
  max-height: 300px;
  overflow: auto;
  display:inline-block;
  width: 100%;
  overflow-x: hidden;
}
  
</style>

@endsection
@section('content')

@section('breadcurrent')
Tipos de estudios
@endsection
@include('admin.catalogs.partials.breadcrumb')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between">
    <h1 class="h3 mb-0 text-gray-800">Tipos de estudios</h1>
 
    
  </div>
  <hr>

       
  <!-- Page Heading -->
  
  
  @include('admin.layouts.partials.validation-error')

@include('admin.layouts.partials.session-flash-status')
  
  <!-- DataTales Example -->
  <div class="row">
    <div class="col-md-6">

    
  <div class="card shadow md-12">

    <div class="card-header py-3">
       <div class="form-row">
        <div class="form-group col-md-8">
        <h6 class="m-0 font-weight-bold text-primary">Estudios de impacto ambiental</h6>
        </div>
        <div class="form-group col-md-4 d-flex justify-content-end">
          
        <button  data-labeltxt='tipo de proyecto'   data-lbl='Nombre del estudio de impacto ambiental' data-btn='Guardar nombre de estudio' class="btn btn-primary btn-sm" data-toggle="modal" data-title='Nuevo nombre de estudio' data-target="#modalnewData" data-route='{{route("catalogs.saveestudioAmbiental")}}'  >
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
        Agregar nuevo
      </button>
</div>

      </div>
     
      
    </div>
    <div class="card-body">
      <div class="tablescroll">
        <table class="table table-bordered table-sm  table-hover" id=""  width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 50%;">Nombre del estudio</th>
              <th style="width: 10%;">Acciones</th>
             
             
            </tr>
          </thead>
          <tbody>
        @foreach($estudiosambiental as $estudio)
            <tr>


            <td>{{$estudio->titulo}}</td>

            <td>
            <div class="form-row">

<div class="form-group" style="margin-right: 5px; margin-left:15%;">
<button data-title="Editar estudio de impacto ambiental" data-labelbi='Nombre del estudio' data-labeltxt='sector' data-id='{{$estudio->id}}' data-btn='Editar estudio de impacto' data-toggle="modal" data-name='{{$estudio->titulo}}' data-target="#modaleditData" data-route='{{route("catalogs.editestudioAmbiental")}}' data-target="#modaleditData" class="btn btn-sm btn-info shadow-sm">
  <i class="fas fa-edit fa-sm text-white-50"></i>
  
</button>

</div>

<div class="form-group">
<button class="btn btn-sm btn-dark shadow-sm" data-labeltxt='estudio' data-id='{{$estudio->id}}' data-btn='Guardar sector' data-toggle="modal" data-name='{{$estudio->titulo}}' data-target="#deleteUserModal" data-route='{{route("catalogs.deleteestudioAmbiental")}}'>
  <i class="fas fa-trash fa-sm text-white-50"></i>
  
</button>

</div>

</div>

            </td>


            </tr>

        @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div>

    
<div class="card shadow">

  <div class="card-header py-3">
     <div class="form-row">
      <div class="form-group col-md-8">
      <h6 class="m-0 font-weight-bold text-primary">Estudios de impacto en el terreno</h6>
      </div>
      <div class="form-group col-md-4 d-flex justify-content-end">
        
      <button  data-labeltxt='tipo de proyecto'   data-lbl='Nombre del estudio de impacto ambiental' data-btn='Guardar nombre de estudio' class="btn btn-primary btn-sm" data-toggle="modal" data-title='Nuevo nombre de estudio' data-target="#modalnewData" data-route='{{route("catalogs.saveestudioImpacto")}}'  >
      <i class="fa fa-plus-circle" aria-hidden="true"></i>
      Agregar nuevo
    </button>
</div>

    </div>
   
    
  </div>
  <div class="card-body">
    <div class="tablescroll">
      <table class="table table-bordered table-sm  table-hover" id=""  width="100%" cellspacing="0">
        <thead>
          <tr>
            <th style="width: 50%;">Nombre del estudio</th>
            <th style="width: 10%;">Acciones</th>
           
           
          </tr>
        </thead>
        <tbody>
      @foreach($estudiosimpactoterreno as $estudio)
          <tr>


          <td>{{$estudio->titulo}}</td>

          <td>
          <div class="form-row">

<div class="form-group" style="margin-right: 5px; margin-left:15%;">
<button data-title="Editar estudio de impacto ambiental" data-labelbi='Nombre del estudio' data-labeltxt='sector' data-id='{{$estudio->id}}' data-btn='Editar estudio de impacto' data-toggle="modal" data-name='{{$estudio->titulo}}' data-target="#modaleditData" data-route='{{route("catalogs.editestudioImpacto")}}' data-target="#modaleditData" class="btn btn-sm btn-info shadow-sm">
<i class="fas fa-edit fa-sm text-white-50"></i>

</button>

</div>

<div class="form-group">
<button class="btn btn-sm btn-dark shadow-sm" data-labeltxt='estudio' data-id='{{$estudio->id}}' data-btn='Guardar sector' data-toggle="modal" data-name='{{$estudio->titulo}}' data-target="#deleteUserModal" data-route='{{route("catalogs.deleteestudioImpacto")}}'>
<i class="fas fa-trash fa-sm text-white-50"></i>

</button>

</div>

</div>

          </td>


          </tr>

      @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>

</div>

  </div>


  <div class="col-md-6">

    
  <div class="card shadow md-12">

    <div class="card-header py-3">
       <div class="form-row">
        <div class="form-group col-md-8">
        <h6 class="m-0 font-weight-bold text-primary">Estudios de factibilidad</h6>
        </div>
        <div class="form-group col-md-4 d-flex justify-content-end">
          
        <button  data-labeltxt='tipo de proyecto'   data-lbl='Nombre del estudio de impacto ambiental' data-btn='Guardar nombre de estudio' class="btn btn-primary btn-sm" data-toggle="modal" data-title='Nuevo nombre de estudio' data-target="#modalnewData" data-route='{{route("catalogs.saveestudioFactibilidad")}}'  >
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
        Agregar nuevo
      </button>
</div>

      </div>
     
      
    </div>
    <div class="card-body">
      <div class="tablescroll">
        <table class="table table-bordered table-sm  table-hover" id=""  width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 50%;">Nombre del estudio</th>
              <th style="width: 10%;">Acciones</th>
             
             
            </tr>
          </thead>
          <tbody>
        @foreach($estudiosfactibilidad as $estudio)
            <tr>


            <td>{{$estudio->titulo}}</td>

            <td>
            <div class="form-row">

<div class="form-group" style="margin-right: 5px; margin-left:15%;">
<button data-title="Editar estudio de impacto ambiental" data-labelbi='Nombre del estudio' data-labeltxt='sector' data-id='{{$estudio->id}}' data-btn='Editar estudio de impacto' data-toggle="modal" data-name='{{$estudio->titulo}}' data-target="#modaleditData" data-route='{{route("catalogs.editestudioFactibilidad")}}' data-target="#modaleditData" class="btn btn-sm btn-info shadow-sm">
  <i class="fas fa-edit fa-sm text-white-50"></i>
  
</button>

</div>

<div class="form-group">
<button class="btn btn-sm btn-dark shadow-sm" data-labeltxt='estudio' data-id='{{$estudio->id}}' data-btn='Guardar sector' data-toggle="modal" data-name='{{$estudio->titulo}}' data-target="#deleteUserModal" data-route='{{route("catalogs.deleteestudioFactibilidad")}}'>
  <i class="fas fa-trash fa-sm text-white-50"></i>
  
</button>

</div>

</div>

            </td>


            </tr>

        @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>

  </div>

  

    </div>

<!-- Modal para agregar un nuevo sector. --->
  
  <div class="modal fade" id="modalnewData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formnew" action="" method="POST">
        @csrf
        <label for="name" id="lbl"></label>
          <input required maxlength="100" type="text" name="titulo" id="name" class="form-control">
          <input type="hidden" id="name_sector" name="name_sector">
         
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Regresar</button>
        <button type="submit" class="btn btn-primary btn-sm" id="btnsave"></button>
        </form>
      </div>
    </div>
  </div>
</div>


<!--- Modal para editar -->


  
<div class="modal fade" id="modaleditData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formEdit" action="" method="POST">
        @csrf
        <label for="name" id="labelbi"></label>
          <input type="text" name="oldtitulo" id="oldname" class="form-control" readonly>
          
          <label for="">Nuevo nombre</label>
          <input maxlength="100" required type="text" name="newtitulo" id="newname" class="form-control">

          <input type="hidden" name="edit_id" id="edit_id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Regresar</button>
        <button type="submit" class="btn btn-primary btn-sm" id="btnedit"></button>
        </form>
      </div>
    </div>
  </div>
</div>
  

  <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Confirmar eliminación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>¿Seguro que desea eliminar el <strong><span class="name-user"></span></strong>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary shadow-sm" data-dismiss="modal">
            <i class="fas fa-times fa-sm text-white-50"></i>
            No, salir
          </button>
          <form id="formDelete" action="" data-action=" " method="POST">
            @method('POST')
            @csrf
            
            <button type="submit" class="btn btn-sm btn-danger shadow-sm">
              <i class="fas fa-trash fa-sm text-white-50"></i>
              Si, eliminar
            </button>
            <input type="hidden" name="delete_id" id="delete_id">
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
<script src="{{asset('js/catalogsmodalsactive.js')}}"></script>
@endsection 