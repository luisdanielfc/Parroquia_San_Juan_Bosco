<body class="single-page">
    <!--Header-->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Noticias</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!--Agregar-->
        <div class="row elements-wrap">
            <div class="col-12">
                <div class="entry-content elements-container">
                    <a href="<?php echo base_url(); ?>noticias/crear" class="btn orange-border">Agregar Nueva</a>
                </div>
            </div>
        </div>
        
        <?php 
            $indicadorCierre = 3;

            for ($i = 0; $i < count($noticias); $i++) { 

                //Se imprimen 3 grupos fila, condicion que la inicia
                if ($i % 3 == 0)
                    echo "<div class='row'>
                            <div class='col-12'>
                                <div class='swiper-container causes-slider'>
                                    <div class='swiper-wrapper'>";
        ?>                     
        <div class="swiper-slide" id="<?php echo base_url(); ?>noticias/<?php echo $noticias[$i]["Id"]; ?>" onClick="redirect(this.id)" style="cursor: pointer;">
            <div class="cause-wrap" style="border: 1px solid #e0e0e0;">
                <figure class="m-0">
                    <img src="<?php echo base_url()?>assets/images/cause-2.jpg" alt="">
                </figure>

                <div class="cause-content-wrap">
                    <header class="entry-header d-flex flex-wrap align-items-center">
                        <h3 class="entry-title w-100 m-0" style="padding: 20px; text-align: center;">
                            <?php echo $noticias[$i]["Titulo"]; ?>
                        </h3>
                    </header>
                </div>
            </div>
        </div>
        <?php 
                //Condicion que cierra una fila para que en siguiente iteracion se abra otra
                if ($i + 1 == $indicadorCierre) {
                    $indicadorCierre += 3;

                    echo "</div>
                            </div>
                                </div>                                        
                                    </div>";
                }
            } 

            //Condicion de cierre de fila en caso de que no sean mod de 3
            if (count($noticias) % 3 != 0)
                echo "</div>
                        </div>
                            </div>                                        
                                </div>";
        ?>
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