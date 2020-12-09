@extends("admin.layouts.app")
@section('title')
    Proyectos
@endsection
@section('styles')
  <!-- Custom styles for this page -->
  <link href="{{asset("admin_assets/vendor/datatables/dataTables.bootstrap4.min.css")}}" rel="stylesheet">
@endsection
@section('content')




  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Proyectos</h1>
    <a href="{{ route('project.identificacion') }}" class="btn btn-sm btn-primary shadow-sm">
      <i class="fas fa-plus fa-sm text-white-50"></i>
       Registrar proyecto
    </a>
  </div>

  @include('admin.layouts.partials.session-flash-status')

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Proyectos registrados</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Título del proyecto</th>
              <th>Actualizado</th>
              <th>Estatus</th>
              
              <th>Presupuesto</th>
              <th>Autoridad Pública</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($projects as $project)
              <tr>
                <?php 
                

                switch($project->status){
                  case 1:
                    $status='Identificación';
                  break;
                  case 2:
                    $status="Preparación";
                  break;
                  case 3:
                    $status="Contratración";
                  break;
                  case 4:
                    $status="Ejecución";
                  break;
                  case 5:
                  $status="Finalizado";
                  break;
                  default:$status="";
                }


                ?>

          


                <td>{{ $project->title}}</td>
                <td>{{ $project->updated}}</td>
                <td>{{$status}}</td>
                <td>
                @if(!empty($project->budget_amount))
                {{ $project->budget_amount}}</td>
                @else
                <span class="badge badge-info">Sin presupuesto</span>
                @endif
                <td>{{ $project->orgname}}</td>
                <td>
                <a class="btn btn-sm btn-warning shadow-sm" href="{{route('project.editidentificacion',$project->id_project)}}">
                    <i class="fas fa-edit fa-sm text-white-50"></i>
                    Editar
                  </a>
                  <button class="btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#deleteUserModal" data-id="{{ $project->id_project}}" data-name="{{ $project->title }}">
                    <i class="fas fa-trash fa-sm text-white-50"></i>
                    Eliminar
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
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
          <p>¿Seguro que desea eliminar el proyecto  <strong><span class="name-user"></span></strong>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary shadow-sm" data-dismiss="modal">
            <i class="fas fa-times fa-sm text-white-50"></i>
            No, salir
          </button>
          <form id="formDelete" action="{{ route('project.destroy', 0) }}" data-action="{{ route('project.destroy', 0) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-sm btn-danger shadow-sm">
              <i class="fas fa-trash fa-sm text-white-50"></i>
              Si, eliminar
            </button>
            
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

        action = $('#formDelete').attr('data-action').slice(0, -1)
        action += id
        console.log(action)

        $('#formDelete').attr('action', action)

        var modal = $(this)
        modal.find('.modal-title').text('Confirmar eliminación') 
        modal.find('.name-user').text(name)
      })
    }
    
  </script>
@endsection