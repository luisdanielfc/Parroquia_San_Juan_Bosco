<body>
        <input type="hidden" nanme="id" value="<?php echo $noticia["Id"]; ?>">
        <div class="container">
        <!--Agregar-->
        <div class="row elements-wrap">
            <div class="col-12">
                <div class="entry-content elements-container">
                    <a href="<?php echo base_url(); ?>noticias/editar/<?php echo $noticia["Id"];?>" class="btn orange-border">Editar</a>
                    <button type="button" class="btn orange-border" data-toggle="modal" data-target="#modal-eliminar">Eliminar</button>
                </div>
            </div>
        </div>
        </div>
        <div class="container">
            <div class="row" style="margin-top: 50px">
                <div class="section-heading">
                    <h3><?php echo $noticia["Titulo"]; ?></h3>
                </div>
            </div>
            <div class="row" style="margin-top: 50px">
                <div class="col-12">
                    <?php echo $noticia["Contenido"]; ?>
                </div>
            </div>
        </div>

        <!-- Modal confimacion de eliminación-->
        <div id="modal-eliminar" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar noticia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Está seguro de que desea eliminar la noticia actual?</p>
                </div>
                <div class="modal-footer">
                    <?php 
                        echo form_open('noticias/eliminar/'.$noticia["Id"]); 
                    ?>
                        <button type="submit" class="btn orange-border">Eliminar</button>
                    </form>
                    
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
                </div>
            </div>
        </div>
</body>