@extends('admin.layouts.app')
@section('title')
Boletines
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
        <li class="breadcrumb-item"><a href="{{ route('newsletter.index') }}">Boletines</a></li>
        <li class="breadcrumb-item active" aria-current="page">Todos los registros</li>
    </ol>
</nav>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Boletines</h1>
    <a href="#modalCreate" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal">
        <i class="fas fa-plus fa-sm text-white-50"></i>
        Nuevo boletín
    </a>
</div>

@include('admin.layouts.partials.session-flash-status')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Boletines de la página</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Contenido</th>
                        <th>Fecha</th>
                        <th>Imagen</th>
                        <th>Estatus</th>
                        <th>Creado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($newsletter as $newletter)
                    <tr>
                        <td>{{ $newletter->title }}</td>
                        <td style="width: 160px;">
                            @if ( !empty( $newletter->content ) )
                            <a href="#modalContenido" class="btn btn-sm btn-info shadow-sm" data-toggle="modal">
                                <i class="fas fa-eyes fa-sm text-white-50"></i>
                                Ver
                            </a>
                            @else
                            <span class="badge badge-info">Sin contenido</span>
                            @endif
                        </td>
                        <td style="font-size: 11px;">
                            
                            @if ( !empty( $newletter->date ) )
                                @php
                                    setlocale(LC_TIME, "spanish");
                                    $mi_fecha = $newletter->date;
                                    $mi_fecha = str_replace("/", "-", $mi_fecha);			
                                    $Nueva_Fecha = date("d-M-Y", strtotime($mi_fecha));	
                                    $fecha_correcta = strftime("%d de %B de %Y", strtotime($Nueva_Fecha));

                                    // echo $Mes_Anyo;
                                @endphp
                                {{ $fecha_correcta }}
                            @else
                            <span class="badge badge-info">Sin fecha</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if ( !empty( $newletter->img_rute ) )
                            ver imagen
                            @else
                            <span class="badge badge-info">Sin imagen</span>
                            @endif
                        </td>
                        <td>
                            @if (!empty( $newletter->status ) )
                                <span class="badge badge-success">{{ $newletter->status }}</span>
                            
                            @else
                            <span class="badge badge-info">{{ $newletter->status }}</span>
                            @endif
                        </td>
                        
                        <td style="font-size: 11px;">
                                @php
                                    setlocale(LC_TIME, "spanish");
                                    $fecha_c = $newletter->created_at;
                                    $fecha_c = str_replace("/", "-", $fecha_c);			
                                    $Nueva_Fecha_c = date("d-M-Y", strtotime($fecha_c));	
                                    $fecha_created = strftime("%d de %B de %Y", strtotime($Nueva_Fecha_c));

                                    // echo $Mes_Anyo;
                                @endphp
                            {{ $fecha_created}}</td>
                        <td>
                            <a href="{{ route('newsletter.edit', $newletter->id) }}" class="btn btn-warning btn-circle btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{route('newsletter.destroy',$newletter->id)}}" method="POST"
                                style="display:inline-block;" id="delete">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-danger btn-circle btn-sm btnDelete" value="x"
                                    data-id="{{$newletter->id}}" />
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
                <form method="POST" action="{{route('newsletter.store')}}">
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

<div class="modal fade" id="modalContenido" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title"><i class="fa fa-asterisk"></i> Contenido de boletín</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{asset($newletter->img_rute)}}" width="150px" alt="">
                    </div>
                    <div class="col-md-7">
                        <b>{{$newletter->title}}</b>
                        <br>
                        <br>
                        <b>{{ $fecha_correcta }}</b>
                    </div>
                    <div class="col-md-12" style="word-wrap: break-word; text-align: justify;">
                        <br>
                        @php
                        echo $newletter->content;
                            
                        @endphp
                    </div>
                </div>

                
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