@extends("admin.layouts.app")

@section('styles')

<style>
    label {
        color: #000;
    }
</style>

@endsection

@section('content')

@include('admin.projects.phasesnav')

<br>



<div class="row">
    <div class="col-md-12">
        <div>


            <form action="{{route($ruta)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card mb-4">
                    @include('admin.layouts.partials.validation-error')

                    @include('admin.layouts.partials.session-flash-status')
                    <div class="card-header text-primary font-weight-bold m-0">
                        Información del proceso de contratación
                    </div>

                    <div class="card-body">

                        <input type="hidden" value="{{$project->id}}" name="id_project">


                        <div class="row">
                            <div class="col-md-12">
                                <label for=""><b>Datos de contacto de la entidad de adjudicación:</b></label>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Entidad de adjudicación</label>
                                        <input maxlength="50" type="text" class="form-control @error('entidadadjudicacion') is-invalid @enderror" name="entidadadjudicacion" value="">
                                        @error('entidadadjudicacion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nombrecontacto">Nombre</label>
                                        <input type="text" name="nombrecontacto" id="nombrecontacto" class="form-control" value="">




                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="email">Correo electrónico</label>
                                        <input type="text" id="emailcontacto" maxlength="150" name="emailcontacto" class="form-control" value="">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="telefonocontacto">Télefono</label>
                                        <input type="number" name="telefonocontacto" id="telefonocontacto" class="form-control" value="">
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="domiciliocontacto">Domicilio</label>
                                <input type="text" id="domiciliocontacto" name="domiciliocontacto" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="">Fecha de publicación</label>
                                <input maxlength="50" type="date" class="form-control @error('fechapublicacion') is-invalid @enderror" name="fechapublicacion" value="">
                                @error('fechapublicacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>


                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="">Nombre del responsable</label>
                                <input maxlength="50" type="text" class="form-control @error('nombreresponsable') is-invalid @enderror" name="nombreresponsable" value="">
                                @error('nombreresponsable')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Modalidad de la adjudicación</label>


                                <select name="modalidadadjudicacion" id="" class="form-control @error('modalidadadjudicacion') is-invalid @enderror">
                                    <option value="">Seleccione una opción</option>
                                    @foreach($catmodalidad_adjudicacion as $mod)

                                    <option value="{{$mod->id}}">{{$mod->titulo}}</option>


                                    @endforeach

                                </select>
                                @error('modalidadadjudicacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Tipo de contrato</label>
                                <?php
                                // print_r($project->tipocontrato);
                                ?>
                                <select id="" class="form-control @error('tipocontrato') is-invalid @enderror" name="tipocontrato">
                                    <option value="">Seleccione una opción</option>
                                    @foreach($cattipo_contrato as $contrato)


                                    <option value="{{$contrato->id}}">{{$contrato->titulo}}</option>


                                    @endforeach
                                </select>
                                @error('tipocontrato')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">

                                <label for="">Modalidad de de contratación</label>


                                <select name="modalidadcontrato" id="" class="form-control @error('modalidadcontrato') is-invalid @enderror">
                                    <option value="">Seleccione una opción</option>
                                    @foreach($catmodalidad_contratacion as $modcontrato)


                                    <option value="{{$modcontrato->id}}">{{$modcontrato->titulo}}</option>


                                    @endforeach

                                </select>
                                @error('modalidadcontrato')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-4">

                                <label for="">Estado actual de la contratación</label>

                                <select name="estadoactual" id="" class="form-control @error('estadoactual') is-invalid @enderror">
                                    <option value="">Seleccione una opción</option>
                                    @foreach($contractingprocess_status as $contractstatus)

                                    <option value="{{$contractstatus->id}}">{{$contractstatus->titulo}}</option>


                                    @endforeach

                                </select>
                                @error('estadoactual')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">

                                <label for="">Empresas participantes</label>
                                <input maxlength="250" type="text" class="form-control @error('empresasparticipantes') is-invalid @enderror" name="empresasparticipantes" value="">
                                @error('empresasparticipantes')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group col-md-4">
                                <label for=""> Entidad administradora del contrato</label>
                                <input maxlength="50" type="text" name="entidad_admin_contrato" value="" class="form-control @error('entidad_admin_contrato') is-invalid @enderror" placeholder="Nombre del área o dependencia responsable de la administración y seguimiento del contrato">
                                @error('entidad_admin_contrato')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">

                                <label for="">Título del contrato</label>
                                <input maxlength="50" type="text" name="titulocontrato" value="" class="form-control @error('titulocontrato') is-invalid @enderror" placeholder="Nombre o título de contrato">
                                @error('titulocontrato')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">Empresa contratada</label>
                                <input maxlength="250" type="text" class="form-control @error('empresacontratada') is-invalid @enderror" name="empresacontratada" value="">
                                @error('empresacontratada')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">Vía por la que presenta su propuesta</label>
                                <input maxlength="50" type="text" class="form-control @error('viapropuesta') is-invalid @enderror" name="viapropuesta" value="">
                                @error('viapropuesta')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>



                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="">Fecha de presentación de su propuesta</label>
                                <input maxlength="50" type="date" class="form-control @error('fechapresentacionpropuesta') is-invalid @enderror" name="fechapresentacionpropuesta">
                                @error('fechapresentacionpropuesta')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Monto del contrato</label>
                                <input maxlength="50" type="number" class="form-control @error('montocontrato') is-invalid @enderror" name="montocontrato">
                                @error('montocontrato')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group col-md-4">

                                <label for="">Alcance del trabajo según el contrato</label>
                                <input maxlength="50" type="text" class="form-control @error('alcancecontrato') is-invalid @enderror" name="alcancecontrato">
                                @error('alacancecontrato')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>

                        <div class="form-row">


                            <div class="form-group col-md-4">

                                <label for="">Fecha de inicio del contrato </label>
                                <input maxlength="50" type="date" class="form-control @error('fechainiciocontrato') is-invalid @enderror" name="fechainiciocontrato" value="">
                                @error('fechainiciocontrato')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Duración del proyecto de acuerdo con lo establecido en el contrato</label>
                                <input maxlength="50" type="text" class="form-control @error('duracionproyecto_contrato') is-invalid @enderror" name="duracionproyecto_contrato" value="">
                                @error('duracionproyecto_contrato')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>




                    </div>
                    <!--before this go the data-->


                    <div class="form-group col-md-12">
                        <label for="observaciones">Observaciones:</label>
                        <input type="text" name="observaciones" id="observaciones" class="form-control" value="">
                    </div>

                 
<div class="col-lg-6">

    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample5" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample5">

            <h6 class="m-0 font-weight-bold text-primary">Documentos</h6>
        </a>
        <!-- Card Content - Collapse -->

        <div class="collapse show" id="collapseCardExample5">
            <div class="card-body">

             


                    <div class="form-row">
                        <div class="form-group">
                            <label for="">Seleccionar documentos</label>
                            <input type="file" class="form-control" name="documents[]" multiple>


                            <label for="documenttype">Tipo de documento</label>
                            <select name="documenttype" id="documenttype" class="form-control @error('documenttype') is-invalid @enderror">
                                <option value="">Selecciona un opción</option>
                                @foreach($documentstype as $type)

                                <option value="{{$type->id}}">{{$type->titulo}}</option>

                                @endforeach

                            </select>
                            @error('documenttype')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                    </div>
            </div>


        </div>
    </div>

   

</div>
                  
                    <div class="d-flex justify-content-end" style="margin-right: 2%;">
                    <input type="submit" class="btn btn-warning btnmas" style="color:black; font-weight:bold" value="Agregar">
                    </div>
                    <hr>

                </div>
              
                <div class="card mb-4">
                    <div class="card-header text-primary font-weight-bold m-0">
                        Listado de contratos
                    </div>

                    <div class="card-body table-responsive">

                        <div class="col-md-12">

                            <table class="table table-sm">
                                <tr>
                                    <th>ID del contrato</th>
                                    <th>Entidad de adjudicación</th>
                                    <th>Nombre contacto</th>
                                    <th>Fecha de publicación</th>
                                    <th>Monto del contrato</th>
                                    <th>Acciones</th>
                                </tr>


                                <tbody>
                                    @foreach($contratos as $contrato)
                                    <tr>
                                        <td>
                                            {{$contrato->id}}
                                        </td>
                                        <td>
                                            @if($contrato->entidadadjudicacion=="")
                                            <span class="badge badge-info">Sin información</span>
                                            @else
                                            {{$contrato->entidadadjudicacion}}
                                            @endif

                                        </td>
                                        <td>

                                            @if($contrato->nombrecontacto=="")
                                            <span class="badge badge-info">Sin información</span>
                                            @else
                                            {{$contrato->nombrecontacto}}
                                            @endif
                                        </td>
                                        <td>

                                            @if($contrato->fechapublicacion=="")
                                            <span class="badge badge-info">Sin información</span>
                                            @else
                                            {{$contrato->fechapublicacion}}
                                            @endif
                                        </td>

                                        <td>

                                            @if($contrato->montocontrato=="")
                                            <span class="badge badge-info">Sin información</span>
                                            @else
                                            {{number_format($contrato->montocontrato)}}
                                            @endif
                                        </td>
                                    <?php
                                    $contract_documents=DB::table('contract_documents')
                                    ->join('documents','contract_documents.id_document','=','documents.id')
                                    ->select('documents.id','documents.url','documents.documentType',
                                    'contract_documents.id_document')
                                    ->where('id_contrato','=',$contrato->id)
                                    ->get();
                                   
                                    $data=array();
                                    
                                
                                   
                                    ?>

                                        <td>
                                            <div class="form-row">
                                         

                                                <div class="form-group">
                                                    <a data-toggle="modal" onclick="mandar('{{$contrato->id}}','{{$contrato->entidadadjudicacion}}',
                                                    '{{$contrato->nombrecontacto}}','{{$contrato->emailcontacto}}','{{$contrato->telefonocontacto}}',
                                                    '{{$contrato->domiciliocontacto}}','{{$contrato->fechapublicacion}}','{{$contrato->nombreresponsable}}',
                                                    '{{$contrato->empresasparticipantes}}','{{$contrato->entidad_admin_contrato}}','{{$contrato->titulocontrato}}',
                                                    '{{$contrato->empresacontratada}}','{{$contrato->viapropuesta}}','{{$contrato->fechapresentacionpropuesta}}','{{$contrato->montocontrato}}',
                                                    '{{$contrato->alcancecontrato}}','{{$contrato->fechainiciocontrato}}','{{$contrato->duracionproyecto_contrato}}','{{$contrato->observaciones}}',
                                                    '{{$contrato->modalidadadjudicacion}}','{{$contrato->tipocontrato}}','{{$contrato->modalidadcontrato}}','{{$contrato->estadoactual}}',
                                                    '{{json_encode($data)}}',
                                                    )" 
                                                    class="btn btn-warning btn-sm btn-circle" style="color: black;"><i class="fa fa-edit btnme"></i></a>
                                                </div>

                                                <div class="form-group">
                                                    <a data-toggle="modal" style="color: black;"  onclick="eliminar('{{$contrato->id}}')" class="btn btn-danger btn-sm btn-circle"><i class="fa fa-trash btnme"></i></a>
                                                </div>

                                            </div>
                                        </td>

                                    </tr>

                                    @endforeach

                                </tbody>

                            </table>
                        </div>




                    </div>
                    <!--before this go the data-->



                </div>


              

              

               
                
                </form>
      
                <form action="{{route('siguientecontratacion')}}" method="post">
@csrf
<input type="hidden" name="id_project" value="{{$project->id}}">
<div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-edit fa-sm text-white-50"></i>
                        {{'Siguiente' }}
                    </button>
                </div>

</form>
        </div>


    </div>

    
    <div class="modal fade" id="eliminarContrato" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">Confirmar eliminación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="pe"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary shadow-sm" data-dismiss="modal">
            <i class="fas fa-times fa-sm text-white-50"></i>
            No, salir
          </button>
          <form id="formDelete" action="{{ route('deletecontrato') }}" method="POST">
           
            @csrf
            <input type="hidden" value="" id="eliminarcontrato" name="eliminarcontrato">
            <button type="submit" class="btn btn-sm btn-danger shadow-sm">
              <i class="fas fa-trash fa-sm text-white-50"></i>
              Si, eliminar
            </button>
            
          </form>
        </div>
     
      </div>
    </div>
  </div>

    <!--end card-->
    @include('admin.projects.modaleditarContrato')
 
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
          <p>¿Seguro que desea eliminar el documento  <strong><span class="name-user"></span></strong>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary shadow-sm" data-dismiss="modal">
            <i class="fas fa-times fa-sm text-white-50"></i>
            No, salir
          </button>
          <form id="formDelete" action="{{route('project.deletedocument')}}" method="POST">
            @csrf
           
            <input type="hidden"  id="doc_id" name="doc_id">
            <button type="submit" class="btn btn-sm btn-danger shadow-sm">
              <i class="fas fa-trash fa-sm text-white-50"></i>
              Si, eliminar
            </button>
            
          </form>
        </div>
      </div>
    </div>
  </div>
 
    @endsection

    @section('scripts')
    <script>
        function eliminar(dato){
            $('#eliminarcontrato').val(dato);
            $('#pe').html('¿Seguro que desea eliminar el contrato?'+'<b>#'+ dato+'</b');
            $('#eliminarContrato').modal('show')
        }
    
        function mandar(dato1, dato2, dato3, dato4, dato5, dato6, dato7, dato8, dato9, dato10, dato11, dato12, dato13, dato14, dato15, dato16, dato17, dato18, dato19,dato20,dato21,dato22,dato23,data) {

            console.log(data);
          
            $('#id_contrato').val(dato1);
            $('#entidadadjudicacionmodal').val(dato2);
            $('#nombrecontactomodal').val(dato3);
            $('#emailcontactomodal').val(dato4);
            $('#telefonocontactomodalu').val(dato5);
            $('#domiciliocontactomodal').val(dato6);
            $('#fechapublicacionmodalu').val(dato7);
            $('#nombreresponsablemodal').val(dato8);
            $('#empresasparticipantesmodal').val(dato9);
            $('#entidad_admin_contratomodal').val(dato10);
            $('#titulocontratomodal').val(dato11);
            $('#empresacontratadamodal').val(dato12);
            $('#viapropuestamodal').val(dato13);
            $('#fechapresentacionpropuestamodalu').val(dato14);
            $('#montocontratomodalu').val(dato15);
            $('#alcancecontratomodal').val(dato16);
            $('#fechainiciocontratomodalu').val(dato17);
            $('#duracionproyecto_contratomodal').val(dato18);
            $('#observacionesmodal').val(dato19);

            /**Para los select del modal */
           
            //document.getElementById('modalidadadjudicacionmodal').value=dato20;//js pure.
            $('#modalidadadjudicacionmodal').val(dato20);
            $('#tipocontratomodal').val(dato21);
            $('#modalidadcontratomodal').val(dato22);
            $('#estadoactualmodal').val(dato23);


            $('#id_contratomodal').val(dato1);

            //Para el título del modal.

            $('#modal-title').html('Actualizando contrato: '+dato1);

          
            /*Para llenar la tabla dinámicamente**/

            $.ajax({
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id_contrato": dato1,
                },
                url: "{{ route('getdocsfromcontract') }}",
                type: 'post',
                dataType: "json",
                success: function(resp) {

                    /*una vez que el archivo recibe el request lo procesa y lo devuelve
                    y  construye la tabla dentro del modal con el nombre y tipo del documento de 
                    determinada fase
                    */

                    console.log(resp);
                    
                    $(".display tbody tr").remove();
                    
                    trHTML = '';
                    $.each(resp, function(i, userData) {

                        var public_path = "{{asset('documents/') }}";
                        var f = public_path + "/" + resp[i].url
                        trHTML +=
                            '<tr><td >' +
                            '<a  target="_blank" class="badge badge-pill badge-info" href="'+f+'">'+resp[i].url +' </a>'+    
                            '<td>'+ resp[i].titulo +' </td>'+
                            '</td>><td>' +
                           ' <a id="deldoc" href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteUserModal" data-id="'+resp[i].id+'" data-name="'+resp[i].url+'">'+
                           '<i class="fa fa-trash"></i></a>'+ 
                           '</tr>';
                    });

                    $('#cuerpodocumentos').append(trHTML);

                    if (resp.length == 0) {
                        trHTML += '<tr><td>Sin documentos</td><td></td></tr>';
                        $('#cuerpodocumentos').append(trHTML);
                    }
                
                },
                error: function(response) {
                  
                }
            });
          

            $('#editarContrato').modal('show')
        }
    </script>

<script src="{{asset('js/deletemodaldocument.js')}}"></script>
    @endsection