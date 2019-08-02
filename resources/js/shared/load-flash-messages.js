import flashMessages from './flash-messages'

export default () => {
    $('[flash]').each(function () {
        let message = $(this).data('message')
        flashMessages(message.level, message.message)
    })
}
