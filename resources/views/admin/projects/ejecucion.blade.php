@extends("admin.layouts.app")

@section('styles')
@endsection

@section('content')
@include('admin.projects.phasesnav')
<?php
use App\Models\DocumentType;
?>

@foreach($contratos as $contrato)
<?php
    $ejecucion=DB::table('proyecto_ejecucion')
    ->where('id_contrato',$contrato->id)
    ->first();

   

    $btn=false;
    $ruta='project.saveejecucion';
    if($ejecucion==null){
        $ejecucion=new stdClass();
        $ejecucion->id="";
        $ejecucion->variacionespreciocontrato="";
        $ejecucion->razonescambiopreciocontrato="";
        $ejecucion->variacionesduracioncontrato="";
        $ejecucion->razonescambioduracioncontrato="";
        $ejecucion->variacionesalcancecontrato="";
        $ejecucion->razonescambiosalcancecontrato="";
        $ejecucion->aplicacionescalatoria="";
        $ejecucion->estadoactualproyecto="";
        $ejecucion->observaciones="";
        $contract_documents=DB::table('contract_documents')
        ->join('documents','contract_documents.id_document','=','documents.id')
        ->join('documenttype','documents.documenttype','=','documenttype.id')
        ->select('documents.id','documents.url','documenttype.titulo',
        'contract_documents.id_document')
        ->where('id_contrato','=',$ejecucion->id)
        ->get();
      
    }else{
        $btn=true;
        $ruta='project.updateejecucion';


        $contract_documents=DB::table('contract_documents')
    ->join('documents','contract_documents.id_document','=','documents.id')
    ->join('documenttype','documents.documenttype','=','documenttype.id')
    ->select('documents.id','documents.url','documenttype.titulo',
    'contract_documents.id_document')
    ->where('id_contrato','=',$ejecucion->id)
    ->get();
   
   // die();
    }
?>
    






<br>
<div class="card mb-4">
    @include('admin.layouts.partials.validation-error')

    @include('admin.layouts.partials.session-flash-status')
    <div class="card-header text-primary font-weight-bold m-0">
        Información de la fase de ejecución del proyecto. Contrato #{{$contrato->id}}
    </div>

    <div class="card-body">


        <form action="{{route($ruta)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($ejecucion!=null)
            <input type="hidden" value="{{$ejecucion->id}}" name="id_ejecucion">
            @endif
            <input type="hidden" value="{{$project->id}}" name="id_project">
            <input type="hidden" value="{{$contrato->id}}" name="id_contrato">
            <div class="form-row">
                 <!--
                <div class="form-group col-md-4">
                   
                    <label for="descripcion">Descripción</label>
                    <input id="descripcion" type="text" class="form-control" name='descripcion' value="{{old('descripcion',$project->descripcion)}}" placeholder="Descripción (opcional)">

                </div>
                -->
                <div class="form-group col-md-4">
                    <label for="">Variaciones en el precio del contrato</label>
                    <input maxlength="50" type="text" class="form-control-sm form-control @error('variacionespreciocontrato') is-invalid @enderror" name="variacionespreciocontrato" value="{{$ejecucion->variacionespreciocontrato}}">
                    @error('variacionespreciocontrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="">Razones de cambio en el precio del contrato</label>
                    <input maxlength="50" type="text" class="form-control-sm form-control @error('razonescambiopreciocontrato') is-invalid @enderror" name="razonescambiopreciocontrato" value="{{$ejecucion->razonescambiopreciocontrato}}">
                    @error('razonescambiopreciocontrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Variaciones en la duración del contrato</label>
                    <input  maxlength="50" type="text" class="form-control form-control-sm @error('variacionesduracioncontrato') is-invalid @enderror" name="variacionesduracioncontrato" value="{{$ejecucion->variacionesduracioncontrato}}">
                    @error('variacionesduracioncontrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="">Razones de cambio en la duración del contrato</label>
                    <input maxlength="50" type="text" name="razonescambioduracioncontrato" id="" class="form-control form-control-sm @error('razonescambioduracioncontrato') is-invalid @enderror" value="{{$ejecucion->razonescambioduracioncontrato}}">
                    @error('razonescambioduracioncontrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror


                </div>
                <div class="form-group col-md-4">
                    <label for="">Variaciones en el alcance del contrato</label>
                    <input  maxlength="50" name="variacionesalcancecontrato" type="text" class="form-control form-control-sm @error('variacionesalcancecontrato') is-invalid @enderror" value="{{$ejecucion->variacionesalcancecontrato}}">
                    @error('variacionesalcancecontrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">

                    <label for="">Razones de cambios en el alcance del contrato</label>
                    <input maxlength="50" name="razonescambiosalcancecontrato" type="text" class="form-control form-control-sm @error('razonescambiosalcancecontrato') is-invalid @enderror" value="{{$ejecucion->razonescambiosalcancecontrato}}">
                    @error('razonescambiosalcancecontrato')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="">Aplicación de escalatoria</label>
                    <input maxlength="50" name="aplicacionescalatoria" type="text" class="form-control form-control-sm @error('aplicacionescalatoria') is-invalid @enderror" value="{{$ejecucion->aplicacionescalatoria}}">
                    @error('aplicacionesescalatoria')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror



                </div>
                <div class="form-group col-md-4">

                    <label for="">Porcentaje de avance financiero del proyecto</label>
                    <input  maxlength="50" type="text" class="form-control form-control-sm @error('estadoactualproyecto') is-invalid @enderror" name="estadoactualproyecto" value="{{$ejecucion->estadoactualproyecto}}">
                    @error('estadoactualproyecto')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror



                </div>

            </div>
            <div class="form-row">
          <div class="form-group col-md-12">
        <label for="observaciones">Observaciones:</label>
        <input type="text" name="observaciones" id="observaciones" class="form-control" value="{{$ejecucion->observaciones}}">
          </div>
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

                <form>


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

    @include('admin.projects.modaldeletedocument')

</div>

@endforeach
<form action="{{route('siguientejecucion')}}" method="post">
@csrf
<input type="hidden" name="id_project" value="{{$project->id}}">
<div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-edit fa-sm text-white-50"></i>
                        {{'Siguiente' }}
                    </button>
                </div>

</form>

@endsection

@section('scripts')
<script src="{{asset('js/deletemodaldocument.js')}}"></script>
@endsection