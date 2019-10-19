import formLink from '../components/form-link'
import loadFlashMessages from '../components/load-flash-messages'
import backToTop from '../components/back-to-top'
import datatables from '../components/datatables'
import modal from '../components/modal'
import select from '../components/select'

$(document).ready(function () {
    formLink()
    loadFlashMessages()
    backToTop()
    datatables()
    modal()
    select()
})
