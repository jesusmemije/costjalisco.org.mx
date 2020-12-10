@extends("admin.layouts.app")
@section('content')
<style>

.content{
  background: purple !important;
}
.tablescroll{
  
  max-height: 400px;
  overflow: auto;
  display:inline-block;
  width: 100%;
  overflow-x: hidden;
}
</style>




<nav aria-label="breadcrumb" >
  <ol class="breadcrumb" >
    <li class="breadcrumb-item"><a  href="{{route('dashboard')}}"><i class="fas fa-fw fa-home"></i> Inicio</a></li>
    <li class="breadcrumb-item active"  aria-current="page"><a href="#">Rol de organizaciones</a></li>
  </ol>
</nav>

@include('admin.layouts.partials.validation-error')    
@include('admin.layouts.partials.session-flash-status')
<h1 class="h3 mb-4 text-gray-800">Nuevo rol de organización</h1>
<div class="row">

<?php 


?>
<div class="col-lg-6">
<div class="tablescroll">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nombre del rol de organización</th>
              <th>Descripción</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($roles as $rol)
              <tr>
                
                <td>{{ $rol->titulo}}</td>
                <td>{{$rol->descripcion}}</td>
             
                <td>
                <div class="form-row">

<div class="form-group" style="margin-right: 5px;">
<button data-title="Editar nombre del rol" data-description='{{$rol->descripcion}}' data-labeltxt='sector' data-labelbi='Rol' data-id='{{$rol->id}}' data-btn='Editar' data-toggle="modal" data-name='{{$rol->titulo}}' data-target="#modaleditData" data-route='{{route("organizations.updateRol")}}' data-target="#modaleditData" class="btn btn-sm btn-info shadow-sm">
  <i class="fas fa-edit fa-sm text-white-50"></i>
  
</button>

</div>

<div class="form-group">
<button class="btn btn-sm btn-dark shadow-sm" data-labeltxt='rol' data-id='{{$rol->id}}' data-btn='Guardar sector' data-toggle="modal" data-name='{{$rol->titulo}}' data-target="#deleteUserModal" data-route='{{route("organizations.destroyRol")}}'>
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
              <input required maxlength="100" type="text" class="form-control" name="title">

              <label>
                Descripción del rol
              </label>
              <textarea maxlength="300" class="form-control" cols="30" rows="6" name="description"></textarea>
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
          
          <label for="newtitulo">Nuevo nombre</label>
          <input required type="text" name="newtitulo" id="newname" class="form-control">
          <label for="description">Descripción</label>
          <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
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
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script>

window.onload = function() {
   
    
      $('#deleteUserModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var name = button.data('name')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

        name=name.replace(/,/g,' ')
        var action = button.data('route')
       $('#formDelete').attr('action', action)
       $('#delete_id').val(id);
       var label=button.data('labeltxt')
       
       
        $('#test').val(label)
      
        var modal = $(this)
        modal.find('.modal-title').text('Confirmar eliminación') 
        modal.find('.name-user').text(label+'   '+name)
      })

    
   

    $('#modaleditData').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var name = button.data('name')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      name=name.replace(/,/g,' ')
      var title=button.data('title')
      var description=button.data('description');
       
        var action = button.data('route')
       $('#formEdit').attr('action', action)
       $('#edit_id').val(id);
       var labelbi=button.data('labelbi');
       var label=button.data('labeltxt')
        var btn=button.data('btn');
        $('#labelbi').html(labelbi);
        $('#oldname').val(name);
        $('#description').html(description);
        $('#btnedit').html(btn)
    
      
        var modal = $(this)
        modal.find('.modal-title').text(title) 
       
      })
    }
    
  </script>

@endsection