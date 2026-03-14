document.querySelectorAll(".btn-aprobar-bitacora").forEach(boton => {

    boton.addEventListener("click", function () {

        let url = this.dataset.url;
        let nombre = this.dataset.nombre;

        Swal.fire({
            title: "¿Deseas aceptar de la bitácora?",
            text: "Del aprendiz: " + nombre,
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Sí, cambiar",
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#3DB8E5",
            cancelButtonColor: "#ef4444",
            width: '500px'
        }).then((result) => {

            if (result.isConfirmed) {

                let form = document.getElementById("form-aprobar-bitacora");
                form.action = url;
                form.submit();

            }

        });

    });

});
