<template>
    <div class="set-list table-responsive" ref="setList">
        <table class="table">
            <transition-group name="list" tag="tbody">
                <tr v-for="set in sets" is="set"
                    :data="set"
                    :key="set.id"
                    :edited="set.id === editedSet.id"
                    @click="handleSetClick">
                </tr>
            </transition-group>
        </table>
    </div>
</template>

<script>
    import Set from './Set.vue'

    import { mapState } from 'vuex'

    export default {
        props: ['editedSet'],
        components: {
            Set
        },
        computed: {
            ...mapState('set', {
                sets: state => state.items
            }),
        },
        methods: {
            handleSetClick(set) {
                this.$emit('setClick', set)
            },
            onCommentClick(e) {
                console.log('comment')
            },
            scrollToBottom() {
                this.$refs.setList.scrollTop = this.$refs.setList.scrollHeight
            },
            getOffset(elem) {
                let box = elem.getBoundingClientRect();

                let body = document.body;
                let docEl = document.documentElement;

                let scrollTop = window.pageYOffset || docEl.scrollTop || body.scrollTop;
                let scrollLeft = window.pageXOffset || docEl.scrollLeft || body.scrollLeft;

                let clientTop = docEl.clientTop || body.clientTop || 0;
                let clientLeft = docEl.clientLeft || body.clientLeft || 0;

                let top  = box.top +  scrollTop - clientTop;
                let left = box.left + scrollLeft - clientLeft;

                return { top: Math.round(top), left: Math.round(left) };
            },
            resize() {
                let offset = this.getOffset(document.querySelector('.set-list'))
                let setList = document.querySelector('.set-list')
                let contentHeight = offset.top + setList.scrollHeight
                let windowHeight = window.innerHeight
                let offsetHeight = 20

                if (contentHeight + offsetHeight > windowHeight) {
                    setList.style.maxHeight = windowHeight - offset.top - offsetHeight + "px"
                } else {
                    setList.style.maxHeight = setList.scrollHeight + windowHeight - contentHeight + offsetHeight + "px"
                }
            }
        }
    }
</script>

<style lang="sass">
    @import "../../../sass/includes/vars"

    .set-list
        text-align: center
        overflow: visible
        padding-bottom: 0
        table
            background-color: #fff
            tr
                td
                    font-weight: bold
                    font-size: 16px
                    span
                        color: $grey-2
                        margin-left: 3px
                        font-size: 12px
                    i
                        font-size: 15px
                        color: $grey-3
                        z-index: 0
                &.edited
                    background-color: $blue

        .list-leave-active,
        .list-enter-active
            transition: .5s

        .list-enter,
        .list-leave-to
            opacity: 0

        .list-leave-to
            transform: translateX(30px)

        .list-enter
            transform: translateX(-30px)

    @media screen and (max-width: 768px)
        .set-list
            overflow: auto
</style>