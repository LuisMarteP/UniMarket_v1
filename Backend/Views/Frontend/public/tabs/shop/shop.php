<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>

    <script src="https://kit.fontawesome.com/5bf367d5b8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/stylesshop.css">

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
                <a href="../../public/tabs/cart/html/cart.html" class="cart">
                    <i class="fa-solid fa-cart-shopping"></i><span>0</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Menú de navegación -->
    <nav class="bottom-header">
        <div id="mobile">
            <i id="bar" class="fas fa-bars"></i>
            <a href="../../../public/tabs/index.php">Inicio</a>
            <a class="active" href="../../../../public/tabs/shop/shop.php">Tienda</a>
            <a href="../../../public/tabs/blog/blog.php">Blog</a>
        </div>
        <ul id="navbar">
            <!-- Menú desplegable -->
            <div id="side-menu">
                <div class="menu-header">
                    <i class="fas fa-user-circle"></i>
                    <span href="../../../../public/auth/auth.php">Hola, Identifícate</span>
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


    <section id="product1" class="section-p1">

        <div class="pro-container">
            <div class="pro">
                <img src="../../../assets/images/img/products/e1.jpg">
                <div class="des">
                    <span>RX250-K</span>
                    <h5>Gaming Keyboard and Mouse and Mouse pad and Gaming Headset</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$3,200</h4>
                </div>
                <a href="#" id="cart"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>

            <div class="pro">
                <img src="../../../assets/images/img/products/e2.jpg">
                <div class="des">
                    <span>SAMSUNG Galaxy Buds 3 Pro</span>
                    <h5>Auriculares Bluetooth inalámbricos</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$14,000</h4>
                </div>
                <a href="#" id="cart"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>

            <div class="pro">
                <img src="../../../assets/images/img/products/e3.jpg">
                <div class="des">
                    <span>Funda para Google Pixel 8a</span>
                    <h5>Funda de silicona para teléfono con 1 protector de pantalla, forro de microfibra antiarañazos</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$250</h4>
                </div>
                <a href="#" id="cart"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>

            <div class="pro">
                <img src="../../../assets/images/img/products/e4.jpg">
                <div class="des">
                    <span>Google Pixel 7a</span>
                    <h5>Teléfono celular Android desbloqueado - Smartphone con lente gran angular y batería de 24 horas - 128 GB - Carbón</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$250</h4>
                </div>
                <a href="#" id="cart"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>

            <div class="pro">
                <img src="../../../assets/images/img/products/e5.jpg">
                <div class="des">
                    <span>VIZIO Smart TV</span>
                    <h5>Full HD 1080p de 40 pulgadas con DTS Virtual: X, compatibilidad con Alexa, Google Cast integrado, compatible con auriculares Bluetooth</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$13,500</h4>
                </div>
                <a href="#" id="cart"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>

            <div class="pro">
                <img src="../../../assets/images/img/products/e6.jpg">
                <div class="des">
                    <span>HP Smart Tank 5101</span>
                    <h5>Impresora inalámbrica todo en uno con 2 años de tinta incluidos, impresión,
                        escaneo, copia, mejor para el hogar, tanque de tinta recargable (1F3Y0A)</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$9,000</h4>
                </div>
                <a href="#" id="cart"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>

            <div class="pro">
                <img src="../../../assets/images/img/products/e7.jpg">
                <div class="des">
                    <span>CHONCHOW</span>
                    <h5>Combo de teclado y mouse iluminados, teclado LED RGB para juegos de tamaño completo y mouse para juegos con cable arcoíris</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$2,500</h4>
                </div>
                <a href="#" id="cart"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>

            <div class="pro">
                <img src="../../../assets/images/img/products/e8.jpg">
                <div class="des">
                    <span>Acer Aspire 3 A315-24P-R7VH</span>
                    <h5>Laptop delgada IPS Full HD, 15.6 pulgadas, AMD Ryzen 3 7320U cuatro núcleos, AMD Radeon,
                        8 GB LPDDR5, unidad de estado sólido SSD NVMe 128 GB, Wi-Fi 6, Windows 11 Home S</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$18,500</h4>
                </div>
                <a href="#" id="cart"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>

        </div>
    </section>

    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fa-solid fa-right-long"></i></a>
    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Suscríbete para recibir noticaciones</h4>
            <p>Reciba actualizaciones por correo electrónico sobre las últimas novedades y<span> ofertas especiales.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Ingresa tu Email">
            <button class="normal">Registrarme</button>
        </div>
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