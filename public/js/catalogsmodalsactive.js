window.onload = function() {

    $('#deleteUserModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var name = button.data('name')
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

        name = name.replace(/,/g, ' ')
        var action = button.data('route')
        $('#formDelete').attr('action', action)
        $('#delete_id').val(id);
        var label = button.data('labeltxt')


        $('#test').val(label)

        var modal = $(this)
        modal.find('.modal-title').text('Confirmar eliminación')
        modal.find('.name-user').text(label + '   ' + name)
    })


}

$('#modaleditData').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var name = button.data('name')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    name = name.replace(/,/g, ' ')
    var title = button.data('title')
    var action = button.data('route')
    $('#formEdit').attr('action', action)

    var labelbi = button.data('labelbi');
    var label = button.data('labeltxt')
    var btn = button.data('btn');
    $('#labelbi').html(labelbi);
    $('#oldname').val(name);

    $('#edit_id').val(id);
    $('#btnedit').html(btn)


    var modal = $(this)
    modal.find('.modal-title').text(title)

})



$('#modalnewData').on('show.bs.modal', function(event) {




    var button = $(event.relatedTarget)
    var title = button.data('title')

    var action = button.data('route')

    var lbl = button.data('lbl');
    $('#formnew').attr('action', action)
    $('#lbl').html(lbl);
    var modal = $(this)


    $('#btnsave').html(button.data('btn'));


    modal.find('.modal-title').text(title)

});