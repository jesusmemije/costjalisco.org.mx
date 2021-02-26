@extends("admin.layouts.app")
@section('title')
    Cátalogos
@endsection
@section('styles')
  <!-- Custom styles for this page -->
  <link href="{{asset("admin_assets/vendor/datatables/dataTables.bootstrap4.min.css")}}" rel="stylesheet">
<style>

.tablescroll{
  
  max-height: 300px;
  overflow: auto;
  display:inline-block;
  width: 100%;
  overflow-x: hidden;
}
  
</style>

@endsection
@section('content')

@section('breadcurrent')
Tipos de documentos
@endsection
@include('admin.catalogs.partials.breadcrumb')

<!-- Page Heading -->
@section('head')
Tipos de documentos
@endsection
@include('admin.catalogs.partials.head')       
<!-- Page Heading -->
<!-- errors -->
@include('admin.layouts.partials.validation-error')
@include('admin.layouts.partials.session-flash-status')
<!-- errors -->

  <!-- content -->
  <?php 
  $ruta = route('documenttype.store');
  $rutaedit = 'documenttype.update';
  $rutadestroy ='documenttype.destroy';
  ?>
  @section('ruta',$ruta)
  @section('data_title','Nuevo tipo de documento')
  @section('data_lbl','Nombre del tipo de documento')
  @section('data_btn','Guardar tipo de documento')

  @section('rutaedit',$rutaedit)
  @section('edit_title','Editar nombre del tipo de documento')
  @section('edit_labelbi','Tipo de documento')
  @section('edit_btn','Editar tipo de documento')

  @section('rutadestroy',$rutadestroy)
  @section('delete_labeltxt','tipo de documento:')

  @section('cardhead')
  Tipos de documento
  @endsection
  @include('admin.catalogs.partials.content')
  <!-- content -->
<!-- Modal para agregar un nuevo sector. --->  
@include('admin.catalogs.partials.modalnew')
<!--- Modal para editar -->
@include('admin.catalogs.partials.modaledit')  
<!-- Modal para eliminar -->
@include('admin.catalogs.partials.modaldelete')

@endsection

@section('scripts')
  
 <script src="{{asset('js/catalogsmodalsactive.js')}}"></script>

@endsection 