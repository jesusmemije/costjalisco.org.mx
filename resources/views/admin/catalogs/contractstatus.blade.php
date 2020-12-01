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
Estados de un contrato
@endsection
@include('admin.catalogs.partials.breadcrumb')

<!-- Page Heading -->
@section('head')
Estados de un contrato
@endsection
@include('admin.catalogs.partials.head')       
<!-- Page Heading -->
<!-- errors -->
@include('admin.layouts.partials.validation-error')
@include('admin.layouts.partials.session-flash-status')
<!-- errors -->

  <!-- content -->
  <?php 
  $ruta = route('contractstatus.store');
  $rutaedit = 'contractstatus.update';
  $rutadestroy ='contractstatus.destroy';
  ?>
  @section('ruta',$ruta)
  @section('data_title','Nuevo estado de un contrato')
  @section('data_lbl','Nombre del nuevo estado de un contrato')
  @section('data_btn','Guardar nuevo estado de un contrato')

  @section('rutaedit',$rutaedit)
  @section('edit_title','Editar nombre del estado de un contrato')
  @section('edit_labelbi','Tipo de estado de un contrato')
  @section('edit_btn','Editar nombre del estado de un contrato')

  @section('rutadestroy',$rutadestroy)
  @section('delete_labeltxt','estado de un contrato:')

  @section('cardhead')
  Tipos de estados de un contrato
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