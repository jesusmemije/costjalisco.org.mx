<!--- Modal para editar -->


<div class="modal fade" id="modalImpacto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title">Actualizando estudio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="{{route('editarImpacto')}}" method="POST">
    
        @csrf
        <input type="hidden" id="id_estudio3" name="id_estudio">
        <label for="">Estudios de Impacto en el terreno y asentamientos </label>
    <select  multiple class="form-control" id="exampleFormControlSelect2" name="tipoImpacto"> 
    
   
    @foreach($catimpactos as $impacto)
   
      <option value="{{$impacto->id}}" >{{$impacto->titulo}}</option>

    @endforeach
    </select>

    <label for="">Fecha de realización</label>
    
    <input required maxlength="50" type="date" class="form-control @error('fecharealizacionImpacto') is-invalid @enderror" id="fechamodalImpacto" name="fechamodalImpacto">
    @error('fecharealizacionImpacto')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror

     <label for="">Responsable del estudio</label>
    <input required maxlength="255" type="text" class="form-control @error('responsableImpacto') is-invalid @enderror" id="responsablemodalImpacto" name="responsablemodalImpacto" >
    @error('responsableImpacto')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
   
    <label for="numeros_impacto">Número o números de identificación del estudio del impacto en el terreno y asentamientos (En caso de ser más de uno favor de separaros con una coma)</label>
    <input required type="text"  class="form-control" name="numerosmodal_impacto" id="numerosmodal_impacto">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Regresar</button>
        <button type="submit" class="btn btn-primary btn-sm" id="btnedit">Actualizar</button>
        </form>
      </div>
    </div>
  </div>
</div>
