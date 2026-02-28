function previewImage(event) {

    const file = event.target.files[0];
    if (!file) return;

    const nombreDisplay = document.getElementById('nombreArchivo');
    if (nombreDisplay) {
        nombreDisplay.innerHTML = `<span class="text-primary">Archivo: <strong>${file.name}</strong></span>`;
    }
}
