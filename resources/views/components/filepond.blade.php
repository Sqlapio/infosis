<!-- FilePond -->
        {{-- Jquery Library --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        {{-- File Pond Js Cdn --}}
        <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-validate-size/dist/filepond-plugin-image-validate-size.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
        <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

        {{-- File Pond Jquerys Cdn --}}
        <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
        {{-- File Pond Image Preview Cdn --}}
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
       
        <script>
            FilePond.registerPlugin(
                FilePondPluginImagePreview, 
                FilePondPluginImageValidateSize,  
                FilePondPluginFileValidateSize,
                );

            $("#filepond").filepond({
                allowImagePreview: true,
                allowImageFilter: true,
                allowFileSizeValidation: true,
                allowImageValidateSize: true,
                imageValidateSizeMaxWidth: 5000,
                imageValidateSizeMaxHeight: 5000,
                acceptedFileTypes: ["image/png", "image/jpeg", "image/jpg"],
                maxFiles: 6,
                credits: false,
                server: {
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    },
                    url: "/upload/image",
                    process: true,
                    // revert: true,
                    restore: "/delete",
                    fetch: false,
                },
            });


            const labels_es = {
                labelIdle: 'Cargar imagen <span class = "filepond--label-action"> Examinar <span>',
                labelInvalidField: "El campo contiene archivos inválidos",
                labelFileWaitingForSize: "Esperando tamaño",
                labelFileSizeNotAvailable: "Tamaño no disponible",
                labelFileLoading: "Cargando",
                labelFileLoadError: "Error durante la carga",
                labelFileProcessing: "Cargando",
                labelFileProcessingComplete: "Carga completa",
                labelFileProcessingAborted: "Carga cancelada",
                labelFileProcessingError: "Error durante la carga",
                labelFileProcessingRevertError: "Error durante la reversión",
                labelFileRemoveError: "Error durante la eliminación",
                labelTapToCancel: "toca para cancelar",
                labelTapToRetry: "tocar para volver a intentar",
                labelTapToUndo: "tocar para deshacer",
                labelButtonRemoveItem: "Eliminar",
                labelButtonAbortItemLoad: "Abortar",
                labelButtonRetryItemLoad: "Reintentar",
                labelButtonAbortItemProcessing: "Cancelar",
                labelButtonUndoItemProcessing: "Deshacer",
                labelButtonRetryItemProcessing: "Reintentar",
                labelButtonProcessItem: "Cargar",
                labelMaxFileSizeExceeded: "El archivo es demasiado grande",
                labelMaxFileSize: "El tamaño máximo del archivo es {filesize}",
                labelMaxTotalFileSizeExceeded: "Tamaño total máximo excedido",
                labelMaxTotalFileSize: "El tamaño total máximo del archivo es {filesize}",
                labelFileTypeNotAllowed: "Archivo de tipo no válido",
                fileValidateTypeLabelExpectedTypes: "Espera {allButLastType} o {lastType}",
                imageValidateSizeLabelFormatError: "Tipo de imagen no compatible",
                imageValidateSizeLabelImageSizeTooSmall: "La imagen es demasiado pequeña",
                imageValidateSizeLabelImageSizeTooBig: "La imagen es demasiado grande",
                imageValidateSizeLabelExpectedMinSize: "El tamaño mínimo es {minWidth} × {minHeight}",
                imageValidateSizeLabelExpectedMaxSize: "El tamaño máximo es {maxWidth} × {maxHeight}",
                imageValidateSizeLabelImageResolutionTooLow: "La resolución es demasiado baja",
                imageValidateSizeLabelImageResolutionTooHigh: "La resolución es demasiado alta",
                imageValidateSizeLabelExpectedMinResolution: "La resolución mínima es {minResolution}",
                imageValidateSizeLabelExpectedMaxResolution: "La resolución máxima es {maxResolution}",
            };

            // in page
            FilePond.setOptions(labels_es);

        </script>
