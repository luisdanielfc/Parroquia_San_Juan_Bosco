<div class="swiper-container hero-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide hero-content-wrap">
                <img src="<?php echo base_url("assets/images/muestra/parroquia-frente.jpeg"); ?>" alt="" style="width: 1280px; height: 500px;">

                <div class="hero-content-overlay position-absolute w-100 h-100">
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="col-12 col-lg-8 d-flex flex-column justify-content-center align-items-start">
                                <header class="entry-header">
                                    <h1>Bienvenido!</h1>
                                </header><!-- .entry-header -->

                                <div class="entry-content mt-4">
                                    <p>Portal web oficial de la parroquia San Juan bosco Coro</p>
                                </div><!-- .entry-content -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .hero-content-overlay -->
            </div><!-- .hero-content-wrap -->

            <?php foreach ($slides["noticias"] as $noticia) { ?>
                        <!--<div class="swiper-slide hero-content-wrap">
                            <img src="<?php echo $noticia["imagen"]; ?>" alt="">

                            <div class="hero-content-overlay position-absolute w-100 h-100">
                                <div class="container h-100">
                                    <div class="row h-100">
                                        <div class="col-12 col-lg-8 d-flex flex-column justify-content-center align-items-start">
                                            <header class="entry-header">
                                                <h1><?php echo $noticia["Titulo"]?></h1>
                                            </header>

                                            <div class="entry-content mt-4">
                                                <p><?php echo (strlen($noticia["Contenido"]) > 50) ? substr($noticia["Contenido"], 0, 50)."..." : $noticia["Contenido"];?></p>
                                            </div>

                                            <footer class="entry-footer d-flex flex-wrap align-items-center mt-5">
                                                <a href="<?php echo base_url("noticias/".$noticia["Id"]); ?>" class="btn gradient-bg mr-2">Leer Más</a>
                                            </footer>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
            <?php 
                }

                foreach ($slides["grupos"] as $grupo) {
                    //echo print_r($grupo);
            ?>
                        <div class="swiper-slide hero-content-wrap">
                            <img src="<?php echo $grupo["imagen"]; ?>" alt="" style="max-width: 1280px;max-height: 500px;">

                            <div class="hero-content-overlay position-absolute w-100 h-100">
                                <div class="container h-100">
                                    <div class="row h-100">
                                        <div class="col-12 col-lg-8 d-flex flex-column justify-content-center align-items-start">
                                            <header class="entry-header">
                                                <h1><?php echo $grupo["Nombre"]?></h1>
                                            </header>

                                            <div class="entry-content mt-4">
                                                <p><?php echo (strlen($grupo["Contenido"]) > 50) ? substr($grupo["Contenido"], 0, 50)."..." : $grupo["Contenido"]; ?></p>
                                            </div>

                                            <footer class="entry-footer d-flex flex-wrap align-items-center mt-5">
                                                <a href="<?php echo base_url("grupos/".$grupo["Id"]); ?>" class="btn gradient-bg mr-2">Leer Más</a>
                                            </footer>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php } ?>
        </div><!-- .swiper-wrapper -->

        <div class="pagination-wrap position-absolute w-100">
            <div class="container">
                <div class="swiper-pagination"></div>
            </div><!-- .container -->
        </div><!-- .pagination-wrap -->

        <!-- Add Arrows -->
        <!--<div class="swiper-button-next flex justify-content-center align-items-center">
            <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1171 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg></span>
        </div>

        <div class="swiper-button-prev flex justify-content-center align-items-center">
            <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1203 544q0 13-10 23l-393 393 393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"/></svg></span>
        </div>-->
    </div><!-- .hero-slider -->