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

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cátalogos</h1>
    
  </div>
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Listado de cátalogos</li>
  </ol>
</nav>
       
  <!-- Page Heading -->
  
  
  @include('admin.layouts.partials.session-flash-status')
  
  <!-- DataTales Example -->
  <div class="row">

  <div class="col-md-6">

  
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="form-row">
        <div class="form-group">
        <h6 class="m-0 font-weight-bold text-primary">Sectores registrados</h6>
        </div>
        <div class="form-group offset-md-5">
          
        <button  class="btn btn-primary btn-sm"  data-lbl='Nombre del sector' data-btn='Guardar sector' data-toggle="modal" data-title='Nuevo sector' data-target="#modalnewData" data-route='{{route("project.savesector")}}' >
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
        Agregar nuevo
      </button>
</div>

      </div>
     
     
    </div>
    <div class="card-body">
      <div class="tablescroll">
        <table class="table table-bordered table-sm table-borderless table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nombre del sector</th>
              <th>Acciones</th>
             
             
            </tr>
          </thead>
          <tbody>
           
            @foreach ($sectores as $sector)
              <tr>
                <td>{{ $sector->titulo}}</td>
               
              
                <td>

                <div class="form-row">

                  <div class="form-group" style="margin-right: 5px;">
                  <button data-title="Editar sector" data-labeltxt='sector' data-id='{{$sector->id}}' data-btn='Editar sector' data-toggle="modal" data-name='{{$sector->titulo}}' data-target="#modaleditData" data-route='{{route("project.editsector")}}' data-target="#modaleditData" class="btn btn-sm btn-info shadow-sm">
                    <i class="fas fa-edit fa-sm text-white-50"></i>
                    
                  </button>

                  </div>

                  <div class="form-group">
                  <button class="btn btn-sm btn-dark shadow-sm" data-labeltxt='sector' data-id='{{$sector->id}}' data-btn='Guardar sector' data-toggle="modal" data-name='{{$sector->titulo}}' data-target="#deleteUserModal" data-route='{{route("project.deletesector")}}'>
                    <i class="fas fa-trash fa-sm text-white-50"></i>
                   
                  </button>
 
                  </div>

                </div>
                 
                 
                </td>
              </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <hr>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
       <div class="form-row">
        <div class="form-group">
        <h6 class="m-0 font-weight-bold text-primary">Estudios de impacto ambiental</h6>
        </div>
        <div class="form-group offset-md-3">
          
        <button  data-labeltxt='tipo de proyecto'  data-lbl='Nombre del estudio de impacto ambiental' data-btn='Guardar nombre de estudio' class="btn btn-primary btn-sm" data-toggle="modal" data-title='Nuevo nombre de estudio' data-target="#modalnewData" data-route='{{route("project.saveestudioAmbiental")}}'  >
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
              <th style="width: 50%;">Nombre del estudio</th>
              <th style="width: 10%;">Acciones</th>
             
             
            </tr>
          </thead>
          <tbody>
        @foreach($estudiosambiental as $estudio)
            <tr>


            <td>{{$estudio->titulo}}</td>

            <td>
            <div class="form-row">

<div class="form-group" style="margin-right: 5px; margin-left:15%;">
<button data-title="Editar sector" data-labeltxt='sector' data-id='{{$estudio->id}}' data-btn='Editar sector' data-toggle="modal" data-name='{{$estudio->titulo}}' data-target="#modaleditData" data-route='{{route("project.editsector")}}' data-target="#modaleditData" class="btn btn-sm btn-info shadow-sm">
  <i class="fas fa-edit fa-sm text-white-50"></i>
  
</button>

</div>

<div class="form-group">
<button class="btn btn-sm btn-dark shadow-sm" data-labeltxt='sector' data-id='{{$estudio->id}}' data-btn='Guardar sector' data-toggle="modal" data-name='{{$estudio->titulo}}' data-target="#deleteUserModal" data-route='{{route("project.deletesector")}}'>
  <i class="fas fa-trash fa-sm text-white-50"></i>
  
</button>

</div>

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
  
  <div class="col-md-6">

  
  <div class="card shadow mb-4">
    <div class="card-header py-3">
       <div class="form-row">
        <div class="form-group">
        <h6 class="m-0 font-weight-bold text-primary">Subsectores registrados</h6>
        </div>
        <div class="form-group offset-md-4">
          
        <button  id="newsubsector" data-labeltxt='subsector' data-lbl='Nombre del subsector'  type="submit" data-btn='Guardar subsector' class="btn btn-primary btn-sm" data-toggle="modal" data-title='Nuevo subsector' data-target="#modalnewData" data-route='{{route("project.savesubsector")}}'  >
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
        Agregar nuevo
      </button>
</div>

      </div>
     
      
    </div>
    <div class="card-body">
      <div class="tablescroll">
        <table class="table table-bordered table-sm  table-hover display" id=""  width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 50%;">Nombre del sector</th>
              <th style="width: 10%;">Acciones</th>
             
             
            </tr>
          </thead>
          <tbody id="tBody">
           
          </tbody>
        </table>
      </div>
    </div>
  </div>
<hr>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
       <div class="form-row">
        <div class="form-group">
        <h6 class="m-0 font-weight-bold text-primary">Tipo de proyecto</h6>
        </div>
        <div class="form-group offset-md-5">
          
        <button  id="newsubsector" data-labeltxt='tipo de proyecto'  data-lbl='Nombre del tipo de proyecto' data-btn='Guardar tipo de proyecto' class="btn btn-primary btn-sm" data-toggle="modal" data-title='Nuevo tipo de proyecto' data-target="#modalnewData" data-route='{{route("project.saveprojecttype")}}'  >
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
              <th style="width: 50%;">Nombre</th>
              <th style="width: 30%;">Acciones</th>
             
             
            </tr>
          </thead>
          <tbody>
        @foreach($tipos as $tipo)
            <tr>


            <td>{{$tipo->titulo}}</td>

            <td>
            <div class="form-row">

<div class="form-group" style="margin-right: 5px;">
<button data-title="Editar sector" data-labeltxt='sector' data-id='{{$tipo->id}}' data-btn='Editar sector' data-toggle="modal" data-name='{{$tipo->titulo}}' data-target="#modaleditData" data-route='{{route("project.editsector")}}' data-target="#modaleditData" class="btn btn-sm btn-info shadow-sm">
  <i class="fas fa-edit fa-sm text-white-50"></i>
  Editar
</button>

</div>

<div class="form-group">
<button class="btn btn-sm btn-dark shadow-sm" data-labeltxt='sector' data-id='{{$tipo->id}}' data-btn='Guardar sector' data-toggle="modal" data-name='{{$tipo->titulo}}' data-target="#deleteUserModal" data-route='{{route("project.deletesector")}}'>
  <i class="fas fa-trash fa-sm text-white-50"></i>
  Eliminar
</button>

</div>

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

<!-- Modal para agregar un nuevo sector. --->
  
  <div class="modal fade" id="modalnewData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formnew" action="" method="POST">
        @csrf
        <label for="name" id="lbl"></label>
          <input type="text" name="titulo" id="name" class="form-control">
          <input type="hidden" id="name_sector" name="name_sector">
         
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Regresar</button>
        <button type="submit" class="btn btn-primary btn-sm" id="btnsave"></button>
        </form>
      </div>
    </div>
  </div>
</div>


<!--- Modal para editar -->


  
<div class="modal fade" id="modaleditData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formEdit" action="" method="POST">
        @csrf
        <label for="name">Sector</label>
          <input type="text" name="oldtitulo" id="oldname" class="form-control" readonly>
          
          <label for="">Nuevo nombre</label>
          <input required type="text" name="newtitulo" id="newname" class="form-control">

          <input type="hidden" name="id_to" id="id_to">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Regresar</button>
        <button type="submit" class="btn btn-primary btn-sm" id="btnedit"></button>
        </form>
      </div>
    </div>
  </div>
</div>
  

  <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>¿Seguro que desea eliminar el <strong><span class="name-user"></span></strong>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary shadow-sm" data-dismiss="modal">
            <i class="fas fa-times fa-sm text-white-50"></i>
            No, salir
          </button>
          <form id="formDelete" action="" data-action=" " method="POST">
            @method('POST')
            @csrf
            
            <button type="submit" class="btn btn-sm btn-danger shadow-sm">
              <i class="fas fa-trash fa-sm text-white-50"></i>
              Si, eliminar
            </button>
            <input type="hidden" name="to_id" id="to_id">
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

  <script>



function addRowHandlers() {
  var table = document.getElementById("dataTable");
  var rows = table.getElementsByTagName("tr");
  for (i = 0; i < rows.length; i++) {
    var currentRow = table.rows[i];
    var createClickHandler = function(row) {
      return function() {
        var cell = row.getElementsByTagName("td")[0];
        var name = cell.innerHTML;
        sendname(name);
      };
    };
    currentRow.onclick = createClickHandler(currentRow);
  }
}

function sendname(name){

  $('#name_sector').val(name);



  if(name!='No hay información'){
    document.getElementById('newsubsector').disabled=false;
  }

  

  $.ajax({
      data: {
        "_token": "{{ csrf_token() }}",
        "name": name
      }, //datos que se envian a traves de ajax
      url: "{{ route('project.getdatafromnamesector') }}", //archivo que recibe la peticion
      type: 'post', //método de envio
      dataType: "json",
      success: function(resp) { //una vez que el archivo recibe el request lo procesa y lo devuelve

       // console.log(resp);
        $(".display tbody tr").remove();


          trHTML = '';
                        $.each(resp, function (i, userData) {
                                
                                var datatitle=resp[i].titulo;
                             
                                datatitle=datatitle.replace(/\s/g, ',')
                               
                                trHTML +=
                                    '<tr><td >'
                                    + resp[i].titulo
                                    + '</td>><td>'
                                    + '<button  style=" margin-left:15%; margin-right:5%;"  data-id='+resp[i].id+' data-title="Editar subsector" data-labeltxt="subsector" data-name='+datatitle+' data-btn="Editar subsector" data-toggle="modal"  data-target="#modaleditData" data-route="{{route("project.editsubsector")}}" data-target="#modaleditData"  style="margin-right: 5px;" class="btn btn-sm btn-info shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i></button>'
                                    + '<button data-id='+resp[i].id+' data-route="{{route("project.deletesubsector")}}" data-labeltxt="subsector"  data-name='+datatitle+' class="btn btn-sm btn-dark shadow-sm" data-toggle="modal" data-target="#deleteUserModal"><i class="fas fa-trash fa-sm text-white-50"></i></button>'
                                    + '</tr>';
                            
                        });
                     
                        $('#tBody').append(trHTML);


      },
      error: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve

       // alert("Ha ocurrido un error, intente de nuevo.");
        console.log(response);
      }
    });

}



    window.onload = function() {
      addRowHandlers();
      document.getElementById('newsubsector').disabled=true;
     
      $('#deleteUserModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var name = button.data('name')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

        name=name.replace(/,/g,' ')
        var action = button.data('route')
       $('#formDelete').attr('action', action)
       $('#to_id').val(id);
       var label=button.data('labeltxt')
       
       
        $('#test').val(label)
      
        var modal = $(this)
        modal.find('.modal-title').text('Confirmar eliminación') 
        modal.find('.name-user').text(label+'   '+name)
      })

    
    }

    $('#modaleditData').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var name = button.data('name')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      name=name.replace(/,/g,' ')
      var title=button.data('title')
        var action = button.data('route')
       $('#formEdit').attr('action', action)
       $('#to_id').val(id);
       var label=button.data('labeltxt')
        var btn=button.data('btn');
        $('#oldname').val(name);
        console.log(name);
        $('#id_to').val(id);
        $('#btnedit').html(btn)
    
      
        var modal = $(this)
        modal.find('.modal-title').text(title) 
       
      })

    

    $('#modalnewData').on('show.bs.modal', function (event) {


  
      
      var button = $(event.relatedTarget)
      var title=button.data('title')
      
      var action = button.data('route')
      
      var lbl=button.data('lbl');
      $('#formnew').attr('action', action)
      $('#lbl').html(lbl);
      var modal = $(this)
      

      $('#btnsave').html(button.data('btn'));


      modal.find('.modal-title').text(title) 

    });
    
  </script>
@endsection 