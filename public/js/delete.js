<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

$('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Você tem certeza?',
        text: 'Este registro será permanentemente deletado!',
        icon: 'warning',
        buttons: ["Cancelar", "Sim!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
