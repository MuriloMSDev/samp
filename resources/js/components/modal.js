export default () => {
    if (window.location.hash) {
        $(`${window.location.hash}.modal`).modal('toggle')

        history.pushState(
            '',
            document.title,
            window.location.pathname + window.location.search
        )
    }

    $('.modal').on('shown.bs.modal', function() {
        $(this).find('[autofocus]').focus()
    })

    $('[data-toggle="modal"]').focusin(function() {
        $(this).blur()
    })
}
