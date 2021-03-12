<!--- Modal para editar -->

<?php

use App\Models\DocumentType;
?>

<div class="modal fade" id="editarContrato" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('project.updatecontratacion')}}" method="POST">
                    @csrf

                    <input type="hidden" value="" name="id_contrato" id="id_contrato">


                    <div class="row">
                        <div class="col-md-12">
                            <label for=""><b>Datos de contacto de la entidad de adjudicación:</b></label>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="">Entidad de adjudicación</label>
                                    <input maxlength="50" type="text" class="form-control @error('entidadadjudicacion') is-invalid @enderror" name="entidadadjudicacion" id="entidadadjudicacionmodal" value="">
                                    @error('entidadadjudicacion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nombrecontacto">Nombre</label>
                                    <input type="text" name="nombrecontacto" id="nombrecontactomodal" class="form-control" value="">




                                </div>

                                <div class="form-group col-md-3">
                                    <label for="email">Correo electrónico</label>
                                    <input type="text" id="emailcontactomodal" maxlength="150" name="emailcontacto" class="form-control" value="">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="telefonocontactou">Télefono</label>
                                    <input type="text" minlength="10" maxlength="10" name="telefonocontactou" id="telefonocontactomodalu" class="form-control" value="">
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                        <label for="domiciliocontacto" style="font-weight:bold;">Domicilio</label>
                        <div class="form-row">
                        
                            <div class="form-group col-md-5">
                                
                                <!--<input type="text" id="domiciliocontacto" name="domiciliocontacto" class="form-control" value="">-->
                                <input type="hidden" name="id_address" id="id_address">
                                <label for="streetAddressmodal" >Calle</label>
                                <input type="text" id="streetAddressmodal" name="streetAddress" class="form-control" value="">
                                
                            </div>
                            <div class="form-group col-md-2" >
                                <label for="streetNummodal">Número</label>
                                <input type="text" id="streetNummodal" name="streetNum" class="form-control" value="">
                            </div>
                            <div class="form-group col-md-5" >
                                <label for="suburbmodal">Colonia</label>
                                <input type="text" id="suburbmodal" name="suburb" class="form-control" value="">
                            </div>
                            <div class="form-group col-md-5" >
                                <label for="localitymodal">Municipio</label>
                                <input type="text" id="localitymodal" name="locality" class="form-control" value="">
                            </div>
                            <div class="form-group col-md-2" >
                                <label for="postalCodemodal">Código postal</label>
                                <input type="text" minlength="5" maxlength="5" id="postalCodemodal" name="postalCode" class="form-control" value="">
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="">Fecha de publicación</label>
                            <input maxlength="50" type="date" class="form-control @error('fechapublicacionu') is-invalid @enderror" id="fechapublicacionmodalu" name="fechapublicacionu" value="">
                            @error('fechapublicacionu')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Nombre del responsable</label>
                            <input  type="text" class="form-control @error('nombreresponsable') is-invalid @enderror" name="nombreresponsable" id="nombreresponsablemodal" value="">
                            @error('nombreresponsable')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="">Modalidad de la adjudicación</label>


                            <select name="modalidadadjudicacion" id="modalidadadjudicacionmodal" class="form-control @error('modalidadadjudicacion') is-invalid @enderror">
                                <option value="">Seleccione una opción</option>
                                @foreach($catmodalidad_adjudicacion as $mod)

                                <option value="{{$mod->id}}">{{$mod->titulo}}</option>


                                @endforeach

                            </select>
                            @error('modalidadadjudicacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Tipo de contrato</label>

                            <select id="tipocontratomodal" class="form-control @error('tipocontrato') is-invalid @enderror" name="tipocontrato">
                                <option value="">Seleccione una opción</option>
                                @foreach($cattipo_contrato as $contrato)


                                <option value="{{$contrato->id}}">{{$contrato->titulo}}</option>


                                @endforeach
                            </select>
                            @error('tipocontrato')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">

                            <label for="">Modalidad de de contratación</label>


                            <select name="modalidadcontrato" id="modalidadcontratomodal" class="form-control @error('modalidadcontrato') is-invalid @enderror">
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
                        <div class="form-group col-md-6">

                            <label for="">Estado actual de la contratación</label>

                            <select name="estadoactual" id="estadoactualmodal" class="form-control @error('estadoactual') is-invalid @enderror">
                                <option value="">Seleccione una opción</option>
                                @foreach($contractingprocess_status as $contractstatus)

                                <option value="{{$contractstatus->id}}">{{$contractstatus->titulo}}</option>


                                @endforeach

                            </select>
                            @error('estadoactual')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">

                            <label for="">Empresas participantes</label>
                            <input type="text" class="form-control @error('empresasparticipantes') is-invalid @enderror" name="empresasparticipantes" id="empresasparticipantesmodal" value="">
                            @error('empresasparticipantes')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="form-group col-md-6">
                            <label for=""> Entidad administradora del contrato</label>
                            <input type="text" name="entidad_admin_contrato" id="entidad_admin_contratomodal" value="" class="form-control @error('entidad_admin_contrato') is-invalid @enderror" placeholder="Nombre del área o dependencia responsable de la administración y seguimiento del contrato">
                            @error('entidad_admin_contrato')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">

                            <label for="">Título del contrato</label>
                            <input  type="text" name="titulocontrato" id="titulocontratomodal" value="" class="form-control @error('titulocontrato') is-invalid @enderror" placeholder="Nombre o título de contrato">
                            @error('titulocontrato')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">


                        <div class="form-group col-md-6">
                            <label for="">Empresa contratada</label>
                            <input  type="text" class="form-control @error('empresacontratada') is-invalid @enderror" name="empresacontratada" id="empresacontratadamodal" value="">
                            @error('empresacontratada')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Vía por la que presenta su propuesta</label>
                            <input type="text" class="form-control @error('viapropuesta') is-invalid @enderror" name="viapropuesta" id="viapropuestamodal" value="">
                            @error('viapropuesta')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Fecha de presentación de su propuesta</label>
                            <input maxlength="50" type="date" class="form-control @error('fechapresentacionpropuestau') is-invalid @enderror" name="fechapresentacionpropuestau" id="fechapresentacionpropuestamodalu">
                            @error('fechapresentacionpropuestau')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Monto del contrato</label>
                            <input maxlength="50" type="number" class="form-control @error('montocontratou') is-invalid @enderror" name="montocontratou" id="montocontratomodalu">
                            @error('montocontratou')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="form-group col-md-6">

                            <label for="">Alcance del trabajo según el contrato</label>
                            <input  type="text" class="form-control @error('alcancecontrato') is-invalid @enderror" name="alcancecontrato" id="alcancecontratomodal">
                            @error('alacancecontrato')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">

                            <label for="">Fecha de inicio del contrato </label>
                            <input maxlength="50" type="date" class="form-control @error('fechainiciocontratou') is-invalid @enderror" name="fechainiciocontratou" id="fechainiciocontratomodalu" value="">
                            @error('fechainiciocontratou')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>

                    <div class="form-row">



                        <div class="form-group col-md-8">
                            <label for="">Duración del proyecto de acuerdo con lo establecido en el contrato</label>
                            <input maxlength="50" type="text" class="form-control @error('duracionproyecto_contrato') is-invalid @enderror" name="duracionproyecto_contrato" id="duracionproyecto_contratomodal" value="">
                            @error('duracionproyecto_contrato')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>




            </div>
            <!--before this go the data-->


            <div class="form-group col-md-12">
                <label for="observaciones">Observaciones:</label>
                <input type="text" name="observaciones" id="observacionesmodal" class="form-control" value="">
            </div>

            <div class="col-lg-12">

               


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Regresar</button>
                    <button type="submit" class="btn btn-primary btn-sm" id="btnedit">Actualizar</button>
                    </form>
                </div>
            </div>
            <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample5" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample5">

                        <h6 class="m-0 font-weight-bold text-primary">Documentos</h6>
                    </a>
                    <!-- Card Content - Collapse -->

                    <div class="collapse show" id="collapseCardExample5">
                        <div class="card-body">

                            <form action="{{route('agregarArchivoContrato')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id_project" value="{{$project->id}}">

                                <div class="form-row">
                                    <div class="col-md-12">
                                    <label for="">Seleccionar documentos</label>
                                  
                                    <p><small>El tamaño de los archivos debe ser menor a 20MB</small></p>
                                    <input required type="file" class="form-control" id="_documents" name="documentsupdate[]" multiple onchange="return validateSizeModal()">

                                    </div >
                                    
                                    <div class=col-md-12>
                                    
                                    <label for="documenttype">Tipo de documento</label>
                                    <select name="documenttypeupdate" required id="documenttypeupdate" class="form-control @error('documenttype') is-invalid @enderror">
                                        <option value="">Selecciona un opción</option>
                                        @foreach($documentstype as $type)

                                        <option value="{{$type->id}}">{{$type->titulo}}</option>

                                        @endforeach

                                    </select>
                                    </div>
                                    @error('documenttype')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                 
                                   
                                    <br>
                                    <hr>
                                    <div style="margin-top: 2%;" class="d-flex justify-content-end col-md-12">
                                    <input type="hidden" name="id_contrato" id="id_contratomodal">
                                   <input style=" color:black; font-weight:bold" class="btn btn-sm btn-warning" type="submit" name="" id="" value="Agregar documento">
                                    </div>
                                </div>
                                    </form>
                                    <div class="col-md-12 table-responsive">
                                    <label for="">Lista de documentos</label>
                                   
                                
                                 




                                    <table class="display table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Nombre del documento</th>
                                            <th>Tipo de documento</th>
                                            <th>Acciones</th>
                                        </tr>   
                                     </thead>
                                      


                                        <tbody id="cuerpodocumentos">
                                        
                                        </tbody>

                                    </table>
                                    </div>
                                  


                                </div>
                               
                     
                        </div>
                    </div>


                </div>
        </div>
    </div>

    <script>
    /**Para validación de tamaño de archivos */

function validateSizeModal(){
  if (!window.FileReader) { // This is VERY unlikely, browser support is near-universal
        console.log("The file API isn't supported on this browser yet.");
        return false;
    }

    var input = document.getElementById('_documents');
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
    </script>