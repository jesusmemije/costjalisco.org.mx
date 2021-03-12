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
                                <label for="" ><b>Datos de contacto de la entidad de adjudicación:</b></label>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Entidad de adjudicación</label>
                                        <input type="text" class="form-control @error('entidadadjudicacion') is-invalid @enderror" name="entidadadjudicacion" value="">
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
                                        <input type="text" minlength="10" maxlength="10" name="telefonocontacto" id="telefonocontacto" class="form-control" value="">
                                    </div>


                                </div>
                            </div>
                        </div>

                        <label for="domiciliocontacto" style="font-weight:bold;">Domicilio</label>
                        <div class="form-row">
                        
                            <div class="form-group col-md-5">
                                
                                <!--<input type="text" id="domiciliocontacto" name="domiciliocontacto" class="form-control" value="">-->

                                <label for="streetAddress" >Calle</label>
                                <input type="text" id="streetAddress" name="streetAddress" class="form-control" value="">
                                
                            </div>
                            <div class="form-group col-md-2" >
                                <label for="streetNum">Número</label>
                                <input type="text" id="streetNum" name="streetNum" class="form-control" value="">
                            </div>
                            <div class="form-group col-md-5" >
                                <label for="suburb">Colonia</label>
                                <input type="text" id="suburb" name="suburb" class="form-control" value="">
                            </div>
                            <div class="form-group col-md-5" >
                                <label for="locality">Municipio</label>
                                <input type="text" id="locality" name="locality" class="form-control" value="">
                            </div>
                            <div class="form-group col-md-2" >
                                <label for="postalCode">Código postal</label>
                                <input type="text" minlength="5" maxlength="5" id="postalCode" name="postalCode" class="form-control" value="">
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
                                <input  type="text" class="form-control @error('nombreresponsable') is-invalid @enderror" name="nombreresponsable" value="">
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
                                <input type="text" class="form-control @error('empresasparticipantes') is-invalid @enderror" name="empresasparticipantes" value="">
                                @error('empresasparticipantes')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group col-md-4">
                                <label for=""> Entidad administradora del contrato</label>
                                <input type="text" name="entidad_admin_contrato" value="" class="form-control @error('entidad_admin_contrato') is-invalid @enderror" placeholder="Nombre del área o dependencia responsable de la administración y seguimiento del contrato">
                                @error('entidad_admin_contrato')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">

                                <label for="">Título del contrato</label>
                                <input type="text" name="titulocontrato" value="" class="form-control @error('titulocontrato') is-invalid @enderror" placeholder="Nombre o título de contrato">
                                @error('titulocontrato')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">Empresa contratada</label>
                                <input  type="text" class="form-control @error('empresacontratada') is-invalid @enderror" name="empresacontratada" value="">
                                @error('empresacontratada')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">Vía por la que presenta su propuesta</label>
                                <input  type="text" class="form-control @error('viapropuesta') is-invalid @enderror" name="viapropuesta" value="">
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
                                <input type="text" class="form-control @error('alcancecontrato') is-invalid @enderror" name="alcancecontrato">
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
                                <input maxlength="50" required type="text" class="form-control @error('duracionproyecto_contrato') is-invalid @enderror" name="duracionproyecto_contrato" value="">
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
                            <p><small>El tamaño de los archivos debe ser menor a 20MB</small></p>
                            <input type="file" class="form-control" id='documents' name="documents[]" multiple onchange="return validateSize()">


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
                             
                                        <td>
                                            <div class="form-row">
                                             
                                  

                                                <div class="form-group">
                                                    <a data-toggle="modal" data-target="#editarContrato"  
                                                    data-id="{{$contrato->id}}"
                                                   data-entidadadjudicacion="{{$contrato->entidadadjudicacion}}"
                                                   data-nombrecontacto="{{$contrato->nombrecontacto}}"
                                                   data-emailcontacto="{{$contrato->emailcontacto}}"
                                                   data-telefonocontacto="{{$contrato->telefonocontacto}}"
                                                   data-domiciliocontacto="{{$contrato->domiciliocontacto}}"
                                                   data-fechapublicacion="{{$contrato->fechapublicacion}}"
                                                   data-nombreresponsable="{{$contrato->nombreresponsable}}"
                                                   data-entidad_admin_contrato="{{$contrato->entidad_admin_contrato}}"
                                                   data-titulocontrato="{{$contrato->titulocontrato}}"
                                                   data-empresacontratada="{{$contrato->empresacontratada}}"
                                                   data-viapropuesta="{{$contrato->viapropuesta}}"
                                                   data-fechapresentacionpropuesta="{{$contrato->fechapresentacionpropuesta}}"
                                                   data-montocontrato="{{$contrato->montocontrato}}"
                                                   data-alcancecontrato="{{$contrato->alcancecontrato}}"
                                                   data-fechainiciocontrato="{{$contrato->fechainiciocontrato}}"
                                                   data-duracionproyecto_contrato="{{$contrato->duracionproyecto_contrato}}"
                                                   data-observaciones="{{$contrato->observaciones}}"
                                                   data-modalidadadjudicacion="{{$contrato->modalidadadjudicacion}}"
                                                   data-tipocontrato="{{$contrato->tipocontrato}}"
                                                   data-modalidadcontrato="{{$contrato->modalidadcontrato}}"
                                                   data-estadoactual="{{$contrato->estadoactual}}"
                                                   
                                                  
                                                   data-streetaddress="{{$contrato->streetAddress}}"
                                                   data-streetnum="{{$contrato->streetNum}}"
                                                   data-suburb="{{$contrato->suburb}}"
                                                   data-locality="{{$contrato->locality}}"
                                                   data-postalcode="{{$contrato->postalCode}}"
                                                   data-idaddress="{{$contrato->id_address}}"

                                                   

                                                    
                                                    data-empresas="{{$contrato->empresasparticipantes}}"
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

        /**Para validación de tamaño de archivos */

function validateSize(){
  if (!window.FileReader) { // This is VERY unlikely, browser support is near-universal
        console.log("The file API isn't supported on this browser yet.");
        return false;
    }

    var input = document.getElementById('documents');
    if (!input.files) { // This is VERY unlikely, browser support is near-universal
        console.error("This browser doesn't seem to support the `files` property of file inputs.");
        return false;
    } else if (!input.files[0]) {
        //addPara("Please select a file before clicking 'Load'");
        alert("Debe seleccionar al menos un archivo");
        return false;
    } else {
        var file = input.files[0];
        let finalSize=0;
       // addPara("File " + file.name + " is " + file.size + " bytes in size");
       //alert("File " + file.name + " is " + file.size + " bytes in size");

       for(let i=0; i<input.files.length;i++){
          finalSize=file.size+finalSize;
       }

       if(finalSize>=20971520){
        alert('El tamaño total de los archivos supera los 20MB');

        input.value='';
        return false;
       }

      
    }
}


        function eliminar(dato){
            $('#eliminarcontrato').val(dato);
            $('#pe').html('¿Seguro que desea eliminar el contrato?'+'<b>#'+ dato+'</b');
            $('#eliminarContrato').modal('show')
        }

        $('#editarContrato').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget);


            $('#id_contrato').val(button.data('id'));
            $('#entidadadjudicacionmodal').val(button.data('entidadadjudicacion'));
            $('#nombrecontactomodal').val(button.data('nombrecontacto'));
            $('#emailcontactomodal').val(button.data('emailcontacto'));
            $('#telefonocontactomodalu').val(button.data('telefonocontacto'));
            $('#domiciliocontactomodal').val(button.data('domiciliocontacto'));
            $('#fechapublicacionmodalu').val(button.data('fechapublicacion'));
            $('#nombreresponsablemodal').val(button.data('nombreresponsable'));

            // $('#empresasparticipantesmodal').val(dato9);

            $('#entidad_admin_contratomodal').val(button.data('entidad_admin_contrato'));
            $('#titulocontratomodal').val(button.data('titulocontrato'));
            $('#empresacontratadamodal').val(button.data('empresacontratada'));
            $('#empresasparticipantesmodal').val(button.data('empresas'));
            $('#viapropuestamodal').val(button.data('viapropuesta'));
            $('#fechapresentacionpropuestamodalu').val(button.data('fechapresentacionpropuesta'));
            $('#montocontratomodalu').val(button.data('montocontrato'));
            $('#alcancecontratomodal').val(button.data('alcancecontrato'));
            $('#fechainiciocontratomodalu').val(button.data('fechainiciocontrato'));
            $('#duracionproyecto_contratomodal').val(button.data('duracionproyecto_contrato'));
            $('#observacionesmodal').val(button.data('observaciones'));

            /**Para el domicilio del contacto. */

          

           $('#streetAddressmodal').val(button.data('streetaddress'));
            $('#streetNummodal').val(button.data('streetnum'));
            $('#suburbmodal').val(button.data('suburb'));
            $('#localitymodal').val(button.data('locality'));
            $('#postalCodemodal').val(button.data('postalcode'));
            
            $('#id_address').val(button.data('idaddress'));



            /**Para los select del modal */
           
            //document.getElementById('modalidadadjudicacionmodal').value=dato20;//js pure.
            $('#modalidadadjudicacionmodal').val(button.data('modalidadadjudicacion'));
            $('#tipocontratomodal').val(button.data('tipocontrato'));
            $('#modalidadcontratomodal').val(button.data('modalidadcontrato'));
            $('#estadoactualmodal').val(button.data('estadoactual'));


            $('#id_contratomodal').val(button.data('id'));

            //Para el título del modal.

            $('#modal-title').html('Actualizando contrato: '+button.data('id'));

          
            /*Para llenar la tabla dinámicamente**/

            $.ajax({
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id_contrato": button.data('id'),
                },
                url: "{{ route('getdocsfromcontract') }}",
                type: 'post',
                dataType: "json",
                success: function(resp) {

                    /*una vez que el archivo recibe el request lo procesa y lo devuelve
                    y  construye la tabla dentro del modal con el nombre y tipo del documento de 
                    determinada fase
                    */
                    
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
          

          
     
        })
       
    </script>

<script src="{{asset('js/deletemodaldocument.js')}}"></script>
    @endsection