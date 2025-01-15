<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniMarket</title>

    <script src="https://kit.fontawesome.com/5bf367d5b8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Backend/Views/Frontend/assets/css/style.css">
</head>

<body>
    <section id="header">
        <!-- Logo y envío -->
        <div class="top-header">
            <a href="#" class="logo">
                <img src="<?php echo base_url; ?>Backend/Views/Frontend/assets/images/logo71.png" alt="UniMarket" />
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
                 <span href="<?php echo base_url; ?>Backend/Views/Frontend/public/auth/auth.html">Iniciar Sesion</span>
                </p>
                <p class="dr">
                 Pedidos<br />
                 <span>y Devoluciones</span>
                </p>
                <a href="<?php echo base_url; ?>Backend/Views/Frontend/public/tabs/cart/cart.php" class="cart">
                 <i class="fa-solid fa-cart-shopping"></i><span>0</span>
                </a>
            </div>
        </div>
    </section>

<!-- Menú de navegación -->
<nav class="bottom-header">
    <div id="mobile">
        <i id="bar" class="fas fa-bars"></i>
        <a class="active" href="<?php echo base_url; ?>Backend/Views/Frontend/index.php">Inicio</a>
        <a href="<?php echo base_url; ?>Backend/Views/Frontend/public/tabs/shop/shop.php">Tienda</a>
        <a href="<?php echo base_url; ?>Backend/Views/Frontend/public/tabs/blog/blog.php">Blog</a>
    </div>
    <ul id="navbar">
       <!-- Menú desplegable -->
    <div id="side-menu">
    <div class="menu-header">
        <i class="fas fa-user-circle"></i>
        <span href="../public/auth/auth.html">Hola, Identifícate</span>
    </div>
    <ul class="menu-sections">
        <li class="menu-section">
            <span class="section-title">Mi Cuenta</span>
            <ul class="sub-menu">
                <li><a href="<?php echo base_url; ?>Backend/Views/Frontend/public/auth/Auth.php">Iniciar Sesion</a></li>
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
                <li><a href="<?php echo base_url; ?>Home">Iniciar Sesion</a></li>
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
