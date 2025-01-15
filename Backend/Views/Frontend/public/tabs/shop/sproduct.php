<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniMarket</title>

    <!-- FontAwesome -->
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
            <a href="/Backend/Views/Frontend/index.php">Inicio</a>
            <a class="active" href="../shop.php">Tienda</a>
            <a href="../blog/blog.php">Blog</a>
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


    <!-- Product Section -->
    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="../../../assets/images/img/products/f1.jpg" width="100%" id="MainImg" alt="">
            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="../../../assets/images/img/products/f1.jpg" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="../../../assets/images/img/products/f2.jpg" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="../../../assets/images/img/products/f3.jpg" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="../../../assets/images/img/products/f4.jpg" width="100%" class="small-img" alt="">
                </div>
            </div>
        </div>

        <div class="single-pro-details">
            <h4>Men's Fashion T-Shirt</h4>
            <h2>$349.99</h2>
            <select>
                <option>Seleccionar</option>
                <option>M</option>
                <option>L</option>
                <option>XL</option>
            </select>
            <input type="number" value="1">
            <button class="normal">Agregar al carrito</button>
            <h4>Acerca de este artículo</h4>
            <span>
                Tela de calidad: las mejores camisetas de bolsillo para hombre de Hanes están
                hechas de 100% algodón que es suave y se mueve contigo. Los estilos jaspeados
                son 75% algodón/25% poliéster.
            </span>
        </div>
    </section>



      <!-- Carrito de Compras -->
  <div class="cart-container">
    <h3>Carrito</h3>
    <div class="cart-items empty">
      <p>El carrito está vacío.</p>
    </div>
    <button class="checkout empty">Proceder al pago</button>
  </div>

  <section id="product1" class="section-p1">
    <p>Productos relacionados con este artículo</p>
    <div class="pro-container">
        <div class="pro">
            <img src="../../../assets/images/img/products/f1.jpg">
            <div class="des">
                <span>Adidas</span>
                <h5>Cartoon Astronaut T-Shirts</h5>
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
            <img src="../../../assets/images/img/products/f2.jpg">
            <div class="des">
                <span>Adidas</span>
                <h5>Cartoon Astronaut T-Shirts</h5>
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
            <img src="../../../assets/images/img/products/f3.jpg">
            <div class="des">
                <span>Adidas</span>
                <h5>Cartoon Astronaut T-Shirts</h5>
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
            <img src="../../../assets/images/img/products/f4.jpg">
            <div class="des">
                <span>Adidas</span>
                <h5>Cartoon Astronaut T-Shirts</h5>
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

    </div>
</section>

    <!-- Lightbox -->
    <div id="lightbox" class="lightbox">
        <span id="closeLightbox" class="icon-close">&times;</span>
        <img id="lightboxImg" src="" alt="Imagen en grande">
    </div>

    <!-- Footer -->
    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Suscríbete para recibir noticaciones</h4>
            <p>Reciba actualizaciones por correo electrónico sobre las últimas novedades y<span> ofertas
                    especiales.</span></p>
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


    <script src="../../../assets/js/cart.js"></script>
    <script src="../../../assets/js/main.js" defer></script>
    <script src="../../../assets/js/script.js"></script>
</body>

</html>
