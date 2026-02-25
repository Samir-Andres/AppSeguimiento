document.addEventListener('DOMContentLoaded', function() {

    const formularios = document.querySelectorAll('.form-eliminar');

    formularios.forEach(formulario => {
        formulario.addEventListener('submit', function(e) {
            // Detener el envío inmediato
            e.preventDefault();

            // 3. Lanzar la confirmación
            Swal.fire({

                title: '¿Confirmar eliminación?',
                text: "Esta acción no se puede deshacer",
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                width: '400px',
                timer: 6000,
                timerProgressBar: true,

                 didOpen: () => {

                    const timer = Swal.getPopup().querySelector("b");
                }
            }).then((result) => {

                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });
});
