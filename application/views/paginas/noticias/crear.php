<body>
    <?php 
        echo validation_errors();
        echo form_open_multipart('noticias/crear'); 
    ?>
        <div class="container">
            <div class="row" style="margin-top: 50px">
                <div class="col-12">
                    <h3>Título</h3>

                    <div class="billing-information  d-flex flex-wrap justify-content-between align-items-center">
                        <input type="text" name="titulo" placeholder="Titulo" style="margin-top: 10px; width: 100%;">
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 50px">
                <div class="col-12">
                    <h3>Contenido</h3>

                    <div class="billing-information  d-flex flex-wrap justify-content-between align-items-center">
                        <textarea id="editor" name="contenido"></textarea>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 30px">
                    <div class="col-12">
                        <div class="entry-content elements-container">
                            <input id="botonCrear" type="submit" value="Crear" class="btn orange-border">
                        </div>
                    </div>
            </div>
        </div>
    </form>
</body>

<script type="text/javascript" src="<?php echo base_url("assets/ckeditor/ckeditor.js"); ?>"></script>
<script>
    document.addEventListener('DOMContentLoaded', function(event) { 
        //Clase apadtador que permite subir archivos al servidor
        CKEDITOR.replace( 'editor', {
            height: 300,
            filebrowserUploadUrl: "<?php echo base_url("assets/ckeditor/ck_uploads.php"); ?>",
            filebrowserUploadMethod: 'form'
        });
    });
</script>