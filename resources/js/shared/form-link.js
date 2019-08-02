import flashMessage from './flash-messages'

function form(el) {
    let form = $('<form>', {
        method: 'POST',
        action: el.attr('href')
    })

    form.append($('<input>', {
        'type': 'hidden',
        'name': '_token',
        'value': $('meta[name="csrf-token"]').attr('content')
    }))

    form.append($('<input>', {
        'name': '_method',
        'type': 'hidden',
        'value': el.attr('method')
    }))

    return form.appendTo('body')
}

export default () => {
    $('a[method]').click( function (e) {
        e.preventDefault();
        let el = $(this)
        if (el.is('[message]')) {
            flashMessage('confirm', el.attr('message'), () => form(el).submit())
        } else {
            form(el).submit()
        }
    })
}
