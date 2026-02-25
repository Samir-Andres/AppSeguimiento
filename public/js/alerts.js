document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('session-messages');
    const successMsg = container.dataset.success;
    const errorMsg = container.dataset.error;

    if (successMsg) {
        Swal.fire({
            icon: 'success',
            title: '¡Exito!',
            text: successMsg,
            timer: 3000,
            width: '400px', 
            padding: '1em', 
            color: '#1e293b',
            confirmButtonColor: '#6366f1',
             timerProgressBar: true,

                 didOpen: () => {
                
                    const timer = Swal.getPopup().querySelector("b");
                }
       
        });
    }

    if (errorMsg) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: errorMsg
        });
    }
});
