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

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tipos de contrato</li>
  </ol>
</nav>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between">
    <h1 class="h3 mb-0 text-gray-800">Tipos de contrato</h1>
 
    
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
        <div class="form-group">
        <h6 class="m-0 font-weight-bold text-primary">Tipos de contrato</h6>
        </div>
        <div class="form-group offset-md-7">
          
        <button  id="newsubsector" data-labeltxt='tipo de proyecto'  data-lbl='Nombre del tipo de contrato' data-btn='Guardar tipo de contrato' class="btn btn-primary btn-sm" data-toggle="modal" data-title='Nuevo tipo de contrato' data-target="#modalnewData" data-route='{{route("contracttype.store")}}'  >
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
        @foreach($types as $tipo)
            <tr>


            <td>{{$tipo->titulo}}</td>

            <td>
     

<div class="offset-md-3">


<button data-title="Editar tipo de contrato" data-labeltxt='sector' data-labelbi='Tipo de contrato' data-id='{{$tipo->id}}' data-btn='Editar tipo de contrato' data-toggle="modal" data-name='{{$tipo->titulo}}' data-target="#modaleditData" data-route='{{route("contracttype.update",$tipo->id)}}' data-target="#modaleditData" class="btn btn-sm btn-info shadow-sm">
  <i class="fas fa-edit fa-sm text-white-50"></i>
  Editar
</button>




<button class="btn btn-sm btn-dark shadow-sm" data-labeltxt='tipo de contrato:' data-id='{{$tipo->id}}' data-toggle="modal" data-name='{{$tipo->titulo}}' data-target="#deleteUserModal" data-route='{{route("contracttype.destroy",$tipo->id)}}'>
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
  <!-- Page level plugins -->
  <script src="{{asset("admin_assets/vendor/datatables/jquery.dataTables.min.js")}}"></script>
  <script src="{{asset("admin_assets/vendor/datatables/dataTables.bootstrap4.min.js")}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset("admin_assets/js/demo/datatables-demo.js")}}"></script>

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

    
    }

    $('#modaleditData').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var name = button.data('name')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      name=name.replace(/,/g,' ')
      var title=button.data('title')
        var action = button.data('route')
       $('#formEdit').attr('action', action)
     
       var labelbi=button.data('labelbi');
       var label=button.data('labeltxt')
        var btn=button.data('btn');
        $('#labelbi').html(labelbi);
        $('#oldname').val(name);

        $('#edit_id').val(id);
        $('#btnedit').html(btn)
    
      
        var modal = $(this)
        modal.find('.modal-title').text(title) 
       
      })

    

    $('#modalnewData').on('show.bs.modal', function (event) {


  
      
      var button = $(event.relatedTarget)
      var title=button.data('title')
      
      var action = button.data('route')
      
      var lbl=button.data('lbl');
      $('#formnew').attr('action', action)
      $('#lbl').html(lbl);
      var modal = $(this)
      

      $('#btnsave').html(button.data('btn'));


      modal.find('.modal-title').text(title) 

    });
    
  </script>
@endsection 