@extends('admin.layouts.app')
@section('title')
Material de apoyo
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
        <li class="breadcrumb-item"><a href="{{ route('support-material') }}">Material de apoyo</a></li>
        <li class="breadcrumb-item active" aria-current="page">Todos los registros</li>
    </ol>
</nav>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Material de apoyo</h1>
   
    <a href="#modalCreate" data-know='nuevo' class="btn btn-sm btn-primary shadow-sm" data-toggle="modal">
        <i class="fas fa-plus fa-sm text-white-50"></i>
        Nuevo
    </a>
</div>

@include('admin.layouts.partials.session-flash-status')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Material de apoyo actual</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Url</th>
                        <th>Módulo</th>
                        
                        <th>Creado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materials as $material)
                    <tr>
                        <td style="font-weight:bold;"><small>{{ $material->titulo }}</small></td>
                        <td>
                        @if ( !empty( $material->descripcion) )
                            {{ $material->descripcion }}
                            @else
                            <span class="badge badge-info">Sin descripción</span>
                            @endif
                         </td>
                        <td style="width: 160px;">
                            @if ( !empty( $material->url) )
                            <a target="_blank" href="{{ $material->url }}">{{ $material->url }}</a>
                            
                            @else
                            <span class="badge badge-info">Sin url</span>
                            @endif
                        </td>
                        <td>
                        @if ( !empty( $material->modulo) )
                            {{ $material->modulo }}
                            @else
                            <span class="badge badge-info">Sin módulo</span>
                            @endif
                         </td>
                     
                        <td style="font-size: 11px;">{{ $material->created_at->format('d-M-Y h:i A') }}</td>
                        <td>
                            
                            <a class="btn btn-warning btn-circle btn-sm" href="#modalCreate"  data-id='{{$material->id}}' data-know='editar' data-titulo='{{$material->titulo}}' data-descripcion='{{$material->descripcion}}' data-url='{{$material->url}}' data-modulo='{{$material->modulo}}' data-toggle="modal" data-target="#modalCreate"><i class="fas fa-edit"></i></a>
                            <form action="{{route('materialdestroy',$material->id)}}" method="POST"
                                style="display:inline-block;" id="delete">
                                @method('POST')
                                @csrf
                                <input type="hidden" value="{{$material->id}}" name="id">
                                <input type="submit" class="btn btn-danger btn-circle btn-sm btnDelete" value="x"
                                    data-id="{{$material->id}}" />
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
                 
                <h5 class="modal-title" id="modal-title">Material de apoyo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="myform" method="POST" action="{{route('materialstore')}}">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name='id'  id="id" value="">
                        <label class="control-label col-sm-4 mt-2" for="titulo">Título:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                        </div>
                        <label class="control-label col-sm-4 mt-2" for="descripcion">Descripción</label>
                      
                        <div class="col-sm-12">
                           <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="4"></textarea>
                           
                        </div>
                        <label class="control-label col-sm-4 mt-2" for="url">Url del material:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="url" name="url" required>
                        </div>

                        <label class="control-label col-sm-4 mt-2" for="modulo">Subtítulo:</label>
                        <div class="col-sm-12">
                            
                            <textarea  rows="3" class="form-control" id="modulo" name="modulo"></textarea>
                        </div>
                        
                    </div>
                    <div class="modal-footer m-t-10">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btn-modal" class="btn btn-primary btn-sm"><i id="icon"></i><span id="f"></span></button>
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

<script>


window.onload = function() {

$('#modalCreate').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
   
    var action= button.data('know');
    var modal = $(this)
    if(action=='editar'){
       
        let titulo=button.data('titulo');
        modal.find('#id').val(button.data('id'));
        modal.find('#modal-title').text('Material de apoyo');
        modal.find('#titulo').val(titulo);
        modal.find('#descripcion').val(button.data('descripcion'));
        modal.find('#url').val(button.data('url'));
        modal.find('#modulo').val(button.data('modulo'));
     
        $('#icon').addClass('fas fa-edit');
        $('#f').text(' Actualizar')
        $("#myform").attr("action","{{route('materialedit')}}");
    }
    if(action=='nuevo'){
        let titulo=button.data('titulo');
      
        modal.find('#modal-title').text('Nuevo');

        modal.find('#descripcion').val();
        modal.find('#url').val();
        modal.find('#modulo').val();
        $('#icon').addClass('fas fa-save');
        $('#f').text(' Guardar')
       
    }


    //$('#test').val(label)

    //var modal = $(this)
  
   
})


}

</script>

@endsection