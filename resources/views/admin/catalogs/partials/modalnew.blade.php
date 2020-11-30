<div class="modal fade" id="modalnewData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formnew" action="" method="POST">
        @csrf
        <label for="name" id="lbl"></label>
          <input type="text" name="titulo" id="name" class="form-control">
          <input type="hidden" id="name_sector" name="name_sector">
         
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Regresar</button>
        <button type="submit" class="btn btn-primary btn-sm" id="btnsave"></button>
        </form>
      </div>
    </div>
  </div>
</div>
