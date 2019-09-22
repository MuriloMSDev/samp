export default (type, message, confirmCallback) => {
    let defaultConfig = {
        message: message,
        position: 'topRight',
        buttons: buttons,
        closeOnClick: true,
        transitionIn: 'fadeInLeft'
    }

    let buttons = []
    let search = message.search('a')
    if (search !== -1) {
        let button = message.slice(search)
        buttons.push([button, () => window.location.href = $(button).attr('href'), true])
        message = message.slice(0, search - 1)
    }

    switch (type) {
        case 'info':
            iziToast.info($.extend(true, {}, defaultConfig))
            break
        case 'warning':
            iziToast.warning($.extend(true, {
                title: 'Cuidado'
            }, defaultConfig))
            break
        case 'success':
            iziToast.success($.extend(true, {
                title: 'Sucesso'
            }, defaultConfig))
            break
        case 'confirm':
            iziToast.question({
                timeout: 20000,
                close: false,
                drag: false,
                overlay: true,
                displayMode: 'once',
                id: 'question',
                zindex: 999,
                message: message,
                position: 'center',
                buttons: [
                    [`<button>Sim</button>`, function (instance, toast) {

                        instance.hide({ transitionOut: 'fadeOut' }, toast, true)

                    }, true],
                    [`<button>Não</button>`, function (instance, toast) {

                        instance.hide({ transitionOut: 'fadeOut' }, toast, false)

                    }],
                ],
                onClosing: function(instance, toast, closedBy){
                    if (closedBy) {
                        confirmCallback()
                    }
                }
            })
            break
        case 'danger':
        case 'error':
            iziToast.error($.extend(true, {
                title: 'Erro'
            }, defaultConfig))
            break
    }
}
