 <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0, width=device-width" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Inicio de Sesión</title>
        <script src="https://kit.fontawesome.com/5bf367d5b8.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@300;400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../../assets/css/styleAuth.css">
    </head>
    <body>
        <div class="contenedor-login">
            <!--========================================
                         Slider
            =========================================-->
            <div class="contenedor-slider">
                <!--==Slide 1==-->
                <div class="slider">
                    <div class="slide fade">
                        <img src="../../assets/images/img1.png" alt="">
                        <div class="contenido-slider">
                            <div class="logo">
                                <img src="../../assets/images/logo8.png" alt="">
                            </div>
                            <p class="slider-texto">
                                En UniMarket, somos más que un simple marketplace;
                                somos tu socio en la compra inteligente y segura.
                                Nos asociamos con tiendas locales para ofrecerte
                                una amplia gama de productos de calidad, apoyando
                                al mismo tiempo a la economía local.
                            </p>
                        </div>
                    </div>
                    <!--==Slide 2==-->
                    <div class="slide fade active">
                        <img src="../../assets/images/img2.png" alt="">
                        <div class="contenido-slider">
                            <div class="logo">
                                <img src="../../assets/images/logo8.png" alt="">
                            </div>
                            <p class="slider-texto">
                                En UniMarket, somos más que un simple marketplace;
                                somos tu socio en la compra inteligente y segura.
                                Nos asociamos con tiendas locales para ofrecerte
                                una amplia gama de productos de calidad, apoyando
                                al mismo tiempo a la economía local.
                            </p>
                        </div>
                    </div>
                </div>
                <!--==Botones de siguiente y previo==-->
                <a href="#" class="prev"><i class="fas fa-chevron-left"></i></a>
                <a href="#" class="next"><i class="fas fa-chevron-right"></i></a>
                <!--===dots==-->
                <div class="dots"></div>
            </div>
            <!--========================================
                         Formularios
            =========================================-->
            <div class="contenedor-texto">
                <div class="contenedor-form">
                    <h1 class="titulo"> ¡Bienvenido a UniMarket! </h1>
                    <p class="descripcion"> Ingresa a tu cuenta para disfrutar de tus beneficios y de las mejores promociones que tenemos para ti. </p>
                    <!--==Tabs==-->
                    <ul class="tabs-links">
                        <li class="tab-link active">Iniciar Sesión</li>
                        <li class="tab-link">Registrarme</li>
                    </ul>
                    <!--========================================
                    Formulario de Login
                    =========================================-->
                    <form action="" method="POST" id="formLogin" class="formulario active">
                        <div class="error-text">
                            <p>Error del formulario</p>
                        </div>
                        <input type="text" placeholder="Correo Electrónico" class="input-text" name="correo" autocomplete="off">
                        <div class="grupo-input">
                            <input type="password" placeholder="Contraseña" name="password" class="input-text clave">
                            <button type="button" class="icono fas fa-eye mostrarClave active"></button>
                        </div>
                        <a href="#" class="link">¿Olvidaste tu Contraseña?</a>
                        <button class="btn" id="btnLogin" type="button">Iniciar Sesión</button>
                    </form>
                    <!--========================================
                    Formulario de Sign-Up
                    =========================================-->
                    <form action="" method="POST" id="formRegistro" class="formulario">
                        <div class="error-text">
                            <p> Error del formulario</p>
                        </div>
                        <input type="text" class="input-text" name="nombre" placeholder="Nombre" autocomplete="off">
                        <input type="text" class="input-text" name="apellido" placeholder="Apellido" autocomplete="off">
                        <input type="text" class="input-text" name="correo" placeholder="Correo Electrónico" autocomplete="off">
                        <input type="text" class="input-text" name="telefono" placeholder="Teléfono" autocomplete="off">
                        <div class="grupo-input">
                            <input type="password" placeholder="Contraseña" name="password" class="input-text clave">
                            <button type="button" class="icono fas fa-eye mostrarClave active"></button>
                        </div>
                        <!--==Checkbox personalizados==-->
                        <label class="contenedor-cbx animate">
                            Me gustaría recibir notificaciones sobre productos
                            <input type="checkbox" name="cbx_notificationes" checked>
                            <span class="cbx-marca"></span>
                        </label>
                        <label class="contenedor-cbx animate">
                            He leído y acepto los <a href="#" class="link">Términos y Condiciones</a>
                            <input type="checkbox" name="cbx_terminos">
                            <span class="cbx-marca"></span>
                        </label>
                        <button class="btn" id="btnRegistro" type="button">Crear Cuenta</button>
                    </form>
                </div>
            </div>
        </div>
        <script type="module" src="../../assets/js/auth.js"></script>
    </body>
    </html>
