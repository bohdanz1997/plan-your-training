<template>
    <transition name="slide">
        <div class="flash-container" v-show="show">
            <div class="alert alert-info alert-flash" role="alert">
                <strong>{{ body }}</strong>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        props: ['message'],
        data() {
            return {
                body: '',
                show: false
            }
        },
        created() {
            if (this.message) {
                this.flash(this.message);
            }
            window.events.$on(
                'flash', message => this.flash(message)
            );
        },
        methods: {
            flash(message) {
                this.body = message;
                this.show = true;
                this.hide();
            },
            hide() {
                setTimeout(() => {
                    this.show = false;
                }, 1500);
            }
        }
    };
</script>

<style lang="sass">
    .flash-container
        right: 0
        top: 50px
        padding: 15px
        position: fixed
        z-index: 10
        .alert-flash
            margin-bottom: 0

    .slide-leave-active,
    .slide-enter-active
        transition: .5s

    .slide-enter
        transform: translate(0, -100%)

    .slide-leave-to
        opacity: 0

</style>