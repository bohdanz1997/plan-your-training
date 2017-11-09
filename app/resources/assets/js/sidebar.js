class Sidebar {
    constructor() {
        this.$body = $('body')
        this.$mobileBar = $('#mobile-bar')
        this.$sidebar = $('.sidebar')
        this.$menuButton = this.$mobileBar.find('.menu-button')
        this.start = {}
        this.end = {}

        this.$menuButton.click(this.btnClickHandler.bind(this))
        this.$body.click(this.bodyClickHandler.bind(this))
        this.$body.on('touchstart', this.bodyTouchStartHandler.bind(this))
        this.$body.on('touchend', this.bodyTouchEndHandler.bind(this))
    }

    bodyTouchStartHandler(e) {
        this.start.x = e.changedTouches[0].clientX
        this.start.y = e.changedTouches[0].clientY
    }

    bodyTouchEndHandler(e) {
        this.end.y = e.changedTouches[0].clientY
        this.end.x = e.changedTouches[0].clientX

        let xDiff = this.end.x - this.start.x
        let yDiff = this.end.y - this.start.y

        if (Math.abs(xDiff) > Math.abs(yDiff)) {
            if (xDiff > 0 && this.start.x <= 80) this.$sidebar.addClass('open')
            else this.$sidebar.removeClass('open')
        }
    }

    btnClickHandler() {
        this.$sidebar.toggleClass('open')
    }

    bodyClickHandler(e) {
        let target = $(e.target)

        if (e.target !== menuButton && !sidebar.contains(e.target)) {
            sidebar.classList.remove('open')
        }

        //todo replace to jquery code in future
        if (!this.$menuButton.is(target) && !document.querySelector('.sidebar').contains(e.target)) {
            this.$sidebar.removeClass('open')
        }
    }
}

$(document).ready(() => {
    //new Sidebar()

    $(document.body).addClass('loaded')
})