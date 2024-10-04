document.addEventListener("DOMContentLoaded", () => {
    const informeForm = document.getElementById("myForm");

    if (informeForm) {
        informeForm.addEventListener("submit", async (e) => {
            e.preventDefault();

            // Obtener el botón de envío y el spinner dentro del botón
            const submitButton = document.getElementById('updateButton');
            const spinner = submitButton.querySelector('.spinner-border');
            const buttonText = submitButton.querySelector('.button-text');

            // Mostrar el spinner y deshabilitar el botón
            spinner.classList.remove('d-none'); // Mostrar el spinner
            buttonText.textContent = 'Enviando...'; // Cambiar el texto del botón
            submitButton.disabled = true; // Deshabilitar el botón para evitar múltiples clics

            const formData = new FormData(informeForm);

            try {
                const response = await fetch('guardar_informe.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.text();
                alert(result);

                // Redirigir al usuario si la respuesta es exitosa
                if (response.ok) {
                    window.location.href = 'index.php';
                } else {
                    console.error('Error en la respuesta del servidor.');
                }

            } catch (error) {
                console.error('Error:', error);
                alert("Ocurrió un error al enviar el formulario. Por favor, intenta de nuevo.");
            } finally {
                // Restaurar el contenido original del botón y habilitarlo
                spinner.classList.add('d-none'); // Ocultar el spinner
                buttonText.textContent = 'Actualizar Informe'; // Restaurar el texto original
                submitButton.disabled = false; // Habilitar el botón nuevamente
            }
        });
    } else {
        console.error("El formulario no se encontró en el DOM.");
    }
});
