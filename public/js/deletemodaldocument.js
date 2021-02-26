//Script que abre un modal para la eliminación de determinado documento
$('#deleteUserModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var name = button.data('name')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

    $('#doc_id').val(id);

    var modal = $(this)
    modal.find('.modal-title').text('Confirmar eliminación')
    modal.find('.name-user').text(name)
})