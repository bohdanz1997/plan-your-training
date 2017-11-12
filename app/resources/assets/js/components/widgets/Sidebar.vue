<template>
    <div class="navbar-header">
        <span id="mobile-bar">
            <a class="menu-button visible-xs visible-sm"
               @click="open">
            </a>
        </span>
        <div class="sidebar" :class="[{ open: opened }]">
            <div class="sidebar-inner-index">
                <ul class="main-menu">
                    <li v-for="link in links" @click="onlinkClick" :class="link.className">
                        <router-link :to="link.path">
                            {{ link.text }}
                        </router-link>
                    </li>
                    <li v-if="user"><logout-button
                            logout-path="api/logout"
                            route-after="login"
                            @click="onlinkClick"
                    ></logout-button></li>
                    <li v-else @click="onlinkClick">
                        <router-link to="login">
                            Вхід
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import LogoutButton from '../auth/LogoutBtn.vue'
    import { mapGetters } from 'vuex'

    export default {
        components: {
            LogoutButton
        },
        data() {
            return {
                appContainer: {},
                opened: false,
                links: [
                    { text: 'Plan your training', path: '/', className: 'logo'},
                    { text: 'Розпочати тренування', path: '/workout_start' }
                ]
            }
        },
        computed: {
            ...mapGetters('user', ['user'])
        },
        mounted() {
            const sidebar = document.querySelector('.sidebar')
            const menuButton = document.querySelector('.menu-button')
            this.appContainer = document.getElementById('content-wrap')

            document.addEventListener('click', function (e) {
                if (e.target !== menuButton && !sidebar.contains(e.target)) {
                    this.close()
                }
            }.bind(this))

            let start = {}, end = {}

            document.addEventListener('touchstart', function (e) {
                start.x = e.changedTouches[0].clientX
                start.y = e.changedTouches[0].clientY
            }.bind(this))

            document.addEventListener('touchend', function (e) {
                end.y = e.changedTouches[0].clientY
                end.x = e.changedTouches[0].clientX

                let xDiff = end.x - start.x
                let yDiff = end.y - start.y

                if (Math.abs(xDiff) > Math.abs(yDiff)) {
                    if (xDiff > 0 && start.x <= 80) {
                        this.open()
                    } else {
                        this.close()
                    }
                }
            }.bind(this))
        },
        methods: {
            open() {
                this.opened = true
                this.appContainer.classList.add('disable-interact')
            },
            close() {
                this.opened = false
                this.appContainer.classList.remove('disable-interact')
            },
            toggle() {
                this.opened = !this.opened
                this.appContainer.classList.toggle('disable-interact')
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

            .logo
                font-size: 24px
                margin-bottom: 0.8em
                a
                    color: $green
            li
                margin-top: 0.8em
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