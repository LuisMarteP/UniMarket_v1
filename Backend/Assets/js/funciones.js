
document.addEventListener("DOMContentLoaded", function () {
    const tblUsuarios = document.querySelector("#tblUsuarios");

    if (tblUsuarios) {
        // Cargar los datos usando fetch
        fetch(base_url + "Usuarios/listar")
            .then(response => response.json())
            .then(data => {
                // Generar las filas de la tabla dinámicamente
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
                            <td>${usuario.Recibir_Notificaciones}</td>
                            <td>${usuario.Acepto_Terminos}</td>
                            <td>${usuario.acciones}</td>
                        </tr>
                    `;
                    tableBody.innerHTML += row;
                });

                // Inicializar la tabla después de cargar los datos
                new simpleDatatables.DataTable(tblUsuarios);
            })
            .catch(error => console.error("Error al cargar los datos:", error));
    }
});

function frmLogin(e) {
    e.preventDefault();

    const email = document.getElementById("inputEmail");
    const pass = document.getElementById("inputPassword");

    // Validación básica en el frontend
    if (email.value.trim() === "" || pass.value.trim() === "") {
        const alerta = document.getElementById("alerta");
        alerta.classList.remove("d-none");
        alerta.classList.add("alert-danger");
        alerta.innerHTML = "Por favor, completa todos los campos.";
        return;
    }

    // Si los campos no están vacíos, realiza la solicitud al backend
    const url = base_url + "Usuarios/validar";
    const frm = document.getElementById("frmLogin");
    const http = new XMLHttpRequest();

    http.open("POST", url, true);
    http.send(new FormData(frm));

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText); // Para depurar

            try {
                const res = JSON.parse(this.responseText);

                const alerta = document.getElementById("alerta");

                if (res.status === "success" && res.message === "ok") {
                    window.location = base_url + "Usuarios";
                } else if (res.status === "error") {
                    alerta.classList.remove("d-none");
                    alerta.classList.add("alert-danger");
                    alerta.innerHTML = res.message;
                }
            } catch (error) {
                console.error("Error al procesar la respuesta del servidor:", error);
            }
        }
    };
}

function frmRegistrar(){
    $("#Registrar").modal("show");
}