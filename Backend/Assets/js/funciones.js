let tblUsuarios;

document.addEventListener("DOMContentLoaded", function () {
    inicializarTablaUsuarios();
});

function inicializarTablaUsuarios() {
    const tblUsuariosElement = document.querySelector("#tblUsuarios");

    if (tblUsuariosElement) {
        fetch(base_url + "Usuarios/listar")
            .then(response => response.json())
            .then(data => {
                if (typeof tblUsuarios !== 'undefined') {
                    tblUsuarios.destroy(); // Destruir la tabla si ya está inicializada
                }

                tblUsuariosElement.querySelector("tbody").innerHTML = ""; // Limpiar contenido

                data.forEach(usuario => {
                    const row = `
                        <tr>
                            <td>${usuario.ID_Usuario}</td>
                            <td>${usuario.nombre_rol}</td>
                            <td>${usuario.nombre_est}</td>
                            <td>${usuario.Nombre_Usu}</td>
                            <td>${usuario.Apellido_Usu}</td>
                            <td>${usuario.Correo_Usu}</td>
                            <td>${usuario.Telefono_Usu}</td>
                            <td>${usuario.Fecha_Registro_Usu}</td>
                            <td>${usuario.recibir_notificaciones}</td>
                            <td>${usuario.acepto_terminos}</td>
                            <td>${usuario.acciones}</td>
                            <td>${usuario.acciones1}</td>
                        </tr>`;
                    tblUsuariosElement.querySelector("tbody").innerHTML += row;
                });

                // Inicializar de nuevo la tabla
                tblUsuarios = new simpleDatatables.DataTable(tblUsuariosElement);
            })
            .catch(error => console.error("Error al cargar los datos:", error));
    }
}

// Validación del formulario Login
function frmLogin(e) {
    e.preventDefault();

    const email = document.getElementById("inputEmail");
    const pass = document.getElementById("inputPassword");
    const alerta = document.getElementById("alerta");

    if (email.value.trim() === "" || pass.value.trim() === "") {
        mostrarAlerta(alerta, "Por favor, completa todos los campos.", "danger");
        return;
    }

    const url = base_url + "Usuarios/validar";
    const frm = document.getElementById("frmLogin");
    const http = new XMLHttpRequest();

    http.open("POST", url, true);
    http.send(new FormData(frm));

    http.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            try {
                const res = JSON.parse(this.responseText);
                if (res.status === "success" && res.message === "ok") {
                    window.location = base_url + "Usuarios";
                } else {
                    mostrarAlerta(alerta, res.message, "danger");
                }
            } catch (error) {
                console.error("Error al procesar la respuesta del servidor:", error);
            }
        }
    };
}

// Mostrar modal de registro
function frmRegistrar() {
    document.getElementById("title").innerHTML = "Nuevo Usuario";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("btnAccion").setAttribute("data-action", "registrar");
    document.getElementById("claves").classList.remove("d-none");
    document.getElementById("Est").disabled = true;

    document.getElementById("frmRegistrar").reset();
    $("#Registrar").modal("show");
}

function msgConfirmacion() {
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Usuario Registrado",
        showConfirmButton: false,
        timer: 1500
    });
}

// Validación y registro de usuario
async function RegistrarUser(e) {
    e.preventDefault();

    const frm = document.getElementById("frmRegistrar");
    const alerta = document.getElementById("alerta");

    const rol = document.getElementById("Rol").value.trim();
    const nombre = document.getElementById("inputNombre").value.trim();
    const apellido = document.getElementById("inputApellido").value.trim();
    const correo = document.getElementById("inputCorreo").value.trim();
    const telefono = document.getElementById("inputTelefono").value.trim();
    const contraseña = document.getElementById("inputContraseña").value.trim();
    const confContraseña = document.getElementById("inputConfContraseña").value.trim();

    // Validación de campos vacíos
    if (!rol || !nombre || !apellido || !correo || !telefono || !contraseña || !confContraseña) {
        mostrarAlerta(alerta, "Por favor, completa todos los campos.", "danger");
        return;
    }

    // Validación del correo electrónico
    if (!esCorreoValido(correo)) {
        mostrarAlerta(alerta, "Por favor, ingresa un correo electrónico válido.", "danger");
        return;
    }

    // Validación de contraseñas
    if (contraseña !== confContraseña) {
        mostrarAlerta(alerta, "Las contraseñas no coinciden.", "danger");
        return;
    }

    try {
        const response = await fetch(base_url + "Usuarios/registrar", {
            method: "POST",
            body: new FormData(frm),
        });

        const res = await response.json();

        if (res.status === "success") {
            Swal.fire({
                icon: "success",
                title: "¡Éxito!",
                text: "Usuario registrado con éxito.",
                showConfirmButton: false,
                timer: 1500,
            });
            inicializarTablaUsuarios();
            frm.reset();
            $("#Registrar").modal("hide");
        } else {
            mostrarAlerta(alerta, res.message || "Ocurrió un problema.", "danger");
        }
    } catch (error) {
        console.error("Error en la solicitud:", error);
        Swal.fire({
            icon: "error",
            title: "Error inesperado",
            text: "Ocurrió un problema al procesar la solicitud.",
        });
    }
}

function esCorreoValido(correo) {
    // Expresión regular para validar un correo electrónico
    const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regexCorreo.test(correo);
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

// Función para habilitar la edición al cargar un usuario
function CargarUsuario(id) {
    fetch(`Usuarios/getUsuario/${id}`)
        .then((res) => res.json())
        .then((usuario) => {
            document.getElementById("rol").disabled = false; // Habilitar el select
        });
}

// Función para deshabilitar una cuenta
function inhabilitarUsuario(id) {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "¡El usuario será inhabilitado!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, inhabilitar",
        cancelButtonText: "Cancelar",
    }).then(result => {
        if (result.isConfirmed) {
            fetch(base_url + "Usuarios/inhabilitar", {
                method: "POST",
                body: JSON.stringify({ ID_Usuario: id }),
                headers: { "Content-Type": "application/json" },
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        Swal.fire("Inhabilitado", "El usuario ha sido inhabilitado.", "success").then(() => location.reload());
                    } else {
                        Swal.fire("Error", "No se pudo inhabilitar el usuario.", "error");
                    }
                });
        }
    });
}
// Boton para usar la funcion deshabilitar una cuenta
function btnDeleteUser(id) {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "¡Esta cuenta ya no tendra acceso al sistema!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, inhabilítar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/inhabilitar";
            const http = new XMLHttpRequest();
            http.open("POST", url, true);
            http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            http.send("ID_Usuario=" + id);

            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    try {
                        const res = JSON.parse(this.responseText); // Analizar la respuesta JSON
                        console.log("Respuesta del backend:", res);

                        if (res.status === "success") {
                            Swal.fire({
                                title: "Inhabilitado",
                                text: "El usuario ha sido inhabilitado.",
                                icon: "success"
                            }).then(() => {
                                // Aquí puedes agregar la lógica para recargar la tabla de usuarios, por ejemplo:
                                location.reload(); // Recarga la página para actualizar los datos
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: "Error al inhabilitar usuario.",
                                icon: "error"
                            });
                        }
                    } catch (error) {
                        console.error("Error al procesar la respuesta del backend:", error);
                        Swal.fire({
                            title: "Error inesperado",
                            text: "Ocurrió un problema al procesar la respuesta del servidor.",
                            icon: "error"
                        });
                    }
                }
            };
        }
    });
}

function btnEditUser(id) {
    document.getElementById("title").innerHTML = "Editar Usuario";
    document.getElementById("btnAccion").innerHTML = "Editar"; 
    document.getElementById("btnAccion").setAttribute("data-action", "editar");
    document.getElementById("Est").disabled = false;
    const url = base_url + "Usuarios/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.ID_Usuario; //cargar el id en el input oculto en el form
            document.getElementById("Rol").value = res.ID_Rol_Usu; //cargar el rol en el select rol
            document.getElementById("Est").value = res.ID_Estatus; //cargar el rol en el select estatus
            document.getElementById("inputNombre").value = res.Nombre_Usu; //cargar el nombre en el inputNombre en el form
            document.getElementById("inputApellido").value = res.Apellido_Usu; //cargar el Apellido en el inputApellido en el form
            document.getElementById("inputCorreo").value = res.Correo_Usu; //cargar el Correo en el inputCorreo en el form
            document.getElementById("inputTelefono").value = res.Telefono_Usu; //cargar el telefono en el inputTelefono en el form
            document.getElementById("claves").classList.add("d-none"); //Quitar los campos para la contraseña
            $("#Registrar").modal("show") // Abrir el form
        }
    };
}

function handleAction(e) {
    const action = document.getElementById("btnAccion").getAttribute("data-action");
    if (action === "registrar") {
        //console.log("Registrando");
        RegistrarUser(e);
    } else if (action === "editar") {
        //console.log("Editando");
        EditarUser(e);
        
    }
}

async function EditarUser(e) {
    e.preventDefault();

    const alerta = document.getElementById("alerta");
    const frm = document.getElementById("frmRegistrar");
    
    const id = document.getElementById("id").value.trim();
    const rol = document.getElementById("Rol").value.trim();
    const est = document.getElementById("Est").value.trim();
    const nombre = document.getElementById("inputNombre").value.trim();
    const apellido = document.getElementById("inputApellido").value.trim();
    const correo = document.getElementById("inputCorreo").value.trim();
    const telefono = document.getElementById("inputTelefono").value.trim();
     
    // Validación de campos vacíos
    if ( !id || !rol || !nombre || !apellido || !correo || !telefono || !est ) {
        mostrarAlerta(alerta, "Por favor, completa todos los campos.", "danger");
        return;
    }

    // Validación del correo electrónico
    if (!esCorreoValido(correo)) {
        mostrarAlerta(alerta, "Por favor, ingresa un correo electrónico válido.", "danger");
        return;
    }

    try {
        const response = await fetch(base_url + "Usuarios/editarUser", { //funcion para guardar los datos a editar
            method: "POST",
            body: new FormData(frm),
        });

        const res = await response.json();

        if (res.status === "success") {
            Swal.fire({
                icon: "success",
                title: "¡Éxito!",
                text: "Usuario editado con éxito.",
                showConfirmButton: false,
                timer: 1500,
            });
            inicializarTablaUsuarios();
            frm.reset();
            $("#Registrar").modal("hide");
        } else {
            mostrarAlerta(alerta, res.message || "Ocurrió un problema.", "danger");
        }
    } catch (error) {
        console.error("Error en la solicitud:", error);
        Swal.fire({
            icon: "error",
            title: "Error inesperado",
            text: "Ocurrió un problema al procesar la solicitud.",
        });
    }
}

