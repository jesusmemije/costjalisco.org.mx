@extends('admin.layouts.app')
@section('title')
Eventos
@endsection
@section('styles')
<!-- Custom styles for this page -->
<link href="{{asset("admin_assets/vendor/datatables/dataTables.bootstrap4.min.css")}}" rel="stylesheet">
@endsection
@section('content')

<!-- Navigation -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-home"></i>
                Inicio</a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Eventos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Todos los registros</li>
    </ol>
</nav>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Eventos</h1>
    <a href="#modalCreate" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal">
        <i class="fas fa-plus fa-sm text-white-50"></i>
        Nuevo evento
    </a>
</div>

@include('admin.layouts.partials.session-flash-status')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Eventos de la página</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Lugar</th>
                        <th>Inicio</th>
                        <th>Contacto</th>
                        <th>Estatus</th>
                        <th>Creado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td style="width: 160px;">
                            @if ( !empty( $event->description ) )
                            {{ $event->description }}
                            @else
                            <span class="badge badge-info">Sin descripción</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if ( !empty( $event->location ) )
                            {{ $event->location }}
                            @else
                            <span class="badge badge-info">Sin localización</span>
                            @endif
                        </td>
                        <td>
                            @php
                                $newDate = date("d/m/Y h:i", strtotime($event->date_start));
                            @endphp
                            @if ( !empty( $event->date_start ) )
                            {{ $newDate }}
                            @else
                            <span class="badge badge-info">Sin fecha</span>
                            @endif
                        </td>
                        <td>
                            @if ( !empty( $event->contact ) )
                            {{ $event->contact }}
                            @else
                            <span class="badge badge-info">Sin contacto</span>
                            @endif
                        </td>
                        <td>
                            @if ( $event->status=='Publicado' )
                                <span class="badge badge-success">{{ $event->status }}</span>
                            
                            @else
                            <span class="badge badge-info">{{ $event->status }}</span>
                            @endif
                        </td>
                        <td style="font-size: 11px;">{{ $event->created_at->format('d-M-Y h:i A') }}</td>
                        <td>
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-circle btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{route('events.destroy',$event->id)}}" method="POST"
                                style="display:inline-block;" id="delete">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-danger btn-circle btn-sm btnDelete" value="x"
                                    data-id="{{$event->id}}" />
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal to new events --->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title"><i class="fa fa-asterisk"></i> Nuevo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('events.store')}}">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="title">Título:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                    </div>
                    <div class="modal-footer m-t-10">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Guardar</button>
                    </div>
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

<!-- CDN Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@endsection