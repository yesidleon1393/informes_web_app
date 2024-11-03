document.addEventListener("DOMContentLoaded", () => {
    const informeForm = document.getElementById("myForm");

    if (informeForm) {
        informeForm.addEventListener("submit", async (e) => {
            e.preventDefault();

            const formData = new FormData(informeForm);
            const submitButton = document.getElementById('updateButton');
            const spinner = submitButton.querySelector('.spinner-border');
            const buttonText = submitButton.querySelector('.button-text');

            // Mostrar spinner y cambiar el texto del botón
            spinner.classList.remove('d-none');
            buttonText.textContent = 'Cargando...';

            // Deshabilitar el botón mientras se procesa la solicitud
            submitButton.disabled = true;

            try {
                const response = await fetch('actualizar.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.text();
                alert(result);

                // Redirigir al usuario a index.php si el resultado indica éxito
                if (response.ok) {
                    window.location.href = 'index.php';
                } else {
                    console.error('Error en la respuesta del servidor.');
                }

            } catch (error) {
                console.error('Error:', error);
            } finally {
                // Ocultar spinner y restaurar el botón después de que el proceso finalice
                spinner.classList.add('d-none');
                buttonText.textContent = 'Actualizar Informe';
                submitButton.disabled = false;
            }
        });
    } else {
        console.error("El formulario no se encontró en el DOM.");
    }
});
