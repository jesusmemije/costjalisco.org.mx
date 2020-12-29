@extends('admin.layouts.app')
@section('title')
Editar noticia
@endsection
@section('styles')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection
@section('content')

<!-- Page Heading -->
<form action="{{ route('news.update', $news->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $news->title }}</h1>
        <div>
            <a href="{{ route("news.index") }}" class="btn btn-sm btn-primary shadow-sm">
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
                    <h6 class="m-0 font-weight-bold text-primary">Datos de la noticia</h6>
                </a>
                <!-- Card Data - Collapse -->
                <div class="collapse show" id="collapseCardData">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $news->title) }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="url_periodico">Url periódico</label>
                            <input type="text" id="url_periodico" name="url_periodico" class="form-control" value="{{ old('url_periodico', $news->url_periodico) }}"
                                required>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="id_img">Periódico</label>
                                <select name="id_img" class="form-control" id="id_img">
                                    <option value="">-Seleccione un periódico-</option>
                                    @foreach ($periodicos as $periodico)
                                        {{-- <option value="{{$periodico->id}}">{{$periodico->nombreperiodico}}</option> --}}
                                        <option value="{{$periodico->id}}"
                                            {{$periodico->id==$news->id_img ? 'selected' : 'Seleccione periódico'}}
                                            >{{$periodico->nombreperiodico}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status_news">Estatus: </label>
                                <select name="status_news" class="form-control" id="">
                                    @if ($news->status_news=='Pendiente')
                                        <option value="Pendiente" selected>Pendiente</option>
                                        <option value="Publicado">Publicado</option>
                                    @elseif($news->status_news=='Publicado')
                                        <option value="Publicado" selected>Publicado</option>
                                        <option value="Pendiente">Pendiente</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        
                        
                        
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="update_published">Fecha publicado: </label>
                                    @php
                                        $newDate = date("d-M-Y h:i A", strtotime($news->update_published));
                                    @endphp
                                <input type="text" id="update_published" name="update_published" class="form-control"
                                    value="{{ old('update_published', $newDate) }}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="created_at">Fecha de creación</label>
                                <input type="text" id="created_at" name="created_at" class="form-control"
                                    value="{{ old('created_at', $news->created_at->format('d-M-Y h:i A') ) }}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="updated_at">Última modificación</label>
                                <input type="text" id="updated_at" name="updated_at" class="form-control"
                                    value="{{ old('updated_at', $news->updated_at->format('d-M-Y h:i A') ) }}" disabled>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-7">
            <!-- Collapsable Card Content -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardContent" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseCardContent">
                    <h6 class="m-0 font-weight-bold text-primary">Contenido de la noticia</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardContent">
                    <div class="card-body">
                        <textarea id="ckeditor_content" name="content">{{ $news->content }}</textarea>
                    </div>
                </div>
            </div>
        </div> --}}
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

@php
    echo "<script>
        $('#published').bootstrapToggle( $news->published ? 'on' : 'off' )
    </script>";
@endphp

<script>
    $(function() {
        $('#published').change(function() {
            $('#published_hidden').val( $(this).prop('checked') ? '1' : '0' );
        })
    })
</script>

@endsection