function init(el, config = {}) {
    if (
        el.is('[placeholder]:not([multiple])') &&
        !el.find('[selected]').length
    ) {
        el.prepend($('<option selected/>'))
    }

    el.select2(
        $.extend(
            true,
            {
                width: 'auto',
                allowClear: !el.is('[multiple]'),
                placeholder: el.attr('placeholder') || false,
                minimumResultsForSearch: el.is('[no-search]') ? -1 : 0
            },
            config
        )
    )
}

function clear(el) {
    el.find('option[value]').remove()
    el.change()
}

function load(self, based) {
    let val = based.val()

    if (val) {
        let url = new URL(self.attr('url'))
        url.searchParams.set(based.attr('name'), val)

        $.ajax({
            url: url.href,
            dataType: 'json',
            delay: 250,
            success: data => {
                clear(self)
                init(self, { data: data })

                if (self.is('[default]')) {
                    self.val(self.attr('default')).change()
                    self.removeAttr('default')
                }
            }
        })
    }

    if (!based.is(':parent')) {
        clear(self)
    }
}

export default () => {
    $('select.select2').each(function() {
        let self = $(this)
        init(self)

        if (self.is('[based-on]')) {
            let based = $(self.attr('based-on'))

            load(self, based)

            based.on('change', () => {
                load(self, based)
            })

            based.on('select2:clear', () => {
                clear(self)
            })
        }

        self.on('select2:clear', function() {
            $('select.select2')
                .not(self)
                .select2('close')
        })
    })
}
