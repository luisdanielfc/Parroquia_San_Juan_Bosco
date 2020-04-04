<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Parroquia San Juan Bosco</title>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--Logo Explorador-->
        <link rel="icon" href="<?php echo base_url()?>assets/images/logo.png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
        <!-- FontAwesome CSS -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/font-awesome.min.css">
        <!-- ElegantFonts CSS -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/elegant-fonts.css">
        <!-- themify-icons CSS -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/themify-icons.css">
        <!-- Swiper CSS -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/swiper.min.css">
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
    </head>

    <body class="single-page about-page">
        <header class="site-header">

            <?php 
                if (isset($mensaje))
                {
                    echo ($exito == true) ?
                    "<div class='alert alert-success' style='margin-bottom: 0;'>
                        <strong>Listo!</strong> " . $mensaje . "
                    </div>"
                    : "<div class='alert alert-danger' style='margin-bottom: 0;'>
                        <strong>Error</strong> " . $mensaje . "
                    </div>";
                }
            ?>

            <div class="top-header-bar">
                <div class="container">
                    <div class="row flex-wrap justify-content-center justify-content-lg-between align-items-lg-center">

                        <!-- Si el usuario se encuentra logueado -->
                        <?php if (isset($usuario)) { 
                            /*echo print_r($usuario);*/?>
                                <div class="col-12 col-lg-8 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">
                                    <div class="header-bar-email">
                                        Bienvenido!
                                    </div><!-- .header-bar-email -->

                                    <div class="header-bar-text">
                                        <p><span><?php echo $usuario['Nombre']; ?></span></p>
                                    </div><!-- .header-bar-text -->
                                </div><!-- .col -->

                                <form id="log-out-form" method="post" action="<?php echo base_url(); ?>usuarios/logOut" class="col-12 col-lg-4 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
                                    <div class="donate-btn">
                                        <a type="submit" onclick="document.getElementById('log-out-form').submit()" style="cursor: pointer;">Salir</a>
                                    </div><!-- .donate-btn -->
                                </form><!-- .col -->
                                </div>
                        <?php } else { ?>
                            <div class="col-12 col-lg-4 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0"></div>
                            <form id="log-in-form" method="post" action="<?php echo base_url(); ?>usuarios/logIn" class="col-12 col-lg-8 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
                                <input name="usuario" placeholder="Usuario" style="margin-right: 10px;">
                                <input type="password" name="contrasena" placeholder="Contraseña" style="margin-right: 10px;">

                                <div class="donate-btn">
                                    <a type="submit" onclick="document.getElementById('log-in-form').submit()" style="cursor: pointer;">Ingresar</a>
                                </div>
                            </form>
                        <?php } ?>    
                    </div>
                </div>
            </div>

            <div class="nav-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                            <div class="site-branding d-flex align-items-center">
                                <a class="d-block" href="<?php echo base_url(); ?>" rel="home"><img class="d-block" src="<?php echo base_url()?>assets/images/logo.png" alt="logo"></a>
                            </div>

                            <nav id="nav-bar" class="site-navigation d-flex justify-content-end align-items-center">
                                <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center" style="z-index: 1;">
                                    <li><a class="opcion-header" href="<?php echo base_url(); ?>">Inicio</a></li>
                                    <li><a class="opcion-header" href="<?php echo base_url(); ?>quienes_somos">¿Quiénes Somos?</a></li>
                                    <li><a class="opcion-header" href="<?php echo base_url(); ?>grupos">Grupos</a></li>
                                    <li><a class="opcion-header" href="<?php echo base_url(); ?>noticias">Noticias</a></li>
                                    <li><a class="opcion-header" href="<?php echo base_url(); ?>contactanos">Contáctanos</a></li>
                                    <li><a class="opcion-header" href="<?php echo base_url(); ?>administracion">Administrar Contenido</a></li>
                                </ul>
                            </nav>

                            <div class="hamburger-menu d-lg-none">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>