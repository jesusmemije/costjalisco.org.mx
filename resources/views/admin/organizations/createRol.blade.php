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
<div class="row">

<div class="col-lg-6">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nombre del rol de organizacións</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($roles as $rol)
              <tr>
                
                <td>{{ $rol->titulo}}</td>
             
                <td>
                <a class="btn btn-sm btn-warning shadow-sm" href="" data-toggle="modal" data-target="#deleteUserModal">
                    <i class="fas fa-edit fa-sm text-white-50"></i>
                    Editar
                  </a>
                  <button class="btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#deleteUserModal" data-id="{{ $rol->id }}" data-name="{{ $rol->titulo}}">
                    <i class="fas fa-trash fa-sm text-white-50"></i>
                    Eliminar
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>



</div>

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