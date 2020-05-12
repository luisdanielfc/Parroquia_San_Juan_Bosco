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
                                </header>

                                <div class="entry-content mt-4">
                                    <p>Portal web oficial de la parroquia San Juan bosco Coro</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php foreach ($slides["noticias"] as $noticia) { ?>
                        <div class="swiper-slide hero-content-wrap">
                            <img src="<?php echo $noticia["imagen"]; ?>" alt="" style="width: 1280px; height: 500px;">

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
                        </div>
            <?php 
                }

                foreach ($slides["grupos"] as $grupo) {
                    //echo print_r($grupo);
            ?>
                        <div class="swiper-slide hero-content-wrap">
                            <img src="<?php echo $grupo["imagen"]; ?>" alt="" style="width: 1280px; height: 500px;">

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

<div class="home-page-welcome">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 order-2 order-lg-1">
                <div class="welcome-content">
                    <header class="entry-header">
                        <h2 class="entry-title">Bienvenido</h2>
                    </header>

                    <div class="entry-content mt-5">
                        <p style="color: black; text-align: justify;">Arquidiócesis de Coro, ubicada en la Ciudad de Coro y  de formación salesiana durante 50 años, desde el 1 de Octubre de 2017 fue asumida por la Arquidiócesis ya que los padres salesianos por falta de vocaciones decidieron entregarla. Desde entonces la ha asumido la Arquidiócesis de Coro. </p>
                        <p style="color: black; text-align: justify;">Comunidad joven, alegre de muchos movimientos y asistencia de fieles. Grande en su extensión, incluso acoge a una comunidad rural. </p>
                    </div>

                    <div class="entry-footer mt-5">
                        <a href="<?= base_url("quienes_somos") ?>" class="btn gradient-bg mr-2" style="cursor: pointer;">Leer Más</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 mt-4 order-1 order-lg-2">
                <img src="<?= base_url("assets/images/virgen.jpeg") ?>" alt="welcome" style="width: 75%;">
            </div>
        </div>
    </div>
</div>

<div class="home-page-icon-boxes" style="background: grey;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3 mt-3 mt-lg-0">
                    <div class="icon-box active" data-toggle="modal" data-target="#modal-misa">
                        <figure class="d-flex justify-content-center">
                            <img src="<?= base_url("assets/images/church-icon.png") ?>" alt="" style="width: 50px; height: 50px;">
                        </figure>

                        <header class="entry-header">
                            <h3 class="entry-title">Misa y Eucaristia</h3>
                        </header>

                        <div class="entry-content">
                            <p>Haga clic para saber los horarios</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3 mt-3 mt-lg-0">
                    <div class="icon-box active" data-toggle="modal" data-target="#modal-bautizo">
                        <figure class="d-flex justify-content-center">
                            <img src="<?= base_url("assets/images/baptism-icon.png") ?>" alt="" style="width: 50px; height: 50px;">
                        </figure>

                        <header class="entry-header">
                            <h3 class="entry-title">Bautizos</h3>
                        </header>

                        <div class="entry-content">
                            <p>Haga clic para obtener más información</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3 mt-3 mt-lg-0">
                    <div class="icon-box active" data-toggle="modal" data-target="#modal-comunion">
                        <figure class="d-flex justify-content-center">
                            <img src="<?= base_url("assets/images/holy-grail-icon.png") ?>" alt="" style="width: 50px; height: 50px;">
                        </figure>

                        <header class="entry-header">
                            <h3 class="entry-title">Catequesis</h3>
                        </header>

                        <div class="entry-content">
                            <p>Haga clic para saber los requerimientos</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3 mt-3 mt-lg-0">
                    <div class="icon-box active" data-toggle="modal" data-target="#modal-matrimonio">
                        <figure class="d-flex justify-content-center">
                            <img src="<?= base_url("assets/images/wedding-couple.png") ?>" alt="" style="width: 50px; height: 50px;">
                        </figure>

                        <header class="entry-header">
                            <h3 class="entry-title">Matrimonios</h3>
                        </header>

                        <div class="entry-content">
                            <!--<p>Lunes a Sábado  a las 6:00 PM</p>-->
                                                        <!--<p>Todos los Domingos a las 6:30 PM</p>-->
                            <p>Haga clic aquí para tener mayor información</p>
                        </div>
                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .home-page-icon-boxes -->

<div class="home-page-limestone">
        <div class="container">
            <div class="row align-items-end">
                <div class="coL-12 col-lg-6">
                    <div class="section-heading">
                        <h2 class="entry-title">En la acción social de la parroquia se atienden a una gran cantidad de personas de la comunidad</h2>

                        <p class="mt-5">Ponganse en contacto con nosotros para más información.</p>
                    </div><!-- .section-heading -->
                </div><!-- .col -->

                <div class="col-12 col-lg-6">
                    <div class="milestones d-flex flex-wrap justify-content-between">
                        <div class="col-12 col-sm-4 mt-5 mt-lg-0">
                            <div class="counter-box">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="<?= base_url("assets/images/olive.png") ?>" alt="">
                                </div>

                                <div class="d-flex justify-content-center align-items-baseline">
                                    <div class="start-counter" data-to="2" data-speed="2000"></div>
                                    <div class="counter-k">K</div>
                                </div>

                                <h3 class="entry-title">Personas en misa cada Domingo</h3><!-- entry-title -->
                            </div><!-- counter-box -->
                        </div><!-- .col -->

                        <div class="col-12 col-sm-4 mt-5 mt-lg-0">
                            <div class="counter-box">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="<?= base_url("assets/images/teamwork.png") ?>" alt="">
                                </div>

                                <div class="d-flex justify-content-center align-items-baseline">
                                    <div class="start-counter" data-to="79" data-speed="2000"></div>
                                </div>

                                <h3 class="entry-title">Enfermos antendidos mensualmente</h3><!-- entry-title -->
                            </div><!-- counter-box -->
                        </div><!-- .col -->

                        <div class="col-12 col-sm-4 mt-5 mt-lg-0">
                            <div class="counter-box">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="<?= base_url("assets/images/donation.png") ?>" alt="">
                                </div>

                                <div class="d-flex justify-content-center align-items-baseline">
                                    <div class="start-counter" data-to="160" data-speed="2000"></div>
                                </div>

                                <h3 class="entry-title">Reciben alimentos en jornadas</h3><!-- entry-title -->
                            </div><!-- counter-box -->
                        </div><!-- .col -->
                    </div><!-- .milestones -->
                </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .our-causes -->

<!-- Modal de misas-->
<div id="modal-misa" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Misas y Eucaristias</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Eucaristía</h6>
                <ul>
                    <li>Domingos a las 8:00 AM, 9:30 AM, 5:00 PM y 6:30 PM</li>
                </ul>
                <h6>Misa</h6>
                <ul>
                    <li>Lunes a Sábado a las 6:00 PM</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de bautizos-->
<div id="modal-bautizo" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bautizos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Requisitos</h6>
                <ul>
                    <li>Partida de nacimiento del niño o niña</li>
                    <li>Copia de cédula de los padrinos</li>
                    <li>Hacer el curso prebautismal</li>
                    <li>Entregar con antelación los documentos por secretaria</li>
                </ul>
                <h6>Horarios:</h6>
                <ul>
                    <li>Todos los Sábados</li>
                </ul>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div id="modal-comunion" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Catequesis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Primera Comunión</h6>
                <ul>
                    <li>Niños de 8 y 9 años inician la primera etapa (iniciación)</li>
                    <li>Niños de 10 y 11 segunda etapa (Sacramental)</li>
                </ul>
                <h6>Confirmación</h6>
                <ul>
                    <li>Jóvenes de 14 a 17</li>
                </ul> 
                <h6>Catequesis de Adultos</h6>
                <ul>
                    <li>Para padres y adultos sin sacramentos (dirigirse al sacerdote)</li>
                </ul>           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de matrimonio-->
<div id="modal-matrimonio" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Matrimonios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Requisitos</h6>
                <ul>
                    <li>Foto tipo carnet</li>
                    <li>Copia de cédula de contrayentes</li>
                    <li>Fé de bautismo</li>
                    <li>Constancia de confirmación</li>
                    <li>Curso pre matrimonial</li>
                    <li>Acta de matrimonio civil</li>
                    <li>Llenar expediente matrimonial</li>
                    <li>Copia de CI de dos testigos</li>
                    <li>Copia de CI de dos padrinos</li>
                    <li>Pago de Aranceles</li>
                    <li>Consignar una carpeta oficio con los documentos</li>
                </ul>
            </div>
            <div class="modal-footer">             
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>