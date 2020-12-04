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
Tipos de modalidades de contratación
@endsection
@include('admin.catalogs.partials.breadcrumb')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between">
    <h1 class="h3 mb-0 text-gray-800">Modalidad de contratación</h1>
 
    
  </div>
  <hr>
 
       
  <!-- Page Heading -->
  
  
  @include('admin.layouts.partials.validation-error')

@include('admin.layouts.partials.session-flash-status')
  
  <!-- DataTales Example -->
  <div class="row">
    <div class="col-md-8 offset-md-2">

    
  <div class="card shadow md-12">
    <div class="card-header py-3">
       <div class="form-row">
        <div class="form-group col-md-8">
        <h6 class="m-0 font-weight-bold text-primary">Modalidades de contratación</h6>
        </div>
        <div class="form-group col-md-4 d-flex justify-content-end">
          
        <button  id="newsubsector" data-labeltxt='tipo de proyecto'  data-lbl='Nombre del tipo de contratación' data-btn='Guardar tipo de contratación' class="btn btn-primary btn-sm" data-toggle="modal" data-title='Nuevo tipo de contratación' data-target="#modalnewData" data-route='{{route("contracting.store")}}'  >
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
              <th style="width: 20%;">Nombre</th>
              <th style="width: 20%;">Acciones</th>
             
             
            </tr>
          </thead>
          <tbody>
        @foreach($contracts as $tipo)
            <tr>


            <td>{{$tipo->titulo}}</td>

            <td>
     

<div class="offset-md-3">


<button data-title="Editar tipo de contratación" data-labeltxt='sector' data-labelbi='Tipo de contratación' data-id='{{$tipo->id}}' data-btn='Editar tipo de contratación' data-toggle="modal" data-name='{{$tipo->titulo}}' data-target="#modaleditData" data-route='{{route("contracting.update",$tipo->id)}}' data-target="#modaleditData" class="btn btn-sm btn-info shadow-sm">
  <i class="fas fa-edit fa-sm text-white-50"></i>
  Editar
</button>




<button class="btn btn-sm btn-dark shadow-sm" data-labeltxt='tipo de contratación:' data-id='{{$tipo->id}}' data-toggle="modal" data-name='{{$tipo->titulo}}' data-target="#deleteUserModal" data-route='{{route("contracting.destroy",$tipo->id)}}'>
  <i class="fas fa-trash fa-sm text-white-50"></i>
  Eliminar
</button>

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
          <input type="text" name="titulo" id="name" class="form-control">
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
        @method('put')
        @csrf
        <label for="name" id="labelbi"></label>
          <input type="text" name="oldtitulo" id="oldname" class="form-control" readonly>
          
          <label for="">Nuevo nombre</label>
          <input required type="text" name="newtitulo" id="newname" class="form-control">

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
          <h5 class="modal-title" id="ModalLabel"></h5>
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

            @method('delete')
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