import formLink from '../components/form-link'
import loadFlashMessages from '../components/load-flash-messages'
import modal from '../components/modal'
import datatables from '../components/datatables'
import imageUpload from '../components/image-upload'
import select from '../components/select'
import shave from '../components/shave'
import comments from '../components/comments'
import backToTop from '../components/back-to-top'

$(document).ready(function() {
    formLink()
    loadFlashMessages()
    modal()
    datatables()
    imageUpload()
    select()
    shave()
    comments()
    backToTop()
})
