//Este script hace que no se puedan seleccionar más de dos tipos
document.addEventListener('DOMContentLoaded', function () {
    const tiposCheckbox = document.querySelectorAll('input[name="tipos[]"]');
    const formulario = document.querySelector('form');

    tiposCheckbox.forEach((checkbox) => {
        checkbox.addEventListener('change', function () {
            const tiposSeleccionados = Array.from(tiposCheckbox).filter(
                (checkbox) => checkbox.checked
            )
            if (tiposSeleccionados.length > 2) {
                // Se desmarca el checkbox si se eligieron más de 2
                this.checked = false;
            }
        });
    });
});