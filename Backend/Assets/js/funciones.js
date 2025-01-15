let tblUsuarios; let tblDirecciones; let tblCategorias;

document.addEventListener("DOMContentLoaded", function () {
    inicializarTablaUsuarios();
    inicializarTablaDirecciones();
    inicializarTablaCategorias();

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
                        </tr>`;
                    tblUsuariosElement.querySelector("tbody").innerHTML += row;
                });

                // Inicializar de nuevo la tabla
                tblUsuarios = new simpleDatatables.DataTable(tblUsuariosElement);
            })
            .catch(error => console.error("Error al cargar los datos:", error));
    }
}

function inicializarTablaDirecciones() {
    const tblDireccionesElement = document.querySelector("#tblDirecciones");

    if (tblDireccionesElement) {
        fetch(base_url + "Direcciones/listar")
            .then(response => response.json())
            .then(data => {
                if (typeof tblDirecciones !== 'undefined') {
                    tblDirecciones.destroy(); // Destruir la tabla si ya está inicializada
                }

                tblDireccionesElement.querySelector("tbody").innerHTML = ""; // Limpiar contenido

                data.forEach(direccion => {
                    const row = `
                        <tr>
                            <td>${direccion.ID_Direccion}</td>
                            <td>${direccion.nombre_est}</td>
                            <td>${direccion.Identificador}</td>
                            <td>${direccion.Ciudad}</td>
                            <td>${direccion.Codigo_Postal}</td>
                            <td>${direccion.Sector}</td>
                            <td>${direccion.Calle}</td>
                            <td>${direccion.Numero}</td>
                            <td>${direccion.Cordenadas_Gps}</td>
                            <td>${direccion.acciones}</td>
                        </tr>`;
                    tblDireccionesElement.querySelector("tbody").innerHTML += row;
                });

                // Inicializar de nuevo la tabla
                tblDirecciones = new simpleDatatables.DataTable(tblDireccionesElement);
            })
            .catch(error => console.error("Error al cargar los datos:", error));
    }
}

function inicializarTablaCategorias() {
    const tblCategoriasElement = document.querySelector("#tblCategorias");

    if (tblCategoriasElement) {
        fetch(base_url + "Categorias/listar")
            .then(response => response.json())
            .then(data => {
                if (typeof tblCategorias !== "undefined") {
                    tblCategorias.destroy(); // Destruir la tabla si ya está inicializada
                }

                tblCategoriasElement.querySelector("tbody").innerHTML = ""; // Limpiar contenido

                data.forEach(categoria => {
                    const row = `
                        <tr>
                            <td>${categoria.ID_Categoria}</td>
                            <td>${categoria.estado}</td>
                            <td>${categoria.Nombre_Cat}</td>
                            <td>${categoria.Descripcion_Cat}</td>
                            <td>${categoria.acciones}</td>
                        </tr>`;
                    tblCategoriasElement.querySelector("tbody").innerHTML += row;
                });

                // Inicializar de nuevo la tabla
                tblCategorias = new simpleDatatables.DataTable(tblCategoriasElement);
            })
            .catch(error => console.error("Error al cargar los datos de categorías:", error));
    }
}

////////////////////////////////////////////////////////////////////////////////
////////////////////////// Fin de Cargar Tablas ////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

function limpiarFormulario() {
    document.getElementById("inputEmail").value = "";
    document.getElementById("inputPassword").value = "";
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
            location.reload();
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
        text: "¡El usuario no se eliminara, Solo se cambiara su estado a inactivo!",
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
                                location.reload();
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
    if (!nombre || !apellido || !correo || !telefono || !est || !id || !rol || !est) {
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
            location.reload();
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
function cerrarModal(modalId) {
    $(`#${modalId}`).modal('hide');
}
////////////////////////////////////////////////////////
////////////// Fin Funciones de Usuarios  //////////////
////////////////////////////////////////////////////////

// Mostrar modal de registro Direcciones
function frmDirecciones() {
    document.getElementById("title").innerHTML = "Registrar Nueva Direccion";
    document.getElementById("btnAccionDir").innerHTML = "Registrar";
    document.getElementById("btnAccionDir").setAttribute("data-action", "registrardir");

    document.getElementById("frmDirecciones").reset();
    $("#modalDirecciones").modal("show");
    initMap();
}

// Validación y registro
async function RegistrarDireccion(e) {
    e.preventDefault();

    const frm = document.getElementById("frmDirecciones");
    const alerta = document.getElementById("alerta");

    const ID_Usuario = document.getElementById("id_usu").value.trim();
    const Identificador = document.getElementById("inputIdentificador").value.trim();
    const Ciudad = document.getElementById("inputCiudad").value.trim();
    const CodigoPostal = document.getElementById("inputCodigoPostal").value.trim();
    const Calle = document.getElementById("inputCalle").value.trim();
    const Numero = document.getElementById("inputNumero").value.trim();
    const Sector = document.getElementById("inputSector").value.trim();
    const CordenadasGPS = document.getElementById("inputCordenadasGPS").value.trim();

    // Validación de campos vacíos
    if (!ID_Usuario || !Identificador || !Ciudad || !CodigoPostal || !Calle || !Numero || !Sector || !CordenadasGPS) {
        mostrarAlerta(alerta, "Por favor, completa todos los campos.", "danger");
        return;
    }

    const formData = new FormData(frm);

    /*  // Imprimir cada dato del formulario en la consola
     console.log("Datos enviados:");
     for (const pair of formData.entries()) {
         console.log(`${pair[0]}: ${pair[1]}`);
     } */

    try {
        const response = await fetch(base_url + "Direcciones/registrarDireccion", {
            method: "POST",
            body: formData,
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const text = await response.text();

        let res;
        try {
            res = JSON.parse(text);
        } catch (error) {
            console.error("La respuesta no es JSON válida:", text);
            throw new Error("El servidor no devolvió un JSON válido");
        }

        if (res.status === "success") {
            Swal.fire({
                icon: "success",
                title: "¡Éxito!",
                text: "Dirección registrada con éxito.",
                showConfirmButton: false,
                timer: 10000,
            });
            location.reload();
            frm.reset();
            $("#modalDirecciones").modal("hide");
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

function handleActionDir(e) {
    const action = document.getElementById("btnAccionDir").getAttribute("data-action");
    if (action === "registrardir") {
        console.log("Registrando");
        RegistrarDireccion(e);
    } else if (action === "editardir") {
        console.log("Editando 2");
        EditarDireccion(e);
    }
}

function btnEditDir(ID_Direccion) {
    initMap();
    document.getElementById("title").innerHTML = "Editar Dirección";
    document.getElementById("btnAccionDir").innerHTML = "Editar";
    document.getElementById("btnAccionDir").setAttribute("data-action", "editardir");
    const url = base_url + "Direcciones/editar/" + ID_Direccion;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            document.getElementById("id_dir").value = res.ID_Direccion; // Cargar el estado en el input oculto del form
            document.getElementById("id_usu").value = res.ID_Usuario; // Cargar el estado en el input oculto del form
            document.getElementById("id_Est").value = res.Estado; // Cargar el estado en el input oculto del form
            document.getElementById("inputIdentificador").value = res.Identificador; // Cargar el identificador en el input
            document.getElementById("inputCiudad").value = res.Ciudad; // Cargar la ciudad en el input
            document.getElementById("inputCodigoPostal").value = res.Codigo_Postal; // Cargar el código postal en el input
            document.getElementById("inputSector").value = res.Sector; // Cargar el sector en el input
            document.getElementById("inputCalle").value = res.Calle; // Cargar la calle en el input
            document.getElementById("inputNumero").value = res.Numero; // Cargar el número en el input
            document.getElementById("inputCordenadasGPS").value = res.Cordenadas_Gps; // Cargar las coordenadas GPS en el input
            $("#modalDirecciones").modal("show"); // Abrir el modal
        }
    };
}

async function EditarDireccion(e) {
    e.preventDefault();

    const alerta = document.getElementById("alerta");
    const frm = document.getElementById("frmDirecciones");

    const idDireccion = document.getElementById("id_dir").value.trim();
    const idUsuario = document.getElementById("id_usu").value.trim();
    const estado = document.getElementById("id_Est").value.trim();
    const identificador = document.getElementById("inputIdentificador").value.trim();
    const ciudad = document.getElementById("inputCiudad").value.trim();
    const codigoPostal = document.getElementById("inputCodigoPostal").value.trim();
    const sector = document.getElementById("inputSector").value.trim();
    const calle = document.getElementById("inputCalle").value.trim();
    const numero = document.getElementById("inputNumero").value.trim();
    const cordenadasGps = document.getElementById("inputCordenadasGPS").value.trim();

    // Validación de campos vacíos
    if (!idDireccion || !idUsuario || !estado || !identificador || !ciudad || !codigoPostal || !sector || !calle || !numero || !cordenadasGps) {
        mostrarAlerta(alerta, "Por favor, completa todos los campos.", "danger");
        return;
    }

    try {
        const response = await fetch(base_url + "Direcciones/editarDireccion", { // función para guardar los datos a editar
            method: "POST",
            body: new FormData(frm),
        });

        const res = await response.json();

        if (res.status === "success") {
            Swal.fire({
                icon: "success",
                title: "¡Éxito!",
                text: "Dirección editada con éxito.",
                showConfirmButton: false,
                timer: 1500,
            });
            location.reload();
            frm.reset();
            $("#modalDirecciones").modal("hide");
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

// Boton para usar la funcion deshabilitar una cuenta
function btnInavDir(ID_Direccion) {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "¡Esta Seguro de inhabilitar  !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, inhabilítar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            // Llamar a la función para cargar las direcciones del usuario
            fetch(base_url + "Direcciones/listar")
                .then(response => response.json())
                .then(data => {
                    // Crear un objeto de opciones para el select
                    const inputOptions = {};
                    data.forEach(direccion => {
                        inputOptions[direccion.ID_Direccion] = direccion.Identificador;
                    });

                    // Solicitar al usuario que seleccione una nueva dirección para activar
                    Swal.fire({
                        title: "Selecciona una nueva dirección para activar",
                        input: "select",
                        inputOptions: inputOptions,
                        inputPlaceholder: "Selecciona una dirección",
                        showCancelButton: true,
                        inputValidator: (value) => {
                            return new Promise((resolve) => {
                                if (value) {
                                    resolve();
                                } else {
                                    resolve("Debes seleccionar una dirección");
                                }
                            });
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const nuevaDireccionID = result.value;
                            const url = base_url + "Direcciones/inhabilitar";
                            const http = new XMLHttpRequest();
                            http.open("POST", url, true);
                            http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            http.send("ID_Direccion=" + ID_Direccion + "&NuevaDireccionID=" + nuevaDireccionID);

                            http.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200) {
                                    try {
                                        const res = JSON.parse(this.responseText); // Analizar la respuesta JSON
                                        console.log("Respuesta del backend:", res);

                                        if (res.status === "success") {
                                            Swal.fire({
                                                title: "Inhabilitado",
                                                text: "La dirección ha sido inhabilitada y la nueva dirección ha sido activada.",
                                                icon: "success"
                                            }).then(() => {
                                                // Aquí puedes agregar la lógica para recargar la tabla de direcciones, por ejemplo:
                                                location.reload();
                                            });
                                        } else {
                                            Swal.fire({
                                                title: "Error",
                                                text: "Error al inhabilitar.",
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
                })
                .catch(error => {
                    console.error("Error al cargar las direcciones:", error);
                    Swal.fire({
                        title: "Error inesperado",
                        text: "Ocurrió un problema al cargar las direcciones.",
                        icon: "error"
                    });
                });
        }
    });
}
/////////////////////////////////////////////////////////
///////// Fin Funciones de la tabla direccion  //////////
/////////////////////////////////////////////////////////

//////////////////////////////////////////////////////
//////////////////API GoogleMaps//////////////////////
//////////////////////////////////////////////////////
let map;
let marker;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: -34.397, lng: 150.644 },
        zoom: 8
    });

    map.addListener('click', function (event) {
        placeMarker(event.latLng);
    });
}

function placeMarker(location) {
    if (marker) {
        marker.setPosition(location);
    } else {
        marker = new google.maps.Marker({
            position: location,
            map: map
        });
    }
    document.getElementById('inputCordenadasGPS').value = location.lat() + ', ' + location.lng();
}

window.initMap = initMap;
//////////////////////////////////////////////////////
/////////////////Fin API Google///////////////////////
//////////////////////////////////////////////////////

// Detecta el clic en el botón "Editar" o la fila
document.addEventListener("click", function (e) {
    if (e.target.classList.contains("cargar-datos")) {
        // Obtén la fila donde ocurrió el clic
        const fila = e.target.closest("tr");

        // Extrae los valores de las celdas (puedes usar querySelector con clases específicas)
        const id = fila.getAttribute("data-id");
        const estado = fila.querySelector(".estado").textContent.trim();
        const nombre = fila.querySelector(".nombre").textContent.trim();
        const descripcion = fila.querySelector(".descripcion").textContent.trim();

        // Asigna los valores a los inputs
        document.getElementById("Inputid_est").value = id;
        document.getElementById("InputNombre").value = nombre;
        document.getElementById("InputDescripcion").value = descripcion;
    }
});


// Cambiar el nombre al boton si se va a editar categoria
function btnECategoria() {
    document.getElementById("title").innerHTML = "Editar Categoria";
    document.getElementById("btnAccionCat").innerHTML = "Modificar";
    document.getElementById("btnAccionCat").setAttribute("data-action", "editarcat");
    const url = base_url + "Categorias/editar/" + ID_Direccion;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            document.getElementById("id_cat").value = res.id; // Cargar el id en el input oculto del form
            document.getElementById("id_est").value = res.Estado; // Cargar el estado en el input oculto del form
            document.getElementById("inputNombre").value = res.Nombre; // Cargar el nombreen el input
            document.getElementById("inputDescripcion").value = res.Descripcion; // Cargar la descripcion en el input
        }
    };
}

async function RegistrarCategoria(e) {
    e.preventDefault();

    const alerta = document.getElementById("alerta");
    const Id_vendedor = document.getElementById("Inputid_empresa").value.trim();
    const Id_estatus = document.getElementById("Inputid_est").value.trim();
    const nombre = document.getElementById("inputNombre").value.trim();
    const descricion = document.getElementById("inputDescricion").value.trim();

    // Validación de campos vacíos
    if (!Id_vendedor || !Id_estatus || !nombre || !descricion) {
        mostrarAlerta(alerta, "Por favor, completa todos los campos.", "danger");
        return;
    }

    const formData = new FormData(frm);

    // Imprimir cada dato del formulario en la consola
    console.log("Datos enviados:");
    for (const pair of formData.entries()) {
        console.log(`${pair[0]}: ${pair[1]}`);
    }

    try {
        const response = await fetch(base_url + "Categorias/registrarCategoria", {
            method: "POST",
            body: formData,
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const text = await response.text();

        let res;
        try {
            res = JSON.parse(text);
        } catch (error) {
            console.error("La respuesta no es JSON válida:", text);
            throw new Error("El servidor no devolvió un JSON válido");
        }

        if (res.status === "success") {
            Swal.fire({
                icon: "success",
                title: "¡Éxito!",
                text: "Categoria registrada con exito.",
                showConfirmButton: false,
                timer: 10000,
            });
            location.reload();
            frm.reset();
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

function handleActionCat(e) {
    const action = document.getElementById("btnAccionCat").getAttribute("data-action");
    if (action === "editarcat") {
        console.log("Editando");
        //handleActionDir(e);
    } else {
        console.log("Registrando");
        //btnEditCategoria(e);
    }
}

// Boton para usar la funcion deshabilitar una cuenta
function btnInavCategoria(id) {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "¡Esta categoria ya no podra ser usada en otros productos!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, inhabilítar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Categorias/inhabilitar";
            const http = new XMLHttpRequest();
            http.open("POST", url, true);
            http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            http.send("ID_Categoria=" + id);

            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    try {
                        const res = JSON.parse(this.responseText); // Analizar la respuesta JSON
                        console.log("Respuesta del backend:", res);

                        if (res.status === "success") {
                            Swal.fire({
                                title: "Inhabilitado",
                                text: "La categoria ha sido inhabilitado.",
                                icon: "success"
                            }).then(() => {
                                // Aquí puedes agregar la lógica para recargar la tabla de usuarios, por ejemplo:
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: "Error al inhabilitar categoria.",
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
