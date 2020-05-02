<body class="single-page">
    <!--Header-->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Grupos</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!--Agregar-->
        <?php if (isset($usuario)) { ?>
        <div class="row elements-wrap">
            <div class="col-12">
                <div class="entry-content elements-container">
                    <a href="<?php echo base_url(); ?>grupos/crear" class="btn orange-border">Agregar Nuevo</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

    <div class="our-causes pt-0">
        <div class="container">
            <?php 
                //Si la lista no esta vacia generar grupos
                if (!empty($grupos)) {
                    $indicadorCierre = 3;

                    for ($i = 0; $i < count($grupos); $i++) { 

                        //Se imprimen 3 grupos fila, condicion que la inicia
                        if ($i % 3 == 0)
                            echo "<div class='row'>";                                    
            ?>       

                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="cause-wrap" id="<?php echo base_url("grupos/".$grupos[$i]["Id"]); ?>" onClick="redirect(this.id)" style="cursor: pointer; border: 1px solid #e0e0e0;">       
                                        <figure class="m-0">
                                            <img src="<?php echo $grupos[$i]["imagen"]; ?>" alt="" style="width: 100%; height: 204px;">
                                        </figure>     

                                        <div class="cause-content-wrap">
                                            <header class="entry-header d-flex flex-wrap align-items-center">
                                                <h2 class="entry-title w-100 m-0">
                                                    <?php echo $grupos[$i]["Nombre"]; ?>
                                                </h2>
                                            </header>

                                            <div class="entry-content">
                                                <p class="m-0"><?php echo $grupos[$i]["Contenido"]; ?></p>
                                            </div>

                                            <div class="fund-raised w-100">
                                                <div class="fund-raised-details d-flex flex-wrap justify-content-between align-items-center">
                                                    <div class="fund-raised-total mt-4">
                                                        Publicado en: <?= $grupos[$i]["Fecha"] ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

            <?php 
                        //Condicion que cierra una fila para que en siguiente iteracion se abra otra
                        if ($i + 1 == $indicadorCierre) {
                            $indicadorCierre += 3;

                            echo "</div>";
                        }
                    } 
            } else {
                ?> No existen grupos en este momento. <?php   
            }
            ?>
        </div>
    </div>
</body>

<script>
    /**
        Funcion que redirecciona a la pagina del grupo
        @param value   URL que contiene el grupo seleccionado
     */
    function redirect(value) {
        window.location.href = value;
    }
</script>