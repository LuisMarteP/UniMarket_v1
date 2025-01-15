<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>

    <script src="https://kit.fontawesome.com/5bf367d5b8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/stylescart.css">
</head>

<body>
    <!-- Header -->
    <section id="header">
        <!-- Logo y envío -->
        <div class="top-header">
            <a href="#" class="logo">
                <img src="../../../assets/images/logo71.png" alt="UniMarket" />
            </a>
            <div class="location">
                <p class="dr">Enviar a <br />
                    <span>Jarabacoa</span>
                </p>
            </div>
            <div class="search-bar">
                <select id="categories">
                    <option value="all">Todos</option>
                    <option value="electronics">Electrónica</option>
                    <option value="clothing">Ropa</option>
                    <option value="home">Hogar</option>
                </select>
                <input type="text" placeholder="Buscar" />
                <button class="search-btn"><i class="fa fa-search"></i></button>
            </div>
            <div class="account-info">
                <p class="dr">
                    Hola, Identifícate<br />
                    <span href="../../public/auth/auth.html">Iniciar Sesion</span>
                </p>
                <p class="dr">
                    Pedidos<br />
                    <span>y Devoluciones</span>
                </p>
                <a href="../../public/tabs/cart/html/cart.php" class="cart">
                    <i class="fa-solid fa-cart-shopping"></i><span>0</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Menú de navegación -->
    <nav class="bottom-header">
        <div id="mobile">

            <i id="bar" class="fas fa-bars"></i>
            <a href="#">Inicio</a>
            <a href="#">Tienda</a>
            <a href="#">Blog</a>
 
        </div>
        <ul id="navbar">
            <!-- Menú desplegable -->
            <div id="side-menu">
                <div class="menu-header">
                    <i class="fas fa-user-circle"></i>
                    <span href="../../../../public/auth/auth.html">Hola, Identifícate</span>
                </div>
                <ul class="menu-sections">
                    <li class="menu-section">
                        <span class="section-title">Mi Cuenta</span>
                        <ul class="sub-menu">
                            <li><a href="#">Tu Cuenta</a></li>
                            <li><a href="#">Tus Pedidos</a></li>
                            <li><a href="#">Comprar de Nuevo</a></li>
                            <li><a href="#">Favaritos</a></li>
                            <li><a href="#">Solicitudes de Servicios</a></li>
                            <li><a href="#">Direcciones</a></li>
                            <li><a href="#">Pagos</a></li>
                            <li><a href="#">Cerrar Sesion</a></li>
                        </ul>
                    </li>
                    <li class="menu-section">
                        <span class="section-title">Administrar Tienda</span>
                        <ul class="sub-menu">
                            <li><a href="#">Productos</a></li>
                            <li><a href="#">Pedidos</a></li>
                            <li><a href="#">configuración</a></li>
                        </ul>
                    </li>
                    <li class="menu-section">
                        <span class="section-title">Ayuda y configuración</span>
                        <ul class="sub-menu">
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Empezar a Vender</a></li>
                            <li><a href="#">Servicios al cliente</a></li>

                        </ul>
                    </li>
                </ul>
                <div class="menu-close">
                    <i class="fas fa-times"></i>
                </div>
            </div>
        </ul>
    </nav>

    <section id="page-header" class="cart-header">
        <h2>Tus Compras</h2>
        <p>Pedido</p>
    </section>

    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th><a href="#"><i class="far fa-times-circle"></i></a></th>
                    <th><img src="../../../assets/images/img/products/f1.jpg"></th>
                    <th>Cartoon Astronaut T-Shirts</th>
                    <th>$RD 118</th>
                    <th><input type="number" value="1"></th>
                    <th>$RD 118</th>
                </tr>
            </tbody>
        </table>
    </section>

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="../../../assets/images/logo71.png">

            <h4><strong>Conócenos</strong></h4>
            <a href="#">Blog</a>
            <a href="#">Acerca de UniMarket</a>
            <div class="follow">
                <h4>Siguenos</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fa-brands fa-x-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4><strong>Gana dinero con nosotros</strong></h4>
            <a href="#">Vender productos en UniMarket</a>
            <a href="#">Anuncia tus Productos</a>
            <a href="#">Socio del servicio de entrega</a>
        </div>
        <div class="col">
            <h4><strong>Servicios de Pago</strong></h4>
            <a href="#">Certifica tu Tienda</a>
        </div>
        <div class="col">
            <h4><strong>Podemos Ayudarte</strong></h4>
            <a href="#">Con tu cuenta</a>
            <a href="#">Con tus pedidos</a>
            <a href="#">Devoluciones</a>
            <a href="#">Administrar tu tienda</a>
            <a href="#">Ayuda</a>
        </div>
        <div class="col pago">
            <h4><strong>Metodos de Pagos</strong></h4>
            <img src="../../../assets/images/img/pay/pay.png">
        </div>

        <div class="copyright">
            <p>© 2024 UniMarket.com</p>
        </div>
    </footer>

    <script src="../../../assets/js/script.js"></script>

</body>

</html>