@extends('admin.layouts.app')
@section('title')
Noticias
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
        <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Noticias</a></li>
        <li class="breadcrumb-item active" aria-current="page">Todos los registros</li>
    </ol>
</nav>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Noticias</h1>
    <a href="#modalPeridico" style="margin-left: 64%" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal">
        <i class="fas fa-plus fa-sm text-white-50"></i>
        Periódicos
    </a>
    <a href="#modalCreate" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal">
        <i class="fas fa-plus fa-sm text-white-50"></i>
        Nueva noticia
    </a>
</div>

@include('admin.layouts.partials.session-flash-status')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Noticias de la página</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Url periódico</th>
                        <th>Periódico</th>
                        <th>Estatus</th>
                        {{-- <th>Publicado</th> --}}
                        <th>Creado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $new)
                    <tr>
                        <td><small>{{ $new->title }}</small></td>
                        <td style="width: 160px;">
                            @if ( !empty( $new->url_periodico ) )
                            {{ $new->url_periodico }}
                            @else
                            <span class="badge badge-info">Sin url</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @php
                                $periodicos_r = DB::table('tbl_img')
                                ->select('tbl_img.*')
                                ->where('id','=',$new->id_img)
                                ->get(); 
                            @endphp
                            @if ( count($periodicos_r)==0 )
                                <span class="badge badge-info">Sin periódico </span> 
                            @else
                                @foreach ($periodicos_r as $periodicor)
                                    <img src="{{asset($periodicor->rutaimg)}}" width="30px" alt=""><br>
                                    <label for="">{{$periodicor->nombreperiodico}}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if ($new->status_news=='Publicado')
                                <span class="badge badge-success">{{$new->status_news}}</span>
                            @else
                                <span class="badge badge-dark">{{$new->status_news}}</span>
                            @endif
                            {{-- {{ $new->status_news }} --}}
                        </td>
                        <td style="font-size: 11px;">{{ $new->created_at->format('d-M-Y h:i A') }}</td>
                        <td>
                            <a href="{{ route('news.edit', $new->id) }}" class="btn btn-warning btn-circle btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{route('news.destroy',$new->id)}}" method="POST"
                                style="display:inline-block;" id="delete">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-danger btn-circle btn-sm btnDelete" value="x"
                                    data-id="{{$new->id}}" />
                            </form>
                        </td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal to new news --->
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
                <form method="POST" action="{{route('news.store')}}">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-4 mt-2" for="title">Título:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <label class="control-label col-sm-4 mt-2" for="title">Periódico</label>
                        <img src="" width="20px" alt="">
                        <div class="col-sm-12">
                            <select name="id_img" class="form-control" id="id_img">
                                <option value="">Seleccione un periódico</option>
                                @foreach ($periodicos as $periodico)
                                    <option value="{{$periodico->id}}">{{$periodico->nombreperiodico}}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" class="form-control" id="status_news" name="status_news" required> --}}
                        </div>
                        <label class="control-label col-sm-4 mt-2" for="title">Url periódico:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="url_periodico" name="url_periodico" required>
                        </div>
                        <label class="control-label col-sm-4 mt-2" for="title">Estatus</label>
                        <div class="col-sm-12">
                            <select name="status_news" class="form-control" id="status_news">
                                <option value="">Seleccione un estatus</option>
                                <option value="Pendiente">Pendiente</option>
                                <option value="Publicado">Publicado</option>
                            </select>
                            {{-- <input type="text" class="form-control" id="status_news" name="status_news" required> --}}
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

<div class="modal fade" id="modalPeridico" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title"><i class="fa fa-asterisk"></i> Nuevo periódico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <form method="POST" action="{{route('news.periodico')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="title">Título:</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="title" name="nombreperiodico" required>
                                </div>
                                <label class="control-label col-sm-12 mt-3" for="title">Imagen de periódico<br><small style="margin-left: 30px">Toma en cuenta la anchura de 230px y altura 100px</small></label>
                                
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" id="title" name="rutaimg" required>
                                </div>
                            </div>
                            <div class="modal-footer m-t-10">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Guardar</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <h5>
                            Periódicos registrados
                        </h5>
                        <div style="overflow-y:scroll; height: 200px;">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <th>#</th>
                                    <th>Periódico</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                   <tbody>
                                       @if (count($periodicos)==0)
                                           <center>no hay periódicos</center>
                                       @else
                                       <form action="" method="post">
                                           @foreach ($periodicos as $perio)
                                               <tr>
                                                   <td>{{$perio->id}}</td>
                                                   <td>{{$perio->nombreperiodico}}</td>
                                                   <td><img src="{{asset($perio->rutaimg)}}" width="25" alt=""></td>
                                                    <td>
                                                        
                                                        <form action="{{url('periodico-delete/'.$perio->id)}}" method="POST"
                                                            style="display:inline-block;" id="delete">
                                                            {{-- @method('DELETE') --}}
                                                            @csrf
                                                            <input type="submit" class="btn btn-danger btn-circle btn-sm btnDelete" value="x"
                                                                data-id="{{$perio->id}}" />
                                                        </form>
                                                    </td>
                                                </tr>
                                           @endforeach
                                        </form>
                                       @endif
                                   </tbody>
                                </tbody>
                            </table>
                        </div>
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