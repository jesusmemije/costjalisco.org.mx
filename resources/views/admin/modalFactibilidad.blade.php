<!--- Modal para editar -->


<div class="modal fade" id="modalFactibilidad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title">Actualizando estudio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="{{route('editarFactibilidad')}}" method="POST">
    
        @csrf
        <input type="hidden" id="id_estudio2" name="id_estudio">
       


        <label for="">Estudios de Factibilidad</label>
    <select  multiple class="form-control" id="" name="tipomodalFactibilidad" > 
    @foreach($catfacs as $catfac)

    <option value="{{$catfac->id}}">{{$catfac->titulo}}</option>

    @endforeach
    </select>

    <label for="">Fecha de realización</label>
    <input required maxlength="50" type="date" class="form-control @error('fecharealizacionFactibilidad') is-invalid @enderror" id="fechamodalFactibilidad" name="fechamodalFactibilidad" >
    @error('fecharealizacionFactibilidad')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
 

    <label for="">Responsable del estudio</label>
    <input required maxlength="255" type="text" class="form-control @error('responsableFactibilidad') is-invalid @enderror" id="responsablemodalFactibilidad" name="responsablemodalFactibilidad" >
    @error('responsableFactibilidad')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  

    <label for="numeros_factibilidad">Número o números de identificación del estudio de factibilidad. (En caso de ser más de uno favor de separarlos con una coma).</label>
    <input required type="text"   class="form-control" name="numerosmodal_factibilidad" id="numerosmodal_factibilidad">
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Regresar</button>
        <button type="submit" class="btn btn-primary btn-sm" id="btnedit">Actualizar</button>
        </form>
      </div>
    </div>
  </div>
</div>
