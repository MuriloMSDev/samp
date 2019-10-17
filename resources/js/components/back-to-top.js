function scroll() {
    if ($(this).scrollTop() > 50) {
        $('#back-to-top').fadeIn()
    } else {
        $('#back-to-top').fadeOut()
    }
}

export default () => {
    $(document).scroll(scroll)
    $(document).ready(scroll)
}
