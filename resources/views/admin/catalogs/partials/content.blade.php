<?php
$ruta = app()->view->getSections()['ruta'];
$rutaedit = app()->view->getSections()['rutaedit'];
$rutadestroy = app()->view->getSections()['rutadestroy'];
$data_title = app()->view->getSections()['data_title'];
$data_lbl=app()->view->getSections()['data_lbl'];
$data_btn=app()->view->getSections()['data_btn']; 
$edit_title=app()->view->getSections()['edit_title']; 
$edit_btn=app()->view->getSections()['edit_btn']; 
$edit_labelbi=app()->view->getSections()['edit_labelbi']; 
$delete_labeltxt=app()->view->getSections()['delete_labeltxt'];

?>

<div class="row">
    <div class="col-md-8 offset-md-2">
    
  <div class="card shadow md-12">
    <div class="card-header py-3">
       <div class="form-row">
        <div class="form-group col-md-8">
        <h6 class="m-0 font-weight-bold text-primary">@yield('cardhead')</h6>
        </div>
        <div class="form-group col-md-4 d-flex justify-content-end">
          
        <button  id="newsubsector"   data-lbl='{{$data_lbl}}' data-btn='{{$data_btn}}' class="btn btn-primary btn-sm" data-toggle="modal" data-title='{{$data_title}}' data-target="#modalnewData" data-route='{{$ruta}}'  >
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
        Agregar nuevo
      </button>
      </div>

      </div>
     
      
    </div>
    <div class="card-body">
      <div class="tablescroll">
        <table class="table table-bordered table-sm  table-hover" id=""  width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 20%;">Nombre</th>
              <th style="width: 20%;">Acciones</th>
             
             
            </tr>
          </thead>
          <tbody>
        @foreach($types as $tipo)
            <tr>


            <td>{{$tipo->titulo}}</td>

            <td>
     

<div class="offset-md-3">


<button data-title="{{$edit_title}}" data-labeltxt='sector' data-labelbi='{{$edit_labelbi}}' data-id='{{$tipo->id}}' data-btn='{{$edit_btn}}' data-toggle="modal" data-name='{{$tipo->titulo}}' data-target="#modaleditData" data-route='{{route($rutaedit,$tipo->id)}}' data-target="#modaleditData" class="btn btn-sm btn-info shadow-sm">
  <i class="fas fa-edit fa-sm text-white-50"></i>
  Editar
</button>




<button class="btn btn-sm btn-dark shadow-sm" data-labeltxt='{{$delete_labeltxt}}' data-id='{{$tipo->id}}' data-toggle="modal" data-name='{{$tipo->titulo}}' data-target="#deleteUserModal" data-route='{{route($rutadestroy,$tipo->id)}}'>
  <i class="fas fa-trash fa-sm text-white-50"></i>
  Eliminar
</button>

</div>


            </td>


            </tr>

        @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>

  </div>