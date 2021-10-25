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
<?php
use App\Models\DocumentType;
$num_doc=0;
?>
    @include('admin.layouts.partials.validation-error')

@include('admin.layouts.partials.session-flash-status')
@foreach($contratos as $contrato)
<?php
    $finalizacion=DB::table('proyecto_finalizacion')
    ->where('id_contrato',$contrato->id)
    ->first();



    $btn=false;
    $ruta='project.savefinalizacion';
    if($finalizacion==null){
        $finalizacion=new stdClass();
        $finalizacion->id="";
        $finalizacion->costofinalizacion="";
        $finalizacion->fechafinalizacion="";
        $finalizacion->alcancefinalizacion="";
        $finalizacion->razonescambioproyecto="";
        $finalizacion->referenciainforme="";
        $finalizacion->observaciones="";
        //Obtiene los documentos relacionados al id de finalización.
        $contract_documents=DB::table('contract_documents')
        ->join('documents','contract_documents.id_document','=','documents.id')
        ->join('documenttype','documents.documenttype','=','documenttype.id')
        ->select('documents.id','documents.url','documenttype.titulo',
        'contract_documents.id_document')
        ->where('id_finalizacion','=',$finalizacion->id)
        ->get();
      
    }else{
      
        $btn=true;
        $ruta='project.updatefinalizacion';


        $contract_documents=DB::table('contract_documents')
    ->join('documents','contract_documents.id_document','=','documents.id')
    ->join('documenttype','documents.documenttype','=','documenttype.id')
    ->select('documents.id','documents.url','documenttype.titulo',
    'contract_documents.id_document')
    ->where('id_finalizacion','=',$finalizacion->id)
    ->get();

    }
?>

<div class="card mb-4">

    <div class="card-header text-primary font-weight-bold m-0">
        Información referente a la finalización del proyecto
    </div>

    <div class="card-body">


        <form action="{{route($ruta)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($finalizacion!=null)
            <input type="hidden" value="{{$finalizacion->id}}" name="id_finalizacion">
            @endif
            <input type="hidden" value="{{$project->id}}" name="id_project">
            <input type="hidden" value="{{$contrato->id}}" name="id_contrato">
            <div class="form-row">
              
                <div class="form-group col-md-2">
                    <label for="">Costo de finalización</label>
                    <input maxlength="50" type="number" class="form-control @error('costofinalizacion') is-invalid @enderror" name="costofinalizacion" value="{{old('costofinalizacion',$finalizacion->costofinalizacion)}}">
                    @error('costofinalizacion')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-2">
                    @php 

                    if($finalizacion->fechafinalizacion==null ||$finalizacion->fechafinalizacion=="" ){
                        $finalizacion->fechafinalizacion="0000-00-00 00:00:00";
                    }

                    $date = date('Y-m-d', strtotime($finalizacion->fechafinalizacion));
                    @endphp


                    <label for="">Fecha de finalización</label>
                    <input  maxlength="50" type="date" class="form-control @error('fechafinalizacion') is-invalid @enderror" name="fechafinalizacion" value="{{old('fechafinalizacion',$date)}}">
                    @error('fechafinalizacion')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group col-md-4">
                    <label for="">Alcance a la finalización</label>
                    <input  maxlength="50" type="text" name="alcancefinalizacion" id="" class="form-control @error('alcancefinalizacion') is-invalid @enderror" value="{{old('alcancefinalizacion',$finalizacion->alcancefinalizacion)}}">
                    @error('alcancefinalizacion')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">


                <div class="form-group col-md-6">
                    <label for="">Razones de cambio en el proyecto</label>
                    <input  maxlength="50" name="razonescambioproyecto" type="text" class="form-control @error('razonescambioproyecto') is-invalid @enderror" value="{{old('razonescambioproyecto',$finalizacion->razonescambioproyecto)}}">
                    @error('razonescambioproyecto')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">

                    <label for="">Referencia a informes de auditoría y evaluación</label>
                    <input maxlength="50" name="referenciainforme" type="text" class="form-control form-control-sm @error('referenciainforme') is-invalid @enderror" value="{{old('referenciainforme',$finalizacion->referenciainforme)}}">
                    @error('referenciainforme')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror



                </div>



            </div>
            <div class="form-row">
          <div class="form-group col-md-12">
        <label for="observaciones">Observaciones:</label>
        <input type="text" name="observaciones" id="observaciones" class="form-control" value="{{old('observaciones',$finalizacion->observaciones)}}">
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

                <form>


                    <div class="form-row">
                        <div class="form-group">
                            <label for="">Seleccionar documentos</label>
                            <p><small>El tamaño de los archivos debe ser menor a 20MB</small></p>
                            <input type="file" class="form-control" id="<?php echo "documents".$num_doc; ?>" name="documents[]" multiple onchange='return validateSize(<?php echo "documents".$num_doc?>)'>


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

    
           
              
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-warning shadow-sm offset-md-10" style="color: black; font-weight:bold">
                 
                    {{ $btn ? 'Actualizar' : 'Guardar' }}
                </button>
            </div>
           


    </div>
    <!--before this go the data-->


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
                                        @foreach($contract_documents as $document)
                                            <?php
                                          

                                            $ruta = 'documents/' . $document->url;
                                          
                                           

                                            ?>


                                            <tr>
                                                <td>
                                                    <a target="_blank" class="badge badge-pill badge-info" href="{{asset($ruta)}}">{{$document->url}}</a>
                                                </td>
                                                <td>
                                                 {{$document->titulo}}
                                                </td>
                                                <td>

                                                    <a id="deldoc" href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteUserModal" data-id="{{ $document->id }}" data-name="{{ $document->url }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>


                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>

                                    </table>
                                    </div>

</div>

@php

$num_doc++;
@endphp

@endforeach




@include('admin.projects.modaldeletedocument')



@endsection

@section('scripts')
<script src="{{asset('js/deletemodaldocument.js')}}"></script>

<script>
/**Para validación de tamaño de archivos */

function validateSize(data){
  if (!window.FileReader) { // This is VERY unlikely, browser support is near-universal
        console.log("The file API isn't supported on this browser yet.");
        return false;
    }

    var input = document.getElementById(data.id);
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
@endsection