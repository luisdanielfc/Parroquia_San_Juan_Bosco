<body>
    <?php 
        echo validation_errors();
        echo form_open_multipart('noticias/crear'); 
    ?>
        <div class="container">
            <div class="row" style="margin-top: 50px">
                <div class="col-12">
                    <h3>Nombre</h3>

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

<script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function(event) { 
        //Clase apadtador que permite subir archivos al servidor
        /*class MyUploadAdapter {
            constructor( loader ) {
                // The file loader instance to use during the upload.
                this.loader = loader;
            }

            // Starts the upload process.
            upload() {
                return this.loader.file
                    .then( file => new Promise( ( resolve, reject ) => {
                        this._initRequest();
                        this._initListeners( resolve, reject, file );
                        this._sendRequest( file );
                    } ) );
            }

            // Aborts the upload process.
            abort() {
                if ( this.xhr ) {
                    this.xhr.abort();
                }
            }

            _initRequest() {
                const xhr = this.xhr = new XMLHttpRequest();

                // Note that your request may look different. It is up to you and your editor
                // integration to choose the right communication channel. This example uses
                // a POST request with JSON as a data structure but your configuration
                // could be different.
                var url = "<?php echo base_url(); ?>assets/uploads";
                console.log(url);
                xhr.open( 'POST', url, true );
                xhr.responseType = 'json';
            }

            // Initializes XMLHttpRequest listeners.
            _initListeners( resolve, reject, file ) {
                const xhr = this.xhr;
                const loader = this.loader;
                const genericErrorText = `No se pudo subir el archivo: ${ file.name }.`;

                xhr.addEventListener( 'error', () => reject( genericErrorText ) );
                xhr.addEventListener( 'abort', () => reject() );
                xhr.addEventListener( 'load', () => {
                    const response = xhr.response;

                    // This example assumes the XHR server's "response" object will come with
                    // an "error" which has its own "message" that can be passed to reject()
                    // in the upload promise.
                    //
                    // Your integration may handle upload errors in a different way so make sure
                    // it is done properly. The reject() function must be called when the upload fails.
                    if ( !response || response.error ) {
                        return reject( response && response.error ? response.error.message : genericErrorText );
                    }

                    // If the upload is successful, resolve the upload promise with an object containing
                    // at least the "default" URL, pointing to the image on the server.
                    // This URL will be used to display the image in the content. Learn more in the
                    // UploadAdapter#upload documentation.
                    resolve( {
                        default: response.url
                    } );
                } );

                // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                // properties which are used e.g. to display the upload progress bar in the editor
                // user interface.
                if ( xhr.upload ) {
                    xhr.upload.addEventListener( 'progress', evt => {
                        if ( evt.lengthComputable ) {
                            loader.uploadTotal = evt.total;
                            loader.uploaded = evt.loaded;
                        }
                    } );
                }
            }

            // Prepares the data and sends the request.
            _sendRequest( file ) {
                // Prepare the form data.
                const data = new FormData();

                data.append( 'upload', file );

                // Important note: This is the right place to implement security mechanisms
                // like authentication and CSRF protection. For instance, you can use
                // XMLHttpRequest.setRequestHeader() to set the request headers containing
                // the CSRF token generated earlier by your application.

                // Send the request.
                this.xhr.send( data );
            }
        }

        function MyCustomUploadAdapterPlugin( editor ) {
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                // Configure the URL to the upload script in your back-end here!
                return new MyUploadAdapter( loader );
            };
        }*/

        //Se inicializa el editor
        ClassicEditor
            .create(document.querySelector('#editor')/*, {
                extraPlugins: [ MyCustomUploadAdapterPlugin ]
            }*/)
            .then(editor => {
                window.editor = editor;
                document.getElementsByClassName("ck-editor")[0].style.width = "100%";
                document.getElementsByClassName("ck-editor")[0].setAttribute('name', 'contenido');
                //document.getElementsByClassName("ck-content")[0].style.height = "300px";
            })
            .catch(error => {
                console.log(error);

                var mensajeError = document.createElement('div');
                mensajeError.innerHTML('<strong>Error</strong> La libreria CKEditor tuvo un error. Por favor, consulte la consola de desarrollador del explorador para más información');
                mensajeError.classList.add('alert');
                mensajeError.classList.add('alert-danger');
            });
        
            /*document.getElementById( 'botonCrear' ).onclick = () => {
                document.getElementById("editor").value = editor.getData();
            }*/
    });
</script>