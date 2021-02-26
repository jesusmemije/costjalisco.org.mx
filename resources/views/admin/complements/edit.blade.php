@extends('admin.layouts.app')
@section('title')
Editar complementos
@endsection
@section('styles')
<!-- Bootstrap toggle for checkbox -->
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<!-- DateTimePicker - Tempusdominius -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-PMjWzHVtwxdq7m7GIxBot5vdxUY+5aKP9wpKtvnNBZrVv1srI8tU6xvFMzG8crLNcMj/8Xl/WWmo/oAP/40p1g==" crossorigin="anonymous" />
@endsection
@section('content')

<!-- Page Heading -->
<form action="{{ route('complements.update', $complements[0]->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        {{-- <h1 class="h3 mb-0 text-gray-800">{{ $complements->title }}</h1> --}}
        <div>
            {{-- <a href="{{ route("complements.edit") }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i>
                Regresar
            </a> --}}
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
                            <label for="fecha_actualizacion">Fecha actualizacion del sitio</label>
                            @php
                                $originalf_a =  $complements[0]->fecha_actualizacion;
                                $newf_a = date("d/m/Y", strtotime($originalf_a));
                            @endphp
                            <input type="text" id="title" name="fecha_actualizacion" class="form-control" value="{{ old('fecha_actualizacion',$newf_a) }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="fecha_actualizacion">Año Cost</label>
                            @php
                                $originalanio = $complements[0]->anio;
                                $newanio = date("d/m/Y", strtotime($originalanio));
                            @endphp
                            <input type="text" id="description" name="anio" class="form-control"
                                value="{{ old('anio', $newanio) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="created_at">Fecha de creación</label>
                            @php
                                $originalcre = $complements[0]->created_at;
                                $newcre = date("d/m/Y", strtotime($originalcre));
                            @endphp
                            <input type="text" id="created_at" name="created_at" class="form-control"
                                value="{{ old('created_at', $newcre ) }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="updated_at">Última modificación</label>
                            @php
                                $originalupd = $complements[0]->updated_at;
                                $newupd = date("d/m/Y", strtotime($originalupd));
                            @endphp
                            <input type="text" id="updated_at" name="updated_at" class="form-control"
                                value="{{ old('updated_at',$newupd  ) }}" disabled>
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
<script src="{{asset("admin_assets/js/lib/moment.js")}}"></script>
<script src="{{asset("admin_assets/js/lib/moment-with-locales.js")}}"></script>
<!-- Script for DateTimePicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-2JBCbWoMJPH+Uj7Wq5OLub8E5edWHlTM4ar/YJkZh3plwB2INhhOC3eDoqHm1Za/ZOSksrLlURLoyXVdfQXqwg==" crossorigin="anonymous"></script>

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