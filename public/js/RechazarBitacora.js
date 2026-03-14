document.querySelectorAll(".btn-rechazar-bitacora").forEach(boton => {

    boton.addEventListener("click", function () {

        let url = this.dataset.url;
        let nombre = this.dataset.nombre;

        Swal.fire({
            title: "¿Quieres rechazar la bitácora?",
            text: "Del aprendiz: " + nombre,
            icon: "error",
            showCancelButton: true,
            confirmButtonText: "Sí, Rechazar",
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#ef4444",
            cancelButtonColor: "#3DB8E5",
            width: '500px',
            timer: 6000,
            timerProgressBar: true,

        }).then((result) => {

            if (result.isConfirmed) {

                let form = document.getElementById("form-rechazar-bitacora");
                form.action = url;
                form.submit();

            }

        });

    });

});
