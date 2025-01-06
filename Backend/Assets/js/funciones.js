document.addEventListener("DOMContentLoaded", function () {
    const tblUsuarios = document.querySelector("#tblUsuarios");

    if (tblUsuarios) {
        fetch(base_url + "Usuarios/listar")
            .then(response => response.json())
            .then(data => {
                const tableBody = tblUsuarios.querySelector("tbody");
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
tableBody.innerHTML += row;

                });

                // Inicializar tabla
                new simpleDatatables.DataTable(tblUsuarios);
            })
            .catch(error => console.error("Error al cargar los datos:", error));
    }
});

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
    document.getElementById("title").innerHTML = "Nuevo Usuario"
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("btnAccion").setAttribute("data-action", "editar");
    document.getElementById("claves").classList.remove("d-none");
    document.getElementById("Est").disabled = true;

    document.getElementById("frmRegistrar").reset();
    $("#Registrar").modal("show");
}

// Validación y registro de usuario
function RegistrarUser(e) {
    e.preventDefault();

    const rol = document.getElementById("Rol");
    const nombre = document.getElementById("inputNombre");
    const apellido = document.getElementById("inputApellido");
    const correo = document.getElementById("inputCorreo");
    const telefono = document.getElementById("inputTelefono");
    const contraseña = document.getElementById("inputContraseña");
    const confContraseña = document.getElementById("inputConfContraseña");
    const alerta = document.getElementById("alerta");

    if (
        rol.value.trim() === "" || nombre.value.trim() === "" ||
        apellido.value.trim() === "" || correo.value.trim() === "" ||
        telefono.value.trim() === "" || contraseña.value.trim() === "" ||
        confContraseña.value.trim() === ""
    ) {
        mostrarAlerta(alerta, "Por favor, completa todos los campos.", "danger");
        return;
    }

    if (contraseña.value.trim() !== confContraseña.value.trim()) {
        mostrarAlerta(alerta, "Las contraseñas no coinciden.", "danger");
        return;
    }

    const url = base_url + "Usuarios/registrar";
    const frm = document.getElementById("frmRegistrar");
    const http = new XMLHttpRequest();

    http.open("POST", url, true);
    http.send(new FormData(frm));

    http.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            try {
                const res = JSON.parse(this.responseText);

                // Si el registro fue exitoso
                if (res.status === "success") {
                    Swal.fire({
                        icon: "success",
                        title: "¡Éxito!",
                        text: "Usuario registrado con éxito.",
                        showConfirmButton: false,
                        timer: 1500,
                    });

                    // Limpiar el formulario
                    frm.reset();
                } else {
                    // Si ocurrió un error
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: res.message,
                    });
                }
            } catch (error) {
                console.error("Error al procesar la respuesta del servidor:", error);

                // Mostrar alerta de error
                Swal.fire({
                    icon: "error",
                    title: "Error inesperado",
                    text: "Hubo un problema al procesar la solicitud. Intenta nuevamente.",
                });
            }
        }
    };
}

// Función para mostrar alertas
function mostrarAlerta(elemento, mensaje, tipo) {
    elemento.classList.remove("d-none");
    elemento.classList.add(`alert-${tipo}`);

    elemento.innerHTML = mensaje;
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
            document.getElementById("id").value = res.ID_Usuario;
            document.getElementById("Rol").value = res.ID_Rol_Usu;
            document.getElementById("Est").value = res.ID_Estatus;
            document.getElementById("inputNombre").value = res.Nombre_Usu;
            document.getElementById("inputApellido").value = res.Apellido_Usu;
            document.getElementById("inputCorreo").value = res.Correo_Usu;
            document.getElementById("inputTelefono").value = res.Telefono_Usu;
            document.getElementById("claves").classList.add("d-none");
            $("#Registrar").modal("show")
        }
    };
    
    function btnRegistrarNuevo() {
        document.getElementById("title").innerHTML = "Registrar Nuevo Usuario";
        document.getElementById("btnAccion").innerHTML = "Registrar";
        document.getElementById("btnAccion").setAttribute("data-action", "registrar");
        $("#Registrar").modal("show");
    }
    
    function btnEditUser(id) {
        document.getElementById("title").innerHTML = "Editar Usuario";
        document.getElementById("btnAccion").innerHTML = "Editar";
        document.getElementById("btnAccion").setAttribute("data-action", "editar");
        document.getElementById("btnAccion").setAttribute("data-id", id);
    
        const url = base_url + "Usuarios/editar/" + id;
        const http = new XMLHttpRequest();
        http.open("GET", url, true);
        http.send();
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const usuario = JSON.parse(this.responseText);
                document.getElementById("Nombre_Usu").value = usuario.Nombre_Usu;
                document.getElementById("Apellido_Usu").value = usuario.Apellido_Usu;
                document.getElementById("Correo_Usu").value = usuario.Correo_Usu;
                document.getElementById("Telefono_Usu").value = usuario.Telefono_Usu;
                document.getElementById("ID_Estatus").value = usuario.ID_Estatus;
                document.getElementById("ID_Rol_Usu").value = usuario.ID_Rol_Usu;
                document.getElementById("acepto_terminos").value = usuario.acepto_terminos;
                document.getElementById("recibir_notificaciones").value = usuario.recibir_notificaciones;
            }
        };
        $("#Registrar").modal("show");
    }
    
    function handleAction() {
        const action = document.getElementById("btnAccion").getAttribute("data-action");
        if (action === "registrar") {
            // Lógica para registrar un nuevo usuario
            registrarUsuario();
        } else if (action === "editar") {
            const id = document.getElementById("btnAccion").getAttribute("data-id");
            // Lógica para editar un usuario existente
            editarUsuario(id);
        }
    }
    
    function registrarUsuario() {
        // Lógica para registrar un nuevo usuario
        console.log("Registrando nuevo usuario...");
    }
    
    function editarUsuario(id) {
        // Lógica para editar un usuario existente
        console.log("Editando usuario con ID:", id);
    }
    

}

function handleAction(e) {
    const action = document.getElementById("btnAccion").getAttribute("data-action");
    if (action === "registrar") {
        RegistrarUser(e);
    } else if (action === "editar") {
        EditarUser(e);
    }
}

async function EditarUser(e) {
    e.preventDefault();

    const id = document.getElementById("id").value;
    const rol = document.getElementById("Rol").value;
    const estatus = document.getElementById("Est").value;
    const nombre = document.getElementById("inputNombre").value;
    const apellido = document.getElementById("inputApellido").value;
    const correo = document.getElementById("inputCorreo").value;
    const telefono = document.getElementById("inputTelefono").value;
    const alerta = document.getElementById("alerta");

    if (
        rol.trim() === "" || nombre.trim() === "" ||
        apellido.trim() === "" || correo.trim() === "" ||
        telefono.trim() === ""
    ) {
        mostrarAlerta(alerta, "Por favor, completa todos los campos.", "danger");
        return;
    }

    const url = base_url + "Usuarios/editarUser";
    const frm = document.getElementById("frmRegistrar");

    try {
        const formData = new FormData(frm);

        const response = await fetch(url, {
            method: "POST",
            body: formData,
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const res = await response.json();

        // Si la edición fue exitosa
        if (res.status === "success") {
            Swal.fire({
                icon: "success",
                title: "¡Éxito!",
                text: "Usuario editado con éxito.",
                showConfirmButton: false,
                timer: 1500,
            });

            // Limpiar el formulario
            frm.reset();
        } else {
            // Si ocurrió un error
            Swal.fire({
                icon: "error",
                title: "Error",
                text: res.message,
            });
        }
    } catch (error) {
        console.error("Error al procesar la solicitud:", error);

        // Mostrar alerta de error
        Swal.fire({
            icon: "error",
            title: "Error inesperado",
            text: "Hubo un problema al procesar la solicitud. Intenta nuevamente.",
        });
    }
}

