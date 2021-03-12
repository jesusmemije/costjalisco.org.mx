@extends('admin.layouts.app')
@section('title')
Editar boletín
@endsection
@section('styles')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection
@section('content')

<!-- Page Heading -->
<form action="{{ route('newsletter.update', $newsletter->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $newsletter->title }}</h1>
        <div>
            <a href="{{ route("newsletter.index") }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i>
                Regresar
            </a>
            <button type="submit" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-edit fa-sm text-white-50"></i>
                Actualizar
            </button>
        </div>
    </div>

    @include('admin.layouts.partials.session-flash-status')

    <div class="row">
        <div class="col-lg-12">
            <!-- Collapsable Card Data -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardData" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseCardData">
                    <h6 class="m-0 font-weight-bold text-primary">Datos del boletín</h6>
                </a>
                <!-- Card Data - Collapse -->
                <div class="collapse show" id="collapseCardData">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $newsletter->title) }}"
                                required>
                        </div>
                        {{-- <div class="form-group">
                            <label for="content">Contenido</label>
                            <input type="text" id="content" name="content" class="form-control" value="{{ old('content', $newsletter->content) }}"
                                required>
                        </div> --}}
                        <div class="row">
                            <div class="form-group col-md-6">
                                @php
                                    $newDate = date("d/m/Y h:i", strtotime($newsletter->date));
                                @endphp
                                <label for="img_rute">Fecha</label>
                                <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                                    <input type="datetime" name="date" class="form-control datetimepicker-input" data-target="#datetimepicker" value="{{ old('date',$newDate ) }}">
                                    <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status_news">Estatus: </label>
                                <select name="status" class="form-control" id="">
                                    @if ($newsletter->status=='Pendiente')
                                        <option value="Pendiente" selected>Pendiente</option>
                                        <option value="Publicado">Publicado</option>
                                    @elseif($newsletter->status=='Publicado')
                                        <option value="Publicado" selected>Publicado</option>
                                        <option value="Pendiente">Pendiente</option>
                                    @else
                                        <option value="">Seleccione un estatus</option>
                                        <option value="Publicado">Publicado</option>
                                        <option value="Pendiente">Pendiente</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        
                        
                        
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="created_at">Fecha de creación</label>
                                <input type="text" id="created_at" name="created_at" class="form-control"
                                    value="{{ old('created_at', $newsletter->created_at->format('d-M-Y h:i A') ) }}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="updated_at">Última modificación</label>
                                <input type="text" id="updated_at" name="updated_at" class="form-control"
                                    value="{{ old('updated_at', $newsletter->updated_at->format('d-M-Y h:i A') ) }}" disabled>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-5">
            <!-- Collapsable Card Content -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardContent" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseCardContent">
                    <h6 class="m-0 font-weight-bold text-primary">Imagen del boletín</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardContent">
                    <div class="card-body">
                        <img src="{{asset($newsletter->img_rute)}}" width="150px" alt="">
                        <input type="hidden" name="img_rute" value="{{$newsletter->img_rute}}">
                        <br>
                        <hr>
                        <label for="">Agrega una nueva imagen para el boletín</label>
                        <input type="file" id="img_rute_new" name="img_rute_new" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <!-- Collapsable Card Content -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardContent" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseCardContent">
                    <h6 class="m-0 font-weight-bold text-primary">Contenido del boletín</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardContent">
                    <div class="card-body" >
                        <textarea id="ckeditor_content" name="content">{{ $newsletter->content }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@section('scripts')
<!-- Call script ckeditor -->
<script src="{{asset("admin_assets/plugins/ckeditor/ckeditor.js")}}"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<script>
    CKEDITOR.replace( 'ckeditor_content', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

@endsection