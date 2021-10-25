<!--- Modal para editar -->


<div class="modal fade" id="modalAmbiental" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title">Actualizando estudio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="{{route('editarAmbiental')}}" method="POST">
    
        @csrf
        <input type="hidden" id="id_estudio" name="id_estudio">
        <label for="">Estudios de Impacto Ambiental</label>
   
   <?php

   
   $check="";
    $i=0;

   ?> 

   @foreach($catambientals as $catambiental)  
   <div class="form-check">
 

   <input class="form-check-input" id="{{'radio'.$i}}" type="radio" name="tipomodalAmbiental" value="{{$catambiental->id}}">
<label class="form-check-label">
  {{$catambiental->titulo}}
</label>
   </div>
     
   <?php
    $i++;
    ?>
   @endforeach

   
    <label for="fechamodalAmbiental">Fecha de realización</label>
    <input required maxlength="50" type="date" class="form-control" id='fechamodalAmbiental' name="fechamodalAmbiental" >
    @error('fecharealizacionAmbiental')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    

   
    <label for="">Responsable del estudio</label>
    <input required maxlength="255" type="text" id='responsablemodalAmbiental' class="form-control @error('responsablemodalAmbiental') is-invalid @enderror" name="responsablemodalAmbiental">
    @error('responsableAmbiental')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <label for="numeros_ambiental">Número o números de identificación del estudio de impacto ambiental (En caso de ser más de uno favor de separarlos con una coma).</label>
    <input required type="text"  id="numerosmodal_ambiental" class="form-control" name="numerosmodal_ambiental">
 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Regresar</button>
        <button type="submit" class="btn btn-primary btn-sm" id="btnedit">Actualizar</button>
        </form>
      </div>
    </div>
  </div>
</div>
