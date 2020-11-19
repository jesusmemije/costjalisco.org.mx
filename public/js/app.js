$( document ).ready(function() {

    //Elimnar elementos
    $(".btnDelete").on({
        click: function (e) {
            e.preventDefault();
            var parent = $(this).data('id');
            var form = $(this).parent();
            Swal.fire({
                title: 'Advertencia',
                text: "¿Confirma eliminar este elemento y su contenido?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: 'Sí, Eliminar',
                cancelButtonText: "Cancelar",
                closeOnConfirm: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        }
    });
});