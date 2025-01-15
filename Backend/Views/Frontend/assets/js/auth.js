/*========================================
                Slider
==========================================*/
if (document.querySelector('.contenedor-slider')) {

    let index = 1;
    let selectedIndex = 1;

    const slides = document.querySelector('.slider');
    const slide = slides.children;
    const slidesTotal = slides.childElementCount;

    const dots = document.querySelector('.dots');
    const prev = document.querySelector('.prev');
    const next = document.querySelector('.next');
    const msError = document.getElementById('msError'); // Asegúrate de que este sea el elemento correcto
    


    //agregamos los punto de acuerdo a la cantidad de slides
    for (let i = 0; i < slidesTotal; i++) {
        dots.innerHTML += '<span class="dot"></span>';
    }

    //ejecutamos la funcion
    mostrarSlider(index);

    //Transicion del slider
    setInterval(() => {
        mostrarSlider(index = selectedIndex);
    }, 5000); //rempresentados en milesegundos

    //funcion para mostrar el slider
    function mostrarSlider(num) {
        if (selectedIndex > slidesTotal) {
            selectedIndex = 1;
        } else {
            selectedIndex++;
        }

        if (num > slidesTotal) {
            index = 1;
        }

        if (num < 1) {
            index = slidesTotal;
        }

        //remover la clase active de todos los slide
        for (let i = 0; i < slidesTotal; i++) {
            slide[i].classList.remove('active');
        }

        //remover la clase active de los puntos
        for (let x = 0; x < dots.children.length; x++) {
            dots.children[x].classList.remove('active');
        }

        //mostramos slide
        slide[index - 1].classList.add('active');

        //agregar la clase active al punto donde se encuntra el slide
        dots.children[index - 1].classList.add('active');


    }

    //evento para los botones prev y next
    next.addEventListener('click', (e) => {
        mostrarSlider(index += 1);
        selectedIndex = index;
    });

    prev.addEventListener('click', (e) => {
        mostrarSlider(index += -1);
        selectedIndex = index;
    });

    //puntos
    for (let y = 0; y < dots.children.length; y++) {

        //por cada dot que ecuentre se agrega un evento click y activa la funcion de slide
        dots.children[y].addEventListener('click', () => {
            mostrarSlider(index = y + 1);
            selectedIndex = y + 1;
        });
    }

}


/*========================================
            Tabs Formulario
==========================================*/
const tabLink = document.querySelectorAll('.tab-link');
const formularios = document.querySelectorAll('.formulario');

for (let x = 0; x < tabLink.length; x++) {

    tabLink[x].addEventListener('click', () => {

        //remover la clase active de todos los tabs encotrados
        tabLink.forEach((tab) => tab.classList.remove('active'));

        //le agregar la clase active al tab que se le hizo click
        tabLink[x].classList.add('active');

        //mostramos el formulario correspondiente(Inicio de sesion)
        formularios.forEach((form) => form.classList.remove('active'));
        formularios[x].classList.add('active');

    })
}

/*========================================
            Mostrar contraseña
==========================================*/
const mostrarClave = document.querySelectorAll('.mostrarClave');
const inputPass = document.querySelectorAll('.clave');

for (let i = 0; i < mostrarClave.length; i++) {

    mostrarClave[i].addEventListener('click', () => {

        if (inputPass[i].type === "password") {

            //cambiar el tipo password a text
            inputPass[i].setAttribute('type', 'text');

            //remover la clase del icono
            mostrarClave[i].classList.remove('fa-eye');

            //agregar nuevo icono
            mostrarClave[i].classList.add('fa-eye-slash');

            //la clase active
            mostrarClave[i].classList.add('active');

        } else {
            //si el tipo de input es text

            //el tipo text a password
            inputPass[i].setAttribute('type', 'password');

            //la clase del icono
            mostrarClave[i].classList.remove('fa-eye-slash');

            //el icono
            mostrarClave[i].classList.add('fa-eye');

            //la clase active
            mostrarClave[i].classList.remove('active');

        }

    });
}


/*========================================
   Validamos el formulario de registro
==========================================*/
let nombre, correo, password, cbx_notificaciones, cbx_terminos;

if (document.getElementById('btnRegistro')) {

    const btnRegistro = document.getElementById('btnRegistro');

    //evento click al boton registro
    btnRegistro.addEventListener('click', (e) => {

        e.preventDefault();

        const msError = document.querySelector('#formRegistro .error-text');
        msError.innerHTML = "";
        msError.classList.remove('active');

        nombre = formRegistro.nombre.value.trim();
        correo = formRegistro.correo.value.trim();
        password = formRegistro.password.value.trim();

        cbx_notificaciones = formRegistro.cbx_notificaciones;
        cbx_terminos = formRegistro.cbx_terminos;

        //validamos que los campos cuando estan vacios
        if (nombre == "" && correo == "" && password == "") {

            //mostramos error en pantalla
            mostrarError('Todos los campos son obligatorios', msError,  10000);

            //le agregamos la clase error a los input
            //le pasamos los datos array
            inputError([formRegistro.nombre, formRegistro.correo, formRegistro.password]);
            return false;

        } else {
            //removemos esa clase con la siguente funcion
            inputErrorRemove([formRegistro.nombre, formRegistro.correo, formRegistro.password]);
        }


        //validamos a cada input
        if (nombre == "" || nombre == null) {

            mostrarError('Por favor ingrese su nombre', msError,  10000);
            inputError([formRegistro.nombre]);
            formRegistro.nombre.focus(); // fija el foco del cursor en el elemento indicado,
            return false;
        } else {
            //validacion que ingrese un nombre y no numeros
            if (!validarSoloLetras(nombre)) {
                //si es diferente a true
                mostrarError('Ingrese un nombre válido, no se permiten caracteres especiales', msError,  10000);
                inputError([formRegistro.nombre]);
                formRegistro.nombre.focus();
                return false;
            }
        }

        //validacion del correo
        if (correo == null || correo == "") {
            mostrarError('Por favor ingrese su correo', msError,  10000);
            inputError([formRegistro.correo]);
            formRegistro.correo.focus();

            return false;
        } else {

            if (!validarCorreo(correo)) {
                mostrarError('Por favor ingrese un correo válido', msError,  10000);
                inputError([formRegistro.correo]);
                formRegistro.correo.focus();
                return false;
            }
        }

        //validamos password
        if (password == "" || password == null) {
            mostrarError('Por favor ingrese una contraseña', msError,  10000);
            inputError([formRegistro.password]);
            formRegistro.password.focus();
            return false;
        } else {

            //validamos que la contraseña tenga con minimos 5 cacteres
            if (password.length <= 4) {
                mostrarError('Contraseña débil, min.5 carácteres', msError,  10000);
                inputError([formRegistro.password]);
                formRegistro.password.focus();
                return false;
            }
        }

        //validar el cbx-terminos
        if (cbx_terminos.checked == false) {
            mostrarError('Por favor aceptar Términos y condiciones', msError,  10000);

            //agregar una clase error
            formRegistro.cbx_terminos.parentNode.classList.add('cbx-error');
            return false;
        } else {
            formRegistro.cbx_terminos.parentNode.classList.remove('cbx-error');
        }

        //un vez hechas las validaciones enviaremos el formulario
        formRegistro.submit();
        return true;

    });

    if (formRegistro.cbx_terminos) {
        formRegistro.cbx_terminos.addEventListener('click', (e) => {
            if (e.target.checked) {
                formRegistro.cbx_terminos.parentNode.classList.remove('cbx-error');
            }
        });
    } else {
        console.error('El elemento cbx_terminos no se encontró en el DOM');
    }
}


/*========================================
    Válidamos formulario de login
==========================================*/
if (document.getElementById('btnLogin')) {

    const btnLogin = document.getElementById('btnLogin');

    btnLogin.addEventListener('click', (e) => {

        e.preventDefault();

        const msError = document.querySelector('#formLogin .error-text');
        msError.innerHTML = "";
        msError.classList.remove('active');

        correo = formLogin.correo.value.trim();
        password = formLogin.password.value.trim();

        if (correo == "" && password == "") {
            mostrarError('Por favor ingrese su usuario/contraseña', 10000);
            inputError([formLogin.correo, formLogin.password]);
            return false;
        } else {
            inputErrorRemove([formLogin.correo, formLogin.password]);
        }

        if (correo == "" || correo == null) {
            mostrarError('Por favor ingrese su correo', 10000);
            inputError([formLogin.correo]);
            formLogin.correo.focus();
            return false;
        }

        if (password == "" || password == null) {
            mostrarError('Por favor ingrese su contraseña', 10000);
            inputError([formLogin.password]);
            formLogin.password.focus();
            return false;
        }

        //enviamos el fromulario
        formLogin.submit();
        return true;

    })
}

/*============================================================================
         FUNCIONES PARA MOSTRAR ERROR EN PANTALLA Y VALIDAR LOS CAMPOS
=============================================================================*/

/*========================================
                Mostrar Error
==========================================*/
function mostrarError(mensaje, msError, duracion) {
    // Agregamos la clase active
    msError.classList.add('active');

    // Mostramos el mensaje de error
    msError.innerHTML = '<p>' + mensaje + '</p>';

    // Ocultamos el mensaje después de la duración especificada
    setTimeout(() => {
        msError.classList.remove('active');
        msError.innerHTML = '';
    }, duracion);
}


/*========================================
         Agregar class error input
==========================================*/
//a esta funcion le pasamos un array

function inputError(datos) {
    for (let i = 0; i < datos.length; i++) {

        //a cada input le agregamos una clase error
        datos[i].classList.add('input-error');

    }

}

//a esta funcion le pasamos un array con el error
function inputErrorRemove(datos) {
    for (let i = 0; i < datos.length; i++) {
        //removemos la clase
        datos[i].classList.remove('input-error');

    }

}

/*===============================================
         Válidamos solo letras y numeros
================================================*/
function validarLetrasNumeros(valor) {
    if (!/^[a-zA-Z0-9]+$/.test(valor)) {
        return false;
    }
    return true;
}


/*===============================================
               Válidamos solo letras
================================================*/
function validarSoloLetras(valor) {
    if (!/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/.test(valor)) {
        return false;
    }
    return true;
}

/*===============================================
             Válidamos un corrreo valido
================================================*/

function validarCorreo(valor) {
    if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(valor)) {
        return false;
    }

    return true;
}

/*===============================================
                Válidamos solo número
================================================*/

function validarSoloNumeros(valor) {
    if (!/^([0-9]{8})*$/.test(valor)) {
        return false;
    }
    return true;
}

document.addEventListener('DOMContentLoaded', () => {
    const formLogin = document.getElementById('formLogin');
    const btnLogin = document.getElementById('btnLogin');
    const formRegistro = document.getElementById('formRegistro');
    const btnRegistro = document.getElementById('btnRegistro');

    const BASE_URL = 'http://localhost/uniMarket_v1/Backend/Views/Frontend/public/auth/Auth.php';

    /*==============================================
                       Crear Cuenta
    ==============================================*/
    btnRegistro.addEventListener('click', async (e) => {
        e.preventDefault(); // Evitar recarga de la página

        const usuario = {
            nombre: formRegistro.nombre?.value.trim(),
            apellido: formRegistro.apellido?.value.trim(),
            correo: formRegistro.correo?.value.trim(),
            password: formRegistro.password?.value.trim(),
            telefono: formRegistro.telefono?.value.trim(),
            recibir_notificaciones: formRegistro.cbx_notificationes?.checked ? 1 : 0,
            acepto_terminos: formRegistro.cbx_terminos?.checked ? 1 : 0, 
        };

        // Validación de campos obligatorios
        if (!usuario.nombre || !usuario.correo || !usuario.password) {
            mostrarError('Por favor, completa todos los campos obligatorios.', document.querySelector('#formRegistro .error-text'), 10000);
            return;
        }

        // Validación de aceptación de términos
        if (!usuario.acepto_terminos) {
            mostrarError('Debes aceptar los términos y condiciones.', document.querySelector('#formRegistro .error-text'), 10000);
            return;
        }

        try {
            const response = await fetch(`${BASE_URL}?action=register`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(usuario),
            });

            const data = await response.json();

            if (response.ok) {
                alert('Registro exitoso.');
                window.location.href = 'http://localhost/uniMarket_v1/Backend/Views/Frontend/index.php';
            } else {
                mostrarError(data.message || 'Error al registrar.', document.querySelector('#formRegistro .error-text'), 10000);
            }
        } catch (error) {
            console.error('Error al enviar el formulario de registro:', error);
            mostrarError('Error en el servidor. Intenta nuevamente más tarde.', document.querySelector('#formRegistro .error-text'), 10000);
        }
    });

    /*==============================================
                       Iniciar Sesion
    ==============================================*/
    btnLogin.addEventListener('click', async (e) => {
        e.preventDefault(); // Evitar recarga la pagina
        
        const correo = formLogin.correo?.value.trim();
        const password = formLogin.password?.value.trim();

        if (!correo || !password) {
            mostrarError('Por favor, ingresa tus credenciales.', document.querySelector('#formLogin .error-text'), 10000);
            return;
        }

        try {
            const response = await fetch(`${BASE_URL}?action=login`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ email: correo, password }),
            });

            const data = await response.json();

            if (response.ok) {
                alert('Inicio de sesión exitoso.');
                window.location.href = 'http://localhost/uniMarket_v1/Backend/Views/Frontend/index.php';
            } else {
                mostrarError(data.message || 'Error al iniciar sesión.', document.querySelector('#formLogin .error-text'), 10000);
            }
        } catch (error) {
            console.error('Error al enviar el formulario de inicio de sesión:', error);
            mostrarError('Error en el servidor. Intenta nuevamente más tarde.', document.querySelector('#formLogin .error-text'), 10000);
        }
    });
});
