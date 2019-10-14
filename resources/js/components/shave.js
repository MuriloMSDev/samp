import { ResizeSensor } from "css-element-queries"

export default () => {
    $('.ellipse-text').each(function () {
        new ResizeSensor($(this).parent(), () => {
            $(this).shave($(this).attr('ellipse') || 92)
        })
    })
}
