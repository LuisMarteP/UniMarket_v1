<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog</title>

        <script src="https://kit.fontawesome.com/5bf367d5b8.js" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link rel="stylesheet" href="../../../assets/css/style.css">
        <link rel="stylesheet" href="../../../assets/css/stylesblog.css">
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
                    <a href="../../public/tabs/cart/cart.html" class="cart">
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
            <a href="../../../public/tabs/shop/shop.php">Tienda</a>
            <a class="active" href="../../../public/tabs/blog/blog.php">Blog</a>
        </div>
        <ul id="navbar">
           <!-- Menú desplegable -->
        <div id="side-menu">
        <div class="menu-header">
            <i class="fas fa-user-circle"></i>
            <span href="../../../public/auth/auth.html">Hola, Identifícate</span>
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
   
    <!-- Contendor del Blog -->    
        <section id="blog">
         <div class="blog-box">
          <div class="blog-img">
           <img src="../../../assets/images/img/blog/b1.jpg">
          </div>
          <div class="blog-details">
           <h4>Transforma tu tienda local en un negocio digital exitoso</h4>
           <h1>12/20/2024</h1>
           <p>Descubre los primeros pasos para llevar tu tienda física al mundo 
            digital. Desde la creación de una página web hasta la gestión de 
            inventarios online, te mostramos cómo empezar.</p>
           <a href="#">Leer</a>
          </div>   
         </div>
         <div class="blog-box">
            <div class="blog-img">
             <img src="../../../assets/images/img/blog/b2.jpg">
            </div>
            <div class="blog-details">
             <h4>Las ventajas de digitalizar tu tienda en la era moderna</h4>
             <h1>12/18/2024</h1>
             <p>Explora los beneficios de tener una presencia online para tu negocio.
                 Desde alcanzar a más clientes hasta mejorar la eficiencia operativa, 
                 digitalizar tu tienda puede ser un cambio transformador.</p>
             <a href="#">Leer</a>
            </div>   
           </div>
           <div class="blog-box">
            <div class="blog-img">
             <img src="../../../assets/images/img/blog/b3.jpg">
            </div>
            <div class="blog-details">
             <h4>Cómo proteger tu tienda online de estafas y fraudes</h4>
             <h1>12/15/2024</h1>
             <p>Aprende a identificar y prevenir las estafas más comunes en
                el comercio electrónico. Te ofrecemos consejos prácticos para 
                mantener la seguridad de tu tienda y la confianza de tus clientes.</p>
             <a href="#">Leer</a>
            </div>   
           </div>
           <div class="blog-box">
            <div class="blog-img">
             <img src="../../../assets/images/img/blog/b4.jpg">
            </div>
            <div class="blog-details">
             <h4>Estrategias de marketing digital para tiendas locales</h4>
             <h1>12/15/2024</h1>
             <p>Conoce las mejores prácticas de marketing digital para atraer 
                y retener clientes. Desde el uso de redes sociales hasta campañas 
                de email marketing, descubre cómo hacer crecer tu negocio online.</p>
             <a href="#">Leer</a>
            </div>   
           </div>
           <div class="blog-box">
            <div class="blog-img">
             <img src="../../../assets/images/img/blog/b5.jpg">
            </div>
            <div class="blog-details">
             <h4>Historias de éxito: Tiendas locales que se digitalizaron y prosperaron</h4>
             <h1>12/10/2024</h1>
             <p>Inspírate con casos reales de tiendas locales que han logrado el éxito 
                al digitalizarse. Aprende de sus experiencias y descubre cómo puedes 
                aplicar sus estrategias a tu propio negocio.</p>
             <a href="#">Leer</a>
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