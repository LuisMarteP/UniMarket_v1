// Validación del formulario Login
async function frmLogin(e) {
    e.preventDefault();

    const email = document.getElementById("inputEmail");
    const pass = document.getElementById("inputPassword");
    const alerta = document.getElementById("alerta");

    // Validar que los campos no estén vacíos
    if (email.value.trim() === "" || pass.value.trim() === "") {
        mostrarAlerta(alerta, "Por favor, completa todos los campos.", "danger");
        return;
    }

    // Preparar datos del formulario
    const formData = new FormData();
    formData.append("email", email.value);
    formData.append("pass", pass.value);

    const response = await fetch(base_url + "Usuarios/validar", {
        method: "POST",
        body: formData,
    });

    const resText = await response.text();
    console.log("Respuesta del servidor:", resText);

    try {
        const res = JSON.parse(resText);

        if (res.status == "success") {
            limpiarFormulario(); // Limpiar el formulario
            window.location = base_url + "Usuarios";
        } else {
            mostrarAlerta(alerta, res.message, "danger");
        }
    } catch (error) {
        console.error("Error al parsear JSON:", error);
        mostrarAlerta(alerta, "Error inesperado. Inténtalo más tarde.", "danger");
    }
}

function limpiarFormulario() {
    document.getElementById("inputEmail").value = "";
    document.getElementById("inputPassword").value = "";
}

function mostrarAlerta(elemento, mensaje, tipo, duracion = 3000) {
    if (!elemento) {
        console.error("Elemento no encontrado para mostrar alerta.");
        return;
    }

    // Limpia temporizador anterior si existe
    if (elemento.timerId) {
        clearTimeout(elemento.timerId);
    }

    // Asegúrate de que la alerta esté visible y actualiza su contenido
    elemento.style.display = "block";
    elemento.style.opacity = "1"; // Asegura que sea visible inmediatamente
    elemento.className = `alert alert-${tipo}`; // Actualiza las clases
    elemento.innerHTML = mensaje; // Inserta el mensaje

    // Inicia un nuevo temporizador para ocultar la alerta
    elemento.timerId = setTimeout(() => {
        limpiarAlerta(elemento);
        delete elemento.timerId;
    }, duracion);
}

function limpiarAlerta(elemento) {
    if (!elemento) {
        console.error("Elemento no encontrado para limpiar alerta.");
        return;
    }

    // Oculta con una transición
    elemento.style.opacity = "0";
    setTimeout(() => {
        elemento.style.display = "none";
        elemento.className = ""; // Limpia todas las clases
        elemento.innerHTML = ""; // Limpia el contenido
    }, 500); // Ajusta al tiempo de transición (si usas CSS)
}