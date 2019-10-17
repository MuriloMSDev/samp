function vote(comment, btn) {
    btn.prop('disabled', true)
    $.getJSON(btn.attr('url')).done((data) => {
        if(!data.error) {
            comment.find('.votes-quantity').text(data.votes_quantity)
            if(btn.hasClass(btn.attr('class-type'))) {
                btn.removeClass(btn.attr('class-type'))
                btn.addClass('btn-light')
            } else {
                btn.removeClass('btn-light')
                comment.find('.btn-vote').not(btn).each(function() {
                    $(this).removeClass($(this).attr('class-type'))
                    $(this).addClass('btn-light')
                })
                btn.addClass(btn.attr('class-type'))
            }
        }
        btn.prop('disabled', false)
    });
}

export default () => {
    $('.comment').each(function() {
        let comment = $(this);
        comment.on('click', '.btn-vote', function() {
            vote(comment, $(this))
        })
    })
}
