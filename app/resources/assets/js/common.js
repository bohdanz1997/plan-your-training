$(document).ready(() => {
    $('.sidebar li a').each((index, value) => {
        if (window.location.href === value.href) {
            $(value).addClass('current')
        }
    })
})
