@extends("admin.layouts.app")
@section('title')
Usuarios
@endsection
@section('styles')
<!-- Custom styles for this page -->
<link href="{{asset("admin_assets/vendor/datatables/dataTables.bootstrap4.min.css")}}" rel="stylesheet">
@endsection
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-home"></i>
        Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
    <li class="breadcrumb-item active" aria-current="page">Todos los registros</li>
  </ol>
</nav>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
  <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-plus fa-sm text-white-50"></i>
    Nuevo usuario
  </a>
</div>

@include('admin.layouts.partials.session-flash-status')

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Usuarios del sistema</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Status</th>
            <th>Creación</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->email }}</td>
            <td class="text-center">
              @if ( $user->status == 'Activo' )
                <span class="badge badge-success">{{ $user->status }}</span>
              @else
                <span class="badge badge-danger">{{ $user->status }}</span>
              @endif
            </td>
            <td style="font-size: 11px;">{{ $user->created_at->format('d-M-Y h:i A') }}</td>
            <td>
              <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-circle btn-sm">
                <i class="fas fa-edit"></i>
              </a>
              <form action="{{route('users.destroy',$user->id)}}" method="POST" style="display:inline-block;" id="delete">
                @method('DELETE')
                @csrf
                <input type="submit" class="btn btn-danger btn-circle btn-sm btnDelete" value="x"
                    data-id="{{$user->id}}" />
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
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

<!-- CDN Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Archivo app.js -->
<script src="{{asset("js/app.js")}}"></script>

@endsection