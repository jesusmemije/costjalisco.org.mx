<!--- Modal para editar -->


<div class="modal fade" id="modalRecurso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title">Actualizando estudio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="{{route('editarRecurso')}}" method="POST">
    
        @csrf
        <input type="hidden" id="id_recurso" name="id_recurso">
        <label for="">Origen del recurso</label>
    
    <select  id="" class="form-control" multiple name="origenrecursomodal">
    @foreach($catorigenrecurso as $origen)
   
   
    <option  value="{{$origen->id}}">{{$origen->titulo}}</option>

    @endforeach
    </select>   

    <label for="">Fondo o fuente de financiamiento y partida presupuestal</label>
    <input required maxlength="255" type="text" class="form-control @error('fuenterecurso') is-invalid @enderror" id="fuenterecursomodal" name="fuenterecursomodal">
    @error('fuenterecurso')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror


    <label for="">Fecha de aprobación del monto de recurso autorizado</label>
     
    <input required maxlength="50" type="date" class="form-control @error('fecharecurso') is-invalid @enderror" id="fecharecursomodal" name="fecharecursomodal" >
    @error('fecharecurso')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Regresar</button>
        <button type="submit" class="btn btn-primary btn-sm" id="btnedit">Actualizar</button>
        </form>
      </div>
    </div>
  </div>
</div>
