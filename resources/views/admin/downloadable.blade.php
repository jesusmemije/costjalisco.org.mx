@extends("admin.layouts.app")
@section('title')
    Proyectos
@endsection
@section('styles')
  <!-- Custom styles for this page -->
  <link href="{{asset("admin_assets/vendor/datatables/dataTables.bootstrap4.min.css")}}" rel="stylesheet">
@endsection
@section('content')

<?php



?>



  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Proyectos</h1>
   
  </div>

  @include('admin.layouts.partials.session-flash-status')

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
    <div class="form-row">
    <div class="form-group">
    <h6 class="m-0 font-weight-bold text-primary">Proyectos registrados</h6>
    </div>

    <div class="form-group col-md-10  d-flex justify-content-end" >
    <a class="btn btn-secondary btn-sm " target="_blank" href="http://costjalisco.org.mx/documents/Lonas Propuestas.ai">Diseños de lona</a>
    </div>
    
    </div>
     
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
            <th>Responsable</th>
              <th>Título del proyecto</th>
              <th>Actualizado</th>
              <th>Estatus</th>
              
              <th>Presupuesto</th>
              <th>Autoridad Pública</th>
              <th>QR</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($projects as $project)
              <tr>
                <?php 
                
                /**switch para asociar un nombre al número de estatus del proyecto. */
                switch($project->status){
                  case 1:
                    $status='Identificación';
                  break;
                  case 2:
                    $status="Preparación";
                  break;
                  case 3:
                    $status="Contratración";
                  break;
                  case 4:
                    $status="Ejecución";
                  break;
                  case 5:
                  $status="Finalizado";
                  break;
                  default:$status="";
                  
                  //provisional
                  case 7:
                    $status='Datos Generales';
                    break;
                }

                 
$monto = DB::table('proyecto_contratacion')
->select(DB::raw('SUM(montocontrato) as monto_total'))
->where('id_project','=',$project->id_project)
->first();


               
                ?>

          

                <td>
                @if(!empty($project->responsable)){{ $project->responsable}}</td>
                @else
                <span class="badge badge-info">Sin información</span>
                @endif
                
                <td>
                @if(!empty($project->title))
                {{ $project->title}}
                
                
                </td>
                @else
                <span class="badge badge-info">Sin información</span>
                @endif
                <td>
                @if(!empty($project->updated))
                {{$project->fechap}}
                </td>
                @else
                <span class="badge badge-info">Sin información</span>
                @endif
                
                <td>{{$status}}</td>
                <td>
                @if(!empty($monto->monto_total))
                {{ number_format($monto->monto_total)}}
                </td>
                @else
                <span class="badge badge-info">Sin información</span>
                @endif

                <td>
                @if($project->orgname)  
                {{ $project->orgname}}
              </td>
              @else
                <span class="badge badge-info">Sin información</span>
                @endif
                <td>
               
                <center> <button class="btn btn-sm btn-secondary btn-circle shadow-sm" data-toggle="modal" data-target="#deleteUserModal" data-id="{{ $project->id_project}}" data-name="{{ $project->title }}">
                    <i class="fa fa-qrcode fa-sm text-white-50"></i>
                  
                  </button></center>
                 
                  <!--
                  <a style="margin-top: 3%;" class="btn btn-sm btn-success btn-circle shadow-sm" href="{{route('projectexport',$project->id)}}">
                    <i class="fas fa-file-excel fa-sm text-white-50"></i>
              -->
                  
              </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Detalles del proyecto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Escanea el QR para ver los detalles del proyecto</p>
          <center><img id="imgqr"  src="" title="Enlace a detalles de proyecto" /></center>

         

          <form action="{{route('downloadQR')}}" method="POST" enctype="multipart/form-data">
              @csrf

        <div>
      
        <input type="hidden" id="id_project" name="id_project">
        <label for="dimensiones">Seleccione las dimensiones</label>
        <select required name="dimensiones" id="dimensiones" class="form-control">
        <option value="">Seleccionar</option>
        <option value="1">150x150</option>
        <option value="2">250x250</option>
        <option value="3">350x350</option>
        <option value="4">500x500</option>
        </select>
        </div>
        <br>
        <div class="d-flex justify-content-end">
        <input class="btn btn-primary btn-sm"  type="submit" value="Descargar QR">
        <a class="btn btn-secondary btn-sm" target="_blank" href="" id="dl" style="margin-left:4%" type="submit" >Vista previa lona</a>
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

  <script>

    window.onload = function() {
    

      $('#deleteUserModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes

        let url="http://costjalisco.org.mx/project-single/"+id;
      
        src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl="+url+"&choe=UTF-8";
        $("#imgqr").attr("src",src);
        
        $('#id_project').val(id);
        
        $('#img_save').attr('src',src);

        let select=$( "#myselect" ).val();
        
        let auxr="http://costjalisco.org.mx/admin/downloadLona?"+"id="+id+"&qr="+src;
        
        console.log(auxr);
        $('#dl').attr('href',auxr);


    
      
      })
    }

  
    

   
    
  </script>
@endsection