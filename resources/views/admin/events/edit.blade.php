@extends('admin.layouts.app')
@section('title')
Editar evento
@endsection
@section('styles')
<!-- Bootstrap toggle for checkbox -->
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<!-- DateTimePicker - Tempusdominius -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-PMjWzHVtwxdq7m7GIxBot5vdxUY+5aKP9wpKtvnNBZrVv1srI8tU6xvFMzG8crLNcMj/8Xl/WWmo/oAP/40p1g==" crossorigin="anonymous" />
@endsection
@section('content')

<!-- Page Heading -->
<form action="{{ route('events.update', $event->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $event->title }}</h1>
        <div>
            <a href="{{ route("events.index") }}" class="btn btn-sm btn-primary shadow-sm">
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
        <div class="col-lg-6">
            <!-- Collapsable Card Data -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardData" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseCardData">
                    <h6 class="m-0 font-weight-bold text-primary">Datos del evento</h6>
                </a>
                <!-- Card Data - Collapse -->
                <div class="collapse show" id="collapseCardData">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $event->title) }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <input type="text" id="description" name="description" class="form-control"
                                value="{{ old('description', $event->description) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="created_at">Fecha de creación</label>
                            <input type="text" id="created_at" name="created_at" class="form-control"
                                value="{{ old('created_at', $event->created_at->format('d-M-Y h:i A') ) }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="updated_at">Última modificación</label>
                            <input type="text" id="updated_at" name="updated_at" class="form-control"
                                value="{{ old('updated_at', $event->updated_at->format('d-M-Y h:i A') ) }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Collapsable Card -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardContent" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseCardContent">
                    <h6 class="m-0 font-weight-bold text-primary">Contenido del evento</h6>
                </a>
                <!-- Card - Collapse -->
                <div class="collapse show" id="collapseCardContent">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="location">Lugar</label>
                            <input type="text" id="location" name="location" class="form-control" value="{{ old('location', $event->location) }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="date_start">Fecha y hora de inicio</label>
                            <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                                <input type="text" name="datetimepicker" class="form-control datetimepicker-input" data-target="#datetimepicker">
                                <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cover_image">Imagen de fondo: </label>
                            <input type="file" id="cover_image" class="form-control" name="cover_image">
                        </div>
                        <div class="form-group">
                            <label for="status">Estatus: </label>
                            <input type="checkbox" id="status" data-toggle="toggle" data-on="<i class='fa fa-check'></i> Activo" data-off="Inactivo" data-onstyle="success" data-offstyle="dark">
                            <input type="hidden" id="status_hidden" name="status" value="{{ $event->status }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@section('scripts')
<!-- Script for Bootrap Toggle -->
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<!-- Moment for DateTimePicker-->
<script src="{{asset("js/moment.js")}}"></script>
<script src="{{asset("js/moment-with-locales.js")}}"></script>
<!-- Script for DateTimePicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-2JBCbWoMJPH+Uj7Wq5OLub8E5edWHlTM4ar/YJkZh3plwB2INhhOC3eDoqHm1Za/ZOSksrLlURLoyXVdfQXqwg==" crossorigin="anonymous"></script>

@php
    echo "<script>
        $('#status').bootstrapToggle( $event->status ? 'on' : 'off' )
    </script>";
@endphp

<script>
    $(function() {
        $('#status').change(function() {
            $('#status_hidden').val( $(this).prop('checked') ? '1' : '0' );
        })
    })
</script>

<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
            locale: 'es',
            defaultDate: "12/01/2020",
            format: 'DD/MM/yyyy hh:mm',
            pick12HourFormat: false,
            icons: {
                time: "fas fa-clock"
            },
            showToday: true,
            showClear: true,
            showClose: true
        });
    });
</script>

@endsection