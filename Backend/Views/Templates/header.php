<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="panel administración, configuración, gestión" />
        <meta name="author" content="UniMarket" />

        <title>Panel de Administración</title> 
        <link href="<?php echo base_url;?>Backend/Assets/css/style.min.css" rel="stylesheet" />
        <link href="<?php echo base_url;?>Backend/Assets/css/styles.css" rel="stylesheet" />
        <script src="<?php echo base_url;?>Backend/Assets/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Panel Administrativo</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
           
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">My Perfil</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?php echo base_url; ?>Usuarios/salir">Cerrar Sesion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-cogs text-primary fa-2x"></i></div>
                                Administración
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url;?>Usuarios"><i class="fas fa-user mr-2 text-info"></i>Usuarios</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Pedidos"><i class="fa fa-clipboard-list mr-2 text-info"></i>Pedidos</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Configuracion"><i class="fa fa-tools mr-2 text-info"></i>Configuración</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-id-card-alt text-primary fa-2x"></i></div>
                                Tu Cuenta
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url;?>Direcciones"><i class="fas fa-directions mr-2 text-info"></i>Direcciones</a>
                                    <a class="nav-link" href="<?php echo base_url;?>MetodoPagos"><i class="fas fa-credit-card mr-2 text-info"></i>Metodo Pago</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Historial"><i class="fas fa-file-alt mr-2 text-info"></i>Historial</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="<?php echo base_url;?>Categorias">
                                <div class="sb-nav-link-icon"><i class="fas fa-indent mr-2 text-primary fa-2x"></i></div>
                                Categorias
                            </a>
                            <a class="nav-link" href="<?php echo base_url;?>Productos">
                                <div class="sb-nav-link-icon"><i class="fas fa-cart-arrow-down mr-2 text-primary fa-2x"></i></div>
                                Productos
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid mt-2">
                       
                    
        
                
