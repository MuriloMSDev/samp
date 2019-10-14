function isInvalid(input) {
    if (input.hasClass('is-invalid')) {
        input.parents('.file-caption-main:first')
            .children('.kv-fileinput-caption:first')
            .addClass('is-invalid')

        input.parents('.file-input:first')
            .addClass('is-invalid')
    }
}

export default () => {
    const defaultConfig = {
        theme: 'fas',
        showUpload: false,
        previewFileType: 'any',
        language: 'pt-BR',
        browseOnZoneClick: true,
        initialPreviewAsData: true,
        fileActionSettings: {
            showDrag: false
        },
        maxFileSize: 4096
    }

    $('.file-input:not([multiple])').each(function() {
        let input = $(this)
        let image = JSON.parse(input.attr('image') || '[]')

        input.fileinput(
            $.extend(
                true,
                {
                    showRemove: false,
                    showClose: false,
                    fileActionSettings: {
                        showRemove: false
                    },
                    initialPreview: image ? image.url : '',
                    initialPreviewConfig: [{ caption: image ? image.name : '' }]
                },
                defaultConfig
            )
        )

        isInvalid(input)
    })

    $('[multiple].file-input').each(function() {
        let input = $(this)
        let images = JSON.parse(input.attr('images') || '[]')

        input.fileinput(
            $.extend(
                true,
                {
                    overwriteInitial: false,
                    initialPreview: images.map(element => {
                        return element.url
                    }),
                    initialPreviewConfig: images.map(element => {
                        return {
                            caption: element.name,
                            key: element.id,
                            url: input.attr('delete-url'),
                            extra: {
                                _token: $('meta[name="csrf-token"]').attr(
                                    'content'
                                ),
                                _method: 'DELETE',
                                entity_type: input.attr('entity-type'),
                                entity_id: input.attr('entity-id')
                            }
                        }
                    }),
                    validateInitialCount: true,
                    maxFileCount: input.attr('max') || 0
                },
                defaultConfig
            )
        )

        isInvalid(input)
    })
}
