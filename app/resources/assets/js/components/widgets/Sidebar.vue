<template>
    <div class="navbar-header">
        <span id="mobile-bar">
            <a class="menu-button visible-xs visible-sm"
               @click="toggle">
            </a>
        </span>
        <div class="sidebar" :class="[{ open: opened }]">
            <div class="sidebar-inner-index">
                <ul class="main-menu">
                    <li><a class="logo" href="/">Plan your training</a></li>
                    <li v-for="link in links" @click="onlinkClick">
                        <router-link :to="link.path">
                            {{ link.text }}
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                opened: false,
                links: [
                    { text: 'Розпочати тренування', path: '/workout_start' }
                ]
            }
        },
        mounted() {
            const sidebar = document.querySelector('.sidebar')
            const menuButton = document.querySelector('.menu-button')

            document.body.addEventListener('click', function (e) {
                if (e.target !== menuButton && !sidebar.contains(e.target)) {
                    this.close()
                }
            }.bind(this))

            let start = {}, end = {}

            document.body.addEventListener('touchstart', function (e) {
                start.x = e.changedTouches[0].clientX
                start.y = e.changedTouches[0].clientY
            }.bind(this))

            document.body.addEventListener('touchend', function (e) {
                end.y = e.changedTouches[0].clientY
                end.x = e.changedTouches[0].clientX

                let xDiff = end.x - start.x
                let yDiff = end.y - start.y

                if (Math.abs(xDiff) > Math.abs(yDiff)) {
                    if (xDiff > 0 && start.x <= 80) this.open()
                    else this.close()
                }
            }.bind(this))

            document.body.addEventListener('keyup', e => {
                if (e.keyCode === 77) {
                    this.toggle()
                }
            })
        },
        methods: {
            open() {
                this.opened = true
            },
            close() {
                this.opened = false
            },
            toggle() {
                this.opened = !this.opened
            },
            onlinkClick() {
                this.close()
            }
        }
    }
</script>

<style lang="sass">
    @import '../../../sass/includes/vars'

    .sidebar
        display: none
        min-width: 250px
        position: absolute
        z-index: 10
        top: 61px
        left: 0
        bottom: 0
        overflow-x: hidden
        overflow-y: auto
        -webkit-overflow-scrolling: touch
        -ms-overflow-style: none

        ul
            list-style-type: none
            margin: 0
            line-height: 1.5em
            padding-left: 1em

            li
                margin-top: 0.8em

                .logo
                    font-size: 24px

                a
                    color: #34495e
                    text-decoration: none
                    padding-bottom: 3px

                    .current,
                    &:hover,
                    &:focus
                        border-bottom: 3px solid $green
                        outline: none

        &-inner
            width: 260px
            padding: 40px 20px 60px 60px

        .main-menu
            margin-bottom: 20px
            display: none
            padding-left: 0

    @media screen and (max-width: 900px)
        .sidebar
            display: block
            position: fixed
            z-index: 10
            background-color: #f9f9f9
            height: 100%
            top: 0
            left: 0
            box-shadow: 0 0 10px rgba(0,0,0,0.2)
            transition: all 0.4s cubic-bezier(0.4, 0, 0, 1)
            -webkit-transform: translate(-280px, 0)
            transform: translate(-280px, 0)

            &-inner
                padding: 50px 10px 10px 20px
                box-sizing: border-box

                &-index
                    padding: 10px 10px 10px 20px

            .main-menu
                display: block

            &.open
                -webkit-transform: translate(0, 0)
                transform: translate(0, 0)

</style>