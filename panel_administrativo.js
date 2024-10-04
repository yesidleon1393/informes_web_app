document.addEventListener('DOMContentLoaded', function() {
    // Llama a la función para cargar los informes al cargar la página
    loadInformes();

    // Delegación de eventos para manejar acciones en los botones dentro de la tabla
    document.getElementById('informes').addEventListener('click', function(event) {
        const target = event.target;
        const row = target.closest('tr');

        if (!row || !row.dataset.id) return;

        const id = row.dataset.id;

        if (target.closest('.btn-warning')) {
            editInforme(id);
        } else if (target.closest('.btn-info')) {
            exportInforme(id);
        } else if (target.closest('.btn-danger')) {
            deleteInforme(id);
        }
    });

    // Actualizar informes al hacer clic en el botón updateButton
    const updateButton = document.getElementById('updateButton');
    if (updateButton) {
        updateButton.addEventListener('click', function() {
            loadInformes();
        });
    }
});

function loadInformes() {
    fetch('cargar_informes.php')
    .then(response => response.json())
    .then(data => {
        const tableBody = document.getElementById('informes');
        tableBody.innerHTML = ''; // Limpia el contenido actual
        const fragment = document.createDocumentFragment();

        if (data.informes && data.informes.length > 0) {
            data.informes.forEach(informe => {
                const row = document.createElement('tr');
                row.dataset.id = informe.id;
                row.innerHTML = `
                    <td>${informe.id}</td>
                    <td>${informe.nombre_equipo}</td>
                    <td>${informe.nombre_cliente}</td>
                    <td>${informe.fecha_evaluacion}</td>
                    <td>${informe.telefono}</td>
                    <td class="actions">
                        <button class="btn btn-warning btn-sm" title="Editar">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-info btn-sm" title="Exportar">
                            <i class="fas fa-file-export"></i>
                        </button>                     
                        <button class="btn btn-danger btn-sm" title="Eliminar">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                `;
                fragment.appendChild(row);
            });
            tableBody.appendChild(fragment);
        } else {
            const row = document.createElement('tr');
            row.innerHTML = '<td colspan="6">No se encontraron informes.</td>';
            tableBody.appendChild(row);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        const row = document.createElement('tr');
        row.innerHTML = '<td colspan="6">Error al cargar los informes.</td>';
        document.getElementById('informes').appendChild(row);
    });
}

function editInforme(id) {
    // Abrir una nueva pestaña con el formulario de edición
    window.open(`editar.php?id=${id}`, '_blank');
}

function exportInforme(id) {
    const exportButton = document.querySelector(`tr[data-id="${id}"] .btn-info`);
    const originalIcon = exportButton.innerHTML; // Guarda el contenido original del botón
    exportButton.disabled = true; // Deshabilita el botón para evitar múltiples clics
    exportButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>'; // Cambia a un spinner

    fetch(`obtener_informe.php?id=${id}`)
    .then(response => response.json())
    .then(informe => {
        if (informe.success === false) {
            throw new Error(informe.message || 'Error desconocido');
        }

        const webhookUrl = 'https://hook.eu2.make.com';
        return fetch(webhookUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(informe),
        });
    })
    .then(response => {
        if (response.ok) {
            alert("Informe exportado exitosamente.");
        } else {
            alert("Error al exportar el informe.");
        }
    })
    .catch(error => {
        console.error('Error al exportar el informe:', error);
        alert("Error al exportar el informe. Verifica la consola para más detalles.");
    })
    .finally(() => {
        exportButton.disabled = false; // Habilita el botón nuevamente
        exportButton.innerHTML = originalIcon; // Restaura el icono original
    });
}

function deleteInforme(id) {
    if (confirm("¿Estás seguro de que quieres eliminar este informe?")) {
        const deleteButton = document.querySelector(`tr[data-id="${id}"] .btn-danger`);
        const originalIcon = deleteButton.innerHTML; // Guarda el contenido original del botón
        deleteButton.disabled = true; // Deshabilita el botón
        deleteButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>'; // Cambia a un spinner

        fetch('eliminar_informe.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `id=${id}`
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al eliminar el informe.');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                alert("Informe eliminado exitosamente.");
                loadInformes();
            } else {
                alert("Error al eliminar el informe.");
            }
        })
        .catch(error => {
            console.error('Error al eliminar el informe:', error);
            alert("Error al eliminar el informe.");
        })
        .finally(() => {
            deleteButton.disabled = false; // Habilita el botón nuevamente
            deleteButton.innerHTML = originalIcon; // Restaura el icono original
        });
    }
}